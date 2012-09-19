<?php
/**
 * Database class for table padchat_messages
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/padchat_messages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:10:34
 */

class BasePadchatMessagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'padchat_messages';
	
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
	 * accurancy -> int(11) unsigned
	 */
	const PRIMARY_KEY = NULL;
	
	const FULL_PRIMARY_KEY = NULL;
	
	/**
	 * padchat_groups_id -> int(11) unsigned
	 */
	const FULL_PADCHAT_GROUPS_ID = '`padchat_messages`.`padchat_groups_id`';
	
	const COL_PADCHAT_GROUPS_ID = 'padchat_groups_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`padchat_messages`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`padchat_messages`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * personal_users_id -> int(11) unsigned
	 */
	const FULL_PERSONAL_USERS_ID = '`padchat_messages`.`personal_users_id`';
	
	const COL_PERSONAL_USERS_ID = 'personal_users_id';
	
	/**
	 * nickname -> varchar(150)
	 */
	const FULL_NICKNAME = '`padchat_messages`.`nickname`';
	
	const COL_NICKNAME = 'nickname';
	
	/**
	 * message -> text
	 */
	const FULL_MESSAGE = '`padchat_messages`.`message`';
	
	const COL_MESSAGE = 'message';
	
	/**
	 * devid -> varchar(100)
	 */
	const FULL_DEVID = '`padchat_messages`.`devid`';
	
	const COL_DEVID = 'devid';
	
	/**
	 * longitude -> decimal(12,8)
	 */
	const FULL_LONGITUDE = '`padchat_messages`.`longitude`';
	
	const COL_LONGITUDE = 'longitude';
	
	/**
	 * latitude -> decimal(10,8)
	 */
	const FULL_LATITUDE = '`padchat_messages`.`latitude`';
	
	const COL_LATITUDE = 'latitude';
	
	/**
	 * altitude -> int(11)
	 */
	const FULL_ALTITUDE = '`padchat_messages`.`altitude`';
	
	const COL_ALTITUDE = 'altitude';
	
	/**
	 * accurancy -> int(11) unsigned
	 */
	const FULL_ACCURANCY = '`padchat_messages`.`accurancy`';
	
	const COL_ACCURANCY = 'accurancy';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(*)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT *)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('PadchatGroupsId'=>0, 'Added'=>1, 'UsersId'=>2, 'PersonalUsersId'=>3, 'Nickname'=>4, 'Message'=>5, 'Devid'=>6, 'Longitude'=>7, 'Latitude'=>8, 'Altitude'=>9, 'Accurancy'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`padchat_messages`.`PadchatGroupsId`'=>0, '`padchat_messages`.`Added`'=>1, '`padchat_messages`.`UsersId`'=>2, '`padchat_messages`.`PersonalUsersId`'=>3, '`padchat_messages`.`Nickname`'=>4, '`padchat_messages`.`Message`'=>5, '`padchat_messages`.`Devid`'=>6, '`padchat_messages`.`Longitude`'=>7, '`padchat_messages`.`Latitude`'=>8, '`padchat_messages`.`Altitude`'=>9, '`padchat_messages`.`Accurancy`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('padchat_groups_id'=>0, 'added'=>1, 'users_id'=>2, 'personal_users_id'=>3, 'nickname'=>4, 'message'=>5, 'devid'=>6, 'longitude'=>7, 'latitude'=>8, 'altitude'=>9, 'accurancy'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('padchat_groups_id', 'added', 'users_id', 'personal_users_id', 'nickname', 'message', 'devid', 'longitude', 'latitude', 'altitude', 'accurancy');
	
	
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
			throw new WgException("PadchatMessages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPadchatMessages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
	 * Get value of padchat_groups_id -> int(11) unsigned
	 * 
	 * @name getPadchatGroupsId
	 * @return int
	 */
	public function getPadchatGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PadchatMessagesModel::getPadchatGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getPadchatGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) strtotime($this->_result[1]);
			else parent::throwGetColException('Not set PadchatMessagesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getAdded', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PadchatMessagesModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of personal_users_id -> int(11) unsigned
	 * 
	 * @name getPersonalUsersId
	 * @return int
	 */
	public function getPersonalUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PadchatMessagesModel::getPersonalUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getPersonalUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nickname -> varchar(150)
	 * 
	 * @name getNickname
	 * @return varchar
	 */
	public function getNickname() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PadchatMessagesModel::getNickname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getNickname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of message -> text
	 * 
	 * @name getMessage
	 * @return text
	 */
	public function getMessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PadchatMessagesModel::getMessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getMessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of devid -> varchar(100)
	 * 
	 * @name getDevid
	 * @return varchar
	 */
	public function getDevid() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PadchatMessagesModel::getDevid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getDevid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of longitude -> decimal(12,8)
	 * 
	 * @name getLongitude
	 * @return decimal
	 */
	public function getLongitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PadchatMessagesModel::getLongitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getLongitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of latitude -> decimal(10,8)
	 * 
	 * @name getLatitude
	 * @return decimal
	 */
	public function getLatitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PadchatMessagesModel::getLatitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getLatitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of altitude -> int(11)
	 * 
	 * @name getAltitude
	 * @return int
	 */
	public function getAltitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PadchatMessagesModel::getAltitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getAltitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of accurancy -> int(11) unsigned
	 * 
	 * @name getAccurancy
	 * @return int
	 */
	public function getAccurancy() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PadchatMessagesModel::getAccurancy', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PadchatMessagesModel::getAccurancy', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PadchatMessagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PadchatMessagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table padchat_messages
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PadchatMessagesModel());
	}
	
	/**
	 * Select one item function from table padchat_messages
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
		$ret = DbModel::doSelect($conn, new PadchatMessagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'PadchatMessagesModel')) return $ret[0];
		else {
			$class = new PadchatMessagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table padchat_messages
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PadchatMessagesModel());
	}
	
	/**
	 * Basic pager function from table padchat_messages
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
		return DbModel::doPager($conn, new PadchatMessagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table padchat_messages
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
		return (int) DbModel::doAffected($conn, new PadchatMessagesModel());
	}
	
	/**
	 * Basic update function for table padchat_messages
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
		$af = (int) DbModel::doAffected($conn, new PadchatMessagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table padchat_messages
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
		return (int) DbModel::doInsert($conn, new PadchatMessagesModel());
	}
	
	/**
	 * Basic reader create function from table padchat_messages
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table padchat_messages
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
	 * Drop table function for table padchat_messages
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