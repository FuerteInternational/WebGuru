<?php
/**
 * Database class for table ipromote_campaigns
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/ipromote_campaigns
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        23. August 2009 14:11:11
 */

class IpromoteCampaignsModel extends BaseIpromoteCampaignsModel {
	
	
	// --------------------- Predefined functions for IpromoteCampaigns ---------------------

	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function deletePromo($idPromo) {
		$id = (int) $idPromo;
		IpromoteAppsModel::deleteAppsInPromo($id);
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		return parent::doDelete($conn);
	}
	
	public static function getUserData($idUser) {
		$id = (int) $idUser;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function verifyPromoForUser($idUser, $idPromote) {
		$idu = (int) $idUser;
		$id = (int) $idPromote;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_USERS_ID, $idu);
		$conn->limit(1);
		return (bool) parent::doCount($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idIpromoteCampaigns) {
		$id = (int) $idIpromoteCampaigns;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($ret[0]) && !empty($ret[0])) return $ret[0];
		else return new IpromoteCampaignsModel();
	}
	
	public function getUserName() {
		if ((bool) $this->getUsersId()) return UsersModel::getFullNameCached($this->getUsersId());
		else if ((bool) $this->getSystemUsersId()) return SystemUsersModel::getFullNameCached($this->getSystemUsersId());
		else return UNDEFINED;
	}
	
	public function getIdentifier() {
		return wgText::safeText($this->getName());
	}
	
	
}
?>