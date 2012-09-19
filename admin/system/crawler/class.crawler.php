<?php
/**
 * Main class for module Crawler
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        17. February 2009
 */

class moduleCrawler extends dbModelCrawler {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Crawler';
		$this->code    = 'crawler';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		require('class.crawler.php');
	}
	
	// ------------------------- class functions -------------------------
	
	public static function crawlWebsite($id=0) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$cr = new crawler();
		$web = CrawlerWebsitesModel::doSelectPKey($id); wgError::add($web->getUrl(), 2);
		$results = $cr->getResult($web->getUrl());
		
		print_r($results);
		exit();
	}
	
}
		
?>