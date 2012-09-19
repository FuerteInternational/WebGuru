<?php
/**
 * Main module class
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

class moduleDeveloper {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Developer';
		$this->code    = 'developer';
		$this->version = '1.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		//if ((bool) ini_get('safe_mode')) wgError::add('safemodeproblem');
		
	}
	
	// ------------------------- class functions -------------------------
	
	public function getTableRows($table) {
		global $db;
		$db->select($table, 'COUNT(*)');
		return (int) $db->getOne();
	}
	
	public function checkInstalledTable($module, $table) {
		$class = $this->_getInstallClass($module);
		if ((bool) $class) {
			if (isset($class->tables) && is_array($class->tables)) {
				//print_r($class->tables);
				foreach ($class->tables as $k=>$sql) {
					if (eregi('TABLE `'.$table, $sql) || ($k == $table && !empty($k))) return true;
				}
				return false; 
			}
			else return false;
		}
		else return false;
	}

	public function checkInstalledTableData($module, $table) {
		$class = $this->_getInstallClass($module);
		if ((bool) $class) {
			if (isset($class->queries) && is_array($class->queries)) {
				foreach ($class->queries as $sql) if (eregi('INTO `'.$table, $sql)) return true;
				return false; 
			}
			else return false;
		}
		else return false;
	}
	
	private function _getInstallClass($module) {
		$path = wgPaths::getModulePath('ftp', $module).'class.install.php';
		if (file_exists($path)) {
			require_once($path);
			$cname = 'install'.ucfirst($module);
			return new $cname();
		}
		else return false;
		
	}
	
	public function getAllModules() {
		$parts = array();
		$new = array();
		$parts[] = 'modules';
		$parts[] = 'system';
		foreach ($parts as $part) {
			$new[$part] = wgIo::getFolders(wgPaths::getAdminPath().$part.'/', false);
		}
		return $new;
	}
}

?>