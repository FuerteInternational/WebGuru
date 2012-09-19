<?php
/**
 * Database class for table tinyurls_urls
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/tinyurls_urls
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        25. June 2009 17:32:10
 */

class TinyurlsUrlsModel extends BaseTinyurlsUrlsModel {
	
	public static function createUrl($url) {
		$url = trim($url);
		if (!wgUrl::validateUrl($url) && false) return false;
		else {
			$ex = (int) self::getIdByUrl($url);
			if ((bool) $ex) return $ex; 
			$save[parent::COL_URL] = trim($url);
			$save[parent::COL_ADDED] = 'NOW()';
			$save[parent::COL_SYSTEM_WEBSITES_ID] = wgSystem::getCurrentWebsite();
			return (int) parent::doInsert($save);
		}
	}
	
	public static function getUrlById($id) {
		$id = (int) $id;
		$url = parent::doSelectPKey($id);
		return $url->getUrl();
	}
	
	public static function getIdByUrl($url) {
		$url = trim($url);
		if (!wgUrl::validateUrl($url)) return false;
		$conn = new wgConnector();
		$conn->where(parent::FULL_URL, $url, '=');
		$conn->limit(1);
		$obj = parent::doSelect($conn);
		if (!isset($obj[0])) return false;
		return (int) $obj[0]->getId();
	}
	
	public static function addPreview($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->set(parent::COL_PREVIEWS, 'ADD()');
		$conn->where(parent::COL_ID, $id);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function addClick($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->set(parent::COL_CLICKS, 'ADD()');
		$conn->where(parent::COL_ID, $id);
		return (bool) parent::doUpdate($conn);
	}
	
}
?>