<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. April 2009
 */
final class messagesmessagesActionsForms extends BaseActions {
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
		self::$_par['edit'] = 0;
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
				$ok = (bool) self::doSaveFormsMessages();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteFormsMessages(wgGet::getValue('delete'));
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
	 * Save/Update function for table "forms_messages"
	 *
	 * @return bool Success
	 */
	private static function doSaveFormsMessages() {
		$save = array();
		$save['forms_items_id'] = wgPost::getValue('forms_items_id');
		$save['forms_messages_groups_id'] = wgPost::getValue('forms_messages_groups_id');
		$save['data'] = wgPost::getValue('data');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) FormsMessagesModel::doUpdate($save);
		}
		else {
			$id = (int) FormsMessagesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "forms_messages"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteFormsMessages($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) FormsMessagesModel::doDelete($id);
	}
	
}

?>