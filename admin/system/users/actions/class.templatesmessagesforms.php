<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        1. April 2009
 */
final class templatesmessagesformsActionsUsers extends BaseActions {
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
			if (!(bool) wgPost::getValue('name')) { wgError::add('noname');
				$mand = false;
			}
		if (!(bool) wgPost::getValue('identifier')) {
				wgSystem::setPostValue('identifier', wgPost::getValue('name'));
			}
		
			if ($mand) {
				$ok = (bool) self::doSaveUsersTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteUsersTemplates(wgGet::getValue('delete'));
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
	 * Save/Update function for table "users_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveUsersTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['temptype'] = wgPost::getValue('temptype');
		$save['pager'] = wgPost::getValue('pager');
		$save['perpage'] = wgPost::getValue('perpage');
		$save['datasource'] = wgPost::getValue('datasource');
		$save['datasource2'] = wgPost::getValue('datasource2');
		$save['variable'] = wgPost::getValue('variable');
		$save['useedit'] = wgPost::getValue('useedit');
		$save['tempstart'] = wgPost::getValue('tempstart');
		$save['temp'] = wgPost::getValue('temp');
		$save['tempend'] = wgPost::getValue('tempend');
		$save['noitem'] = wgPost::getValue('noitem');
		$save['mess1'] = wgPost::getValue('mess1');
		$save['mess2'] = wgPost::getValue('mess2');
		$save['mess3'] = wgPost::getValue('mess3');
		$save['mess4'] = wgPost::getValue('mess4');
		$save['mess5'] = wgPost::getValue('mess5');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) UsersTemplatesModel::doUpdate($save);
		}
		else {
			$id = (int) UsersTemplatesModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "users_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteUsersTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) UsersTemplatesModel::doDelete($id);
	}
	
}

?>