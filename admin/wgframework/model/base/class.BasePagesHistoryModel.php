<?php
/**
 * Database class for table pages_history
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_history
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class BasePagesHistoryModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_history';
	
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
	 * id -> int(10) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`pages_history`.`id`';
	
	/**
	 * id -> int(10) unsigned
	 */
	const FULL_ID = '`pages_history`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`pages_history`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * system_users_id -> int(8) unsigned
	 */
	const FULL_SYSTEM_USERS_ID = '`pages_history`.`system_users_id`';
	
	const COL_SYSTEM_USERS_ID = 'system_users_id';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`pages_history`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * heading1 -> varchar(255)
	 */
	const FULL_HEADING1 = '`pages_history`.`heading1`';
	
	const COL_HEADING1 = 'heading1';
	
	/**
	 * heading2 -> varchar(255)
	 */
	const FULL_HEADING2 = '`pages_history`.`heading2`';
	
	const COL_HEADING2 = 'heading2';
	
	/**
	 * heading3 -> varchar(255)
	 */
	const FULL_HEADING3 = '`pages_history`.`heading3`';
	
	const COL_HEADING3 = 'heading3';
	
	/**
	 * rewrite -> varchar(255)
	 */
	const FULL_REWRITE = '`pages_history`.`rewrite`';
	
	const COL_REWRITE = 'rewrite';
	
	/**
	 * keywords -> text
	 */
	const FULL_KEYWORDS = '`pages_history`.`keywords`';
	
	const COL_KEYWORDS = 'keywords';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`pages_history`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * parentid -> int(11) unsigned
	 */
	const FULL_PARENTID = '`pages_history`.`parentid`';
	
	const COL_PARENTID = 'parentid';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`pages_history`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * page -> longtext
	 */
	const FULL_PAGE = '`pages_history`.`page`';
	
	const COL_PAGE = 'page';
	
	/**
	 * pages_id -> int(11) unsigned
	 */
	const FULL_PAGES_ID = '`pages_history`.`pages_id`';
	
	const COL_PAGES_ID = 'pages_id';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_history`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_history`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Added'=>1, 'SystemUsersId'=>2, 'Title'=>3, 'Heading1'=>4, 'Heading2'=>5, 'Heading3'=>6, 'Rewrite'=>7, 'Keywords'=>8, 'Description'=>9, 'Parentid'=>10, 'Head'=>11, 'Page'=>12, 'PagesId'=>13);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_history`.`Id`'=>0, '`pages_history`.`Added`'=>1, '`pages_history`.`SystemUsersId`'=>2, '`pages_history`.`Title`'=>3, '`pages_history`.`Heading1`'=>4, '`pages_history`.`Heading2`'=>5, '`pages_history`.`Heading3`'=>6, '`pages_history`.`Rewrite`'=>7, '`pages_history`.`Keywords`'=>8, '`pages_history`.`Description`'=>9, '`pages_history`.`Parentid`'=>10, '`pages_history`.`Head`'=>11, '`pages_history`.`Page`'=>12, '`pages_history`.`PagesId`'=>13);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'added'=>1, 'system_users_id'=>2, 'title'=>3, 'heading1'=>4, 'heading2'=>5, 'heading3'=>6, 'rewrite'=>7, 'keywords'=>8, 'description'=>9, 'parentid'=>10, 'head'=>11, 'page'=>12, 'pages_id'=>13);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'added', 'system_users_id', 'title', 'heading1', 'heading2', 'heading3', 'rewrite', 'keywords', 'description', 'parentid', 'head', 'page', 'pages_id');
	
	
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
			throw new WgException("PagesHistory could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesHistory::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesHistoryModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesHistoryModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesHistoryModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesHistoryModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesHistoryModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesHistoryModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PagesHistoryModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) strtotime($this->_result[1]);
			else parent::throwGetColException('Not set PagesHistoryModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_users_id -> int(8) unsigned
	 * 
	 * @name getSystemUsersId
	 * @return int
	 */
	public function getSystemUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesHistoryModel::getSystemUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getSystemUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PagesHistoryModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading1 -> varchar(255)
	 * 
	 * @name getHeading1
	 * @return varchar
	 */
	public function getHeading1() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesHistoryModel::getHeading1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getHeading1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading2 -> varchar(255)
	 * 
	 * @name getHeading2
	 * @return varchar
	 */
	public function getHeading2() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesHistoryModel::getHeading2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getHeading2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading3 -> varchar(255)
	 * 
	 * @name getHeading3
	 * @return varchar
	 */
	public function getHeading3() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesHistoryModel::getHeading3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getHeading3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rewrite -> varchar(255)
	 * 
	 * @name getRewrite
	 * @return varchar
	 */
	public function getRewrite() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesHistoryModel::getRewrite', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getRewrite', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords -> text
	 * 
	 * @name getKeywords
	 * @return text
	 */
	public function getKeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesHistoryModel::getKeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getKeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PagesHistoryModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parentid -> int(11) unsigned
	 * 
	 * @name getParentid
	 * @return int
	 */
	public function getParentid() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PagesHistoryModel::getParentid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getParentid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set PagesHistoryModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of page -> longtext
	 * 
	 * @name getPage
	 * @return longtext
	 */
	public function getPage() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set PagesHistoryModel::getPage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getPage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_id -> int(11) unsigned
	 * 
	 * @name getPagesId
	 * @return int
	 */
	public function getPagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set PagesHistoryModel::getPagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesHistoryModel::getPagesId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesHistoryModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesHistoryModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_history
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesHistoryModel());
	}
	
	/**
	 * Select one item function from table pages_history
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
		$ret = DbModel::doSelect($conn, new PagesHistoryModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesHistoryModel')) return $ret[0];
		else {
			$class = new PagesHistoryModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_history
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesHistoryModel());
	}
	
	/**
	 * Basic pager function from table pages_history
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
		return DbModel::doPager($conn, new PagesHistoryModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_history
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
		return (int) DbModel::doAffected($conn, new PagesHistoryModel());
	}
	
	/**
	 * Basic update function for table pages_history
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
		$af = (int) DbModel::doAffected($conn, new PagesHistoryModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_history
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
		return (int) DbModel::doInsert($conn, new PagesHistoryModel());
	}
	
	/**
	 * Basic reader create function from table pages_history
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_history
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
	 * Drop table function for table pages_history
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