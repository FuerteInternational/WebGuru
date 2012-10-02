<?php
/**
 * database wgConnector
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    2.0.0.0
 * @since      16. October 2008
 * 
 * @todo Add the NEW(), ADD() functionality
 */

class wgConnector {
	
	private static $_isconnected = false;
	private static $_conn = NULL;
	private static $_host = NULL;
	private static $_user = NULL;
	private static $_pass = NULL;
	private static $_dtbs = NULL;
	
	private static $_lastquery = NULL;
	
	private $_info = array();
	private $_resource = NULL;
	private $_type = NULL;
	
	private $_doInit = true;
	
	private $_q = array();
	private static $_queries = array();
	private $_stats = array();
	
	/**
	 * Object constructor
	 * 
	 * @name __construct
	 * @return object object
	 */ 
	public function __construct() {
		$this->_init();
		$ok = true;
		if (!(bool) self::$_conn) $ok = (bool) self::connect();
		if ($ok) return $this;
		else return false;
	}
	
	public function setInit($init=true) {
		$this->_doInit = (bool) $init;
	}
	
	public static function emptyQueries() {
		self::$_queries = array();
	}
	
	public static function restoreQueries() {
		self::$_queries = array_merge(self::$_queries, self::getSavedQeries());
		self::emptySavedQueries();
	}
	
	public static function emptySavedQueries() {
		$_SESSION['system']['wgConnector']['queries'] = array();
	}
	
	public static function saveQueries() {
		$_SESSION['system']['wgConnector']['queries'] = self::$_queries;
	}
	
	public static function getSavedQeries() {
		if (isset($_SESSION['system']['wgConnector']['queries'])) return $_SESSION['system']['wgConnector']['queries'];
		else return array();
	}
	
	/**
	 * Connection to the database
	 * 
	 * @name connect
	 * @param string $host host for the database (def. localhost)
	 * @param string $user user name for connection to the databse (def. root)
	 * @param string $pass password for user
	 * @param string $dtbs database name
	 * @return bool Success
	 */ 
	public static function connect($host=NULL, $user=NULL, $pass=NULL, $dtbs=NULL) {
		self::restoreQueries();
		if ((bool) $host) self::$_host = $host;
		if ((bool) $user) self::$_user = $user;
		if ((bool) $pass) self::$_pass = $pass;
		if ((bool) $dtbs) self::$_dtbs = $dtbs;
		if ((bool) self::$_host) {
			self::$_conn = mysql_connect(self::$_host, self::$_user, self::$_pass) or die('Error connecting to MySQL');
			if ((bool) self::$_conn) self::$_isconnected = (bool) mysql_select_db(self::$_dtbs) or die('Database '.self::$_dtbs.' does not exist!');
			else self::$_isconnected = false;
		}
		return self::$_isconnected;
	}
	
	/**
	 * Prepare the class for the next query
	 * 
	 * @name _init
	 * @param string $type can be "not", "sel", "upd", "del", or "ins" for type of the query
	 */ 
	private function _init($type='not') {
		$this->_type = $type;
		$this->_q = array();
		$this->_q['query'] = NULL;
		$this->_q['basic'] = NULL;
		$this->_q['join'] = NULL;
		$this->_q['onjoin'] = NULL;
		$this->_q['set'] = NULL;
		$this->_q['inserts'] = array();
		$this->_q['inserts']['a'] = array();
		$this->_q['inserts']['b'] = array();
		$this->_q['where'] = NULL;
		$this->_q['order'] = NULL;
		$this->_q['group'] = NULL;
		$this->_q['limit'] = NULL;
	}
	
	/**
	 * Initiate SELECT from defined table 
	 * 
	 * @name select
	 * @param string $table name of the table
	 * @param string $what additioonal parameters to select
	 * @return bool true / false
	 */ 
	public function select($table, $what='*') {
		if ($this->_doInit) $this->_init('sel');
		if (!(bool) $table || !(bool) $what) return false;
		$this->_q['basic'] = 'SELECT '.$what.' FROM '.$this->getTableName($table).' ';
		return true;
	}
	
