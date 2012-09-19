<?php
/**
 * Database class for table search_queries
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_queries
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchQueriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_queries';
	
	/**
	 * engine
	 */
	const TABLE_ENGINE = 'MyISAM';
	
	/**
	 * collation
	 */
	const TABLE_COLLATION = 'utf8_general_ci';
	
	/**
	 * row_format
	 */
	const TABLE_ROW_FORMAT = 'Dynamic';
	
	/**
	 * comment
	 */
	const TABLE_COMMENT = '';
	
	
	/**
	 * id_sq -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_sq';
	
	const FULL_PRIMARY_KEY = '`search_queries`.`id_sq`';
	
	/**
	 * id_sq -> int(32) unsigned
	 */
	const FULL_ID_SQ = '`search_queries`.`id_sq`';
	
	const COL_ID_SQ = 'id_sq';
	
	/**
	 * cqc_id_sq -> int(8) unsigned
	 */
	const FULL_CQC_ID_SQ = '`search_queries`.`cqc_id_sq`';
	
	const COL_CQC_ID_SQ = 'cqc_id_sq';
	
	/**
	 * query_sq -> varchar(255)
	 */
	const FULL_QUERY_SQ = '`search_queries`.`query_sq`';
	
	const COL_QUERY_SQ = 'query_sq';
	
	/**
	 * added_sq -> datetime
	 */
	const FULL_ADDED_SQ = '`search_queries`.`added_sq`';
	
	const COL_ADDED_SQ = 'added_sq';
	
	/**
	 * users_id_sq -> int(16) unsigned
	 */
	const FULL_USERS_ID_SQ = '`search_queries`.`users_id_sq`';
	
	const COL_USERS_ID_SQ = 'users_id_sq';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_queries`.`id_sq`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_queries`.`id_sq`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSq'=>0, 'CqcIdSq'=>1, 'QuerySq'=>2, 'AddedSq'=>3, 'UsersIdSq'=>4);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_queries`.`IdSq`'=>0, '`search_queries`.`CqcIdSq`'=>1, '`search_queries`.`QuerySq`'=>2, '`search_queries`.`AddedSq`'=>3, '`search_queries`.`UsersIdSq`'=>4);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sq'=>0, 'cqc_id_sq'=>1, 'query_sq'=>2, 'added_sq'=>3, 'users_id_sq'=>4);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sq', 'cqc_id_sq', 'query_sq', 'added_sq', 'users_id_sq');
	
	
	protected $_result = array();
	
	protected $_query  = NULL;
	
	protected $_data   = array();
	
	protected $_resultFields  = array();
	
	
	/**
	 * Returns name of the table
	 * 
	 * @name __toString
	 * @param mixed $params
	 * @return string Name of the class table
	 */
	/*
	public function __toString() {
		if ((bool) self::$_result && method_exists($this, 'getPrimaryKey')) return $this->getPrimaryKey();
		else return self::TABLE_NAME;
	}
	//*/
	
	public function __construct() {
		$this->setNullResults();
	}
	
	public static function getField($name, $inputType=DbModel::FIELD_FIELDNAME) {
		if ((bool) self::$_result) {
			$field = self::getFieldNames($toType, $inputType);
			return self::$_result[$field];
		}
		else throw new WgException("There are no results from the database.");
	}

	public static function getFieldName($name, $fromType, $toType=DbModel::FIELD_COLVALUE) {
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$$fromType[$name]) ? self::$$fromType[$name] : null;
		if ($key === null) {
			throw new WgException("SearchQueries could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchQueries::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
		}
		return self::$$type;
	}
	
	public function setNullResults() {
		$this->_result = array();
		foreach (self::$_tableFieldsByKey as $k=>$column) $this->_result[$k] = NULL;
		return true;
	}
	
	public function setDefaultResults($values=array()) {
		$this->_result = array();
		foreach (self::$_tableFieldsByKey as $k=>$column) {
			if (isset($values[$column])) $this->_result[$k] = $values[$column];
			else $this->_result[$k] = '';
		}
		return true;
	}
	
	/**
	 * Get value of the primary key
	 * 
	 * @name getPrimaryKey
	 * @return int
	 */
	public function getPrimaryKey() {
		if ((bool) $this->_result) {
			if (isset($this->_result[0])) return (int) $this->_result[0];
			else parent::throwGetColException('SearchQueriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchQueriesModel::getPrimaryKey', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of the field by Key
	 * 
	 * @name getFieldByKey
	 * @return mixed
	 */
	public function getFieldByKey($fieldKey) {
		if ((bool) $this->_result) {
			if (isset($this->_result[$fieldKey])) return $this->_result[$fieldKey];
			else parent::throwGetColException('SearchQueriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchQueriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of the field by column name
	 * 
	 * @name getFieldByName
	 * @return mixed
	 */
	public function getFieldByName($field) {
		if ((bool) $this->_result) {
			if (isset($this->_resultFields[$field]) && isset($this->_result[$this->_resultFields[$field]])) return $this->_result[$this->_resultFields[$field]];
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchQueriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchQueriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sq -> int(32) unsigned
	 * 
	 * @name getIdSq
	 * @return int
	 */
	public function getIdSq() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchQueriesModel::getIdSq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesModel::getIdSq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cqc_id_sq -> int(8) unsigned
	 * 
	 * @name getCqcIdSq
	 * @return int
	 */
	public function getCqcIdSq() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchQueriesModel::getCqcIdSq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesModel::getCqcIdSq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of query_sq -> varchar(255)
	 * 
	 * @name getQuerySq
	 * @return varchar
	 */
	public function getQuerySq() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchQueriesModel::getQuerySq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesModel::getQuerySq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sq -> datetime
	 * 
	 * @name getAddedSq
	 * @return datetime
	 */
	public function getAddedSq() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set SearchQueriesModel::getAddedSq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesModel::getAddedSq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_sq -> int(16) unsigned
	 * 
	 * @name getUsersIdSq
	 * @return int
	 */
	public function getUsersIdSq() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchQueriesModel::getUsersIdSq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesModel::getUsersIdSq', __LINE__, __FILE__);
	}
	
	/**
	 * __call function
	 * 
	 * @name __call
	 * @return mixed
	 */
	public function __call($function, $args) {
		if ((bool) $this->_result) {
			$col = strtolower(str_replace('get', '', $function));
			if (isset($this->_result[$col])) return (int) $this->_result[$col];
			else throw new Exception('Call to undefined method/class function: SearchQueriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchQueriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_queries
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchQueriesModel());
	}
	
	/**
	 * Select one item function from table search_queries
	 * 
	 * @name doSelectOne
	 * @param array $params
	 * @return object This class with or without results
	 */
	public static function doSelectPKey($id, $params=NULL) {
		$conn = new wgConnector();
		$conn->select(self::TABLE_NAME);
		$conn->where(self::PRIMARY_KEY, $id);
		$conn->limit(1);
		parent::doSelectParameters($conn, $params, self::PRIMARY_KEY);
		$ret = DbModel::doSelect($conn, new SearchQueriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchQueriesModel')) return $ret[0];
		else {
			$class = new SearchQueriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_queries
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchQueriesModel());
	}
	
	/**
	 * Basic pager function from table search_queries
	 * 
	 * @name doPager
	 * @param array $params
	 * @param int $itemsPerPage How many items you want on one page
	 * @param int $selectPage
	 * @return object Data reader
	 */
	public static function doPager($params=NULL, $selectPage=0, $itemsPerPage=20) {
		$count = (int) self::doCount($params);
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME);
		parent::doSelectParameters($conn, $params, self::PRIMARY_KEY);
		return DbModel::doPager($conn, new SearchQueriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_queries
	 * 
	 * @name doDelete
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return int Number of deleted items
	 */
	public static function doDelete($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->delete(self::TABLE_NAME);
		parent::doSelectParameters($conn, $params, self::PRIMARY_KEY);
		return (int) DbModel::doAffected($conn, new SearchQueriesModel());
	}
	
	/**
	 * Basic update function for table search_queries
	 * 
	 * @name doUpdate
	 * @param object $conn wgConnector class instance or NULL
	 * @param array $updates
	 * @return int Number of updated items
	 */
	public static function doUpdate($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->update(self::TABLE_NAME);
		if (!is_a($params, 'wgConnector') && isset($params['where'])) {
			if (!isset($params['wherecol'])) $params['wherecol'] = self::PRIMARY_KEY;
			$conn->where($params['wherecol'], $params['where']);
			unset($params['where']);
			unset($params['wherecol']);
		}
		if (!empty($params) && is_array($params)) {
			foreach ($params as $key=>$par) {
				if (isset(self::$_tableFields[$key])) $conn->set($key, $par);
				else throw new WgException("Field ".self::TABLE_NAME.".$key does not exist.");
			}
		}
		$af = (int) DbModel::doAffected($conn, new SearchQueriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_queries
	 * 
	 * @name doInsert
	 * @param object $conn wgConnector class instance or NULL
	 * @param array $inserts
	 * @return int Last inserted id
	 */
	public static function doInsert($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->insert(self::TABLE_NAME);
		if (!empty($params) && is_array($params)) {
			foreach ($params as $key=>$par) {
				$conn->data($key, $par);
				//if (isset(self::$_tableFields[$key])) $conn->data($key, $par);
				//else throw new WgException("Field ".self::TABLE_NAME.".$key does not exist.");
			}
		}
		return (int) DbModel::doInsert($conn, new SearchQueriesModel());
	}
	
	/**
	 * Basic reader create function from table search_queries
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_queries
	 * 
	 * @name doTruncate
	 * @param object $conn wgConnector class instance or NULL
	 * @return bool Success
	 */
	public static function doTruncate() {
		$conn = new wgConnector();
		return (bool) $conn->truncate(self::TABLE_NAME);
	}
	
	/**
	 * Drop table function for table search_queries
	 * 
	 * @name doDrop
	 * @param mixed $params
	 * @return bool Success
	 */
	public static function doDrop() {
		$conn = new wgConnector();
		return (bool) $conn->drop(self::TABLE_NAME);
	}
	
	
}
?>