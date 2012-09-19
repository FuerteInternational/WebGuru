<?php
/**
 * Database class for table crawler_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/crawler_categories
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 18:02:18
 */

class CrawlerCategoriesModel extends BaseCrawlerCategoriesModel {
	
	private static $_tempcats = array();
	
	public static function getAllExcept($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id, '!=');
		return parent::doSelect($conn);
	}
	
	public static function getSelectBoxTree($id=0, $except=0) {
		self::$_tempcats = array();
		self::_fillTreeVar($id, 1, $except);
		return self::$_tempcats;
	}
	
	private static function _fillTreeVar($start=0, $level=0, $except=0) {
		$start = (int) $start;
		$arr = self::getSubcats($start);
		if (!empty($arr)) foreach ($arr as $cat) {
			if ($cat->getId() != $except) {
				self::$_tempcats[] = array($cat->getId(), self::_getSpacesByLevel($level).$cat->getName());
				self::_fillTreeVar($cat->getId(), ($level+1), $except);
			}
		}
	}
	
	private static function _getSpacesByLevel($level) {
		$level = (int) $level;
		//if (!(bool) $level) return '|_&nbsp;';
		$out = NULL;
		for ($i=0; $i<$level; $i++) {
			$out .= '&nbsp;&nbsp;&nbsp;';
		}
		return $out.'|_&nbsp;';
	}
	
	
	public static function getParentId($id=0) {
		$id = (int) $id;
		$arr = parent::doSelectPKey($id);
		return (int) $arr->getParent();
	}
	
	public static function getSubcats($id=0) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	public static function getSubcatsPager($id=0, $page=false) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
	
	public static function countSubCat($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		return (int) parent::doCount($conn);
	}
	
	
}
?>