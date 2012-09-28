<?php
/**
 * Database class for table crawler_results
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/crawler_results
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        28. September 2012 16:42:12
 */

class BaseCrawlerResultsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'crawler_results';
	
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
	
	const FULL_PRIMARY_KEY = '`crawler_results`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`crawler_results`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * addr -> text
	 */
	const FULL_ADDR = '`crawler_results`.`addr`';
	
	const COL_ADDR = 'addr';
	
	/**
	 * root -> varchar(255)
	 */
	const FULL_ROOT = '`crawler_results`.`root`';
	
	const COL_ROOT = 'root';
	
	/**
	 * crawler_websites_id -> int(8)
	 */
	const FULL_CRAWLER_WEBSITES_ID = '`crawler_results`.`crawler_websites_id`';
	
	const COL_CRAWLER_WEBSITES_ID = 'crawler_websites_id';
	
	/**
	 * arank -> int(4)
	 */
	const FULL_ARANK = '`crawler_results`.`arank`';
	
	const COL_ARANK = 'arank';
	
	/**
	 * level -> int(4)
	 */
	const FULL_LEVEL = '`crawler_results`.`level`';
	
	const COL_LEVEL = 'level';
	
	/**
	 * text -> text
	 */
	const FULL_TEXT = '`crawler_results`.`text`';
	
	const COL_TEXT = 'text';
	
	/**
	 * title -> text
	 */
	const FULL_TITLE = '`crawler_results`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * h1 -> text
	 */
	const FULL_H1 = '`crawler_results`.`h1`';
	
	const COL_H1 = 'h1';
	
	/**
	 * keywords -> text
	 */
	const FULL_KEYWORDS = '`crawler_results`.`keywords`';
	
	const COL_KEYWORDS = 'keywords';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`crawler_results`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`crawler_results`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`crawler_results`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * image -> tinyint(1)
	 */
	const FULL_IMAGE = '`crawler_results`.`image`';
	
	const COL_IMAGE = 'image';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`crawler_results`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `crawler_results`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Addr'=>1, 'Root'=>2, 'CrawlerWebsitesId'=>3, 'Arank'=>4, 'Level'=>5, 'Text'=>6, 'Title'=>7, 'H1'=>8, 'Keywords'=>9, 'Description'=>10, 'Added'=>11, 'Changed'=>12, 'Image'=>13);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`crawler_results`.`Id`'=>0, '`crawler_results`.`Addr`'=>1, '`crawler_results`.`Root`'=>2, '`crawler_results`.`CrawlerWebsitesId`'=>3, '`crawler_results`.`Arank`'=>4, '`crawler_results`.`Level`'=>5, '`crawler_results`.`Text`'=>6, '`crawler_results`.`Title`'=>7, '`crawler_results`.`H1`'=>8, '`crawler_results`.`Keywords`'=>9, '`crawler_results`.`Description`'=>10, '`crawler_results`.`Added`'=>11, '`crawler_results`.`Changed`'=>12, '`crawler_results`.`Image`'=>13);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'addr'=>1, 'root'=>2, 'crawler_websites_id'=>3, 'arank'=>4, 'level'=>5, 'text'=>6, 'title'=>7, 'h1'=>8, 'keywords'=>9, 'description'=>10, 'added'=>11, 'changed'=>12, 'image'=>13);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'addr', 'root', 'crawler_websites_id', 'arank', 'level', 'text', 'title', 'h1', 'keywords', 'description', 'added', 'changed', 'image');
	
	
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
			throw new WgException("CrawlerResults could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCrawlerResults::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CrawlerResultsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerResultsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CrawlerResultsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerResultsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CrawlerResultsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CrawlerResultsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerResultsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerResultsModel::getAddr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getAddr', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerResultsModel::getRoot', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getRoot', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerResultsModel::getCrawlerWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getCrawlerWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of arank -> int(4)
	 * 
	 * @name getArank
	 * @return int
	 */
	public function getArank() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CrawlerResultsModel::getArank', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getArank', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of level -> int(4)
	 * 
	 * @name getLevel
	 * @return int
	 */
	public function getLevel() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CrawlerResultsModel::getLevel', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getLevel', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerResultsModel::getText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getText', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> text
	 * 
	 * @name getTitle
	 * @return text
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CrawlerResultsModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1 -> text
	 * 
	 * @name getH1
	 * @return text
	 */
	public function getH1() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CrawlerResultsModel::getH1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getH1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords -> text
	 * 
	 * @name getKeywords
	 * @return text
	 */
	public function getKeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CrawlerResultsModel::getKeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getKeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CrawlerResultsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) strtotime($this->_result[11]);
			else parent::throwGetColException('Not set CrawlerResultsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) strtotime($this->_result[12]);
			else parent::throwGetColException('Not set CrawlerResultsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> tinyint(1)
	 * 
	 * @name getImage
	 * @return tinyint
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set CrawlerResultsModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerResultsModel::getImage', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CrawlerResultsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CrawlerResultsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table crawler_results
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CrawlerResultsModel());
	}
	
	/**
	 * Select one item function from table crawler_results
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
		$ret = DbModel::doSelect($conn, new CrawlerResultsModel());
		if (isset($ret[0]) && is_a($ret[0], 'CrawlerResultsModel')) return $ret[0];
		else {
			$class = new CrawlerResultsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table crawler_results
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CrawlerResultsModel());
	}
	
	/**
	 * Basic pager function from table crawler_results
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
		return DbModel::doPager($conn, new CrawlerResultsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table crawler_results
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
		return (int) DbModel::doAffected($conn, new CrawlerResultsModel());
	}
	
	/**
	 * Basic update function for table crawler_results
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
		$af = (int) DbModel::doAffected($conn, new CrawlerResultsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table crawler_results
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
		return (int) DbModel::doInsert($conn, new CrawlerResultsModel());
	}
	
	/**
	 * Basic reader create function from table crawler_results
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table crawler_results
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
	 * Drop table function for table crawler_results
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