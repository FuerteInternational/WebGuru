<?php
/**
 * Database class for table languages_definitions
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/languages_definitions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. May 2009 11:14:46
 */

class LanguagesDefinitionsModel extends BaseLanguagesDefinitionsModel {
	
	public static function getDefinitionsPagerByName($page, $limit=20, $pageid=false, $enabled=false) {
		$page = (int) $page;
		$limit = (int) $limit;
		$pageid = (int) $pageid;
		$conn = new wgConnector();
		if (!(bool) $pageid) $conn->where(parent::COL_ISGLOBAL, 1);
		else {
			$conn->where(parent::COL_PAGES_ID, $pageid);
			$conn->where(parent::COL_ISGLOBAL, 0);
		}
		$conn->order(parent::COL_NAME);
		if ((bool) $enabled) $conn->where(parent::COL_ENABLED, 1);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function deleteDefinition($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		LanguagesTranslationsModel::deleteTranslationsForDefinition($id);
		return (bool) LanguagesDefinitionsModel::doDelete($id);
	}
	
	
	public static function getGlobalDefinitions($all=false) {
		$conn = new wgConnector();
		$conn->where(parent::COL_ISGLOBAL, 1);
		$conn->order(parent::COL_NAME);
		if (!(bool) $all) $conn->where(parent::COL_ENABLED, 1);
		return parent::doSelect($conn);
	}
	
	public static function getDefinitionByKey($key, $page) {
		$conn = new wgConnector();
		$conn->where(parent::COL_NAME, $key);
		$conn->where(parent::COL_PAGES_ID, (int) $page);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return new LanguagesDefinitionsModel();
	}
	
	public static function getDefinitionIdByKey($key, $page) {
		return (int) self::getDefinitionIdByKey($key, $page)->getId();
	}
	
	public static function getPageDefinitions($page, $all=false) {
		$conn = new wgConnector();
		$conn->where(parent::COL_PAGES_ID, (int) $page);
		$conn->order(parent::COL_NAME);
		if (!(bool) $all) $conn->where(parent::COL_ENABLED, 1);
		return parent::doSelect($conn);
	}
	
	
}
?>