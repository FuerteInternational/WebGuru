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
final class sitemapsresultsActionsCrawler extends BaseActions {
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
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			
			if ($mand) {
				$ok = (bool) self::doSaveCrawlerResults();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCrawlerResults(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "crawler_results"
	 *
	 * @return bool Success
	 */
	private static function doSaveCrawlerResults() {
		$save = array();
		$save['addr'] = wgPost::getValue('addr');
		$save['root'] = wgPost::getValue('root');
		$save['crawler_websites_id'] = wgPost::getValue('crawler_websites_id');
		$save['arank'] = wgPost::getValue('arank');
		$save['level'] = wgPost::getValue('level');
		$save['text'] = wgPost::getValue('text');
		$save['title'] = wgPost::getValue('title');
		$save['h1'] = wgPost::getValue('h1');
		$save['keywords'] = wgPost::getValue('keywords');
		$save['description'] = wgPost::getValue('description');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['image'] = wgPost::getValue('image');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) CrawlerResultsModel::doUpdate($save);
		}
		else return (bool) CrawlerResultsModel::doInsert($save);
	}

	/**
	 * Delete function for table "crawler_results"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCrawlerResults($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(CrawlerResultsModel::PRIMARY_KEY, $id);
		//return (bool) CrawlerResultsModel::doDelete($conn);
		return (bool) CrawlerResultsModel::doDelete($id);
	}
	
}

?>