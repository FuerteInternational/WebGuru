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

	public static function getSelfData() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getGroupedSelfData() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		$conn->group(parent::COL_IDENTIFIER);
		return parent::doSelect($conn, true);
	}
	
	public static function getSelfDataForIdentifier($identifier) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->order(parent::COL_DEVTYPE, 'DESC');
		return parent::doSelect($conn);
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
		$icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon.png';
		if ($this->getIcon()) {
			if ($this->getIcon()) $icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$this->getId().'.png';
		}
		return $icon;
	}
	
	public function getLargeIconUrl() {
		$icon = wgPaths::getModulePath('url', 'mobileapps').'images/icon@2x.png';
		if ($this->getIcon()) {
			if ($this->getIcon()) $icon = wgPaths::getUserfilesPath('url').'mobileapps/img/'.$this->getId().'@2x.png';
		}
		return $icon;
	}
	
	public function getAppIpaUrl() {
		return wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$this->getId().'.ipa';
	}
	
}
?>