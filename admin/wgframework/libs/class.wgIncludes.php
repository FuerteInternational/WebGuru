<?php
class wgIncludes {
	
	public static function getInclude($module, $include) {
		$path = self::_getFilePath($module, $include);
		if (file_exists($path)) include($path);
		else wgIo::writeFile($path, '', 'w');
	}
	
	public static function getIncludeCode($module, $include) {
		$path = self::_getFilePath($module, $include);
		if (file_exists($path)) return wgIo::readFile($path);
		else {
			wgIo::writeFile($path, '', 'w');
			return NULL;
		}
	}
	
	public static function getModuleIncludes($module) {
		$path = wgPaths::getUserfilesPath();
		$arr = glob($path.'inc.'.$module.'.*'.'.php');
		return $arr;
	}
	
	public static function getNameFromFilename($filename) {
		if (empty($filename)) return NULL;
		$filename = str_ireplace(wgPaths::getUserfilesPath(), '', $filename);
		$arr = array();
		preg_match_all('/^inc\.[A-Za-z0-9]+\.(.*?)\.php$/si', $filename, $arr);
		if (isset($arr[1][0])) return $arr[1][0];
		else return $filename;
	}
	
	public static function writeInclude($module, $include, $code) {
		$path = self::_getFilePath($module, $include);
		if (get_magic_quotes_gpc()) $code = stripslashes($code);
		return (bool) wgIo::writeFile($path, $code, 'w');
	}
	
	private static function _getFilePath($module, $include) {
		return wgPaths::getUserfilesPath().'inc.'.$module.'.'.$include.'.php';
	}
	
	
}
?>