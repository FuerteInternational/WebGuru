<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. July 2009
 */
final class templatescustoerrorsActionsConfiguration extends BaseActions {
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
				$ok = (bool) self::doSaveSystemErrorsTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteSystemErrorsTemplates(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = array('edit'=>self::$_par['edit'], 'show'=>wgSystem::getRequestValue('act'));      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "system_errors_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveSystemErrorsTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['errorbegin'] = wgPost::getValue('errorbegin');
		$save['groupokbegin'] = wgPost::getValue('groupokbegin');
		$save['itemok'] = wgPost::getValue('itemok');
		$save['groupokend'] = wgPost::getValue('groupokend');
		$save['groupalertbegin'] = wgPost::getValue('groupalertbegin');
		$save['itemalert'] = wgPost::getValue('itemalert');
		$save['groupalertend'] = wgPost::getValue('groupalertend');
		$save['grouperrorbegin'] = wgPost::getValue('grouperrorbegin');
		$save['itemerror'] = wgPost::getValue('itemerror');
		$save['grouperrorend'] = wgPost::getValue('grouperrorend');
		$save['errorend'] = wgPost::getValue('errorend');
		$save['groupmessages'] = (int) wgPost::getValue('groupmessages');
		$save['firstinlist'] = (int) wgPost::getValue('firstinlist');
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) SystemErrorsTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) SystemErrorsTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "system_errors_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteSystemErrorsTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) SystemErrorsTemplatesModel::doDelete($id);
	}
	
}

?>