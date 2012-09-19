<?php
/**
 * Database class for table system_teams
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_teams
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemTeamsModel extends BaseSystemTeamsModel {
	
	public static function getTeamsForMyPermissions() {
		$conn = new wgConnector();
		if (!wgUsers::isSu()) $conn->where(parent::COL_SUPERADMIN, 1, '!=');
		return parent::doSelect($conn);
	}
	
	public static function getTeamsForMyPermissionsPager($page) {
		$page = (int) $page;
		$conn = new wgConnector();
		if (!wgUsers::isSu()) $conn->where(parent::COL_SUPERADMIN, 1, '!=');
		return parent::doPager($conn, $page);
	}
	
	
}
?>