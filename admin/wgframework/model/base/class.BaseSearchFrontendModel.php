<?php
/**
 * Database class for table search_frontend
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_frontend
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchFrontendModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_frontend';
	
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
	 * id_sf -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_sf';
	
	const FULL_PRIMARY_KEY = '`search_frontend`.`id_sf`';
	
	/**
	 * id_sf -> int(8) unsigned
	 */
	const FULL_ID_SF = '`search_frontend`.`id_sf`';
	
	const COL_ID_SF = 'id_sf';
	
	/**
	 * name_sf -> varchar(255)
	 */
	const FULL_NAME_SF = '`search_frontend`.`name_sf`';
	
	const COL_NAME_SF = 'name_sf';
	
	/**
	 * type_sf -> int(4)
	 */
	const FULL_TYPE_SF = '`search_frontend`.`type_sf`';
	
	const COL_TYPE_SF = 'type_sf';
	
	/**
	 * identifier_sf -> varchar(255)
	 */
	const FULL_IDENTIFIER_SF = '`search_frontend`.`identifier_sf`';
	
	const COL_IDENTIFIER_SF = 'identifier_sf';
	
	/**
	 * mtemp_sf -> text
	 */
	const FULL_MTEMP_SF = '`search_frontend`.`mtemp_sf`';
	
	const COL_MTEMP_SF = 'mtemp_sf';
	
	/**
	 * begin1_sf -> text
	 */
	const FULL_BEGIN1_SF = '`search_frontend`.`begin1_sf`';
	
	const COL_BEGIN1_SF = 'begin1_sf';
	
	/**
	 * item1_sf -> text
	 */
	const FULL_ITEM1_SF = '`search_frontend`.`item1_sf`';
	
	const COL_ITEM1_SF = 'item1_sf';
	
	/**
	 * end1_sf -> text
	 */
	const FULL_END1_SF = '`search_frontend`.`end1_sf`';
	
	const COL_END1_SF = 'end1_sf';
	
	/**
	 * begin2_sf -> text
	 */
	const FULL_BEGIN2_SF = '`search_frontend`.`begin2_sf`';
	
	const COL_BEGIN2_SF = 'begin2_sf';
	
	/**
	 * item2_sf -> text
	 */
	const FULL_ITEM2_SF = '`search_frontend`.`item2_sf`';
	
	const COL_ITEM2_SF = 'item2_sf';
	
	/**
	 * end2_sf -> text
	 */
	const FULL_END2_SF = '`search_frontend`.`end2_sf`';
	
	const COL_END2_SF = 'end2_sf';
	
	/**
	 * pager_sf -> tinyint(1)
	 */
	const FULL_PAGER_SF = '`search_frontend`.`pager_sf`';
	
	const COL_PAGER_SF = 'pager_sf';
	
	/**
	 * perpage_sf -> int(8)
	 */
	const FULL_PERPAGE_SF = '`search_frontend`.`perpage_sf`';
	
	const COL_PERPAGE_SF = 'perpage_sf';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_frontend`.`id_sf`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_frontend`.`id_sf`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSf'=>0, 'NameSf'=>1, 'TypeSf'=>2, 'IdentifierSf'=>3, 'MtempSf'=>4, 'Begin1Sf'=>5, 'Item1Sf'=>6, 'End1Sf'=>7, 'Begin2Sf'=>8, 'Item2Sf'=>9, 'End2Sf'=>10, 'PagerSf'=>11, 'PerpageSf'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_frontend`.`IdSf`'=>0, '`search_frontend`.`NameSf`'=>1, '`search_frontend`.`TypeSf`'=>2, '`search_frontend`.`IdentifierSf`'=>3, '`search_frontend`.`MtempSf`'=>4, '`search_frontend`.`Begin1Sf`'=>5, '`search_frontend`.`Item1Sf`'=>6, '`search_frontend`.`End1Sf`'=>7, '`search_frontend`.`Begin2Sf`'=>8, '`search_frontend`.`Item2Sf`'=>9, '`search_frontend`.`End2Sf`'=>10, '`search_frontend`.`PagerSf`'=>11, '`search_frontend`.`PerpageSf`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sf'=>0, 'name_sf'=>1, 'type_sf'=>2, 'identifier_sf'=>3, 'mtemp_sf'=>4, 'begin1_sf'=>5, 'item1_sf'=>6, 'end1_sf'=>7, 'begin2_sf'=>8, 'item2_sf'=>9, 'end2_sf'=>10, 'pager_sf'=>11, 'perpage_sf'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sf', 'name_sf', 'type_sf', 'identifier_sf', 'mtemp_sf', 'begin1_sf', 'item1_sf', 'end1_sf', 'begin2_sf', 'item2_sf', 'end2_sf', 'pager_sf', 'perpage_sf');
	
	
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
			throw new WgException("SearchFrontend could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchFrontend::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchFrontendModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchFrontendModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchFrontendModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchFrontendModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchFrontendModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchFrontendModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sf -> int(8) unsigned
	 * 
	 * @name getIdSf
	 * @return int
	 */
	public function getIdSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchFrontendModel::getIdSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getIdSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_sf -> varchar(255)
	 * 
	 * @name getNameSf
	 * @return varchar
	 */
	public function getNameSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchFrontendModel::getNameSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getNameSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type_sf -> int(4)
	 * 
	 * @name getTypeSf
	 * @return int
	 */
	public function getTypeSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchFrontendModel::getTypeSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getTypeSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_sf -> varchar(255)
	 * 
	 * @name getIdentifierSf
	 * @return varchar
	 */
	public function getIdentifierSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchFrontendModel::getIdentifierSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getIdentifierSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mtemp_sf -> text
	 * 
	 * @name getMtempSf
	 * @return text
	 */
	public function getMtempSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchFrontendModel::getMtempSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getMtempSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin1_sf -> text
	 * 
	 * @name getBegin1Sf
	 * @return text
	 */
	public function getBegin1Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchFrontendModel::getBegin1Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getBegin1Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item1_sf -> text
	 * 
	 * @name getItem1Sf
	 * @return text
	 */
	public function getItem1Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SearchFrontendModel::getItem1Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getItem1Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end1_sf -> text
	 * 
	 * @name getEnd1Sf
	 * @return text
	 */
	public function getEnd1Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SearchFrontendModel::getEnd1Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getEnd1Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin2_sf -> text
	 * 
	 * @name getBegin2Sf
	 * @return text
	 */
	public function getBegin2Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchFrontendModel::getBegin2Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getBegin2Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item2_sf -> text
	 * 
	 * @name getItem2Sf
	 * @return text
	 */
	public function getItem2Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SearchFrontendModel::getItem2Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getItem2Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end2_sf -> text
	 * 
	 * @name getEnd2Sf
	 * @return text
	 */
	public function getEnd2Sf() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SearchFrontendModel::getEnd2Sf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getEnd2Sf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager_sf -> tinyint(1)
	 * 
	 * @name getPagerSf
	 * @return tinyint
	 */
	public function getPagerSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SearchFrontendModel::getPagerSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getPagerSf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage_sf -> int(8)
	 * 
	 * @name getPerpageSf
	 * @return int
	 */
	public function getPerpageSf() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SearchFrontendModel::getPerpageSf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchFrontendModel::getPerpageSf', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchFrontendModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchFrontendModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_frontend
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchFrontendModel());
	}
	
	/**
	 * Select one item function from table search_frontend
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
		$ret = DbModel::doSelect($conn, new SearchFrontendModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchFrontendModel')) return $ret[0];
		else {
			$class = new SearchFrontendModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_frontend
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchFrontendModel());
	}
	
	/**
	 * Basic pager function from table search_frontend
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
		return DbModel::doPager($conn, new SearchFrontendModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_frontend
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
		return (int) DbModel::doAffected($conn, new SearchFrontendModel());
	}
	
	/**
	 * Basic update function for table search_frontend
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
		$af = (int) DbModel::doAffected($conn, new SearchFrontendModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_frontend
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
		return (int) DbModel::doInsert($conn, new SearchFrontendModel());
	}
	
	/**
	 * Basic reader create function from table search_frontend
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_frontend
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
	 * Drop table function for table search_frontend
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