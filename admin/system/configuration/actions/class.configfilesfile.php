<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/actions
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */
final class configfilesfileActionsConfiguration extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::__construct();
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = NULL;      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		
		// filling parameters with data
		self::$_par = array();
		//Array
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			if ($mand) {
				$ok = (bool) self::doSaveConfigFile();
				if ($ok) wgError::add('configsaved', 2);
				else wgError::add('cantsave');
			}
		}
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for config file
	 *
	 * @return bool Success
	 */
	private static function doSaveConfigFile() {
		global $conf;
		wgLang::addModuleDefaultFile('configuration');
		$file = wgPaths::getAdminPath().'config/config.php';
		wgIo::backup($file);
		$data = NULL;
		$var = &$_SESSION['data'];
		$var = array();
		$fnc = &$_SESSION['func'];
		$fnc = array();
		$a = wgPost::getValue('conf');
		$b['db'] = $conf['db'];
		$c = array_merge($b, $a);
		$i = wgPost::getValue('info');
		$longestlen = 0;
		$longestfnc = 0;
		foreach ($c as $gid=>$g) {
			foreach ($g as $k=>$v) {
				$var[$gid.$k] = $v;
				$fnc[$gid.$k] = "\$conf['$gid']['$k']";
				if ($longestlen < strlen($v)) $longestlen = strlen($v);
				if ($longestfnc < strlen($fnc[$gid.$k])) $longestfnc = strlen($fnc[$gid.$k]);
			}
		}
		$longestlen += 6;
		$longestfnc += 3;
		foreach ($c as $gid=>$g) {
			$data .= "\r\n\r\n// ".wgLang::get('cnf'.$gid)."\r\n";
			foreach ($g as $k=>$v) {
				if (is_numeric($v)) $data .= self::setFunc($gid.$k, $longestfnc).' = '.self::setInt($gid.$k, $i[$gid][$k], $longestlen).'
'; 
				else $data .= self::setFunc($gid.$k, $longestfnc).' = '.self::setString($gid.$k, $i[$gid][$k], $longestlen).'
';
			}
		}
		//return true;
		$data = '<?php
/**
 * WebGuru3 configuration file
 *
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @author     WebGuruCMS3 Configuration module
 * @version    Generated automaticaly
 */

'.$data.'
?>';
		return wgIo::writeFile($file, $data);
	}

	private static function setFunc($key, $longestlen) {
		$val = (string) $_SESSION['func'][$key];
		$len = (int) strlen($val);
		$width = ($longestlen-$len);
		if ($width < 0) wgError::add($width.' -> '.$key.' -> '.$val);
		$spaces = '';
		for ($i=0; $i<=$width; $i++) $spaces .= ' ';
		return $val.$spaces;
	}
	
	private static function setString($key, $comment=NULL, $longestlen) {
		$val = (string) '"'.$_SESSION['data'][$key].'"';
		$len = (int) strlen($val);
		$width = ($longestlen-$len);
		if ($width < 0) wgError::add($width.' -> '.$key.' -> '.$val);
		$spaces = '';
		for ($i=0; $i<=$width; $i++) $spaces .= ' ';
		if (!empty($comment)) $comment = '// '.$comment;
		return $val.';'.$spaces.$comment;
	}
	
	private static function setInt($key, $comment=NULL, $longestlen) {
		$val = (string) ((int) $_SESSION['data'][$key]);
		$len = (int) strlen($val);
		$width = ($longestlen-$len);
		if ($width < 0) wgError::add($width.' -> '.$key.' -> '.$val, 1);
		$spaces = '';
		for ($i=0; $i<=$width; $i++) $spaces .= ' ';
		if (!empty($comment)) $comment = '// '.$comment;
		return $val.';'.$spaces.$comment;
	}
	
	private static function setValue($val, $comment=NULL, $longestlen) {
		if (!is_numeric($val)) $val = (string) '"'.$val.'"';
		else $val = (string) $val;
		$len = (int) strlen($val);
		$width = ($longestlen-$len);
		if ($width < 0) wgError::add($width.' -> '.$val, 2);
		$spaces = '';
		for ($i=0; $i<=$width; $i++) $spaces .= ' ';
		if (!empty($comment)) $comment = '// '.$comment;
		return ''.$val.';'.$spaces.$comment;
	}
	

}

?>