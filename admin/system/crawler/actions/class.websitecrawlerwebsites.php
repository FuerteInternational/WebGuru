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
 * @since        17. February 2009
 */
final class websitecrawlerwebsitesActionsCrawler extends BaseActions {
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
		parent::$_onSaveParam = array('page'=>'index');       // After save
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
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('url')) { wgError::add('nourl');
				$mand = false;
			}
			
			if ($mand) {
				$ok = (bool) self::doSaveCrawlerWebsites();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCrawlerWebsites(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "crawler_websites"
	 *
	 * @return bool Success
	 */
	private static function doSaveCrawlerWebsites() {
		$save = array();
		$save['crawler_categories_id'] = (int) wgPost::getValue('crawler_categories_id');
		$save['name'] = wgPost::getValue('name');
		$save['url'] = wgPost::getValue('url');
		$save['description'] = wgPost::getValue('description');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		//$save['crawled'] = wgPost::getValue('crawled');
		//$save['cached'] = wgPost::getValue('cached');
		$save['users_id'] = (int) wgPost::getValue('users_id');
		$save['system_users_id'] = (int) wgUsers::getId();
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) CrawlerWebsitesModel::doUpdate($save);
		}
		else return (bool) CrawlerWebsitesModel::doInsert($save);
	}

	/**
	 * Delete function for table "crawler_websites"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCrawlerWebsites($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(CrawlerWebsitesModel::PRIMARY_KEY, $id);
		//return (bool) CrawlerWebsitesModel::doDelete($conn);
		return (bool) CrawlerWebsitesModel::doDelete($id);
	}
	
}

?>