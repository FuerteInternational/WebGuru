<?php
/**
 * Database class for table comments_messages
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/comments_messages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:36
 */

class BaseCommentsMessagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'comments_messages';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`comments_messages`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`comments_messages`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * comments_groups_id -> int(8)
	 */
	const FULL_COMMENTS_GROUPS_ID = '`comments_messages`.`comments_groups_id`';
	
	const COL_COMMENTS_GROUPS_ID = 'comments_groups_id';
	
	/**
	 * for_id -> int(11)
	 */
	const FULL_FOR_ID = '`comments_messages`.`for_id`';
	
	const COL_FOR_ID = 'for_id';
	
	/**
	 * author -> tinytext
	 */
	const FULL_AUTHOR = '`comments_messages`.`author`';
	
	const COL_AUTHOR = 'author';
	
	/**
	 * author_email -> varchar(100)
	 */
	const FULL_AUTHOR_EMAIL = '`comments_messages`.`author_email`';
	
	const COL_AUTHOR_EMAIL = 'author_email';
	
	/**
	 * author_url -> varchar(255)
	 */
	const FULL_AUTHOR_URL = '`comments_messages`.`author_url`';
	
	const COL_AUTHOR_URL = 'author_url';
	
	/**
	 * author_ip -> varchar(20)
	 */
	const FULL_AUTHOR_IP = '`comments_messages`.`author_ip`';
	
	const COL_AUTHOR_IP = 'author_ip';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`comments_messages`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * added_gmt -> datetime
	 */
	const FULL_ADDED_GMT = '`comments_messages`.`added_gmt`';
	
	const COL_ADDED_GMT = 'added_gmt';
	
	/**
	 * content -> text
	 */
	const FULL_CONTENT = '`comments_messages`.`content`';
	
	const COL_CONTENT = 'content';
	
	/**
	 * karma -> int(11)
	 */
	const FULL_KARMA = '`comments_messages`.`karma`';
	
	const COL_KARMA = 'karma';
	
	/**
	 * approved -> tinyint(1)
	 */
	const FULL_APPROVED = '`comments_messages`.`approved`';
	
	const COL_APPROVED = 'approved';
	
	/**
	 * agent -> varchar(255)
	 */
	const FULL_AGENT = '`comments_messages`.`agent`';
	
	const COL_AGENT = 'agent';
	
	/**
	 * parent -> bigint(20)
	 */
	const FULL_PARENT = '`comments_messages`.`parent`';
	
	const COL_PARENT = 'parent';
	
	/**
	 * users_id -> int(11)
	 */
	const FULL_USERS_ID = '`comments_messages`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`comments_messages`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `comments_messages`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'CommentsGroupsId'=>1, 'ForId'=>2, 'Author'=>3, 'AuthorEmail'=>4, 'AuthorUrl'=>5, 'AuthorIp'=>6, 'Added'=>7, 'AddedGmt'=>8, 'Content'=>9, 'Karma'=>10, 'Approved'=>11, 'Agent'=>12, 'Parent'=>13, 'UsersId'=>14);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`comments_messages`.`Id`'=>0, '`comments_messages`.`CommentsGroupsId`'=>1, '`comments_messages`.`ForId`'=>2, '`comments_messages`.`Author`'=>3, '`comments_messages`.`AuthorEmail`'=>4, '`comments_messages`.`AuthorUrl`'=>5, '`comments_messages`.`AuthorIp`'=>6, '`comments_messages`.`Added`'=>7, '`comments_messages`.`AddedGmt`'=>8, '`comments_messages`.`Content`'=>9, '`comments_messages`.`Karma`'=>10, '`comments_messages`.`Approved`'=>11, '`comments_messages`.`Agent`'=>12, '`comments_messages`.`Parent`'=>13, '`comments_messages`.`UsersId`'=>14);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'comments_groups_id'=>1, 'for_id'=>2, 'author'=>3, 'author_email'=>4, 'author_url'=>5, 'author_ip'=>6, 'added'=>7, 'added_gmt'=>8, 'content'=>9, 'karma'=>10, 'approved'=>11, 'agent'=>12, 'parent'=>13, 'users_id'=>14);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'comments_groups_id', 'for_id', 'author', 'author_email', 'author_url', 'author_ip', 'added', 'added_gmt', 'content', 'karma', 'approved', 'agent', 'parent', 'users_id');
	
	
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
			throw new WgException("CommentsMessages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCommentsMessages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CommentsMessagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CommentsMessagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CommentsMessagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CommentsMessagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CommentsMessagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CommentsMessagesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20) unsigned
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set CommentsMessagesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of comments_groups_id -> int(8)
	 * 
	 * @name getCommentsGroupsId
	 * @return int
	 */
	public function getCommentsGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set CommentsMessagesModel::getCommentsGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getCommentsGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of for_id -> int(11)
	 * 
	 * @name getForId
	 * @return int
	 */
	public function getForId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) $this->_result[2];
			else parent::throwGetColException('Not set CommentsMessagesModel::getForId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getForId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of author -> tinytext
	 * 
	 * @name getAuthor
	 * @return tinytext
	 */
	public function getAuthor() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CommentsMessagesModel::getAuthor', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAuthor', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of author_email -> varchar(100)
	 * 
	 * @name getAuthorEmail
	 * @return varchar
	 */
	public function getAuthorEmail() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CommentsMessagesModel::getAuthorEmail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAuthorEmail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of author_url -> varchar(255)
	 * 
	 * @name getAuthorUrl
	 * @return varchar
	 */
	public function getAuthorUrl() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CommentsMessagesModel::getAuthorUrl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAuthorUrl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of author_ip -> varchar(20)
	 * 
	 * @name getAuthorIp
	 * @return varchar
	 */
	public function getAuthorIp() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CommentsMessagesModel::getAuthorIp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAuthorIp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set CommentsMessagesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_gmt -> datetime
	 * 
	 * @name getAddedGmt
	 * @return datetime
	 */
	public function getAddedGmt() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set CommentsMessagesModel::getAddedGmt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAddedGmt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of content -> text
	 * 
	 * @name getContent
	 * @return text
	 */
	public function getContent() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CommentsMessagesModel::getContent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getContent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of karma -> int(11)
	 * 
	 * @name getKarma
	 * @return int
	 */
	public function getKarma() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (int) $this->_result[10];
			else parent::throwGetColException('Not set CommentsMessagesModel::getKarma', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getKarma', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of approved -> tinyint(1)
	 * 
	 * @name getApproved
	 * @return tinyint
	 */
	public function getApproved() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) $this->_result[11];
			else parent::throwGetColException('Not set CommentsMessagesModel::getApproved', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getApproved', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of agent -> varchar(255)
	 * 
	 * @name getAgent
	 * @return varchar
	 */
	public function getAgent() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set CommentsMessagesModel::getAgent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getAgent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parent -> bigint(20)
	 * 
	 * @name getParent
	 * @return bigint
	 */
	public function getParent() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) $this->_result[13];
			else parent::throwGetColException('Not set CommentsMessagesModel::getParent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getParent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11)
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (int) $this->_result[14];
			else parent::throwGetColException('Not set CommentsMessagesModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsMessagesModel::getUsersId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CommentsMessagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CommentsMessagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table comments_messages
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CommentsMessagesModel());
	}
	
	/** Left join select function from table comments_messages
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsMessagesModel());
	}
	
	/** Right join select function from table comments_messages
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsMessagesModel());
	}
	
	/** Inner join select function from table comments_messages
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CommentsMessagesModel());
	}
	
	/**
	 * Select one item function from table comments_messages
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
		$ret = DbModel::doSelect($conn, new CommentsMessagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CommentsMessagesModel')) return $ret[0];
		else {
			$class = new CommentsMessagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table comments_messages
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CommentsMessagesModel());
	}
	
	/**
	 * Basic pager function from table comments_messages
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
		return DbModel::doPager($conn, new CommentsMessagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table comments_messages
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
		return (int) DbModel::doAffected($conn, new CommentsMessagesModel());
	}
	
	/**
	 * Basic update function for table comments_messages
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
		$af = (int) DbModel::doAffected($conn, new CommentsMessagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table comments_messages
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
		return (int) DbModel::doInsert($conn, new CommentsMessagesModel());
	}
	
	/**
	 * Basic reader create function from table comments_messages
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table comments_messages
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
	 * Drop table function for table comments_messages
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