	/**
	 * Initiate INNER JOIN SELECT from defined tables
	 * 
	 * @name innerJoin
	 * @param string $table name of the table
	 * @param string $table2 name of the second table
	 * @param string $what additioonal parameters to select
	 * @return bool true / false
	 */ 
	public function innerJoin($table, $table2, $what = '*') {
		if ($this->_doInit) $this->_init('join');
		if (!(bool) $table || !(bool) $table2 || !(bool) $what) return false;
		$this->_q['basic'] = 'SELECT '.$what.' FROM '.$this->getTableName($table).' a INNER JOIN '.$this->getTableName($table2).' b ';
		return true;
	}
	
	/**
	 * Initiate LEFT JOIN SELECT from defined tables
	 * 
	 * @name leftJoin
	 * @param string $table name of the table
	 * @param string $table2 name of the second table
	 * @param string $what additioonal parameters to select
	 * @return bool true / false
	 */ 
	public function leftJoin($table, $table2, $what = '*') {
		if ($this->_doInit) $this->_init('join');
		if (!(bool) $table || !(bool) $table2 || !(bool) $what) return false;
		$this->_q['basic'] = 'SELECT '.$what.' FROM '.$this->getTableName($table).' a LEFT JOIN '.$this->getTableName($table2).' b ';
		return true;
	}
	
	/**
	 * Initiate RIGHT JOIN SELECT from defined tables
	 * 
	 * @name rightJoin
	 * @param string $table name of the table
	 * @param string $table2 name of the second table
	 * @param string $what additioonal parameters to select
	 * @return bool true / false
	 */ 
	public function rightJoin($table, $table2, $what = '*') {
		if ($this->_doInit) $this->_init('join');
		if (!(bool) $table || !(bool) $table2 || !(bool) $what) return false;
		$this->_q['basic'] = 'SELECT '.$what.' FROM '.$this->getTableName($table).' a RIGHT JOIN '.$this->getTableName($table2).' b ';
		return true;
	}
	
	/**
	 * Initiate UPDATE of the defined table 
	 * 
	 * @name update
	 * @param string $table name of the table
	 * @return bool true / false
	 */ 
	public function update($table) {
		if ($this->_doInit) $this->_init('upd');
		if (!(bool) $table) return false;
		$this->_q['basic'] = 'UPDATE '.$this->getTableName($table).' ';
		return true;
	}
	
	/**
	 * Initiate INSERT to the defined table 
	 * 
	 * @name insert
	 * @param string $table name of the table
	 * @return bool true / false
	 */ 
	public function insert($table) {
		if ($this->_doInit) $this->_init('ins');
		if (!(bool) $table) return false;
		$this->_q['basic'] = 'INSERT INTO '.$this->getTableName($table).' ';
		return true;
	}
	
	/**
	 * Initiate DELETE from the defined table
	 * 
	 * @name delete
	 * @param string $table name of the table
	 * @return bool true / false
	 */ 
	public function delete($table) {
		if ($this->_doInit) $this->_init('del');
		if (!(bool) $table) return false;
		$this->_q['basic'] = 'DELETE FROM '.$this->getTableName($table).' ';
		return true;
	}
	
	/**
	 * TRUNCATE selected table 
	 * 
	 * @name truncate
	 * @param string $table name of the table to truncate
	 * @return bool true / false
	 */ 
	public function truncate($table) {
		if ($this->_doInit) $this->_init('not');
		if (!(bool) $table) return false;
		$this->_q['basic'] = 'TRUNCATE TABLE '.($table).'; ';
		return (bool) $this->executeQuery();
	}
	
	/**
	 * DROP selected table 
	 * 
	 * @name drop
	 * @param $string tables name of the tables to drop
	 * @return bool true / false
	 */
	public function drop($tables) {
		if ($this->_doInit) $this->_init('not');
		if (empty($tables)) return false;
		if (is_array($tables)) foreach ($tables as $v) {
			$table = ''.PREFIX.$v;
			//TODO: Add support to drop multiple tables
		}
		$this->_q['basic'] = 'DROP TABLE '.$this->getTableName($table).'; ';
		return true;
	}
	
