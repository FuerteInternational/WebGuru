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
final class editpagepagesActionsPages extends BaseActions {
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
		parent::$_onSaveParam = 'page=index&parent='.wgPost::getValue('parentid');       // After save
		parent::$_onApplyParam = 'page=editpage';      // After apply
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
		global $mod;
		$save = array();
		//if (wgPost::isValue('system_websites_id')) $save['system_websites_id'] = wgPost::getValue('system_websites_id');
		$save['system_websites_id'] = wgSystem::getCurrentWebsite();
		//if (wgPost::isValue('system_language_id')) $save['system_language_id'] = wgPost::getValue('system_language_id');
		$save['system_language_id'] = wgLang::getLanguageId();
		
		if (wgPost::isValue('pages_templates_id')) $save['pages_templates_id'] = wgPost::getValue('pages_templates_id');
		//PagesModel::getParentTemplateRecursively(1);
		if (wgPost::isValue('name')) $save['name'] = wgPost::getValue('name');
		if (wgPost::isValue('identifier')) $save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		if (wgPost::isValue('title')) $save['title'] = wgPost::getValue('title');
		if (wgPost::isValue('heading1')) $save['heading1'] = wgPost::getValue('heading1');
		if (wgPost::isValue('heading2')) $save['heading2'] = wgPost::getValue('heading2');
		if (wgPost::isValue('heading3')) $save['heading3'] = wgPost::getValue('heading3');
		if (wgPost::isValue('rewrite')) $save['rewrite'] = wgPost::getValue('rewrite');
		if (wgPost::isValue('keywords')) $save['keywords'] = wgPost::getValue('keywords');
		if (wgPost::isValue('description')) $save['description'] = wgPost::getValue('description');
		if (wgPost::isValue('addtext1')) $save['addtext1'] = wgPost::getValue('addtext1');
		if (wgPost::isValue('addtext2')) $save['addtext2'] = wgPost::getValue('addtext2');
		if (wgPost::isValue('enabled')) $save['enabled'] = wgPost::getValue('enabled');
		if (wgPost::isValue('parentid')) $save['parentid'] = wgPost::getValue('parentid');
		if ($save['parentid'] == PagesModel::getHomeId()) $save['parentid'] = 0;
		if (wgPost::isValue('sort')) $save['sort'] = wgPost::getValue('sort');
		if (wgPost::isValue('head')) $save['head'] = wgPost::getValue('head');
		if (wgPost::isValue('page')) $save['page'] = wgPost::getValue('page');
		if (wgPost::isValue('note')) $save['note'] = wgPost::getValue('note');
		if (wgPost::isValue('redirect1')) $save['redirect1'] = (int) wgPost::getValue('redirect1');
		if (wgPost::isValue('redirect2')) $save['redirect2'] = (int) wgPost::getValue('redirect2');
		if (wgPost::isValue('redirect3')) $save['redirect3'] = (string) wgPost::getValue('redirect3');
		if (wgPost::isValue('redirect4')) $save['redirect4'] = (string) wgPost::getValue('redirect4');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = (int) wgPost::getValue('edit');
			if (wgPost::isValue('redirect1')) if ($save['redirect1'] == $save['where']) {
				$save['redirect1'] = 0;
				wgError::add('redirecttosamepage');
			}
			if (wgPost::isValue('redirect2')) if ($save['redirect2'] == $save['where']) {
				$save['redirect2'] = 0;
				wgError::add('redirecttosamepage');
			}
			$mPag = $mod->runModule('pages');
			$save['revision'] = (modulePages::getPageRevision($save['where']) + 1);
			$ok = (bool) PagesModel::doUpdate($save);
			$id = $save['where'];
		}
		else {
			$save['revision'] = 1;
			$ok = (int) PagesModel::doInsert($save);
			$id = $ok;
		}
		if (isset($save['where'])) unset($save['where']);
		$save['pages_id'] = $id;
		PagesRevisionsModel::doInsert($save);
		return (bool) $ok;
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