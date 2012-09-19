<?php
/**
 * Main class for module iPromote
 * 
 * @package      WebGuru3
 * @subpackage   modules/ipromote/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. August 2009
 */

class moduleIpromote {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'iPromote';
		$this->code    = 'ipromote';
		$this->version = '1.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public function getAppPicture($idApp, $size='small', $asHtml=false) {
		$id = (int) $idApp;
		if ($size != 'big') $size = 'small';
		$filename = wgIo::getUserfilesFilename('ipromote', 'app', $id, $size, 'empty.png');
		if (file_exists(wgPaths::getUserfilesPath().$filename)) {
			if ((bool) $asHtml) return '<img src="'.wgPaths::getUserfilesPath('url').$filename.'" alt="'.$asHtml.'" />';
			else return wgPaths::getUserfilesPath('url').$filename;
		}
		else return NULL;
	}
	
	
	
	
	
}
		
?>