<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        25. February 2009
 */
final class templatespeopleActionsPhonebook extends BaseActions {
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
				$ok = (bool) self::doSaveJoshtrayTemplates();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteJoshtrayTemplates(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "joshtray_templates"
	 *
	 * @return bool Success
	 */
	private static function doSaveJoshtrayTemplates() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['temptype'] = (int) wgPost::getValue('temptype');
		$save['pager'] = (int) wgPost::getValue('pager');
		$save['perpage'] = (int) wgPost::getValue('perpage');
		$save['search'] = (int) wgPost::getValue('search');
		$save['tempbegin'] = wgPost::getValue('tempbegin');
		$save['tempitem'] = wgPost::getValue('tempitem');
		$save['tempend'] = wgPost::getValue('tempend');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) JoshtrayTemplatesModel::doUpdate($save);
		}
		else return (bool) JoshtrayTemplatesModel::doInsert($save);
	}

	/**
	 * Delete function for table "joshtray_templates"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteJoshtrayTemplates($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) JoshtrayTemplatesModel::doDelete($id);
	}
	
}

?>