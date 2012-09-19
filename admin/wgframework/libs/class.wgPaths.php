<?php
/**
 * System paths
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      23. October 2008
 */

class wgPaths {
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object paths object
	 */ 
	public function __construct() {
	
	}
	
	public static function makePagerLink($resInfo) {
		
	}
	
	/**
	 * Returns base path for website (root of the website)
	 * 
	 * @name getPath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getPath($type='ftp') {
		if ($type == 'ftp') return self::_getBase();
		elseif ($type == 'url') return self::_getBase('url');
	}
	
	/**
	 * Returns base path of administration for website
	 * 
	 * @name getAdminPath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getAdminPath($type='ftp') {
		if ($type == 'ftp') return self::_getBase().ADMINFOLDER;
		elseif ($type == 'url') return self::_getBase('url').ADMINFOLDER;
	}
	
	/**
	 * Returns path to the temporary folder
	 * 
	 * @name getTempPath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getTempPath($type='ftp') {
		if ($type == 'ftp') return self::_getBase().TEMPFOLDER;
		elseif ($type == 'url') return self::_getBase('url').TEMPFOLDER;
	}
	
	/**
	 * Returns path to the user files folder
	 * 
	 * @name getUserfilesPath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getUserfilesPath($type='ftp', $datestamp=NULL) {
		$add = NULL;
		if (!empty($datestamp) && !wgSystem::isSafeMode()) $add = date('Y/m/d/', $datestamp);
		if (!is_dir(self::_getBase().USRFFOLDER.$add)) wgIo::mkdir(self::_getBase().USRFFOLDER.$add);
		if ($type == 'ftp') return self::_getBase().USRFFOLDER.$add;
		elseif ($type == 'url') return self::_getBase('url').USRFFOLDER.$add;
	}
	
	/**
	 * Returns path to the user web-data folder
	 * 
	 * @name getWebdataPath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getWebdataPath($type='ftp') {
		if ($type == 'ftp') return self::_getBase().'wgwebdata/';
		elseif ($type == 'url') return self::_getBase('url').'wgwebdata/';
	}
	
	/**
	 * Returns path to the admin templates folder
	 * 
	 * @name getTemplatePath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getTemplatePath($type='ftp') {
		global $conf;
		if ($type == 'ftp') return self::getAdminPath().'assets/'.$conf['admin']['template'].'/';
		elseif ($type == 'url') return self::getAdminPath('url').'assets/'.$conf['admin']['template'].'/';
	}
	
	/**
	 * Returns path to the admin templates folder
	 * 
	 * @name getModulePath
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	public static function getModulePath($type='ftp', $name=NULL) {
		if (!(bool) $name) $name = wgSystem::getModule();
		$md = dbSystem::getModulesByName($name);
		if (!(bool) $md) return false;
		if ($type == 'ftp') return self::getAdminPath().$md['part'].'/'.$name.'/';
		elseif ($type == 'url') return self::getAdminPath('url').$md['part'].'/'.$name.'/';
	}
	
	/**
	 * Returns full web path to the system or module unit
	 * 
	 * @name makeLink
	 * @param string $name Name of the module
	 * @param string $page Name of the page
	 * @param mixed $parameter Additional parameters for query string (string or array)
	 * @param string $type Part of the system ("modules", "system")
	 * @return string path
	 */ 
	public static function makeLink($name, $page='index', $parameter=NULL, $type='modules') {
		$ssid = '&amp;wgssid='.session_id();
		if (empty($name)) return wgPaths::getAdminPath('url').'?part=system&mod=home'.$ssid;
		else {
			$amp = NULL;
			if ((bool) $parameter) {
				$amp = '&amp;';
				$act = NULL;
				if (isset($parameter['act'])) {
					$act = $amp.'act='.$parameter['act'];
					unset($parameter['act']);
				}
				$parameter = http_build_query(array('parameter'=>$parameter)).$act;
			}
			return wgPaths::getAdminPath('url').'?part='.$type.'&amp;mod='.$name.'&amp;page='.$page.$amp.$parameter.$ssid;
		}
	}
	
