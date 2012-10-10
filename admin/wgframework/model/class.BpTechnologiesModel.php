<?php
/**
 * Database class for table bp_technologies
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/bp_technologies
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:35
 */

class BpTechnologiesModel extends BaseBpTechnologiesModel {
	
	
	// --------------------- Predefined functions for BpTechnologies ---------------------

	public static function getSelfData() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME, 'ASC');
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
	
	/*
	public static function getOneSelfData($idBpTechnologies) {
		$id = (int) $idBpTechnologies;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new BpTechnologiesModel();
	}
	//*/
	
}
?>