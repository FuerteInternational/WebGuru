<?php
/**
 * Main class for module TinyUrl
 * 
 * @package      WebGuru3
 * @subpackage   modules/tinyurl/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. June 2009
 */

class moduleTinyurl {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'TinyUrl';
		$this->code    = 'tinyurl';
		$this->version = '0.1.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function doRedirect($url) {
		wgPaths::redirect301($url);
	}
	
	public static function goToPreviewPage($id) {
		$conf = self::getConfiguration();
		print($conf['preview']['previewpage'].$id);
	}
	
	public static function previewEnabled() {
		if (isset($_COOKIE['tinyurl']['preview'])) return (bool) $_COOKIE['tinyurl']['preview'];
		else return false;
	}
	
	public static function togglePreview() {
		if (!isset($_COOKIE['tinyurl']['preview'])) return (bool) setcookie('tinyurl[preview]', true);
		else {
			$how = !$_COOKIE['tinyurl']['preview'];
			$ok = (bool) setcookie('tinyurl[preview]', (bool) $how);
			if ((bool) $ok) return (bool) $how;
			else return !$how;
		}
	}
	
	public static function getConfiguration() {
		if (!wgConfig::isConfiguration('tinyurl')) wgConfig::saveConfiguration('tinyurl', self::getDefaultConfig());
		return wgConfig::getConfiguration('tinyurl');
	}
	
	public static function getDefaultConfig() {
		$conf = array();
		$conf['preview']['previewpage'] = wgPaths::getWebPath(wgSystem::getCurrentWebsite());
		return $conf;
	}
}
		
?>