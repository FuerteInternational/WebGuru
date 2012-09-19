<?php
/**
 * Database class for table search_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_templates';
	
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
	 * id_st -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_st';
	
	const FULL_PRIMARY_KEY = '`search_templates`.`id_st`';
	
	/**
	 * id_st -> int(8) unsigned
	 */
	const FULL_ID_ST = '`search_templates`.`id_st`';
	
	const COL_ID_ST = 'id_st';
	
	/**
	 * name_st -> varchar(255)
	 */
	const FULL_NAME_ST = '`search_templates`.`name_st`';
	
	const COL_NAME_ST = 'name_st';
	
	/**
	 * identifier_st -> varchar(255)
	 */
	const FULL_IDENTIFIER_ST = '`search_templates`.`identifier_st`';
	
	const COL_IDENTIFIER_ST = 'identifier_st';
	
	/**
	 * begin_st -> text
	 */
	const FULL_BEGIN_ST = '`search_templates`.`begin_st`';
	
	const COL_BEGIN_ST = 'begin_st';
	
	/**
	 * item_st -> text
	 */
	const FULL_ITEM_ST = '`search_templates`.`item_st`';
	
	const COL_ITEM_ST = 'item_st';
	
	/**
	 * end_st -> text
	 */
	const FULL_END_ST = '`search_templates`.`end_st`';
	
	const COL_END_ST = 'end_st';
	
	/**
	 * search_st -> text
	 */
	const FULL_SEARCH_ST = '`search_templates`.`search_st`';
	
	const COL_SEARCH_ST = 'search_st';
	
	/**
	 * pager_st -> tinyint(1)
	 */
	const FULL_PAGER_ST = '`search_templates`.`pager_st`';
	
	const COL_PAGER_ST = 'pager_st';
	
	/**
	 * perpage_st -> int(8)
	 */
	const FULL_PERPAGE_ST = '`search_templates`.`perpage_st`';
	
	const COL_PERPAGE_ST = 'perpage_st';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_templates`.`id_st`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_templates`.`id_st`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSt'=>0, 'NameSt'=>1, 'IdentifierSt'=>2, 'BeginSt'=>3, 'ItemSt'=>4, 'EndSt'=>5, 'SearchSt'=>6, 'PagerSt'=>7, 'PerpageSt'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_templates`.`IdSt`'=>0, '`search_templates`.`NameSt`'=>1, '`search_templates`.`IdentifierSt`'=>2, '`search_templates`.`BeginSt`'=>3, '`search_templates`.`ItemSt`'=>4, '`search_templates`.`EndSt`'=>5, '`search_templates`.`SearchSt`'=>6, '`search_templates`.`PagerSt`'=>7, '`search_templates`.`PerpageSt`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_st'=>0, 'name_st'=>1, 'identifier_st'=>2, 'begin_st'=>3, 'item_st'=>4, 'end_st'=>5, 'search_st'=>6, 'pager_st'=>7, 'perpage_st'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_st', 'name_st', 'identifier_st', 'begin_st', 'item_st', 'end_st', 'search_st', 'pager_st', 'perpage_st');
	
	
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
			throw new WgException("SearchTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_st -> int(8) unsigned
	 * 
	 * @name getIdSt
	 * @return int
	 */
	public function getIdSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchTemplatesModel::getIdSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getIdSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_st -> varchar(255)
	 * 
	 * @name getNameSt
	 * @return varchar
	 */
	public function getNameSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchTemplatesModel::getNameSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getNameSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_st -> varchar(255)
	 * 
	 * @name getIdentifierSt
	 * @return varchar
	 */
	public function getIdentifierSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchTemplatesModel::getIdentifierSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getIdentifierSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin_st -> text
	 * 
	 * @name getBeginSt
	 * @return text
	 */
	public function getBeginSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchTemplatesModel::getBeginSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getBeginSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item_st -> text
	 * 
	 * @name getItemSt
	 * @return text
	 */
	public function getItemSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchTemplatesModel::getItemSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getItemSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end_st -> text
	 * 
	 * @name getEndSt
	 * @return text
	 */
	public function getEndSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchTemplatesModel::getEndSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getEndSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of search_st -> text
	 * 
	 * @name getSearchSt
	 * @return text
	 */
	public function getSearchSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SearchTemplatesModel::getSearchSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getSearchSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager_st -> tinyint(1)
	 * 
	 * @name getPagerSt
	 * @return tinyint
	 */
	public function getPagerSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SearchTemplatesModel::getPagerSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getPagerSt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage_st -> int(8)
	 * 
	 * @name getPerpageSt
	 * @return int
	 */
	public function getPerpageSt() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchTemplatesModel::getPerpageSt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchTemplatesModel::getPerpageSt', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchTemplatesModel());
	}
	
	/**
	 * Select one item function from table search_templates
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
		$ret = DbModel::doSelect($conn, new SearchTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchTemplatesModel')) return $ret[0];
		else {
			$class = new SearchTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchTemplatesModel());
	}
	
	/**
	 * Basic pager function from table search_templates
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
		return DbModel::doPager($conn, new SearchTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_templates
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
		return (int) DbModel::doAffected($conn, new SearchTemplatesModel());
	}
	
	/**
	 * Basic update function for table search_templates
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
		$af = (int) DbModel::doAffected($conn, new SearchTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_templates
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
		return (int) DbModel::doInsert($conn, new SearchTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table search_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_templates
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
	 * Drop table function for table search_templates
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