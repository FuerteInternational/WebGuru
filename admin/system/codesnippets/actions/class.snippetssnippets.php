<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/codesnippets/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        6. August 2009
 */
final class snippetssnippetsActionsCodesnippets extends BaseActions {
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
		
		self::$_par = array();
		self::$_par['edit'] = 0;
		
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
				$ok = (bool) self::doSaveCsnippetsSnippets();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteCsnippetsSnippets(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "csnippets_snippets"
	 *
	 * @return bool Success
	 */
	private static function doSaveCsnippetsSnippets() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['approved'] = (int) wgPost::getValue('approved');
		$save['snippet'] = wgPost::getValue('snippet');
		$save['excerpt'] = wgPost::getValue('excerpt');
		$save['description'] = wgPost::getValue('description');
		$save['keywords'] = wgPost::getValue('keywords');
		$save['csnippets_categories_id'] = (int) wgPost::getValue('csnippets_categories_id');
		wgSessions::setModuleValue('cat', $save['csnippets_categories_id']);
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		$save['system_users_id'] = wgUsers::getId();
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) CsnippetsSnippetsModel::doUpdate($save);
		}
		else {
			$id = (int) CsnippetsSnippetsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "csnippets_snippets"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteCsnippetsSnippets($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) CsnippetsSnippetsModel::doDelete($id);
	}
	
}

?>