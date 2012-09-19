<?php
/**
 * Database class for table users_templates
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/users_templates
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        1. April 2009 13:08:52
 */

class UsersTemplatesModel extends BaseUsersTemplatesModel {
	
	public static function getTemplateForType($identifier, $type) {
		$type = (int) $type;
		$identifier = valid::safeText($identifier);
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, $identifier);
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return false;
	}
	
	public static function getPagerForType($page, $type=0) {
		$page = (int) $page;
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->order(parent::COL_NAME);
		return parent::doPager($conn, $page);
	}
	
	public static function getDataSources($type) {
		$arr = array();
		if ($type == 0) {
			$arr[0] = wgLang::get('currentuser');
			$arr[1] = wgLang::get('variableuser');
		}
		elseif ($type == 1) {
			
		}
		elseif ($type == 2) {
			
		}
		elseif ($type == 3) {
			
		}
		elseif ($type == 4) {
			
		}
		elseif ($type == 5) {
			
		}
		elseif ($type == 6) {
			
		}
		elseif ($type == 7) {
			
		}
		return $arr;
	}
	
	
}
?>