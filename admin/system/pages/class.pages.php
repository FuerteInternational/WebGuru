<?php
/**
 * Main class for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */


class modulePages extends dbModelPages {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Pages';
		$this->code    = 'pages';
		$this->version = '3.0.0.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName('pages');
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
	}
	
	// ------------------------- class functions -------------------------
	
	public static function parseTemplate($code) {
		require_once(wgPaths::getModulePath('pages').'actions/class.generate.php');
		return generate::parseTemplate($code, PagesModel::doSelectPKey(PagesModel::getHomeId()));
	}
	
	public static function getPageRevision($id=0) {
		$id = (int) $id;
		if (!(bool) $id) return 1;
		else {
			$page = PagesModel::doSelectPKey($id);
			$rev = (int) $page->getRevision();
			if (!(bool) $rev) return 1;
			else return $rev;
		}
	}
	
	public static function getTemplateRevision($id=0) {
		$id = (int) $id;
		if (!(bool) $id) return 1;
		else {
			$temp = PagesTemplatesModel::doSelectPKey($id);
			$rev = (int) $temp->getRevision();
			if (!(bool) $rev) return 1;
			else return $rev;
		}
	}
	
	public static function movePageUpButton($idPage) {
		return wgIcons::getButton('arr_up', wgLang::get('moveup'), wgPaths::makeSelfLink('act=indexpages&amp;parent='.wgGet::getValue('parent').'&amp;moveup='.$idPage));
	}
	
	public static function movePageDownButton($idPage) {
		return wgIcons::getButton('arr_down', wgLang::get('moveup'), wgPaths::makeSelfLink('act=indexpages&amp;parent='.wgGet::getValue('parent').'&amp;movedown='.$idPage));
	}
	
	public static function getSubFolderButton($idPage, $home=false) {
		$sc = PagesModel::countSubPages($idPage);
		if ((bool) $sc || (bool) $home) $ico = 'folder_page_white';
		else $ico = 'folder';
		if ((bool) $home) {
			$link = '#';
			$ico = 'house';
		}
		else $link = wgPaths::makeSelfLink('parent='.$idPage);
		return wgIcons::getButton($ico, wgLang::get('moveup'), $link).'&nbsp;';
	}
	
	
}

?>