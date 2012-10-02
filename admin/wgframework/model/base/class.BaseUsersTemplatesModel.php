<?php
/**
 * Database class for table users_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/users_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:15
 */

class BaseUsersTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'users_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`users_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`users_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`users_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`users_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(2) unsigned
	 */
	const FULL_TEMPTYPE = '`users_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * pager -> tinyint(1) unsigned
	 */
	const FULL_PAGER = '`users_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * perpage -> int(5) unsigned
	 */
	const FULL_PERPAGE = '`users_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * datasource -> smallint(3) unsigned
	 */
	const FULL_DATASOURCE = '`users_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * datasource2 -> smallint(3) unsigned
	 */
	const FULL_DATASOURCE2 = '`users_templates`.`datasource2`';
	
	const COL_DATASOURCE2 = 'datasource2';
	
	/**
	 * variable -> varchar(80)
	 */
	const FULL_VARIABLE = '`users_templates`.`variable`';
	
	const COL_VARIABLE = 'variable';
	
	/**
	 * useedit -> tinyint(1) unsigned
	 */
	const FULL_USEEDIT = '`users_templates`.`useedit`';
	
	const COL_USEEDIT = 'useedit';
	
	/**
	 * redirect1 -> varchar(255)
	 */
	const FULL_REDIRECT1 = '`users_templates`.`redirect1`';
	
	const COL_REDIRECT1 = 'redirect1';
	
	/**
	 * redirect2 -> varchar(255)
	 */
	const FULL_REDIRECT2 = '`users_templates`.`redirect2`';
	
	const COL_REDIRECT2 = 'redirect2';
	
	/**
	 * tempstart -> text
	 */
	const FULL_TEMPSTART = '`users_templates`.`tempstart`';
	
	const COL_TEMPSTART = 'tempstart';
	
	/**
	 * temp -> text
	 */
	const FULL_TEMP = '`users_templates`.`temp`';
	
	const COL_TEMP = 'temp';
	
	/**
	 * tempend -> text
	 */
	const FULL_TEMPEND = '`users_templates`.`tempend`';
	
	const COL_TEMPEND = 'tempend';
	
	/**
	 * noitem -> text
	 */
	const FULL_NOITEM = '`users_templates`.`noitem`';
	
	const COL_NOITEM = 'noitem';
	
	/**
	 * mess1 -> varchar(255)
	 */
	const FULL_MESS1 = '`users_templates`.`mess1`';
	
	const COL_MESS1 = 'mess1';
	
	/**
	 * mess2 -> varchar(255)
	 */
	const FULL_MESS2 = '`users_templates`.`mess2`';
	
	const COL_MESS2 = 'mess2';
	
	/**
	 * mess3 -> varchar(255)
	 */
	const FULL_MESS3 = '`users_templates`.`mess3`';
	
	const COL_MESS3 = 'mess3';
	
	/**
	 * mess4 -> varchar(255)
	 */
	const FULL_MESS4 = '`users_templates`.`mess4`';
	
	const COL_MESS4 = 'mess4';
	
	/**
	 * mess5 -> varchar(255)
	 */
	const FULL_MESS5 = '`users_templates`.`mess5`';
	
	const COL_MESS5 = 'mess5';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`users_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `users_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Pager'=>4, 'Perpage'=>5, 'Datasource'=>6, 'Datasource2'=>7, 'Variable'=>8, 'Useedit'=>9, 'Redirect1'=>10, 'Redirect2'=>11, 'Tempstart'=>12, 'Temp'=>13, 'Tempend'=>14, 'Noitem'=>15, 'Mess1'=>16, 'Mess2'=>17, 'Mess3'=>18, 'Mess4'=>19, 'Mess5'=>20);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`users_templates`.`Id`'=>0, '`users_templates`.`Name`'=>1, '`users_templates`.`Identifier`'=>2, '`users_templates`.`Temptype`'=>3, '`users_templates`.`Pager`'=>4, '`users_templates`.`Perpage`'=>5, '`users_templates`.`Datasource`'=>6, '`users_templates`.`Datasource2`'=>7, '`users_templates`.`Variable`'=>8, '`users_templates`.`Useedit`'=>9, '`users_templates`.`Redirect1`'=>10, '`users_templates`.`Redirect2`'=>11, '`users_templates`.`Tempstart`'=>12, '`users_templates`.`Temp`'=>13, '`users_templates`.`Tempend`'=>14, '`users_templates`.`Noitem`'=>15, '`users_templates`.`Mess1`'=>16, '`users_templates`.`Mess2`'=>17, '`users_templates`.`Mess3`'=>18, '`users_templates`.`Mess4`'=>19, '`users_templates`.`Mess5`'=>20);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'pager'=>4, 'perpage'=>5, 'datasource'=>6, 'datasource2'=>7, 'variable'=>8, 'useedit'=>9, 'redirect1'=>10, 'redirect2'=>11, 'tempstart'=>12, 'temp'=>13, 'tempend'=>14, 'noitem'=>15, 'mess1'=>16, 'mess2'=>17, 'mess3'=>18, 'mess4'=>19, 'mess5'=>20);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'pager', 'perpage', 'datasource', 'datasource2', 'variable', 'useedit', 'redirect1', 'redirect2', 'tempstart', 'temp', 'tempend', 'noitem', 'mess1', 'mess2', 'mess3', 'mess4', 'mess5');
	
	
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
			throw new WgException("UsersTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelUsersTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('UsersTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('UsersTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('UsersTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in UsersTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in UsersTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set UsersTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set UsersTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set UsersTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(2) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set UsersTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1) unsigned
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set UsersTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(5) unsigned
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set UsersTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> smallint(3) unsigned
	 * 
	 * @name getDatasource
	 * @return smallint
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set UsersTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource2 -> smallint(3) unsigned
	 * 
	 * @name getDatasource2
	 * @return smallint
	 */
	public function getDatasource2() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set UsersTemplatesModel::getDatasource2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getDatasource2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable -> varchar(80)
	 * 
	 * @name getVariable
	 * @return varchar
	 */
	public function getVariable() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set UsersTemplatesModel::getVariable', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getVariable', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of useedit -> tinyint(1) unsigned
	 * 
	 * @name getUseedit
	 * @return tinyint
	 */
	public function getUseedit() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set UsersTemplatesModel::getUseedit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getUseedit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect1 -> varchar(255)
	 * 
	 * @name getRedirect1
	 * @return varchar
	 */
	public function getRedirect1() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set UsersTemplatesModel::getRedirect1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getRedirect1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect2 -> varchar(255)
	 * 
	 * @name getRedirect2
	 * @return varchar
	 */
	public function getRedirect2() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set UsersTemplatesModel::getRedirect2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getRedirect2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempstart -> text
	 * 
	 * @name getTempstart
	 * @return text
	 */
	public function getTempstart() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set UsersTemplatesModel::getTempstart', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getTempstart', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp -> text
	 * 
	 * @name getTemp
	 * @return text
	 */
	public function getTemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set UsersTemplatesModel::getTemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getTemp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempend -> text
	 * 
	 * @name getTempend
	 * @return text
	 */
	public function getTempend() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set UsersTemplatesModel::getTempend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getTempend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of noitem -> text
	 * 
	 * @name getNoitem
	 * @return text
	 */
	public function getNoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set UsersTemplatesModel::getNoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getNoitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess1 -> varchar(255)
	 * 
	 * @name getMess1
	 * @return varchar
	 */
	public function getMess1() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set UsersTemplatesModel::getMess1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getMess1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess2 -> varchar(255)
	 * 
	 * @name getMess2
	 * @return varchar
	 */
	public function getMess2() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set UsersTemplatesModel::getMess2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getMess2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess3 -> varchar(255)
	 * 
	 * @name getMess3
	 * @return varchar
	 */
	public function getMess3() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set UsersTemplatesModel::getMess3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getMess3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess4 -> varchar(255)
	 * 
	 * @name getMess4
	 * @return varchar
	 */
	public function getMess4() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set UsersTemplatesModel::getMess4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getMess4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess5 -> varchar(255)
	 * 
	 * @name getMess5
	 * @return varchar
	 */
	public function getMess5() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set UsersTemplatesModel::getMess5', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From UsersTemplatesModel::getMess5', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: UsersTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: UsersTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table users_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new UsersTemplatesModel());
	}
	
	/**
	 * Select one item function from table users_templates
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
		$ret = DbModel::doSelect($conn, new UsersTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'UsersTemplatesModel')) return $ret[0];
		else {
			$class = new UsersTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table users_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new UsersTemplatesModel());
	}
	
	/**
	 * Basic pager function from table users_templates
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
		return DbModel::doPager($conn, new UsersTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table users_templates
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
		return (int) DbModel::doAffected($conn, new UsersTemplatesModel());
	}
	
	/**
	 * Basic update function for table users_templates
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
		$af = (int) DbModel::doAffected($conn, new UsersTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table users_templates
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
		return (int) DbModel::doInsert($conn, new UsersTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table users_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table users_templates
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
	 * Drop table function for table users_templates
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