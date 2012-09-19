<?php
/**
 * Database class for table system_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/system_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:26
 */

class BaseSystemTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'system_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`system_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`system_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`system_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`system_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * module -> varchar(60)
	 */
	const FULL_MODULE = '`system_templates`.`module`';
	
	const COL_MODULE = 'module';
	
	/**
	 * pager -> tinyint(1) unsigned
	 */
	const FULL_PAGER = '`system_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * limit -> int(4) unsigned
	 */
	const FULL_LIMIT = '`system_templates`.`limit`';
	
	const COL_LIMIT = 'limit';
	
	/**
	 * temptype -> int(2) unsigned
	 */
	const FULL_TEMPTYPE = '`system_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * datasource -> int(6) unsigned
	 */
	const FULL_DATASOURCE = '`system_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * group1 -> int(11) unsigned
	 */
	const FULL_GROUP1 = '`system_templates`.`group1`';
	
	const COL_GROUP1 = 'group1';
	
	/**
	 * group2 -> int(11) unsigned
	 */
	const FULL_GROUP2 = '`system_templates`.`group2`';
	
	const COL_GROUP2 = 'group2';
	
	/**
	 * group3 -> int(11) unsigned
	 */
	const FULL_GROUP3 = '`system_templates`.`group3`';
	
	const COL_GROUP3 = 'group3';
	
	/**
	 * var1 -> varchar(45)
	 */
	const FULL_VAR1 = '`system_templates`.`var1`';
	
	const COL_VAR1 = 'var1';
	
	/**
	 * var2 -> varchar(45)
	 */
	const FULL_VAR2 = '`system_templates`.`var2`';
	
	const COL_VAR2 = 'var2';
	
	/**
	 * var3 -> varchar(45)
	 */
	const FULL_VAR3 = '`system_templates`.`var3`';
	
	const COL_VAR3 = 'var3';
	
	/**
	 * begin1 -> text
	 */
	const FULL_BEGIN1 = '`system_templates`.`begin1`';
	
	const COL_BEGIN1 = 'begin1';
	
	/**
	 * item1 -> text
	 */
	const FULL_ITEM1 = '`system_templates`.`item1`';
	
	const COL_ITEM1 = 'item1';
	
	/**
	 * end1 -> text
	 */
	const FULL_END1 = '`system_templates`.`end1`';
	
	const COL_END1 = 'end1';
	
	/**
	 * notemp1 -> text
	 */
	const FULL_NOTEMP1 = '`system_templates`.`notemp1`';
	
	const COL_NOTEMP1 = 'notemp1';
	
	/**
	 * begin2 -> text
	 */
	const FULL_BEGIN2 = '`system_templates`.`begin2`';
	
	const COL_BEGIN2 = 'begin2';
	
	/**
	 * item2 -> text
	 */
	const FULL_ITEM2 = '`system_templates`.`item2`';
	
	const COL_ITEM2 = 'item2';
	
	/**
	 * end2 -> text
	 */
	const FULL_END2 = '`system_templates`.`end2`';
	
	const COL_END2 = 'end2';
	
	/**
	 * notemp2 -> text
	 */
	const FULL_NOTEMP2 = '`system_templates`.`notemp2`';
	
	const COL_NOTEMP2 = 'notemp2';
	
	/**
	 * int1 -> int(11) unsigned
	 */
	const FULL_INT1 = '`system_templates`.`int1`';
	
	const COL_INT1 = 'int1';
	
	/**
	 * int2 -> int(11) unsigned
	 */
	const FULL_INT2 = '`system_templates`.`int2`';
	
	const COL_INT2 = 'int2';
	
	/**
	 * int3 -> int(11) unsigned
	 */
	const FULL_INT3 = '`system_templates`.`int3`';
	
	const COL_INT3 = 'int3';
	
	/**
	 * tint1 -> tinyint(1) unsigned
	 */
	const FULL_TINT1 = '`system_templates`.`tint1`';
	
	const COL_TINT1 = 'tint1';
	
	/**
	 * tint2 -> tinyint(1) unsigned
	 */
	const FULL_TINT2 = '`system_templates`.`tint2`';
	
	const COL_TINT2 = 'tint2';
	
	/**
	 * tint3 -> tinyint(1) unsigned
	 */
	const FULL_TINT3 = '`system_templates`.`tint3`';
	
	const COL_TINT3 = 'tint3';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`system_templates`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`system_templates`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`system_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `system_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Module'=>3, 'Pager'=>4, 'Limit'=>5, 'Temptype'=>6, 'Datasource'=>7, 'Group1'=>8, 'Group2'=>9, 'Group3'=>10, 'Var1'=>11, 'Var2'=>12, 'Var3'=>13, 'Begin1'=>14, 'Item1'=>15, 'End1'=>16, 'Notemp1'=>17, 'Begin2'=>18, 'Item2'=>19, 'End2'=>20, 'Notemp2'=>21, 'Int1'=>22, 'Int2'=>23, 'Int3'=>24, 'Tint1'=>25, 'Tint2'=>26, 'Tint3'=>27, 'Added'=>28, 'Changed'=>29);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`system_templates`.`Id`'=>0, '`system_templates`.`Name`'=>1, '`system_templates`.`Identifier`'=>2, '`system_templates`.`Module`'=>3, '`system_templates`.`Pager`'=>4, '`system_templates`.`Limit`'=>5, '`system_templates`.`Temptype`'=>6, '`system_templates`.`Datasource`'=>7, '`system_templates`.`Group1`'=>8, '`system_templates`.`Group2`'=>9, '`system_templates`.`Group3`'=>10, '`system_templates`.`Var1`'=>11, '`system_templates`.`Var2`'=>12, '`system_templates`.`Var3`'=>13, '`system_templates`.`Begin1`'=>14, '`system_templates`.`Item1`'=>15, '`system_templates`.`End1`'=>16, '`system_templates`.`Notemp1`'=>17, '`system_templates`.`Begin2`'=>18, '`system_templates`.`Item2`'=>19, '`system_templates`.`End2`'=>20, '`system_templates`.`Notemp2`'=>21, '`system_templates`.`Int1`'=>22, '`system_templates`.`Int2`'=>23, '`system_templates`.`Int3`'=>24, '`system_templates`.`Tint1`'=>25, '`system_templates`.`Tint2`'=>26, '`system_templates`.`Tint3`'=>27, '`system_templates`.`Added`'=>28, '`system_templates`.`Changed`'=>29);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'module'=>3, 'pager'=>4, 'limit'=>5, 'temptype'=>6, 'datasource'=>7, 'group1'=>8, 'group2'=>9, 'group3'=>10, 'var1'=>11, 'var2'=>12, 'var3'=>13, 'begin1'=>14, 'item1'=>15, 'end1'=>16, 'notemp1'=>17, 'begin2'=>18, 'item2'=>19, 'end2'=>20, 'notemp2'=>21, 'int1'=>22, 'int2'=>23, 'int3'=>24, 'tint1'=>25, 'tint2'=>26, 'tint3'=>27, 'added'=>28, 'changed'=>29);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'module', 'pager', 'limit', 'temptype', 'datasource', 'group1', 'group2', 'group3', 'var1', 'var2', 'var3', 'begin1', 'item1', 'end1', 'notemp1', 'begin2', 'item2', 'end2', 'notemp2', 'int1', 'int2', 'int3', 'tint1', 'tint2', 'tint3', 'added', 'changed');
	
	
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
			throw new WgException("SystemTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSystemTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SystemTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SystemTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SystemTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SystemTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of module -> varchar(60)
	 * 
	 * @name getModule
	 * @return varchar
	 */
	public function getModule() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SystemTemplatesModel::getModule', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getModule', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit -> int(4) unsigned
	 * 
	 * @name getLimit
	 * @return int
	 */
	public function getLimit() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SystemTemplatesModel::getLimit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getLimit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> int(2) unsigned
	 * 
	 * @name getTemptype
	 * @return int
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SystemTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> int(6) unsigned
	 * 
	 * @name getDatasource
	 * @return int
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SystemTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of group1 -> int(11) unsigned
	 * 
	 * @name getGroup1
	 * @return int
	 */
	public function getGroup1() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SystemTemplatesModel::getGroup1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getGroup1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of group2 -> int(11) unsigned
	 * 
	 * @name getGroup2
	 * @return int
	 */
	public function getGroup2() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SystemTemplatesModel::getGroup2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getGroup2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of group3 -> int(11) unsigned
	 * 
	 * @name getGroup3
	 * @return int
	 */
	public function getGroup3() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SystemTemplatesModel::getGroup3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getGroup3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of var1 -> varchar(45)
	 * 
	 * @name getVar1
	 * @return varchar
	 */
	public function getVar1() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SystemTemplatesModel::getVar1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getVar1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of var2 -> varchar(45)
	 * 
	 * @name getVar2
	 * @return varchar
	 */
	public function getVar2() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SystemTemplatesModel::getVar2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getVar2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of var3 -> varchar(45)
	 * 
	 * @name getVar3
	 * @return varchar
	 */
	public function getVar3() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set SystemTemplatesModel::getVar3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getVar3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin1 -> text
	 * 
	 * @name getBegin1
	 * @return text
	 */
	public function getBegin1() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set SystemTemplatesModel::getBegin1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getBegin1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item1 -> text
	 * 
	 * @name getItem1
	 * @return text
	 */
	public function getItem1() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set SystemTemplatesModel::getItem1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getItem1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end1 -> text
	 * 
	 * @name getEnd1
	 * @return text
	 */
	public function getEnd1() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set SystemTemplatesModel::getEnd1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getEnd1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notemp1 -> text
	 * 
	 * @name getNotemp1
	 * @return text
	 */
	public function getNotemp1() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set SystemTemplatesModel::getNotemp1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getNotemp1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin2 -> text
	 * 
	 * @name getBegin2
	 * @return text
	 */
	public function getBegin2() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set SystemTemplatesModel::getBegin2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getBegin2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item2 -> text
	 * 
	 * @name getItem2
	 * @return text
	 */
	public function getItem2() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set SystemTemplatesModel::getItem2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getItem2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end2 -> text
	 * 
	 * @name getEnd2
	 * @return text
	 */
	public function getEnd2() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set SystemTemplatesModel::getEnd2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getEnd2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notemp2 -> text
	 * 
	 * @name getNotemp2
	 * @return text
	 */
	public function getNotemp2() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set SystemTemplatesModel::getNotemp2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getNotemp2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of int1 -> int(11) unsigned
	 * 
	 * @name getInt1
	 * @return int
	 */
	public function getInt1() {
		if ((bool) $this->_result) {
			if (array_key_exists(22, $this->_result)) return (string) $this->_result[22];
			else parent::throwGetColException('Not set SystemTemplatesModel::getInt1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getInt1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of int2 -> int(11) unsigned
	 * 
	 * @name getInt2
	 * @return int
	 */
	public function getInt2() {
		if ((bool) $this->_result) {
			if (array_key_exists(23, $this->_result)) return (string) $this->_result[23];
			else parent::throwGetColException('Not set SystemTemplatesModel::getInt2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getInt2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of int3 -> int(11) unsigned
	 * 
	 * @name getInt3
	 * @return int
	 */
	public function getInt3() {
		if ((bool) $this->_result) {
			if (array_key_exists(24, $this->_result)) return (string) $this->_result[24];
			else parent::throwGetColException('Not set SystemTemplatesModel::getInt3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getInt3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tint1 -> tinyint(1) unsigned
	 * 
	 * @name getTint1
	 * @return tinyint
	 */
	public function getTint1() {
		if ((bool) $this->_result) {
			if (array_key_exists(25, $this->_result)) return (string) $this->_result[25];
			else parent::throwGetColException('Not set SystemTemplatesModel::getTint1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getTint1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tint2 -> tinyint(1) unsigned
	 * 
	 * @name getTint2
	 * @return tinyint
	 */
	public function getTint2() {
		if ((bool) $this->_result) {
			if (array_key_exists(26, $this->_result)) return (string) $this->_result[26];
			else parent::throwGetColException('Not set SystemTemplatesModel::getTint2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getTint2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tint3 -> tinyint(1) unsigned
	 * 
	 * @name getTint3
	 * @return tinyint
	 */
	public function getTint3() {
		if ((bool) $this->_result) {
			if (array_key_exists(27, $this->_result)) return (string) $this->_result[27];
			else parent::throwGetColException('Not set SystemTemplatesModel::getTint3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getTint3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(28, $this->_result)) return (int) strtotime($this->_result[28]);
			else parent::throwGetColException('Not set SystemTemplatesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(29, $this->_result)) return (int) strtotime($this->_result[29]);
			else parent::throwGetColException('Not set SystemTemplatesModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemTemplatesModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SystemTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SystemTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table system_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SystemTemplatesModel());
	}
	
	/**
	 * Select one item function from table system_templates
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
		$ret = DbModel::doSelect($conn, new SystemTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SystemTemplatesModel')) return $ret[0];
		else {
			$class = new SystemTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table system_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SystemTemplatesModel());
	}
	
	/**
	 * Basic pager function from table system_templates
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
		return DbModel::doPager($conn, new SystemTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table system_templates
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
		return (int) DbModel::doAffected($conn, new SystemTemplatesModel());
	}
	
	/**
	 * Basic update function for table system_templates
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
		$af = (int) DbModel::doAffected($conn, new SystemTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table system_templates
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
		return (int) DbModel::doInsert($conn, new SystemTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table system_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table system_templates
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
	 * Drop table function for table system_templates
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