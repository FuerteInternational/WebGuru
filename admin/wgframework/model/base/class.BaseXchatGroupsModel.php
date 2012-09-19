<?php
/**
 * Database class for table xchat_groups
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/xchat_groups
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseXchatGroupsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'xchat_groups';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`xchat_groups`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`xchat_groups`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`xchat_groups`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`xchat_groups`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`xchat_groups`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * lastpost -> datetime
	 */
	const FULL_LASTPOST = '`xchat_groups`.`lastpost`';
	
	const COL_LASTPOST = 'lastpost';
	
	/**
	 * static -> tinyint(1) unsigned
	 */
	const FULL_STATIC = '`xchat_groups`.`static`';
	
	const COL_STATIC = 'static';
	
	/**
	 * sort -> int(11) unsigned
	 */
	const FULL_SORT = '`xchat_groups`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * range_lat -> float
	 */
	const FULL_RANGE_LAT = '`xchat_groups`.`range_lat`';
	
	const COL_RANGE_LAT = 'range_lat';
	
	/**
	 * range_long -> float
	 */
	const FULL_RANGE_LONG = '`xchat_groups`.`range_long`';
	
	const COL_RANGE_LONG = 'range_long';
	
	/**
	 * password -> varchar(50)
	 */
	const FULL_PASSWORD = '`xchat_groups`.`password`';
	
	const COL_PASSWORD = 'password';
	
	/**
	 * iservice_services_id -> int(11)
	 */
	const FULL_ISERVICE_SERVICES_ID = '`xchat_groups`.`iservice_services_id`';
	
	const COL_ISERVICE_SERVICES_ID = 'iservice_services_id';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`xchat_groups`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `xchat_groups`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Description'=>2, 'Added'=>3, 'Lastpost'=>4, 'Static'=>5, 'Sort'=>6, 'RangeLat'=>7, 'RangeLong'=>8, 'Password'=>9, 'IserviceServicesId'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`xchat_groups`.`Id`'=>0, '`xchat_groups`.`Name`'=>1, '`xchat_groups`.`Description`'=>2, '`xchat_groups`.`Added`'=>3, '`xchat_groups`.`Lastpost`'=>4, '`xchat_groups`.`Static`'=>5, '`xchat_groups`.`Sort`'=>6, '`xchat_groups`.`RangeLat`'=>7, '`xchat_groups`.`RangeLong`'=>8, '`xchat_groups`.`Password`'=>9, '`xchat_groups`.`IserviceServicesId`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'description'=>2, 'added'=>3, 'lastpost'=>4, 'static'=>5, 'sort'=>6, 'range_lat'=>7, 'range_long'=>8, 'password'=>9, 'iservice_services_id'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'description', 'added', 'lastpost', 'static', 'sort', 'range_lat', 'range_long', 'password', 'iservice_services_id');
	
	
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
			throw new WgException("XchatGroups could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelXchatGroups::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('XchatGroupsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('XchatGroupsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('XchatGroupsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('XchatGroupsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in XchatGroupsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in XchatGroupsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set XchatGroupsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set XchatGroupsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set XchatGroupsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getDescription', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set XchatGroupsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastpost -> datetime
	 * 
	 * @name getLastpost
	 * @return datetime
	 */
	public function getLastpost() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set XchatGroupsModel::getLastpost', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getLastpost', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of static -> tinyint(1) unsigned
	 * 
	 * @name getStatic
	 * @return tinyint
	 */
	public function getStatic() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set XchatGroupsModel::getStatic', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getStatic', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11) unsigned
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set XchatGroupsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of range_lat -> float
	 * 
	 * @name getRangeLat
	 * @return float
	 */
	public function getRangeLat() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set XchatGroupsModel::getRangeLat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getRangeLat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of range_long -> float
	 * 
	 * @name getRangeLong
	 * @return float
	 */
	public function getRangeLong() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set XchatGroupsModel::getRangeLong', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getRangeLong', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of password -> varchar(50)
	 * 
	 * @name getPassword
	 * @return varchar
	 */
	public function getPassword() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set XchatGroupsModel::getPassword', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getPassword', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of iservice_services_id -> int(11)
	 * 
	 * @name getIserviceServicesId
	 * @return int
	 */
	public function getIserviceServicesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set XchatGroupsModel::getIserviceServicesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From XchatGroupsModel::getIserviceServicesId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: XchatGroupsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: XchatGroupsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table xchat_groups
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new XchatGroupsModel());
	}
	
	/**
	 * Select one item function from table xchat_groups
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
		$ret = DbModel::doSelect($conn, new XchatGroupsModel());
		if (isset($ret[0]) && is_a($ret[0], 'XchatGroupsModel')) return $ret[0];
		else {
			$class = new XchatGroupsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table xchat_groups
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new XchatGroupsModel());
	}
	
	/**
	 * Basic pager function from table xchat_groups
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
		return DbModel::doPager($conn, new XchatGroupsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table xchat_groups
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
		return (int) DbModel::doAffected($conn, new XchatGroupsModel());
	}
	
	/**
	 * Basic update function for table xchat_groups
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
		$af = (int) DbModel::doAffected($conn, new XchatGroupsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table xchat_groups
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
		return (int) DbModel::doInsert($conn, new XchatGroupsModel());
	}
	
	/**
	 * Basic reader create function from table xchat_groups
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table xchat_groups
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
	 * Drop table function for table xchat_groups
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