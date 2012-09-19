<?php
/**
 * Database class for table projects_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/projects_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 19:01:37
 */

class BaseProjectsTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'projects_templates';
	
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
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`projects_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`projects_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`projects_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`projects_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * pager -> tinyint(1)
	 */
	const FULL_PAGER = '`projects_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * perpage -> int(4)
	 */
	const FULL_PERPAGE = '`projects_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * search -> tinyint(1)
	 */
	const FULL_SEARCH = '`projects_templates`.`search`';
	
	const COL_SEARCH = 'search';
	
	/**
	 * variable1 -> varchar(50)
	 */
	const FULL_VARIABLE1 = '`projects_templates`.`variable1`';
	
	const COL_VARIABLE1 = 'variable1';
	
	/**
	 * variable2 -> varchar(50)
	 */
	const FULL_VARIABLE2 = '`projects_templates`.`variable2`';
	
	const COL_VARIABLE2 = 'variable2';
	
	/**
	 * dateformat -> varchar(100)
	 */
	const FULL_DATEFORMAT = '`projects_templates`.`dateformat`';
	
	const COL_DATEFORMAT = 'dateformat';
	
	/**
	 * linkformat -> varchar(255)
	 */
	const FULL_LINKFORMAT = '`projects_templates`.`linkformat`';
	
	const COL_LINKFORMAT = 'linkformat';
	
	/**
	 * seo -> tinyint(1)
	 */
	const FULL_SEO = '`projects_templates`.`seo`';
	
	const COL_SEO = 'seo';
	
	/**
	 * datasource -> tinyint(1) unsigned
	 */
	const FULL_DATASOURCE = '`projects_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * projects_categories_id -> int(11) unsigned
	 */
	const FULL_PROJECTS_CATEGORIES_ID = '`projects_templates`.`projects_categories_id`';
	
	const COL_PROJECTS_CATEGORIES_ID = 'projects_categories_id';
	
	/**
	 * sorting -> varchar(255)
	 */
	const FULL_SORTING = '`projects_templates`.`sorting`';
	
	const COL_SORTING = 'sorting';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`projects_templates`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * titem1 -> text
	 */
	const FULL_TITEM1 = '`projects_templates`.`titem1`';
	
	const COL_TITEM1 = 'titem1';
	
	/**
	 * titem2 -> text
	 */
	const FULL_TITEM2 = '`projects_templates`.`titem2`';
	
	const COL_TITEM2 = 'titem2';
	
	/**
	 * titem3 -> text
	 */
	const FULL_TITEM3 = '`projects_templates`.`titem3`';
	
	const COL_TITEM3 = 'titem3';
	
	/**
	 * titem4 -> text
	 */
	const FULL_TITEM4 = '`projects_templates`.`titem4`';
	
	const COL_TITEM4 = 'titem4';
	
	/**
	 * titem5 -> text
	 */
	const FULL_TITEM5 = '`projects_templates`.`titem5`';
	
	const COL_TITEM5 = 'titem5';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`projects_templates`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * tnoitem -> text
	 */
	const FULL_TNOITEM = '`projects_templates`.`tnoitem`';
	
	const COL_TNOITEM = 'tnoitem';
	
	/**
	 * temptype -> tinyint(1)
	 */
	const FULL_TEMPTYPE = '`projects_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`projects_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `projects_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Pager'=>3, 'Perpage'=>4, 'Search'=>5, 'Variable1'=>6, 'Variable2'=>7, 'Dateformat'=>8, 'Linkformat'=>9, 'Seo'=>10, 'Datasource'=>11, 'ProjectsCategoriesId'=>12, 'Sorting'=>13, 'Tbegin'=>14, 'Titem1'=>15, 'Titem2'=>16, 'Titem3'=>17, 'Titem4'=>18, 'Titem5'=>19, 'Tend'=>20, 'Tnoitem'=>21, 'Temptype'=>22);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`projects_templates`.`Id`'=>0, '`projects_templates`.`Name`'=>1, '`projects_templates`.`Identifier`'=>2, '`projects_templates`.`Pager`'=>3, '`projects_templates`.`Perpage`'=>4, '`projects_templates`.`Search`'=>5, '`projects_templates`.`Variable1`'=>6, '`projects_templates`.`Variable2`'=>7, '`projects_templates`.`Dateformat`'=>8, '`projects_templates`.`Linkformat`'=>9, '`projects_templates`.`Seo`'=>10, '`projects_templates`.`Datasource`'=>11, '`projects_templates`.`ProjectsCategoriesId`'=>12, '`projects_templates`.`Sorting`'=>13, '`projects_templates`.`Tbegin`'=>14, '`projects_templates`.`Titem1`'=>15, '`projects_templates`.`Titem2`'=>16, '`projects_templates`.`Titem3`'=>17, '`projects_templates`.`Titem4`'=>18, '`projects_templates`.`Titem5`'=>19, '`projects_templates`.`Tend`'=>20, '`projects_templates`.`Tnoitem`'=>21, '`projects_templates`.`Temptype`'=>22);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'pager'=>3, 'perpage'=>4, 'search'=>5, 'variable1'=>6, 'variable2'=>7, 'dateformat'=>8, 'linkformat'=>9, 'seo'=>10, 'datasource'=>11, 'projects_categories_id'=>12, 'sorting'=>13, 'tbegin'=>14, 'titem1'=>15, 'titem2'=>16, 'titem3'=>17, 'titem4'=>18, 'titem5'=>19, 'tend'=>20, 'tnoitem'=>21, 'temptype'=>22);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'pager', 'perpage', 'search', 'variable1', 'variable2', 'dateformat', 'linkformat', 'seo', 'datasource', 'projects_categories_id', 'sorting', 'tbegin', 'titem1', 'titem2', 'titem3', 'titem4', 'titem5', 'tend', 'tnoitem', 'temptype');
	
	
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
			throw new WgException("ProjectsTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectsTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ProjectsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ProjectsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ProjectsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1)
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(4)
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of search -> tinyint(1)
	 * 
	 * @name getSearch
	 * @return tinyint
	 */
	public function getSearch() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getSearch', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getSearch', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable1 -> varchar(50)
	 * 
	 * @name getVariable1
	 * @return varchar
	 */
	public function getVariable1() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getVariable1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getVariable1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable2 -> varchar(50)
	 * 
	 * @name getVariable2
	 * @return varchar
	 */
	public function getVariable2() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getVariable2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getVariable2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat -> varchar(100)
	 * 
	 * @name getDateformat
	 * @return varchar
	 */
	public function getDateformat() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getDateformat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getDateformat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of linkformat -> varchar(255)
	 * 
	 * @name getLinkformat
	 * @return varchar
	 */
	public function getLinkformat() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getLinkformat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getLinkformat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of seo -> tinyint(1)
	 * 
	 * @name getSeo
	 * @return tinyint
	 */
	public function getSeo() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getSeo', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getSeo', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> tinyint(1) unsigned
	 * 
	 * @name getDatasource
	 * @return tinyint
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of projects_categories_id -> int(11) unsigned
	 * 
	 * @name getProjectsCategoriesId
	 * @return int
	 */
	public function getProjectsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getProjectsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getProjectsCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sorting -> varchar(255)
	 * 
	 * @name getSorting
	 * @return varchar
	 */
	public function getSorting() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getSorting', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getSorting', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem1 -> text
	 * 
	 * @name getTitem1
	 * @return text
	 */
	public function getTitem1() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTitem1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTitem1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem2 -> text
	 * 
	 * @name getTitem2
	 * @return text
	 */
	public function getTitem2() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTitem2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTitem2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem3 -> text
	 * 
	 * @name getTitem3
	 * @return text
	 */
	public function getTitem3() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTitem3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTitem3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem4 -> text
	 * 
	 * @name getTitem4
	 * @return text
	 */
	public function getTitem4() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTitem4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTitem4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem5 -> text
	 * 
	 * @name getTitem5
	 * @return text
	 */
	public function getTitem5() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTitem5', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTitem5', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tnoitem -> text
	 * 
	 * @name getTnoitem
	 * @return text
	 */
	public function getTnoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTnoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTnoitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1)
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(22, $this->_result)) return (string) $this->_result[22];
			else parent::throwGetColException('Not set ProjectsTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsTemplatesModel::getTemptype', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectsTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectsTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table projects_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ProjectsTemplatesModel());
	}
	
	/**
	 * Select one item function from table projects_templates
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
		$ret = DbModel::doSelect($conn, new ProjectsTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectsTemplatesModel')) return $ret[0];
		else {
			$class = new ProjectsTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table projects_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectsTemplatesModel());
	}
	
	/**
	 * Basic pager function from table projects_templates
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
		return DbModel::doPager($conn, new ProjectsTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table projects_templates
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
		return (int) DbModel::doAffected($conn, new ProjectsTemplatesModel());
	}
	
	/**
	 * Basic update function for table projects_templates
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
		$af = (int) DbModel::doAffected($conn, new ProjectsTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table projects_templates
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
		return (int) DbModel::doInsert($conn, new ProjectsTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table projects_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table projects_templates
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
	 * Drop table function for table projects_templates
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