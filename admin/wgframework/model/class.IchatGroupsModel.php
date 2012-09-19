<?php
/**
 * Database class for table ichat_groups
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/ichat_groups
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        5. February 2010 14:34:19
 */

class IchatGroupsModel extends BaseIchatGroupsModel {
	
	
	public static function validateUserGroup($groupId, $userId=NULL) {
		$s = (int) $groupId;
		$u = (int) $userId;
		if (!(bool) $u) $u = (int) moduleUsers::getId();
		if (!(bool) $u) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, $u);
		$conn->where(parent::COL_ID, $s);
		return (bool) parent::doCount($conn);
	}
	
	public static function deleteForm($groupId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, (int) $groupId);
		$conn->limit(1);
		return (bool) parent::doDelete($conn);
	}
		
	public static function getSelfData($front=false) {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		if ((bool) $front) $conn->where(parent::COL_USER_ID, moduleUsers::getId());
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
		
	}
	
	public static function getSelfPagerData($page, $limit=20, $front=false) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		if ((bool) $front) $conn->where(parent::COL_USERS_ID, moduleUsers::getId());
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneUserData($groupId, $user) {
		$user = (int) $user;
		$id = (int) $groupId;
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, $user);
		$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new CsnippetsSnippetsModel();
	}
	
	public static function getOneCodeData($groupCode) {
		$conn = new wgConnector();
		$conn->where(parent::COL_CODE, wgText::safeText($groupCode));
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new CsnippetsSnippetsModel();
	}
	
	/*
	public static function getOneSelfData($idImessagesForms) {
		$id = (int) $idImessagesForms;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new ImessagesFormsModel();
	}
	//*/
	
}
?>