<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/wsprite/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */
final class itemsitemsActionsWsprite extends BaseActions {
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
			
			if ($mand) {
				$ok = (bool) self::doSaveWspriteItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteWspriteItems(wgGet::getValue('delete'));
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
	 * Save/Update function for table "wsprite_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveWspriteItems() {
		$save = array();
		$save['wsprite_widgets_id'] = wgPost::getValue('wsprite_widgets_id');
		$save['sort'] = wgPost::getValue('sort');
		$save['w1'] = wgPost::getValue('w1');
		$save['w2'] = wgPost::getValue('w2');
		$save['w3'] = wgPost::getValue('w3');
		$save['w4'] = wgPost::getValue('w4');
		$save['w5'] = wgPost::getValue('w5');
		$save['w6'] = wgPost::getValue('w6');
		$save['w7'] = wgPost::getValue('w7');
		$save['w8'] = wgPost::getValue('w8');
		$save['w9'] = wgPost::getValue('w9');
		$save['w10'] = wgPost::getValue('w10');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) WspriteItemsModel::doUpdate($save);
		}
		else {
			$id = (int) WspriteItemsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "wsprite_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteWspriteItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) WspriteItemsModel::doDelete($id);
	}
	
}

?>