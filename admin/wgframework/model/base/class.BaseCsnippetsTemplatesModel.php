<?php
/**
 * Database class for table csnippets_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/csnippets_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:58
 */

class BaseCsnippetsTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'csnippets_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`csnippets_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`csnippets_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`csnippets_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`csnippets_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`csnippets_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * datasource -> varchar(255)
	 */
	const FULL_DATASOURCE = '`csnippets_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * csnippets_categories_id -> int(11) unsigned
	 */
	const FULL_CSNIPPETS_CATEGORIES_ID = '`csnippets_templates`.`csnippets_categories_id`';
	
	const COL_CSNIPPETS_CATEGORIES_ID = 'csnippets_categories_id';
	
	/**
	 * variable -> varchar(150)
	 */
	const FULL_VARIABLE = '`csnippets_templates`.`variable`';
	
	const COL_VARIABLE = 'variable';
	
	/**
	 * errmess1 -> varchar(255)
	 */
	const FULL_ERRMESS1 = '`csnippets_templates`.`errmess1`';
	
	const COL_ERRMESS1 = 'errmess1';
	
	/**
	 * errmess2 -> varchar(255)
	 */
	const FULL_ERRMESS2 = '`csnippets_templates`.`errmess2`';
	
	const COL_ERRMESS2 = 'errmess2';
	
	/**
	 * errmess3 -> varchar(255)
	 */
	const FULL_ERRMESS3 = '`csnippets_templates`.`errmess3`';
	
	const COL_ERRMESS3 = 'errmess3';
	
	/**
	 * errmess4 -> varchar(255)
	 */
	const FULL_ERRMESS4 = '`csnippets_templates`.`errmess4`';
	
	const COL_ERRMESS4 = 'errmess4';
	
	/**
	 * useseo -> tinyint(1)
	 */
	const FULL_USESEO = '`csnippets_templates`.`useseo`';
	
	const COL_USESEO = 'useseo';
	
	/**
	 * issearch -> tinyint(1)
	 */
	const FULL_ISSEARCH = '`csnippets_templates`.`issearch`';
	
	const COL_ISSEARCH = 'issearch';
	
	/**
	 * pager -> tinyint(1)
	 */
	const FULL_PAGER = '`csnippets_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * perpage -> int(11)
	 */
	const FULL_PERPAGE = '`csnippets_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`csnippets_templates`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * titem -> text
	 */
	const FULL_TITEM = '`csnippets_templates`.`titem`';
	
	const COL_TITEM = 'titem';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`csnippets_templates`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * fofred -> tinyint(1)
	 */
	const FULL_FOFRED = '`csnippets_templates`.`fofred`';
	
	const COL_FOFRED = 'fofred';
	
	/**
	 * noitem -> text
	 */
	const FULL_NOITEM = '`csnippets_templates`.`noitem`';
	
	const COL_NOITEM = 'noitem';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`csnippets_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `csnippets_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Temptype'=>1, 'Name'=>2, 'Identifier'=>3, 'Datasource'=>4, 'CsnippetsCategoriesId'=>5, 'Variable'=>6, 'Errmess1'=>7, 'Errmess2'=>8, 'Errmess3'=>9, 'Errmess4'=>10, 'Useseo'=>11, 'Issearch'=>12, 'Pager'=>13, 'Perpage'=>14, 'Tbegin'=>15, 'Titem'=>16, 'Tend'=>17, 'Fofred'=>18, 'Noitem'=>19);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`csnippets_templates`.`Id`'=>0, '`csnippets_templates`.`Temptype`'=>1, '`csnippets_templates`.`Name`'=>2, '`csnippets_templates`.`Identifier`'=>3, '`csnippets_templates`.`Datasource`'=>4, '`csnippets_templates`.`CsnippetsCategoriesId`'=>5, '`csnippets_templates`.`Variable`'=>6, '`csnippets_templates`.`Errmess1`'=>7, '`csnippets_templates`.`Errmess2`'=>8, '`csnippets_templates`.`Errmess3`'=>9, '`csnippets_templates`.`Errmess4`'=>10, '`csnippets_templates`.`Useseo`'=>11, '`csnippets_templates`.`Issearch`'=>12, '`csnippets_templates`.`Pager`'=>13, '`csnippets_templates`.`Perpage`'=>14, '`csnippets_templates`.`Tbegin`'=>15, '`csnippets_templates`.`Titem`'=>16, '`csnippets_templates`.`Tend`'=>17, '`csnippets_templates`.`Fofred`'=>18, '`csnippets_templates`.`Noitem`'=>19);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'temptype'=>1, 'name'=>2, 'identifier'=>3, 'datasource'=>4, 'csnippets_categories_id'=>5, 'variable'=>6, 'errmess1'=>7, 'errmess2'=>8, 'errmess3'=>9, 'errmess4'=>10, 'useseo'=>11, 'issearch'=>12, 'pager'=>13, 'perpage'=>14, 'tbegin'=>15, 'titem'=>16, 'tend'=>17, 'fofred'=>18, 'noitem'=>19);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'temptype', 'name', 'identifier', 'datasource', 'csnippets_categories_id', 'variable', 'errmess1', 'errmess2', 'errmess3', 'errmess4', 'useseo', 'issearch', 'pager', 'perpage', 'tbegin', 'titem', 'tend', 'fofred', 'noitem');
	
	
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
			throw new WgException("CsnippetsTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCsnippetsTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CsnippetsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CsnippetsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CsnippetsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CsnippetsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CsnippetsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CsnippetsTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> varchar(255)
	 * 
	 * @name getDatasource
	 * @return varchar
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of csnippets_categories_id -> int(11) unsigned
	 * 
	 * @name getCsnippetsCategoriesId
	 * @return int
	 */
	public function getCsnippetsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) $this->_result[5];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getCsnippetsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getCsnippetsCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable -> varchar(150)
	 * 
	 * @name getVariable
	 * @return varchar
	 */
	public function getVariable() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getVariable', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getVariable', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess1 -> varchar(255)
	 * 
	 * @name getErrmess1
	 * @return varchar
	 */
	public function getErrmess1() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getErrmess1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getErrmess1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess2 -> varchar(255)
	 * 
	 * @name getErrmess2
	 * @return varchar
	 */
	public function getErrmess2() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getErrmess2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getErrmess2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess3 -> varchar(255)
	 * 
	 * @name getErrmess3
	 * @return varchar
	 */
	public function getErrmess3() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getErrmess3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getErrmess3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess4 -> varchar(255)
	 * 
	 * @name getErrmess4
	 * @return varchar
	 */
	public function getErrmess4() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getErrmess4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getErrmess4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of useseo -> tinyint(1)
	 * 
	 * @name getUseseo
	 * @return tinyint
	 */
	public function getUseseo() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) $this->_result[11];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getUseseo', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getUseseo', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of issearch -> tinyint(1)
	 * 
	 * @name getIssearch
	 * @return tinyint
	 */
	public function getIssearch() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) $this->_result[12];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getIssearch', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getIssearch', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1)
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) $this->_result[13];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(11)
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (int) $this->_result[14];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem -> text
	 * 
	 * @name getTitem
	 * @return text
	 */
	public function getTitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getTitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getTitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of fofred -> tinyint(1)
	 * 
	 * @name getFofred
	 * @return tinyint
	 */
	public function getFofred() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (int) $this->_result[18];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getFofred', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getFofred', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of noitem -> text
	 * 
	 * @name getNoitem
	 * @return text
	 */
	public function getNoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set CsnippetsTemplatesModel::getNoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CsnippetsTemplatesModel::getNoitem', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CsnippetsTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CsnippetsTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table csnippets_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CsnippetsTemplatesModel());
	}
	
	/** Left join select function from table csnippets_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CsnippetsTemplatesModel());
	}
	
	/** Right join select function from table csnippets_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CsnippetsTemplatesModel());
	}
	
	/** Inner join select function from table csnippets_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CsnippetsTemplatesModel());
	}
	
	/**
	 * Select one item function from table csnippets_templates
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
		$ret = DbModel::doSelect($conn, new CsnippetsTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CsnippetsTemplatesModel')) return $ret[0];
		else {
			$class = new CsnippetsTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table csnippets_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CsnippetsTemplatesModel());
	}
	
	/**
	 * Basic pager function from table csnippets_templates
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
		return DbModel::doPager($conn, new CsnippetsTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table csnippets_templates
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
		return (int) DbModel::doAffected($conn, new CsnippetsTemplatesModel());
	}
	
	/**
	 * Basic update function for table csnippets_templates
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
		$af = (int) DbModel::doAffected($conn, new CsnippetsTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table csnippets_templates
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
		return (int) DbModel::doInsert($conn, new CsnippetsTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table csnippets_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table csnippets_templates
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
	 * Drop table function for table csnippets_templates
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