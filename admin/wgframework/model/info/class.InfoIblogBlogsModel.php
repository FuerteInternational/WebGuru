<?php
/**
 * Database class for table iblog_blogs
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/iblog_blogs
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:36
 */

class InfoIblogBlogsModel {
	
	const ENGINE = 'MyISAM';
	
	const TABLE = 'iblog_blogs';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_PRIMARY = true;
		
	const COL_NAME_COLATION = NULL;
		
	const COL_IDENTIFIER_COLATION = NULL;

	const COL_IDENTIFIER_REF_TABLE = '';
	
	const COL_IDENTIFIER_REF_COL = '';
		
	const COL_DESCRIPTION_COLATION = NULL;
		
	const COL_USERS_ID_COLATION = NULL;
		
	const COL_POSTS_COLATION = NULL;
		
	const COL_PICTURES_COLATION = NULL;
		
	const COL_ADDED_COLATION = NULL;
		
	const COL_CHANGED_COLATION = NULL;
		
	const COL_MOTTO_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('iblog_blogs', 'identifier'), array('', ''))
		);
	}	
	

}
?>
