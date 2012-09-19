<?php
/**
 * Database class for table projects_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/projects_categories
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        13. June 2009 22:46:18
 */

class ProjectsCategoriesModel extends BaseProjectsCategoriesModel {
	
	private static $_tempcats = array();
	
	public static function getAllExcept($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id, '!=');
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, (int) wgSystem::getCurrentWebsite());
		$conn->order(parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getSelectBoxTree($id=0, $except=0) {
		self::$_tempcats = array();
		self::_fillTreeVar($id, 1, $except);
		return self::$_tempcats;
	}
	
	private static function _fillTreeVar($start=0, $level=0, $except=0) {
		$start = (int) $start;
		$arr = self::getSubCats($start);
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
	
	public static function getSubCats($id=0, $lang=NULL, $web=NULL) {
		$id = (int) $id;
		if (!(bool) $web) $web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		if ((bool) $lang) $conn->where(parent::COL_SYSTEM_LANGUAGE_ID, (int) $lang);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, (int) $web);
		$conn->order(parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getCatsPager($id, $page, $limit, $lang=0) {
		$id = (int) $id;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());
		if ((bool) $lang) $conn->where(parent::COL_SYSTEM_LANGUAGE_ID, (int) $lang);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getParentCatId($id=0) {
		$id = (int) $id;
		$arr = parent::doSelectPKey($id);
		return (int) $arr->getParent();
	}
	
	public static function getBreadcrumbs($from, $separator=' &raquo; ', $home=array()) {
		$arr = self::makeBreadcrumbsArray($from);
		$arr = array_reverse($arr);
		$data = '<a href="'.wgPaths::makeSelfLink('mycat=0').'">'.wgLang::get('homecat').'</a>';
		$x=1;
		$c = count($arr);
		foreach ($arr as $p) if ((bool) $p->getId()) {
			if ($x == $c) $data .= $separator.''.$p->getName().'';
			else $data .= $separator.'<a href="'.wgPaths::makeSelfLink('mycat='.$p->getParent()).'">'.$p->getName().'</a>';
			$x++;
		}
		return $data;
	}
	
	public static function makeBreadcrumbsArray($from, $arr=array()) {
		$from = (int) $from;
		$c = count($arr);
		$arr[($c+1)] = parent::doSelectPKey($from);
		if ($arr[($c+1)]->getParent() != 0) $arr = self::makeBreadcrumbsArray($arr[($c+1)]->getParent(), $arr);
		return $arr;
	}
	
	public static function countSubCats($cat) {
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, (int) $cat);
		return (int) parent::doCount($conn);
	}
	
	
}
?>