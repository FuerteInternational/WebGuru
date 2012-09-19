<?php
/**
 * Database class for table wsprite_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/wsprite_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseWspriteItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'wsprite_items';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`wsprite_items`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`wsprite_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * wsprite_widgets_id -> int(11) unsigned
	 */
	const FULL_WSPRITE_WIDGETS_ID = '`wsprite_items`.`wsprite_widgets_id`';
	
	const COL_WSPRITE_WIDGETS_ID = 'wsprite_widgets_id';
	
	/**
	 * sort -> int(11)
	 */
	const FULL_SORT = '`wsprite_items`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * w1 -> text
	 */
	const FULL_W1 = '`wsprite_items`.`w1`';
	
	const COL_W1 = 'w1';
	
	/**
	 * w2 -> text
	 */
	const FULL_W2 = '`wsprite_items`.`w2`';
	
	const COL_W2 = 'w2';
	
	/**
	 * w3 -> text
	 */
	const FULL_W3 = '`wsprite_items`.`w3`';
	
	const COL_W3 = 'w3';
	
	/**
	 * w4 -> text
	 */
	const FULL_W4 = '`wsprite_items`.`w4`';
	
	const COL_W4 = 'w4';
	
	/**
	 * w5 -> text
	 */
	const FULL_W5 = '`wsprite_items`.`w5`';
	
	const COL_W5 = 'w5';
	
	/**
	 * w6 -> text
	 */
	const FULL_W6 = '`wsprite_items`.`w6`';
	
	const COL_W6 = 'w6';
	
	/**
	 * w7 -> text
	 */
	const FULL_W7 = '`wsprite_items`.`w7`';
	
	const COL_W7 = 'w7';
	
	/**
	 * w8 -> text
	 */
	const FULL_W8 = '`wsprite_items`.`w8`';
	
	const COL_W8 = 'w8';
	
	/**
	 * w9 -> text
	 */
	const FULL_W9 = '`wsprite_items`.`w9`';
	
	const COL_W9 = 'w9';
	
	/**
	 * w10 -> text
	 */
	const FULL_W10 = '`wsprite_items`.`w10`';
	
	const COL_W10 = 'w10';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`wsprite_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `wsprite_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'WspriteWidgetsId'=>1, 'Sort'=>2, 'W1'=>3, 'W2'=>4, 'W3'=>5, 'W4'=>6, 'W5'=>7, 'W6'=>8, 'W7'=>9, 'W8'=>10, 'W9'=>11, 'W10'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`wsprite_items`.`Id`'=>0, '`wsprite_items`.`WspriteWidgetsId`'=>1, '`wsprite_items`.`Sort`'=>2, '`wsprite_items`.`W1`'=>3, '`wsprite_items`.`W2`'=>4, '`wsprite_items`.`W3`'=>5, '`wsprite_items`.`W4`'=>6, '`wsprite_items`.`W5`'=>7, '`wsprite_items`.`W6`'=>8, '`wsprite_items`.`W7`'=>9, '`wsprite_items`.`W8`'=>10, '`wsprite_items`.`W9`'=>11, '`wsprite_items`.`W10`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'wsprite_widgets_id'=>1, 'sort'=>2, 'w1'=>3, 'w2'=>4, 'w3'=>5, 'w4'=>6, 'w5'=>7, 'w6'=>8, 'w7'=>9, 'w8'=>10, 'w9'=>11, 'w10'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'wsprite_widgets_id', 'sort', 'w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8', 'w9', 'w10');
	
	
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
			throw new WgException("WspriteItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelWspriteItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('WspriteItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('WspriteItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('WspriteItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('WspriteItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in WspriteItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in WspriteItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20) unsigned
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set WspriteItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of wsprite_widgets_id -> int(11) unsigned
	 * 
	 * @name getWspriteWidgetsId
	 * @return int
	 */
	public function getWspriteWidgetsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set WspriteItemsModel::getWspriteWidgetsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getWspriteWidgetsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11)
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set WspriteItemsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w1 -> text
	 * 
	 * @name getW1
	 * @return text
	 */
	public function getW1() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set WspriteItemsModel::getW1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w2 -> text
	 * 
	 * @name getW2
	 * @return text
	 */
	public function getW2() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set WspriteItemsModel::getW2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w3 -> text
	 * 
	 * @name getW3
	 * @return text
	 */
	public function getW3() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set WspriteItemsModel::getW3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w4 -> text
	 * 
	 * @name getW4
	 * @return text
	 */
	public function getW4() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set WspriteItemsModel::getW4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w5 -> text
	 * 
	 * @name getW5
	 * @return text
	 */
	public function getW5() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set WspriteItemsModel::getW5', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW5', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w6 -> text
	 * 
	 * @name getW6
	 * @return text
	 */
	public function getW6() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set WspriteItemsModel::getW6', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW6', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w7 -> text
	 * 
	 * @name getW7
	 * @return text
	 */
	public function getW7() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set WspriteItemsModel::getW7', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW7', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w8 -> text
	 * 
	 * @name getW8
	 * @return text
	 */
	public function getW8() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set WspriteItemsModel::getW8', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW8', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w9 -> text
	 * 
	 * @name getW9
	 * @return text
	 */
	public function getW9() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set WspriteItemsModel::getW9', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW9', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of w10 -> text
	 * 
	 * @name getW10
	 * @return text
	 */
	public function getW10() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set WspriteItemsModel::getW10', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From WspriteItemsModel::getW10', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: WspriteItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: WspriteItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table wsprite_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new WspriteItemsModel());
	}
	
	/**
	 * Select one item function from table wsprite_items
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
		$ret = DbModel::doSelect($conn, new WspriteItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'WspriteItemsModel')) return $ret[0];
		else {
			$class = new WspriteItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table wsprite_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new WspriteItemsModel());
	}
	
	/**
	 * Basic pager function from table wsprite_items
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
		return DbModel::doPager($conn, new WspriteItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table wsprite_items
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
		return (int) DbModel::doAffected($conn, new WspriteItemsModel());
	}
	
	/**
	 * Basic update function for table wsprite_items
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
		$af = (int) DbModel::doAffected($conn, new WspriteItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table wsprite_items
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
		return (int) DbModel::doInsert($conn, new WspriteItemsModel());
	}
	
	/**
	 * Basic reader create function from table wsprite_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table wsprite_items
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
	 * Drop table function for table wsprite_items
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