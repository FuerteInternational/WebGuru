<?php
/**
 * Generating new installer class
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      31. October 2008
 */


final class createmodinstActionsDeveloper extends BaseActions {
	
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct() {
		$this->init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return unknown
	 */
	public function init() {
		$this->modules();
	}
	
	public function modules() {
		$modules = wgPost::getValue('modules');
		$x=0;
		if (is_array($modules) && !empty($modules)) foreach ($modules as $mod) {
			$f = array();
			if (file_exists(wgPaths::getAdminPath().'_dbact/'.$mod.'.sql')) $f[] = '_dbact/'.$mod.'.sql';
			$f[] = 'modules/'.$mod.'/';
			$this->pack($f, '_development/packages/', $mod.'.zip');
			$x++;
		}
		$system = wgPost::getValue('system');
		if (is_array($system) && !empty($system)) foreach ($system as $mod) {
			$f = array();
			if (file_exists(wgPaths::getAdminPath().'_dbact/'.$mod.'.sql')) $f[] = '_dbact/'.$mod.'.sql';
			$f[] = 'system/'.$mod.'/';
			$this->pack($f, '_development/packages/', $mod.'.zip');
			$x++;
		}
// 		$folder = '_backup/system/';
// 		if (!is_dir($folder)) wgIo::mkdir($folder);
// 		foreach ($f as $dir) {
// 			shell_exec('zip -r '.$folder.'system.zip ./'.$dir);
// 		}
// 		wgError::add(wgLang::get('backupgeneratedto').': '.$folder.'system.zip', 2);
// 		return true;
		return (bool) $x;
	}
}

?>