<?php
/**
 * Admin Users
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      17. October 2008
 */

class wgUsers {
	
	const USER_SES_NAME = 'wgUser';
	
	private static $_cache = array();
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object object
	 */ 
	function __construct() {
		
	}

	/**
	 *  
	 * 
	 * @name isLogged
	 * @return bool
	 */ 
	public function isLogged() {
		return (bool) self::getDetail();
	}

	/**
	 *  
	 * 
	 * @name getId
	 * @return int
	 */ 
	public function getId() {
		return self::getDetail();
	}
	
	private static function &_getSession() {
		if (!isset($_SESSION['system'][self::USER_SES_NAME])) $_SESSION['system'][self::USER_SES_NAME] = array();
		return $_SESSION['system'][self::USER_SES_NAME];
	}
	
	private static function &_getNewSession() {
		if (isset($_SESSION['system'][self::USER_SES_NAME])) unset($_SESSION['system'][self::USER_SES_NAME]);
		$ses = &self::_getSession();
		return $ses;
	}
	
	public static function checkCookieLogin() {
		global $conf;
		$ses = &self::_getNewSession();
	}
	
	
	/**
	 * Login user to the system 
	 * 
	 * @name login
	 * @param string user Username (mail / nickname)
	 * @param string pass User password
	 * @return int returns users id or false
	 */ 
	public function login($user, $pass) {
		global $conf;
		$usr = self::_getLoginUser($user, $pass, $conf['admin']['logintype']);
		//print_r($usr);
		if (!(bool) $usr[0]['id']) { 
			wgError::add('wronglogin');
			if ((bool) $conf['logs']['access']) wgLog::log('Wrong login: "'.$user.'" IP: "'.valid::getUserIp().'"', 'wrong_access');
			self::destroySession();
		}
		else {
			$team = $this->_getTeam($usr[0]['system_team_id']);
			if ((bool) $team) {
				if (!$this->_checkIP($team['ipfilter'])) { wgError::add(wgLang::get('wrongip').': ('.valid::getUserIp().')');
					self::destroySession();
				}
			}
			if ((bool) $conf['logs']['access']) wgLog::log('User login: "'.$user.'" IP: "'.valid::getUserIp().'"', 'access');
			$ses = &self::_getNewSession();
			//cookies::delete('user[name]');
			//cookies::delete('user[pass]');
			wgCookies::set('user[name]', $user);
			//else cookies::set('user[pass]', ':-)');
			$ses['idu']             = (int) $usr[0]['id'];
			$ses['nickname']        = (string) $usr[0]['nickname'];
			$ses['mail']            = (string) $usr[0]['mail'];
			$ses['firstname']       = (string) $usr[0]['firstname'];
			$ses['lastname']        = (string) $usr[0]['lastname'];
			$ses['lastlogin']       = (string) $usr[0]['lastlogin'];
			$ses['system_team_id']  = (int) $usr[0]['system_team_id'];
			$ses['team']            = $team;
			$ses['timever']         = time();
			$ses['codever']         = rand(0, 99999);
			self::setCheck($ses['timever'], $ses['codever'], true);
			if ((bool) wgPost::getValue('remember')) wgCookies::set(self::USER_SES_NAME.'[details]', $ses);
			$par = wgGet::getValue('from');
			if (is_array($par) && !empty($par)) {
				if (!isset($par['part']) || !isset($par['mod'])) {
					$par['part'] = 'system';
					$par['mod'] = 'home';
					$par['page'] = 'index';
				}
				else if (!isset($par['page'])) $par['page'] = 'index';
				wgPaths::redirect(wgPaths::makeLink($par['mod'], $par['page'], NULL, $par['part']));
			}
			else $path = wgPaths::makeSelfLink();
			wgPaths::redirect($path);
		}
	}
	
	/**
	 * Check users session 
	 * 
	 * @name check
	 * @return bool true / false
	 */ 
	public static function check() {
		global $conf;
		//self::logout(false);
		$usr = self::_getUser();
		if (!isset($usr[0])) self::logout(false);
		$ses = &self::_getSession();
		if ($usr[0]->getCodever() != $ses['codever']) { wgError::add('wrongsessvercode');
			self::logout(false);
		}
		if ((time() - $usr[0]->getTimever()) >= $conf['system']['sestime']) { wgError::add('sessionexpired');
			//print 'hu';
			self::logout(false);
		}
		$ses['timever'] = time();
		$ses['codever'] = rand(0, 99999);
		self::setCheck($ses['timever'], $ses['codever']);
	}
	
	public static function isSu($id=NULL) {
		$id = (int) $id;
		if ((bool) $id) {
			$usr = self::_getUser($id);
			$team = self::_getTeam($usr['system_team_id']);
			print_r($team);
			if ((bool) $team['superadmin']) return true;
			else return false;
		}
		else {
			$ses = &self::_getSession();
			$t = &$ses['team'];
			if (isset($t['superadmin'])) return (bool) $t['superadmin'];
			else return false;
		}
	}
	
	public static function isTeamSu($id=NULL) {
		$id = (int) $id;
		$team = self::_getTeam($id);
		if ((bool) $team['superadmin']) return true;
		else return false;
	}
	
	public static function getTeamId() {
		$ses = &self::_getSession();
		if (isset($ses['system_team_id'])) return (int) $ses['system_team_id'];
		else return false;
	}
	
