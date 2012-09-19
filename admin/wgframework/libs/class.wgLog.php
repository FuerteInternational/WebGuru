<?php

class wgLog {
	
	public function __construct() {
	
	}
	
	public static function log($message, $fileid='general') {
		$message = date('H:i:s Y:m:d').' - '.$message."\r\n";
		$path = wgPaths::getAdminPath().'logs/';
		$file = $fileid.'.log';
		$ok = true;
		if (!is_dir($path)) $ok = (bool) wgIo::mkdir($path);
		if ($ok) wgIo::writeFile($path.$file, $message, 'a');
	}
}

?>