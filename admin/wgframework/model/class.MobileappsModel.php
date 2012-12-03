<?php
/**
 * Database class for table mobileapps
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/mobileapps
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class MobileappsModel extends BaseMobileappsModel {
	
	
	// --------------------- Predefined functions for Mobileapps ---------------------
	
	public static function getIdOfAnExistingApp($devtype, $bundleId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_DEVTYPE, (int)$devtype);
		$conn->where(parent::COL_IDENTIFIER, wgValidation::safeFile($bundleId));
		$arr = parent::doSelect($conn);
		if (!empty($arr)) return $arr[0]->getId();
		return 0;
	}

	public static function getAllAppsCount() {
		$conn = new wgConnector();
		return parent::doCount($conn);
	}
	
	public static function getSelfData() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getGroupedSelfData() {
		$conn = new wgConnector();
// 		$wb = new wgBrowser();
// 		if ($wb->isiOS()) {
// 			$conn->where(parent::COL_APPTYPE, 0);
// 		}
// 		elseif ($wb->isAndroidOS()) {
// 			$conn->where(parent::COL_APPTYPE, 1);
// 		}
		$conn->order(parent::COL_NAME, 'ASC');
		//$conn->order(parent::COL_DEVTYPE, 'ASC');
		$conn->group(parent::COL_IDENTIFIER);
		return parent::doSelect($conn);
	}
	
	public static function getGroupedSelfDataForCompanyIds($companyIds) {
		if (empty($companyIds)) return array();
		$conn = new wgConnector();
		$conn->onJoin(parent::COL_ID, MobileappsCompaniesModel::COL_MOBILEAPPS_ID);
		foreach ($companyIds as $companyId) {
			$conn->where(MobileappsCompaniesModel::COL_COMPANIES_ID, $companyId, '=', 'OR');
		}
		$wb = new wgBrowser();
		if ($wb->isiOS()) {
			$conn->where(parent::COL_APPTYPE, 0);
		}
		elseif ($wb->isAndroidOS()) {
			$conn->where(parent::COL_APPTYPE, 1);
		}
		$conn->order(parent::COL_NAME, 'ASC');
		$conn->group(parent::COL_IDENTIFIER);
		return parent::doRightJoin(MobileappsCompaniesModel::TABLE_NAME, $conn);
	}
	
	public static function getSelfDataForIdentifier($identifier) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->order(parent::COL_DEVTYPE, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function isDataForIdentifier($identifier) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->order(parent::COL_DEVTYPE, 'DESC');
		$ok = (bool) parent::doCount($conn);
		if ($ok && !moduleUsers::isAdmin()) {
			//$ok = self::doesUserHaveAnAccess();
		}
		return $ok;
	}
	
	public static function getIconUrlForAnyIdentifier($bundleId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $bundleId);
		$conn->order(parent::COL_APPTYPE, 'DESC');
		$arr = parent::doSelect($conn);
		$icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon.png';
		foreach ($arr as $app) {
			$icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$app->getId().'.png';
			$iconFtp = wgPaths::getUserfilesPath('ftp').'mobileapps/img/'.$app->getId().'.png';
			if (file_exists($iconFtp)) return $icon;
		}
		return $icon;
	}
	
	public static function getPagerDataForDevVersion($devVersion, $page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->where(parent::COL_DEVTYPE, (int)$devVersion);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	/*
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	public static function getOneSelfData($idMobileapps) {
		$id = (int) $idMobileapps;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new MobileappsModel();
	}
	
	public static function getItemGeneralItemInfo($identifierMobileapps) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifierMobileapps);
		$conn->group(parent::COL_IDENTIFIER);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new MobileappsModel();
	}
	
	public function getFormattedDateChanged() {
		return wgSystem::formatDate($this->getChanged());
	}
	
	public function getFormattedDateAdded() {
		return wgSystem::formatDate($this->getAdded());
	}
	
	public function getIconUrl() {
		$icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$this->getId().'.png';
		$iconFtp = wgPaths::getUserfilesPath('ftp').'mobileapps/img/'.$this->getId().'.png';
		if (!file_exists($iconFtp)) $icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon.png';
		return $icon;
	}
	
	public function getLargeIconUrl() {
		$icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$this->getId().'@2x.png';
		$iconFtp = wgPaths::getUserfilesPath('ftp').'mobileapps/img/'.$this->getId().'@2x.png';
		if (!file_exists($iconFtp)) $icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon@2x.png';
		return $icon;
	}
	
	public function getAppIpaUrl() {
		$ext = ((int)$this->getApptype() == 0) ? '.ipa' : '.apk';
		return wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$this->getId().$ext;
	}
	
	public function getAppIpaPath() {
		$ext = ((int)$this->getApptype() == 0) ? '.ipa' : '.apk';
		return wgPaths::getUserfilesPath('ftp').'mobileapps/ipa/'.$this->getId().$ext;
	}
	
	public function getDevtypeIdentifier() {
		if ($this->getDevtype() == 2) return 'production';
		elseif ($this->getDevtype() == 1) return 'beta';
		else return 'development';
	}
	
	public function getFormattedVersion() {
		$v = $this->getVersion();
		return (empty($v) ? 'n/a' : $v);
	}
	
}
?>