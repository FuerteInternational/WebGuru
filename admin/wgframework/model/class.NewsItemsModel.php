<?php
/**
 * Database class for table news_items
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/news_items
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. February 2009 18:32:07
 */

class NewsItemsModel extends BaseNewsItemsModel {
	
	public function getTitle() {
		return $this->getName();
	}
	
	public function getDate() {
		return wgSystem::formatDate($this->getDatefor());
	}
	
	public function getPerex() {
		return $this->getHead();
	}
	
	public function getSafeName() {
		return wgText::safeText($this->getName());
	}
	
	public function getContent() {
		return $this->getText();
	}
	
	public function getAuthor() {
		$usr = SystemUsersModel::doSelectPKey($this->getSystemUsersId());
		return $usr->getLastname().', '.$usr->getFirstname();
	}
	
	public static function getLatestArticle($cat=0, $front=true) {
		$cat = (int) $cat;
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_NEWS_CATEGORIES_ID, $cat);
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		$conn->order(parent::COL_DATEFOR, 'DESC');
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else {
			$c = new NewsItemsModel();
			return $c;
		}
	}
	
	public static function getRandomArticle($cat=0, $front=true) {
		$cat = (int) $cat;
		$conn = new wgConnector();
		if ((bool) $cat) $conn->where(parent::COL_NEWS_CATEGORIES_ID, $cat);
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		$conn->rand();
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) return $ret[0];
		else {
			$c = new NewsItemsModel();
			return $c;
		}
	}
	
	public static function getArticlesPagerInCat($cat=0, $page=0, $limit=20, $front=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_NEWS_CATEGORIES_ID, $cat);
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		$conn->order(parent::COL_DATEFOR);
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getArticlesInCat($cat=0, $limit=0, $front=true) {
		$cat = (int) $cat;
		$limit = (int) $limit;
		$conn = new wgConnector();
		$conn->where(parent::COL_NEWS_CATEGORIES_ID, $cat);
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		if ((bool) $limit) $conn->limit($limit);
		$conn->order(parent::COL_DATEFOR);
		return parent::doSelect($conn);
	}
	
	public static function getArticlesPager($page=0, $limit=20, $front=true) {
		$limit = (int) $limit;
		$conn = new wgConnector();
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		$conn->order(parent::COL_DATEFOR, 'DESC');
		return parent::doPager($conn, $page, $limit);
	}
	
	public static function getArticles($limit=0, $front=true) {
		$limit = (int) $limit;
		$conn = new wgConnector();
		if ((bool) $front) {
			$conn->where(parent::COL_DISPLAYFROM, date('Y-m-d H:i:s'), '<');
			$conn->where(parent::COL_DISPLAYTO, date('Y-m-d H:i:s'), '>');
		}
		if ((bool) $limit) $conn->limit($limit);
		$conn->order(parent::COL_DATEFOR);
		return parent::doSelect($conn);
	}
	
	public static function getItemsPagerByCat($cat=0, $page=0) {
		return self::getArticlesPagerInCat($cat, $page, 20, false);
	}
	
}
?>