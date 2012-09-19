<?php
/**
 * Database informations class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      10. November 2008
 */

class getDb {
	
	/**
	 * Creates table image (CREATE TABLE) without data
	 *
	 * @name getTable
	 * @author Ondrej Rafaj
	 * @param string $table Name of the table
	 * @return string Create table
	 */
	public static function getTable($table) {
		$query = "SHOW CREATE TABLE `$table`;";
		$arr = self::_getResults($query);
		return preg_replace('/AUTO_INCREMENT=[0-9]+/si', 'AUTO_INCREMENT=0', $arr[0][1]);
	}
	
	/**
	 * Returns table status
	 *
	 * @name getTablesStatus
	 * @author Ondrej Rafaj
	 * @param string $db Name of the database
	 * @return array Table status
	 */
	public static function getTablesStatus($db=NULL) {
		if ((bool) $db) $db = ' FROM `'.$db.'`';
		else $db = NULL;
		$query = "SHOW TABLE STATUS$db;";
		return self::_getResults($query);
	}
	
	/**
	 * Returns list of tables
	 *
	 * @name getTables
	 * @author Ondrej Rafaj
	 * @return array Tables
	 */
	public static function getTables() {
		$query = "SHOW TABLES;";
		return self::_getResults($query);
	}
	
	/**
	 * Returns columns in the table
	 *
	 * @name getTableColumns
	 * @author Ondrej Rafaj
	 * @param string $table Name of the table
	 * @return array Table columns
	 */
	public static function getTableColumns($table) {
		$query = "SHOW COLUMNS FROM `$table`;";
		return self::_getResults($query);
	}
	
	/**
	 * Returns array results from the database
	 *
	 * @name _getResults
	 * @author Ondrej Rafaj
	 * @param string $query Database Query
	 * @return array Results
	 */
	protected static function _getResults($query) {
		global $db;
		return $db->getAll($query);
	}
	
	/**
	 * Returns table keys info
	 *
	 * @name getTableKeys
	 * @author Ondrej Rafaj
	 * @param string $table Table name
	 * @return array Results
	 */
	public static function getTableKeys($table) {
		global $conf;
		$db = new wgConnector();
		$db->changeDB('information_schema');
		$dbname = $conf['db']['dtbs'];
		$ret = $db->getAll("SELECT * FROM KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table';");
		$db->changeDB($dbname);
		return $ret;
	}
	
}

?>