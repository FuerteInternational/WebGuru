<?php
/**
 * Database class for table crawler_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/crawler_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:31:15
 */

class BaseCrawlerTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'crawler_templates';
	
	/**
	 * engine
	 */
	const TABLE_ENGINE = 'MyISAM';
	
	/**
	 * collation
	 */
	const TABLE_COLLATION = 'latin1_swedish_ci';
	
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
	
	const FULL_PRIMARY_KEY = '`crawler_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`crawler_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`crawler_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`crawler_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * typetemp -> int(2)
	 */
	const FULL_TYPETEMP = '`crawler_templates`.`typetemp`';
	
	const COL_TYPETEMP = 'typetemp';
	
	/**
	 * begintemp -> text
	 */
	const FULL_BEGINTEMP = '`crawler_templates`.`begintemp`';
	
	const COL_BEGINTEMP = 'begintemp';
	
	/**
	 * item -> text
	 */
	const FULL_ITEM = '`crawler_templates`.`item`';
	
	const COL_ITEM = 'item';
	
	/**
	 * endtemp -> text
	 */
	const FULL_ENDTEMP = '`crawler_templates`.`endtemp`';
	
	const COL_ENDTEMP = 'endtemp';
	
	/**
	 * search -> text
	 */
	const FULL_SEARCH = '`crawler_templates`.`search`';
	
	const COL_SEARCH = 'search';
	
	/**
	 * notemp -> text
	 */
	const FULL_NOTEMP = '`crawler_templates`.`notemp`';
	
	const COL_NOTEMP = 'notemp';
	
	/**
	 * pager -> tinyint(1)
	 */
	const FULL_PAGER = '`crawler_templates`.`pager`';
	
	const COL_PAGER = 'pager';
	
	/**
	 * perpage -> int(8)
	 */
	const FULL_PERPAGE = '`crawler_templates`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`crawler_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `crawler_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Typetemp'=>3, 'Begintemp'=>4, 'Item'=>5, 'Endtemp'=>6, 'Search'=>7, 'Notemp'=>8, 'Pager'=>9, 'Perpage'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`crawler_templates`.`Id`'=>0, '`crawler_templates`.`Name`'=>1, '`crawler_templates`.`Identifier`'=>2, '`crawler_templates`.`Typetemp`'=>3, '`crawler_templates`.`Begintemp`'=>4, '`crawler_templates`.`Item`'=>5, '`crawler_templates`.`Endtemp`'=>6, '`crawler_templates`.`Search`'=>7, '`crawler_templates`.`Notemp`'=>8, '`crawler_templates`.`Pager`'=>9, '`crawler_templates`.`Perpage`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'typetemp'=>3, 'begintemp'=>4, 'item'=>5, 'endtemp'=>6, 'search'=>7, 'notemp'=>8, 'pager'=>9, 'perpage'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'typetemp', 'begintemp', 'item', 'endtemp', 'search', 'notemp', 'pager', 'perpage');
	
	
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
			throw new WgException("CrawlerTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCrawlerTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CrawlerTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CrawlerTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CrawlerTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CrawlerTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of typetemp -> int(2)
	 * 
	 * @name getTypetemp
	 * @return int
	 */
	public function getTypetemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getTypetemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getTypetemp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begintemp -> text
	 * 
	 * @name getBegintemp
	 * @return text
	 */
	public function getBegintemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getBegintemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getBegintemp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item -> text
	 * 
	 * @name getItem
	 * @return text
	 */
	public function getItem() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getItem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getItem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of endtemp -> text
	 * 
	 * @name getEndtemp
	 * @return text
	 */
	public function getEndtemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getEndtemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getEndtemp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of search -> text
	 * 
	 * @name getSearch
	 * @return text
	 */
	public function getSearch() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getSearch', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getSearch', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notemp -> text
	 * 
	 * @name getNotemp
	 * @return text
	 */
	public function getNotemp() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getNotemp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getNotemp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1)
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getPager', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(8)
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CrawlerTemplatesModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerTemplatesModel::getPerpage', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CrawlerTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CrawlerTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table crawler_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CrawlerTemplatesModel());
	}
	
	/**
	 * Select one item function from table crawler_templates
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
		$ret = DbModel::doSelect($conn, new CrawlerTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CrawlerTemplatesModel')) return $ret[0];
		else {
			$class = new CrawlerTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table crawler_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CrawlerTemplatesModel());
	}
	
	/**
	 * Basic pager function from table crawler_templates
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
		return DbModel::doPager($conn, new CrawlerTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table crawler_templates
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
		return (int) DbModel::doAffected($conn, new CrawlerTemplatesModel());
	}
	
	/**
	 * Basic update function for table crawler_templates
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
		$af = (int) DbModel::doAffected($conn, new CrawlerTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table crawler_templates
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
		return (int) DbModel::doInsert($conn, new CrawlerTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table crawler_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table crawler_templates
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
	 * Drop table function for table crawler_templates
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