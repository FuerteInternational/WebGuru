<?php
/**
 * System functions
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      21. October 2008
 * 
 * @todo Distributing page, module and part is not very goog (getPage, getModule, getPart)
 * @todo Check if the selected module has all neccessary files before returns a value (getPage, getModule, getPart)
 * @todo Make better getValue functions
 */

class wgSystem {
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object paths object
	 */ 
	function __construct() {
	
	}
	
	public static function addInterface($interfaceName) {
		$path = wgPaths::getAdminPath().'wgframework/libs/interface.'.$interfaceName.'.php';
		if (file_exists($path)) require_once($path);
		//else new WgException('WebGuru Error:')
	}
	
	
	public static function isAdmin() {
		if (defined('PAGEID')) return false;
		else return true;
	}
	
	public static function encodePassword($password) {
		return sha1($password);
	}
	
	public static function isSafeMode() {
		return (bool) ini_get('Safe Mode');
	}
	
	public static function formatDate($time=NULL, $format='Y.m.d H:i:s') {
		if (!(bool) $time || $time == 'NOW' || $time == 'now') $time = time();
		return date($format, $time); 
	}
	
	public static function getCurrentWebsite() {
		$id = (int) wgSessions::getSession('website');
		if (!(bool) $id) {
			$web = SystemWebsitesModel::getDefaultWebsite();
			$id = (int) $web->getId();
			if (!(bool) $id) wgError::add('nowebsite');
			else wgSessions::setSession('website', $id);
		}
		return $id;
	}
	
	public static function isDevelopment() {
		if (DEVELOP == true) return true;
		else return false;
	}
	
	public static function isParam($key) {
		if (isset($_REQUEST[$key])) return true;
		if (isset($_GET[$key])) return true;
		if (isset($_POST[$key])) return true;
		else return false;	
	}
	
	public static function clearCache() {
		$files = wgIo::getFiles(wgPaths::getTempPath());
		foreach ($files as $file) if (preg_match('/(cache\.)/si', $file)) wgIo::delete(wgPaths::getTempPath().$file);
	}
	
	public static function isSave() {
		if (isset($_POST['save']) || isset($_POST['submit'])) return true;
		else return false;
	}
	
	public static function isApply() {
		if (isset($_POST['apply'])) return true;
		else return false;
	}
	
	public static function isRequest($key) {
		if (isset($_REQUEST[$key])) return true;
		else return false;
	}
	
	/**
	 * Creates callback variables for templating system
	 * 
	 * @name getFormCallback
	 * @param string $method Used form method ("post"=> default, "get")
	 * @return mixed Depends on the global variable
	 */ 
	public static function getFormCallback($var=array(), $method='post') {
		if ($method == 'get') $arr = &$_GET;
		else $arr = &$_POST;
		if (is_array($var) && is_array($var)) $new = $var;
		else $new = array();
		if (is_array($arr) && !empty($arr)) foreach ($arr as $k=>$v) {
			$new[strtoupper($k)] = $v;
		}
		return $new;
	}
	
	/**
	 * Returns actual page name
	 * 
	 * @name getValue
	 * @return string Page name
	 */ 
	public static function getPage() {
		if (!(bool) wgGet::getValue('page')) return 'index';
		return wgGet::getValue('page');
	}
	
	/**
	 * Returns actual module name
	 * 
	 * @name getValue
	 * @return string Module name
	 */ 
	public static function getModule() {
		if (!(bool) wgGet::getValue('part')) return 'home';
		return wgGet::getValue('mod');
	}
	
	public static function setModule($mod) {
		self::setGetValue('part', 'system');
		self::setGetValue('mod', $mod);
	}
	
	/**
	 * Returns actual system part name
	 * 
	 * @name getPart
	 * @return mixed string System part name
	 */ 
	public static function getPart() {
		if (!(bool) wgGet::getValue('part')) return 'system';
		else return wgGet::getValue('part');
	}
	
	/**
	 * Returns path to the selected page of the administration
	 *
	 * @return string Path
	 */
	public static function makeIncludePage() {
		$path = wgPaths::getAdminPath().wgGet::getValue('part').'/'.wgGet::getValue('mod').'/pages/'.wgGet::getValue('page').'.php';
		if (is_file($path)) return $path;
		else return wgPaths::getAdminPath().'system/home/pages/index.php';
	}
	
