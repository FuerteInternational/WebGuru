<?php
/**
 * Main class for module Users
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

class moduleUsers extends dbModelUsers {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Users';
		$this->code    = 'users';
		$this->version = '4.0.0.0';
		$this->author  = 'Ondra Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	private static function &_initSession() {
		if (!isset($_SESSION['modules']['users']['login'])) $_SESSION['modules']['users']['login'] = array();
		return $_SESSION['modules']['users']['login'];
	}
	
	private static function _deleteSession() {
		if (isset($_SESSION['modules']['users']['login'])) $_SESSION['modules']['users']['login'] = array();
	}
	
	public static function &getSession() {
		return self::_initSession();
	}
	
	public static function setVerificationCode($code=NULL) {
		$ses = &self::_initSession();
		if (!(bool) $code) $code = rand(0, 99999);
		$ses['codever'] = $code;
		return $code;
	}
	
	public static function isLogged() {
		return (bool) self::getVar('idu');
	}
	
	public static function isAdmin() {
		$group = self::getVar('groupId');
		return (bool) ($group == 1);
	}
	
	public static function getVar($var) {
		$ses = &self::_initSession();
		if (isset($ses[$var]) && (bool) $ses[$var]) {
			if (is_a($ses[$var], 'UsersGroupsModel')) return $ses[$var];
			else return (string) $ses[$var];
		}
		else return false;
	}
	
	public static function getId() {
		return (int) self::getVar('idu');
	}
	
	public static function login($login, $pass, $type='mail', $encode=true) {
		$usr = UsersModel::getLogin($login, $pass, $type, $encode);
		if (!(bool) $usr->getId()) return false;
		return self::_putDataToSession($usr);
	}
	
	private static function _putDataToSession($usrObject) {
		if (!is_a($usrObject, 'UsersModel') || !(bool) $usrObject->getId()) return false;
		$ses = &self::_initSession();
		$ses['idu']           = (int) $usrObject->getId();
		$ses['nickname']      = $usrObject->getNickname();
		$ses['mail']          = $usrObject->getMail();
		$ses['added']         = (int) $usrObject->getAdded();
		$ses['online']        = (int) $usrObject->getOnline();
		$ses['changed']       = (int) $usrObject->getChanged();
		$ses['timever']       = (int) $usrObject->getTimever();
		$ses['codever']       = $usrObject->getCodever();
		$ses['active']        = (int) $usrObject->getActive();
		$ses['lastlogin']     = (int) $usrObject->getLastlogin();
		$ses['gender']        = $usrObject->getGender();
		$ses['lastip']        = $usrObject->getLastip();
		$ses['firstname']     = $usrObject->getFirstname();
		$ses['lastname']      = $usrObject->getLastname();
		$ses['groupId']       = $usrObject->getUsersGroupsId();
		$ses['group']         = UsersGroupsModel::doSelectPKey($usrObject->getUsersGroupsId());
		$ses['country']       = SystemCountriesModel::doSelectPKey($usrObject->getSystemCountriesId());
		$ses['data']          = $usrObject;
		return $usrObject;
	}
	
	public static function getUserObject() {
		if (self::isLogged()) {
			$ses = &self::_initSession();
			return $ses['data'];
		}
		else {
			$uo = new UsersModel();
			return $uo;
		}
	}
	
	public static function saveLogin($login, $pass, $identifier, $type='mail') {
		//$ses = &self::_initSession();
		$ses = array();
		$ses['login'] = $login;
		$ses['password'] = sha1($pass);
		$ses['type'] = $type;
		wgCookies::set($identifier.'-login', http_build_query($ses));
	}
	
	public static function checkCookieLogin($identifier) {
		$data = parse_str(wgCookies::get($identifier.'-login'));
		if (isset($data['login'])) {
			$ok = self::login($data['login'], $data['password'], $data['type'], false);
			if (!(bool) $ok) {
				self::logout($identifier);
				return false;
			}
			else return true;
		}
		else return false;
	}
	
	public static function logout($identifier=NULL) {
		if ((bool) $identifier) wgCookies::delete($identifier.'-login');
		return (bool) self::_deleteSession();
	}
	
}
		
?>