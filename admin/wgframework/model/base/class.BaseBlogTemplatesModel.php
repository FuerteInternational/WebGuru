<?php
/**
 * Database class for table blog_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/blog_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:58
 */

class BaseBlogTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'blog_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`blog_templates`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`blog_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`blog_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`blog_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`blog_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * dateformat -> varchar(255)
	 */
	const FULL_DATEFORMAT = '`blog_templates`.`dateformat`';
	
	const COL_DATEFORMAT = 'dateformat';
	
	/**
	 * datasource -> varchar(200)
	 */
	const FULL_DATASOURCE = '`blog_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * limit -> int(4) unsigned
	 */
	const FULL_LIMIT = '`blog_templates`.`limit`';
	
	const COL_LIMIT = 'limit';
	
	/**
	 * pager -> tinyint(1) unsigned
	 */
	const FULL_PAGER = '`blog_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * search -> tinyint(1) unsigned
	 */
	const FULL_SEARCH = '`blog_templates`.`search`';
	
	const COL_SEARCH = 'search';
	
	/**
	 * variable -> varchar(50)
	 */
	const FULL_VARIABLE = '`blog_templates`.`variable`';
	
	const COL_VARIABLE = 'variable';
	
	/**
	 * someid -> varchar(255)
	 */
	const FULL_SOMEID = '`blog_templates`.`someid`';
	
	const COL_SOMEID = 'someid';
	
	/**
	 * useedit -> tinyint(1)
	 */
	const FULL_USEEDIT = '`blog_templates`.`useedit`';
	
	const COL_USEEDIT = 'useedit';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`blog_templates`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * titem -> text
	 */
	const FULL_TITEM = '`blog_templates`.`titem`';
	
	const COL_TITEM = 'titem';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`blog_templates`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * tnoitem -> text
	 */
	const FULL_TNOITEM = '`blog_templates`.`tnoitem`';
	
	const COL_TNOITEM = 'tnoitem';
	
	/**
	 * tnoperm -> text
	 */
	const FULL_TNOPERM = '`blog_templates`.`tnoperm`';
	
	const COL_TNOPERM = 'tnoperm';
	
	/**
	 * blog_cats_id -> int(11)
	 */
	const FULL_BLOG_CATS_ID = '`blog_templates`.`blog_cats_id`';
	
	const COL_BLOG_CATS_ID = 'blog_cats_id';
	
	/**
	 * blog_id -> int(11) unsigned
	 */
	const FULL_BLOG_ID = '`blog_templates`.`blog_id`';
	
	const COL_BLOG_ID = 'blog_id';
	
	/**
	 * system_websites_id -> int(4) unsigned
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`blog_templates`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	/**
	 * error1 -> varchar(255)
	 */
	const FULL_ERROR1 = '`blog_templates`.`error1`';
	
	const COL_ERROR1 = 'error1';
	
	/**
	 * error2 -> varchar(255)
	 */
	const FULL_ERROR2 = '`blog_templates`.`error2`';
	
	const COL_ERROR2 = 'error2';
	
	/**
	 * error3 -> varchar(255)
	 */
	const FULL_ERROR3 = '`blog_templates`.`error3`';
	
	const COL_ERROR3 = 'error3';
	
	/**
	 * error4 -> varchar(255)
	 */
	const FULL_ERROR4 = '`blog_templates`.`error4`';
	
	const COL_ERROR4 = 'error4';
	
	/**
	 * error5 -> varchar(255)
	 */
	const FULL_ERROR5 = '`blog_templates`.`error5`';
	
	const COL_ERROR5 = 'error5';
	
	/**
	 * error6 -> varchar(255)
	 */
	const FULL_ERROR6 = '`blog_templates`.`error6`';
	
	const COL_ERROR6 = 'error6';
	
	/**
	 * redirect1 -> varchar(255)
	 */
	const FULL_REDIRECT1 = '`blog_templates`.`redirect1`';
	
	const COL_REDIRECT1 = 'redirect1';
	
	/**
	 * redirect2 -> varchar(255)
	 */
	const FULL_REDIRECT2 = '`blog_templates`.`redirect2`';
	
	const COL_REDIRECT2 = 'redirect2';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`blog_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `blog_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Dateformat'=>4, 'Datasource'=>5, 'Limit'=>6, 'Pager'=>7, 'Search'=>8, 'Variable'=>9, 'Someid'=>10, 'Useedit'=>11, 'Tbegin'=>12, 'Titem'=>13, 'Tend'=>14, 'Tnoitem'=>15, 'Tnoperm'=>16, 'BlogCatsId'=>17, 'BlogId'=>18, 'SystemWebsitesId'=>19, 'Error1'=>20, 'Error2'=>21, 'Error3'=>22, 'Error4'=>23, 'Error5'=>24, 'Error6'=>25, 'Redirect1'=>26, 'Redirect2'=>27);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`blog_templates`.`Id`'=>0, '`blog_templates`.`Name`'=>1, '`blog_templates`.`Identifier`'=>2, '`blog_templates`.`Temptype`'=>3, '`blog_templates`.`Dateformat`'=>4, '`blog_templates`.`Datasource`'=>5, '`blog_templates`.`Limit`'=>6, '`blog_templates`.`Pager`'=>7, '`blog_templates`.`Search`'=>8, '`blog_templates`.`Variable`'=>9, '`blog_templates`.`Someid`'=>10, '`blog_templates`.`Useedit`'=>11, '`blog_templates`.`Tbegin`'=>12, '`blog_templates`.`Titem`'=>13, '`blog_templates`.`Tend`'=>14, '`blog_templates`.`Tnoitem`'=>15, '`blog_templates`.`Tnoperm`'=>16, '`blog_templates`.`BlogCatsId`'=>17, '`blog_templates`.`BlogId`'=>18, '`blog_templates`.`SystemWebsitesId`'=>19, '`blog_templates`.`Error1`'=>20, '`blog_templates`.`Error2`'=>21, '`blog_templates`.`Error3`'=>22, '`blog_templates`.`Error4`'=>23, '`blog_templates`.`Error5`'=>24, '`blog_templates`.`Error6`'=>25, '`blog_templates`.`Redirect1`'=>26, '`blog_templates`.`Redirect2`'=>27);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'dateformat'=>4, 'datasource'=>5, 'limit'=>6, 'pager'=>7, 'search'=>8, 'variable'=>9, 'someid'=>10, 'useedit'=>11, 'tbegin'=>12, 'titem'=>13, 'tend'=>14, 'tnoitem'=>15, 'tnoperm'=>16, 'blog_cats_id'=>17, 'blog_id'=>18, 'system_websites_id'=>19, 'error1'=>20, 'error2'=>21, 'error3'=>22, 'error4'=>23, 'error5'=>24, 'error6'=>25, 'redirect1'=>26, 'redirect2'=>27);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'dateformat', 'datasource', 'limit', 'pager', 'search', 'variable', 'someid', 'useedit', 'tbegin', 'titem', 'tend', 'tnoitem', 'tnoperm', 'blog_cats_id', 'blog_id', 'system_websites_id', 'error1', 'error2', 'error3', 'error4', 'error5', 'error6', 'redirect1', 'redirect2');
	
	
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
			throw new WgException("BlogTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelBlogTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('BlogTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlogTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('BlogTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlogTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in BlogTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in BlogTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BlogTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BlogTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BlogTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat -> varchar(255)
	 * 
	 * @name getDateformat
	 * @return varchar
	 */
	public function getDateformat() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set BlogTemplatesModel::getDateformat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getDateformat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> varchar(200)
	 * 
	 * @name getDatasource
	 * @return varchar
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set BlogTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit -> int(4) unsigned
	 * 
	 * @name getLimit
	 * @return int
	 */
	public function getLimit() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set BlogTemplatesModel::getLimit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getLimit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1) unsigned
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set BlogTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of search -> tinyint(1) unsigned
	 * 
	 * @name getSearch
	 * @return tinyint
	 */
	public function getSearch() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) $this->_result[8];
			else parent::throwGetColException('Not set BlogTemplatesModel::getSearch', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getSearch', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable -> varchar(50)
	 * 
	 * @name getVariable
	 * @return varchar
	 */
	public function getVariable() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set BlogTemplatesModel::getVariable', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getVariable', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of someid -> varchar(255)
	 * 
	 * @name getSomeid
	 * @return varchar
	 */
	public function getSomeid() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set BlogTemplatesModel::getSomeid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getSomeid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of useedit -> tinyint(1)
	 * 
	 * @name getUseedit
	 * @return tinyint
	 */
	public function getUseedit() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) $this->_result[11];
			else parent::throwGetColException('Not set BlogTemplatesModel::getUseedit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getUseedit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem -> text
	 * 
	 * @name getTitem
	 * @return text
	 */
	public function getTitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tnoitem -> text
	 * 
	 * @name getTnoitem
	 * @return text
	 */
	public function getTnoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTnoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTnoitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tnoperm -> text
	 * 
	 * @name getTnoperm
	 * @return text
	 */
	public function getTnoperm() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set BlogTemplatesModel::getTnoperm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getTnoperm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of blog_cats_id -> int(11)
	 * 
	 * @name getBlogCatsId
	 * @return int
	 */
	public function getBlogCatsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (int) $this->_result[17];
			else parent::throwGetColException('Not set BlogTemplatesModel::getBlogCatsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getBlogCatsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of blog_id -> int(11) unsigned
	 * 
	 * @name getBlogId
	 * @return int
	 */
	public function getBlogId() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (int) $this->_result[18];
			else parent::throwGetColException('Not set BlogTemplatesModel::getBlogId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getBlogId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4) unsigned
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (int) $this->_result[19];
			else parent::throwGetColException('Not set BlogTemplatesModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getSystemWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error1 -> varchar(255)
	 * 
	 * @name getError1
	 * @return varchar
	 */
	public function getError1() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error2 -> varchar(255)
	 * 
	 * @name getError2
	 * @return varchar
	 */
	public function getError2() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error3 -> varchar(255)
	 * 
	 * @name getError3
	 * @return varchar
	 */
	public function getError3() {
		if ((bool) $this->_result) {
			if (array_key_exists(22, $this->_result)) return (string) $this->_result[22];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error4 -> varchar(255)
	 * 
	 * @name getError4
	 * @return varchar
	 */
	public function getError4() {
		if ((bool) $this->_result) {
			if (array_key_exists(23, $this->_result)) return (string) $this->_result[23];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error5 -> varchar(255)
	 * 
	 * @name getError5
	 * @return varchar
	 */
	public function getError5() {
		if ((bool) $this->_result) {
			if (array_key_exists(24, $this->_result)) return (string) $this->_result[24];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError5', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError5', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of error6 -> varchar(255)
	 * 
	 * @name getError6
	 * @return varchar
	 */
	public function getError6() {
		if ((bool) $this->_result) {
			if (array_key_exists(25, $this->_result)) return (string) $this->_result[25];
			else parent::throwGetColException('Not set BlogTemplatesModel::getError6', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getError6', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect1 -> varchar(255)
	 * 
	 * @name getRedirect1
	 * @return varchar
	 */
	public function getRedirect1() {
		if ((bool) $this->_result) {
			if (array_key_exists(26, $this->_result)) return (string) $this->_result[26];
			else parent::throwGetColException('Not set BlogTemplatesModel::getRedirect1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getRedirect1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect2 -> varchar(255)
	 * 
	 * @name getRedirect2
	 * @return varchar
	 */
	public function getRedirect2() {
		if ((bool) $this->_result) {
			if (array_key_exists(27, $this->_result)) return (string) $this->_result[27];
			else parent::throwGetColException('Not set BlogTemplatesModel::getRedirect2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogTemplatesModel::getRedirect2', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: BlogTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: BlogTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table blog_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new BlogTemplatesModel());
	}
	
	/** Left join select function from table blog_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new BlogTemplatesModel());
	}
	
	/** Right join select function from table blog_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new BlogTemplatesModel());
	}
	
	/** Inner join select function from table blog_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new BlogTemplatesModel());
	}
	
	/**
	 * Select one item function from table blog_templates
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
		$ret = DbModel::doSelect($conn, new BlogTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'BlogTemplatesModel')) return $ret[0];
		else {
			$class = new BlogTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table blog_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new BlogTemplatesModel());
	}
	
	/**
	 * Basic pager function from table blog_templates
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
		return DbModel::doPager($conn, new BlogTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table blog_templates
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
		return (int) DbModel::doAffected($conn, new BlogTemplatesModel());
	}
	
	/**
	 * Basic update function for table blog_templates
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
		$af = (int) DbModel::doAffected($conn, new BlogTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table blog_templates
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
		return (int) DbModel::doInsert($conn, new BlogTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table blog_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table blog_templates
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
	 * Drop table function for table blog_templates
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