	/**
	 * Store _POST variables in session
	 *
	 * @name savePost
	 * @author Ondrej Rafaj
	 */
	public static function savePost() {
		$_SESSION['system']['variables']['post'] = $_POST;
	}
	
	/**
	 * Restore _POST variables from session
	 *
	 * @name restorePost
	 * @author Ondrej Rafaj
	 * @todo Improve handling with array variables (do some foreach)
	 */
	public static function restorePost() {
		if (isset($_SESSION['system']['variables']['post'])) {
			$_POST = $_SESSION['system']['variables']['post'];
			unset($_SESSION['system']['variables']['post']);
		}
	}
	
	/**
	 * Returns value from global _FILES variable
	 * 
	 * @name getFileValue
	 * @param string $key Key of the variable
	 * @param string $subkey
	 * @return mixed Depends on the global variable
	 */ 
	public static function getFileValue($key, $subkey=NULL) {
		if (!isset($_FILES[$key]['name'])) return NULL;
		if (is_array($_FILES[$key]['name'])) {
			$new = array();
			foreach ($_FILES[$key] as $type=>$g) {
				foreach ($g as $k=>$v) $new[$k][$type] = $v; 
			}
			return $new;
		}
		if (isset($_FILES[$key]) && !(bool) $subkey) return $_FILES[$key];
		elseif (isset($_FILES[$key][$subkey])) return $_FILES[$key][$subkey];
		else return NULL;
	}

	/**
	 * Sets value in _POST
	 * 
	 * @name setPostValue
	 * @param string $key Key of the variable
	 * @param string $value Value of the variable
	 */ 
	public static function setPostValue($key, $value=NULL) {
		$_POST[$key] = $value;
	}

	/**
	 * Sets value in _GET
	 * 
	 * @name setGetValue
	 * @param string $key Key of the variable
	 * @param string $value Value of the variable
	 */ 
	public static function setGetValue($key, $value=NULL) {
		$_GET[$key] = $value;
	}

	 
	public static function getPost() {
		if (isset($_POST)) return $_POST;
		else return array();
	}

	/**
	 * Returns _FILES
	 * 
	 * @name getFiles
	 * @return array Depends on the global variable
	 */ 
	public static function getFiles() {
		if (isset($_FILES)) return $_FILES;
		else return array();
	}

	/**
	 * Sets default value for global _GET variable (if is not set)
	 * 
	 * @name defValue
	 * @param string $key Key of the variable
	 * @param mixed $value Value of the variable
	 */ 
	public static function defValue($key, $value) {
		if (!isset($_GET[$key])) $_GET[$key] = $value;
	}

	/**
	 * Sets default value for global _POST variable (if is not set)
	 * 
	 * @name defPostValue
	 * @param string $key Key of the variable
	 * @param mixed $value Value of the variable
	 */ 
	public static function defPostValue($key, $value='') {
		if (!isset($_POST[$key])) $_POST[$key] = $value;
	}

	public static function clearDefPostValue() {
		if (isset($_POST)) foreach ($_POST as $k=>$v) if (!isset($_REQUEST[$k])) unset($_POST[$k]);
	}

	/**
	 * Sets default value for global _REQUEST (_GET, _POST) variable (if is not set)
	 * 
	 * @name defRequestValue
	 * @param string $key Key of the variable
	 * @param mixed $value Value of the variable
	 */ 
	public static function defRequestValue($key, $value) {
		if (!isset($_REQUEST[$key])) {
			$_REQUEST[$key] = $value;
			$_GET[$key] = $value;
			$_POST[$key] = $value;
		}
	}

	/**
	 * Returns value from global _GET variable
	 * 
	 * @name getRequestValue
	 * @param string Key of the variable
	 * @param string $subkey
	 * @return mixed Depends on the global variable
	 */ 
	public static function getRequestValue($key, $subkey=NULL) {
		if (isset($_REQUEST[$key]) && !(bool) $subkey) return $_REQUEST[$key];
		elseif (isset($_REQUEST[$key][$subkey])) return $_REQUEST[$key][$subkey];
		else return NULL;
	}
}

?>