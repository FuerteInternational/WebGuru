<?php
/**
 * Database class for table wsprite_widgets
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/wsprite_widgets
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. September 2009 12:31:38
 */

class WspriteWidgetsModel extends BaseWspriteWidgetsModel {
	
	
	// --------------------- Predefined functions for WspriteWidgets ---------------------

	public static function deleteWidget($id) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return (bool) parent::doDelete($conn);
	}

	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}

	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}

	public static function getUserData($idUser) {
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, (int) $idUser);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}

	public static function getUserPagerData($idUser, $page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->where(parent::COL_USERS_ID, (int) $idUser);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}

	public static function getOneSelfData($idWspriteWidgets) {
		$id = (int) $idWspriteWidgets;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($ret[0]) && !empty($ret[0])) return $ret[0];
		else return new WspriteWidgetsModel();
	}
	
	public static function validateWidgetAgainstUser($idWspriteWidgets, $idUser) {
		$id = (int) $idWspriteWidgets;
		$idu = (int) $idUser;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_USERS_ID, $idu);
		return (bool) parent::doCount($conn);
	}
	
}
?>