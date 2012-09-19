<?php
/**
 * Database class for table dynamic_columns
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/dynamic_columns
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:25
 */

class BaseDynamicColumnsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'dynamic_columns';
	
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
	
	const FULL_PRIMARY_KEY = '`dynamic_columns`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`dynamic_columns`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`dynamic_columns`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`dynamic_columns`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * type -> int(3) unsigned
	 */
	const FULL_TYPE = '`dynamic_columns`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * validation -> int(3) unsigned
	 */
	const FULL_VALIDATION = '`dynamic_columns`.`validation`';
	
	const COL_VALIDATION = 'validation';
	
	/**
	 * mandatory -> tinyint(1) unsigned
	 */
	const FULL_MANDATORY = '`dynamic_columns`.`mandatory`';
	
	const COL_MANDATORY = 'mandatory';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`dynamic_columns`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`dynamic_columns`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`dynamic_columns`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * dynamic_modules_id -> int(8) unsigned
	 */
	const FULL_DYNAMIC_MODULES_ID = '`dynamic_columns`.`dynamic_modules_id`';
	
	const COL_DYNAMIC_MODULES_ID = 'dynamic_modules_id';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`dynamic_columns`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `dynamic_columns`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Type'=>3, 'Validation'=>4, 'Mandatory'=>5, 'Added'=>6, 'Changed'=>7, 'Note'=>8, 'DynamicModulesId'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`dynamic_columns`.`Id`'=>0, '`dynamic_columns`.`Name`'=>1, '`dynamic_columns`.`Identifier`'=>2, '`dynamic_columns`.`Type`'=>3, '`dynamic_columns`.`Validation`'=>4, '`dynamic_columns`.`Mandatory`'=>5, '`dynamic_columns`.`Added`'=>6, '`dynamic_columns`.`Changed`'=>7, '`dynamic_columns`.`Note`'=>8, '`dynamic_columns`.`DynamicModulesId`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'type'=>3, 'validation'=>4, 'mandatory'=>5, 'added'=>6, 'changed'=>7, 'note'=>8, 'dynamic_modules_id'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'type', 'validation', 'mandatory', 'added', 'changed', 'note', 'dynamic_modules_id');
	
	
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
			throw new WgException("DynamicColumns could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDynamicColumns::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DynamicColumnsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DynamicColumnsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DynamicColumnsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DynamicColumnsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DynamicColumnsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DynamicColumnsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DynamicColumnsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DynamicColumnsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DynamicColumnsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> int(3) unsigned
	 * 
	 * @name getType
	 * @return int
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DynamicColumnsModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of validation -> int(3) unsigned
	 * 
	 * @name getValidation
	 * @return int
	 */
	public function getValidation() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DynamicColumnsModel::getValidation', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getValidation', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mandatory -> tinyint(1) unsigned
	 * 
	 * @name getMandatory
	 * @return tinyint
	 */
	public function getMandatory() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DynamicColumnsModel::getMandatory', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getMandatory', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DynamicColumnsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set DynamicColumnsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DynamicColumnsModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dynamic_modules_id -> int(8) unsigned
	 * 
	 * @name getDynamicModulesId
	 * @return int
	 */
	public function getDynamicModulesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DynamicColumnsModel::getDynamicModulesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DynamicColumnsModel::getDynamicModulesId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DynamicColumnsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DynamicColumnsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table dynamic_columns
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DynamicColumnsModel());
	}
	
	/**
	 * Select one item function from table dynamic_columns
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
		$ret = DbModel::doSelect($conn, new DynamicColumnsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DynamicColumnsModel')) return $ret[0];
		else {
			$class = new DynamicColumnsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table dynamic_columns
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DynamicColumnsModel());
	}
	
	/**
	 * Basic pager function from table dynamic_columns
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
		return DbModel::doPager($conn, new DynamicColumnsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table dynamic_columns
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
		return (int) DbModel::doAffected($conn, new DynamicColumnsModel());
	}
	
	/**
	 * Basic update function for table dynamic_columns
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
		$af = (int) DbModel::doAffected($conn, new DynamicColumnsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table dynamic_columns
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
		return (int) DbModel::doInsert($conn, new DynamicColumnsModel());
	}
	
	/**
	 * Basic reader create function from table dynamic_columns
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table dynamic_columns
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
	 * Drop table function for table dynamic_columns
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