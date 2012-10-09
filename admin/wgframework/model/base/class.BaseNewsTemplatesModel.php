<?php
/**
 * Database class for table news_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/news_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 18:42:01
 */

class BaseNewsTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'news_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`news_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`news_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`news_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`news_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`news_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * pager -> tinyint(1) unsigned
	 */
	const FULL_PAGER = '`news_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * perpage -> int(4) unsigned
	 */
	const FULL_PERPAGE = '`news_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * addid -> int(11)
	 */
	const FULL_ADDID = '`news_templates`.`addid`';
	
	const COL_ADDID = 'addid';
	
	/**
	 * datasource -> int(3) unsigned
	 */
	const FULL_DATASOURCE = '`news_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * tempbegin -> text
	 */
	const FULL_TEMPBEGIN = '`news_templates`.`tempbegin`';
	
	const COL_TEMPBEGIN = 'tempbegin';
	
	/**
	 * tempitem -> text
	 */
	const FULL_TEMPITEM = '`news_templates`.`tempitem`';
	
	const COL_TEMPITEM = 'tempitem';
	
	/**
	 * tempend -> text
	 */
	const FULL_TEMPEND = '`news_templates`.`tempend`';
	
	const COL_TEMPEND = 'tempend';
	
	/**
	 * notemp -> text
	 */
	const FULL_NOTEMP = '`news_templates`.`notemp`';
	
	const COL_NOTEMP = 'notemp';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`news_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `news_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Pager'=>4, 'Perpage'=>5, 'Addid'=>6, 'Datasource'=>7, 'Tempbegin'=>8, 'Tempitem'=>9, 'Tempend'=>10, 'Notemp'=>11);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`news_templates`.`Id`'=>0, '`news_templates`.`Name`'=>1, '`news_templates`.`Identifier`'=>2, '`news_templates`.`Temptype`'=>3, '`news_templates`.`Pager`'=>4, '`news_templates`.`Perpage`'=>5, '`news_templates`.`Addid`'=>6, '`news_templates`.`Datasource`'=>7, '`news_templates`.`Tempbegin`'=>8, '`news_templates`.`Tempitem`'=>9, '`news_templates`.`Tempend`'=>10, '`news_templates`.`Notemp`'=>11);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'pager'=>4, 'perpage'=>5, 'addid'=>6, 'datasource'=>7, 'tempbegin'=>8, 'tempitem'=>9, 'tempend'=>10, 'notemp'=>11);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'pager', 'perpage', 'addid', 'datasource', 'tempbegin', 'tempitem', 'tempend', 'notemp');
	
	
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
			throw new WgException("NewsTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getIdentifier', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1) unsigned
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) $this->_result[4];
			else parent::throwGetColException('Not set NewsTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(4) unsigned
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) $this->_result[5];
			else parent::throwGetColException('Not set NewsTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addid -> int(11)
	 * 
	 * @name getAddid
	 * @return int
	 */
	public function getAddid() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set NewsTemplatesModel::getAddid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getAddid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> int(3) unsigned
	 * 
	 * @name getDatasource
	 * @return int
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set NewsTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempbegin -> text
	 * 
	 * @name getTempbegin
	 * @return text
	 */
	public function getTempbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set NewsTemplatesModel::getTempbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getTempbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempitem -> text
	 * 
	 * @name getTempitem
	 * @return text
	 */
	public function getTempitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set NewsTemplatesModel::getTempitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getTempitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempend -> text
	 * 
	 * @name getTempend
	 * @return text
	 */
	public function getTempend() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set NewsTemplatesModel::getTempend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getTempend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notemp -> text
	 * 
	 * @name getNotemp
	 * @return text
	 */
	public function getNotemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set NewsTemplatesModel::getNotemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsTemplatesModel::getNotemp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table news_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsTemplatesModel());
	}
	
	/** Left join select function from table news_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsTemplatesModel());
	}
	
	/** Right join select function from table news_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsTemplatesModel());
	}
	
	/** Inner join select function from table news_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsTemplatesModel());
	}
	
	/**
	 * Select one item function from table news_templates
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
		$ret = DbModel::doSelect($conn, new NewsTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsTemplatesModel')) return $ret[0];
		else {
			$class = new NewsTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table news_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsTemplatesModel());
	}
	
	/**
	 * Basic pager function from table news_templates
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
		return DbModel::doPager($conn, new NewsTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table news_templates
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
		return (int) DbModel::doAffected($conn, new NewsTemplatesModel());
	}
	
	/**
	 * Basic update function for table news_templates
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
		$af = (int) DbModel::doAffected($conn, new NewsTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table news_templates
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
		return (int) DbModel::doInsert($conn, new NewsTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table news_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table news_templates
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
	 * Drop table function for table news_templates
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