<?php
/**
 * Database class for table pages_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/pages_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class PagesTemplatesModel extends BasePagesTemplatesModel {
	
	public static function getSelectablePageTemplates() {
		$conn = new wgConnector();
		$conn->where(parent::COL_MASTER, 1);
		return PagesTemplatesModel::doSelect($conn);
	}
	
	public static function getTemplatesByGroup($group=0) {
		$id = (int) $group;
		$conn = new wgConnector();
		if ((bool) $group) $conn->where(parent::COL_PAGES_TEMPLATES_GROUPS_ID, $id);
		$conn->order(parent::COL_MASTER.' ASC, '.parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getTemplatesPagerByGroup($group=0, $page=0, $limit=30) {
		$id = (int) $group;
		$page = (int) $page;
		$limit = (int) $limit;
		$conn = new wgConnector();
		if ((bool) $group) $conn->where(parent::COL_PAGES_TEMPLATES_GROUPS_ID, $id);
		$conn->order(parent::COL_MASTER.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doPager($conn, $page, $limit);
	}
	
	
}
?>