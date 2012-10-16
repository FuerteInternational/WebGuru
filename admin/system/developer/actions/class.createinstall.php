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


final class createinstallActionsDeveloper extends BaseActions {
	
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
		$this->create();
	}
	
	public function create() {
		$f = array();
		$f = array();
		$f[] = 'assets/';
		$f[] = 'config/config.default.php';
		$f[] = 'data/';
		$f[] = 'icons/';
		$f[] = 'init/';
		$f[] = 'js/';
		$f[] = 'languages/';
		$f[] = 'logs/';
		$f[] = 'pear/';
		//$f[] = 'system/';
		//$f[] = 'modules/';
		$f[] = 'thirdparty/';
		$f[] = 'wgframework/';
		$f[] = 'index.php';
		$f[] = 'info.php';
		$f[] = 'login.php';
		$issues = wgPost::getValue('issues');
		if (is_array($issues) && !empty($issues)) foreach ($issues as $style) $f[] = 'assets/'.$style.'/';
		$modules = wgPost::getValue('modules');
		if (is_array($modules) && !empty($modules)) foreach ($modules as $mod) $f[] = 'modules/'.$mod.'/';
		$system = wgPost::getValue('system');
		if (is_array($system) && !empty($system)) foreach ($system as $mod) $f[] = 'system/'.$mod.'/';
		
		$folder = '_development/install/system/';
		
		if (!is_dir($folder)) wgIo::mkdir($folder);
		foreach ($f as $dir) {
			print shell_exec('zip -r '.$folder.'system.zip ./'.$dir);
		}
		
		exit();
		wgError::add(wgLang::get('backupgeneratedto').': '.$folder.'system.zip', 2);
		return true;
		
		//if ($ok) wgIo::copy(wgPaths::getModulePath().'installfiles/', wgPaths::getAdminPath().'_development/install/');
		//return $ok;
	}
}	
?>