	/**
	 * Adding join conditions 
	 * 
	 * @name onJoin
	 * @param $condition column name
	 * @param $value tables column name
	 * @return bool true / false
	 */
	public function onJoin($condition, $value) {
		if ($this->_type == 'join') {
			if (empty($this->_q['onjoin'])) $amp = 'ON ';
			else $amp = 'AND ';
			$this->_q['onjoin'] .= $amp.' a.'.$condition.' = '.' b.'.$value.' ';
			return true;
		}
		else return false;
	}
	
	/**
	 * Adding WHERE clause to the query 
	 * 
	 * @name where
	 * @param string $condition condition for the where clause
	 * @param string $value value for the condition (only condition is used if false)
	 * @param string $operator operator for where (used only if value is not empty)
	 * @return bool true / false
	 */ 
	public function where($condition, $value=false, $operator='=') {
		if (!(bool) $condition) return false;
		$value = $this->_addSlashes($value);
		if (!(bool) $operator) $operator = '=';
		if (!is_numeric($value)) $value = "'".$value."'";
		if (is_a($condition, 'wgConnector')) print_r($condition);
		$condition .= ' '.$operator.' '.$value;
		if ((bool) $this->_q['where']) $this->_q['where'] .= 'AND '.$condition.' ';
		else $this->_q['where'] = 'WHERE '.$condition.' ';
		return true;
	}
	
	public function myWhere($condition) {
		if (!(bool) $condition) return false;
		if ((bool) $this->_q['where']) $this->_q['where'] .= 'AND '.$condition.' ';
		else $this->_q['where'] = 'WHERE '.$condition.' ';
		return true;
	}
	
	/**
	 * Adding ORDER BY clause to the query 
	 * 
	 * @name where
	 * @param string $orderby ORDER BY condition
	 * @param string $how can be "ASC" or "DESC"
	 * @return bool true / false
	 */ 
	public function order($orderby, $how='ASC') {
		if (!(bool) $orderby) return false;
		//if ($this->_type == 'not') return false;
		if ((bool) $how) {
			$how = $how.' ';
			$orderby = '`'.$orderby.'`';
		}
		if ((bool) $this->_q['order']) $this->_q['order'] .= 'AND '.$orderby.' '.$how.'';
		else $this->_q['order'] = 'ORDER BY '.$orderby.' '.$how.'';
		return true;
	}
	
	/**
	 * Adding GROUP BY clause to the query
	 * 
	 * @name group
	 * @param string $groupby GROUP BY condition
	 * @return bool true / false
	 */ 
	public function group($groupby) {
		if (!(bool) $groupby) return false;
		if ($this->_type == 'upd' || $this->_type == 'del' || $this->_type == 'ins') return false;
		$this->_q['group'] = 'GROUP BY `'.$groupby.'` ';
		return true;
	}
	
	/**
	 * Adding LIMIT clause to the query 
	 * 
	 * @name limit
	 * @param int $number number of items to select
	 * @param int $from start from
	 * @return bool true / false
	 */ 
	public function limit($number, $from=0) {
		if ($this->_type == 'ins') return false;
		$number = (int) $number;
		$from = (int) $from;
		if (!(bool) $number) return false;
		if ($from == 0) $this->_q['limit'] = 'LIMIT '.$number.' ';
		else $this->_q['limit'] = 'LIMIT '.$from.', '.$number.' ';
		return true;
	}
	
	/**
	 * Setting values and columns for UPDATE
	 * 
	 * @name set
	 * @param string $column column
	 * @param string $value value
	 * @return bool true / false
	 */ 
	public function set($column, $value) {
		//if (empty($value)) return true;
		//if ($this->_type != 'upd' || $this->_type != 'not') return false;
		$value = $this->_getReplacements($value, $column);
		if ((bool) $this->_q['set']) $this->_q['set'] .= ', `'.$column.'` = '.$value.' ';
		else $this->_q['set'] = 'SET `'.$column.'` = '.$value.' ';
		return true;
	}
	
