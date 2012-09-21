<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/mobileapps/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        20. September 2012
 */
final class usersuserssettingsActionsMobileapps extends BaseActions {
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
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = 'edit='.self::$_par['edit'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
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
		$save['visits'] = wgPost::getValue('visits');
		$save['downloads'] = wgPost::getValue('downloads');
		$save['xdata'] = wgPost::getValue('xdata');
		
		if ((bool) wgPost::getValue('edit')) {
			$save['where'] = wgPost::getValue('edit');
			$id = (int) $save['where'];
			self::$_par['edit'] = $id;
			return (bool) UsersModel::doUpdate($save);
		}
		else {
			$id = (int) UsersModel::doInsert($save);
			self::$_par['edit'] = $id;
			return (bool) $id;
		}
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
		return (bool) UsersModel::doDelete($id);
	}
	
}

?>