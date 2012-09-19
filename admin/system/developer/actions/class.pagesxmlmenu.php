<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. November 2008
 */

final class pagesxmlmenuActionsDeveloper extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::$_ok = $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool
	 */
	private function _init() {
		if (!(bool) wgPost::getValue('modxmlpage')) { wgError::add('pleaseselectmodfirst');
			return false;
		}
		else {
			$ok = (bool) self::_createMenuXml();
			if ($ok) wgError::add('generated', 2);
			else wgError::add('cantgenerate');
			return $ok;
		}
	}
	
	// functions ---------------------------------------------------------------------------
	
	private static function _createMenuXml() {
		$path = wgPaths::getModulePath('ftp', wgPost::getValue('modxmlpage'));
		$new = array();
		if (file_exists($path.'menu.xml')) $new = xml::xmlFileToArray($path.'menu.xml');
		$arr = wgIo::getFiles($path.'pages/');
		foreach ($arr as $file) {
			$info = explode('.', $file);
			if (!isset($new[$info[0]])) $new[$info[0]] = array('name'=>$info[0], 'show'=>'1', 'type'=>$info[1], 'su'=>0);
		}
		return wgIo::writeFile($path.'menu.xml', xml::arrayToXml($new, 'menu', "\t"));
	}
	
}

?>