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
	
}
		
?>