	public function rand() {
		$this->_q['order'] = 'ORDER BY RAND() ';
		return true;
	}
	
	/**
	 * Setting values and columns for INSERT
	 * 
	 * @name data
	 * @param string $column column
	 * @param string $value value
	 * @return bool true / false
	 */ 
	public function data($column, $value) {
		//if ($this->_type != 'ins' || $this->_type != 'not') return false;
		$value = $this->_getReplacements($value, $column);
		if ((bool) $this->_q['set']) $this->_q['set'] .= ',`'.$column.'` = '.$value.' ';
		else $this->_q['set'] = 'SET `'.$column.'` = '.$value.' ';
		$this->_q['inserts']['a'][] = $column;
		$this->_q['inserts']['b'][] = $value;
		return true;
	}
	
	/**
	 * Get value replacements
	 * 
	 * @name _getReplacements
	 * @param string $value Value
	 * @return string Real value
	 */ 
	public function _getReplacements($value, $column=NULL) {
		$value = $this->_addSlashes($value);
		if ((string) $value == 'ADD()') return '`'.$column.'` + 1';
		elseif ((string) $value == 'NOW()' || (string) $value == 'NULL' || is_numeric($value) || is_int($value)) return $value;
		else {
			if ((bool) get_magic_quotes_gpc()) return "'".$value."'";
			else return "'".str_replace("'", "\'", $value)."'";
		}
	}
	
	/**
	 * Change working database for session
	 * 
	 * @name changeDB
	 * @param string $newdb name of the new database selected for session
	 * @return bool true if successfuly connected or false if not
	 */ 
	public function changeDB($newdb) {
		if (!(bool) mysql_select_db($newdb)) $this->_isconnected = (bool) mysql_select_db($this->_dtbs);
		else {
			$this->_isconnected = true;
			$this->_dtbs = $newdb;
		}
		return $this->_isconnected;
	}
	
	/**
	 * Executes one query
	 * 
	 * @name makeQuery
	 * @param string $query directly inserted query for database
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return bool true if successful or false
	 */ 
	public function makeQuery($query=NULL, $print=false) {
		if ($query == 'print') {
			$print = true;
			$query = NULL;
		}
		if ((bool) $query) $this->_q['query'] = $query;
		else $query = $this->getQuery();
		return (bool) $this->_executeQuery($query, $print);
	}
	
	/**
	 * Executes one query
	 * 
	 * @name executeQuery
	 * @param string $query directly inserted query for database
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return resource Database resource
	 */ 
	public function executeQuery($query=NULL, $print=false) {
		if ($query == 'print') {
			$print = true;
			$query = NULL;
		}
		if ((bool) $query) $this->_q['query'] = $query;
		else $query = $this->getQuery();
		return $this->_executeQuery($query, $print);
	}
	
	/**
	 * Set the default character se (collation) for session
	 * 
	 * @name characterSet
	 * @param string $encoding default mysql encoding (default is utf8)
	 * @return bool true if successful or false
	 */ 
	public function characterSet($encoding='utf8') {
		if (!(bool) $encoding) $encoding = 'utf8';
		$query = 'SET character_set_client='.$encoding.', character_set_connection='.$encoding.', character_set_results='.$encoding.';';
		return (bool) $this->_executeQuery($query, false);
	}
	
	/**
	 * Makes reader for query
	 * 
	 * @name makeReader
	 * @param string $query directly inserted query for database
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return bool true if successful or false
	 */ 
	public function makeReader($query=NULL, $print=false) {
		if ($query == 'print') {
			$print = true;
			$query = NULL;
		}
		if ((bool) $query) $this->_q['query'] = $query;
		else $query = $this->getQuery();
		$this->_resource = NULL;
		$this->_resource = $this->_executeQuery($query, $print);
		return (bool) $this->_resource;
	}
	
