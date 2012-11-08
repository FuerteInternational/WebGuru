<?php
/**
 * Database class for table projects_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/projects_items
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        13. June 2009 22:46:18
 */

class ProjectsItemsModel extends BaseProjectsItemsModel {
	
	public static function getLatestOne($category=0, $order=NULL) {
		$id = (int) $category;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, $id);
		if (!(bool) $order) $conn->order(parent::COL_DATE, 'DESC');
		else $conn->order($order, false);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new ProjectsItemsModel(); 
	}
	
	public static function getRandomOne($category=0) {
		$id = (int) $category;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, $id);
		$conn->order('RAND()', false);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new ProjectsItemsModel(); 
	}
	
	public static function getFrontendProjects($cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		//if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, (int) $cat);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_DATE.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_DATE.')', $parts[1], '=');
			}
		}
		$conn->order($order, false);
		$conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getProjectsPager($page, $cat=0, $order='DESC', $limit=30, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, (int) $cat);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_DATE.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_DATE.')', $parts[1], '=');
			}
		}
		$conn->order(parent::COL_DATE, $order);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getFrontendProjectsPager($page, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, (int) $cat);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_DATE.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_DATE.')', $parts[1], '=');
			}
		}
		$conn->order(parent::COL_DATE, $order);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getFrontendProjectsSearch($search, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = self::_getSearchConnector($search, $cat, $order);
		$conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getFrontendProjectsSearchPager($search, $page, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = self::_getSearchConnector($search, $cat, $order);
		return parent::doPager($conn, $page, $limit);
	}
	
	private static function _getSearchConnector($search, $cat, $order, $date) {
		$cat = (int) $cat;
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_PROJECTS_CATEGORIES_ID, (int) $cat);
		$conn->myWhere(parent::COL_TEXT1.' LIKE \'%'.$search.'%\'');
		$conn->order(parent::COL_DATE, $order);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_DATE.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_DATE.')', $parts[1], '=');
			}
		}
		return $conn;
	}
	
	public function getMainImageXsmall() {
		return moduleProjects::getMainImage($this->getId(), 'xsmall');
	}
	
	public function getMainImageSmall() {
		return moduleProjects::getMainImage($this->getId(), 'small');
	}
	
	public function getMainImageMedium() {
		return moduleProjects::getMainImage($this->getId(), 'medium');
	}
	
	public function getMainImageLarge() {
		return moduleProjects::getMainImage($this->getId(), 'large');
	}
	
	public function getMainImageOriginal() {
		return moduleProjects::getMainImage($this->getId(), 'original');
	}
	
}
?>