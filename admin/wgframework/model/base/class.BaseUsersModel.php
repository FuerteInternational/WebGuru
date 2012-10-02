<?php
/**
 * Database class for table users
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/users
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:24
 */

class BaseUsersModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'users';
	
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
	
	const FULL_PRIMARY_KEY = '`users`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`users`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * users_groups_id -> int(8) unsigned
	 */
	const FULL_USERS_GROUPS_ID = '`users`.`users_groups_id`';
	
	const COL_USERS_GROUPS_ID = 'users_groups_id';
	
	/**
	 * nickname -> varchar(20)
	 */
	const FULL_NICKNAME = '`users`.`nickname`';
	
	const COL_NICKNAME = 'nickname';
	
	/**
	 * mail -> varchar(255)
	 */
	const FULL_MAIL = '`users`.`mail`';
	
	const COL_MAIL = 'mail';
	
	/**
	 * password -> varchar(40)
	 */
	const FULL_PASSWORD = '`users`.`password`';
	
	const COL_PASSWORD = 'password';
	
	/**
	 * question -> varchar(255)
	 */
	const FULL_QUESTION = '`users`.`question`';
	
	const COL_QUESTION = 'question';
	
	/**
	 * ansver -> varchar(150)
	 */
	const FULL_ANSVER = '`users`.`ansver`';
	
	const COL_ANSVER = 'ansver';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`users`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * online -> datetime
	 */
	const FULL_ONLINE = '`users`.`online`';
	
	const COL_ONLINE = 'online';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`users`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * timever -> varchar(15)
	 */
	const FULL_TIMEVER = '`users`.`timever`';
	
	const COL_TIMEVER = 'timever';
	
	/**
	 * codever -> varchar(5)
	 */
	const FULL_CODEVER = '`users`.`codever`';
	
	const COL_CODEVER = 'codever';
	
	/**
	 * active -> tinyint(1) unsigned
	 */
	const FULL_ACTIVE = '`users`.`active`';
	
	const COL_ACTIVE = 'active';
	
	/**
	 * lastlogin -> datetime
	 */
	const FULL_LASTLOGIN = '`users`.`lastlogin`';
	
	const COL_LASTLOGIN = 'lastlogin';
	
	/**
	 * gender -> set('m','f')
	 */
	const FULL_GENDER = '`users`.`gender`';
	
	const COL_GENDER = 'gender';
	
	/**
	 * lastip -> varchar(17)
	 */
	const FULL_LASTIP = '`users`.`lastip`';
	
	const COL_LASTIP = 'lastip';
	
	/**
	 * firstname -> varchar(255)
	 */
	const FULL_FIRSTNAME = '`users`.`firstname`';
	
	const COL_FIRSTNAME = 'firstname';
	
	/**
	 * lastname -> varchar(255)
	 */
	const FULL_LASTNAME = '`users`.`lastname`';
	
	const COL_LASTNAME = 'lastname';
	
	/**
	 * system_countries_id -> int(5) unsigned
	 */
	const FULL_SYSTEM_COUNTRIES_ID = '`users`.`system_countries_id`';
	
	const COL_SYSTEM_COUNTRIES_ID = 'system_countries_id';
	
	/**
	 * visits -> int(11)
	 */
	const FULL_VISITS = '`users`.`visits`';
	
	const COL_VISITS = 'visits';
	
	/**
	 * downloads -> int(11)
	 */
	const FULL_DOWNLOADS = '`users`.`downloads`';
	
	const COL_DOWNLOADS = 'downloads';
	
	/**
	 * xdata -> text
	 */
	const FULL_XDATA = '`users`.`xdata`';
	
	const COL_XDATA = 'xdata';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`users`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `users`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'UsersGroupsId'=>1, 'Nickname'=>2, 'Mail'=>3, 'Password'=>4, 'Question'=>5, 'Ansver'=>6, 'Added'=>7, 'Online'=>8, 'Changed'=>9, 'Timever'=>10, 'Codever'=>11, 'Active'=>12, 'Lastlogin'=>13, 'Gender'=>14, 'Lastip'=>15, 'Firstname'=>16, 'Lastname'=>17, 'SystemCountriesId'=>18, 'Visits'=>19, 'Downloads'=>20, 'Xdata'=>21);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`users`.`Id`'=>0, '`users`.`UsersGroupsId`'=>1, '`users`.`Nickname`'=>2, '`users`.`Mail`'=>3, '`users`.`Password`'=>4, '`users`.`Question`'=>5, '`users`.`Ansver`'=>6, '`users`.`Added`'=>7, '`users`.`Online`'=>8, '`users`.`Changed`'=>9, '`users`.`Timever`'=>10, '`users`.`Codever`'=>11, '`users`.`Active`'=>12, '`users`.`Lastlogin`'=>13, '`users`.`Gender`'=>14, '`users`.`Lastip`'=>15, '`users`.`Firstname`'=>16, '`users`.`Lastname`'=>17, '`users`.`SystemCountriesId`'=>18, '`users`.`Visits`'=>19, '`users`.`Downloads`'=>20, '`users`.`Xdata`'=>21);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'users_groups_id'=>1, 'nickname'=>2, 'mail'=>3, 'password'=>4, 'question'=>5, 'ansver'=>6, 'added'=>7, 'online'=>8, 'changed'=>9, 'timever'=>10, 'codever'=>11, 'active'=>12, 'lastlogin'=>13, 'gender'=>14, 'lastip'=>15, 'firstname'=>16, 'lastname'=>17, 'system_countries_id'=>18, 'visits'=>19, 'downloads'=>20, 'xdata'=>21);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'users_groups_id', 'nickname', 'mail', 'password', 'question', 'ansver', 'added', 'online', 'changed', 'timever', 'codever', 'active', 'lastlogin', 'gender', 'lastip', 'firstname', 'lastname', 'system_countries_id', 'visits', 'downloads', 'xdata');
	
	
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
			throw new WgException("Users could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelUsers::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('UsersModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('UsersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in UsersModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in UsersModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set UsersModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_groups_id -> int(8) unsigned
	 * 
	 * @name getUsersGroupsId
	 * @return int
	 */
	public function getUsersGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set UsersModel::getUsersGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getUsersGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nickname -> varchar(20)
	 * 
	 * @name getNickname
	 * @return varchar
	 */
	public function getNickname() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set UsersModel::getNickname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getNickname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail -> varchar(255)
	 * 
	 * @name getMail
	 * @return varchar
	 */
	public function getMail() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set UsersModel::getMail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getMail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of password -> varchar(40)
	 * 
	 * @name getPassword
	 * @return varchar
	 */
	public function getPassword() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set UsersModel::getPassword', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getPassword', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of question -> varchar(255)
	 * 
	 * @name getQuestion
	 * @return varchar
	 */
	public function getQuestion() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set UsersModel::getQuestion', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getQuestion', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ansver -> varchar(150)
	 * 
	 * @name getAnsver
	 * @return varchar
	 */
	public function getAnsver() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set UsersModel::getAnsver', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getAnsver', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set UsersModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of online -> datetime
	 * 
	 * @name getOnline
	 * @return datetime
	 */
	public function getOnline() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set UsersModel::getOnline', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getOnline', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set UsersModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of timever -> varchar(15)
	 * 
	 * @name getTimever
	 * @return varchar
	 */
	public function getTimever() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set UsersModel::getTimever', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getTimever', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of codever -> varchar(5)
	 * 
	 * @name getCodever
	 * @return varchar
	 */
	public function getCodever() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set UsersModel::getCodever', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getCodever', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of active -> tinyint(1) unsigned
	 * 
	 * @name getActive
	 * @return tinyint
	 */
	public function getActive() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set UsersModel::getActive', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getActive', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastlogin -> datetime
	 * 
	 * @name getLastlogin
	 * @return datetime
	 */
	public function getLastlogin() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) strtotime($this->_result[13]);
			else parent::throwGetColException('Not set UsersModel::getLastlogin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getLastlogin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of gender -> set('m','f')
	 * 
	 * @name getGender
	 * @return set
	 */
	public function getGender() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set UsersModel::getGender', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getGender', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastip -> varchar(17)
	 * 
	 * @name getLastip
	 * @return varchar
	 */
	public function getLastip() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set UsersModel::getLastip', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getLastip', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of firstname -> varchar(255)
	 * 
	 * @name getFirstname
	 * @return varchar
	 */
	public function getFirstname() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set UsersModel::getFirstname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getFirstname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastname -> varchar(255)
	 * 
	 * @name getLastname
	 * @return varchar
	 */
	public function getLastname() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set UsersModel::getLastname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getLastname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_countries_id -> int(5) unsigned
	 * 
	 * @name getSystemCountriesId
	 * @return int
	 */
	public function getSystemCountriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set UsersModel::getSystemCountriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getSystemCountriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of visits -> int(11)
	 * 
	 * @name getVisits
	 * @return int
	 */
	public function getVisits() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set UsersModel::getVisits', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getVisits', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of downloads -> int(11)
	 * 
	 * @name getDownloads
	 * @return int
	 */
	public function getDownloads() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set UsersModel::getDownloads', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getDownloads', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of xdata -> text
	 * 
	 * @name getXdata
	 * @return text
	 */
	public function getXdata() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set UsersModel::getXdata', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersModel::getXdata', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: UsersModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: UsersModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table users
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new UsersModel());
	}
	
	/**
	 * Select one item function from table users
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
		$ret = DbModel::doSelect($conn, new UsersModel());
		if (isset($ret[0]) && is_a($ret[0], 'UsersModel')) return $ret[0];
		else {
			$class = new UsersModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table users
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new UsersModel());
	}
	
	/**
	 * Basic pager function from table users
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
		return DbModel::doPager($conn, new UsersModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table users
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
		return (int) DbModel::doAffected($conn, new UsersModel());
	}
	
	/**
	 * Basic update function for table users
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
		$af = (int) DbModel::doAffected($conn, new UsersModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table users
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
		return (int) DbModel::doInsert($conn, new UsersModel());
	}
	
	/**
	 * Basic reader create function from table users
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table users
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
	 * Drop table function for table users
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