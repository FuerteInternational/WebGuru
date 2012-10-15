<?php
/**
 * Database class for table mobileapps_companies
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/mobileapps_companies
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:14
 */

class MobileappsCompaniesModel extends BaseMobileappsCompaniesModel {
	
	
	// --------------------- Predefined functions for MobileappsCompanies ---------------------

	
	public static function numberOfAppsInCompany($companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, $companyId);
		return parent::doCount($conn);
	}
	
	public static function numberOfCompaniesForApp($appId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_MOBILEAPPS_ID, $appId);
		return parent::doCount($conn);
	}
	
	public static function isAppInCompany($appId, $companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, $companyId);
		$conn->where(parent::COL_MOBILEAPPS_ID, $appId);
		return parent::doCount($conn);
	}
	
	public static function deleteAllEntriesForApp($appId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_MOBILEAPPS_ID, (int)$appId);
		return parent::doDelete($conn);
	}
	
	public static function deleteAllEntriesForCompany($companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_COMPANIES_ID, (int)$companyId);
		return parent::doDelete($conn);
	}
	
	public static function getCompaniesForApp($appId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_MOBILEAPPS_ID, $appId);
		$conn->onJoin(parent::COL_COMPANIES_ID, CompaniesModel::COL_ID);
		return parent::doRightJoin(CompaniesModel::TABLE_NAME, $conn);
	}
	
	public function getCompanyNameWhenRightJoin() {
		return $this->_result[3];
	}
	
	public function getCompanyIdWhenRightJoin() {
		return $this->_result[0];
	}
	
	/*
	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	//*/
	
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
	public static function getOneSelfData($idMobileappsCompanies) {
		$id = (int) $idMobileappsCompanies;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new MobileappsCompaniesModel();
	}
	//*/
	
}
?>