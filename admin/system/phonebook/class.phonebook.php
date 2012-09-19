<?php
/**
 * Main class for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

class modulePhonebook extends dbModelPhonebook {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Phonebook';
		$this->code    = 'phonebook';
		$this->version = '1.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
	}
	
	// ------------------------- class functions -------------------------
	
	public static function doSearch($search) {
		return JoshtrayPeopleModel::searchPeople($search);
	}
	
	public function fillDefaultValues($arr) {
		if (!isset($arr['images']['xsmall']))  $arr['images']['xsmall']   = array(80, 60);
		if (!isset($arr['images']['small']))   $arr['images']['small']    = array(100, 75);
		if (!isset($arr['images']['medium']))  $arr['images']['medium']   = array(130, 100);
		if (!isset($arr['images']['large']))   $arr['images']['large']    = array(800, 600);
		if (!isset($arr['images']['quality'])) $arr['images']['quality']  = 80;
		if (!isset($arr['system']['sort']))    $arr['system']['sort']     = array('lastname', 'ASC');
		return $arr;
	}
	
	public static function getConfig() {
		$arr = wgConfig::getConfiguration('phonebook');
		return self::fillDefaultValues($arr);
	}
	
	public static function getImage($id, $size='sml', $full=false) {
		$id = (int) $id;
		$bp = wgPaths::getUserfilesPath();
		$path = 'phonebook-people-%s-%s.jpg';
		$path = sprintf($path, $id, $size);
		$image = '<img src="%s" alt="%s" />';
		if (!file_exists($bp.$path)) $path = self::getDefaultImage($size);
		if ((bool) $full) return sprintf($image, wgPaths::getUserfilesPath('url').$path, $full);
		else return wgPaths::getUserfilesPath('url').$path;
	}
	
	public static function getDefaultImage($size='sml') {
		$bp = wgPaths::getUserfilesPath();
		$path = 'phonebook-people-def-%s.jpg';
		$path = sprintf($path, $size);
		if (file_exists($bp.$path)) return $path;
		else {
			if (wgSystem::isDevelopment()) wgError::add('nodefimageforphonebook', 1);
			return false;
		}
	}
	
	public static function deleteUserImages($id) {
		$id = (int) $id;
		$path = wgPaths::getUserfilesPath().'phonebook-people-%s-%s.jpg';
		wgIo::delete(sprintf($path, $id, 'orig'));
		wgIo::delete(sprintf($path, $id, 'xsml'));
		wgIo::delete(sprintf($path, $id, 'sml'));
		wgIo::delete(sprintf($path, $id, 'med'));
		wgIo::delete(sprintf($path, $id, 'lrg'));
		return true;
	}
	
}
		
?>