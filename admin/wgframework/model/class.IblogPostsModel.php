<?php
/**
 * Database class for table iblog_posts
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/iblog_posts
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. November 2009 11:35:49
 */

class IblogPostsModel extends BaseIblogPostsModel {
	
	
	// --------------------- Predefined functions for IblogPosts ---------------------
	
	
	public static function deletePostsForBlog($idBlog) {
		$conn = new wgConnector();
		$conn->where(parent::COL_IBLOG_BLOGS_ID, (int) $idBlog);
		return parent::doDelete($conn);
	}
	
	public static function getDataForBlog($idBlog, $order='DESC') {
		$conn = new wgConnector();
		$conn->where(parent::COL_IBLOG_BLOGS_ID, (int) $idBlog);
		$conn->order(parent::COL_ADDED, $order);
		$conn->limit(25);
		return parent::doSelect($conn);
	}
	

	
	/*
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	/*
	public static function getOneSelfData($idIblogPosts) {
		$id = (int) $idIblogPosts;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IblogPostsModel();
	}
	//*/
	
}
?>