<?php
/**
 * Database class for table blog_groups
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog_groups
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        23. June 2009 11:28:44
 */

class BlogGroupsModel extends BaseBlogGroupsModel {
	
	public static function getGroupsForBlog($idBlog) {
		$id = (int) $idBlog;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_ID, $idBlog);
		return parent::doSelect($conn);
	}
	
	public static function getGroupsPagerForBlog($page, $idBlog, $limit=20) {
		$id = (int) $idBlog;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_ID, $idBlog);
		return parent::doPager($conn, $page, $limit);
	}
	
	
}
?>