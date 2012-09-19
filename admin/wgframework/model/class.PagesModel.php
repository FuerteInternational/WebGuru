<?php
/**
 * Database class for table pages
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/pages
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:28
 */

class PagesModel extends BasePagesModel {
	
	public static function getHomeId($languageId=0, $websiteId=0) {
		$lng = (int) $languageId;
		$web = (int) $websiteId;
		if (!(bool) $web) $web = (int) wgSystem::getCurrentWebsite();
		if (!(bool) $lng) $lng = (int) wgLang::getLanguageId();
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, $lng);
		$conn->where(parent::COL_HOME, 1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return (int) $arr[0]->getId();
		else return 0;
	}
	
	public static function getParentTemplateRecursively($idPage) {
		wgError::add('!!!! dodelat woe: '.__FILE__.' - '.__LINE__);
		return 0;
	}
	
	
	public static function movePageUp($id) {
		$id = (int) $id;
		$ok = false;
		$arr = self::getPagesOnSameLevel($id);
		$prev = array();
		$new = array();
		$x = count($arr);
		foreach ($arr as $p) {
			$new[$x] = $p;
			if ($p->getId() == $id && !empty($prev)) {
				$new[$prev[0]] = $p;
				$new[$x] = $prev[1];
				$ok = true;
			}
			$prev = array($x, $p);
			$x--;
		}
		foreach ($new as $k=>$p) self::setSortForPage($p->getId(), $k);
		return $ok;
	}
	
	public static function movePageDown($id) {
		$id = (int) $id;
		$ok = false;
		$arr = self::getPagesOnSameLevel($id);
		$act = array();
		$new = array();
		$x = count($arr);
		foreach ($arr as $p) {
			$new[$x] = $p;
			if (!empty($act)) {
				$new[$act[0]] = $p;
				$new[$x] = $act[1];
				$ok = true;
				$act = array();
			}
			if ($p->getId() == $id) $act = array($x, $p);
			$x--;
		}
		foreach ($new as $k=>$p) self::setSortForPage($p->getId(), $k);
		return $ok;
			}
	
	public static function setSortForPage($id, $sort) {
		$id = (int) $id;
		$sort = (int) $sort;
		$conn = new wgConnector();
		$conn->set(parent::COL_SORT, $sort);
		$conn->where(parent::COL_ID, $id);
		return (bool) parent::doUpdate($conn);
	}
	
	
	public static function getBreadcrumbs($from, $separator=' &raquo; ', $home=array()) {
		$arr = self::makeBreadcrumbsArray($from);
		$arr = array_reverse($arr);
		$data = '<a href="'.wgPaths::makeSelfLink('parent=0').'">'.wgLang::get('homepage').'</a>';
		$x=1;
		$c = count($arr);
		foreach ($arr as $p) if ((bool) $p->getId()) {
			if ($x == $c) $data .= $separator.''.$p->getName().'';
			else $data .= $separator.'<a href="'.wgPaths::makeSelfLink('parent='.$p->getParentid()).'">'.$p->getName().'</a>';
			$x++;
		}
		return $data;
	}
	
	public static function makeBreadcrumbsArray($from, $arr=array()) {
		$from = (int) $from;
		$c = count($arr);
		$arr[($c+1)] = parent::doSelectPKey($from);
		if ($arr[($c+1)]->getParentid() != 0) $arr = self::makeBreadcrumbsArray($arr[($c+1)]->getParentid(), $arr);
		return $arr;
	}
	
	public static function getPageName($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$cat = parent::doSelectPKey($id);
		return $cat->getName();
	}
	
