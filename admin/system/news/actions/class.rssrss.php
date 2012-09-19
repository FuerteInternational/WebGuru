<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        20. February 2009
 */
final class rssrssActionsNews extends BaseActions {
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
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
			if ($mand) {
				$ok = (bool) self::doSaveNewsRss();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteNewsRss(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "news_rss"
	 *
	 * @return bool Success
	 */
	private static function doSaveNewsRss() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['version'] = wgPost::getValue('version');
		$save['news_categories_id'] = wgPost::getValue('news_categories_id');
		$save['showitems'] = wgPost::getValue('showitems');
		$save['link'] = wgPost::getValue('link');
		$save['folder'] = wgPost::getValue('folder');
		$save['description'] = wgPost::getValue('description');
		$save['displaylanguage'] = wgPost::getValue('displaylanguage');
		$save['copyright'] = wgPost::getValue('copyright');
		$save['ttl'] = wgPost::getValue('ttl');
		$save['image'] = wgPost::getValue('image');
		$save['imagetitle'] = wgPost::getValue('imagetitle');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) NewsRssModel::doUpdate($save);
		}
		else return (bool) NewsRssModel::doInsert($save);
	}

	/**
	 * Delete function for table "news_rss"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteNewsRss($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(NewsRssModel::PRIMARY_KEY, $id);
		//return (bool) NewsRssModel::doDelete($conn);
		return (bool) NewsRssModel::doDelete($id);
	}
	
}

?>