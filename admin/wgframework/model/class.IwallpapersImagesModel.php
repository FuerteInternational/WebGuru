<?php
/**
 * Database class for table iwallpapers_images
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/iwallpapers_images
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. January 2010 11:32:49
 */

class IwallpapersImagesModel extends BaseIwallpapersImagesModel {
	
	
	// --------------------- Predefined functions for IwallpapersImages ---------------------

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
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getOneSelfData($idIwallpapersImages) {
		$id = (int) $idIwallpapersImages;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IwallpapersImagesModel();
	}
	
	public function getSafeName() {
		return wgText::safeText($this->getName());
	}
	
}
?>