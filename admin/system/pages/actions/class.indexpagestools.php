<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        10. December 2008
 */
final class indexpagestoolsActionsPages extends BaseActions {
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
		$this->_init();
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
				$ok = (bool) self::doSavePages();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeletePages(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "pages"
	 *
	 * @return bool Success
	 */
	private static function doSavePages() {
		$save = array();
		$save['system_websites_id'] = wgPost::getValue('system_websites_id');
		$save['system_language_id'] = wgPost::getValue('system_language_id');
		$save['pages_templates_id'] = wgPost::getValue('pages_templates_id');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['title'] = wgPost::getValue('title');
		$save['heading1'] = wgPost::getValue('heading1');
		$save['heading2'] = wgPost::getValue('heading2');
		$save['heading3'] = wgPost::getValue('heading3');
		$save['rewrite'] = wgPost::getValue('rewrite');
		$save['keywords'] = wgPost::getValue('keywords');
		$save['description'] = wgPost::getValue('description');
		$save['addtext1'] = wgPost::getValue('addtext1');
		$save['addtext2'] = wgPost::getValue('addtext2');
		$save['enabled'] = wgPost::getValue('enabled');
		$save['parentid'] = wgPost::getValue('parentid');
		$save['sort'] = wgPost::getValue('sort');
		$save['head'] = wgPost::getValue('head');
		$save['page'] = wgPost::getValue('page');
		$save['note'] = wgPost::getValue('note');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) PagesModel::doUpdate($save);
		}
		else return (bool) PagesModel::doInsert($save);
	}

	/**
	 * Delete function for table "pages"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeletePages($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(PagesModel::PRIMARY_KEY, $id);
		//return (bool) PagesModel::doDelete($conn);
		return (bool) PagesModel::doDelete($id);
	}
	
}

?>