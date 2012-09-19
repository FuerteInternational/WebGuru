<?php
/**
 * Database class for table ipromote_apps
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/ipromote_apps
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        23. August 2009 14:11:11
 */

class IpromoteAppsModel extends BaseIpromoteAppsModel {
	
	
	// --------------------- Predefined functions for IpromoteApps ---------------------

	public static function getSelfData($idPromotion) {
		$id = (int) $idPromotion;
		$conn = new wgConnector();
		$conn->where(parent::COL_IPROMOTE_CAMPAIGNS_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function deleteAppsInPromo($idPromo) {
		$id = (int) $idPromo;
		$conn = new wgConnector();
		$conn->where(parent::COL_IPROMOTE_CAMPAIGNS_ID, $id);
		return parent::doDelete($conn);
	}
	
	public static function deleteApp($idApp) {
		$id = (int) $idApp;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		return parent::doDelete($conn);
	}
	
	public static function getUserData($idUser, $idPromotion) {
		if (!IpromoteCampaignsModel::verifyPromoForUser($idUser, $idPromotion)) return false;
		$idu = (int) $idUser;
		$id = (int) $idPromotion;
		$conn = new wgConnector();
		$conn->where(parent::COL_IPROMOTE_CAMPAIGNS_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getCountData($idCampaign) {
		$id = (int) $idCampaign;
		$conn = new wgConnector();
		$conn->where(parent::COL_IPROMOTE_CAMPAIGNS_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return (int) parent::doCount($conn);
	}
	
	public static function getSelfPagerData($idPromotion, $page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$id = (int) $idPromotion;
		$conn = new wgConnector();
		$conn->where(parent::COL_IPROMOTE_CAMPAIGNS_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idIpromoteApps) {
		$id = (int) $idIpromoteApps;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($ret[0]) && !empty($ret[0])) return $ret[0];
		else return new IpromoteAppsModel();
	}
	
	public function getSmallimage() {
		return moduleIpromote::getAppPicture($this->getId(), 'small', $this->getName());
	}
	
	public function getBigimage() {
		return moduleIpromote::getAppPicture($this->getId(), 'big', $this->getName());
	}
	
	public function getSmallimagepath() {
		return moduleIpromote::getAppPicture($this->getId(), 'small');
	}
	
	public function getBigimagepath() {
		return moduleIpromote::getAppPicture($this->getId(), 'big');
	}
	
	
}
?>