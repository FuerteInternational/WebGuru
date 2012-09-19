<?php
/**
 * Database class for table listing_fields
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/listing_fields
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseListingFieldsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'listing_fields';
	
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
	 * id_lf -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_lf';
	
	const FULL_PRIMARY_KEY = '`listing_fields`.`id_lf`';
	
	/**
	 * id_lf -> int(16) unsigned
	 */
	const FULL_ID_LF = '`listing_fields`.`id_lf`';
	
	const COL_ID_LF = 'id_lf';
	
	/**
	 * lc_id_lf -> int(8)
	 */
	const FULL_LC_ID_LF = '`listing_fields`.`lc_id_lf`';
	
	const COL_LC_ID_LF = 'lc_id_lf';
	
	/**
	 * name_lf -> varchar(255)
	 */
	const FULL_NAME_LF = '`listing_fields`.`name_lf`';
	
	const COL_NAME_LF = 'name_lf';
	
	/**
	 * width_lf -> varchar(10)
	 */
	const FULL_WIDTH_LF = '`listing_fields`.`width_lf`';
	
	const COL_WIDTH_LF = 'width_lf';
	
	/**
	 * sort_lf -> int(8)
	 */
	const FULL_SORT_LF = '`listing_fields`.`sort_lf`';
	
	const COL_SORT_LF = 'sort_lf';
	
	/**
	 * style_lf -> varchar(255)
	 */
	const FULL_STYLE_LF = '`listing_fields`.`style_lf`';
	
	const COL_STYLE_LF = 'style_lf';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`listing_fields`.`id_lf`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `listing_fields`.`id_lf`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdLf'=>0, 'LcIdLf'=>1, 'NameLf'=>2, 'WidthLf'=>3, 'SortLf'=>4, 'StyleLf'=>5);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`listing_fields`.`IdLf`'=>0, '`listing_fields`.`LcIdLf`'=>1, '`listing_fields`.`NameLf`'=>2, '`listing_fields`.`WidthLf`'=>3, '`listing_fields`.`SortLf`'=>4, '`listing_fields`.`StyleLf`'=>5);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_lf'=>0, 'lc_id_lf'=>1, 'name_lf'=>2, 'width_lf'=>3, 'sort_lf'=>4, 'style_lf'=>5);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_lf', 'lc_id_lf', 'name_lf', 'width_lf', 'sort_lf', 'style_lf');
	
	
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
			throw new WgException("ListingFields could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelListingFields::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ListingFieldsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ListingFieldsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ListingFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ListingFieldsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ListingFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ListingFieldsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_lf -> int(16) unsigned
	 * 
	 * @name getIdLf
	 * @return int
	 */
	public function getIdLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set ListingFieldsModel::getIdLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getIdLf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lc_id_lf -> int(8)
	 * 
	 * @name getLcIdLf
	 * @return int
	 */
	public function getLcIdLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ListingFieldsModel::getLcIdLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getLcIdLf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_lf -> varchar(255)
	 * 
	 * @name getNameLf
	 * @return varchar
	 */
	public function getNameLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ListingFieldsModel::getNameLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getNameLf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of width_lf -> varchar(10)
	 * 
	 * @name getWidthLf
	 * @return varchar
	 */
	public function getWidthLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ListingFieldsModel::getWidthLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getWidthLf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort_lf -> int(8)
	 * 
	 * @name getSortLf
	 * @return int
	 */
	public function getSortLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ListingFieldsModel::getSortLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getSortLf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of style_lf -> varchar(255)
	 * 
	 * @name getStyleLf
	 * @return varchar
	 */
	public function getStyleLf() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ListingFieldsModel::getStyleLf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ListingFieldsModel::getStyleLf', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ListingFieldsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ListingFieldsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table listing_fields
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ListingFieldsModel());
	}
	
	/**
	 * Select one item function from table listing_fields
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
		$ret = DbModel::doSelect($conn, new ListingFieldsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ListingFieldsModel')) return $ret[0];
		else {
			$class = new ListingFieldsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table listing_fields
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ListingFieldsModel());
	}
	
	/**
	 * Basic pager function from table listing_fields
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
		return DbModel::doPager($conn, new ListingFieldsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table listing_fields
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
		return (int) DbModel::doAffected($conn, new ListingFieldsModel());
	}
	
	/**
	 * Basic update function for table listing_fields
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
		$af = (int) DbModel::doAffected($conn, new ListingFieldsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table listing_fields
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
		return (int) DbModel::doInsert($conn, new ListingFieldsModel());
	}
	
	/**
	 * Basic reader create function from table listing_fields
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table listing_fields
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
	 * Drop table function for table listing_fields
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