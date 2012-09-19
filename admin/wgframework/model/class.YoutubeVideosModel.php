<?php
/**
 * Database class for table youtube_videos
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/youtube_videos
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        3. March 2009 11:29:07
 */

class YoutubeVideosModel extends BaseYoutubeVideosModel {
	
	public static function getItemsInCat($cat=0, $limit=0, $all=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$c = new wgConnector();
		$c->where(parent::COL_YOUTUBE_CATEGORIES_ID, $cat);
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doSelect($c);
	}
	
	public static function getItemsInCatPager($cat=0, $page=0, $limit=0, $all=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$c = new wgConnector();
		$c->where(parent::COL_YOUTUBE_CATEGORIES_ID, $cat);
		if (!(bool) $all) $c->where(parent::COL_ENABLED, 1);
		$c->order(parent::COL_NAME);
		if ((bool) $limit) $c->limit($limit);
		return parent::doPager($c, $page);
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