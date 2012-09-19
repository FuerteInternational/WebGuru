<?php
/**
 * Database class for table ichat_messages
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/ichat_messages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        5. February 2010 14:34:19
 */

class IchatMessagesModel extends BaseIchatMessagesModel {
	
	public static function deleteMessagesForGroup($groupId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ICHAT_GROUPS_ID, (int) $groupId);
		return (int) parent::doDelete($conn);
	}
	
	public static function selectMessagesFromLocation($latitude, $longitude, $distance) {
		$conn = new wgConnector();
		return $conn->getAll("SELECT *, (SQRT( POW( 69.1 * ( latitude - $latitude ) , 2 ) + POW( 69.1 * ( $longitude - longitude ) * COS( latitude /
57.3 ) , 2 ) )) AS distance FROM ichat_messages WHERE (SQRT( POW( 69.1 * ( latitude - $latitude ) , 2 ) + POW( 69.1 * ( $longitude - longitude ) * COS( latitude /
57.3 ) , 2 ) )) <= $distance ORDER BY added DESC, distance ASC LIMIT 100");
	}
	
	
	// --------------------- Predefined functions for IchatMessages ---------------------

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
	public static function getOneSelfData($idIchatMessages) {
		$id = (int) $idIchatMessages;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IchatMessagesModel();
	}
	//*/
	
}
?>