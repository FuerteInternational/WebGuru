<?php
/**
 * Database class for table search_queries_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_queries_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchQueriesCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_queries_categories';
	
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
	 * id_sqc -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_sqc';
	
	const FULL_PRIMARY_KEY = '`search_queries_categories`.`id_sqc`';
	
	/**
	 * id_sqc -> int(8) unsigned
	 */
	const FULL_ID_SQC = '`search_queries_categories`.`id_sqc`';
	
	const COL_ID_SQC = 'id_sqc';
	
	/**
	 * name_sqc -> varchar(255)
	 */
	const FULL_NAME_SQC = '`search_queries_categories`.`name_sqc`';
	
	const COL_NAME_SQC = 'name_sqc';
	
	/**
	 * identifier_sqc -> varchar(255)
	 */
	const FULL_IDENTIFIER_SQC = '`search_queries_categories`.`identifier_sqc`';
	
	const COL_IDENTIFIER_SQC = 'identifier_sqc';
	
	/**
	 * added_sqc -> datetime
	 */
	const FULL_ADDED_SQC = '`search_queries_categories`.`added_sqc`';
	
	const COL_ADDED_SQC = 'added_sqc';
	
	/**
	 * par_sqc -> varchar(255)
	 */
	const FULL_PAR_SQC = '`search_queries_categories`.`par_sqc`';
	
	const COL_PAR_SQC = 'par_sqc';
	
	/**
	 * desc_sqc -> text
	 */
	const FULL_DESC_SQC = '`search_queries_categories`.`desc_sqc`';
	
	const COL_DESC_SQC = 'desc_sqc';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_queries_categories`.`id_sqc`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_queries_categories`.`id_sqc`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSqc'=>0, 'NameSqc'=>1, 'IdentifierSqc'=>2, 'AddedSqc'=>3, 'ParSqc'=>4, 'DescSqc'=>5);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_queries_categories`.`IdSqc`'=>0, '`search_queries_categories`.`NameSqc`'=>1, '`search_queries_categories`.`IdentifierSqc`'=>2, '`search_queries_categories`.`AddedSqc`'=>3, '`search_queries_categories`.`ParSqc`'=>4, '`search_queries_categories`.`DescSqc`'=>5);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sqc'=>0, 'name_sqc'=>1, 'identifier_sqc'=>2, 'added_sqc'=>3, 'par_sqc'=>4, 'desc_sqc'=>5);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sqc', 'name_sqc', 'identifier_sqc', 'added_sqc', 'par_sqc', 'desc_sqc');
	
	
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
			throw new WgException("SearchQueriesCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchQueriesCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchQueriesCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchQueriesCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchQueriesCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchQueriesCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchQueriesCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchQueriesCategoriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sqc -> int(8) unsigned
	 * 
	 * @name getIdSqc
	 * @return int
	 */
	public function getIdSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getIdSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getIdSqc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_sqc -> varchar(255)
	 * 
	 * @name getNameSqc
	 * @return varchar
	 */
	public function getNameSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getNameSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getNameSqc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_sqc -> varchar(255)
	 * 
	 * @name getIdentifierSqc
	 * @return varchar
	 */
	public function getIdentifierSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getIdentifierSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getIdentifierSqc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sqc -> datetime
	 * 
	 * @name getAddedSqc
	 * @return datetime
	 */
	public function getAddedSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getAddedSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getAddedSqc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of par_sqc -> varchar(255)
	 * 
	 * @name getParSqc
	 * @return varchar
	 */
	public function getParSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getParSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getParSqc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_sqc -> text
	 * 
	 * @name getDescSqc
	 * @return text
	 */
	public function getDescSqc() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchQueriesCategoriesModel::getDescSqc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchQueriesCategoriesModel::getDescSqc', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchQueriesCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchQueriesCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_queries_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchQueriesCategoriesModel());
	}
	
	/**
	 * Select one item function from table search_queries_categories
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
		$ret = DbModel::doSelect($conn, new SearchQueriesCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchQueriesCategoriesModel')) return $ret[0];
		else {
			$class = new SearchQueriesCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_queries_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchQueriesCategoriesModel());
	}
	
	/**
	 * Basic pager function from table search_queries_categories
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
		return DbModel::doPager($conn, new SearchQueriesCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_queries_categories
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
		return (int) DbModel::doAffected($conn, new SearchQueriesCategoriesModel());
	}
	
	/**
	 * Basic update function for table search_queries_categories
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
		$af = (int) DbModel::doAffected($conn, new SearchQueriesCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_queries_categories
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
		return (int) DbModel::doInsert($conn, new SearchQueriesCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table search_queries_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_queries_categories
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
	 * Drop table function for table search_queries_categories
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