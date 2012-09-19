<?php
/**
 * Database class for table igallery_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/igallery_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        29. October 2009 10:21:35
 */

class IgalleryItemsModel extends BaseIgalleryItemsModel {
	
	
	// --------------------- Predefined functions for IgalleryItems ---------------------

	public static function addNewPictureToGallery($gallery, $smallId, $filename, $ofilename, $name, $caption, $exif, $time) {
		$save = array();
		$save['smallid'] = (int) $smallId;
		$save['name'] = wgText::secureSingleQuotes($name);
		$save['caption'] = wgText::secureSingleQuotes($caption);
		$save['file'] = $filename;
		$save['longitude'] = 0;
		$save['latitude'] = 0;
		$save['igallery_galleries_id'] = (int) $gallery;
		$save['exif'] = wgText::secureSingleQuotes($exif);
		$save['added'] = date('Y-m-d H:i:s', $time);
		$save['changed'] = 'NOW()';
		return (int) parent::doInsert($save);
	}
	
	public static function getLastFreeId() {
		$conn = new wgConnector();
		$conn->order(parent::COL_ID, 'DESC');
		$conn->limit(1);
		$res = parent::doSelect($conn);
		if (isset($res[0])) return $res[0]->getId();
		else return 0;
	}
	
	public static function getIdFromSmallid($smallId) {
		$conn = new wgConnector();
		$conn->where(parent::COL_SMALLID, (int) $smallId);
		$conn->limit(1);
		$res = parent::doSelect($conn);
		if (isset($res[0])) return $res[0]->getId();
		else return 0;
	}
	
	public static function getSelfData($idGallery) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IGALLERY_GALLERIES_ID, (int) $idGallery);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doSelect($conn);
	}
	
	public static function getSelfPagerData($idGallery, $page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		$conn->where(parent::COL_IGALLERY_GALLERIES_ID, (int) $idGallery);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function deleteImage($id) {
		$id = (int) $id;
		if (!(bool) $id) return new IgalleryItemsModel();
		$im = self::getOneSelfData($id);
		if (!(bool) $im->getId()) return new IgalleryItemsModel();
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		parent::doDelete($conn);
		return $im;
	}
	
	public static function getOneSelfData($idIgalleryItems) {
		$id = (int) $idIgalleryItems;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IgalleryItemsModel();
	}
	
	public static function getRandomPicture($idGallery=NULL) {
		$id = (int) $idGallery;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_IGALLERY_GALLERIES_ID, $id);
		$conn->rand();
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IgalleryItemsModel();
	}
	
	public static function getLatestPicture($idGallery=NULL) {
		$id = (int) $idGallery;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_IGALLERY_GALLERIES_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IgalleryItemsModel();
	}
	
}
?>