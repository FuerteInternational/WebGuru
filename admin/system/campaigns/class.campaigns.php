<?php
/**
 * Main class for module Campaigns
 * 
 * @package      WebGuru3
 * @subpackage   modules/campaigns/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        1. June 2009
 */

class moduleCampaigns {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Campaigns';
		$this->code    = 'campaigns';
		$this->version = '0.0.0.1';
		$this->author  = 'FiftyFootSquid.com - Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public function myFirstFunction() { 
		CampaignPagesModel::doSelect();
	}
}
		
?>