	public static function makeFrontLink($pars=NULL) {
		$url = parse_url($_SERVER['REQUEST_URI']);
		$qs = array();
		if (isset($url['query'])) parse_str($url['query'], $qs);
		$pager = false;
		$new = NULL;
		if (is_array($pars) && !empty($pars)) {
			if (isset($qs['from']) && $qs['from'] == 0) {
				unset($qs['from']);
				if (isset($qs['pcode'])) unset($qs['pcode']);
			}
			if (isset($pars['from']) && $pars['from'] == 0) {
				unset($pars['from']);
				if (isset($pars['pcode'])) unset($pars['pcode']);
				if (isset($qs['from'])) unset($qs['from']);
				if (isset($qs['pcode'])) unset($qs['pcode']);
			}
			foreach ($pars as $k=>$v) $qs[$k] = $v;
		}
		if (isset($url['scheme'])) $new .= $url['scheme'].'://';
		if (isset($url['host'])) $new .= $url['host'].'';
		$new .= $url['path'];
		if (isset($qs['pcode'])) unset($qs['pcode']); // pscode HACK
		$qs = http_build_query($qs, '', '&amp;');
		if (!empty($qs)) $new .= (empty($qs) ? '' : '?'.$qs);
		if (isset($url['fragment'])) $new .= '#'.$url['fragment'];
		return $new;
	}
	
	/**
	 * Returns full web path to the system or module unit
	 * 
	 * @name makeLink
	 * @param string $name Name of the module
	 * @param string $page Name of the page
	 * @param mixed $parameter Additional parameters for query string (string or array)
	 * @return string path
	 */ 
	public static function makeModuleLink($name=NULL, $page='index', $parameter=NULL) {
		if (!(bool) $name) $name = wgSystem::getModule();
		$md = dbSystem::getModulesByName($name);
		if (!(bool) $md) return false;
		$type = $md['part'];
		return self::makeLink($name, $page, $parameter, $type);
	}
	
	/**
	 * Returns full web path to the system or module unit
	 * 
	 * @name moduleRedirect
	 * @param string $page Name of the page
	 * @param string $module Name of the module
	 * @param mixed $parameter Additional parameters for query string (string or array)
	 * @param string $type Part of the system ("modules", "system")
	 */ 
	public static function moduleRedirect($page, $resendPost=NULL) {
		if (isset($_POST['act'])) unset($_POST['act']);
		if (!(bool) $page) $page = wgSystem::getPage();
		if ((bool) $resendPost) wgSystem::savePost();
		$path = self::removeAmps(self::makeLink(wgSystem::getModule(), $page, NULL, wgSystem::getPart()));
		self::redirect($path);
	}
	
	/**
	 * Replace all &amp; for just &
	 * 
	 * @name removeAmps
	 * @param string $string Input string
	 * @return string String without &amp;
	 */ 
	public static function removeAmps($string) {
		return $string;
		//return str_ireplace('&amp;', '&', $string);
	}
	
	/**
	 * Returns full web path to the actual page
	 * 
	 * @name makeSelfLink
 	 * @param mixed $par Url parameters (array or string)
 	 * @param bool $amps True for "&amp;", false for "&"
	 * @return string path
	 */ 
	public static function makeSelfLink($par=NULL, $amps=true) {
		$amps = true;
		if (!empty($par)) {
			if (is_array($par)) {
				if (isset($par['page'])) {
					wgSystem::setGetValue('page', $par['page']);
					unset($par['page']);
				}
				$np = NULL;
				foreach ($par as $k=>$v) $np .= '&amp;'.$k.'='.$v;
				$par = $np;
			}
			$par = '&amp;'.$par;
		}
		$par = str_ireplace('&amp;&amp;', '&amp;', $par);
		if (isset($_GET['parameter']['act'])) unset($_GET['parameter']['act']);
		$path = self::makeLink(wgSystem::getModule(), wgSystem::getPage(), NULL, wgSystem::getPart()).$par;
		if ((bool) $amps) return $path;
		else return str_ireplace('&amp;', '&', $path);
	}
	
	public static function makeTableEditLink($id, $par=NULL, $page=NULL, $amps=true) {
		if (is_array($par)) $par['edit'] = $id;
		else $par .= '&amp;edit='.$id;
		if (!(bool) $page || $page == wgSystem::getPage()) return self::makeSelfLink($par, $amps);
		else return self::makePageLink($page, $par, $amps);
	}
	
	public static function makeTableDeleteLink($id, $par=NULL, $amps=true) {
		if (is_array($par)) $par['delete'] = $id;
		else $par .= '&amp;delete='.$id;
		return self::makeSelfLink($par, $amps);
	}
	
	/**
	 * Returns full web path to the specified page in actual module
	 * 
	 * @name makePageLink
	 * @param string $page Name of the page
 	 * @param string $par Url parameters
 	 * @param bool $amps True for "&amp;", false for "&"
	 * @return string path
	 */ 
	public static function makePageLink($page, $par=NULL, $amps=true) {
		$amps = true;
		if (!empty($par)) $par = '&amp;'.$par;
		$path = self::makeLink(wgSystem::getModule(), $page, NULL, wgSystem::getPart()).$par;
		if ((bool) $amps) return $path;
		else return str_ireplace('&amp;', '&', $path);
	}
	
