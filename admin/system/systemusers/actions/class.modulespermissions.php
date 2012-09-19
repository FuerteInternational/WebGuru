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
final class modulespermissionsActionsSystemusers extends BaseActions {
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
		if (!wgUsers::isSu()) { wgError::add('forsuonly');
			return false;
		}
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if (!(bool) wgPost::getValue('mod')) { wgError::add('nomods');
				$mand = false;
			}
			if (!(bool) wgPost::getValue('teamid')) { wgError::add('noteamid');
				$mand = false;
			}
			if ($mand) {
				$ok = (bool) self::doSaveModPerms();
				if ($ok) wgError::add('saved', 2);
				else wgError::add('cantsave');
			}
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "system_teams"
	 *
	 * @return bool Success
	 */
	private static function doSaveModPerms() {
		$mods = wgPost::getValue('mod');
		$team = wgPost::getValue('teamid');
		SystemModulesPermissionsModel::deletePermsForTeam($team);
		$save = array();
		foreach ($mods as $k=>$p) {
			$save['system_modules_id'] = (int) $k;
			$save['system_teams_id'] = $team;
			$save['perm'] = (int) $p;
			SystemModulesPermissionsModel::doInsert($save);
		}
		wgModules::resetPermissions();
		return true;
	}

}

?>