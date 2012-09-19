<?php
/**
 * Database class for table blog_files
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog_files
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        24. June 2009 18:52:35
 */

class BlogFilesModel extends BaseBlogFilesModel {
	
	public static function getLastFreeId() {
		$conn = new wgConnector();
		$conn->order(parent::COL_ID, 'DESC');
		$conn->limit(1);
		$res = parent::doSelect($conn);
		if (isset($res[0])) return $res[0]->getId();
		else return 0;
	}
	
	public static function getFilesForPost($idPost, $order='DESC') {
		$id = (int) $idPost;
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_POSTS_ID, $id);
		$conn->order(parent::COL_ADDED, $order);
		return parent::doSelect($conn);
	}
	
	public static function setDownload($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$conn->set(parent::COL_DOWNLOADS, 'ADD()');
		return (bool) parent::doUpdate($conn);
	}
	
	public static function setView($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $id);
		$conn->set(parent::COL_VIEWS, 'ADD()');
		return (bool) parent::doUpdate($conn);
	}
	
	public static function deleteFilesForArticle($idArticle) {
		$arr =  self::getFilesForPost($idArticle);
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_POSTS_ID, $idArticle);
		parent::doDelete($conn);
		return $arr;
	}
	
	public static function deleteFile($idFile) {
		$idFile = (int) $idFile;
		$arr =  parent::doSelectPKey($idFile);
		$conn = new wgConnector();
		$conn->where(parent::COL_ID, $idFile);
		parent::doDelete($conn);
		return $arr;
	}
	
	
}
?>