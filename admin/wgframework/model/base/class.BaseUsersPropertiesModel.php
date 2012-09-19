<?php
/**
 * Database class for table users_properties
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/users_properties
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseUsersPropertiesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'users_properties';
	
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
	 * id_up -> int(6) unsigned
	 */
	const PRIMARY_KEY = 'id_up';
	
	const FULL_PRIMARY_KEY = '`users_properties`.`id_up`';
	
	/**
	 * id_up -> int(6) unsigned
	 */
	const FULL_ID_UP = '`users_properties`.`id_up`';
	
	const COL_ID_UP = 'id_up';
	
	/**
	 * upg_id_up -> int(4)
	 */
	const FULL_UPG_ID_UP = '`users_properties`.`upg_id_up`';
	
	const COL_UPG_ID_UP = 'upg_id_up';
	
	/**
	 * name_up -> varchar(255)
	 */
	const FULL_NAME_UP = '`users_properties`.`name_up`';
	
	const COL_NAME_UP = 'name_up';
	
	/**
	 * desc_up -> varchar(255)
	 */
	const FULL_DESC_UP = '`users_properties`.`desc_up`';
	
	const COL_DESC_UP = 'desc_up';
	
	/**
	 * value_up -> varchar(255)
	 */
	const FULL_VALUE_UP = '`users_properties`.`value_up`';
	
	const COL_VALUE_UP = 'value_up';
	
	/**
	 * required_up -> set('y','n')
	 */
	const FULL_REQUIRED_UP = '`users_properties`.`required_up`';
	
	const COL_REQUIRED_UP = 'required_up';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`users_properties`.`id_up`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `users_properties`.`id_up`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdUp'=>0, 'UpgIdUp'=>1, 'NameUp'=>2, 'DescUp'=>3, 'ValueUp'=>4, 'RequiredUp'=>5);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`users_properties`.`IdUp`'=>0, '`users_properties`.`UpgIdUp`'=>1, '`users_properties`.`NameUp`'=>2, '`users_properties`.`DescUp`'=>3, '`users_properties`.`ValueUp`'=>4, '`users_properties`.`RequiredUp`'=>5);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_up'=>0, 'upg_id_up'=>1, 'name_up'=>2, 'desc_up'=>3, 'value_up'=>4, 'required_up'=>5);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_up', 'upg_id_up', 'name_up', 'desc_up', 'value_up', 'required_up');
	
	
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
			throw new WgException("UsersProperties could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelUsersProperties::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('UsersPropertiesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersPropertiesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('UsersPropertiesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersPropertiesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in UsersPropertiesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in UsersPropertiesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_up -> int(6) unsigned
	 * 
	 * @name getIdUp
	 * @return int
	 */
	public function getIdUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set UsersPropertiesModel::getIdUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getIdUp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of upg_id_up -> int(4)
	 * 
	 * @name getUpgIdUp
	 * @return int
	 */
	public function getUpgIdUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set UsersPropertiesModel::getUpgIdUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getUpgIdUp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_up -> varchar(255)
	 * 
	 * @name getNameUp
	 * @return varchar
	 */
	public function getNameUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set UsersPropertiesModel::getNameUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getNameUp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_up -> varchar(255)
	 * 
	 * @name getDescUp
	 * @return varchar
	 */
	public function getDescUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set UsersPropertiesModel::getDescUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getDescUp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of value_up -> varchar(255)
	 * 
	 * @name getValueUp
	 * @return varchar
	 */
	public function getValueUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set UsersPropertiesModel::getValueUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getValueUp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of required_up -> set('y','n')
	 * 
	 * @name getRequiredUp
	 * @return set
	 */
	public function getRequiredUp() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set UsersPropertiesModel::getRequiredUp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersPropertiesModel::getRequiredUp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: UsersPropertiesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: UsersPropertiesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table users_properties
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new UsersPropertiesModel());
	}
	
	/**
	 * Select one item function from table users_properties
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
		$ret = DbModel::doSelect($conn, new UsersPropertiesModel());
		if (isset($ret[0]) && is_a($ret[0], 'UsersPropertiesModel')) return $ret[0];
		else {
			$class = new UsersPropertiesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table users_properties
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new UsersPropertiesModel());
	}
	
	/**
	 * Basic pager function from table users_properties
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
		return DbModel::doPager($conn, new UsersPropertiesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table users_properties
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
		return (int) DbModel::doAffected($conn, new UsersPropertiesModel());
	}
	
	/**
	 * Basic update function for table users_properties
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
		$af = (int) DbModel::doAffected($conn, new UsersPropertiesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table users_properties
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
		return (int) DbModel::doInsert($conn, new UsersPropertiesModel());
	}
	
	/**
	 * Basic reader create function from table users_properties
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table users_properties
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
	 * Drop table function for table users_properties
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