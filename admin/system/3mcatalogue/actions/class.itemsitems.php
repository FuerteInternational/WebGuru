<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */
final class itemsitemsActions3mcatalogue extends BaseActions {
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
				$ok = (bool) self::doSaveNato3mcatItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteNato3mcatItems(wgGet::getValue('delete'));
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
	 * Save/Update function for table "nato3mcat_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveNato3mcatItems() {
		$save = array();
		$save['niin'] = wgPost::getValue('niin');
		$save['market'] = wgPost::getValue('market');
		$save['bigb'] = wgPost::getValue('bigb');
		$save['smallb'] = wgPost::getValue('smallb');
		$save['clasification'] = wgPost::getValue('clasification');
		$save['item_type'] = wgPost::getValue('item_type');
		$save['description'] = wgPost::getValue('description');
		$save['common_ref_name'] = wgPost::getValue('common_ref_name');
		$save['common_description'] = wgPost::getValue('common_description');
		$save['nato_item_name'] = wgPost::getValue('nato_item_name');
		$save['nato_description'] = wgPost::getValue('nato_description');
		$save['length'] = wgPost::getValue('length');
		$save['length_unit'] = wgPost::getValue('length_unit');
		$save['width'] = wgPost::getValue('width');
		$save['width_unit'] = wgPost::getValue('width_unit');
		$save['height'] = wgPost::getValue('height');
		$save['height_unit'] = wgPost::getValue('height_unit');
		$save['volume_weight'] = wgPost::getValue('volume_weight');
		$save['volume_weight_unit'] = wgPost::getValue('volume_weight_unit');
		$save['diameter'] = wgPost::getValue('diameter');
		$save['diameter_unit'] = wgPost::getValue('diameter_unit');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) Nato3mcatItemsModel::doUpdate($save);
		}
		else {
			$id = (int) Nato3mcatItemsModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "nato3mcat_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteNato3mcatItems($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) Nato3mcatItemsModel::doDelete($id);
	}
	
}

?>