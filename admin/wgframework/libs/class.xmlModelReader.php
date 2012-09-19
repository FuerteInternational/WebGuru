<?php
class xmlModelReader {
	
	private static $_tableCache = array();
	
	public static function getTableInfo($table) {
		
	}
	
	public static function getForeignKeys($table) {
		require('XML/Parser.php');
		$data = self::_getTableXml($table);
		print_r(xml_parse(xml_parser_create(), $data));
		exit();
		$doc = new DOMDocument();
		//$doc->load($data);
		$doc->loadXML($data);
		$cols = $doc->getElementsByTagName('column');
		
		foreach($cols as $col) {
			$fk = $col->getElementsByTagName('constraint');
			//print_r($doc->name);
			var_dump($col);
			//$title = $fk->item(0)->nodeValue;
			//echo "$title - $author - $publisher\n";
		}
		exit();
	}
	
	public static function getColumns($table) {
		
	}
	
	private static function _getTableXml($table) {
		if (isset(self::$_tableCache[$table])) return self::$_tableCache[$table];
		else {
			$path = self::_getTablePath($table);
			return wgIo::readFile($path);
		}
	}
	
	private static function _getTablePath($table) {
		$parts = explode('_', $table);
		foreach ($parts as $key=>$part) $parts[$key] = ucfirst($part);
		$name = implode('', $parts);
		$path = wgPaths::getAdminPath().'wgframework/relations/config.'.$name.'.xml';
		if (file_exists($path)) return $path;
		else return false;
	}
	
}
?>