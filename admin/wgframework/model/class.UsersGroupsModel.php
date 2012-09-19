<?php
/**
 * Database class for table users_groups
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/users_groups
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class UsersGroupsModel extends BaseUsersGroupsModel {
	
	public static function getGroupsSelectBox() {
		$conn = new wgConnector();
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	
}
?>