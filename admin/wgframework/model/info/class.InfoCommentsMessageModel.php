<?php
/**
 * Database class for table comments_message
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/comments_message
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. February 2009 16:39:27
 */

class InfoCommentsMessageModel {
	
	const ENGINE = 'InnoDB';
	
	const TABLE = 'comments_message';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_PRIMARY = true;
		
	const COL_USERS_ID_COLATION = NULL;

	const COL_USERS_ID_REF_TABLE = 'users';
	
	const COL_USERS_ID_REF_COL = 'id';
		
	const COL_COMMENTS_GROUPS_ID_COLATION = NULL;

	const COL_COMMENTS_GROUPS_ID_REF_TABLE = 'comments_groups';
	
	const COL_COMMENTS_GROUPS_ID_REF_COL = 'id';
		
	const COL_IP_COLATION = NULL;
		
	const COL_ADDED_COLATION = NULL;
		
	const COL_NAME_COLATION = NULL;
		
	const COL_LASTNAME_COLATION = NULL;
		
	const COL_MAIL_COLATION = NULL;
		
	const COL_SUBJECT_COLATION = NULL;
		
	const COL_MESSAGE_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('comments_message', 'users_id'), array('users', 'id')), 
			array(array('comments_message', 'comments_groups_id'), array('comments_groups', 'id'))
		);
	}	
	

}
?>
