<?php
/**
 * Main class for module Mobile Apps
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. September 2012
 */

require_once('HTTP/Download.php');

class moduleMobileapps {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Mobile Apps';
		$this->code    = 'mobileapps';
		$this->version = '0.1.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function userHasPermissionToAccessAppWithId($id) {
		$id = (int)$id;
		if (moduleUsers::isAdmin()) {
			return $id;
		}
		else {
			$app = MobileappsModel::getOneSelfData($id);
			if (!$app->getId()) return false;
			$companies = MobileappsCompaniesModel::getCompaniesForApp($app->getId());
			$userComps = MobileappsUsersModel::getCompaniesIdsForUser(moduleUsers::getId());
			foreach ($companies as $company) {
				foreach ($userComps as $uc) {
					if ((int)$uc == (int)$company->getCompanyIdWhenRightJoin()) return $id;
				}
			}
			return false;
		}
	}
	
	public static function downloadIpaWithId($id) {
		$id = self::userHasPermissionToAccessAppWithId($id);
		if (!$id) return false;
		$app = MobileappsModel::getOneSelfData($id);
		$params = array(
			'file'                => $app->getAppIpaPath(),
			'cache'               => false,
			'contentdisposition'  => array(HTTP_DOWNLOAD_ATTACHMENT, wgValidation::safeFile($app->getName()).'-'.$app->getDevtypeIdentifier().'.ipa'),
			'contenttype'         => 'application/x-gzip'
		);
		error_reporting(0);
		$error = HTTP_Download::staticSend($params, false);
		if ($error) {
			wgError::add('Download error: '.$error->getMessage());
			return true;
		}
		else exit();
	}
	
	public static function canUserAccessApp($userId, $appId) {
		$companies = MobileappsCompaniesModel::getCompaniesForApp($appId);
		foreach ($companies as $company) {
			if (MobileappsUsersModel::isUserInCompany($userId, $company->getCompaniesId())) return true;
		}
		return false;
	}
	
	public static function doSaveUsersForCompany() {
		$save = array();
		$save['companies_id'] = (int)wgPost::getValue('companyId');
		if (!$save['companies_id']) return false;
		MobileappsUsersModel::deleteAllEntriesForCompany($save['companies_id']);
		foreach (wgPost::getValue('user') as $companyId) {
			$save['users_id'] = $companyId;
			MobileappsUsersModel::doInsert($save);
		}
		return true;
	}
	
	public static function doSaveCompaniesForApp() {
		$save = array();
		$save['mobileapps_id'] = (int)wgPost::getValue('appId');
		if (!$save['mobileapps_id']) return false;
		MobileappsCompaniesModel::deleteAllEntriesForApp($save['mobileapps_id']);
		foreach (wgPost::getValue('company') as $companyId) {
			$save['companies_id'] = $companyId;
			MobileappsCompaniesModel::doInsert($save);
		}
		return true;
	}
	
	public static function deleteAppsGroupWithIdentiers($appIdentifier) {
		
	}
	
	public static function deleteAppWithId($appId) {
		$appId = (int)$appId;
		if (!$appId) return false;
		$basicPath = wgPaths::getUserfilesPath('ftp').'mobileapps/';
		// Deleting icons
		wgIo::delete($basicPath.'img/'.$appId.'.png');
		wgIo::delete($basicPath.'img/'.$appId.'@2x.png');
		
		// Deleting app
		wgIo::delete($basicPath.'ipa/'.$appId.'.ipa');
		wgIo::delete($basicPath.'ipa/'.$appId.'.plist');
		
		// Deleting references
		$conn = new wgConnector();
		$conn->where(MobileappsModel::COL_ID, $appId);
		MobileappsModel::doDelete($conn);
		
// 		$conn = new wgConnector();
// 		$conn->where(MobileappsUsersModel::col_, $appId);
// 		MobileappsUsersModel::doDelete($conn);
		
		$conn = new wgConnector();
		$conn->where(MobileappsCompaniesModel::COL_MOBILEAPPS_ID, $appId);
		MobileappsCompaniesModel::doDelete($conn);
		
		return true;
	}
	
}
		
?>