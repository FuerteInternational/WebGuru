<?php
/**
 * Database class for table payments_services
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/payments_services
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:15
 */

class BasePaymentsServicesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'payments_services';
	
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
		}
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`payments_services`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`payments_services`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`payments_services`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * payments_categories_id -> int(8) unsigned
	 */
	const FULL_PAYMENTS_CATEGORIES_ID = '`payments_services`.`payments_categories_id`';
	
	const COL_PAYMENTS_CATEGORIES_ID = 'payments_categories_id';
	
	/**
	 * price -> varchar(6)
	 */
	const FULL_PRICE = '`payments_services`.`price`';
	
	const COL_PRICE = 'price';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`payments_services`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`payments_services`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * period -> int(3)
	 */
	const FULL_PERIOD = '`payments_services`.`period`';
	
	const COL_PERIOD = 'period';
	
	/**
	 * minperiods -> int(6) unsigned
	 */
	const FULL_MINPERIODS = '`payments_services`.`minperiods`';
	
	const COL_MINPERIODS = 'minperiods';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`payments_services`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`payments_services`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * system_users_id -> int(8) unsigned
	 */
	const FULL_SYSTEM_USERS_ID = '`payments_services`.`system_users_id`';
	
	const COL_SYSTEM_USERS_ID = 'system_users_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`payments_services`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `payments_services`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'PaymentsCategoriesId'=>2, 'Price'=>3, 'Head'=>4, 'Description'=>5, 'Period'=>6, 'Minperiods'=>7, 'Added'=>8, 'Changed'=>9, 'SystemUsersId'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`payments_services`.`Id`'=>0, '`payments_services`.`Name`'=>1, '`payments_services`.`PaymentsCategoriesId`'=>2, '`payments_services`.`Price`'=>3, '`payments_services`.`Head`'=>4, '`payments_services`.`Description`'=>5, '`payments_services`.`Period`'=>6, '`payments_services`.`Minperiods`'=>7, '`payments_services`.`Added`'=>8, '`payments_services`.`Changed`'=>9, '`payments_services`.`SystemUsersId`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'payments_categories_id'=>2, 'price'=>3, 'head'=>4, 'description'=>5, 'period'=>6, 'minperiods'=>7, 'added'=>8, 'changed'=>9, 'system_users_id'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'payments_categories_id', 'price', 'head', 'description', 'period', 'minperiods', 'added', 'changed', 'system_users_id');
	
	
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
			throw new WgException("PaymentsServices could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPaymentsServices::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PaymentsServicesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PaymentsServicesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PaymentsServicesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PaymentsServicesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PaymentsServicesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PaymentsServicesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PaymentsServicesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PaymentsServicesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of payments_categories_id -> int(8) unsigned
	 * 
	 * @name getPaymentsCategoriesId
	 * @return int
	 */
	public function getPaymentsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PaymentsServicesModel::getPaymentsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getPaymentsCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of price -> varchar(6)
	 * 
	 * @name getPrice
	 * @return varchar
	 */
	public function getPrice() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PaymentsServicesModel::getPrice', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getPrice', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PaymentsServicesModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PaymentsServicesModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of period -> int(3)
	 * 
	 * @name getPeriod
	 * @return int
	 */
	public function getPeriod() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PaymentsServicesModel::getPeriod', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getPeriod', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of minperiods -> int(6) unsigned
	 * 
	 * @name getMinperiods
	 * @return int
	 */
	public function getMinperiods() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PaymentsServicesModel::getMinperiods', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getMinperiods', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set PaymentsServicesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set PaymentsServicesModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_users_id -> int(8) unsigned
	 * 
	 * @name getSystemUsersId
	 * @return int
	 */
	public function getSystemUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PaymentsServicesModel::getSystemUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsServicesModel::getSystemUsersId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PaymentsServicesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PaymentsServicesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table payments_services
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PaymentsServicesModel());
	}
	
	/**
	 * Select one item function from table payments_services
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
		$ret = DbModel::doSelect($conn, new PaymentsServicesModel());
		if (isset($ret[0]) && is_a($ret[0], 'PaymentsServicesModel')) return $ret[0];
		else {
			$class = new PaymentsServicesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table payments_services
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PaymentsServicesModel());
	}
	
	/**
	 * Basic pager function from table payments_services
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
		return DbModel::doPager($conn, new PaymentsServicesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table payments_services
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
		return (int) DbModel::doAffected($conn, new PaymentsServicesModel());
	}
	
	/**
	 * Basic update function for table payments_services
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
		$af = (int) DbModel::doAffected($conn, new PaymentsServicesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table payments_services
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
		return (int) DbModel::doInsert($conn, new PaymentsServicesModel());
	}
	
	/**
	 * Basic reader create function from table payments_services
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table payments_services
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
	 * Drop table function for table payments_services
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