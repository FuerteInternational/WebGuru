<?php
class wgSessions {
	
	private static function &_initSession() {
		if (!isset($_SESSION['wgSessions'])) $_SESSION['wgSessions'] = array();
		return $_SESSION['wgSessions'];
	}
	
	public static function setSession($name, $val=NULL, $sub='system') {
		$ses = &self::_initSession();
		$ses[$sub][$name] = $val;
	}
	
	public static function getSession($name, $sub='system') {
		$ses = &self::_initSession();
		if (!isset($ses[$sub][$name])) $ses[$sub][$name] = NULL;
		return $ses[$sub][$name];
	}
	
	public static function isSession($name, $sub='system') {
		$ses = &self::_initSession();
		if (!isset($ses[$sub][$name])) return false;
		else return true;
	}
	
	private static function &_initPageValue() {
		if (!isset($_SESSION['system']['PageValue'][wgSystem::getModule()][wgSystem::getPage()])) $_SESSION['system']['PageValue'][wgSystem::getModule()][wgSystem::getPage()] = NULL;
		return $_SESSION['system']['PageValue'][wgSystem::getModule()][wgSystem::getPage()];
	}
	
	public static function setPageValueDefault($key, $value) {
		$v = &self::_initPageValue();
		if (!isset($v[$key])) $v[$key] = $value;
	}
	
	public static function handlePageValue($key, $default=0) {
		self::setPageValueDefault($key, $default);
		if (wgGet::isValue($key)) self::setPageValue($key, wgGet::getValue($key));
		return self::getPageValue($key);
	}
	
	public static function setPageValue($key, $value) {
		$v = &self::_initPageValue();
		$v[$key] = $value;
	}
	
	public static function getPageValue($key) {
		$v = &self::_initPageValue();
		if (isset($v[$key])) return $v[$key];
	}
	
	public static function changePageValueFromPost($key) {
		$v = &self::_initPageValue();
		if (wgPost::isValue($key)) self::setPageValue($key, wgPost::getValue($key));
	}
	
	private static function &_initModuleValue() {
		if (!isset($_SESSION['system']['ModuleValue'][wgSystem::getModule()])) $_SESSION['system']['ModuleValue'][wgSystem::getModule()] = NULL;
		return $_SESSION['system']['ModuleValue'][wgSystem::getModule()];
	}
	
	public static function setModuleValueDefault($key, $value) {
		$v = &self::_initModuleValue();
		if (!isset($v[$key])) $v[$key] = $value;
	}
	
	public static function handleModuleValue($key, $default=0) {
		self::setModuleValueDefault($key, $default);
		if (wgGet::isValue($key)) self::setModuleValue($key, wgGet::getValue($key));
		return self::getModuleValue($key);
	}
	
	public static function setModuleValue($key, $value) {
		$v = &self::_initModuleValue();
		$v[$key] = $value;
	}
	
	public static function getModuleValue($key) {
		$v = &self::_initModuleValue();
		if (isset($v[$key])) return $v[$key];
	}
	
	public static function changeModuleValueFromPost($key) {
		$v = &self::_initModuleValue();
		if (wgPost::isValue($key)) self::setModuleValue($key, wgPost::getValue($key));
	}
	
}
?>