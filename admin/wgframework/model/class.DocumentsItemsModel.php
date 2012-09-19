<?php
/**
 * Database class for table documents_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/documents_items
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. February 2009 15:46:40
 */

class DocumentsItemsModel extends BaseDocumentsItemsModel {
	
	public static function getStringFileSize($size=0, $how=1024) {
		if ($size == 0) return '0 B';
		if ($how == 1024) return round($size / $how, 2).' Kb';
		elseif ($how == 1000000) return round($size / $how, 2).' Mb';
		else return round($size / $how, 2);
	}
	
	public function getIcon() {
		return wgIcons::getFileIco($this->getFile(), $this->getFile());
	}
	
	public function getIconExtension() {
		return wgIcons::getFileIcoExtension($this->getFile());
	}
	
	public function getDownloadLink() {
		return wgPaths::makeFrontLink(array('download'=>$this->getId()));
	}
	
	public static function getItemsInCat($cat=0, $limit=0, $all=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$c = new wgConnector();
		$c->where(parent::COL_DOCUMENTS_CATEGORIES_ID, $cat);
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doSelect($c);
	}
	
	public static function getItemsInCatPager($cat=0, $page=0, $limit=0, $all=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$c = new wgConnector();
		$c->where(parent::COL_DOCUMENTS_CATEGORIES_ID, $cat);
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doPager($c, $page);
	}
	
	public static function getFavoriteItems($limit=0, $all=true) {
		return self::getItems($limit, $all);
	}
	
	public static function getFavoriteItemsPager($page=0, $limit=0, $all=true) {
		return self::getItemsPager($page, $limit, $all);
	}
	
	public static function getItems($limit=0, $all=true) {
		$limit = (int) $limit;
		$c = new wgConnector();
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doSelect($c);
	}
	
	public static function getItemsPager($page=0, $limit=0, $all=true) {
		$limit = (int) $limit;
		$c = new wgConnector();
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doPager($c, $page);
	}
	
	
}
?>