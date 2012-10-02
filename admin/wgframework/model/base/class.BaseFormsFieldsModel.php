<?php
/**
 * Database class for table forms_fields
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/forms_fields
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class BaseFormsFieldsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'forms_fields';
	
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
	
	const FULL_PRIMARY_KEY = '`forms_fields`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`forms_fields`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * forms_items_id -> int(8) unsigned
	 */
	const FULL_FORMS_ITEMS_ID = '`forms_fields`.`forms_items_id`';
	
	const COL_FORMS_ITEMS_ID = 'forms_items_id';
	
	/**
	 * name -> varchar(150)
	 */
	const FULL_NAME = '`forms_fields`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * label -> varchar(255)
	 */
	const FULL_LABEL = '`forms_fields`.`label`';
	
	const COL_LABEL = 'label';
	
	/**
	 * type -> varchar(115)
	 */
	const FULL_TYPE = '`forms_fields`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * system_validation_id -> int(4) unsigned
	 */
	const FULL_SYSTEM_VALIDATION_ID = '`forms_fields`.`system_validation_id`';
	
	const COL_SYSTEM_VALIDATION_ID = 'system_validation_id';
	
	/**
	 * errmessage -> varchar(255)
	 */
	const FULL_ERRMESSAGE = '`forms_fields`.`errmessage`';
	
	const COL_ERRMESSAGE = 'errmessage';
	
	/**
	 * errorgroup -> int(4) unsigned
	 */
	const FULL_ERRORGROUP = '`forms_fields`.`errorgroup`';
	
	const COL_ERRORGROUP = 'errorgroup';
	
	/**
	 * sort -> int(8) unsigned
	 */
	const FULL_SORT = '`forms_fields`.`sort`';
	
	const COL_SORT = 'sort';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`forms_fields`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `forms_fields`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'FormsItemsId'=>1, 'Name'=>2, 'Label'=>3, 'Type'=>4, 'SystemValidationId'=>5, 'Errmessage'=>6, 'Errorgroup'=>7, 'Sort'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`forms_fields`.`Id`'=>0, '`forms_fields`.`FormsItemsId`'=>1, '`forms_fields`.`Name`'=>2, '`forms_fields`.`Label`'=>3, '`forms_fields`.`Type`'=>4, '`forms_fields`.`SystemValidationId`'=>5, '`forms_fields`.`Errmessage`'=>6, '`forms_fields`.`Errorgroup`'=>7, '`forms_fields`.`Sort`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'forms_items_id'=>1, 'name'=>2, 'label'=>3, 'type'=>4, 'system_validation_id'=>5, 'errmessage'=>6, 'errorgroup'=>7, 'sort'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'forms_items_id', 'name', 'label', 'type', 'system_validation_id', 'errmessage', 'errorgroup', 'sort');
	
	
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
			throw new WgException("FormsFields could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelFormsFields::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('FormsFieldsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsFieldsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('FormsFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsFieldsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in FormsFieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in FormsFieldsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set FormsFieldsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of forms_items_id -> int(8) unsigned
	 * 
	 * @name getFormsItemsId
	 * @return int
	 */
	public function getFormsItemsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set FormsFieldsModel::getFormsItemsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getFormsItemsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(150)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set FormsFieldsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of label -> varchar(255)
	 * 
	 * @name getLabel
	 * @return varchar
	 */
	public function getLabel() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set FormsFieldsModel::getLabel', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getLabel', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> varchar(115)
	 * 
	 * @name getType
	 * @return varchar
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set FormsFieldsModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_validation_id -> int(4) unsigned
	 * 
	 * @name getSystemValidationId
	 * @return int
	 */
	public function getSystemValidationId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set FormsFieldsModel::getSystemValidationId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getSystemValidationId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmessage -> varchar(255)
	 * 
	 * @name getErrmessage
	 * @return varchar
	 */
	public function getErrmessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set FormsFieldsModel::getErrmessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getErrmessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errorgroup -> int(4) unsigned
	 * 
	 * @name getErrorgroup
	 * @return int
	 */
	public function getErrorgroup() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set FormsFieldsModel::getErrorgroup', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getErrorgroup', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(8) unsigned
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set FormsFieldsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsFieldsModel::getSort', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: FormsFieldsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: FormsFieldsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table forms_fields
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new FormsFieldsModel());
	}
	
	/** Left join select function from table forms_fields
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsFieldsModel());
	}
	
	/** Right join select function from table forms_fields
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsFieldsModel());
	}
	
	/** Inner join select function from table forms_fields
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsFieldsModel());
	}
	
	/**
	 * Select one item function from table forms_fields
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
		$ret = DbModel::doSelect($conn, new FormsFieldsModel());
		if (isset($ret[0]) && is_a($ret[0], 'FormsFieldsModel')) return $ret[0];
		else {
			$class = new FormsFieldsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table forms_fields
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new FormsFieldsModel());
	}
	
	/**
	 * Basic pager function from table forms_fields
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
		return DbModel::doPager($conn, new FormsFieldsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table forms_fields
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
		return (int) DbModel::doAffected($conn, new FormsFieldsModel());
	}
	
	/**
	 * Basic update function for table forms_fields
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
		$af = (int) DbModel::doAffected($conn, new FormsFieldsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table forms_fields
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
		return (int) DbModel::doInsert($conn, new FormsFieldsModel());
	}
	
	/**
	 * Basic reader create function from table forms_fields
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table forms_fields
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
	 * Drop table function for table forms_fields
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