<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */
final class indexformsActionsForms extends BaseActions {
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
		$save['okmessage'] = wgPost::getValue('okmessage');
		$save['errormessage'] = wgPost::getValue('errormessage');
		$save['warningmessage'] = wgPost::getValue('warningmessage');
		$save['redirect'] = wgPost::getValue('redirect');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) FormsItemsModel::doUpdate($save);
		}
		else return (bool) FormsItemsModel::doInsert($save);
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
		//$conn = new wgConnector();
		//$conn->where(FormsItemsModel::PRIMARY_KEY, $id);
		//return (bool) FormsItemsModel::doDelete($conn);
		return (bool) FormsItemsModel::doDelete($id);
	}
	
}

?>