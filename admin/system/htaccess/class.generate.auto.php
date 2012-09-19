<?php
/**
 * Auto generate class for module Htaccess
 * 
 * @package      WebGuru3
 * @subpackage   modules/htaccess/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        17. February 2009
 */


class autoGenerateHtaccess {
		
	public function __construct() {
		global $mod;
		$mod->runModule('htaccess');
		$data = moduleHtaccess::compileHtaccess();
		moduleHtaccess::writeContent($data);
	}
	
}
?>