<?php
/**
 * Generating menu xml file
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      10. November 2008
 */

final class dopagesmenuActionsDeveloper {
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct() {
		self::$_par['modonepage'] = wgPost::getValue('modonepage');
		self::$_par['tabonename'] = wgPost::getValue('tabonename');
		$this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool
	 */
	private function _init() {
		$ok = true;
		if (empty(self::$_par['mname'])) { wgError::add('emptyname');
			$ok = false;
		}
		if ($ok) {
			self::_createFile();
			return true;
		}
		else return false;
	}
	
	/**
	 * Creatint the file
	 *
	 */
	private static function _createFile() {
		$data = '<?xml version="1.0" encoding="UTF-8"?>
<menu>
	<page home="1" dev="0" enabled="1">index</page>
	<page home="0" dev="1" enabled="1">aaaaa</page>
	<page home="0" dev="0" enabled="0">bbbbb</page>
	<page home="0" dev="1" enabled="1">ccccc</page>
</menu>';
		wgIo::writeFile(wgPaths::getModulePath('ftp', 'newmodule').'menu.xml', $data);
	}
	
	// functions ---------------------------------------------------------------------------
	
	
}

?>