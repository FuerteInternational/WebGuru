<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        18. February 2009
 */
final class crawlercrawlerActionsCrawler extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::__construct();
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = NULL;      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		
		// filling parameters with data
		self::$_par = array();
		//Array
		
		// init the process
		parent::$_ok = (bool) $this->doCrawlWebsites();
	}
	
	// functions ---------------------------------------------------------------------------
	
	private static function doCrawlWebsites() {
		global $mod;
		$mod->runModule('crawler');
		$webs = wgPost::getValue('web');
		if (!empty($webs) || is_array($webs)) foreach ($webs as $wid=>$v) {
			moduleCrawler::crawlWebsite($wid);
		}
		return true;
	}
	
}

?>