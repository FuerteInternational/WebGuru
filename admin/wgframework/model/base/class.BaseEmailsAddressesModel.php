<?php
/**
 * Database class for table emails_addresses
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/emails_addresses
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class BaseEmailsAddressesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'emails_addresses';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`emails_addresses`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`emails_addresses`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * emails_groups_id -> int(8) unsigned
	 */
	const FULL_EMAILS_GROUPS_ID = '`emails_addresses`.`emails_groups_id`';
	
	const COL_EMAILS_GROUPS_ID = 'emails_groups_id';
	
	/**
	 * mail -> varchar(255)
	 */
	const FULL_MAIL = '`emails_addresses`.`mail`';
	
	const COL_MAIL = 'mail';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`emails_addresses`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`emails_addresses`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * unsubscribed -> datetime
	 */
	const FULL_UNSUBSCRIBED = '`emails_addresses`.`unsubscribed`';
	
	const COL_UNSUBSCRIBED = 'unsubscribed';
	
	/**
	 * firstname -> varchar(255)
	 */
	const FULL_FIRSTNAME = '`emails_addresses`.`firstname`';
	
	const COL_FIRSTNAME = 'firstname';
	
	/**
	 * lastname -> varchar(255)
	 */
	const FULL_LASTNAME = '`emails_addresses`.`lastname`';
	
	const COL_LASTNAME = 'lastname';
	
	/**
	 * company -> varchar(255)
	 */
	const FULL_COMPANY = '`emails_addresses`.`company`';
	
	const COL_COMPANY = 'company';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`emails_addresses`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `emails_addresses`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'EmailsGroupsId'=>1, 'Mail'=>2, 'Enabled'=>3, 'Added'=>4, 'Unsubscribed'=>5, 'Firstname'=>6, 'Lastname'=>7, 'Company'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`emails_addresses`.`Id`'=>0, '`emails_addresses`.`EmailsGroupsId`'=>1, '`emails_addresses`.`Mail`'=>2, '`emails_addresses`.`Enabled`'=>3, '`emails_addresses`.`Added`'=>4, '`emails_addresses`.`Unsubscribed`'=>5, '`emails_addresses`.`Firstname`'=>6, '`emails_addresses`.`Lastname`'=>7, '`emails_addresses`.`Company`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'emails_groups_id'=>1, 'mail'=>2, 'enabled'=>3, 'added'=>4, 'unsubscribed'=>5, 'firstname'=>6, 'lastname'=>7, 'company'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'emails_groups_id', 'mail', 'enabled', 'added', 'unsubscribed', 'firstname', 'lastname', 'company');
	
	
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
			throw new WgException("EmailsAddresses could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelEmailsAddresses::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('EmailsAddressesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EmailsAddressesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('EmailsAddressesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EmailsAddressesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in EmailsAddressesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in EmailsAddressesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(11) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set EmailsAddressesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of emails_groups_id -> int(8) unsigned
	 * 
	 * @name getEmailsGroupsId
	 * @return int
	 */
	public function getEmailsGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set EmailsAddressesModel::getEmailsGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getEmailsGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail -> varchar(255)
	 * 
	 * @name getMail
	 * @return varchar
	 */
	public function getMail() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set EmailsAddressesModel::getMail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getMail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set EmailsAddressesModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getEnabled', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set EmailsAddressesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of unsubscribed -> datetime
	 * 
	 * @name getUnsubscribed
	 * @return datetime
	 */
	public function getUnsubscribed() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set EmailsAddressesModel::getUnsubscribed', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getUnsubscribed', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of firstname -> varchar(255)
	 * 
	 * @name getFirstname
	 * @return varchar
	 */
	public function getFirstname() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set EmailsAddressesModel::getFirstname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getFirstname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastname -> varchar(255)
	 * 
	 * @name getLastname
	 * @return varchar
	 */
	public function getLastname() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set EmailsAddressesModel::getLastname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getLastname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of company -> varchar(255)
	 * 
	 * @name getCompany
	 * @return varchar
	 */
	public function getCompany() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set EmailsAddressesModel::getCompany', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsAddressesModel::getCompany', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: EmailsAddressesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: EmailsAddressesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table emails_addresses
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new EmailsAddressesModel());
	}
	
	/** Left join select function from table emails_addresses
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EmailsAddressesModel());
	}
	
	/** Right join select function from table emails_addresses
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EmailsAddressesModel());
	}
	
	/** Inner join select function from table emails_addresses
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EmailsAddressesModel());
	}
	
	/**
	 * Select one item function from table emails_addresses
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
		$ret = DbModel::doSelect($conn, new EmailsAddressesModel());
		if (isset($ret[0]) && is_a($ret[0], 'EmailsAddressesModel')) return $ret[0];
		else {
			$class = new EmailsAddressesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table emails_addresses
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new EmailsAddressesModel());
	}
	
	/**
	 * Basic pager function from table emails_addresses
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
		return DbModel::doPager($conn, new EmailsAddressesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table emails_addresses
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
		return (int) DbModel::doAffected($conn, new EmailsAddressesModel());
	}
	
	/**
	 * Basic update function for table emails_addresses
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
		$af = (int) DbModel::doAffected($conn, new EmailsAddressesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table emails_addresses
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
		return (int) DbModel::doInsert($conn, new EmailsAddressesModel());
	}
	
	/**
	 * Basic reader create function from table emails_addresses
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table emails_addresses
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
	 * Drop table function for table emails_addresses
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