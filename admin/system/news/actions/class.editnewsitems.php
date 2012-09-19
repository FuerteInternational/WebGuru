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
 * @since        19. February 2009
 */
final class editnewsitemsActionsNews extends BaseActions {
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
		parent::$_onSaveParam = array('page'=>'news');       // After save
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
		
			if ($mand) {
				$ok = (bool) self::doSaveNewsItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteNewsItems(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "news_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveNewsItems() {
		$save = array();
		$save['news_categories_id'] = (int) wgPost::getValue('news_categories_id');
		$save['name'] = wgPost::getValue('name');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['head'] = wgPost::getValue('head');
		$save['text'] = wgPost::getValue('text');
		$save['displayfrom'] = wgPost::getValue('displayfrom');
		$save['displayto'] = wgPost::getValue('displayto');
		$save['datefor'] = wgPost::getValue('datefor');
		$save['system_users_id'] = wgUsers::getId();
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) NewsItemsModel::doUpdate($save);
		}
		else return (bool) NewsItemsModel::doInsert($save);
	}

	/**
	 * Delete function for table "news_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteNewsItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) NewsItemsModel::doDelete($id);
	}
	
}

?>