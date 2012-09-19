<?php
/**
 * Database class for table users
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/users
 * @author       Ondrej Rafaj (fiftyfootsquid.com)
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        16. February 2009 12:10:29
 */

class UsersModel extends BaseUsersModel {
	
	private static $_userCache = array();
	
	public function getName() {
		if ((bool) $this->getLastname()) return $this->getFirstname().' '.$this->getLastname();
		else return NULL;
	}
	
	public function getCountry() {
		if (isset($ses['country'])) $arr = $ses['country'];
		else $arr = SystemCountriesModel::doSelectPKey($this->getSystemCountriesId());
		return $arr->getName();
	}
	
	public function getGroup() {
		if (isset($ses['group'])) $arr = $ses['group'];
		else $arr = UsersGroupsModel::doSelectPKey($this->getUsersGroupsId());
		return $arr->getName();
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
	
	public function getGroupUsers($group=0) {
		$id = (int) $group;
		$conn = new wgConnector();
		if ((bool) $id) $conn->where(parent::COL_USERS_GROUPS_ID, $id);
		$conn->order(parent::COL_LASTNAME);
		return parent::doSelect($conn);
	}
	
	public function doRegistrationFromPost($group=0) {
		$save = array();
		$save[parent::COL_FIRSTNAME] = wgText::secureSql(wgPost::getValue('firstname'));
		$save[parent::COL_LASTNAME] = wgText::secureSql(wgPost::getValue('lastname'));
		$save[parent::COL_MAIL] = wgText::secureSql(wgPost::getValue('mail'));
		$save[parent::COL_NICKNAME] = wgText::secureSql(wgPost::getValue('nickname'));
		$save[parent::COL_PASSWORD] = wgSystem::encodePassword(wgPost::getValue('pass'));
		$save[parent::COL_QUESTION] = wgText::secureSql(wgPost::getValue('question'));
		$save[parent::COL_ANSVER] = wgText::secureSql(wgPost::getValue('ansver'));
		$save[parent::COL_GENDER] = (wgPost::getValue('gender') == 'f' ? 'f' : 'm');
		return self::doRegistrationFromArray($save, $group);
	}
	
	public function doRegistrationFromArray($registrationArray, $group=0) {
		$registrationArray[parent::COL_USERS_GROUPS_ID] = (int) $group;
		$registrationArray[parent::COL_ADDED] = 'NOW()';
		return (int) parent::doInsert($registrationArray);
	}
	
	public static function getLogin($login, $pass, $type='mail', $encodepass=true) {
		$conn = new wgConnector();
		if ((bool) $encodepass) $conn->where(parent::COL_PASSWORD, wgSystem::encodePassword($pass));
		else $conn->where(parent::COL_PASSWORD, $pass);
		if ($type == 'mail') $conn->where(parent::COL_MAIL, $login);
		else $conn->where(parent::COL_NICKNAME, $login);
		$conn->limit(1);
		$ret = parent::doSelect($conn);
		if (isset($ret[0])) {
			self::updateLastLogin($ret[0]->getId());
			return $ret[0];
		}
		else {
			$usr = new BaseUsersModel();
			$usr->setNullResults();
			return $usr;
		}
	}
	
	public static function updateLastLogin($idu) {
		$conn = new wgConnector();
		$conn->set(parent::COL_LASTIP, wgIpTools::getUserIp());
		$conn->set(parent::COL_LASTLOGIN, 'NOW()');
		$conn->where(parent::COL_ID, $idu);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function nicknameExists($nick) {
		$conn = new wgConnector();
		$conn->where(parent::COL_NICKNAME, $nick);
		return (bool) parent::doCount($conn);
	}
	
	public static function updateActiveUser($idu) {
		wgModules::runModule('users');
		$code = moduleUsers::setVerificationCode();
		$conn = new wgConnector();
		$conn->set(parent::COL_TIMEVER, time());
		$conn->set(parent::COL_CODEVER, $code);
		$conn->set(parent::COL_ONLINE, time());
		$conn->where(parent::COL_ID, $idu);
		return (bool) parent::doUpdate($conn);
	}
	
	public static function getUsersByLastname() {
		$conn = new wgConnector();
		$conn->order(parent::COL_LASTNAME);
		return parent::doSelect($conn);
	}
	
	public static function getUsersPager($page, $group=0, $limit=20) {
		$conn = new wgConnector();
		$conn->order(parent::COL_LASTNAME);
		return parent::doPager($conn, (int) $page, (int) $limit);
	}
	
}
?>