	/**
	 * Read current row from the result if makeReader is used
	 * 
	 * @name read
	 * @return array array with results or false if pointer is on the end of the result
	 */ 
	public function read() {
		if ((bool) $this->_resource) return mysql_fetch_array($this->_resource);
		else return false;
	}
	
	/**
	 * Get array from your query
	 * 
	 * @name getAll
	 * @param string $query directly inserted query for database
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return array with results
	 */ 
	public function getAll($query=NULL, $print=false) {
		if ($query == 'print') {
			$print = true;
			$query = NULL;
		}
		if ((bool) $query) $this->_q['query'] = $query;
		else $query = $this->getQuery();
		$result = $this->_executeQuery($query, $print);
		return $this->_getArray($result);
	}
	
	/**
	 * Get first value from result
	 * 
	 * @name getOne
	 * @param string $query directly inserted query for database
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return mixed first value from selected array
	 */ 
	public function getOne($query=NULL, $print=false) {
		if ($query == 'print') {
			$print = true;
			$query = NULL;
		}
		if ((bool) $query) $this->_q['query'] = $query;
		else $query = $this->getQuery();
		$res = $this->_executeQuery($query, $print);
		if ((bool) $res) {
			$ret = mysql_fetch_array($res);
			return $ret[0];
		}
		else return array();
	}
	
	/**
	 * Insert or update the table from the array
	 * 
	 * @name makeSave
	 * @param array $save input array
	 * @param string $print prints query on the screen (true / def. false)
	 * @return id of the insert / update or false
	 */ 
	public function makeSave($save=array(), $print=false) {
		if ((bool) $print) $print = 'print'; 
		else $print = NULL;
		if (!empty($save['table'])) {
			// updating table
			if (!empty($save['where'])) {
				if (!isset($save['update']) || empty($save['update'])) $save['update'] = 'id';
				$this->update($save['table']);
				foreach ($save as $key=>$val) {
					if ($key !== 'table' && $key !== 'update' && $key !== 'where') {
						if (!empty($val) || !empty($key)) $this->set($key, $val);
					}
				}
				if (is_array($save['where'])) foreach ($save['where'] as $k=>$v) $this->where($k, $v);
				else $this->where($save['update'], $save['where']);
				if ((bool) $this->makeQuery($print)) return $save['where'];
				else return false;
			}
			// inserting to the table
			else {
				$this->insert($save['table']);
				foreach ($save as $key=>$ins) {
					if ($key !== 'table' && $key !== 'update' && $key !== 'where') {
						if (!empty($ins) || !empty($key)) $this->data($key, $ins);
					}
				}
				if ((bool) $this->makeQuery($print)) self::insertedId();
				else return false;
			}
		}
		return false;
	}
	
	/**
	 * Returns Id of the record from the last INSERT
	 * 
	 * @name insertedId
	 * @return int Last id
	 */ 
	public static function insertedId() {
		return (int) mysql_insert_id();
	}
	
	/**
	 * Returns last executed query
	 * 
	 * @name getLastQuery
	 * @return string Query
	 */ 
	public function getLastQuery() {
		return (string) self::$_lastquery;
	}
	
	/**
	 * Returns execution time of the last query
	 * 
	 * @name getQueryTime
	 * @return float Query time in seconds
	 */ 
	public function getInfo() {
		return $this->_info;
	}
	
	/**
	 * Replace all ' (single quotes) for \' (slash and single quote) in the string
	 * 
	 * @name _addSlashes
	 * @param string $text input string
	 * @return string output text with slashes
	 */ 
	private function _addSlashes($text) {
		return $text;	
		return str_ireplace("'", "\'", $text);
	}
	
