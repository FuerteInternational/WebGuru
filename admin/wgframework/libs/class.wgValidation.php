<?php

class wgValidation extends wgText {
	
	public static function email($email) {
		$isValid = true;
		$atIndex = strrpos($email, '@');
		if (is_bool($atIndex) && ! $atIndex) $isValid = false;
		else {
			$domain = substr($email, $atIndex + 1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64) $isValid = false; // local part length exceeded
			else if ($domainLen < 1 || $domainLen > 255) $isValid = false; // domain part length exceeded
			else if ($local [0] == '.' || $local [$localLen - 1] == '.') $isValid = false; // local part starts or ends with '.'
			else if (preg_match( '/\\.\\./', $local )) $isValid = false; // local part has two consecutive dots
			else if (!preg_match( '/^[A-Za-z0-9\\-\\.]+$/', $domain )) $isValid = false; // character not valid in domain part
			else if (preg_match( '/\\.\\./', $domain )) $isValid = false; // domain part has two consecutive dots
			else if (!preg_match( '/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace ( "\\\\", "", $local ) )) {
				if (!preg_match( '/^"(\\\\"|[^"])+"$/', str_replace ( "\\\\", "", $local ) )) $isValid = false; // character not valid in local part unless local part is quoted
			}
			if ($isValid && ! (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A'))) $isValid = false; // domain not found in DNS
		}
		return $isValid;
	}
	
	public static function name($text) {
		return !empty($text);
	}
	
	public static function isEmpty($text) {
		return empty($text);
	}
	
	public static function minChars($text, $chars) {
		$count = strlen($text);
		return ($count >= $chars ? true : false);
	}
	
	public static function maxChars($text, $chars) {
		$count = strlen($text);
		return ($count <= $chars ? true : false);
	}
	
	
	
}

?>