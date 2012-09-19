<?php
/**
 * Languages class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 */

class wgLang {
	
	private static $_definitions = array();
	
	private static $_track = array();
	
	private static $_enableTrack = false;
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object object
	 */ 
	public function __construct() {
	
	}
	
	public static function getFrontCode() {
		if (!isset($_SESSION['webguru']['frontend']['languages']['code'])) $_SESSION['webguru']['frontend']['languages']['code'] = 'en';
		return $_SESSION['webguru']['frontend']['languages']['code'];
	}
	
	public static function setFrontCode($code) {
		$_SESSION['webguru']['frontend']['languages']['code'] = $code;
	}
	
	public static function setFrontCodeAuto() {
		if (wgSystem::isRequest('wglang')) $_SESSION['webguru']['frontend']['languages']['code'] = wgSystem::getRequestValue('wglang');
	}
	
	
	public static function startTracking() {
		self::$_track = array();
		self::$_enableTrack = true;
	}
	
	public static function getTrackingArray() {
		return self::$_track;
	}
	
	public static function getTrackingArrayFlush() {
		self::$_enableTrack = false;
		$ret = self::$_track;
		self::$_track = array();
		return $ret;
	}
	
	
	
	public static function addDefinitionsToPageFile($definitions) {
		$path = wgPaths::getModulePath().'languages/'.self::getLanguageName().'/';
		if (!is_dir($path)) wgIo::mkdir($path);
		$path .= wgSystem::getPage().'.txt';
		return self::addDefinitionsToFile($path, $definitions);
	}
	
	public static function addDefinitionsToFile($path, $definitions) {
		wgSystem::clearCache();
		if (!is_array($definitions) || empty($definitions)) return false;
		if (file_exists($path)) {
			$file = file($path);
			if (!empty($file)) foreach ($file as $row) {
				$data = explode(';', $row);
				if (isset($data[1]) && !empty($data[1])) $definitions[$data[0]] = str_replace("\r\n", '', $data[1]);
			}
		}
		$data = NULL;
		foreach ($definitions as $k=>$def) $data .= "$k;$def\r\n";
		return wgIo::writeFile($path, $data);
	}
	
	
	
	/**
	 * Returns language translation for a definition
	 * 
	 * @name get
	 * @param string string Language definition
	 * @return string Language translation
	 */ 
	public static function get($string, $track=true) {
		if (isset(self::$_definitions[$string])) return self::$_definitions[$string];
		else {
			if ((bool) self::$_enableTrack && (bool) $track) self::$_track[$string] = $string;
			return $string;
		}
	}
	
	/**
	 * Add file with language definitions to array
	 * 
	 * @name addFile
	 * @param mixed message Content for the message, string or array
	 * @param int group Id of the error group
	 * @return bool Returns true if successful, false if not
	 */ 
	public static function addFile($path) {
		$tmpf = wgPaths::getTempPath().'cache.lang.'.sha1($path).'.php';
		if (file_exists($tmpf)) {
			include($tmpf);
			self::addDefinitions($def); wgError::add($def, 1);
		}
		else if (file_exists($path)) {
			$file = file($path);
			if (!empty($file)) {
				$code = NULL;
				foreach ($file as $row) {
					$data = explode(';', $row);
					
					if (isset($data[1]) && !empty($data[1])) {
						self::$_definitions[$data[0]] = str_replace("\r\n", '', $data[1]);
						$code .= ' $def[\''.$data[0].'\'] = \''.str_ireplace("'", "\'", trim($data[1])).'\';';
					}
				}
				wgIo::writeFile($tmpf, '<?php $def = array(); '.$code.' ?>');
			}
			return true;
		}
		else return false;
	}
	
	public static function addDefinitions($definitions=array()) {
		
	}
	
	public static function getPageFile() {
		$path = wgPaths::getModulePath().'languages/'.self::getLanguageName().'/'.wgSystem::getPage().'.txt';
		$def = array();
		if (file_exists($path)) {
			$file = file($path);
			if (!empty($file)) foreach ($file as $row) {
				$data = explode(';', $row);
				if (isset($data[1]) && !empty($data[1])) $def[$data[0]] = str_replace("\r\n", '', $data[1]);
			}
		}
		return $def;
	}
	
	public static function addModuleFile($module=NULL, $name=NULL, $lang=LANGUAGE) {
		if (!(bool) $module) $module = wgSystem::getModule();
		if (!(bool) $name) $name = wgSystem::getPage();
		$path = wgPaths::getModulePath('ftp', $module).'languages/'.$lang.'/'.$name.'.txt';
		return self::addFile($path);
	}
	
	public static function addModuleDefaultFile($module=NULL, $lang=LANGUAGE) {
		if (!(bool) $module) $module = wgSystem::getModule();
		$path = wgPaths::getModulePath('ftp', $module).'languages/'.$lang.'/global.'.$module.'.txt';
		return self::addFile($path);
	}
	
	public static function getLanguageName() {
		return LANGUAGE;
	}
	
	public static function getLanguageCode() {
		return SystemLanguageModel::getCurrentLanguageCode();
	}
	
	public static function getLanguageId() {
		$id = (int) wgSessions::getSession('language');
		if (!(bool) $id) {
			$lang = SystemLanguageModel::getDefaultLanguage();
			$id = (int) $lang->getId();
			if (!(bool) $id) wgError::add('nolang');
			else wgSessions::setSession('language', $id);
		}
		return $id;
	}
	
	
	/**
	 * Object destructor
	 * 
	 * @name __destruct
	 */ 
	public function __destruct() {
	
	}
}

?>