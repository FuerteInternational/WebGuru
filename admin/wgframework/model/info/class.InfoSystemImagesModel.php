<?php
/**
 * Database class for table system_images
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/system_images
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        28. September 2012 16:42:12
 */

class InfoSystemImagesModel {
	
	const ENGINE = 'MyISAM';
	
	const TABLE = 'system_images';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_REF_TABLE = '';
	
	const COL_ID_REF_COL = '';
		
	const COL_NAME_COLATION = NULL;
		
	const COL_FILENAME_COLATION = NULL;
		
	const COL_ALTTEXT_COLATION = NULL;
		
	const COL_SYSTEM_IMAGES_FOLDERS_ID_COLATION = NULL;
		
	const COL_NOTE_COLATION = NULL;
		
	const COL_IMAGE_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('system_images', 'id'), array('', ''))
		);
	}	
	

}
?>
