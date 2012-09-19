<?php
/**
 * Database class for table csnippets_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/csnippets_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        6. August 2009 12:15:22
 */

class CsnippetsCategoriesModel extends BaseCsnippetsCategoriesModel {
	
	
	// --------------------- Predefined functions ---------------------

	public static function getCsnippetsCategoriesData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	/*
	public static function getCsnippetsCategoriesPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_ID, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	/*
	public static function getOneCsnippetsCategoriesData($idCsnippetsCategories) {
		$id = (int) $idCsnippetsCategories;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id)
			$conn->limit(1);
			$ret = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new CsnippetsCategoriesModel();
	}
	//*/
	
	/*
	public static function getCsnippetsCategoriesData() {
		$conn = new wgConnector();
		$conn->limit(20);
		return parent::doSelect($conn);
	}
	//*/
	
	
}
?>