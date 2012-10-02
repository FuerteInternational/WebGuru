<?php
/**
 * Database class for table events
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/events
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class BaseEventsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'events';
	
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
	
	const FULL_PRIMARY_KEY = '`events`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`events`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`events`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * datestart -> datetime
	 */
	const FULL_DATESTART = '`events`.`datestart`';
	
	const COL_DATESTART = 'datestart';
	
	/**
	 * dateend -> datetime
	 */
	const FULL_DATEEND = '`events`.`dateend`';
	
	const COL_DATEEND = 'dateend';
	
	/**
	 * country -> varchar(150)
	 */
	const FULL_COUNTRY = '`events`.`country`';
	
	const COL_COUNTRY = 'country';
	
	/**
	 * activity -> varchar(255)
	 */
	const FULL_ACTIVITY = '`events`.`activity`';
	
	const COL_ACTIVITY = 'activity';
	
	/**
	 * activity_other -> varchar(255)
	 */
	const FULL_ACTIVITY_OTHER = '`events`.`activity_other`';
	
	const COL_ACTIVITY_OTHER = 'activity_other';
	
	/**
	 * activity_note -> text
	 */
	const FULL_ACTIVITY_NOTE = '`events`.`activity_note`';
	
	const COL_ACTIVITY_NOTE = 'activity_note';
	
	/**
	 * action -> varchar(255)
	 */
	const FULL_ACTION = '`events`.`action`';
	
	const COL_ACTION = 'action';
	
	/**
	 * action_note -> text
	 */
	const FULL_ACTION_NOTE = '`events`.`action_note`';
	
	const COL_ACTION_NOTE = 'action_note';
	
	/**
	 * status -> varchar(255)
	 */
	const FULL_STATUS = '`events`.`status`';
	
	const COL_STATUS = 'status';
	
	/**
	 * status_note -> text
	 */
	const FULL_STATUS_NOTE = '`events`.`status_note`';
	
	const COL_STATUS_NOTE = 'status_note';
	
	/**
	 * action_next -> varchar(255)
	 */
	const FULL_ACTION_NEXT = '`events`.`action_next`';
	
	const COL_ACTION_NEXT = 'action_next';
	
	/**
	 * action_next_date -> date
	 */
	const FULL_ACTION_NEXT_DATE = '`events`.`action_next_date`';
	
	const COL_ACTION_NEXT_DATE = 'action_next_date';
	
	/**
	 * general_note -> text
	 */
	const FULL_GENERAL_NOTE = '`events`.`general_note`';
	
	const COL_GENERAL_NOTE = 'general_note';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`events`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`events`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`events`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`events`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `events`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Datestart'=>2, 'Dateend'=>3, 'Country'=>4, 'Activity'=>5, 'ActivityOther'=>6, 'ActivityNote'=>7, 'Action'=>8, 'ActionNote'=>9, 'Status'=>10, 'StatusNote'=>11, 'ActionNext'=>12, 'ActionNextDate'=>13, 'GeneralNote'=>14, 'UsersId'=>15, 'Added'=>16, 'Changed'=>17);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`events`.`Id`'=>0, '`events`.`Name`'=>1, '`events`.`Datestart`'=>2, '`events`.`Dateend`'=>3, '`events`.`Country`'=>4, '`events`.`Activity`'=>5, '`events`.`ActivityOther`'=>6, '`events`.`ActivityNote`'=>7, '`events`.`Action`'=>8, '`events`.`ActionNote`'=>9, '`events`.`Status`'=>10, '`events`.`StatusNote`'=>11, '`events`.`ActionNext`'=>12, '`events`.`ActionNextDate`'=>13, '`events`.`GeneralNote`'=>14, '`events`.`UsersId`'=>15, '`events`.`Added`'=>16, '`events`.`Changed`'=>17);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'datestart'=>2, 'dateend'=>3, 'country'=>4, 'activity'=>5, 'activity_other'=>6, 'activity_note'=>7, 'action'=>8, 'action_note'=>9, 'status'=>10, 'status_note'=>11, 'action_next'=>12, 'action_next_date'=>13, 'general_note'=>14, 'users_id'=>15, 'added'=>16, 'changed'=>17);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'datestart', 'dateend', 'country', 'activity', 'activity_other', 'activity_note', 'action', 'action_note', 'status', 'status_note', 'action_next', 'action_next_date', 'general_note', 'users_id', 'added', 'changed');
	
	
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
			throw new WgException("Events could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelEvents::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('EventsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EventsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('EventsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EventsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in EventsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in EventsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set EventsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set EventsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datestart -> datetime
	 * 
	 * @name getDatestart
	 * @return datetime
	 */
	public function getDatestart() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) strtotime($this->_result[2]);
			else parent::throwGetColException('Not set EventsModel::getDatestart', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getDatestart', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateend -> datetime
	 * 
	 * @name getDateend
	 * @return datetime
	 */
	public function getDateend() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set EventsModel::getDateend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getDateend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of country -> varchar(150)
	 * 
	 * @name getCountry
	 * @return varchar
	 */
	public function getCountry() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set EventsModel::getCountry', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getCountry', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of activity -> varchar(255)
	 * 
	 * @name getActivity
	 * @return varchar
	 */
	public function getActivity() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set EventsModel::getActivity', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActivity', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of activity_other -> varchar(255)
	 * 
	 * @name getActivityOther
	 * @return varchar
	 */
	public function getActivityOther() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set EventsModel::getActivityOther', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActivityOther', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of activity_note -> text
	 * 
	 * @name getActivityNote
	 * @return text
	 */
	public function getActivityNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set EventsModel::getActivityNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActivityNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of action -> varchar(255)
	 * 
	 * @name getAction
	 * @return varchar
	 */
	public function getAction() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set EventsModel::getAction', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getAction', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of action_note -> text
	 * 
	 * @name getActionNote
	 * @return text
	 */
	public function getActionNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set EventsModel::getActionNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActionNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status -> varchar(255)
	 * 
	 * @name getStatus
	 * @return varchar
	 */
	public function getStatus() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set EventsModel::getStatus', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getStatus', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status_note -> text
	 * 
	 * @name getStatusNote
	 * @return text
	 */
	public function getStatusNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set EventsModel::getStatusNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getStatusNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of action_next -> varchar(255)
	 * 
	 * @name getActionNext
	 * @return varchar
	 */
	public function getActionNext() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set EventsModel::getActionNext', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActionNext', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of action_next_date -> date
	 * 
	 * @name getActionNextDate
	 * @return date
	 */
	public function getActionNextDate() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set EventsModel::getActionNextDate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getActionNextDate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of general_note -> text
	 * 
	 * @name getGeneralNote
	 * @return text
	 */
	public function getGeneralNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set EventsModel::getGeneralNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getGeneralNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set EventsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (int) strtotime($this->_result[16]);
			else parent::throwGetColException('Not set EventsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (int) strtotime($this->_result[17]);
			else parent::throwGetColException('Not set EventsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EventsModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: EventsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: EventsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table events
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new EventsModel());
	}
	
	/** Left join select function from table events
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EventsModel());
	}
	
	/** Right join select function from table events
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EventsModel());
	}
	
	/** Inner join select function from table events
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new EventsModel());
	}
	
	/**
	 * Select one item function from table events
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
		$ret = DbModel::doSelect($conn, new EventsModel());
		if (isset($ret[0]) && is_a($ret[0], 'EventsModel')) return $ret[0];
		else {
			$class = new EventsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table events
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new EventsModel());
	}
	
	/**
	 * Basic pager function from table events
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
		return DbModel::doPager($conn, new EventsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table events
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
		return (int) DbModel::doAffected($conn, new EventsModel());
	}
	
	/**
	 * Basic update function for table events
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
		$af = (int) DbModel::doAffected($conn, new EventsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table events
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
		return (int) DbModel::doInsert($conn, new EventsModel());
	}
	
	/**
	 * Basic reader create function from table events
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table events
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
	 * Drop table function for table events
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