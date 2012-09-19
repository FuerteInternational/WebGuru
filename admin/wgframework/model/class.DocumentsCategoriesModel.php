<?php
/**
 * Database class for table documents_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/documents_categories
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. February 2009 15:46:39
 */

class DocumentsCategoriesModel extends BaseDocumentsCategoriesModel {
	
	public function getBackLink() {
		return wgPaths::makeFrontLink(array('cat'=>$this->getParent()));
	}
	
	public function getLink() {
		return wgPaths::makeFrontLink(array('cat'=>$this->getId()));
	}
	
	public function getCheckedLink() {
		if ((bool) self::countSubCat($this->getId())) return wgPaths::makeFrontLink(array('cat'=>$this->getId()));
		else return wgPaths::makeFrontLink(array('cat'=>$this->getParent()));
	}
	
	public function getEmpty() {
		if (!(bool) self::countSubCat($this->getId())) return 'empty';
		else return 'full';
	}
	
	public function getFullBackLink() {
		//$name = self::getItemName($this->getParent());
		if ((bool) $this->getParent()) return '<a href="'.wgPaths::makeFrontLink(array('cat'=>$this->getParent())).'">'.wgLang::get('back').'</a>';
		else return NULL;
	}
	
	public static function getBreadcrumbs($from, $separator=' &raquo; ', $home=array()) {
		$arr = self::makeBreadcrumbsArray($from);
		$arr = array_reverse($arr);
		$data = '<a href="'.wgPaths::makeSelfLink('parent=0').'">'.wgLang::get('homecat').'</a>';
		$x=1;
		$c = count($arr);
		foreach ($arr as $p) if ((bool) $p->getId()) {
			if ($x == $c) $data .= $separator.''.$p->getName().'';
			else $data .= $separator.'<a href="'.wgPaths::makeSelfLink('parent='.$p->getParent()).'">'.$p->getName().'</a>';
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
		
	public static function getItemName($id=0) {
		$id = (int) $id;
		$arr = parent::doSelectPKey($id);
		return (string) $arr->getName();
	}
		
	public static function getSubcats($id=0, $limit=0) {
		$id = (int) $id;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		if ((bool) $limit) $conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getSubcatsPager($id=0, $page=false, $perPage=20) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $perPage);
	}
	
	public static function getCats($limit=0) {
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		if ((bool) $limit) $conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getCatsPager($page=false, $perPage=20) {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $perPage);
	}
	
	public static function countSubCat($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENT, $id);
		return (int) parent::doCount($conn);
	}
		
}
?>