<?php
/**
 * Database class for table imenu_menus
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/imenu_menus
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class InfoImenuMenusModel {
	
	const ENGINE = 'MyISAM';
	
	const TABLE = 'imenu_menus';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_PRIMARY = true;
		
	const COL_NAME_COLATION = NULL;
		
	const COL_IDENTIFIER_COLATION = NULL;

	const COL_IDENTIFIER_REF_TABLE = '';
	
	const COL_IDENTIFIER_REF_COL = '';
		
	const COL_REWRITEURL_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('imenu_menus', 'identifier'), array('', ''))
		);
	}	
	

}
?>
