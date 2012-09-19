<?php
/**
 * Database class for table iuser_users
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/iuser_users
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. November 2009 10:37:53
 */

class IuserUsersModel extends BaseIuserUsersModel {
	
	
	// --------------------- Predefined functions for IuserUsers ---------------------
	
	public static function getUserIdByCode($code) {
		$ses = &self::_initSession('code');
		$code = wgText::safeText($code);
		if (isset($ses[$code])) return (int) $ses[$code];
		if (!empty($code)) {
			$conn = new wgConnector();
			$conn->where(parent::COL_CODE, $code);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) {
			if ((bool) $arr[0]->getId()) $ses[$code] = (int) $arr[0]->getId();
			return (int) $arr[0]->getId();
		}
		else return 0;
	}
	
	public static function loginCode($code) {
		if (!empty($code)) {
			$conn = new wgConnector();
			$conn->where(parent::COL_CODE, wgText::safeText($code));
			$conn->limit(1);
			$arr = parent::doSelect($conn);
			
		}
		else return new IuserUsersModel();
		if (isset($arr[0]) && !empty($arr[0])) {
			$ses = &self::_initSession('me');
			$ses = $arr[0];
			self::cacheUser($arr);
			return $arr[0];
		}
		else {
			$id = (int) self::createUser($code, 'Guest');
			if ((bool) $id) return self::loginCode($code);
			else return new IuserUsersModel();
		}
	}
	
	public static function isLogged($code) {
		$ses = &self::_initSession('me');
		if (!empty($ses) && (bool) $ses->getId()) return true;
		else return false;
	}
	
	private static function &_initSession($part='users') {
		if (!isset($_SESSION['iuser'][$part])) $_SESSION['iuser'][$part] = array();
		return $_SESSION['iuser'][$part];
	}
	
	private static function cacheUser($usr) {
		$id = 0;
		$nick = 'Unknown';
		$added = NULL;
		$mail = NULL;
		if (isset($usr[0]) && !empty($usr[0])) {
			$id = (int) $usr[0]->getId();
			$nick = $usr[0]->getNickname();
			$added = $usr[0]->getAdded();
			$mail = $usr[0]->getMail();
		}
		$ses = &self::_initSession();
		$ses[$id]['nickname'] = $nick;
		$ses[$id]['added'] = $added;
		$ses[$id]['mail'] = $mail;
	}
	
	public static function getCachedNickname($idIuserUsers) {
		$id = (int) $idIuserUsers;
		$ses = &self::_initSession();
		if (isset($ses[$id]['nickname'])) return $ses[$id]['nickname'];
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		self::cacheUser($arr);
		return $ses[$id]['nickname'];
	}
	
	public static function getCachedMail($idIuserUsers) {
		$id = (int) $idIuserUsers;
		$ses = &self::_initSession();
		if (isset($ses[$id]['mail'])) return $ses[$id]['mail'];
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		self::cacheUser($arr);
		return $ses[$id]['mail'];
	}
	
	public static function createUser($code, $nick='', $mail='', $newsletter=1) {
		$save = array();
		$save['code'] = wgText::safeText($code);
		$save['added'] = 'NOW()';
		$save['nickname'] = wgText::secureSql($nick);
		$save['mail'] = wgText::secureSql($mail);
		$save['newsletter'] = (int) $newsletter;
		return (int) parent::doInsert($save);
	}
	
	public static function getSelfData() {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doSelect($conn);
	}
	
	/*
	public static function getSelfPagerData($page, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		//$conn->order(parent::COL_NAME, 'ASC');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	/*
	public static function getOneSelfData($idIuserUsers) {
		$id = (int) $idIuserUsers;
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new IuserUsersModel();
	}
	//*/
	
}
?>