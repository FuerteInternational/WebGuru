<?php
/**
 * Modules administration
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    3.0.0.0
 * @since      21. October 2008
 * 
 * @todo Check if the include path in runModule is safe
 */

class wgModules {
	
	private static $_mod = array();
	
	/**
	 * Class constructor, reads all modules to the array
	 * 
	 * @name __construct
	 * @return object
	 */
	public function __construct() {
		
	}
	
	public static function canRun($mod, $team=NULL) {
		$team = (int) $team;
		//if (!(bool) $team && wgUsers::isSu()) return true;
		if (!is_numeric($mod)) $mod = self::getModuleId($mod);
		if (!(bool) $team) $team = (int) wgUsers::getTeamId();
		$perm = wgSessions::getSession('modules', 'permissions');
		if (!(bool) $perm) {
			$perm = array();
			$perm[$team] = self::_loadPermissions($team);
		}
		if (!isset($perm[$team])) $perm[$team] = self::_loadPermissions($team);
		if (isset($perm[$team][$mod])) return (bool) $perm[$team][$mod];
		else return false;
	}
	
	public static function _loadPermissions($team) {
		$team = (int) $team;
		$perms = array();
		$perms = SystemModulesPermissionsModel::getPermissionsForTeam($team);
		wgSessions::setSession('modules', array($team=>$perms), 'permissions');
		return $perms;
	}
	
	public static function getModuleId($name) {
		$mods = dbSystem::getModulesByName();
		if (!isset($mods[$name])) return false;
		return $mods[$name]['id'];
	}
	
	public static function resetPermissions() {
		wgSessions::setSession('modules', array(), 'permissions');
	}
	
	/**
	 * Runs a module and returns an object
	 *
	 * @param string $name
	 * @return object Module object or false
	 */
	public static function &runModule($name) {
		if (isset(self::$_mod[$name])) return self::$_mod[$name];
		else {
			self::$_mod[$name] = false;
			$mod = dbSystem::getModulesByName($name);
			if ((bool) $mod) {
				$path = wgPaths::getAdminPath().$mod['part'].'/'.$mod['name'].'/';
				if (file_exists($path.'class.'.$name.'.php')) {
					if (file_exists($path.'class.dbmodel.php')) require($path.'class.dbmodel.php');
					require($path.'class.'.$name.'.php');
					$cname = 'module'.ucfirst($name);
					self::$_mod[$name] = new $cname();
				}
			}
		}
		return self::$_mod[$name];
	}
	
	public static function isModule($name) {
		$mod = self::runModule($name);
		return (bool) $mod;
	}
	
	public static function getModuleParameter($name, $param) {
		if (!(bool) $name) {
			global $module;
			if (!isset($module->$param)) $module->$param = ucfirst(wgSystem::getModule());
			return $module->$param;
		}
		else {
			$md = self::runModule($name);
			if ((bool) $md && isset($md->$param)) return $md->$param;
			else return 'N/A';
		}
	}
	
	public static function getModuleName($module=NULL) {
		return self::getModuleParameter($module, 'name');
	}
	
	public static function getModuleVersion($module=NULL) {
		return self::getModuleParameter($module, 'version');
	}
	
	public static function getModules() {
		return dbSystem::getModulesByName();
	}
	
}

?>