<?php
/**
 * Database class for table _baby_names
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/_baby_names
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        21. January 2010 12:03:08
 */

class BabyNamesModel extends BaseBabyNamesModel {
	
	public static function nameExists($name) {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_NAME, $name);
		return (int) parent::doCount($conn);
	}
	
	public static function addName($name, $gender) {
		$save = array();
		$save['name'] = $name;
		$save['gender'] = $gender;
		$save['type'] = 1;
		return (int) parent::doInsert($save);
	}
	
	// --------------------- Predefined functions for BabyNames ---------------------

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
	public static function getOneSelfData($idBabyNames) {
		$id = (int) $idBabyNames;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new BabyNamesModel();
	}
	//*/
	
}
?>