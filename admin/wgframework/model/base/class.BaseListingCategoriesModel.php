<?php
/**
 * Database class for table listing_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/listing_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseListingCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'listing_categories';
	
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
	 * id_lc -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_lc';
	
	const FULL_PRIMARY_KEY = '`listing_categories`.`id_lc`';
	
	/**
	 * id_lc -> int(8) unsigned
	 */
	const FULL_ID_LC = '`listing_categories`.`id_lc`';
	
	const COL_ID_LC = 'id_lc';
	
	/**
	 * name_lc -> varchar(255)
	 */
	const FULL_NAME_LC = '`listing_categories`.`name_lc`';
	
	const COL_NAME_LC = 'name_lc';
	
	/**
	 * identifier_lc -> varchar(255)
	 */
	const FULL_IDENTIFIER_LC = '`listing_categories`.`identifier_lc`';
	
	const COL_IDENTIFIER_LC = 'identifier_lc';
	
	/**
	 * header_lc -> tinyint(1)
	 */
	const FULL_HEADER_LC = '`listing_categories`.`header_lc`';
	
	const COL_HEADER_LC = 'header_lc';
	
	/**
	 * hstyle_lc -> varchar(255)
	 */
	const FULL_HSTYLE_LC = '`listing_categories`.`hstyle_lc`';
	
	const COL_HSTYLE_LC = 'hstyle_lc';
	
	/**
	 * oddstyle_lc -> varchar(255)
	 */
	const FULL_ODDSTYLE_LC = '`listing_categories`.`oddstyle_lc`';
	
	const COL_ODDSTYLE_LC = 'oddstyle_lc';
	
	/**
	 * evenstyle_lc -> varchar(255)
	 */
	const FULL_EVENSTYLE_LC = '`listing_categories`.`evenstyle_lc`';
	
	const COL_EVENSTYLE_LC = 'evenstyle_lc';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`listing_categories`.`id_lc`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `listing_categories`.`id_lc`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdLc'=>0, 'NameLc'=>1, 'IdentifierLc'=>2, 'HeaderLc'=>3, 'HstyleLc'=>4, 'OddstyleLc'=>5, 'EvenstyleLc'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`listing_categories`.`IdLc`'=>0, '`listing_categories`.`NameLc`'=>1, '`listing_categories`.`IdentifierLc`'=>2, '`listing_categories`.`HeaderLc`'=>3, '`listing_categories`.`HstyleLc`'=>4, '`listing_categories`.`OddstyleLc`'=>5, '`listing_categories`.`EvenstyleLc`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_lc'=>0, 'name_lc'=>1, 'identifier_lc'=>2, 'header_lc'=>3, 'hstyle_lc'=>4, 'oddstyle_lc'=>5, 'evenstyle_lc'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_lc', 'name_lc', 'identifier_lc', 'header_lc', 'hstyle_lc', 'oddstyle_lc', 'evenstyle_lc');
	
	
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
			throw new WgException("ListingCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelListingCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ListingCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ListingCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ListingCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ListingCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ListingCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ListingCategoriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_lc -> int(8) unsigned
	 * 
	 * @name getIdLc
	 * @return int
	 */
	public function getIdLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set ListingCategoriesModel::getIdLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getIdLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_lc -> varchar(255)
	 * 
	 * @name getNameLc
	 * @return varchar
	 */
	public function getNameLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ListingCategoriesModel::getNameLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getNameLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_lc -> varchar(255)
	 * 
	 * @name getIdentifierLc
	 * @return varchar
	 */
	public function getIdentifierLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ListingCategoriesModel::getIdentifierLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getIdentifierLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of header_lc -> tinyint(1)
	 * 
	 * @name getHeaderLc
	 * @return tinyint
	 */
	public function getHeaderLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ListingCategoriesModel::getHeaderLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getHeaderLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of hstyle_lc -> varchar(255)
	 * 
	 * @name getHstyleLc
	 * @return varchar
	 */
	public function getHstyleLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ListingCategoriesModel::getHstyleLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getHstyleLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of oddstyle_lc -> varchar(255)
	 * 
	 * @name getOddstyleLc
	 * @return varchar
	 */
	public function getOddstyleLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ListingCategoriesModel::getOddstyleLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getOddstyleLc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of evenstyle_lc -> varchar(255)
	 * 
	 * @name getEvenstyleLc
	 * @return varchar
	 */
	public function getEvenstyleLc() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ListingCategoriesModel::getEvenstyleLc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingCategoriesModel::getEvenstyleLc', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ListingCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ListingCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table listing_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ListingCategoriesModel());
	}
	
	/**
	 * Select one item function from table listing_categories
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
		$ret = DbModel::doSelect($conn, new ListingCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'ListingCategoriesModel')) return $ret[0];
		else {
			$class = new ListingCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table listing_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ListingCategoriesModel());
	}
	
	/**
	 * Basic pager function from table listing_categories
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
		return DbModel::doPager($conn, new ListingCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table listing_categories
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
		return (int) DbModel::doAffected($conn, new ListingCategoriesModel());
	}
	
	/**
	 * Basic update function for table listing_categories
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
		$af = (int) DbModel::doAffected($conn, new ListingCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table listing_categories
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
		return (int) DbModel::doInsert($conn, new ListingCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table listing_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table listing_categories
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
	 * Drop table function for table listing_categories
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