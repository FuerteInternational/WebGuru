<?php

class wgSearch extends wgText {
	
	public static function parseSearchKeywords($text) {
		$text = parent::lowercase($text);
		$text = parent::doFilter($text);
		$parts = explode(' ', $text);
		return $parts;
	}
	
	
}

?>