	public static function getMail() {
		return self::getDetail('mail');
	}
	
	
	/**
	 * Get user details from session
	 * 
	 * @name getDetail
	 * @param string $key Key name ("idu" as default)
	 * @return mixed Value of the variable or false if not set
	 */ 
	public static function getDetail($key='idu', $sub=NULL) {
		$ses = &self::_getSession();
		if (isset($ses[$key]) && !(bool) $sub) return $ses[$key];
		elseif ((bool) (bool) $sub && isset($ses[$sub][$key])) return $ses[$sub][$key];
		else return false;
	}
	
	public static function setCheck($time, $verification, $login=false) {
		$save = array();
		if ((bool) $login) {
			$save['lastlogin'] = date('Y-m-d H:i:s', $time);
			$save['lastip'] = valid::getUserIp();
		}
		$save['timever'] = $time;
		$save['codever'] = $verification;
		$save['where'] = (int) self::getDetail('idu');
		return (bool) SystemUsersModel::doUpdate($save);
	}
	
	/**
	 * Logout user from the administration 
	 * 
	 * @name logout
	 * @return bool Returns true if success, false if not
	 */ 
	public static function logout($error=true) {
		if ((bool) $error) wgError::add('loggedout', 2);
		self::destroySession();
		return true;
	}
	
	/**
	 * Login user to the system if the remote login is used
	 * 
	 * @name remoteLogin
	 * @param string user Username (mail / nickname)
	 * @param string pass User password
	 * @return bool true / false
	 */ 
	public function remoteLogin($user, $pass) {
		
	}
	
	/**
	 * Check users session if the remote login is used 
	 * 
	 * @name remoteCheck
	 * @return bool true / false
	 */ 
	public function remoteCheck() {
		
	}
		
	/**
	 * Logout user from the administration if the remote login is used
	 * 
	 * @name remoteLogout
	 * @return bool Returns true if success, false if not
	 */ 
	public function remoteLogout() {
		self::destroySession();
		return true;
	}
	
	/**
	 * Check users ip if neccessary 
	 * 
	 * @name _checkIP
	 * @param string List of allowed IP addresses
	 * @return bool true / false
	 */ 
	private function _checkIP($ips) {
		if (empty($ips)) return true;
		else {
			if (eregi(valid::getUserIp(), $ips)) return true;
			else return false;
		}
	}
	
	/**
	 * Returns Admin user details by id and additionaly by hashed password
	 * 
	 * @name _getUser
	 * @param int idu Admin users Id
	 * @param string hpass Hashed user password for additional security
	 * @return array Returns array with user details on success or false
	 */ 
	private static function _getUser($idu=0, $hpass=NULL) {
		$idu = (int) $idu;
		if (!(bool) $idu) $idu = self::getDetail();
		$db = new wgConnector();
		$db->where('id', $idu);
		if ((bool) $hpass) $db->where('pass', $hpass);
		$db->limit(1);
		$ret = SystemUsersModel::doSelect($db);
		if (!empty($ret)) return $ret;
		else return false;
	}

	/**
	 * Returns Admin user details for login
	 * 
	 * @name _getLoginUser
	 * @param string user Username (mail / nickname)
	 * @param string pass User password
	 * @param string type Type of the login (mail / nickname)
	 * @return array Returns array with user details on success or false
	 */ 
	private static function _getLoginUser($user, $pass, $type='nickname') {
		global $db;
		$db->select('system_users');
		$db->where($type, $user);
		$db->where('pass', sha1($pass));
		$db->limit(1);
		$ret = $db->getAll();
		if (!empty($ret)) return $ret;
		else return false;
	}
	
	/**
	 * Returns Admin team details
	 * 
	 * @name _getTeam
	 * @param int Id of the team
	 * @return array Returns array with team details on success or false
	 */ 
	private static function _getTeam($id) {
		if (isset(self::$_cache['teams'][$id])) return self::$_cache['teams'][$id];
		global $db;
		$db->select('system_teams');
		$db->where('id', (int) $id);
		$db->limit(1);
		$ret = $db->getAll();
		if (isset($ret[0]) && !empty($ret[0])) {
			self::$_cache['teams'][$id] = $ret[0];
			return $ret[0];
		}
		else {
			self::$_cache['teams'][$id] = false;
			return false;
		}
	}
	
	/**
	 * Destroys sessions and redirects to the login page
	 * 
	 * @name destroySession
	 */ 
	public static function destroySession() {
		$err = wgError::getErrors();
		$grp = wgError::getErrorsGroups();
		$_SESSION = array();
		if (isset($_SERVER['HTTP_REFERER'])) $url = $_SERVER['HTTP_REFERER'];
		else $url = wgPaths::makeSelfLink();
		$par = wgUrl::getQueryVariablesAsArray($url);
		if (isset($par['logout'])) unset($par['logout']);
		if (isset($par['wgssid'])) unset($par['wgssid']);
		$par = '?'.http_build_query(array('from'=>$par));
		unset($err);
		unset($grp);
		
		if (!(bool) wgPaths::redirect(wgPaths::getAdminPath('url').'login.php'.$par)) {
			$file = NULL;
			$line = NULL;
			headers_sent($file, $line);
			echo "Can't redirect to login page, process is terminated. Headers started in ".': '.$file.'; line: '.$line;
			exit();
		}
	}
	
}

?>