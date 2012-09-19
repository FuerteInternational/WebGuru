<?php
/**
 * Database class for table blog_categories
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog_categories
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        23. June 2009 11:28:44
 */

class BlogCategoriesModel extends BaseBlogCategoriesModel {
	
	public static function getCategoriesForBlog($blogId) {
		$id = (int) $blogId;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_ID, $id);
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	public static function getSubCategoriesForBlog($cat, $blogId, $sort='ASC') {
		$id = (int) $cat;
		$blog = (int) $blogId;
		if ($sort != 'ASC') $sort = 'DESC';
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_ID, $blog);
		$conn->order(parent::COL_NAME, $sort);
		return parent::doSelect($conn);
	}
	
	public static function getCategoriesPagerForBlog($page, $blogId, $limit=20) {
		$id = (int) $blogId;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_ID, $id);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page, $limit);
	}
	
	public function getArticles() {
		return (int) BlogPostsModel::getCountArticlesInCat($this->getId());
	}
	
	
}
?>