<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/actions
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        2. March 2009
 */
final class indexusersActionsUsers extends BaseActions {
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
			if (!(bool) wgPost::getValue('firstname')) {
				wgError::add('nofirstname');
				$mand = false;
			}
		if (!(bool) wgPost::getValue('lastname')) {
				wgError::add('nolastname');
				$mand = false;
			}
		if (!wgValidation::email(wgPost::getValue('mail'))) {
				wgError::add('pleasecheckyourmail');
				$mand = false;
			}
			$pass = wgPost::getValue('password');
			if (empty($pass)) {
				if (!(bool) wgPost::getValue('edit')) {
					wgError::add('passwordempty');
					$mand = false;
				}
			}
			else {
				if (wgPost::getValue('password') != wgPost::getValue('password2')) {
					wgError::add('passworddontmatch');
					$mand = false;
				}
			}
			if (!(bool) wgPost::getValue('nickname') && $mand) {
				wgSystem::setPostValue('nickname', wgText::safeText(wgPost::getValue('firstname')).'.'.wgPost::getValue('lastname')); wgError::add(wgLang::get('autonicknameis').': '.wgPost::getValue('nickname'), 1);
			}
			if ($mand) {
				$ok = (bool) self::doSaveUsers();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		if ((bool) wgGet::getValue('delete')) {
			$ok = (bool) self::doDeleteUsers(wgGet::getValue('delete'));
			if ($ok) wgError::add('deleted', 2);
			else wgError::add('cantdelete');
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "users"
	 *
	 * @return bool Success
	 */
	private static function doSaveUsers() {
		$save = array();
		$save['users_groups_id'] = wgPost::getValue('users_groups_id');
		$save['nickname'] = wgPost::getValue('nickname');
		$save['mail'] = wgPost::getValue('mail');
		$save['password'] = wgPost::getValue('password');
		if (empty($save['password'])) {
			unset($save['password']);
			if ((bool) wgPost::getValue('edit')) {
				return false;
			}
		}
		else $save['password'] = sha1($save['password']);
		$save['question'] = wgPost::getValue('question');
		$save['ansver'] = wgPost::getValue('ansver');
		if (!(bool) wgPost::getValue('edit')) $save['added'] = 'NOW()';
		$save['online'] = wgPost::getValue('online');
		$save['changed'] = 'NOW()';
		$save['timever'] = wgPost::getValue('timever');
		$save['codever'] = wgPost::getValue('codever');
		$save['active'] = wgPost::getValue('active');
		$save['lastlogin'] = wgPost::getValue('lastlogin');
		$save['gender'] = wgPost::getValue('gender');
		$save['lastip'] = wgPost::getValue('lastip');
		$save['firstname'] = wgPost::getValue('firstname');
		$save['lastname'] = wgPost::getValue('lastname');
		$save['system_countries_id'] = wgPost::getValue('system_countries_id');
		$save['xdata'] = xml::arrayToXml(wgPost::getValue('xdata'));
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			return (bool) UsersModel::doUpdate($save);
		}
		else return (bool) UsersModel::doInsert($save);
	}

	/**
	 * Delete function for table "users"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDeleteUsers($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		//$conn = new wgConnector();
		//$conn->where(UsersModel::PRIMARY_KEY, $id);
		//return (bool) UsersModel::doDelete($conn);
		return (bool) UsersModel::doDelete($id);
	}
	
}

?>