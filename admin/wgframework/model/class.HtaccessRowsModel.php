<?php
/**
 * Database class for table htaccess_rows
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/htaccess_rows
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 11:25:42
 */

class HtaccessRowsModel extends BaseHtaccessRowsModel {
	
	public static function getLastId() {
		$conn = new wgConnector();
		$conn->order(parent::COL_ID, 'DESC');
		$data = parent::doSelect();
		return (int) ($data[0]->getId()+1);
	}
	
	public static function getRowsPagerByWebAndSort($page, $web=NULL) {
		//if ((bool) $web) print $web;
		return parent::doPager(array(), $page);
	}
	
	public static function getRows($page, $web=NULL) {
		return parent::doSelect();
	}
	
	public static function getRowsTypes() {
		$data = array();
		$data[1] = 'rewrite';
		$data[2] = 'errorpage';
		$data[3] = 'htpasswd';
		return $data;
	}
	
	public static function getRowTypeName($id) {
		$arr = self::getRowsTypes();
		if (isset($arr[$id])) return $arr[$id];
		else return false;
	}

}
?>