<?php
/**
 * Database class for table system_users
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/system_users
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class SystemUsersModel extends BaseSystemUsersModel {
	
	private static $_userCache = array();
	
	public function getName() {
		return $this->getNickname();
	}
	
	public function getFullName($id, $lastnameFirst=false) {
		$id = (int) $id;
		$usr = parent::doSelectPKey($id);
		if ((bool) $usr->getId()) self::$_userCache[$id] = $usr;
		if ((bool) $usr->getLastname()) {
			if (!(bool) $lastnameFirst) return $usr->getFirstname().' '.$usr->getLastname();
			else return $usr->getLastname().', '.$usr->getFirstname();
		}
		else return UNDEFINED;
	}
	
	public function getFullNameCached($id, $lastnameFirst=false) {
		if (isset(self::$_userCache[$id])) {
			$usr = self::$_userCache[$id];
			if (!(bool) $lastnameFirst) return $usr->getFirstname().' '.$usr->getLastname();
			else return $usr->getLastname().', '.$usr->getFirstname();
		}
		else return self::getFullName($id, $lastnameFirst);
	}
	
	
	
}
?>