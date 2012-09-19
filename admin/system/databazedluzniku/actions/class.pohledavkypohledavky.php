<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/databazedluzniku/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        10. May 2009
 */
final class pohledavkypohledavkyActionsDatabazedluzniku extends BaseActions {
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
				$ok = (bool) self::doSaveDdaPohledavky();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteDdaPohledavky(wgGet::getValue('delete'));
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
	 * Save/Update function for table "dda_pohledavky"
	 *
	 * @return bool Success
	 */
	private static function doSaveDdaPohledavky() {
		$save = array();
		$save['users_id'] = wgPost::getValue('users_id');
		$save['dda_firmy_id'] = wgPost::getValue('dda_firmy_id');
		$save['dda_firmy_dluznik_id'] = wgPost::getValue('dda_firmy_dluznik_id');
		$save['castka'] = wgPost::getValue('castka');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['status'] = wgPost::getValue('status');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) DdaPohledavkyModel::doUpdate($save);
		}
		else {
			$id = (int) DdaPohledavkyModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "dda_pohledavky"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteDdaPohledavky($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) DdaPohledavkyModel::doDelete($id);
	}
	
}

?>