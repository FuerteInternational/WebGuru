<?php
class wgChmod extends wgIo {
	
	private static $_log = array(0=>array(), 1=>array(), 2=>array());
	
	public static function setChmod($filename, $chmod=NULL) {
		if (!(bool) $chmod) $chmod = parent::SAFE_READ_WRITE;
		return (bool) @chmod($filename, $chmod);
	}
	
	public static function setChmodRecursively($initialPath, $chmod=NULL, $log=false) {
		self::_doRecursiveChmod($initialPath, $chmod, $log);
		if ((bool) $log) if ((bool) count(self::$_log[0])) return false;
		return true;
	}
	
	private static function _doRecursiveChmod($initialPath, $chmod, $log) {
	if (is_file($initialPath)) return self::setChmod($initialPath, $chmod);
		else {
			$arr = parent::getFoldersAndFiles($initialPath);
			foreach ($arr as $v) {
				$path = trim('/', $initialPath);
				$path = '/'.$path.'/';
				$ok = (bool) self::setChmodRecursively($path, $chmod, $log);
				if ((bool) $log) self::_addLog($path, $ok ? 2 : 0);
			}
		}
	}
	
	private static function _addLog($message, $type=2) {
		self::$_log[$type][] = $message;
	}
	
	public static function getLogs($type=NULL) {
		if ($type >= 0 && $type <= 2) return self::$_log[$type];
		else return self::$_log;
	}
	
}
?>