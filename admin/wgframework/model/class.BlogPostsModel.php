<?php
/**
 * Database class for table blog_posts
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/blog_posts
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        27. February 2009 12:39:28
 */

class BlogPostsModel extends BaseBlogPostsModel {
	
	public static function getArchives($limit=NULL, $order='DESC', $format='%Y %M') {
		//$id = (int) $category;
		if ($order != 'DESC') $order = 'ASC';
		// SELECT DATE_FORMAT(creationDate, '%Y-%m') AS month, COUNT(*) AS total FROM myTable GROUP BY month ORDER BY total DESC LIMIT 5;
		$fields = array();
		$fields[] = "*";
		$fields[] = "DATE_FORMAT(added, '%Y-%m') AS month";
		$fields[] = "COUNT(id) AS total";
		$fields[] = "DATE_FORMAT(added, '$format') AS mymonth";
		$conn = new wgConnector();
		$conn->order('month', $order);
		$conn->group('month');
		return parent::doSelect($conn, $fields);
	}
	
	public static function getLatestOne($category=0) {
		$id = (int) $category;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new BlogPostsModel(); 
	}
	
	public static function getRandomOne($category=0) {
		$id = (int) $category;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		$conn->order('RAND()', false);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else return new BlogPostsModel(); 
	}
	
	public static function getFeaturedArticles($cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_BLOG_CATEGORIES_ID, (int) $cat);
		$conn->where(parent::COL_FEATURED, 1);
		$conn->where(parent::COL_ADDED, date('Y-m-d H:i:s', strtotime('-1 month')), '>');
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_ADDED.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_ADDED.')', $parts[1], '=');
			}
		}
		$conn->order(parent::COL_ADDED, $order);
		$conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getFrontendArticles($cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_BLOG_CATEGORIES_ID, (int) $cat);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_ADDED.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_ADDED.')', $parts[1], '=');
			}
		}
		$conn->order(parent::COL_ADDED, $order);
		$conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getFrontendArticlesPager($page, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_BLOG_CATEGORIES_ID, (int) $cat);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_ADDED.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_ADDED.')', $parts[1], '=');
			}
		}
		$conn->order(parent::COL_ADDED, $order);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getFrontendArticlesSearch($search, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = self::_getSearchConnector($search, $cat, $order);
		$conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getFrontendArticlesSearchPager($search, $page, $cat=0, $order='DESC', $limit=10, $date=NULL) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 10; 
		if ($order != 'DESC') $order = 'ASC';
		$conn = self::_getSearchConnector($search, $cat, $order);
		return parent::doPager($conn, $page, $limit);
	}
	
	private static function _getSearchConnector($search, $cat, $order, $date=NULL) {
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_BLOG_CATEGORIES_ID, (int) $cat);
		$conn->myWhere(parent::COL_CONTENT_FILTERED.' LIKE \'%'.$search.'%\'');
		$conn->order(parent::COL_ADDED, $order);
		if (!empty($date)) {
			$parts = explode('-', $date);
			if (isset($parts[0]) && isset($parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
				$conn->where('YEAR('.parent::COL_ADDED.')', $parts[0], '=');
				$conn->where('MONTH('.parent::COL_ADDED.')', $parts[1], '=');
			}
		}
		return $conn;
	}
	
	
	public static function getCountArticlesGroupsInCat($idCategory) {
		$id = (int) $idCategory;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		$conn->group(parent::COL_BLOG_GROUPS_ID);
		return (int) parent::doCount($conn);
	}
	
	public static function getCountArticlesInCat($idCategory) {
		$id = (int) $idCategory;
		$conn = new wgConnector();
		$conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		return (int) parent::doCount($conn);
	}
	
	public static function getArticlesInCat($idCategory=0, $limit=0, $strict=true) {
		$id = (int) $idCategory;
		$limit = (int) $limit;
		$conn = new wgConnector();
		if ((bool) $idCategory || (bool) $strict) $conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		if ((bool) $limit) $conn->limit($limit);
		return parent::doSelect($conn);
	}
	
	public static function getArticlesPagerInCat($page, $idCategory, $idBlog, $limit=5) {
		$id = (int) $idCategory;
		$blog = (int) $idBlog; 
		$conn = new wgConnector();
		if ((bool) $blog) $conn->where(parent::COL_BLOG_ID, $blog);
		if ((bool) $id) $conn->where(parent::COL_BLOG_CATEGORIES_ID, $id);
		$conn->order(parent::COL_ADDED, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public function getDate() {
		return wgSystem::formatDate($this->getAdded());
	}
	
	public function getModified() {
		return wgSystem::formatDate($this->getChanged());
	}
	
	public function getAuthor() {
		if ((bool) $this->getUsersId()) return UsersModel::getFullNameCached($this->getUsersId());
		else if ((bool) $this->getSystemUsersId()) return SystemUsersModel::getFullNameCached($this->getSystemUsersId());
		else return UNDEFINED;
	}
	
	public static function parseText($text) {
		$text = wgHtml::parseUrlsToLinks($text);
		return $text;
	}
	
	public function getArtImage() {
		$urlPath = wgPaths::getUserfilesPath('url', $this->getAdded()).'blog-article-'.$this->getId();
		$ftpPath = wgPaths::getUserfilesPath('ftp', $this->getAdded()).'blog-article-'.$this->getId();
		if (file_exists($ftpPath)) return $urlPath;
		else return NULL;
	}
	
	public function getDay() {
		return date('j', $this->getAdded());
	}
	
	public function getMonth() {
		return date('n', $this->getAdded());
	}
	
	public function getDayShort() {
		return date('D', $this->getAdded());
	}
	
	public function getMonthShort() {
		return date('M', $this->getAdded());
	}
	
	public function getDayFull() {
		return date('l', $this->getAdded());
	}
	
	public function getMonthFull() {
		return date('F', $this->getAdded());
	}
	
	public function getYear() {
		return date('Y', $this->getAdded());
	}
	
	public function getArtImageFull() {
		$path = $this->getArtImage();
		if (!(bool) $path) $path = $this->getCatImageSmall();
		return '<img src="'.$path.'" alt="'.$this->getName().'" />';
	}
	
	public function getParsedExcerpt() {
		return self::parseText($this->getExcerpt());
	}
	
	public function getParsedContent() {
		return self::parseText($this->getContent());
	}
	
	public function getArchiveSortDate() {
		return $this->getFieldByName('month');
	}
	
	public function getArchiveDate() {
		return $this->getFieldByName('mymonth');
	}
	
	public function getArchiveTotal() {
		return (int) $this->getFieldByName('total');
	}
	
	public function getCatImageXsmall() {
		return moduleBlog::getCategoryPicturePath($this->getBlogCategoriesId(), 'xsmall');
	}
	
	public function getCatImageSmall() {
		return moduleBlog::getCategoryPicturePath($this->getBlogCategoriesId(), 'small');
	}
	
	public function getCatImageMedium() {
		return moduleBlog::getCategoryPicturePath($this->getBlogCategoriesId(), 'medium');
	}
	
	public function getCatImageLarge() {
		return moduleBlog::getCategoryPicturePath($this->getBlogCategoriesId(), 'large');
	}
	
	public function getCatImageOriginal() {
		return moduleBlog::getCategoryPicturePath($this->getBlogCategoriesId(), 'original');
	}
}
?>