<?php
/**
 * Database class for table mtemps_server
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/mtemps_server
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseMtempsServerModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'mtemps_server';
	
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
	 * id_ms -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_ms';
	
	const FULL_PRIMARY_KEY = '`mtemps_server`.`id_ms`';
	
	/**
	 * id_ms -> int(8) unsigned
	 */
	const FULL_ID_MS = '`mtemps_server`.`id_ms`';
	
	const COL_ID_MS = 'id_ms';
	
	/**
	 * name_ms -> varchar(255)
	 */
	const FULL_NAME_MS = '`mtemps_server`.`name_ms`';
	
	const COL_NAME_MS = 'name_ms';
	
	/**
	 * identifier_ms -> varchar(255)
	 */
	const FULL_IDENTIFIER_MS = '`mtemps_server`.`identifier_ms`';
	
	const COL_IDENTIFIER_MS = 'identifier_ms';
	
	/**
	 * show_ms -> tinyint(1)
	 */
	const FULL_SHOW_MS = '`mtemps_server`.`show_ms`';
	
	const COL_SHOW_MS = 'show_ms';
	
	/**
	 * auth_ms -> tinyint(1)
	 */
	const FULL_AUTH_MS = '`mtemps_server`.`auth_ms`';
	
	const COL_AUTH_MS = 'auth_ms';
	
	/**
	 * key_ms -> varchar(40)
	 */
	const FULL_KEY_MS = '`mtemps_server`.`key_ms`';
	
	const COL_KEY_MS = 'key_ms';
	
	/**
	 * temp_ms -> text
	 */
	const FULL_TEMP_MS = '`mtemps_server`.`temp_ms`';
	
	const COL_TEMP_MS = 'temp_ms';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`mtemps_server`.`id_ms`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `mtemps_server`.`id_ms`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdMs'=>0, 'NameMs'=>1, 'IdentifierMs'=>2, 'ShowMs'=>3, 'AuthMs'=>4, 'KeyMs'=>5, 'TempMs'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`mtemps_server`.`IdMs`'=>0, '`mtemps_server`.`NameMs`'=>1, '`mtemps_server`.`IdentifierMs`'=>2, '`mtemps_server`.`ShowMs`'=>3, '`mtemps_server`.`AuthMs`'=>4, '`mtemps_server`.`KeyMs`'=>5, '`mtemps_server`.`TempMs`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_ms'=>0, 'name_ms'=>1, 'identifier_ms'=>2, 'show_ms'=>3, 'auth_ms'=>4, 'key_ms'=>5, 'temp_ms'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_ms', 'name_ms', 'identifier_ms', 'show_ms', 'auth_ms', 'key_ms', 'temp_ms');
	
	
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
			throw new WgException("MtempsServer could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelMtempsServer::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('MtempsServerModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MtempsServerModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('MtempsServerModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MtempsServerModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in MtempsServerModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in MtempsServerModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_ms -> int(8) unsigned
	 * 
	 * @name getIdMs
	 * @return int
	 */
	public function getIdMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set MtempsServerModel::getIdMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getIdMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_ms -> varchar(255)
	 * 
	 * @name getNameMs
	 * @return varchar
	 */
	public function getNameMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set MtempsServerModel::getNameMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getNameMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_ms -> varchar(255)
	 * 
	 * @name getIdentifierMs
	 * @return varchar
	 */
	public function getIdentifierMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set MtempsServerModel::getIdentifierMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getIdentifierMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of show_ms -> tinyint(1)
	 * 
	 * @name getShowMs
	 * @return tinyint
	 */
	public function getShowMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set MtempsServerModel::getShowMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getShowMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of auth_ms -> tinyint(1)
	 * 
	 * @name getAuthMs
	 * @return tinyint
	 */
	public function getAuthMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set MtempsServerModel::getAuthMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getAuthMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of key_ms -> varchar(40)
	 * 
	 * @name getKeyMs
	 * @return varchar
	 */
	public function getKeyMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set MtempsServerModel::getKeyMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getKeyMs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp_ms -> text
	 * 
	 * @name getTempMs
	 * @return text
	 */
	public function getTempMs() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set MtempsServerModel::getTempMs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MtempsServerModel::getTempMs', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: MtempsServerModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: MtempsServerModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table mtemps_server
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new MtempsServerModel());
	}
	
	/**
	 * Select one item function from table mtemps_server
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
		$ret = DbModel::doSelect($conn, new MtempsServerModel());
		if (isset($ret[0]) && is_a($ret[0], 'MtempsServerModel')) return $ret[0];
		else {
			$class = new MtempsServerModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table mtemps_server
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new MtempsServerModel());
	}
	
	/**
	 * Basic pager function from table mtemps_server
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
		return DbModel::doPager($conn, new MtempsServerModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table mtemps_server
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
		return (int) DbModel::doAffected($conn, new MtempsServerModel());
	}
	
	/**
	 * Basic update function for table mtemps_server
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
		$af = (int) DbModel::doAffected($conn, new MtempsServerModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table mtemps_server
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
		return (int) DbModel::doInsert($conn, new MtempsServerModel());
	}
	
	/**
	 * Basic reader create function from table mtemps_server
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table mtemps_server
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
	 * Drop table function for table mtemps_server
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