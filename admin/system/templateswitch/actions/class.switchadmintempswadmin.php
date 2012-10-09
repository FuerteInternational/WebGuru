<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/templateswitch/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        8. October 2012
 */
final class switchadmintempswadminActionsTemplateswitch extends BaseActions {
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
				$ok = (bool) self::doSaveTemplateswitch();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteTemplateswitch(wgGet::getValue('delete'));
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
	 * Save/Update function for table "templateswitch"
	 *
	 * @return bool Success
	 */
	private static function doSaveTemplateswitch() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['identifier'] = valid::safeText(wgPost::getValue('identifier'));
		$save['templatename'] = wgPost::getValue('templatename');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) TemplateswitchModel::doUpdate($save);
		}
		else {
			$id = (int) TemplateswitchModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "templateswitch"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteTemplateswitch($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) TemplateswitchModel::doDelete($id);
	}
	
}

?>