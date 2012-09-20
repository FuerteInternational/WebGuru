<?php
/**
 * Database class for table iblog_posts
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/iblog_posts
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class BaseIblogPostsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'iblog_posts';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`iblog_posts`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`iblog_posts`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * iblog_blogs_id -> int(11) unsigned
	 */
	const FULL_IBLOG_BLOGS_ID = '`iblog_posts`.`iblog_blogs_id`';
	
	const COL_IBLOG_BLOGS_ID = 'iblog_blogs_id';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`iblog_posts`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`iblog_posts`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`iblog_posts`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`iblog_posts`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * text -> longtext
	 */
	const FULL_TEXT = '`iblog_posts`.`text`';
	
	const COL_TEXT = 'text';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`iblog_posts`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`iblog_posts`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * views -> int(11) unsigned
	 */
	const FULL_VIEWS = '`iblog_posts`.`views`';
	
	const COL_VIEWS = 'views';
	
	/**
	 * comments -> int(11)
	 */
	const FULL_COMMENTS = '`iblog_posts`.`comments`';
	
	const COL_COMMENTS = 'comments';
	
	/**
	 * lastcomment -> datetime
	 */
	const FULL_LASTCOMMENT = '`iblog_posts`.`lastcomment`';
	
	const COL_LASTCOMMENT = 'lastcomment';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`iblog_posts`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`iblog_posts`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `iblog_posts`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'IblogBlogsId'=>1, 'UsersId'=>2, 'Name'=>3, 'Identifier'=>4, 'Head'=>5, 'Text'=>6, 'Added'=>7, 'Changed'=>8, 'Views'=>9, 'Comments'=>10, 'Lastcomment'=>11, 'Enabled'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`iblog_posts`.`Id`'=>0, '`iblog_posts`.`IblogBlogsId`'=>1, '`iblog_posts`.`UsersId`'=>2, '`iblog_posts`.`Name`'=>3, '`iblog_posts`.`Identifier`'=>4, '`iblog_posts`.`Head`'=>5, '`iblog_posts`.`Text`'=>6, '`iblog_posts`.`Added`'=>7, '`iblog_posts`.`Changed`'=>8, '`iblog_posts`.`Views`'=>9, '`iblog_posts`.`Comments`'=>10, '`iblog_posts`.`Lastcomment`'=>11, '`iblog_posts`.`Enabled`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'iblog_blogs_id'=>1, 'users_id'=>2, 'name'=>3, 'identifier'=>4, 'head'=>5, 'text'=>6, 'added'=>7, 'changed'=>8, 'views'=>9, 'comments'=>10, 'lastcomment'=>11, 'enabled'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'iblog_blogs_id', 'users_id', 'name', 'identifier', 'head', 'text', 'added', 'changed', 'views', 'comments', 'lastcomment', 'enabled');
	
	
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
			throw new WgException("IblogPosts could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelIblogPosts::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('IblogPostsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IblogPostsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('IblogPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IblogPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in IblogPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in IblogPostsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20) unsigned
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set IblogPostsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of iblog_blogs_id -> int(11) unsigned
	 * 
	 * @name getIblogBlogsId
	 * @return int
	 */
	public function getIblogBlogsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set IblogPostsModel::getIblogBlogsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getIblogBlogsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set IblogPostsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set IblogPostsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set IblogPostsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getIdentifier', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IblogPostsModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text -> longtext
	 * 
	 * @name getText
	 * @return longtext
	 */
	public function getText() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set IblogPostsModel::getText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getText', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IblogPostsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set IblogPostsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views -> int(11) unsigned
	 * 
	 * @name getViews
	 * @return int
	 */
	public function getViews() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set IblogPostsModel::getViews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getViews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of comments -> int(11)
	 * 
	 * @name getComments
	 * @return int
	 */
	public function getComments() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set IblogPostsModel::getComments', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getComments', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastcomment -> datetime
	 * 
	 * @name getLastcomment
	 * @return datetime
	 */
	public function getLastcomment() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) strtotime($this->_result[11]);
			else parent::throwGetColException('Not set IblogPostsModel::getLastcomment', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getLastcomment', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set IblogPostsModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogPostsModel::getEnabled', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: IblogPostsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: IblogPostsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table iblog_posts
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new IblogPostsModel());
	}
	
	/**
	 * Select one item function from table iblog_posts
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
		$ret = DbModel::doSelect($conn, new IblogPostsModel());
		if (isset($ret[0]) && is_a($ret[0], 'IblogPostsModel')) return $ret[0];
		else {
			$class = new IblogPostsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table iblog_posts
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new IblogPostsModel());
	}
	
	/**
	 * Basic pager function from table iblog_posts
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
		return DbModel::doPager($conn, new IblogPostsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table iblog_posts
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
		return (int) DbModel::doAffected($conn, new IblogPostsModel());
	}
	
	/**
	 * Basic update function for table iblog_posts
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
		$af = (int) DbModel::doAffected($conn, new IblogPostsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table iblog_posts
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
		return (int) DbModel::doInsert($conn, new IblogPostsModel());
	}
	
	/**
	 * Basic reader create function from table iblog_posts
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table iblog_posts
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
	 * Drop table function for table iblog_posts
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