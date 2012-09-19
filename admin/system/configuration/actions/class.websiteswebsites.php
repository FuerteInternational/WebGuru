<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */
final class websiteswebsitesActionsConfiguration extends BaseActions {
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
			if (wgPost::getValue('directory') == wgConfig::getConfValue('adminfolder')) { wgError::add('directoryisadmin');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveSystemWebsites();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteSystemWebsites(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "system_websites"
	 *
	 * @return bool Success
	 */
	private static function doSaveSystemWebsites() {
		$save = array();
		$save['name'] = wgPost::getValue('name');
		$save['code'] = wgPost::getValue('code');
		$save['image'] = wgPost::getValue('image');
		$save['directory'] = wgPost::getValue('directory');
		$save['sort'] = (int) wgPost::getValue('sort');
		$save['isdefault'] = (int) wgPost::getValue('isdefault');
		$save['alternativepath'] = wgPost::getValue('alternativepath');
		$save['changed'] = 'NOW()';
		$id = (int) wgPost::getValue('edit');
		if ((bool) $id) {
			$save['where'] = wgPost::getValue('edit');
			$ok = (bool) SystemWebsitesModel::doUpdate($save);
		}
		else {
			$save['added'] = 'NOW()';
			$id = (int) SystemWebsitesModel::doInsert($save);
			$ok = (bool) $id;
		}
		if ($ok && (bool) $save['isdefault']) SystemWebsitesModel::setDefault($id);
		wgPaths::resetWebPaths();
		return $ok;
	}

	/**
	 * Delete function for table "system_websites"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteSystemWebsites($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(SystemWebsitesModel::PRIMARY_KEY, $id);
		//return (bool) SystemWebsitesModel::doDelete($conn);
		return (bool) SystemWebsitesModel::doDelete($id);
	}
	
}

?>