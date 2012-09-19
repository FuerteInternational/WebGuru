<?php
/**
 * Cookies
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 */

class wgCookies {

	/**
	 * Set a cookie for website
	 * 
	 * @name set
	 * @param string name Name of the cookie (key, identifier)
	 * @param mixed value Value of the cookie
	 * @return bool True if successful or false if not
	 */ 
	public static function set($name, $value=NULL) {
		if (!headers_sent()) {
			if (!is_array($name)) {
				if (is_array($value)) $value = http_build_query($value);
				return (bool) setcookie($name, $value, time()+(3600*1440));
			}
			else return false;
		}
		else return false;
	}
	
	public static function get($name) {
		if (isset($_COOKIE[$name])) return $_COOKIE[$name];
		else return NULL;
	}
	
	public static function is($name) {
		return isset($_COOKIE[$name]);
	}
	
	/**
	 * Delete a cookie
	 * 
	 * @name delete
	 * @param string name Name of the cooke to delete
	 */ 
	public static function delete($name) {
		return setcookie($name, '', time()-(3600*1440));
	}
}
?>