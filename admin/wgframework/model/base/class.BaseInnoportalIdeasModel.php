<?php
/**
 * Database class for table innoportal_ideas
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/innoportal_ideas
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        28. September 2012 16:42:12
 */

class BaseInnoportalIdeasModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'innoportal_ideas';
	
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
	
	const FULL_PRIMARY_KEY = '`innoportal_ideas`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`innoportal_ideas`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`innoportal_ideas`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * idea -> text
	 */
	const FULL_IDEA = '`innoportal_ideas`.`idea`';
	
	const COL_IDEA = 'idea';
	
	/**
	 * innoportal_groups_id -> int(11) unsigned
	 */
	const FULL_INNOPORTAL_GROUPS_ID = '`innoportal_ideas`.`innoportal_groups_id`';
	
	const COL_INNOPORTAL_GROUPS_ID = 'innoportal_groups_id';
	
	/**
	 * rating -> int(11)
	 */
	const FULL_RATING = '`innoportal_ideas`.`rating`';
	
	const COL_RATING = 'rating';
	
	/**
	 * comments -> int(11) unsigned
	 */
	const FULL_COMMENTS = '`innoportal_ideas`.`comments`';
	
	const COL_COMMENTS = 'comments';
	
	/**
	 * ansvered -> tinyint(1) unsigned
	 */
	const FULL_ANSVERED = '`innoportal_ideas`.`ansvered`';
	
	const COL_ANSVERED = 'ansvered';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`innoportal_ideas`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * lastcomment -> datetime
	 */
	const FULL_LASTCOMMENT = '`innoportal_ideas`.`lastcomment`';
	
	const COL_LASTCOMMENT = 'lastcomment';
	
	/**
	 * lastvote -> datetime
	 */
	const FULL_LASTVOTE = '`innoportal_ideas`.`lastvote`';
	
	const COL_LASTVOTE = 'lastvote';
	
	/**
	 * votes -> int(11) unsigned
	 */
	const FULL_VOTES = '`innoportal_ideas`.`votes`';
	
	const COL_VOTES = 'votes';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`innoportal_ideas`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`innoportal_ideas`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `innoportal_ideas`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Idea'=>2, 'InnoportalGroupsId'=>3, 'Rating'=>4, 'Comments'=>5, 'Ansvered'=>6, 'Added'=>7, 'Lastcomment'=>8, 'Lastvote'=>9, 'Votes'=>10, 'UsersId'=>11);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`innoportal_ideas`.`Id`'=>0, '`innoportal_ideas`.`Name`'=>1, '`innoportal_ideas`.`Idea`'=>2, '`innoportal_ideas`.`InnoportalGroupsId`'=>3, '`innoportal_ideas`.`Rating`'=>4, '`innoportal_ideas`.`Comments`'=>5, '`innoportal_ideas`.`Ansvered`'=>6, '`innoportal_ideas`.`Added`'=>7, '`innoportal_ideas`.`Lastcomment`'=>8, '`innoportal_ideas`.`Lastvote`'=>9, '`innoportal_ideas`.`Votes`'=>10, '`innoportal_ideas`.`UsersId`'=>11);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'idea'=>2, 'innoportal_groups_id'=>3, 'rating'=>4, 'comments'=>5, 'ansvered'=>6, 'added'=>7, 'lastcomment'=>8, 'lastvote'=>9, 'votes'=>10, 'users_id'=>11);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'idea', 'innoportal_groups_id', 'rating', 'comments', 'ansvered', 'added', 'lastcomment', 'lastvote', 'votes', 'users_id');
	
	
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
			throw new WgException("InnoportalIdeas could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelInnoportalIdeas::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('InnoportalIdeasModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('InnoportalIdeasModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('InnoportalIdeasModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('InnoportalIdeasModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in InnoportalIdeasModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in InnoportalIdeasModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set InnoportalIdeasModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set InnoportalIdeasModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of idea -> text
	 * 
	 * @name getIdea
	 * @return text
	 */
	public function getIdea() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getIdea', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getIdea', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of innoportal_groups_id -> int(11) unsigned
	 * 
	 * @name getInnoportalGroupsId
	 * @return int
	 */
	public function getInnoportalGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getInnoportalGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getInnoportalGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rating -> int(11)
	 * 
	 * @name getRating
	 * @return int
	 */
	public function getRating() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getRating', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getRating', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of comments -> int(11) unsigned
	 * 
	 * @name getComments
	 * @return int
	 */
	public function getComments() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getComments', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getComments', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ansvered -> tinyint(1) unsigned
	 * 
	 * @name getAnsvered
	 * @return tinyint
	 */
	public function getAnsvered() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getAnsvered', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getAnsvered', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set InnoportalIdeasModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastcomment -> datetime
	 * 
	 * @name getLastcomment
	 * @return datetime
	 */
	public function getLastcomment() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set InnoportalIdeasModel::getLastcomment', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getLastcomment', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastvote -> datetime
	 * 
	 * @name getLastvote
	 * @return datetime
	 */
	public function getLastvote() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set InnoportalIdeasModel::getLastvote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getLastvote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of votes -> int(11) unsigned
	 * 
	 * @name getVotes
	 * @return int
	 */
	public function getVotes() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getVotes', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getVotes', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set InnoportalIdeasModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From InnoportalIdeasModel::getUsersId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: InnoportalIdeasModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: InnoportalIdeasModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table innoportal_ideas
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new InnoportalIdeasModel());
	}
	
	/**
	 * Select one item function from table innoportal_ideas
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
		$ret = DbModel::doSelect($conn, new InnoportalIdeasModel());
		if (isset($ret[0]) && is_a($ret[0], 'InnoportalIdeasModel')) return $ret[0];
		else {
			$class = new InnoportalIdeasModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table innoportal_ideas
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new InnoportalIdeasModel());
	}
	
	/**
	 * Basic pager function from table innoportal_ideas
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
		return DbModel::doPager($conn, new InnoportalIdeasModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table innoportal_ideas
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
		return (int) DbModel::doAffected($conn, new InnoportalIdeasModel());
	}
	
	/**
	 * Basic update function for table innoportal_ideas
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
		$af = (int) DbModel::doAffected($conn, new InnoportalIdeasModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table innoportal_ideas
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
		return (int) DbModel::doInsert($conn, new InnoportalIdeasModel());
	}
	
	/**
	 * Basic reader create function from table innoportal_ideas
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table innoportal_ideas
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
	 * Drop table function for table innoportal_ideas
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