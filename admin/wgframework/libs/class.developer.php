<?php

class developer {
	
	public static function getModuleSize($module, $string=true) {
		return wgIo::getSize(wgPaths::getModulePath('ftp', $module), $string);
	}
	
	public static function getStyleSize($style, $string=true) {
		return wgIo::getSize(wgPaths::getAdminPath().'issues/'.$style.'/', $string);
	}
	
}

?>