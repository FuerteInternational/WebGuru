<?php
/**
 * Database class for table forms_messages
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/forms_messages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:23
 */

class BaseFormsMessagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'forms_messages';
	
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
	
	const FULL_PRIMARY_KEY = '`forms_messages`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`forms_messages`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * forms_items_id -> int(8) unsigned
	 */
	const FULL_FORMS_ITEMS_ID = '`forms_messages`.`forms_items_id`';
	
	const COL_FORMS_ITEMS_ID = 'forms_items_id';
	
	/**
	 * forms_messages_groups_id -> int(8) unsigned
	 */
	const FULL_FORMS_MESSAGES_GROUPS_ID = '`forms_messages`.`forms_messages_groups_id`';
	
	const COL_FORMS_MESSAGES_GROUPS_ID = 'forms_messages_groups_id';
	
	/**
	 * data -> text
	 */
	const FULL_DATA = '`forms_messages`.`data`';
	
	const COL_DATA = 'data';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`forms_messages`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * readflag -> int(8)
	 */
	const FULL_READFLAG = '`forms_messages`.`readflag`';
	
	const COL_READFLAG = 'readflag';
	
	/**
	 * readwhen -> datetime
	 */
	const FULL_READWHEN = '`forms_messages`.`readwhen`';
	
	const COL_READWHEN = 'readwhen';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`forms_messages`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `forms_messages`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'FormsItemsId'=>1, 'FormsMessagesGroupsId'=>2, 'Data'=>3, 'Added'=>4, 'Readflag'=>5, 'Readwhen'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`forms_messages`.`Id`'=>0, '`forms_messages`.`FormsItemsId`'=>1, '`forms_messages`.`FormsMessagesGroupsId`'=>2, '`forms_messages`.`Data`'=>3, '`forms_messages`.`Added`'=>4, '`forms_messages`.`Readflag`'=>5, '`forms_messages`.`Readwhen`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'forms_items_id'=>1, 'forms_messages_groups_id'=>2, 'data'=>3, 'added'=>4, 'readflag'=>5, 'readwhen'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'forms_items_id', 'forms_messages_groups_id', 'data', 'added', 'readflag', 'readwhen');
	
	
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
			throw new WgException("FormsMessages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelFormsMessages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('FormsMessagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsMessagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('FormsMessagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsMessagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in FormsMessagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in FormsMessagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set FormsMessagesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set FormsMessagesModel::getFormsItemsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getFormsItemsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of forms_messages_groups_id -> int(8) unsigned
	 * 
	 * @name getFormsMessagesGroupsId
	 * @return int
	 */
	public function getFormsMessagesGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set FormsMessagesModel::getFormsMessagesGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getFormsMessagesGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of data -> text
	 * 
	 * @name getData
	 * @return text
	 */
	public function getData() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set FormsMessagesModel::getData', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getData', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set FormsMessagesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of readflag -> int(8)
	 * 
	 * @name getReadflag
	 * @return int
	 */
	public function getReadflag() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set FormsMessagesModel::getReadflag', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getReadflag', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of readwhen -> datetime
	 * 
	 * @name getReadwhen
	 * @return datetime
	 */
	public function getReadwhen() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set FormsMessagesModel::getReadwhen', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsMessagesModel::getReadwhen', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: FormsMessagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: FormsMessagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table forms_messages
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new FormsMessagesModel());
	}
	
	/**
	 * Select one item function from table forms_messages
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
		$ret = DbModel::doSelect($conn, new FormsMessagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'FormsMessagesModel')) return $ret[0];
		else {
			$class = new FormsMessagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table forms_messages
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new FormsMessagesModel());
	}
	
	/**
	 * Basic pager function from table forms_messages
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
		return DbModel::doPager($conn, new FormsMessagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table forms_messages
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
		return (int) DbModel::doAffected($conn, new FormsMessagesModel());
	}
	
	/**
	 * Basic update function for table forms_messages
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
		$af = (int) DbModel::doAffected($conn, new FormsMessagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table forms_messages
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
		return (int) DbModel::doInsert($conn, new FormsMessagesModel());
	}
	
	/**
	 * Basic reader create function from table forms_messages
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table forms_messages
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
	 * Drop table function for table forms_messages
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