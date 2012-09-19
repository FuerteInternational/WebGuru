<?php

class wgRedirect {
	
	public static function send404() {
		header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
		exit();
	}
	
}

?>