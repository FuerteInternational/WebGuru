<?php

class wgUrl extends wgText {
	
	public static function getUrlRegex() {
		// SCHEME
		$urlregex = "^(https?|ftp)\:\/\/";
		// USER AND PASS (optional)
		$urlregex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";
		// HOSTNAME OR IP
		$urlregex .= "[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*";  // http://x = allowed (ex. http://localhost, http://routerlogin)
		//$urlregex .= "[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)+";  // http://x.x = minimum
		//$urlregex .= "([a-z0-9+\$_-]+\.)*[a-z0-9+\$_-]{2,3}";  // http://x.xx(x) = minimum
		// use only one of the above
		// PORT (optional)
		$urlregex .= "(\:[0-9]{2,5})?";
		// PATH  (optional)
		$urlregex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?";
		// GET Query (optional)
		$urlregex .= "(\?[a-z+&\$_.-][a-z0-9;:@/&%=+\$_.-]*)?";
		// ANCHOR (optional)
		$urlregex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
		// check
		return $urlregex;
	}
	
	public static function validateUrl($url) {
		return (bool) wgText::eregi(self::getUrlRegex(), $url);
	}
	
	public static function getQueryVariablesAsArray($link) {
		if (empty($link)) return array();
		$link = str_ireplace('&amp;', '&', $link);
		$link = preg_replace('/(.*?\?)/si', '', $link);
		parse_str($link, $arr);
		return $arr;
	}
	
	
	
}

?>