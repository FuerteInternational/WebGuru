<?php
/**
 * Database class for table crawler_results
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/crawler_results
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 18:02:18
 */

class CrawlerResultsModel extends BaseCrawlerResultsModel {
	
	public static function getPagesPagerForWebsite($website=0, $page=0) {
		$id = (int) $website;
		$conn = new wgConnector();
		$conn->where(parent::COL_CRAWLER_WEBSITES_ID, $id);
		$conn->order(parent::COL_TITLE);
		return parent::doPager($conn, $page);
	}
	
	
}
?>