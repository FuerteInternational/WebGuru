<?php
/**
 * System errors class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 */

class error {
	
	private static $lastgid = 0;
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object object
	 */ 
	public function __construct() {
	
	}
	
	/**
	 * Add a new error message to the session array
	 * 
	 * @name add
	 * @param mixed $message Content for the message, string or array
	 * @param int $group Id of the error group
	 */ 
	public static function add($message, $group=0) {
		if (is_array($message)) $message = self::getArrayText($message);
		else $message = wgLang::get($message);
		$err = &$_SESSION['system']['error']['messages'];
		if (!isset($err[$group])) $err[$group] = array();
		$err[$group][] = array($message, $group);
	}
	
	/**
	 * Get error array
	 * 
	 * @name getErrors
	 * @return array Array with errors
	 */ 
	public static function getErrors() {
		return $_SESSION['system']['error']['messages'];
	}
	
	/**
	 * Get error groups array
	 * 
	 * @name getErrorsGroups
	 * @return array Array with error groups
	 */ 
	public static function getErrorsGroups() {
		return $_SESSION['system']['error']['groups'];
	}
	
	/**
	 * Set error array
	 * 
	 * @name getErrors
	 * @param array $errors Error array
	 */ 
	public static function setErrors($errors=array()) {
		$_SESSION['system']['error']['messages'] = $errors;
	}
	
	/**
	 * Set error groups array
	 * 
	 * @name setErrorsGroups
	 * @param array $groups Groups array
	 */ 
	public static function setErrorsGroups($groups=array()) {
		$_SESSION['system']['error']['groups'] = $groups;
	}
	
	/**
	 * Add a new error group to the session array
	 * 
	 * @name addGroup
	 * @param string $message Content for the group message
	 * @param string $identifier name of the class for the group
	 * @return int Id 
	 */ 
	public static function addGroup($message=NULL, $identifier='errorred') {
		if ((bool) $message) $message = wgLang::get($message);
		$err = &$_SESSION['system']['error']['groups'];
		if (!isset($err[self::$lastgid])) $err[self::$lastgid] = array();
		$err[self::$lastgid] = array($message, $identifier);
		self::$lastgid++;
		return (self::$lastgid - 1);
	}
	
	/**
	 * Converts array to plain text
	 * 
	 * @name getArrayText
	 * @param array $array Array to visualize
	 * @param bool $preformated Return array closed in <pre> (preformated) tags
	 * @return string Array converted to printable string
	 */ 
	public static function getArrayText($array, $preformated=false) {
		ob_start();
		if ((bool) $preformated) echo '<pre>';
		print_r($array);
		if ((bool) $preformated) echo '</pre>';
		return ob_get_flush();
	}
	
	/**
	 * Clears the error session
	 * 
	 * @name clearSession
	 */ 
	public static function clearSession() {
		$_SESSION['system']['error'] = array();
		$_SESSION['system']['error']['groups'] = array();
		$_SESSION['system']['error']['messages'] = array();
	}
	
	/**
	 * Creates a basic groups if neccessary
	 * 
	 * @name createGroups
	 */ 
	public static function createGroups() {
		if (!isset($_SESSION['system']['error']['groups'][0])) self::addGroup(NULL, 'wgerrorred');
		if (!isset($_SESSION['system']['error']['groups'][1])) self::addGroup(NULL, 'wgerrororange');
		if (!isset($_SESSION['system']['error']['groups'][2])) self::addGroup(NULL, 'wgerrorgreen');
	}
}

?>