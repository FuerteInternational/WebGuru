<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */
final class outputtemplatesadmin1ActionsLanguages extends BaseActions {
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
		if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveFormsItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteFormsItems(wgGet::getValue('delete'));
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
	 * Save/Update function for table "forms_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveFormsItems() {
		$save = array();
		$save['system_language_id'] = wgPost::getValue('system_language_id');
		$save['system_websites_id'] = wgPost::getValue('system_websites_id');
		$save['mailfield'] = wgPost::getValue('mailfield');
		$save['forms_messages_group_id'] = wgPost::getValue('forms_messages_group_id');
		$save['adminmail'] = wgPost::getValue('adminmail');
		$save['template'] = wgPost::getValue('template');
		$save['usehtml'] = wgPost::getValue('usehtml');
		$save['mailhtml'] = wgPost::getValue('mailhtml');
		$save['usetxt'] = wgPost::getValue('usetxt');
		$save['mailtxt'] = wgPost::getValue('mailtxt');
		$save['okmessage'] = wgPost::getValue('okmessage');
		$save['errormessage'] = wgPost::getValue('errormessage');
		$save['warningmessage'] = wgPost::getValue('warningmessage');
		$save['redirect'] = wgPost::getValue('redirect');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) FormsItemsModel::doUpdate($save);
		}
		else {
			$id = (int) FormsItemsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "forms_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteFormsItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) FormsItemsModel::doDelete($id);
	}
	
}

?>