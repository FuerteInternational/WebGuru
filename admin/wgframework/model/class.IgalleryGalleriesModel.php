<?php
/**
 * Database class for table igallery_galleries
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/igallery_galleries
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        29. October 2009 10:21:35
 */

class IgalleryGalleriesModel extends BaseIgalleryGalleriesModel {
	
	
	// --------------------- Predefined functions for IgalleryGalleries ---------------------

	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idIgalleryGalleries) {
		$id = (int) $idIgalleryGalleries;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IgalleryGalleriesModel();
	}
	
	public static function getGalleryByCode($code, $type='iPhone') {
		if ((bool) $code) {
			$conn = new wgConnector();
			$conn->where(parent::COL_CODE, self::_getCode($code, $type));
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IgalleryGalleriesModel();
	}
	
	public static function getGalleryIdByCode($code, $type='iPhone') {
		$g = self::getGalleryByCode($code);
		return (int) $g->getId();
	}
	
	private static function _getCode($code, $type='iPhone') {
		return wgText::safeText($type.'-'.$code);
	}
	
	public static function isGalleryWithCode($code, $type='iPhone') {
		if ((bool) $code) {
			$conn = new wgConnector();
			$conn->where(parent::COL_CODE, self::_getCode($code, $type));
			return parent::doCount($conn);
		}
		else return 0;
	}
	
	public static function setNewGalleryForCode($code, $type='iPhone') {
		$save = array();
		$save['name'] = $code;
		$save['code'] = self::_getCode($code, $type);
		$save['users_id'] = 0;
		$save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		return (int) parent::doInsert($save);
	}
	
	
}
?>