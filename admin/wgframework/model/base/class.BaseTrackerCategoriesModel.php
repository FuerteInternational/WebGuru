<?php
/**
 * Database class for table tracker_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/tracker_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseTrackerCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'tracker_categories';
	
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
	 * id_tc -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_tc';
	
	const FULL_PRIMARY_KEY = '`tracker_categories`.`id_tc`';
	
	/**
	 * id_tc -> int(8) unsigned
	 */
	const FULL_ID_TC = '`tracker_categories`.`id_tc`';
	
	const COL_ID_TC = 'id_tc';
	
	/**
	 * name_tc -> varchar(255)
	 */
	const FULL_NAME_TC = '`tracker_categories`.`name_tc`';
	
	const COL_NAME_TC = 'name_tc';
	
	/**
	 * code_tc -> varchar(255)
	 */
	const FULL_CODE_TC = '`tracker_categories`.`code_tc`';
	
	const COL_CODE_TC = 'code_tc';
	
	/**
	 * type_tc -> varchar(50)
	 */
	const FULL_TYPE_TC = '`tracker_categories`.`type_tc`';
	
	const COL_TYPE_TC = 'type_tc';
	
	/**
	 * added_tc -> datetime
	 */
	const FULL_ADDED_TC = '`tracker_categories`.`added_tc`';
	
	const COL_ADDED_TC = 'added_tc';
	
	/**
	 * lastuse_tc -> datetime
	 */
	const FULL_LASTUSE_TC = '`tracker_categories`.`lastuse_tc`';
	
	const COL_LASTUSE_TC = 'lastuse_tc';
	
	/**
	 * startvalue_tc -> int(32)
	 */
	const FULL_STARTVALUE_TC = '`tracker_categories`.`startvalue_tc`';
	
	const COL_STARTVALUE_TC = 'startvalue_tc';
	
	/**
	 * users_id_tc -> int(16)
	 */
	const FULL_USERS_ID_TC = '`tracker_categories`.`users_id_tc`';
	
	const COL_USERS_ID_TC = 'users_id_tc';
	
	/**
	 * perm_tc -> int(1)
	 */
	const FULL_PERM_TC = '`tracker_categories`.`perm_tc`';
	
	const COL_PERM_TC = 'perm_tc';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`tracker_categories`.`id_tc`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `tracker_categories`.`id_tc`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdTc'=>0, 'NameTc'=>1, 'CodeTc'=>2, 'TypeTc'=>3, 'AddedTc'=>4, 'LastuseTc'=>5, 'StartvalueTc'=>6, 'UsersIdTc'=>7, 'PermTc'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`tracker_categories`.`IdTc`'=>0, '`tracker_categories`.`NameTc`'=>1, '`tracker_categories`.`CodeTc`'=>2, '`tracker_categories`.`TypeTc`'=>3, '`tracker_categories`.`AddedTc`'=>4, '`tracker_categories`.`LastuseTc`'=>5, '`tracker_categories`.`StartvalueTc`'=>6, '`tracker_categories`.`UsersIdTc`'=>7, '`tracker_categories`.`PermTc`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_tc'=>0, 'name_tc'=>1, 'code_tc'=>2, 'type_tc'=>3, 'added_tc'=>4, 'lastuse_tc'=>5, 'startvalue_tc'=>6, 'users_id_tc'=>7, 'perm_tc'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_tc', 'name_tc', 'code_tc', 'type_tc', 'added_tc', 'lastuse_tc', 'startvalue_tc', 'users_id_tc', 'perm_tc');
	
	
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
			throw new WgException("TrackerCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelTrackerCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('TrackerCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('TrackerCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in TrackerCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in TrackerCategoriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_tc -> int(8) unsigned
	 * 
	 * @name getIdTc
	 * @return int
	 */
	public function getIdTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getIdTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getIdTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_tc -> varchar(255)
	 * 
	 * @name getNameTc
	 * @return varchar
	 */
	public function getNameTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getNameTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getNameTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of code_tc -> varchar(255)
	 * 
	 * @name getCodeTc
	 * @return varchar
	 */
	public function getCodeTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getCodeTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getCodeTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type_tc -> varchar(50)
	 * 
	 * @name getTypeTc
	 * @return varchar
	 */
	public function getTypeTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getTypeTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getTypeTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_tc -> datetime
	 * 
	 * @name getAddedTc
	 * @return datetime
	 */
	public function getAddedTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set TrackerCategoriesModel::getAddedTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getAddedTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastuse_tc -> datetime
	 * 
	 * @name getLastuseTc
	 * @return datetime
	 */
	public function getLastuseTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set TrackerCategoriesModel::getLastuseTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getLastuseTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of startvalue_tc -> int(32)
	 * 
	 * @name getStartvalueTc
	 * @return int
	 */
	public function getStartvalueTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getStartvalueTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getStartvalueTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_tc -> int(16)
	 * 
	 * @name getUsersIdTc
	 * @return int
	 */
	public function getUsersIdTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getUsersIdTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getUsersIdTc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perm_tc -> int(1)
	 * 
	 * @name getPermTc
	 * @return int
	 */
	public function getPermTc() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set TrackerCategoriesModel::getPermTc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerCategoriesModel::getPermTc', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: TrackerCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: TrackerCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table tracker_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new TrackerCategoriesModel());
	}
	
	/**
	 * Select one item function from table tracker_categories
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
		$ret = DbModel::doSelect($conn, new TrackerCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'TrackerCategoriesModel')) return $ret[0];
		else {
			$class = new TrackerCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table tracker_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new TrackerCategoriesModel());
	}
	
	/**
	 * Basic pager function from table tracker_categories
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
		return DbModel::doPager($conn, new TrackerCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table tracker_categories
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
		return (int) DbModel::doAffected($conn, new TrackerCategoriesModel());
	}
	
	/**
	 * Basic update function for table tracker_categories
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
		$af = (int) DbModel::doAffected($conn, new TrackerCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table tracker_categories
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
		return (int) DbModel::doInsert($conn, new TrackerCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table tracker_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table tracker_categories
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
	 * Drop table function for table tracker_categories
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