<?php
/**
 * Database class for table crawler_websites
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/crawler_websites
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 18:02:18
 */

class CrawlerWebsitesModel extends BaseCrawlerWebsitesModel {
	
	public static function getWebsitesPagerByCat($cat=0, $page=0) {
		$cat = (int) $cat;
		$conn = new wgConnector();
		$conn->where(parent::COL_CRAWLER_CATEGORIES_ID, $cat);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
	
	
}
?>