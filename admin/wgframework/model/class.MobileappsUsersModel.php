<?php
/**
 * Database class for table mobileapps_users
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/mobileapps_users
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class MobileappsUsersModel extends BaseMobileappsUsersModel {
	
	
	// --------------------- Predefined functions for MobileappsUsers ---------------------

	/*
	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	//*/
	
	public static function getUsersCountForCompany($companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, $companyId);
		return parent::doCount($conn);
	}
	
	public static function isUserInCompany($userId, $companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, $companyId);
		$conn->where(parent::COL_USERS_ID, $userId);
		return parent::doCount($conn);
	}
	
	public static function deleteAllEntriesForUser($userId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, (int)$userId);
		return parent::doDelete($conn);
	}
	
	public static function deleteAllEntriesForCompany($companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, (int)$companyId);
		return parent::doDelete($conn);
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
	
	/*
	public static function getOneSelfData($idMobileappsUsers) {
		$id = (int) $idMobileappsUsers;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new MobileappsUsersModel();
	}
	//*/
	
}
?>