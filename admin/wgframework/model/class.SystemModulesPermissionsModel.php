<?php
/**
 * Database class for table system_modules_permissions
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_modules_permissions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemModulesPermissionsModel extends BaseSystemModulesPermissionsModel {
	
	public static function getPermissionsForTeam($team) {
		$id = (int) $team;
		if (!(bool) $id) return array();
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_TEAMS_ID, $id);
		$arr = parent::doSelect($conn);
		$new = array();
		foreach ($arr as $p) $new[$p->getSystemModulesId()] = (bool) $p->getPerm();
		return $new;
	}
	
	public static function deletePermsForTeam($team) {
		$id = (int) $team;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_SYSTEM_TEAMS_ID, $id);
		parent::doDelete($conn);
		return true;
	}
	 
	
}
?>