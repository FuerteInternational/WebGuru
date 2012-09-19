<?php

class generatePages {
	
	function __construct() {
	
	}
	
	public function generateSitemap($p) {
		return PagesModel::getSitemap();
	}
	
	
}

?>