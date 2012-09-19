<?php
/**
 * System tables database connection
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      21. October 2008
 */

class dbSystem {
	/**
	 * Modules list cache
	 *
	 * @var array
	 */
	private static $_modules = array();
	
	/**
	 * Object constructor, gets the list of the modules, checks for actualizations
	 * 
	 * @name __construct
	 * @author Ondrej Rafaj
	 * @return object paths object
	 */ 
	public function __construct() {
		self::getModules();
	}
	
	/**
	 * Get list of installed modules (cached)
	 *
	 * @name getModules
	 * @author Ondrej Rafaj
	 * @return array List of modules
	 */
	public static function getModules() {
		if (!empty(self::$_modules) && is_array(self::$_modules)) return self::$_modules;
		global $db;
		$db->select('system_modules');
		$db->order(SystemModulesModel::COL_NAME);
		$ret = $db->getAll();
		self::$_modules['byid'] = array();
		self::$_modules['byname'] = array();
		self::$_modules['bytype'] = array();
		foreach ($ret as $v) {
			self::$_modules['byid'][$v['id']] = $v; 
			self::$_modules['byname'][$v['name']] = $v; 
			if (!isset(self::$_modules['bytype'][$v['part']])) self::$_modules['bytype'][$v['part']] = array();
			self::$_modules['bytype'][$v['part']][] = $v; 
		}
		return self::$_modules;
	}
	
	/**
	 * Get modules sorted by id of the module
	 *
	 * @name getModulesById
	 * @author Ondrej Rafaj
	 * @param int $id Id of the module
	 * @return array Modules array or one module with specified id
	 */
	public static function getModulesById($id=NULL) {
		$mods = self::getModules();
		if ((bool) $id) { 
			if (isset($mods['byid'][$id])) return $mods['byid'][$id];
			else return false;
		}
		else return $mods['byid'];
	}
	
	/**
	 * Get modules sorted by id of the module
	 *
	 * @name getModulesByName
	 * @author Ondrej Rafaj
	 * @param string $name Name of the module
	 * @return array Modules array or one module with specified name
	 */
	public static function getModulesByName($name=NULL) {
		$mods = self::getModules();
		if ((bool) $name) { 
			if (isset($mods['byname'][$name])) return $mods['byname'][$name];
			else return false;
		}
		else return $mods['byname'];
	}
	
	/**
	 * Get modules sorted by type of the modules
	 *
	 * @name getModulesByType
	 * @author Ondrej Rafaj
	 * @param string $type Type of the module
	 * @return array Modules array or array with modules of one type only
	 */
	public static function getModulesByType($type=NULL) {
		$mods = self::getModules();
		if ((bool) $type) { 
			if (isset($mods['bytype'][$type])) return $mods['bytype'][$type];
			else return false;
		}
		else return $mods['bytype'];
	}
	
	/**
	 * Reload modules
	 *
	 * @name reloadModules
	 * @author Ondrej Rafaj
	 */
	public static function reloadModules() {
		self::$_modules = array();
		self::getModules();
	}
	
	
}

?>