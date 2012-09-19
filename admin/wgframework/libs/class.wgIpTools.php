<?php

class wgIpTools {
	
	public static function getPrivateIp($ip, $hideElements=1, $element='*') {
		$he = (int) $hideElements;
		if ($he > 3) $he = 3;
		if ($he < 1) $he = 1;
		$parts = explode('.', $ip);
		if (count($parts) != 4) return $element.'.'.$element.'.'.$element.'.'.$element;
		$i = 0;
		for ($k=3; $i<$he; $k--) {
			$parts[$k] = $element;
			$i++;
		}
		return implode('.', $parts);
	}
	
	public static function getUserIp($safeMacIp=true) {
		$ip = $_SERVER["REMOTE_ADDR"];
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		elseif(isset($_SERVER["HTTP_FORWARDED"])) $ip = $_SERVER["HTTP_FORWARDED"];
		elseif(isset($_SERVER["HTTP_CLIENT_IP"])) $ip = $_SERVER["HTTP_CLIENT_IP"];
		if ((bool) $safeMacIp) $ip = str_ireplace('::1', '127.0.0.1', $ip); // mac localhost ip will be unable to unserialize
		return $ip;
	}
	
}

?>