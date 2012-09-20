<?php
/**
 * Database class for table crawler_cached
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/crawler_cached
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:55
 */

class BaseCrawlerCachedModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'crawler_cached';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`crawler_cached`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`crawler_cached`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * addr -> text
	 */
	const FULL_ADDR = '`crawler_cached`.`addr`';
	
	const COL_ADDR = 'addr';
	
	/**
	 * root -> varchar(255)
	 */
	const FULL_ROOT = '`crawler_cached`.`root`';
	
	const COL_ROOT = 'root';
	
	/**
	 * crawler_websites_id -> int(8)
	 */
	const FULL_CRAWLER_WEBSITES_ID = '`crawler_cached`.`crawler_websites_id`';
	
	const COL_CRAWLER_WEBSITES_ID = 'crawler_websites_id';
	
	/**
	 * level -> int(4)
	 */
	const FULL_LEVEL = '`crawler_cached`.`level`';
	
	const COL_LEVEL = 'level';
	
	/**
	 * html -> text
	 */
	const FULL_HTML = '`crawler_cached`.`html`';
	
	const COL_HTML = 'html';
	
	/**
	 * text -> text
	 */
	const FULL_TEXT = '`crawler_cached`.`text`';
	
	const COL_TEXT = 'text';
	
	/**
	 * links -> text
	 */
	const FULL_LINKS = '`crawler_cached`.`links`';
	
	const COL_LINKS = 'links';
	
	/**
	 * title -> text
	 */
	const FULL_TITLE = '`crawler_cached`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * h1 -> text
	 */
	const FULL_H1 = '`crawler_cached`.`h1`';
	
	const COL_H1 = 'h1';
	
	/**
	 * keywords -> text
	 */
	const FULL_KEYWORDS = '`crawler_cached`.`keywords`';
	
	const COL_KEYWORDS = 'keywords';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`crawler_cached`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`crawler_cached`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`crawler_cached`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * cached -> datetime
	 */
	const FULL_CACHED = '`crawler_cached`.`cached`';
	
	const COL_CACHED = 'cached';
	
	/**
	 * cid -> int(11)
	 */
	const FULL_CID = '`crawler_cached`.`cid`';
	
	const COL_CID = 'cid';
	
	/**
	 * ilinks -> int(11)
	 */
	const FULL_ILINKS = '`crawler_cached`.`ilinks`';
	
	const COL_ILINKS = 'ilinks';
	
	/**
	 * elinks -> int(11)
	 */
	const FULL_ELINKS = '`crawler_cached`.`elinks`';
	
	const COL_ELINKS = 'elinks';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`crawler_cached`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `crawler_cached`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Addr'=>1, 'Root'=>2, 'CrawlerWebsitesId'=>3, 'Level'=>4, 'Html'=>5, 'Text'=>6, 'Links'=>7, 'Title'=>8, 'H1'=>9, 'Keywords'=>10, 'Description'=>11, 'Added'=>12, 'Changed'=>13, 'Cached'=>14, 'Cid'=>15, 'Ilinks'=>16, 'Elinks'=>17);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`crawler_cached`.`Id`'=>0, '`crawler_cached`.`Addr`'=>1, '`crawler_cached`.`Root`'=>2, '`crawler_cached`.`CrawlerWebsitesId`'=>3, '`crawler_cached`.`Level`'=>4, '`crawler_cached`.`Html`'=>5, '`crawler_cached`.`Text`'=>6, '`crawler_cached`.`Links`'=>7, '`crawler_cached`.`Title`'=>8, '`crawler_cached`.`H1`'=>9, '`crawler_cached`.`Keywords`'=>10, '`crawler_cached`.`Description`'=>11, '`crawler_cached`.`Added`'=>12, '`crawler_cached`.`Changed`'=>13, '`crawler_cached`.`Cached`'=>14, '`crawler_cached`.`Cid`'=>15, '`crawler_cached`.`Ilinks`'=>16, '`crawler_cached`.`Elinks`'=>17);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'addr'=>1, 'root'=>2, 'crawler_websites_id'=>3, 'level'=>4, 'html'=>5, 'text'=>6, 'links'=>7, 'title'=>8, 'h1'=>9, 'keywords'=>10, 'description'=>11, 'added'=>12, 'changed'=>13, 'cached'=>14, 'cid'=>15, 'ilinks'=>16, 'elinks'=>17);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'addr', 'root', 'crawler_websites_id', 'level', 'html', 'text', 'links', 'title', 'h1', 'keywords', 'description', 'added', 'changed', 'cached', 'cid', 'ilinks', 'elinks');
	
	
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
			throw new WgException("CrawlerCached could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCrawlerCached::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CrawlerCachedModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerCachedModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CrawlerCachedModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerCachedModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CrawlerCachedModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CrawlerCachedModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(11) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set CrawlerCachedModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addr -> text
	 * 
	 * @name getAddr
	 * @return text
	 */
	public function getAddr() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set CrawlerCachedModel::getAddr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getAddr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of root -> varchar(255)
	 * 
	 * @name getRoot
	 * @return varchar
	 */
	public function getRoot() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set CrawlerCachedModel::getRoot', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getRoot', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of crawler_websites_id -> int(8)
	 * 
	 * @name getCrawlerWebsitesId
	 * @return int
	 */
	public function getCrawlerWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CrawlerCachedModel::getCrawlerWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getCrawlerWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of level -> int(4)
	 * 
	 * @name getLevel
	 * @return int
	 */
	public function getLevel() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CrawlerCachedModel::getLevel', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getLevel', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of html -> text
	 * 
	 * @name getHtml
	 * @return text
	 */
	public function getHtml() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CrawlerCachedModel::getHtml', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getHtml', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerCachedModel::getText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getText', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of links -> text
	 * 
	 * @name getLinks
	 * @return text
	 */
	public function getLinks() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CrawlerCachedModel::getLinks', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getLinks', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> text
	 * 
	 * @name getTitle
	 * @return text
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CrawlerCachedModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1 -> text
	 * 
	 * @name getH1
	 * @return text
	 */
	public function getH1() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CrawlerCachedModel::getH1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getH1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords -> text
	 * 
	 * @name getKeywords
	 * @return text
	 */
	public function getKeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CrawlerCachedModel::getKeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getKeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set CrawlerCachedModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) strtotime($this->_result[12]);
			else parent::throwGetColException('Not set CrawlerCachedModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) strtotime($this->_result[13]);
			else parent::throwGetColException('Not set CrawlerCachedModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cached -> datetime
	 * 
	 * @name getCached
	 * @return datetime
	 */
	public function getCached() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (int) strtotime($this->_result[14]);
			else parent::throwGetColException('Not set CrawlerCachedModel::getCached', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getCached', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cid -> int(11)
	 * 
	 * @name getCid
	 * @return int
	 */
	public function getCid() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set CrawlerCachedModel::getCid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getCid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ilinks -> int(11)
	 * 
	 * @name getIlinks
	 * @return int
	 */
	public function getIlinks() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set CrawlerCachedModel::getIlinks', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getIlinks', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of elinks -> int(11)
	 * 
	 * @name getElinks
	 * @return int
	 */
	public function getElinks() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set CrawlerCachedModel::getElinks', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerCachedModel::getElinks', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CrawlerCachedModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CrawlerCachedModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table crawler_cached
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CrawlerCachedModel());
	}
	
	/**
	 * Select one item function from table crawler_cached
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
		$ret = DbModel::doSelect($conn, new CrawlerCachedModel());
		if (isset($ret[0]) && is_a($ret[0], 'CrawlerCachedModel')) return $ret[0];
		else {
			$class = new CrawlerCachedModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table crawler_cached
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CrawlerCachedModel());
	}
	
	/**
	 * Basic pager function from table crawler_cached
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
		return DbModel::doPager($conn, new CrawlerCachedModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table crawler_cached
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
		return (int) DbModel::doAffected($conn, new CrawlerCachedModel());
	}
	
	/**
	 * Basic update function for table crawler_cached
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
		$af = (int) DbModel::doAffected($conn, new CrawlerCachedModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table crawler_cached
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
		return (int) DbModel::doInsert($conn, new CrawlerCachedModel());
	}
	
	/**
	 * Basic reader create function from table crawler_cached
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table crawler_cached
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
	 * Drop table function for table crawler_cached
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