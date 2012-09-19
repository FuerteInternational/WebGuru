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
final class websitespermissionsActionsConfiguration extends BaseActions {
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
			
			if ($mand) {
				$ok = (bool) self::doSaveSystemWebsitesPermissions();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteSystemWebsitesPermissions(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "system_websites_permissions"
	 *
	 * @return bool Success
	 */
	private static function doSaveSystemWebsitesPermissions() {
		$save = array();
		$save['system_websites_id'] = wgPost::getValue('system_websites_id');
		$save['system_users_id'] = wgPost::getValue('system_users_id');
		$save['permissions'] = wgPost::getValue('permissions');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) SystemWebsitesPermissionsModel::doUpdate($save);
		}
		else return (bool) SystemWebsitesPermissionsModel::doInsert($save);
	}

	/**
	 * Delete function for table "system_websites_permissions"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteSystemWebsitesPermissions($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(SystemWebsitesPermissionsModel::PRIMARY_KEY, $id);
		//return (bool) SystemWebsitesPermissionsModel::doDelete($conn);
		return (bool) SystemWebsitesPermissionsModel::doDelete($id);
	}
	
}

?>