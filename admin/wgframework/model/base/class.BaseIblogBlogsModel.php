<?php
/**
 * Database class for table iblog_blogs
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/iblog_blogs
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseIblogBlogsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'iblog_blogs';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`iblog_blogs`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`iblog_blogs`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(100)
	 */
	const FULL_NAME = '`iblog_blogs`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(100)
	 */
	const FULL_IDENTIFIER = '`iblog_blogs`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`iblog_blogs`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * users_id -> int(11)
	 */
	const FULL_USERS_ID = '`iblog_blogs`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * posts -> int(11)
	 */
	const FULL_POSTS = '`iblog_blogs`.`posts`';
	
	const COL_POSTS = 'posts';
	
	/**
	 * pictures -> int(11)
	 */
	const FULL_PICTURES = '`iblog_blogs`.`pictures`';
	
	const COL_PICTURES = 'pictures';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`iblog_blogs`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`iblog_blogs`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * motto -> varchar(255)
	 */
	const FULL_MOTTO = '`iblog_blogs`.`motto`';
	
	const COL_MOTTO = 'motto';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`iblog_blogs`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `iblog_blogs`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Description'=>3, 'UsersId'=>4, 'Posts'=>5, 'Pictures'=>6, 'Added'=>7, 'Changed'=>8, 'Motto'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`iblog_blogs`.`Id`'=>0, '`iblog_blogs`.`Name`'=>1, '`iblog_blogs`.`Identifier`'=>2, '`iblog_blogs`.`Description`'=>3, '`iblog_blogs`.`UsersId`'=>4, '`iblog_blogs`.`Posts`'=>5, '`iblog_blogs`.`Pictures`'=>6, '`iblog_blogs`.`Added`'=>7, '`iblog_blogs`.`Changed`'=>8, '`iblog_blogs`.`Motto`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'description'=>3, 'users_id'=>4, 'posts'=>5, 'pictures'=>6, 'added'=>7, 'changed'=>8, 'motto'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'description', 'users_id', 'posts', 'pictures', 'added', 'changed', 'motto');
	
	
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
			throw new WgException("IblogBlogs could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelIblogBlogs::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('IblogBlogsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IblogBlogsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('IblogBlogsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IblogBlogsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in IblogBlogsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in IblogBlogsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IblogBlogsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(100)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set IblogBlogsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(100)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set IblogBlogsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set IblogBlogsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11)
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set IblogBlogsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of posts -> int(11)
	 * 
	 * @name getPosts
	 * @return int
	 */
	public function getPosts() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set IblogBlogsModel::getPosts', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getPosts', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pictures -> int(11)
	 * 
	 * @name getPictures
	 * @return int
	 */
	public function getPictures() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set IblogBlogsModel::getPictures', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getPictures', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IblogBlogsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getAdded', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IblogBlogsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of motto -> varchar(255)
	 * 
	 * @name getMotto
	 * @return varchar
	 */
	public function getMotto() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set IblogBlogsModel::getMotto', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IblogBlogsModel::getMotto', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: IblogBlogsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: IblogBlogsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table iblog_blogs
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new IblogBlogsModel());
	}
	
	/** Left join select function from table iblog_blogs
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new IblogBlogsModel());
	}
	
	/** Right join select function from table iblog_blogs
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new IblogBlogsModel());
	}
	
	/** Inner join select function from table iblog_blogs
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new IblogBlogsModel());
	}
	
	/**
	 * Select one item function from table iblog_blogs
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
		$ret = DbModel::doSelect($conn, new IblogBlogsModel());
		if (isset($ret[0]) && is_a($ret[0], 'IblogBlogsModel')) return $ret[0];
		else {
			$class = new IblogBlogsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table iblog_blogs
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new IblogBlogsModel());
	}
	
	/**
	 * Basic pager function from table iblog_blogs
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
		return DbModel::doPager($conn, new IblogBlogsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table iblog_blogs
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
		return (int) DbModel::doAffected($conn, new IblogBlogsModel());
	}
	
	/**
	 * Basic update function for table iblog_blogs
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
		$af = (int) DbModel::doAffected($conn, new IblogBlogsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table iblog_blogs
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
		return (int) DbModel::doInsert($conn, new IblogBlogsModel());
	}
	
	/**
	 * Basic reader create function from table iblog_blogs
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table iblog_blogs
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
	 * Drop table function for table iblog_blogs
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