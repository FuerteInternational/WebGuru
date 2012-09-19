<?php
/**
 * Main class for module Campaigns Administration
 * 
 * @subpackage   modules/campaignsad/
 * @author       Ondrej Rafaj (fiftyfootsquid.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        6. June 2009
 */

class moduleCampaignsad {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Campaigns Administration';
		$this->code    = 'campaignsad';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj fiftyfootsquid.com';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public function myFirstFunction() { wgError::add('Hello world :-)');
	}
}
		
?>