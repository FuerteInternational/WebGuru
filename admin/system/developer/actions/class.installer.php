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


final class developerActionsInstaller {
	
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
		require('Archive/Zip.php');
		
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return unknown
	 */
	public function init() {

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
		return (bool) $x;
	}
	
	public function create() {
		
		$f = array();
		$f[] = 'icons/';
		$f[] = 'init/';
		$issues = wgPost::getValue('issues');
		if (is_array($issues) && !empty($issues)) foreach ($issues as $style) $f[] = 'issues/'.$style.'/';
		$f[] = 'js/';
		$f[] = 'languages/';
		$f[] = 'libs/';
		$modules = wgPost::getValue('modules');
		if (is_array($modules) && !empty($modules)) foreach ($modules as $mod) $f[] = 'modules/'.$mod.'/';
		$f[] = 'pear/';
		$system = wgPost::getValue('system');
		if (is_array($system) && !empty($system)) foreach ($system as $mod) $f[] = 'system/'.$mod.'/';
		$f[] = 'thirdparty/';
		$f[] = 'index.php';
		$f[] = 'info.php';
		$f[] = 'login.php';
		$ok = $this->pack($f, '_development/install/system/', 'system.zip');
		//$ok = true;
		if ($ok) wgIo::copy(wgPaths::getModulePath().'installfiles/', wgPaths::getAdminPath().'_development/install/');
		return $ok;
	}
	
	public function backup() {
		$f = array();
		$f[] = 'icons/';
		$f[] = 'init/';
		$f[] = 'issues/';
		$f[] = 'js/';
		$f[] = 'languages/';
		$f[] = 'libs/';
		$modules = wgIo::getFolders(wgPaths::getAdminPath().'modules/');
		if (is_array($modules) && !empty($modules)) foreach ($modules as $mod) $f[] = 'modules/'.$mod.'/';
		$f[] = 'pear/';
		$system = wgIo::getFolders(wgPaths::getAdminPath().'system/');
		if (is_array($system) && !empty($system)) foreach ($system as $mod) $f[] = 'system/'.$mod.'/';
		$f[] = 'thirdparty/';
		$f[] = 'index.php';
		$f[] = 'info.php';
		$f[] = 'login.php';
		return $this->pack($f, '_backup/system/', 'system.zip');
	}
	
	private function pack($files, $folder, $file) {
		if (!is_dir($folder)) wgIo::mkdir($folder);
		$zip = new Archive_Zip($folder.$file);
		return (bool) $zip->create($files);
	}
	
	
	
	
}

?>