	public static function getPagesForWebsite($idWebsite=0, $enabledOnly=false) {
		$id = (int) $idWebsite;
		if (!(bool) $id) $id = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $id);
		if ((bool) $enabledOnly) $conn->where(parent::COL_ENABLED, 1);
		return parent::doSelect($conn);
	}
	
	public static function getEnabledForWebsite($idWebsite=0) {
		$id = (int) $idWebsite;
		//if (!(bool) $id) $id = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_SYSTEM_WEBSITES_ID, $id);
		$conn->where(parent::COL_ENABLED, 1);
		return parent::doSelect($conn);
	}
	
	public static function getOnePage($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new PagesModel();
	}
	
	public static function setHomePage($id, $lang=0, $web=0) {
		$id = (int) $id;
		$lang = (int) $lang;
		$web = (int) $web;
		if (!(bool) $id) return false;
		if (!(bool) $lang) $lang = wgLang::getLanguageId();
		if (!(bool) $web) $web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->set(parent::COL_HOME, 0);
		$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, $lang);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		parent::doUpdate($conn);
		$conn = new wgConnector();
		$conn->set(parent::COL_HOME, 1);
		$conn->set(parent::COL_PARENTID, 0);
		$conn->where(parent::COL_ID, $id);
		parent::doUpdate($conn);
		return true;
	}
	
	private static $_temppages = array();
	
	public static function getAllExcept($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENTID, $id, '!=');
		$conn->order(parent::COL_HOME.' DESC, '.parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getSelectBoxTree($id=0, $except=0) {
		self::$_temppages = array();
		self::_fillTreeVar($id, 1, $except);
		return self::$_temppages;
	}
	
	private static function _fillTreeVar($start=0, $level=0, $except=0) {
		$start = (int) $start;
		$arr = self::getSubPages($start);
		if (!empty($arr)) foreach ($arr as $cat) {
			if ($cat->getId() != $except) {
				self::$_temppages[] = array($cat->getId(), self::_getSpacesByLevel($level).$cat->getName());
				self::_fillTreeVar($cat->getId(), ($level+1), $except);
			}
		}
	}
	
	public static function getSitemap($id=0) {
		self::$_temppages = NULL;
		self::_fillSitemapVar($id);
		return self::$_temppages;
	}
	
	private static function _fillSitemapVar($start=0) {
		$start = (int) $start;
		$arr = self::getSubPages($start);
		if (!empty($arr)) {
			self::$_temppages .= '<ul>';
			foreach ($arr as $cat) {
				$home = NULL;
				if ((bool) $cat->getHome()) $home = ' class="home"';
				self::$_temppages .= '<li'.$home.'><a href="'.wgPaths::getPagePath($cat->getId(), 'url').'">'.$cat->getName().'</a>'.self::_fillSitemapVar($cat->getId()).'</li>';
			}
			self::$_temppages .= '</ul>';
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
	
	
	public static function getParentPageId($id=0) {
		$id = (int) $id;
		$arr = parent::doSelectPKey($id);
		return (int) $arr->getParentid();
	}
		
	public static function getParentPage($id=0) {
		$id = (int) $id;
		return parent::doSelectPKey($id);
	}
	
	public static function getPagesOnSameLevel($id, $lang=NULL, $web=NULL) {
		$p = self::getParentPageId($id);
		return self::getSubPages($p);
	}
	
	public static function createHomePage() {
		$lang = (int) wgLang::getLanguageId();
		$web = (int) wgSystem::getCurrentWebsite();
		$save = array();
		$save['system_websites_id'] = $web;
		$save['system_language_id'] = $lang;
		$save['pages_templates_id'] = 'NULL';
		$save['name'] = 'Home Page';
		$save['identifier'] = 'home-page';
		$save['title'] = '';
		$save['heading1'] = '';
		$save['heading2'] = '';
		$save['heading3'] = '';
		$save['rewrite'] = '';
		$save['keywords'] = '';
		$save['description'] = '';
		$save['addtext1'] = '';
		$save['addtext2'] = '';
		$save['enabled'] = 1;
		$save['master'] = 0;
		$save['parentid'] = 0;
		$save['home'] = 1;
		$save['sort'] = 0;
		$save['head'] = '';
		$save['page'] = '';
		$save['note'] = '';
		$save['revision'] = 1;
		return (bool) parent::doInsert($save);
	}
	
	public static function checkHomePage() {
		$lang = wgLang::getLanguageId();
		$web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_HOME, 1);
		$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, $lang);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		//$conn->myWhere('('.parent::FULL_MASTER.' = 1 OR '.parent::FULL_SYSTEM_WEBSITES_ID.' = '.$web.')');
		$is = (bool) parent::doCount($conn);
		if (!$is) self::createHomePage();
		return true;
	}
	
	public static function getSubPages($id=0, $lang=NULL, $web=NULL) {
		$id = (int) $id;
		$lang = (int) $lang;
		$web = (int) $web;
		if (!(bool) $lang) $lang = wgLang::getLanguageId();
		if (!(bool) $web) $web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENTID, $id);
		$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, $lang);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$conn->order(parent::COL_HOME.' DESC, '.parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doSelect($conn);
	}
	
	public static function getSubPagesPager($id=0, $page=false, $limit=30, $lang=NULL, $web=NULL) {
		$id = (int) $id;
		$lang = (int) $lang;
		$web = (int) $web;
		if (!(bool) $lang) $lang = wgLang::getLanguageId();
		if (!(bool) $web) $web = wgSystem::getCurrentWebsite();
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENTID, $id);
		//$conn->myWhere('('.parent::FULL_SYSTEM_LANGUAGE_ID.' = '.$lang.' OR '.parent::FULL_MASTER.' = 1)');
		$conn->where(parent::COL_SYSTEM_LANGUAGE_ID, $lang);
		$conn->where(parent::COL_SYSTEM_WEBSITES_ID, $web);
		$conn->order(parent::COL_HOME.' DESC, '.parent::COL_SORT.' DESC, '.parent::COL_NAME.' ASC', false);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function countSubPages($id) {
		$id = (int) $id;
		$conn = new wgConnector();
		$conn->where(parent::COL_PARENTID, $id);
		return (int) parent::doCount($conn);
	}
	
	public static function getPublishedPages() {
		$conn = new wgConnector();
		$conn->where(parent::COL_ENABLED, 1);
		return parent::doSelect($conn);
	}
	
}
?>