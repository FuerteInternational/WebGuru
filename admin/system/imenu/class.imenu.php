<?php
/**
 * Main class for module iPhone menu
 * 
 * @package      WebGuru3
 * @subpackage   modules/imenu/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. August 2009
 */

class moduleImenu {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'iPhone menu';
		$this->code    = 'imenu';
		$this->version = '1.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getTypes() {
		if (wgConfig::isConfiguration('imenu')) $arr = wgConfig::getConfiguration('imenu');
		else $arr = self::getBasicTypes();
		return $arr['types'];
	}
	
	public static function getBasicTypes() {
		$arr = array();
		$arr['types']['web'] = 'web';
		$arr['types']['rss'] = 'rss';
		$arr['types']['map'] = 'map';
		wgConfig::saveConfiguration('imenu', $arr);
		return $arr;
	}
	
	public static function getTranslatedTypes() {
		$arr = self::getTypes();
		foreach ($arr as $k=>$v) $arr[$k] = wgLang::get('itype'.$v);
		return $arr;
	}
	
	
}
		
?>