	/**
	 * Executes query
	 * 
	 * @name _executeQuery
	 * @param string $query MySQL query
	 * @param bool $print prints query on the screen (true / def. false)
	 * @return mixed result of the query
	 */ 
	private function _executeQuery($query, $print=false) {
		try {
			self::$_lastquery = $this->_q['query'] = $query;
			if ((bool) wgSystem::isDevelopment()) $start = microtime();
			//print $query;
			$result = mysql_query($query);
			
			if ((bool) wgSystem::isDevelopment()) $this->_info['time'] = timer::getTime($start);
			else $this->_info['time'] = 0;
			$this->_info['affected'] = mysql_affected_rows();
			$this->_info['errorcode'] = (int) mysql_errno();
			$this->_info['errormesg'] = mysql_error();
			if ((bool) wgSystem::isDevelopment() && (bool) $this->_info['errorcode']) throw new Exception('WGMySQLError '.$this->_info['errorcode'].': '.$this->_info['errormesg'].' in query: '.$this->_q['query']);
			$this->_addQuery();
			if ((bool) $print) echo $query;
			return $result;
		}
		catch (Exception $e) {
			throw new WgException($e);
		}
	}
	
	/**
	 * Fetch array from result
	 * 
	 * @name _getArray
	 * @param object $result Result variable
	 * @return array Array with results
	 */ 
	private function _getArray(&$result) {
		if ((bool) $result) {
			$arr = array();
			while ($data = mysql_fetch_array($result)) $arr[] = $data;
			return $arr;			
		}
		else return array();
	}
	
	/**
	 * Returns actual query
	 * 
	 * @name getQuery
	 * @return string actual query
	 */ 
	public function getQuery() {
		$q = &$this->_q;
		if ($this->_type == 'ins') $this->_makeInsert();
		if ((bool) $q['query']) return (string) $q['query'];
		else return (string) $q['basic'].$q['join'].$q['set'].$q['onjoin'].$q['where'].$q['group'].$q['order'].$q['limit'].';';
	}
	
	/**
	 * Returns real table name (with prefix)
	 * 
	 * @name getQuery
	 * @return string Real table name
	 * 
	 * @todo Think about the shortcut variable (SELECT * FROM `table1` shortcut WHERE a.col1 = 1)
	 */ 
	public function getTableName($table, $shortcut=NULL) {
		global $conf;
		return '`'.self::$_dtbs.'`.`'.$conf['db']['pref'].$table.'`';
	}
	
	/**
	 * Sets the INSERT data together from array
	 * 
	 * @name _makeInsert
	 * @return bool
	 */ 
	private function _makeInsert() {
		$cola = NULL;
		$colb = NULL;
		$and = NULL;
		if (!empty($this->_q['inserts']['a']) && is_array($this->_q['inserts']['a'])) {
			foreach ($this->_q['inserts']['a'] as $k=>$v) {
				if (!empty($cola)) $and = ', ';
				$cola .= $and.'`'.$v.'`';
				if (empty($this->_q['inserts']['b'][$k]) && !is_numeric($this->_q['inserts']['b'][$k])) $this->_q['inserts']['b'][$k] = "''"; 
				$colb .= $and.$this->_q['inserts']['b'][$k];
			}
			$this->_q['set'] = '('.$cola.') VALUES ('.$colb.')';
		}
		if (!empty($cola)) return false;
		else return true;
	}
	
	/**
	 * Add query and error/error code if any to queries array
	 * 
	 * @name _addQuery
	 */ 
	private function _addQuery() {
		if (DEVELOP == true) {
			if ((bool) mysql_errno()) self::$_queries[] = array('errno'=>mysql_errno(), 'error'=>mysql_error(), 'query'=>$this->getQuery());
			else self::$_queries[] = array('query'=>$this->getQuery());			
		}
	}
	
	/**
	 * Return array with all queries and errors & error codes if any
	 * 
	 * @name getQueries
	 * @return array array with queries
	 */ 
	public static function getQueries() {
		if (DEVELOP != true) return array();
		else return self::$_queries;
	}
	
	/**
	 * Disconnect from the database
	 * 
	 * @name disconnect
	 */ 
	public static function disconnect() {
		if ((bool) self::$_conn) mysql_close(self::$_conn);
		self::$_conn = NULL;
		return NULL;
	}
		
	/**
	 * object destructor
	 * 
	 * @name __destruct
	 */ 
	public function __destruct() {
		
	}
}

?>