<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */
final class indexsysusersActionsSystemusers extends BaseActions {
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
			if (!(bool) wgPost::getValue('firstname')) { wgError::add('nofirstname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('lastname')) { wgError::add('nolastname');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('mail')) { wgError::add('nomail');
				$mand = false;
			}
			else if (!(bool) valid::validMail(wgPost::getValue('mail'))) { wgError::add('notvalidmail');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('nickname')) { wgError::add('nonick');
				$mand = false;
			}
			if ((bool) wgPost::getValue('pass') || !(bool) wgPost::getValue('edit')) {
				$pass = (string) wgPost::getValue('pass');
				if (strlen($pass) < 6) { wgError::add('shortpass');
					$mand = false;
				}
				if ($pass != wgPost::getValue('pass2') || !(bool) wgPost::getValue('pass2')) { wgError::add('wrongpassconfirm');
					$mand = false;
				}
			}
			if ($mand) {
				$ok = (bool) self::doSaveSystemUsers();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteSystemUsers(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "system_users"
	 *
	 * @return bool Success
	 */
	private static function doSaveSystemUsers() {
		$save = array();
		$save['nickname'] = wgPost::getValue('nickname');
		$save['mail'] = wgPost::getValue('mail');
		if ((bool) wgPost::getValue('pass')) $save['pass'] = sha1(wgPost::getValue('pass'));
		$save['firstname'] = wgPost::getValue('firstname');
		$save['lastname'] = wgPost::getValue('lastname');
		$save['lastlogin'] = wgPost::getValue('lastlogin');
		$save['system_team_id'] = wgPost::getValue('system_team_id');
		$save['timever'] = wgPost::getValue('timever');
		$save['codever'] = wgPost::getValue('codever');
		$save['active'] = wgPost::getValue('active');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) SystemUsersModel::doUpdate($save);
		}
		else return (bool) SystemUsersModel::doInsert($save);
	}

	/**
	 * Delete function for table "system_users"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteSystemUsers($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(SystemUsersModel::PRIMARY_KEY, $id);
		//return (bool) SystemUsersModel::doDelete($conn);
		return (bool) SystemUsersModel::doDelete($id);
	}
	
}

?>