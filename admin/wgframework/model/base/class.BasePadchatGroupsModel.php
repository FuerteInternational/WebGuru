<?php
/**
 * Database class for table padchat_groups
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/padchat_groups
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:10:34
 */

class BasePadchatGroupsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'padchat_groups';
	
	/**
	 * engine
	 */
	const TABLE_ENGINE = 'MyISAM';
	
	/**
	 * collation
	 */
	const TABLE_COLLATION = 'ucs2_general_ci';
	
	/**
	 * row_format
	 */
	const TABLE_ROW_FORMAT = 'Dynamic';
	
	/**
	 * comment
	 */
	const TABLE_COMMENT = '';
	
	
	/**
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`padchat_groups`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`padchat_groups`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`padchat_groups`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`padchat_groups`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * password -> varchar(255)
	 */
	const FULL_PASSWORD = '`padchat_groups`.`password`';
	
	const COL_PASSWORD = 'password';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`padchat_groups`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * limit_latitude -> decimal(10,8)
	 */
	const FULL_LIMIT_LATITUDE = '`padchat_groups`.`limit_latitude`';
	
	const COL_LIMIT_LATITUDE = 'limit_latitude';
	
	/**
	 * limit_longitude -> decimal(12,8)
	 */
	const FULL_LIMIT_LONGITUDE = '`padchat_groups`.`limit_longitude`';
	
	const COL_LIMIT_LONGITUDE = 'limit_longitude';
	
	/**
	 * limit_distance -> int(8)
	 */
	const FULL_LIMIT_DISTANCE = '`padchat_groups`.`limit_distance`';
	
	const COL_LIMIT_DISTANCE = 'limit_distance';
	
	/**
	 * limit_users -> int(11)
	 */
	const FULL_LIMIT_USERS = '`padchat_groups`.`limit_users`';
	
	const COL_LIMIT_USERS = 'limit_users';
	
	/**
	 * sort -> int(11)
	 */
	const FULL_SORT = '`padchat_groups`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * ispermanent -> tinyint(1) unsigned
	 */
	const FULL_ISPERMANENT = '`padchat_groups`.`ispermanent`';
	
	const COL_ISPERMANENT = 'ispermanent';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`padchat_groups`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `padchat_groups`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'UsersId'=>2, 'Password'=>3, 'Added'=>4, 'LimitLatitude'=>5, 'LimitLongitude'=>6, 'LimitDistance'=>7, 'LimitUsers'=>8, 'Sort'=>9, 'Ispermanent'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`padchat_groups`.`Id`'=>0, '`padchat_groups`.`Name`'=>1, '`padchat_groups`.`UsersId`'=>2, '`padchat_groups`.`Password`'=>3, '`padchat_groups`.`Added`'=>4, '`padchat_groups`.`LimitLatitude`'=>5, '`padchat_groups`.`LimitLongitude`'=>6, '`padchat_groups`.`LimitDistance`'=>7, '`padchat_groups`.`LimitUsers`'=>8, '`padchat_groups`.`Sort`'=>9, '`padchat_groups`.`Ispermanent`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'users_id'=>2, 'password'=>3, 'added'=>4, 'limit_latitude'=>5, 'limit_longitude'=>6, 'limit_distance'=>7, 'limit_users'=>8, 'sort'=>9, 'ispermanent'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'users_id', 'password', 'added', 'limit_latitude', 'limit_longitude', 'limit_distance', 'limit_users', 'sort', 'ispermanent');
	
	
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
			throw new WgException("PadchatGroups could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPadchatGroups::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PadchatGroupsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PadchatGroupsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PadchatGroupsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PadchatGroupsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PadchatGroupsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PadchatGroupsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PadchatGroupsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PadchatGroupsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PadchatGroupsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of password -> varchar(255)
	 * 
	 * @name getPassword
	 * @return varchar
	 */
	public function getPassword() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PadchatGroupsModel::getPassword', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getPassword', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PadchatGroupsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit_latitude -> decimal(10,8)
	 * 
	 * @name getLimitLatitude
	 * @return decimal
	 */
	public function getLimitLatitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PadchatGroupsModel::getLimitLatitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getLimitLatitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit_longitude -> decimal(12,8)
	 * 
	 * @name getLimitLongitude
	 * @return decimal
	 */
	public function getLimitLongitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PadchatGroupsModel::getLimitLongitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getLimitLongitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit_distance -> int(8)
	 * 
	 * @name getLimitDistance
	 * @return int
	 */
	public function getLimitDistance() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PadchatGroupsModel::getLimitDistance', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getLimitDistance', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit_users -> int(11)
	 * 
	 * @name getLimitUsers
	 * @return int
	 */
	public function getLimitUsers() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PadchatGroupsModel::getLimitUsers', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getLimitUsers', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11)
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PadchatGroupsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ispermanent -> tinyint(1) unsigned
	 * 
	 * @name getIspermanent
	 * @return tinyint
	 */
	public function getIspermanent() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PadchatGroupsModel::getIspermanent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatGroupsModel::getIspermanent', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PadchatGroupsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PadchatGroupsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table padchat_groups
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PadchatGroupsModel());
	}
	
	/**
	 * Select one item function from table padchat_groups
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
		$ret = DbModel::doSelect($conn, new PadchatGroupsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PadchatGroupsModel')) return $ret[0];
		else {
			$class = new PadchatGroupsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table padchat_groups
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PadchatGroupsModel());
	}
	
	/**
	 * Basic pager function from table padchat_groups
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
		return DbModel::doPager($conn, new PadchatGroupsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table padchat_groups
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
		return (int) DbModel::doAffected($conn, new PadchatGroupsModel());
	}
	
	/**
	 * Basic update function for table padchat_groups
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
		$af = (int) DbModel::doAffected($conn, new PadchatGroupsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table padchat_groups
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
		return (int) DbModel::doInsert($conn, new PadchatGroupsModel());
	}
	
	/**
	 * Basic reader create function from table padchat_groups
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table padchat_groups
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
	 * Drop table function for table padchat_groups
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