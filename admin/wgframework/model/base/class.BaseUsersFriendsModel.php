<?php
/**
 * Database class for table users_friends
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/users_friends
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:37
 */

class BaseUsersFriendsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'users_friends';
	
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
	const TABLE_ROW_FORMAT = 'Fixed';
	
	/**
	 * comment
	 */
	const TABLE_COMMENT = '';
	
	
	/**
		}
	 * confirmed -> tinyint(1) unsigned
	 */
	const PRIMARY_KEY = 'confirmed';
			
	const FULL_PRIMARY_KEY = '`users_friends`.`confirmed`';
			
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`users_friends`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * fiend_id -> int(11) unsigned
	 */
	const FULL_FIEND_ID = '`users_friends`.`fiend_id`';
	
	const COL_FIEND_ID = 'fiend_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`users_friends`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * confirmed -> tinyint(1) unsigned
	 */
	const FULL_CONFIRMED = '`users_friends`.`confirmed`';
	
	const COL_CONFIRMED = 'confirmed';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`users_friends`.`confirmed`)';
			
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `users_friends`.`confirmed`)';
			
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('UsersId'=>0, 'FiendId'=>1, 'Added'=>2, 'Confirmed'=>3);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`users_friends`.`UsersId`'=>0, '`users_friends`.`FiendId`'=>1, '`users_friends`.`Added`'=>2, '`users_friends`.`Confirmed`'=>3);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('users_id'=>0, 'fiend_id'=>1, 'added'=>2, 'confirmed'=>3);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('users_id', 'fiend_id', 'added', 'confirmed');
	
	
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
			throw new WgException("UsersFriends could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelUsersFriends::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set UsersFriendsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFriendsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of fiend_id -> int(11) unsigned
	 * 
	 * @name getFiendId
	 * @return int
	 */
	public function getFiendId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set UsersFriendsModel::getFiendId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFriendsModel::getFiendId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) strtotime($this->_result[2]);
			else parent::throwGetColException('Not set UsersFriendsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFriendsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of confirmed -> tinyint(1) unsigned
	 * 
	 * @name getConfirmed
	 * @return tinyint
	 */
	public function getConfirmed() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set UsersFriendsModel::getConfirmed', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFriendsModel::getConfirmed', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: UsersFriendsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: UsersFriendsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table users_friends
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new UsersFriendsModel());
	}
	
	/** Left join select function from table users_friends
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFriendsModel());
	}
	
	/** Right join select function from table users_friends
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFriendsModel());
	}
	
	/** Inner join select function from table users_friends
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFriendsModel());
	}
	
	/**
	 * Select one item function from table users_friends
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
		$ret = DbModel::doSelect($conn, new UsersFriendsModel());
		if (isset($ret[0]) && is_a($ret[0], 'UsersFriendsModel')) return $ret[0];
		else {
			$class = new UsersFriendsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table users_friends
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new UsersFriendsModel());
	}
	
	/**
	 * Basic pager function from table users_friends
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
		return DbModel::doPager($conn, new UsersFriendsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table users_friends
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
		return (int) DbModel::doAffected($conn, new UsersFriendsModel());
	}
	
	/**
	 * Basic update function for table users_friends
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
		$af = (int) DbModel::doAffected($conn, new UsersFriendsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table users_friends
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
		return (int) DbModel::doInsert($conn, new UsersFriendsModel());
	}
	
	/**
	 * Basic reader create function from table users_friends
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table users_friends
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
	 * Drop table function for table users_friends
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