<?php

class doExtendedModel extends doModel {


	public  function __construct() {
		parent::__construct();
		parent::_checkFolders();
		$tables = parent::_createModels();
		foreach ($tables as $table) {
			$tableName = parent::_getClassNameFromTable($table[0]);
			self::_makeExtendedModel($table[0], $tableName);
		}
	}
	
	// ------------------------------ functions ------------------------------
	
	private static function _makeExtendedModel($table, $tableName) {
		require_once('domodel/class.makeExtendedModel.php');
		new makeExtendedModel($table, $tableName);
	}
	
	
	
}


?>