<?php
/**
 * Database class for table discuss_topics
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/discuss_topics
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDiscussTopicsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'discuss_topics';
	
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
	 * id_dt -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_dt';
	
	const FULL_PRIMARY_KEY = '`discuss_topics`.`id_dt`';
	
	/**
	 * id_dt -> int(16) unsigned
	 */
	const FULL_ID_DT = '`discuss_topics`.`id_dt`';
	
	const COL_ID_DT = 'id_dt';
	
	/**
	 * dc_id_dt -> int(8) unsigned
	 */
	const FULL_DC_ID_DT = '`discuss_topics`.`dc_id_dt`';
	
	const COL_DC_ID_DT = 'dc_id_dt';
	
	/**
	 * title_dt -> varchar(255)
	 */
	const FULL_TITLE_DT = '`discuss_topics`.`title_dt`';
	
	const COL_TITLE_DT = 'title_dt';
	
	/**
	 * identifier_dt -> varchar(255)
	 */
	const FULL_IDENTIFIER_DT = '`discuss_topics`.`identifier_dt`';
	
	const COL_IDENTIFIER_DT = 'identifier_dt';
	
	/**
	 * desc_dt -> text
	 */
	const FULL_DESC_DT = '`discuss_topics`.`desc_dt`';
	
	const COL_DESC_DT = 'desc_dt';
	
	/**
	 * keywords_dt -> varchar(255)
	 */
	const FULL_KEYWORDS_DT = '`discuss_topics`.`keywords_dt`';
	
	const COL_KEYWORDS_DT = 'keywords_dt';
	
	/**
	 * added_dt -> datetime
	 */
	const FULL_ADDED_DT = '`discuss_topics`.`added_dt`';
	
	const COL_ADDED_DT = 'added_dt';
	
	/**
	 * posts_dt -> int(8) unsigned
	 */
	const FULL_POSTS_DT = '`discuss_topics`.`posts_dt`';
	
	const COL_POSTS_DT = 'posts_dt';
	
	/**
	 * views_dt -> int(8) unsigned
	 */
	const FULL_VIEWS_DT = '`discuss_topics`.`views_dt`';
	
	const COL_VIEWS_DT = 'views_dt';
	
	/**
	 * status_dt -> tinyint(2) unsigned
	 */
	const FULL_STATUS_DT = '`discuss_topics`.`status_dt`';
	
	const COL_STATUS_DT = 'status_dt';
	
	/**
	 * lastpost_dt -> datetime
	 */
	const FULL_LASTPOST_DT = '`discuss_topics`.`lastpost_dt`';
	
	const COL_LASTPOST_DT = 'lastpost_dt';
	
	/**
	 * lastby_dt -> int(16)
	 */
	const FULL_LASTBY_DT = '`discuss_topics`.`lastby_dt`';
	
	const COL_LASTBY_DT = 'lastby_dt';
	
	/**
	 * users_id_dt -> int(16)
	 */
	const FULL_USERS_ID_DT = '`discuss_topics`.`users_id_dt`';
	
	const COL_USERS_ID_DT = 'users_id_dt';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`discuss_topics`.`id_dt`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `discuss_topics`.`id_dt`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdDt'=>0, 'DcIdDt'=>1, 'TitleDt'=>2, 'IdentifierDt'=>3, 'DescDt'=>4, 'KeywordsDt'=>5, 'AddedDt'=>6, 'PostsDt'=>7, 'ViewsDt'=>8, 'StatusDt'=>9, 'LastpostDt'=>10, 'LastbyDt'=>11, 'UsersIdDt'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`discuss_topics`.`IdDt`'=>0, '`discuss_topics`.`DcIdDt`'=>1, '`discuss_topics`.`TitleDt`'=>2, '`discuss_topics`.`IdentifierDt`'=>3, '`discuss_topics`.`DescDt`'=>4, '`discuss_topics`.`KeywordsDt`'=>5, '`discuss_topics`.`AddedDt`'=>6, '`discuss_topics`.`PostsDt`'=>7, '`discuss_topics`.`ViewsDt`'=>8, '`discuss_topics`.`StatusDt`'=>9, '`discuss_topics`.`LastpostDt`'=>10, '`discuss_topics`.`LastbyDt`'=>11, '`discuss_topics`.`UsersIdDt`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_dt'=>0, 'dc_id_dt'=>1, 'title_dt'=>2, 'identifier_dt'=>3, 'desc_dt'=>4, 'keywords_dt'=>5, 'added_dt'=>6, 'posts_dt'=>7, 'views_dt'=>8, 'status_dt'=>9, 'lastpost_dt'=>10, 'lastby_dt'=>11, 'users_id_dt'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_dt', 'dc_id_dt', 'title_dt', 'identifier_dt', 'desc_dt', 'keywords_dt', 'added_dt', 'posts_dt', 'views_dt', 'status_dt', 'lastpost_dt', 'lastby_dt', 'users_id_dt');
	
	
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
			throw new WgException("DiscussTopics could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDiscussTopics::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DiscussTopicsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussTopicsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DiscussTopicsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussTopicsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DiscussTopicsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DiscussTopicsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_dt -> int(16) unsigned
	 * 
	 * @name getIdDt
	 * @return int
	 */
	public function getIdDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DiscussTopicsModel::getIdDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getIdDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dc_id_dt -> int(8) unsigned
	 * 
	 * @name getDcIdDt
	 * @return int
	 */
	public function getDcIdDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DiscussTopicsModel::getDcIdDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getDcIdDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_dt -> varchar(255)
	 * 
	 * @name getTitleDt
	 * @return varchar
	 */
	public function getTitleDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DiscussTopicsModel::getTitleDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getTitleDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_dt -> varchar(255)
	 * 
	 * @name getIdentifierDt
	 * @return varchar
	 */
	public function getIdentifierDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DiscussTopicsModel::getIdentifierDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getIdentifierDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_dt -> text
	 * 
	 * @name getDescDt
	 * @return text
	 */
	public function getDescDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DiscussTopicsModel::getDescDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getDescDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_dt -> varchar(255)
	 * 
	 * @name getKeywordsDt
	 * @return varchar
	 */
	public function getKeywordsDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DiscussTopicsModel::getKeywordsDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getKeywordsDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_dt -> datetime
	 * 
	 * @name getAddedDt
	 * @return datetime
	 */
	public function getAddedDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set DiscussTopicsModel::getAddedDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getAddedDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of posts_dt -> int(8) unsigned
	 * 
	 * @name getPostsDt
	 * @return int
	 */
	public function getPostsDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DiscussTopicsModel::getPostsDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getPostsDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views_dt -> int(8) unsigned
	 * 
	 * @name getViewsDt
	 * @return int
	 */
	public function getViewsDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DiscussTopicsModel::getViewsDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getViewsDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status_dt -> tinyint(2) unsigned
	 * 
	 * @name getStatusDt
	 * @return tinyint
	 */
	public function getStatusDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DiscussTopicsModel::getStatusDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getStatusDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastpost_dt -> datetime
	 * 
	 * @name getLastpostDt
	 * @return datetime
	 */
	public function getLastpostDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (int) strtotime($this->_result[10]);
			else parent::throwGetColException('Not set DiscussTopicsModel::getLastpostDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getLastpostDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastby_dt -> int(16)
	 * 
	 * @name getLastbyDt
	 * @return int
	 */
	public function getLastbyDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set DiscussTopicsModel::getLastbyDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getLastbyDt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_dt -> int(16)
	 * 
	 * @name getUsersIdDt
	 * @return int
	 */
	public function getUsersIdDt() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set DiscussTopicsModel::getUsersIdDt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTopicsModel::getUsersIdDt', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DiscussTopicsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DiscussTopicsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table discuss_topics
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DiscussTopicsModel());
	}
	
	/**
	 * Select one item function from table discuss_topics
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
		$ret = DbModel::doSelect($conn, new DiscussTopicsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DiscussTopicsModel')) return $ret[0];
		else {
			$class = new DiscussTopicsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table discuss_topics
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DiscussTopicsModel());
	}
	
	/**
	 * Basic pager function from table discuss_topics
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
		return DbModel::doPager($conn, new DiscussTopicsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table discuss_topics
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
		return (int) DbModel::doAffected($conn, new DiscussTopicsModel());
	}
	
	/**
	 * Basic update function for table discuss_topics
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
		$af = (int) DbModel::doAffected($conn, new DiscussTopicsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table discuss_topics
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
		return (int) DbModel::doInsert($conn, new DiscussTopicsModel());
	}
	
	/**
	 * Basic reader create function from table discuss_topics
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table discuss_topics
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
	 * Drop table function for table discuss_topics
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