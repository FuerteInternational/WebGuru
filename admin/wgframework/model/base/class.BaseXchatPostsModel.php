<?php
/**
 * Database class for table xchat_posts
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/xchat_posts
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseXchatPostsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'xchat_posts';
	
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
	
	const FULL_PRIMARY_KEY = '`xchat_posts`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`xchat_posts`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * iuser_users_id -> int(11) unsigned
	 */
	const FULL_IUSER_USERS_ID = '`xchat_posts`.`iuser_users_id`';
	
	const COL_IUSER_USERS_ID = 'iuser_users_id';
	
	/**
	 * xchat_groups_id -> int(11) unsigned
	 */
	const FULL_XCHAT_GROUPS_ID = '`xchat_posts`.`xchat_groups_id`';
	
	const COL_XCHAT_GROUPS_ID = 'xchat_groups_id';
	
	/**
	 * message -> text
	 */
	const FULL_MESSAGE = '`xchat_posts`.`message`';
	
	const COL_MESSAGE = 'message';
	
	/**
	 * longitude -> double
	 */
	const FULL_LONGITUDE = '`xchat_posts`.`longitude`';
	
	const COL_LONGITUDE = 'longitude';
	
	/**
	 * latitude -> double
	 */
	const FULL_LATITUDE = '`xchat_posts`.`latitude`';
	
	const COL_LATITUDE = 'latitude';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`xchat_posts`.`added`';
	
	const COL_ADDED = 'added';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`xchat_posts`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `xchat_posts`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'IuserUsersId'=>1, 'XchatGroupsId'=>2, 'Message'=>3, 'Longitude'=>4, 'Latitude'=>5, 'Added'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`xchat_posts`.`Id`'=>0, '`xchat_posts`.`IuserUsersId`'=>1, '`xchat_posts`.`XchatGroupsId`'=>2, '`xchat_posts`.`Message`'=>3, '`xchat_posts`.`Longitude`'=>4, '`xchat_posts`.`Latitude`'=>5, '`xchat_posts`.`Added`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'iuser_users_id'=>1, 'xchat_groups_id'=>2, 'message'=>3, 'longitude'=>4, 'latitude'=>5, 'added'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'iuser_users_id', 'xchat_groups_id', 'message', 'longitude', 'latitude', 'added');
	
	
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
			throw new WgException("XchatPosts could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelXchatPosts::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('XchatPostsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('XchatPostsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('XchatPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('XchatPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in XchatPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in XchatPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set XchatPostsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of iuser_users_id -> int(11) unsigned
	 * 
	 * @name getIuserUsersId
	 * @return int
	 */
	public function getIuserUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set XchatPostsModel::getIuserUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getIuserUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of xchat_groups_id -> int(11) unsigned
	 * 
	 * @name getXchatGroupsId
	 * @return int
	 */
	public function getXchatGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set XchatPostsModel::getXchatGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getXchatGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of message -> text
	 * 
	 * @name getMessage
	 * @return text
	 */
	public function getMessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set XchatPostsModel::getMessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getMessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of longitude -> double
	 * 
	 * @name getLongitude
	 * @return double
	 */
	public function getLongitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set XchatPostsModel::getLongitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getLongitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of latitude -> double
	 * 
	 * @name getLatitude
	 * @return double
	 */
	public function getLatitude() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set XchatPostsModel::getLatitude', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getLatitude', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set XchatPostsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatPostsModel::getAdded', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: XchatPostsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: XchatPostsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table xchat_posts
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new XchatPostsModel());
	}
	
	/**
	 * Select one item function from table xchat_posts
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
		$ret = DbModel::doSelect($conn, new XchatPostsModel());
		if (isset($ret[0]) && is_a($ret[0], 'XchatPostsModel')) return $ret[0];
		else {
			$class = new XchatPostsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table xchat_posts
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new XchatPostsModel());
	}
	
	/**
	 * Basic pager function from table xchat_posts
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
		return DbModel::doPager($conn, new XchatPostsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table xchat_posts
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
		return (int) DbModel::doAffected($conn, new XchatPostsModel());
	}
	
	/**
	 * Basic update function for table xchat_posts
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
		$af = (int) DbModel::doAffected($conn, new XchatPostsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table xchat_posts
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
		return (int) DbModel::doInsert($conn, new XchatPostsModel());
	}
	
	/**
	 * Basic reader create function from table xchat_posts
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table xchat_posts
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
	 * Drop table function for table xchat_posts
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