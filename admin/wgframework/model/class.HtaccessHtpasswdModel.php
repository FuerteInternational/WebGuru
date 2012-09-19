<?php
/**
 * Database class for table htaccess_htpasswd
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/htaccess_htpasswd
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        17. February 2009 11:25:42
 */

class HtaccessHtpasswdModel extends BaseHtaccessHtpasswdModel {
	
	public static function getLocations() {
		$conn = new wgConnector();
		$conn->group(parent::COL_LOCATION);
		$data = parent::doSelect($conn);
		return $data;
	}
	
	
	public static function setEnabledForPath($path, $enable=true) {
		$enable = (int) $enable;
		$save = array();
		$save['where'] = $path;
		$save['wherecol'] = parent::COL_LOCATION;
		$save[parent::COL_ENABLED] = $enable;
		parent::doUpdate($save);
		return true;
	}
	
	public static function addPasswordsForHtpasswd($users, $path) {
		global $mod;
		$mod->runModule('htaccess');
		foreach ($users as $usr) {
			$save = array();
			$save[parent::COL_LOCATION] = $path;
			$save[parent::COL_NAME] = $usr['name'];
			$save[parent::COL_PASSWORD] = self::generateHtpasswd($usr['password']);
			$save[parent::COL_ENABLED] = 0;
			parent::doInsert($save);
		}
		return true;
	}
	
	public static function getRowsByLocationandName() {
		return parent::doSelect();
	}
	
	public static function generateHtpasswd($password) { 
	    $password = crypt(trim($password), base64_encode(CRYPT_STD_DES)); 
	    return $password;
	}
	
}
?>