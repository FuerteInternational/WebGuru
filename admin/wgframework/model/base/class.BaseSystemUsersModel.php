<?php
/**
 * Database class for table system_users
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/system_users
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:59
 */

class BaseSystemUsersModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'system_users';
	
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
	
	const FULL_PRIMARY_KEY = '`system_users`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`system_users`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * nickname -> varchar(60)
	 */
	const FULL_NICKNAME = '`system_users`.`nickname`';
	
	const COL_NICKNAME = 'nickname';
	
	/**
	 * mail -> varchar(150)
	 */
	const FULL_MAIL = '`system_users`.`mail`';
	
	const COL_MAIL = 'mail';
	
	/**
	 * pass -> varchar(40)
	 */
	const FULL_PASS = '`system_users`.`pass`';
	
	const COL_PASS = 'pass';
	
	/**
	 * firstname -> varchar(255)
	 */
	const FULL_FIRSTNAME = '`system_users`.`firstname`';
	
	const COL_FIRSTNAME = 'firstname';
	
	/**
	 * lastname -> varchar(255)
	 */
	const FULL_LASTNAME = '`system_users`.`lastname`';
	
	const COL_LASTNAME = 'lastname';
	
	/**
	 * lastlogin -> datetime
	 */
	const FULL_LASTLOGIN = '`system_users`.`lastlogin`';
	
	const COL_LASTLOGIN = 'lastlogin';
	
	/**
	 * lastip -> varchar(15)
	 */
	const FULL_LASTIP = '`system_users`.`lastip`';
	
	const COL_LASTIP = 'lastip';
	
	/**
	 * system_team_id -> int(8) unsigned
	 */
	const FULL_SYSTEM_TEAM_ID = '`system_users`.`system_team_id`';
	
	const COL_SYSTEM_TEAM_ID = 'system_team_id';
	
	/**
	 * timever -> varchar(15)
	 */
	const FULL_TIMEVER = '`system_users`.`timever`';
	
	const COL_TIMEVER = 'timever';
	
	/**
	 * codever -> varchar(5)
	 */
	const FULL_CODEVER = '`system_users`.`codever`';
	
	const COL_CODEVER = 'codever';
	
	/**
	 * active -> tinyint(1) unsigned
	 */
	const FULL_ACTIVE = '`system_users`.`active`';
	
	const COL_ACTIVE = 'active';
	
	/**
	 * xdata -> text
	 */
	const FULL_XDATA = '`system_users`.`xdata`';
	
	const COL_XDATA = 'xdata';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`system_users`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `system_users`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Nickname'=>1, 'Mail'=>2, 'Pass'=>3, 'Firstname'=>4, 'Lastname'=>5, 'Lastlogin'=>6, 'Lastip'=>7, 'SystemTeamId'=>8, 'Timever'=>9, 'Codever'=>10, 'Active'=>11, 'Xdata'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`system_users`.`Id`'=>0, '`system_users`.`Nickname`'=>1, '`system_users`.`Mail`'=>2, '`system_users`.`Pass`'=>3, '`system_users`.`Firstname`'=>4, '`system_users`.`Lastname`'=>5, '`system_users`.`Lastlogin`'=>6, '`system_users`.`Lastip`'=>7, '`system_users`.`SystemTeamId`'=>8, '`system_users`.`Timever`'=>9, '`system_users`.`Codever`'=>10, '`system_users`.`Active`'=>11, '`system_users`.`Xdata`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'nickname'=>1, 'mail'=>2, 'pass'=>3, 'firstname'=>4, 'lastname'=>5, 'lastlogin'=>6, 'lastip'=>7, 'system_team_id'=>8, 'timever'=>9, 'codever'=>10, 'active'=>11, 'xdata'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'nickname', 'mail', 'pass', 'firstname', 'lastname', 'lastlogin', 'lastip', 'system_team_id', 'timever', 'codever', 'active', 'xdata');
	
	
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
			throw new WgException("SystemUsers could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSystemUsers::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SystemUsersModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemUsersModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SystemUsersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemUsersModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SystemUsersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SystemUsersModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set SystemUsersModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nickname -> varchar(60)
	 * 
	 * @name getNickname
	 * @return varchar
	 */
	public function getNickname() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SystemUsersModel::getNickname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getNickname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail -> varchar(150)
	 * 
	 * @name getMail
	 * @return varchar
	 */
	public function getMail() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SystemUsersModel::getMail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getMail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pass -> varchar(40)
	 * 
	 * @name getPass
	 * @return varchar
	 */
	public function getPass() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SystemUsersModel::getPass', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getPass', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of firstname -> varchar(255)
	 * 
	 * @name getFirstname
	 * @return varchar
	 */
	public function getFirstname() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SystemUsersModel::getFirstname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getFirstname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastname -> varchar(255)
	 * 
	 * @name getLastname
	 * @return varchar
	 */
	public function getLastname() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SystemUsersModel::getLastname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getLastname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastlogin -> datetime
	 * 
	 * @name getLastlogin
	 * @return datetime
	 */
	public function getLastlogin() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set SystemUsersModel::getLastlogin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getLastlogin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastip -> varchar(15)
	 * 
	 * @name getLastip
	 * @return varchar
	 */
	public function getLastip() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SystemUsersModel::getLastip', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getLastip', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_team_id -> int(8) unsigned
	 * 
	 * @name getSystemTeamId
	 * @return int
	 */
	public function getSystemTeamId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) $this->_result[8];
			else parent::throwGetColException('Not set SystemUsersModel::getSystemTeamId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getSystemTeamId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of timever -> varchar(15)
	 * 
	 * @name getTimever
	 * @return varchar
	 */
	public function getTimever() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SystemUsersModel::getTimever', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getTimever', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of codever -> varchar(5)
	 * 
	 * @name getCodever
	 * @return varchar
	 */
	public function getCodever() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SystemUsersModel::getCodever', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getCodever', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of active -> tinyint(1) unsigned
	 * 
	 * @name getActive
	 * @return tinyint
	 */
	public function getActive() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) $this->_result[11];
			else parent::throwGetColException('Not set SystemUsersModel::getActive', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getActive', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of xdata -> text
	 * 
	 * @name getXdata
	 * @return text
	 */
	public function getXdata() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SystemUsersModel::getXdata', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemUsersModel::getXdata', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SystemUsersModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SystemUsersModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table system_users
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SystemUsersModel());
	}
	
	/** Left join select function from table system_users
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemUsersModel());
	}
	
	/** Right join select function from table system_users
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemUsersModel());
	}
	
	/** Inner join select function from table system_users
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemUsersModel());
	}
	
	/**
	 * Select one item function from table system_users
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
		$ret = DbModel::doSelect($conn, new SystemUsersModel());
		if (isset($ret[0]) && is_a($ret[0], 'SystemUsersModel')) return $ret[0];
		else {
			$class = new SystemUsersModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table system_users
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SystemUsersModel());
	}
	
	/**
	 * Basic pager function from table system_users
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
		return DbModel::doPager($conn, new SystemUsersModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table system_users
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
		return (int) DbModel::doAffected($conn, new SystemUsersModel());
	}
	
	/**
	 * Basic update function for table system_users
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
		$af = (int) DbModel::doAffected($conn, new SystemUsersModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table system_users
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
		return (int) DbModel::doInsert($conn, new SystemUsersModel());
	}
	
	/**
	 * Basic reader create function from table system_users
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table system_users
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
	 * Drop table function for table system_users
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