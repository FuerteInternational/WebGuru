<?php
/**
 * Database class for table iblog_devices
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/iblog_devices
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. November 2009 11:35:49
 */

class IblogDevicesModel extends BaseIblogDevicesModel {
	
	
	// --------------------- Predefined functions for IblogDevices ---------------------

	public static function mergeCodeWithUser($code, $uid) {
		if (!(bool) $uid) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_DEVICE, wgText::safeText($code));
		$conn->where(parent::COL_USERS_ID, 0);
		$arr = parent::doSelect($conn);
		foreach ($arr as $b) IblogBlogsModel::setUserForBlog($b->getIblogBlogsId(), $uid);
		$conn = new wgConnector();
		$conn->set(parent::COL_USERS_ID, (int) $uid);
		$conn->where(parent::COL_DEVICE, wgText::safeText($code));
		$conn->where(parent::COL_USERS_ID, 0);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function deleteDevicesForBlog($idBlog) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IBLOG_BLOGS_ID, (int) $idBlog);
		return parent::doDelete($conn);
	}
	
	public static function addDevice($deviceCode, $blogId, $userId=0) {
		$userId = (int) $userId;
		wgModules::runModule('users');
		if (!(bool) $userId) $userId = (int) moduleUsers::getId();
		$save = array();
		$save['users_id'] = (int) $userId;
		$save['device'] = wgText::safeText($deviceCode);
		$save['iblog_blogs_id'] = (int) $blogId;
		return (int) parent::doInsert($save);
	}
	
	public static function countBlogsForDevice($deviceCode) {
		$conn = new wgConnector();
		$conn->where(parent::COL_DEVICE, wgText::safeText($deviceCode));
		return (int) parent::doCount($conn);
	}
	
	
	

	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}

	public static function getSelfDataByDeviceId($deviceId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_DEVICE, wgText::safeText($deviceId));
		//$conn->order(parent::COL_NAME, 'ASC');
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
	
	public static function getOneSelfData($idIblogDevices) {
		$id = (int) $idIblogDevices;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IblogDevicesModel();
	}
	
	public static function getUserIdForDevice($deviceCode) {
		if (!empty($deviceCode)) {
			$conn = new wgConnector();
			$conn->where(parent::COL_DEVICE, wgText::safeText($deviceCode));
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0]->getUsersId();
		else return 0;
	}
	
	public static function getDeviceForBlogId($blogId) {
		$blogId = (int) $blogId;
		if ((bool) $blogId) {
			$conn = new wgConnector();
			$conn->where(parent::COL_IBLOG_BLOGS_ID, $blogId);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0]->getDevice();
		else return false;
	}
	
}
?>