<?php
/**
 * Main class for module Documents
 * 
 * @package      WebGuru3
 * @subpackage   modules/documents/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */

class moduleDocuments extends dbModelDocuments {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Documents';
		$this->code    = 'documents';
		$this->version = '1.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
	}
	
	// ------------------------- class functions -------------------------
	
	public static function deleteFile($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$file = DocumentsItemsModel::doSelectPKey($id);
		if (empty($file) || !(bool) $file->getFile()) return false;
		$path = wgPaths::getUserfilesPath().$file->getFile();
		return wgIo::delete($path);
	}
		
	public static function downloadDocument($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$file = DocumentsItemsModel::doSelectPKey($id);
		if (empty($file)) return false;
		$path = wgPaths::getUserfilesPath().$file->getFile();
		return wgIo::downloadFile($path);
	}
	
}
		
?>