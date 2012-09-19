<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/documents/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */
final class indexdocumentsActionsDocuments extends BaseActions {
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
		parent::$_onSaveParam = 'cat='.wgPost::getValue('documents_categories_id');       // After save
		parent::$_onApplyParam = 'cat='.wgPost::getValue('documents_categories_id');      // After apply
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
			if (!(bool) $_FILES['file']['name'] && !(bool) wgPost::getValue('edit')) { wgError::add('nofile');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveDocumentsItems();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteDocumentsItems(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		if ((bool) wgGet::getValue('download')) {
			global $mod;
			$mod->runModule('documents');
			$ok = (bool) moduleDocuments::downloadDocument(wgGet::getValue('download'));
			if (!$ok) wgError::add('cantsendfile');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "documents_items"
	 *
	 * @return bool Success
	 */
	private static function doSaveDocumentsItems() {
		$save = array();
		$save['documents_categories_id'] = (int) wgPost::getValue('documents_categories_id');
		$save['name'] = wgPost::getValue('name');
		$save['size'] = 0;
		$save['enabled'] = (int) wgPost::getValue('enabled');
		$save['description'] = wgPost::getValue('description');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		if ((bool) $_FILES['file']['name']) {
			$save['file'] = 'documents-'.$save['documents_categories_id'].'-'.$_FILES['file']['name'];
			wgIo::uploadFile($save['file'], $_FILES['file']['tmp_name'], wgPaths::getUserfilesPath());
			$save['size'] = $_FILES['file']['size'];
			$id = (int) wgPost::getValue('edit');
			if ((bool) $id) {
				global $mod;
				$mod->runModule('documents');
				moduleDocuments::deleteFile($id);
			}
		}
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) DocumentsItemsModel::doUpdate($save);
		}
		else return (bool) DocumentsItemsModel::doInsert($save);
	}

	/**
	 * Delete function for table "documents_items"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteDocumentsItems($id) {
		global $mod;
		$id = (int) $id;
		if (!(bool) $id) return false;
		$mod->runModule('documents');
		moduleDocuments::deleteFile($id);
		return (bool) DocumentsItemsModel::doDelete($id);
	}
	
}

?>