<?php
/**
 * Main class for module HTMLCoder
 * 
 * @package      WebGuru3
 * @subpackage   modules/htmlcoder/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        22. January 2009
 */

class moduleHtmlcoder extends dbModelHtmlcoder {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'HTMLCoder';
		$this->code    = 'htmlcoder';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function getIssueFolders() {
		if (!is_dir(wgPaths::getPath().'issues/')) wgIo::mkdir(wgPaths::getPath().'issues/');
		if (!is_dir(wgPaths::getPath().'issues/_isbackup/')) wgIo::mkdir(wgPaths::getPath().'issues/_isbackup/');
		$arr = wgIo::getFolders(wgPaths::getPath().'issues/');
		$new = array();
		foreach ($arr as $val) if ($val != '_isbackup') $new[$val] = $val;
		return $new;
	}
	
	public static function moveIssue($name, $targetName) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		if (empty($targetName) || is_dir($path.$targetName.'/')) return false;
		return wgIo::move($path.$name.'/', $path.$targetName.'/');
	}
		
	public static function deleteIssue($name) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		self::backupIssue($name);
		wgIo::delete($path.$name.'/');
		return is_dir($path.$name.'/');
	}
	
	public static function backupIssue($name) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		return wgIo::copy($path.$name.'/', $path.'_isbackup/'.$name.'/'.date('Y-m-d@H-i-s').'/');
	}
	
	public static function generateHtmlFiles($name, $data) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		if (!isset($data['index'])) $data['index'] = '';
		//if (!isset($data['template'])) $data['template'] = '';
		foreach ($data as $k=>$v) wgIo::writeFile($path.$name.'/'.$k.'.html', $v);
	}
	
	public static function generateCssFiles($name, $data) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		$sfiles = NULL;
		if (!empty($data) && is_array($data)) foreach ($data as $k=>$v) $sfiles .= '@import "'.$k.'.css";
';
		if (!isset($data['styles'])) $data['styles'] = '';
		$data['styles'] = $sfiles.$data['styles'];
		//if (!isset($data['template'])) $data['template'] = '';
		foreach ($data as $k=>$v) wgIo::writeFile($path.$name.'/css/'.$k.'.css', $v);
	}
	
	public static function generateJsFiles($name, $data) {
		$path = wgPaths::getPath().'issues/';
		if (empty($name) || !is_dir($path.$name.'/')) return false;
		if (empty($data) || !is_array($data)) $data['main'] = '
var '.$name.'Clas = {
	init: function() {
		//alert("Welcome");
	}	
}		
';
		foreach ($data as $k=>$v) wgIo::writeFile($path.$name.'/js/'.$k.'.js', $v);
	}
	
	public static function generateImgFiles($name, $data) {
		
	}
	
}
		
?>