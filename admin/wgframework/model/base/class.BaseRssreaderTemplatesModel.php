<?php
/**
 * Database class for table rssreader_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/rssreader_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:59
 */

class BaseRssreaderTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'rssreader_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`rssreader_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`rssreader_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`rssreader_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`rssreader_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1)
	 */
	const FULL_TEMPTYPE = '`rssreader_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * rssreader_urls -> int(11)
	 */
	const FULL_RSSREADER_URLS = '`rssreader_templates`.`rssreader_urls`';
	
	const COL_RSSREADER_URLS = 'rssreader_urls';
	
	/**
	 * limit -> int(6)
	 */
	const FULL_LIMIT = '`rssreader_templates`.`limit`';
	
	const COL_LIMIT = 'limit';
	
	/**
	 * ascending -> tinyint(1)
	 */
	const FULL_ASCENDING = '`rssreader_templates`.`ascending`';
	
	const COL_ASCENDING = 'ascending';
	
	/**
	 * cache -> tinyint(1)
	 */
	const FULL_CACHE = '`rssreader_templates`.`cache`';
	
	const COL_CACHE = 'cache';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`rssreader_templates`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * tdetail -> text
	 */
	const FULL_TDETAIL = '`rssreader_templates`.`tdetail`';
	
	const COL_TDETAIL = 'tdetail';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`rssreader_templates`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * tnoitem -> text
	 */
	const FULL_TNOITEM = '`rssreader_templates`.`tnoitem`';
	
	const COL_TNOITEM = 'tnoitem';
	
	/**
	 * system_websites_id -> int(4) unsigned
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`rssreader_templates`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`rssreader_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `rssreader_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'RssreaderUrls'=>4, 'Limit'=>5, 'Ascending'=>6, 'Cache'=>7, 'Tbegin'=>8, 'Tdetail'=>9, 'Tend'=>10, 'Tnoitem'=>11, 'SystemWebsitesId'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`rssreader_templates`.`Id`'=>0, '`rssreader_templates`.`Name`'=>1, '`rssreader_templates`.`Identifier`'=>2, '`rssreader_templates`.`Temptype`'=>3, '`rssreader_templates`.`RssreaderUrls`'=>4, '`rssreader_templates`.`Limit`'=>5, '`rssreader_templates`.`Ascending`'=>6, '`rssreader_templates`.`Cache`'=>7, '`rssreader_templates`.`Tbegin`'=>8, '`rssreader_templates`.`Tdetail`'=>9, '`rssreader_templates`.`Tend`'=>10, '`rssreader_templates`.`Tnoitem`'=>11, '`rssreader_templates`.`SystemWebsitesId`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'rssreader_urls'=>4, 'limit'=>5, 'ascending'=>6, 'cache'=>7, 'tbegin'=>8, 'tdetail'=>9, 'tend'=>10, 'tnoitem'=>11, 'system_websites_id'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'rssreader_urls', 'limit', 'ascending', 'cache', 'tbegin', 'tdetail', 'tend', 'tnoitem', 'system_websites_id');
	
	
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
			throw new WgException("RssreaderTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelRssreaderTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('RssreaderTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('RssreaderTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('RssreaderTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('RssreaderTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in RssreaderTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in RssreaderTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1)
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rssreader_urls -> int(11)
	 * 
	 * @name getRssreaderUrls
	 * @return int
	 */
	public function getRssreaderUrls() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) $this->_result[4];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getRssreaderUrls', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getRssreaderUrls', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit -> int(6)
	 * 
	 * @name getLimit
	 * @return int
	 */
	public function getLimit() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) $this->_result[5];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getLimit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getLimit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ascending -> tinyint(1)
	 * 
	 * @name getAscending
	 * @return tinyint
	 */
	public function getAscending() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getAscending', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getAscending', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cache -> tinyint(1)
	 * 
	 * @name getCache
	 * @return tinyint
	 */
	public function getCache() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getCache', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getCache', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tdetail -> text
	 * 
	 * @name getTdetail
	 * @return text
	 */
	public function getTdetail() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getTdetail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getTdetail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tnoitem -> text
	 * 
	 * @name getTnoitem
	 * @return text
	 */
	public function getTnoitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getTnoitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getTnoitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4) unsigned
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) $this->_result[12];
			else parent::throwGetColException('Not set RssreaderTemplatesModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From RssreaderTemplatesModel::getSystemWebsitesId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: RssreaderTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: RssreaderTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table rssreader_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new RssreaderTemplatesModel());
	}
	
	/** Left join select function from table rssreader_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new RssreaderTemplatesModel());
	}
	
	/** Right join select function from table rssreader_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new RssreaderTemplatesModel());
	}
	
	/** Inner join select function from table rssreader_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new RssreaderTemplatesModel());
	}
	
	/**
	 * Select one item function from table rssreader_templates
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
		$ret = DbModel::doSelect($conn, new RssreaderTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'RssreaderTemplatesModel')) return $ret[0];
		else {
			$class = new RssreaderTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table rssreader_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new RssreaderTemplatesModel());
	}
	
	/**
	 * Basic pager function from table rssreader_templates
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
		return DbModel::doPager($conn, new RssreaderTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table rssreader_templates
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
		return (int) DbModel::doAffected($conn, new RssreaderTemplatesModel());
	}
	
	/**
	 * Basic update function for table rssreader_templates
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
		$af = (int) DbModel::doAffected($conn, new RssreaderTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table rssreader_templates
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
		return (int) DbModel::doInsert($conn, new RssreaderTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table rssreader_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table rssreader_templates
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
	 * Drop table function for table rssreader_templates
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