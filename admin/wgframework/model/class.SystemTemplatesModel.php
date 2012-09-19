<?php
/**
 * Database class for table system_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        3. March 2009 11:13:23
 */

class SystemTemplatesModel extends BaseSystemTemplatesModel {
	
	public static function getTemplatesPager($type=0, $page=0, $limit=20, $module=NULL) {
		$type = (int) $type;
		$page = (int) $page;
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$module = (string) valid::safeText($module);
		if (empty($module)) $module = wgSystem::getModule();
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->where(parent::COL_MODULE, $module);
		$conn->limit($limit);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneTemplate($type=0, $identifier=0, $module=NULL) {
		$type = (int) $type;
		$module = (string) valid::safeText($module);
		if (empty($module)) $module = wgSystem::getModule();
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->where(parent::COL_MODULE, $module);
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return false;
	}
	
	
}
?>