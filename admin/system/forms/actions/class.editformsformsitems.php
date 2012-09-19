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
final class editformsformsitemsActionsForms extends BaseActions {
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
		parent::$_onSaveParam = array('page'=>'forms');       // After save
		parent::$_onApplyParam = array('edit'=>self::$_par['edit']);      // After apply
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
		$save['system_language_id'] = (int) wgLang::getLanguageId();
		$save['system_websites_id'] = (int) wgSystem::getCurrentWebsite();
		$save['mailfield'] = wgPost::getValue('mailfield');
		$save['forms_messages_group_id'] = (int) wgPost::getValue('forms_messages_group_id');
		$save['adminmail'] = wgPost::getValue('adminmail');
		$save['template'] = wgPost::getValue('template');
		$save['usehtml'] = (int) wgPost::getValue('usehtml');
		$save['usetxt'] = (int) wgPost::getValue('usetxt');
		$save['mailhtml'] = wgPost::getValue('mailhtml');
		$save['mailtxt'] = wgPost::getValue('mailtxt');
		$save['okmessage'] = wgPost::getValue('okmessage');
		$save['errormessage'] = wgPost::getValue('errormessage');
		$save['warningmessage'] = wgPost::getValue('warningmessage');
		$save['redirect'] = wgPost::getValue('redirect');
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['changed'] = 'NOW()';
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = (int) wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::saveRecipients($id);
			self::saveFields($id);
			self::$_par['edit'] = $id;
			$ok = (bool) FormsItemsModel::doUpdate($save);
		}
		else {
			$save['added'] = 'NOW()';
			$id = (int) FormsItemsModel::doInsert($save);
			self::saveRecipients($id);
			self::saveFields($id);
			self::$_par['edit'] = $id;
			$ok = (bool) $id;
		}
		return $ok;
	}
	
	private static function saveFields($id) {
		FormsFieldsModel::deleteFieldsForForm($id);
		$fields = wgPost::getValue('qfields');
		if (is_array($fields) && !empty($fields) && isset($fields['name'])) foreach ($fields['name'] as $k=>$name) if (!empty($name)) {
			$save = array();
			$save['forms_items_id'] = $id;
			$save['name'] = $name;
			$save['label'] = $fields['label'][$k];
			$save['type'] = $fields['type'][$k];
			$save['system_validation_id'] = (int) $fields['valid'][$k];
			$save['errmessage'] = $fields['errmess'][$k];
			$save['errorgroup'] = (int) $fields['errtype'][$k];
			$save['sort'] = (int) $fields['sort'][$k];
			FormsFieldsModel::doInsert($save);
		}
	}

	private static function saveRecipients($id) {
		FormsRecipientsModel::deleteRecipients($id);
		$recipients = wgPost::getValue('recipient');
		$save = array();
		if (is_array($recipients) && !empty($recipients)) foreach ($recipients as $rec) if (!empty($rec)) {
			$save['mail'] = $rec;
			$save['forms_items_id'] = $id;
			FormsRecipientsModel::doInsert($save);
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
		//$conn = new wgConnector();
		//$conn->where(FormsItemsModel::PRIMARY_KEY, $id);
		//return (bool) FormsItemsModel::doDelete($conn);
		return (bool) FormsItemsModel::doDelete($id);
	}
	
}

?>