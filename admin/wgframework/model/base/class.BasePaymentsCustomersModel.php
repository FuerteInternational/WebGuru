<?php
/**
 * Database class for table payments_customers
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/payments_customers
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:36
 */

class BasePaymentsCustomersModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'payments_customers';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`payments_customers`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`payments_customers`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`payments_customers`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * payments_services_id -> int(8) unsigned
	 */
	const FULL_PAYMENTS_SERVICES_ID = '`payments_customers`.`payments_services_id`';
	
	const COL_PAYMENTS_SERVICES_ID = 'payments_services_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`payments_customers`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`payments_customers`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * paid_until -> datetime
	 */
	const FULL_PAID_UNTIL = '`payments_customers`.`paid_until`';
	
	const COL_PAID_UNTIL = 'paid_until';
	
	/**
	 * credit -> int(6) unsigned
	 */
	const FULL_CREDIT = '`payments_customers`.`credit`';
	
	const COL_CREDIT = 'credit';
	
	/**
	 * reminders -> tinyint(1) unsigned
	 */
	const FULL_REMINDERS = '`payments_customers`.`reminders`';
	
	const COL_REMINDERS = 'reminders';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`payments_customers`.`note`';
	
	const COL_NOTE = 'note';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`payments_customers`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `payments_customers`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'UsersId'=>1, 'PaymentsServicesId'=>2, 'Added'=>3, 'Changed'=>4, 'PaidUntil'=>5, 'Credit'=>6, 'Reminders'=>7, 'Note'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`payments_customers`.`Id`'=>0, '`payments_customers`.`UsersId`'=>1, '`payments_customers`.`PaymentsServicesId`'=>2, '`payments_customers`.`Added`'=>3, '`payments_customers`.`Changed`'=>4, '`payments_customers`.`PaidUntil`'=>5, '`payments_customers`.`Credit`'=>6, '`payments_customers`.`Reminders`'=>7, '`payments_customers`.`Note`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'users_id'=>1, 'payments_services_id'=>2, 'added'=>3, 'changed'=>4, 'paid_until'=>5, 'credit'=>6, 'reminders'=>7, 'note'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'users_id', 'payments_services_id', 'added', 'changed', 'paid_until', 'credit', 'reminders', 'note');
	
	
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
			throw new WgException("PaymentsCustomers could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPaymentsCustomers::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PaymentsCustomersModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PaymentsCustomersModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PaymentsCustomersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PaymentsCustomersModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PaymentsCustomersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PaymentsCustomersModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20) unsigned
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of payments_services_id -> int(8) unsigned
	 * 
	 * @name getPaymentsServicesId
	 * @return int
	 */
	public function getPaymentsServicesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) $this->_result[2];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getPaymentsServicesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getPaymentsServicesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set PaymentsCustomersModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set PaymentsCustomersModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of paid_until -> datetime
	 * 
	 * @name getPaidUntil
	 * @return datetime
	 */
	public function getPaidUntil() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set PaymentsCustomersModel::getPaidUntil', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getPaidUntil', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of credit -> int(6) unsigned
	 * 
	 * @name getCredit
	 * @return int
	 */
	public function getCredit() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getCredit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getCredit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of reminders -> tinyint(1) unsigned
	 * 
	 * @name getReminders
	 * @return tinyint
	 */
	public function getReminders() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getReminders', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getReminders', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PaymentsCustomersModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PaymentsCustomersModel::getNote', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PaymentsCustomersModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PaymentsCustomersModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table payments_customers
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PaymentsCustomersModel());
	}
	
	/** Left join select function from table payments_customers
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new PaymentsCustomersModel());
	}
	
	/** Right join select function from table payments_customers
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new PaymentsCustomersModel());
	}
	
	/** Inner join select function from table payments_customers
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new PaymentsCustomersModel());
	}
	
	/**
	 * Select one item function from table payments_customers
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
		$ret = DbModel::doSelect($conn, new PaymentsCustomersModel());
		if (isset($ret[0]) && is_a($ret[0], 'PaymentsCustomersModel')) return $ret[0];
		else {
			$class = new PaymentsCustomersModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table payments_customers
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PaymentsCustomersModel());
	}
	
	/**
	 * Basic pager function from table payments_customers
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
		return DbModel::doPager($conn, new PaymentsCustomersModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table payments_customers
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
		return (int) DbModel::doAffected($conn, new PaymentsCustomersModel());
	}
	
	/**
	 * Basic update function for table payments_customers
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
		$af = (int) DbModel::doAffected($conn, new PaymentsCustomersModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table payments_customers
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
		return (int) DbModel::doInsert($conn, new PaymentsCustomersModel());
	}
	
	/**
	 * Basic reader create function from table payments_customers
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table payments_customers
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
	 * Drop table function for table payments_customers
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