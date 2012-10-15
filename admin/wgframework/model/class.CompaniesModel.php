<?php
/**
 * Database class for table companies
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/companies
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:25
 */

class CompaniesModel extends BaseCompaniesModel {
	
	
	// --------------------- Predefined functions for Companies ---------------------

	public static function getSelfData() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function deleteCompanyWithId($companyId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, (int)$companyId);
		return parent::doDelete($conn);
	}
	
	public static function getSelfDataForUser($userId=0) {
		$conn = new wgConnector();
		if ($userId) {
			$conn->rightJoin(parent::TABLE_NAME, MobileappsUsersModel::TABLE_NAME);
			$conn->onJoin(parent::COL_ID, MobileappsUsersModel::COL_COMPANIES_ID);
			$conn->where(MobileappsUsersModel::COL_USERS_ID, $userId);
		}
		else {
			$conn->select(parent::TABLE_NAME);
		}
		$conn->order(parent::COL_NAME, 'ASC');
		//$arr = $conn->getAll(true);
		//$this->setDefaultResults($arr)
		return parent::doSelect($conn);
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
	
	public static function getOneSelfData($idCompanies) {
		$id = (int) $idCompanies;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CompaniesModel();
	}
	
	public function getIconUrl() {
		$icon = wgPaths::getModulePath('url', 'mobileapps').'images/factory.png';
		return $icon;
	}
	
	public function getLargeIconUrl() {
		$icon = wgPaths::getModulePath('url', 'mobileapps').'images/factory@2x.png';
		return $icon;
	}
	
}
?>