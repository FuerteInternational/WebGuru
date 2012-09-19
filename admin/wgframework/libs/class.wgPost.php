<?php


wgSystem::addInterface('wgGlobalVariables');

class wgPost implements wgGlobalVariables {
	
	public static function isValue($key) {
		return isset($_POST[$key]);
	}
	
	/**
	 * Returns value from global _POST variable
	 * 
	 * @name getValue
	 * @param string $key Key of the variable
	 * @param string $subkey
	 * @return mixed Depends on the global variable
	 */
	public static function getValue($key, $subkey=NULL) {
		if (isset($_POST[$key]) && !(bool) $subkey) return $_POST[$key];
		elseif (isset($_POST[$key][$subkey])) return $_POST[$key][$subkey];
		else return NULL;
	}
	
	public static function setValue($key, $value=NULL) {
		$_POST[$key] = $value;
	}
	
	public static function setDefaultValue($key, $value=NULL) {
		$_POST[$key] = $value;
	}
	
	public static function clearDefaultValue() {
		if (isset($_POST)) foreach ($_POST as $k=>$v) if (!isset($_REQUEST[$k])) unset($_POST[$k]);
	}
	
	/**
	 * Returns _POST
	 * 
	 * @name getAll
	 * @return array Depends on the global variable
	 */
	public static function getAll() {
		if (isset($_POST)) return $_POST;
		else return array();
	}
	
}

?>