<?php
/**
 * Database class for table users_fields
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/users_fields
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:37
 */

class BaseUsersFieldsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'users_fields';
	
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
	
	const FULL_PRIMARY_KEY = '`users_fields`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`users_fields`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(150)
	 */
	const FULL_NAME = '`users_fields`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`users_fields`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * users_fields_groups_id -> int(8) unsigned
	 */
	const FULL_USERS_FIELDS_GROUPS_ID = '`users_fields`.`users_fields_groups_id`';
	
	const COL_USERS_FIELDS_GROUPS_ID = 'users_fields_groups_id';
	
	/**
	 * errmessage -> varchar(255)
	 */
	const FULL_ERRMESSAGE = '`users_fields`.`errmessage`';
	
	const COL_ERRMESSAGE = 'errmessage';
	
	/**
	 * system_validations -> int(8) unsigned
	 */
	const FULL_SYSTEM_VALIDATIONS = '`users_fields`.`system_validations`';
	
	const COL_SYSTEM_VALIDATIONS = 'system_validations';
	
	/**
	 * sort -> int(8) unsigned
	 */
	const FULL_SORT = '`users_fields`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * errtype -> int(3) unsigned
	 */
	const FULL_ERRTYPE = '`users_fields`.`errtype`';
	
	const COL_ERRTYPE = 'errtype';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`users_fields`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `users_fields`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Note'=>2, 'UsersFieldsGroupsId'=>3, 'Errmessage'=>4, 'SystemValidations'=>5, 'Sort'=>6, 'Errtype'=>7);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`users_fields`.`Id`'=>0, '`users_fields`.`Name`'=>1, '`users_fields`.`Note`'=>2, '`users_fields`.`UsersFieldsGroupsId`'=>3, '`users_fields`.`Errmessage`'=>4, '`users_fields`.`SystemValidations`'=>5, '`users_fields`.`Sort`'=>6, '`users_fields`.`Errtype`'=>7);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'note'=>2, 'users_fields_groups_id'=>3, 'errmessage'=>4, 'system_validations'=>5, 'sort'=>6, 'errtype'=>7);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'note', 'users_fields_groups_id', 'errmessage', 'system_validations', 'sort', 'errtype');
	
	
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
			throw new WgException("UsersFields could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelUsersFields::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('UsersFieldsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersFieldsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('UsersFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersFieldsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in UsersFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in UsersFieldsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(11) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set UsersFieldsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(150)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set UsersFieldsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set UsersFieldsModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_fields_groups_id -> int(8) unsigned
	 * 
	 * @name getUsersFieldsGroupsId
	 * @return int
	 */
	public function getUsersFieldsGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set UsersFieldsModel::getUsersFieldsGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getUsersFieldsGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmessage -> varchar(255)
	 * 
	 * @name getErrmessage
	 * @return varchar
	 */
	public function getErrmessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set UsersFieldsModel::getErrmessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getErrmessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_validations -> int(8) unsigned
	 * 
	 * @name getSystemValidations
	 * @return int
	 */
	public function getSystemValidations() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) $this->_result[5];
			else parent::throwGetColException('Not set UsersFieldsModel::getSystemValidations', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getSystemValidations', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(8) unsigned
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set UsersFieldsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errtype -> int(3) unsigned
	 * 
	 * @name getErrtype
	 * @return int
	 */
	public function getErrtype() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set UsersFieldsModel::getErrtype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersFieldsModel::getErrtype', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: UsersFieldsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: UsersFieldsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table users_fields
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new UsersFieldsModel());
	}
	
	/** Left join select function from table users_fields
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFieldsModel());
	}
	
	/** Right join select function from table users_fields
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFieldsModel());
	}
	
	/** Inner join select function from table users_fields
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new UsersFieldsModel());
	}
	
	/**
	 * Select one item function from table users_fields
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
		$ret = DbModel::doSelect($conn, new UsersFieldsModel());
		if (isset($ret[0]) && is_a($ret[0], 'UsersFieldsModel')) return $ret[0];
		else {
			$class = new UsersFieldsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table users_fields
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new UsersFieldsModel());
	}
	
	/**
	 * Basic pager function from table users_fields
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
		return DbModel::doPager($conn, new UsersFieldsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table users_fields
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
		return (int) DbModel::doAffected($conn, new UsersFieldsModel());
	}
	
	/**
	 * Basic update function for table users_fields
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
		$af = (int) DbModel::doAffected($conn, new UsersFieldsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table users_fields
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
		return (int) DbModel::doInsert($conn, new UsersFieldsModel());
	}
	
	/**
	 * Basic reader create function from table users_fields
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table users_fields
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
	 * Drop table function for table users_fields
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