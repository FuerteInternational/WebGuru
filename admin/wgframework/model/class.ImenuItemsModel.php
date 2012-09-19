<?php
/**
 * Database class for table imenu_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/imenu_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        21. August 2009 12:21:10
 */

class ImenuItemsModel extends BaseImenuItemsModel {
	
	
	// --------------------- Predefined functions for ImenuItems ---------------------

	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_SORT, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_SORT, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	/*
	public static function getOneSelfData($idImenuItems) {
		$id = (int) $idImenuItems;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new ImenuItemsModel();
	}
	//*/
	
}
?>