	/**
	 * Returns full web path with edit params if any
	 * 
	 * @name makeEditLink
 	 * @param string $par Url parameters
 	 * @param bool $amps True for "&amp;", false for "&"
	 * @return string path
	 */ 
	public static function makeEditLink($par=NULL, $amps=true) {
		$amps = true;
		if (!empty($par)) {
			if (is_array($par)) {
				if (isset($par['page'])) {
					wgSystem::setGetValue('page', $par['page']);
					unset($par['page']);
				}
				$np = NULL;
				foreach ($par as $k=>$v) $np .= '&amp;'.$k.'='.$v;
				$par = $np;
			}
			$par = '&amp;'.$par;
		}
		$par = str_ireplace('&amp;&amp;', '&amp;', $par);
		if (!eregi('edit=', $par)) $par .= '&amp;edit='.wgSystem::getRequestValue('edit');
		if ((bool) wgPost::getValue('act')) $par .= '&amp;show='.wgPost::getValue('act');
		if (isset($_GET['parameter']['act'])) unset($_GET['parameter']['act']);
		$path = self::makeLink(wgSystem::getModule(), wgSystem::getPage(), NULL, wgSystem::getPart()).$par;
		if ((bool) $amps) return $path;
		else return str_ireplace('&amp;', '&', $path);
	}
	
	/**
	 * Redirection to the referrer page
	 * 
	 * @name redirectToReferer
	 */ 
	public static function redirectToReferer() {
		$path = str_ireplace('&amp;', '&', $_SERVER['HTTP_REFERER']);
		self::redirect($path);
	}
	
	/**
	 * Redirection
	 * 
	 * @name redirect
	 * @param string $path Destination URL
	 */ 
	public static function redirect($path=NULL) {
		if (!(bool) $path) $path = self::makeSelfLink(false);
		$path = str_ireplace('&amp;', '&', $path);
		//if (isset($_POST['apply']) && (bool) wgPost::getValue('edit')) $path .= '&act='.wgPost::getValue('act').'&edit='.wgPost::getValue('edit');
		$file = NULL;
		$line = NULL;
		if (!headers_sent($file, $line)) {
			wgConnector::saveQueries();
			header('Location: '.$path);
			exit();
		}
		else {
			if (DEVELOP == true) wgError::add(wgLang::get('headerssent').': '.$file.' => '.$line);
			else wgError::add('headerssent');
			return false;
		}
	}
	
	public static function redirect301($path=NULL) {
		if (!(bool) $path) $path = self::makeSelfLink(false);
		$path = str_ireplace('&amp;', '&', $path);
		//if (isset($_POST['apply']) && (bool) wgPost::getValue('edit')) $path .= '&act='.wgPost::getValue('act').'&edit='.wgPost::getValue('edit');
		$file = NULL;
		$line = NULL;
		if (!headers_sent($file, $line)) {
			wgConnector::saveQueries();
			header ('HTTP/1.1 301 Moved Permanently');
			header('Location: '.$path);
			exit(); 
		}
		else {
			if (DEVELOP == true) wgError::add(wgLang::get('headerssent').': '.$file.' => '.$line);
			else wgError::add('headerssent');
			return false;
		}
	}
	
	/**   
	 * Returns base path for website (root of the website) which can be different if system is running under safe_mode
	 * 
	 * @name _getBase
	 * @param string $type Can be "ftp" or "url" for type of the path
	 * @return string path
	 */ 
	private static function _getBase($type='ftp') {
		global $system;
		if (defined('PAGEID')) {
			if ($type == 'ftp') return $system['paths']['rootpath'];
			elseif ($type == 'url') return WEBROOT;
		}
		else {
			if ($type == 'ftp') return '../';
			elseif ($type == 'url') return WEBROOT;
		}
	}
	
	public static function getWebPaths() {
		//if (wgSessions::isSession('webpaths')) return wgSessions::getSession('webpaths');
		$arr = SystemWebsitesModel::doSelect();
		$new = array();
		foreach ($arr as $w) {
			$new['webs'][$w->getId()]['web'] = $w;
			$new['webs'][$w->getId()]['lang'] = SystemLanguageModel::getLanguagesIdArrayForWeb($w->getId());
			$new['lang'] = SystemLanguageModel::getLanguagesIdArrayForWeb();
		}
		wgSessions::setSession('webpaths', $new);
		return $new;
	}
	
