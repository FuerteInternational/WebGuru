<?php 
/*
Design by Ondra Rafaj ... ondrej.rafaj@fuerte.cz
Code by Ondra Rafaj ... ondrej.rafaj@fuerte.cz
Copyright 2008 www.fuerte.cz
*/
// nastartuji sessions
class error {
	// 0 - fault (red)
	// 1 - warning (orange)
	// 2 - ok (green)
	public function add($text, $how=0) {
		global $lang;
		if ($lang instanceof language) {
			$text = $text;
		}
		if (empty($_SESSION['error'])) $_SESSION['error'] = array();
		$_SESSION['error'][] = array($text, $how);
	}
}
?>
