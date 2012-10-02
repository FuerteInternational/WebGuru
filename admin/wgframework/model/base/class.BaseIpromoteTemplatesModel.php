<?php
/**
 * Database class for table ipromote_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/ipromote_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:24
 */

class BaseIpromoteTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'ipromote_templates';
	
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
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`ipromote_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`ipromote_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`ipromote_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`ipromote_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1)
	 */
	const FULL_TEMPTYPE = '`ipromote_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * mess1 -> varchar(255)
	 */
	const FULL_MESS1 = '`ipromote_templates`.`mess1`';
	
	const COL_MESS1 = 'mess1';
	
	/**
	 * mess2 -> varchar(255)
	 */
	const FULL_MESS2 = '`ipromote_templates`.`mess2`';
	
	const COL_MESS2 = 'mess2';
	
	/**
	 * mess3 -> varchar(255)
	 */
	const FULL_MESS3 = '`ipromote_templates`.`mess3`';
	
	const COL_MESS3 = 'mess3';
	
	/**
	 * mess4 -> varchar(255)
	 */
	const FULL_MESS4 = '`ipromote_templates`.`mess4`';
	
	const COL_MESS4 = 'mess4';
	
	/**
	 * red1 -> int(11)
	 */
	const FULL_RED1 = '`ipromote_templates`.`red1`';
	
	const COL_RED1 = 'red1';
	
	/**
	 * red2 -> int(11)
	 */
	const FULL_RED2 = '`ipromote_templates`.`red2`';
	
	const COL_RED2 = 'red2';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`ipromote_templates`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * titem -> text
	 */
	const FULL_TITEM = '`ipromote_templates`.`titem`';
	
	const COL_TITEM = 'titem';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`ipromote_templates`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * tnoitem -> text
	 */
	const FULL_TNOITEM = '`ipromote_templates`.`tnoitem`';
	
	const COL_TNOITEM = 'tnoitem';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`ipromote_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `ipromote_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Mess1'=>4, 'Mess2'=>5, 'Mess3'=>6, 'Mess4'=>7, 'Red1'=>8, 'Red2'=>9, 'Tbegin'=>10, 'Titem'=>11, 'Tend'=>12, 'Tnoitem'=>13);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`ipromote_templates`.`Id`'=>0, '`ipromote_templates`.`Name`'=>1, '`ipromote_templates`.`Identifier`'=>2, '`ipromote_templates`.`Temptype`'=>3, '`ipromote_templates`.`Mess1`'=>4, '`ipromote_templates`.`Mess2`'=>5, '`ipromote_templates`.`Mess3`'=>6, '`ipromote_templates`.`Mess4`'=>7, '`ipromote_templates`.`Red1`'=>8, '`ipromote_templates`.`Red2`'=>9, '`ipromote_templates`.`Tbegin`'=>10, '`ipromote_templates`.`Titem`'=>11, '`ipromote_templates`.`Tend`'=>12, '`ipromote_templates`.`Tnoitem`'=>13);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'mess1'=>4, 'mess2'=>5, 'mess3'=>6, 'mess4'=>7, 'red1'=>8, 'red2'=>9, 'tbegin'=>10, 'titem'=>11, 'tend'=>12, 'tnoitem'=>13);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'mess1', 'mess2', 'mess3', 'mess4', 'red1', 'red2', 'tbegin', 'titem', 'tend', 'tnoitem');
	
	
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
			throw new WgException("IpromoteTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelIpromoteTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('IpromoteTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IpromoteTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('IpromoteTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IpromoteTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in IpromoteTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in IpromoteTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1)
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess1 -> varchar(255)
	 * 
	 * @name getMess1
	 * @return varchar
	 */
	public function getMess1() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getMess1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getMess1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess2 -> varchar(255)
	 * 
	 * @name getMess2
	 * @return varchar
	 */
	public function getMess2() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getMess2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getMess2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess3 -> varchar(255)
	 * 
	 * @name getMess3
	 * @return varchar
	 */
	public function getMess3() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getMess3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getMess3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess4 -> varchar(255)
	 * 
	 * @name getMess4
	 * @return varchar
	 */
	public function getMess4() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getMess4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getMess4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of red1 -> int(11)
	 * 
	 * @name getRed1
	 * @return int
	 */
	public function getRed1() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getRed1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getRed1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of red2 -> int(11)
	 * 
	 * @name getRed2
	 * @return int
	 */
	public function getRed2() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getRed2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getRed2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem -> text
	 * 
	 * @name getTitem
	 * @return text
	 */
	public function getTitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getTitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getTitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tnoitem -> text
	 * 
	 * @name getTnoitem
	 * @return text
	 */
	public function getTnoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set IpromoteTemplatesModel::getTnoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IpromoteTemplatesModel::getTnoitem', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: IpromoteTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: IpromoteTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table ipromote_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new IpromoteTemplatesModel());
	}
	
	/**
	 * Select one item function from table ipromote_templates
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
		$ret = DbModel::doSelect($conn, new IpromoteTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'IpromoteTemplatesModel')) return $ret[0];
		else {
			$class = new IpromoteTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table ipromote_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new IpromoteTemplatesModel());
	}
	
	/**
	 * Basic pager function from table ipromote_templates
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
		return DbModel::doPager($conn, new IpromoteTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table ipromote_templates
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
		return (int) DbModel::doAffected($conn, new IpromoteTemplatesModel());
	}
	
	/**
	 * Basic update function for table ipromote_templates
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
		$af = (int) DbModel::doAffected($conn, new IpromoteTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table ipromote_templates
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
		return (int) DbModel::doInsert($conn, new IpromoteTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table ipromote_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table ipromote_templates
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
	 * Drop table function for table ipromote_templates
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