	public static function resetWebPaths() {
		wgSessions::setSession('webpaths', NULL);
	}
	
	public static function getReversePath($path, $from=false) {
		if ($path == './' || empty($path)) return './';
		if (!(bool) $from) $from = trim(dirname(getcwd()), '/');
		else $from = trim(dirname($from), '/');
		if (ereg('/', $from)) $fpieces = explode('/', $from);
		else $fpieces = explode('\\', $from);
		$fpieces = array_reverse($fpieces);
		$path = trim($path, '/');
		$pieces = explode('/', $path);
		$new = array();
		foreach ($pieces as $k=>$p) {
			if ($p == '..') $new[$k] = array_shift($fpieces);
			elseif ($p == '.') {}
			else $new[$k] = '..';
		}
		$new = array_reverse($new);
		$path = implode('/', $new);
		return ''.$path.'/';
	}
	
	public static function getFullPath($path, $from=false) {
		//if ($path == './' || empty($path)) return './';
		//$path = 
		if (!(bool) $from) {
			$from = dirname($_SERVER["SCRIPT_FILENAME"]).'/';
			$from = str_ireplace('/'.wgConfig::getConfValue('adminfolder'), '', $from);
		}
		else $from = trim(dirname($from), '/');
		$fpieces = explode('/', $from);
		$fpieces = array_reverse($fpieces);
		$path = trim($path, '/');
		$pieces = explode('/', $path);
		$new = array();
		foreach ($pieces as $k=>$p) {
			if ($p == '..') array_shift($fpieces);
			else $new[$k] = $p;
		}
		$new = array_reverse($new);
		$new = array_merge($new, $fpieces);
		$new = array_reverse($new);
		$path = implode('/', $new);
		return ''.$path.'/';
	}
	
	public static function getPageReversePath($id, $type='ftp') {
		$id = (int) $id;
		if (!(bool) $id) return false;
		if ($type != 'url') $type = 'ftp';
		$page = PagesModel::doSelectPKey($id);
		if (!(bool) $page->getHome()) {
			$path = self::getLangPath($page->getSystemLanguageId());
			$arr = PagesModel::makeBreadcrumbsArray($id);
		}
		else $path = self::getWebPath($page->getSystemWebsitesId());
		return self::getReversePath($path);
	}
	
	public static function getPagePath($id, $type='ftp') {
		$id = (int) $id;
		if (!(bool) $id) return false;
		if ($type != 'url') $type = 'ftp';
		$page = PagesModel::doSelectPKey($id);
		if (!(bool) $page->getHome()) {
			$path = self::getLangPath($page->getSystemLanguageId(), $type);
			$arr = PagesModel::makeBreadcrumbsArray($id);
			$arr = array_reverse($arr);
			foreach ($arr as $p) $path .= $p->getIdentifier().'/';
		}
		else {
			$lang = SystemLanguageModel::doSelectPKey($page->getSystemLanguageId());
			if (!(bool) $lang->getIsdefault()) $path = self::getLangPath($page->getSystemLanguageId(), $type);
			else $path = self::getWebPath($page->getSystemWebsitesId(), $type);
		}
		return $path;
	}
	
	public static function getLangPath($id, $type='ftp') {
		$id = (int) $id;
		if ($type != 'url') $type = 'ftp';
		$paths = self::getWebPaths();
		if (!isset($paths['lang'][$id])) return false;
		else {
			$wid = (int) $paths['lang'][$id]->getSystemWebsitesId();
			if ((bool) $paths['lang'][$id]->getIsdefault()) return self::getWebPath($wid, $type);
			else return self::getWebPath($wid, $type).$paths['lang'][$id]->getDirectory();
		}
	}
	
	public static function getWebPath($id, $type='ftp') {
		$id = (int) $id;
		if ($type != 'url') $type = 'ftp';
		$paths = self::getWebPaths();
		if (!isset($paths['webs'][$id])) return false;
		else {
			if ($type == 'url') return $paths['webs'][$id]['web']->getAlternativepath();
			else {
				//if ($paths['webs'][$id]['web']->getIsdefault()) return NULL;
				//else return $paths['webs'][$id]['web']->getDirectory();
				return $paths['webs'][$id]['web']->getDirectory();
			}
		}
	}
	
	
	
	/**
	 * Object destructor
	 * 
	 * @name __destruct
	 */ 
	public function __destruct() {
	
	}
}

?>