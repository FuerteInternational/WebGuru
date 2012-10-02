<?php
/**
 * Database class for table system_images_folders
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/system_images_folders
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class InfoSystemImagesFoldersModel {
	
	const ENGINE = 'MyISAM';
	
	const TABLE = 'system_images_folders';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_REF_TABLE = '';
	
	const COL_ID_REF_COL = '';
		
	const COL_NAME_COLATION = NULL;
		
	const COL_SYSTEM_WEBSITES_ID_COLATION = NULL;
		
	const COL_PARENTID_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('system_images_folders', 'id'), array('', ''))
		);
	}	
	

}
?>
