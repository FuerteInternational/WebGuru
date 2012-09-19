<?php

class wgHtml extends wgText {

	public static function parseUrlsToLinks($text) {
		$str = str_replace('www.', 'http://www.', $text);
		$str = preg_replace('|http://([a-zA-Z0-9-\./]+)|', '<a href="http://$1">$1</a>', $str);
		$str = preg_replace('/(([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6})/', '<a href="mailto:$1">$1</a>', $str);
		return $str;
	}
	

}

?>