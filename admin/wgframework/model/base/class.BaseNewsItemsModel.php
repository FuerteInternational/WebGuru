<?php
/**
 * Database class for table news_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/news_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseNewsItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'news_items';
	
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
	 * id -> int(10) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`news_items`.`id`';
	
	/**
	 * id -> int(10) unsigned
	 */
	const FULL_ID = '`news_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * news_categories_id -> int(8) unsigned
	 */
	const FULL_NEWS_CATEGORIES_ID = '`news_items`.`news_categories_id`';
	
	const COL_NEWS_CATEGORIES_ID = 'news_categories_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`news_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`news_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`news_items`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`news_items`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * text -> text
	 */
	const FULL_TEXT = '`news_items`.`text`';
	
	const COL_TEXT = 'text';
	
	/**
	 * displayfrom -> datetime
	 */
	const FULL_DISPLAYFROM = '`news_items`.`displayfrom`';
	
	const COL_DISPLAYFROM = 'displayfrom';
	
	/**
	 * displayto -> datetime
	 */
	const FULL_DISPLAYTO = '`news_items`.`displayto`';
	
	const COL_DISPLAYTO = 'displayto';
	
	/**
	 * datefor -> datetime
	 */
	const FULL_DATEFOR = '`news_items`.`datefor`';
	
	const COL_DATEFOR = 'datefor';
	
	/**
	 * system_users_id -> int(8) unsigned
	 */
	const FULL_SYSTEM_USERS_ID = '`news_items`.`system_users_id`';
	
	const COL_SYSTEM_USERS_ID = 'system_users_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`news_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `news_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'NewsCategoriesId'=>1, 'Name'=>2, 'Added'=>3, 'Changed'=>4, 'Head'=>5, 'Text'=>6, 'Displayfrom'=>7, 'Displayto'=>8, 'Datefor'=>9, 'SystemUsersId'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`news_items`.`Id`'=>0, '`news_items`.`NewsCategoriesId`'=>1, '`news_items`.`Name`'=>2, '`news_items`.`Added`'=>3, '`news_items`.`Changed`'=>4, '`news_items`.`Head`'=>5, '`news_items`.`Text`'=>6, '`news_items`.`Displayfrom`'=>7, '`news_items`.`Displayto`'=>8, '`news_items`.`Datefor`'=>9, '`news_items`.`SystemUsersId`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'news_categories_id'=>1, 'name'=>2, 'added'=>3, 'changed'=>4, 'head'=>5, 'text'=>6, 'displayfrom'=>7, 'displayto'=>8, 'datefor'=>9, 'system_users_id'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'news_categories_id', 'name', 'added', 'changed', 'head', 'text', 'displayfrom', 'displayto', 'datefor', 'system_users_id');
	
	
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
			throw new WgException("NewsItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(10) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of news_categories_id -> int(8) unsigned
	 * 
	 * @name getNewsCategoriesId
	 * @return int
	 */
	public function getNewsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set NewsItemsModel::getNewsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getNewsCategoriesId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set NewsItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set NewsItemsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set NewsItemsModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text -> text
	 * 
	 * @name getText
	 * @return text
	 */
	public function getText() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set NewsItemsModel::getText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getText', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of displayfrom -> datetime
	 * 
	 * @name getDisplayfrom
	 * @return datetime
	 */
	public function getDisplayfrom() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set NewsItemsModel::getDisplayfrom', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getDisplayfrom', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of displayto -> datetime
	 * 
	 * @name getDisplayto
	 * @return datetime
	 */
	public function getDisplayto() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set NewsItemsModel::getDisplayto', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getDisplayto', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datefor -> datetime
	 * 
	 * @name getDatefor
	 * @return datetime
	 */
	public function getDatefor() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set NewsItemsModel::getDatefor', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getDatefor', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_users_id -> int(8) unsigned
	 * 
	 * @name getSystemUsersId
	 * @return int
	 */
	public function getSystemUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set NewsItemsModel::getSystemUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsItemsModel::getSystemUsersId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table news_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsItemsModel());
	}
	
	/** Left join select function from table news_items
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsItemsModel());
	}
	
	/** Right join select function from table news_items
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsItemsModel());
	}
	
	/** Inner join select function from table news_items
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new NewsItemsModel());
	}
	
	/**
	 * Select one item function from table news_items
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
		$ret = DbModel::doSelect($conn, new NewsItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsItemsModel')) return $ret[0];
		else {
			$class = new NewsItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table news_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsItemsModel());
	}
	
	/**
	 * Basic pager function from table news_items
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
		return DbModel::doPager($conn, new NewsItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table news_items
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
		return (int) DbModel::doAffected($conn, new NewsItemsModel());
	}
	
	/**
	 * Basic update function for table news_items
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
		$af = (int) DbModel::doAffected($conn, new NewsItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table news_items
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
		return (int) DbModel::doInsert($conn, new NewsItemsModel());
	}
	
	/**
	 * Basic reader create function from table news_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table news_items
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
	 * Drop table function for table news_items
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