<?php
/**
 * Main class for module Twitter
 * 
 * @package      WebGuru3
 * @subpackage   modules/twitter/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. June 2009
 */

class moduleTwitter {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Twitter';
		$this->code    = 'twitter';
		$this->version = '1.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	private static $_postCache = array();
	private static $_postsCache = array();
	
	public static function getInstance($name, $pass) {
		return new wgTwitter($name, $pass);
	}
	
	private static function _initSession($name) {
		$path = wgPaths::getTempPath().'twitter-'.wgText::safeText($name).'.cache.txt';
		if (!file_exists($path)) return NULL;
		else {
			//parse_str(file_get_contents($path), $ses);
			$arr = unserialize(file_get_contents($path));
			if ($arr['timestamp'] < strtotime('-1 hour')) $arr = NULL;
			return $arr;
		} 
	}
	
	private static function _writeCache($arr, $name) {
		$path = wgPaths::getTempPath().'twitter-'.wgText::safeText($name).'.cache.txt';
		$arr['timestamp'] = time();
		return (bool) wgIo::writeFile($path, serialize($arr));
	}
	
	public static function getLatestPosts($name, $pass, $dateformat=NULL, $cache=true) {
		$ses = self::_initSession($name);
		if (!(bool) $cache || empty($ses[$name])) {
			//print 'Reading CACHE :)<br />';
			$tw = new wgTwitter($name, $pass, $cache);
			$arr = $tw->getParsedUserTimeline($dateformat);
			$ses[$name] = $arr;
			self::_writeCache($ses, $name);
		}
		return $ses[$name];
	}
	
	public static function getLatestPost($name, $pass, $dateformat=NULL, $cache=true) {
		
		$tw = new wgTwitter($name, $pass);
		$arr = $tw->getParsedUserTimeline($dateformat);
		return wgTwitterObject::getTestResults();
		
		$ses = self::_initSession($name);
		if (!(bool) $cache || empty($ses[$name])) {
			//$tw = self::getInstance($name, $pass);
			$tw = new wgTwitter($name, $pass, $cache);
			$arr = $tw->getParsedUserTimeline($dateformat);
			if (isset($arr['data'][0])) $ses[$name] = $arr['data'][0];
			else {
				$ses[$name] = wgTwitterObject::getTestResults();
				self::_writeCache($ses, $name);
				return $ses[$name];
			}
		}
		return $ses[$name];
	}
	
	
}
		
?>