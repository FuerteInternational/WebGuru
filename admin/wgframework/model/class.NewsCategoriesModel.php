<?php
/**
 * Database class for table news_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/news_categories
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. February 2009 18:32:07
 */

class NewsCategoriesModel extends BaseNewsCategoriesModel {
	
	public static function getParentname() {
		$parent = parent::doSelectPKey($this->getParent());
		return $parent->getName();
	}
	
	
	public static function getCatName($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$cat = parent::doSelectPKey($id);
		return $cat->getName();
	}
	
	
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
		
	public static function getSubcats($id=0, $limit=20) {
		$id = (int) $id;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		if ((bool) $limit) $conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getSubcatsPager($id=0, $page=0, $limit=20) {
		$id = (int) $id;
		$page = (int) $page;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getCats($limit=20) {
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		if ((bool) $limit) $conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getCatsPager($page=0, $limit=20) {
		$page = (int) $page;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function countSubCat($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		return (int) parent::doCount($conn);
	}
	
}
?>