<?php

class phpCompressor  {


	public function __construct() {
	}
	
	public static function compress($code) {
		//$code = str_ireplace("\r", ' ', $code);
		//$code = str_ireplace("\n", ' ', $code);
		//$code = preg_replace('/\/\/.*?/si', ' ', $code);
		//$code = preg_replace('/[ ]+/si', ' ', $code);
		//$code = preg_replace('/(<!--.*?-->)/si', '', $code);
		return $code;
	}

	function __destruct() {
	}
}
?>