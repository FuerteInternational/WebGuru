<?php
/**
 * Installation class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      21. October 2008
 * 
 * @todo Check if it is safe to copy files as well as folders during module installation process
 */

class install {
	
	private $_mpath = NULL;
	private $_spath = NULL;
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @author Ondrej Rafaj
	 * @return object Object
	 */
	public function __construct() {
		$this->_init();
	}
	
	/**
	 * Init modules installation (if any new module)
	 * 
	 * @name _init
	 * @author Ondrej Rafaj
	 */
	private function _init() {
		$all = dbSystem::getModulesByType();
		$mod = wgIo::getFolders(wgPaths::getAdminPath().'modules/');
		$sys = wgIo::getFolders(wgPaths::getAdminPath().'system/');
		$new = array();
		foreach ($all as $part=>$arr) {
			foreach ($arr as $mod) $new[$part][$mod['name']] = $mod;
		}
		//print_r($new);
		foreach ($mod as $val) if (!isset($new['modules'][$val])) $this->_installModule($val, 'modules');
		foreach ($sys as $val) if (!isset($new['system'][$val])) $this->_installModule($val, 'system');
		dbSystem::reloadModules();
	}
	
	/**
	 * Installs one module
	 *
	 * @name _installModule
	 * @author Ondrej Rafaj
	 * @param string $name Name of the module
	 * @param string $part Part of the system
	 * @return bool True / False
	 * 
	 * @todo Check the files install (commented)
	 */
	private function _installModule($name, $part) {
		global $mod;
		$path = wgPaths::getAdminPath().$part.'/'.$name.'/';
		if (file_exists($path.'class.install.php')) {
			// running install class
			require($path.'class.install.php');
			$cname = 'install'.ucfirst($name);
			$class = new $cname();
			if (isset($class->tables)) $this->_installDb($class->tables);
			if (isset($class->queries)) $this->_installDb($class->queries);
			$this->_installModuleFiles($path);
			$this->_addModule($name, $part); wgError::add(wgLang::get('newmodule').': '.wgLang::get($name));
			return true;
			
		}
		else if (file_exists($path.'class.'.$name.'.php')) {
			$this->_installModuleFiles($path);
			$this->_addModule($name, $part); wgError::add(wgLang::get('newmodule').': '.wgLang::get($name));
		}
		return false;
	}
	
	/**
	 * Installs files for one module
	 *
	 * @name _installModuleFiles
	 * @author Ondrej Rafaj
	 * @param string $path Path to the module
	 * @return bool True / False
	 * 
	 * @todo Check the files install (commented)
	 */
	private function _installModuleFiles($path) {
		if (is_dir($path.'install/')) {
			if (is_dir($path.'install/frontend/')) {
				$arr = wgIo::getFolders($path.'install/frontend/');
				foreach ($arr as $folder) wgIo::copy($path.'install/frontend/'.$folder, wgPaths::getAdminPath().$folder);
			}
			if (is_dir($path.'install/backend/')) {
				$arr = wgIo::getFolders($path.'install/backend/');
				foreach ($arr as $folder) wgIo::copy($path.'install/backend/'.$folder, wgPaths::getAdminPath().$folder); 
			}
			//$arr = wgIo::getFiles($path.'install/');
			//foreach ($arr as $file) wgIo::copy($path.'install/'.$file, wgPaths::getAdminPath().$file); 
			return true;
		}
		else return false;
	}
	
	/**
	 * Add module to the db
	 *
	 * @name _addModule
	 * @author Ondrej Rafaj
	 * @param string $name Name of the module
	 * @param string $part Part of the system
	 * @return bool
	 */
	private function _addModule($name, $part) {
		global $db;
		$save['table'] = 'system_modules';
		$save['name']  = $name;
		$save['added']  = 'NOW()';
		$save['part']  = $part;
		return (bool) $db->makeSave($save);
	}
	
	/**
	 * Install database for module
	 *
	 * @param array $queries Queries in array
	 */
	private function _installDb($queries) {
		global $db;
		if (!empty($queries) && is_array($queries)) foreach ($queries as $q) $db->makeQuery($q); 
	}

	/**
	 * Install database from installation class
	 *
	 * @param array $queries Queries in array
	 */
	public static function installDbFromClass($class) {
		global $db;
		if (isset($class->tables) && is_array($class->tables)) foreach ($class->tables as $q) $db->makeQuery($q); 
		if (isset($class->queries) && is_array($class->queries)) foreach ($class->queries as $q) $db->makeQuery($q);
		return true; 
	}	
}

?>