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


final class createbackupActionsDeveloper extends BaseActions {
	
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
		$this->backup();
	}
	
	public function backup() {
		$f = array();
		$f[] = 'assets/';
		$f[] = 'config/';
		$f[] = 'data/';
		$f[] = 'icons/';
		$f[] = 'init/';
		$f[] = 'js/';
		$f[] = 'languages/';
		$f[] = 'logs/';
		$f[] = 'pear/';
		$f[] = 'system/';
		$f[] = 'modules/';
		$f[] = 'thirdparty/';
		$f[] = 'wgframework/';
		$f[] = 'index.php';
		$f[] = 'info.php';
		$f[] = 'login.php';
		$folder = '_backup/system/';
		if (!is_dir($folder)) wgIo::mkdir($folder);
		foreach ($f as $dir) {
			shell_exec('zip -r '.$folder.'system.zip ./'.$dir);
		}
		wgError::add(wgLang::get('backupgeneratedto').': '.$folder.'system.zip', 2);
		return true;
	}
}

?>