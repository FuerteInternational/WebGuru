<?php

interface wgGlobalVariables {
	
	public static function isValue($key);
	
	public static function getValue($key, $subkey=NULL);
	
	public static function setValue($key, $value=NULL);
	
	public static function setDefaultValue($key, $value=NULL);
	
	public static function clearDefaultValue();
	
	public static function getAll();
	
}

?>