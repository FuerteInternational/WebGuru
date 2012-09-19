<?php


wgSystem::addInterface('wgGlobalVariables');

class wgGet implements wgGlobalVariables {
	
	public static function isValue($key) {
		return isset($_GET[$key]);
	}
	
	/**
	 * Returns value from global _GET variable
	 * 
	 * @name getValue
	 * @param string Key of the variable
	 * @param string $subkey
	 * @return mixed Depends on the global variable
	 */
	public static function getValue($key, $subkey=NULL) {
		if (isset($_GET[$key]) && !(bool) $subkey) return $_GET[$key];
		elseif (isset($_GET[$key][$subkey])) return $_GET[$key][$subkey];
		else return NULL;
	}
	
	public static function setValue($key, $value=NULL) {
		$_GET[$key] = $value;
	}
	
	public static function setDefaultValue($key, $value=NULL) {
		$_GET[$key] = $value;
	}
	
	public static function clearDefaultValue() {
		if (isset($_GET)) foreach ($_GET as $k=>$v) if (!isset($_REQUEST[$k])) unset($_GET[$k]);
	}
	
	/**
	 * Returns _GET
	 * 
	 * @name getAll
	 * @return array Depends on the global variable
	 */
	public static function getAll() {
		if (isset($_GET)) return $_GET;
		else return array();
	}

}

?>