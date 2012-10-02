<?php
/**
 * Database class for table comments_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/comments_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class BaseCommentsTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'comments_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`comments_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`comments_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`comments_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`comments_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`comments_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * pager -> tinyint(1) unsigned
	 */
	const FULL_PAGER = '`comments_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * comments_groups_id -> int(4) unsigned
	 */
	const FULL_COMMENTS_GROUPS_ID = '`comments_templates`.`comments_groups_id`';
	
	const COL_COMMENTS_GROUPS_ID = 'comments_groups_id';
	
	/**
	 * perpage -> int(4) unsigned
	 */
	const FULL_PERPAGE = '`comments_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * variable -> varchar(50)
	 */
	const FULL_VARIABLE = '`comments_templates`.`variable`';
	
	const COL_VARIABLE = 'variable';
	
	/**
	 * datasource -> int(3) unsigned
	 */
	const FULL_DATASOURCE = '`comments_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * noidsyserror -> varchar(255)
	 */
	const FULL_NOIDSYSERROR = '`comments_templates`.`noidsyserror`';
	
	const COL_NOIDSYSERROR = 'noidsyserror';
	
	/**
	 * emptyauthor -> varchar(255)
	 */
	const FULL_EMPTYAUTHOR = '`comments_templates`.`emptyauthor`';
	
	const COL_EMPTYAUTHOR = 'emptyauthor';
	
	/**
	 * emptyemail -> varchar(255)
	 */
	const FULL_EMPTYEMAIL = '`comments_templates`.`emptyemail`';
	
	const COL_EMPTYEMAIL = 'emptyemail';
	
	/**
	 * emptycomment -> varchar(255)
	 */
	const FULL_EMPTYCOMMENT = '`comments_templates`.`emptycomment`';
	
	const COL_EMPTYCOMMENT = 'emptycomment';
	
	/**
	 * tempbegin -> text
	 */
	const FULL_TEMPBEGIN = '`comments_templates`.`tempbegin`';
	
	const COL_TEMPBEGIN = 'tempbegin';
	
	/**
	 * tempitem -> text
	 */
	const FULL_TEMPITEM = '`comments_templates`.`tempitem`';
	
	const COL_TEMPITEM = 'tempitem';
	
	/**
	 * tempend -> text
	 */
	const FULL_TEMPEND = '`comments_templates`.`tempend`';
	
	const COL_TEMPEND = 'tempend';
	
	/**
	 * notemp -> text
	 */
	const FULL_NOTEMP = '`comments_templates`.`notemp`';
	
	const COL_NOTEMP = 'notemp';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`comments_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `comments_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Pager'=>4, 'CommentsGroupsId'=>5, 'Perpage'=>6, 'Variable'=>7, 'Datasource'=>8, 'Noidsyserror'=>9, 'Emptyauthor'=>10, 'Emptyemail'=>11, 'Emptycomment'=>12, 'Tempbegin'=>13, 'Tempitem'=>14, 'Tempend'=>15, 'Notemp'=>16);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`comments_templates`.`Id`'=>0, '`comments_templates`.`Name`'=>1, '`comments_templates`.`Identifier`'=>2, '`comments_templates`.`Temptype`'=>3, '`comments_templates`.`Pager`'=>4, '`comments_templates`.`CommentsGroupsId`'=>5, '`comments_templates`.`Perpage`'=>6, '`comments_templates`.`Variable`'=>7, '`comments_templates`.`Datasource`'=>8, '`comments_templates`.`Noidsyserror`'=>9, '`comments_templates`.`Emptyauthor`'=>10, '`comments_templates`.`Emptyemail`'=>11, '`comments_templates`.`Emptycomment`'=>12, '`comments_templates`.`Tempbegin`'=>13, '`comments_templates`.`Tempitem`'=>14, '`comments_templates`.`Tempend`'=>15, '`comments_templates`.`Notemp`'=>16);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'pager'=>4, 'comments_groups_id'=>5, 'perpage'=>6, 'variable'=>7, 'datasource'=>8, 'noidsyserror'=>9, 'emptyauthor'=>10, 'emptyemail'=>11, 'emptycomment'=>12, 'tempbegin'=>13, 'tempitem'=>14, 'tempend'=>15, 'notemp'=>16);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'pager', 'comments_groups_id', 'perpage', 'variable', 'datasource', 'noidsyserror', 'emptyauthor', 'emptyemail', 'emptycomment', 'tempbegin', 'tempitem', 'tempend', 'notemp');
	
	
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
			throw new WgException("CommentsTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCommentsTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CommentsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CommentsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CommentsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CommentsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CommentsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CommentsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CommentsTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CommentsTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CommentsTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getTemptype', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CommentsTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of comments_groups_id -> int(4) unsigned
	 * 
	 * @name getCommentsGroupsId
	 * @return int
	 */
	public function getCommentsGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getCommentsGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getCommentsGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(4) unsigned
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable -> varchar(50)
	 * 
	 * @name getVariable
	 * @return varchar
	 */
	public function getVariable() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getVariable', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getVariable', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> int(3) unsigned
	 * 
	 * @name getDatasource
	 * @return int
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of noidsyserror -> varchar(255)
	 * 
	 * @name getNoidsyserror
	 * @return varchar
	 */
	public function getNoidsyserror() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getNoidsyserror', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getNoidsyserror', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of emptyauthor -> varchar(255)
	 * 
	 * @name getEmptyauthor
	 * @return varchar
	 */
	public function getEmptyauthor() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getEmptyauthor', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getEmptyauthor', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of emptyemail -> varchar(255)
	 * 
	 * @name getEmptyemail
	 * @return varchar
	 */
	public function getEmptyemail() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getEmptyemail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getEmptyemail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of emptycomment -> varchar(255)
	 * 
	 * @name getEmptycomment
	 * @return varchar
	 */
	public function getEmptycomment() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getEmptycomment', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getEmptycomment', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempbegin -> text
	 * 
	 * @name getTempbegin
	 * @return text
	 */
	public function getTempbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getTempbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getTempbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempitem -> text
	 * 
	 * @name getTempitem
	 * @return text
	 */
	public function getTempitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getTempitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getTempitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempend -> text
	 * 
	 * @name getTempend
	 * @return text
	 */
	public function getTempend() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getTempend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getTempend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notemp -> text
	 * 
	 * @name getNotemp
	 * @return text
	 */
	public function getNotemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set CommentsTemplatesModel::getNotemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsTemplatesModel::getNotemp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CommentsTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CommentsTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table comments_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CommentsTemplatesModel());
	}
	
	/** Left join select function from table comments_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsTemplatesModel());
	}
	
	/** Right join select function from table comments_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsTemplatesModel());
	}
	
	/** Inner join select function from table comments_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsTemplatesModel());
	}
	
	/**
	 * Select one item function from table comments_templates
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
		$ret = DbModel::doSelect($conn, new CommentsTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CommentsTemplatesModel')) return $ret[0];
		else {
			$class = new CommentsTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table comments_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CommentsTemplatesModel());
	}
	
	/**
	 * Basic pager function from table comments_templates
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
		return DbModel::doPager($conn, new CommentsTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table comments_templates
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
		return (int) DbModel::doAffected($conn, new CommentsTemplatesModel());
	}
	
	/**
	 * Basic update function for table comments_templates
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
		$af = (int) DbModel::doAffected($conn, new CommentsTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table comments_templates
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
		return (int) DbModel::doInsert($conn, new CommentsTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table comments_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table comments_templates
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
	 * Drop table function for table comments_templates
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