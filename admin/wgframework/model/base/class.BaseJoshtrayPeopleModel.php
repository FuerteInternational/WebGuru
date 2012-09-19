<?php
/**
 * Database class for table joshtray_people
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/joshtray_people
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:51:17
 */

class BaseJoshtrayPeopleModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'joshtray_people';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`joshtray_people`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`joshtray_people`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * joshtray_groups_id -> int(8) unsigned
	 */
	const FULL_JOSHTRAY_GROUPS_ID = '`joshtray_people`.`joshtray_groups_id`';
	
	const COL_JOSHTRAY_GROUPS_ID = 'joshtray_groups_id';
	
	/**
	 * firstname -> varchar(255)
	 */
	const FULL_FIRSTNAME = '`joshtray_people`.`firstname`';
	
	const COL_FIRSTNAME = 'firstname';
	
	/**
	 * lastname -> varchar(255)
	 */
	const FULL_LASTNAME = '`joshtray_people`.`lastname`';
	
	const COL_LASTNAME = 'lastname';
	
	/**
	 * line -> varchar(255)
	 */
	const FULL_LINE = '`joshtray_people`.`line`';
	
	const COL_LINE = 'line';
	
	/**
	 * phone -> varchar(255)
	 */
	const FULL_PHONE = '`joshtray_people`.`phone`';
	
	const COL_PHONE = 'phone';
	
	/**
	 * mobile -> varchar(255)
	 */
	const FULL_MOBILE = '`joshtray_people`.`mobile`';
	
	const COL_MOBILE = 'mobile';
	
	/**
	 * note -> varchar(45)
	 */
	const FULL_NOTE = '`joshtray_people`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * online -> datetime
	 */
	const FULL_ONLINE = '`joshtray_people`.`online`';
	
	const COL_ONLINE = 'online';
	
	/**
	 * lastlogin -> datetime
	 */
	const FULL_LASTLOGIN = '`joshtray_people`.`lastlogin`';
	
	const COL_LASTLOGIN = 'lastlogin';
	
	/**
	 * mail -> varchar(255)
	 */
	const FULL_MAIL = '`joshtray_people`.`mail`';
	
	const COL_MAIL = 'mail';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`joshtray_people`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * password -> varchar(40)
	 */
	const FULL_PASSWORD = '`joshtray_people`.`password`';
	
	const COL_PASSWORD = 'password';
	
	/**
	 * initials -> varchar(10)
	 */
	const FULL_INITIALS = '`joshtray_people`.`initials`';
	
	const COL_INITIALS = 'initials';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`joshtray_people`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`joshtray_people`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`joshtray_people`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `joshtray_people`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'JoshtrayGroupsId'=>1, 'Firstname'=>2, 'Lastname'=>3, 'Line'=>4, 'Phone'=>5, 'Mobile'=>6, 'Note'=>7, 'Online'=>8, 'Lastlogin'=>9, 'Mail'=>10, 'Title'=>11, 'Password'=>12, 'Initials'=>13, 'Added'=>14, 'Changed'=>15);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`joshtray_people`.`Id`'=>0, '`joshtray_people`.`JoshtrayGroupsId`'=>1, '`joshtray_people`.`Firstname`'=>2, '`joshtray_people`.`Lastname`'=>3, '`joshtray_people`.`Line`'=>4, '`joshtray_people`.`Phone`'=>5, '`joshtray_people`.`Mobile`'=>6, '`joshtray_people`.`Note`'=>7, '`joshtray_people`.`Online`'=>8, '`joshtray_people`.`Lastlogin`'=>9, '`joshtray_people`.`Mail`'=>10, '`joshtray_people`.`Title`'=>11, '`joshtray_people`.`Password`'=>12, '`joshtray_people`.`Initials`'=>13, '`joshtray_people`.`Added`'=>14, '`joshtray_people`.`Changed`'=>15);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'joshtray_groups_id'=>1, 'firstname'=>2, 'lastname'=>3, 'line'=>4, 'phone'=>5, 'mobile'=>6, 'note'=>7, 'online'=>8, 'lastlogin'=>9, 'mail'=>10, 'title'=>11, 'password'=>12, 'initials'=>13, 'added'=>14, 'changed'=>15);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'joshtray_groups_id', 'firstname', 'lastname', 'line', 'phone', 'mobile', 'note', 'online', 'lastlogin', 'mail', 'title', 'password', 'initials', 'added', 'changed');
	
	
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
			throw new WgException("JoshtrayPeople could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelJoshtrayPeople::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('JoshtrayPeopleModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('JoshtrayPeopleModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('JoshtrayPeopleModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('JoshtrayPeopleModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in JoshtrayPeopleModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in JoshtrayPeopleModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of joshtray_groups_id -> int(8) unsigned
	 * 
	 * @name getJoshtrayGroupsId
	 * @return int
	 */
	public function getJoshtrayGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getJoshtrayGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getJoshtrayGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of firstname -> varchar(255)
	 * 
	 * @name getFirstname
	 * @return varchar
	 */
	public function getFirstname() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getFirstname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getFirstname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastname -> varchar(255)
	 * 
	 * @name getLastname
	 * @return varchar
	 */
	public function getLastname() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getLastname', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getLastname', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of line -> varchar(255)
	 * 
	 * @name getLine
	 * @return varchar
	 */
	public function getLine() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getLine', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getLine', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of phone -> varchar(255)
	 * 
	 * @name getPhone
	 * @return varchar
	 */
	public function getPhone() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getPhone', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getPhone', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mobile -> varchar(255)
	 * 
	 * @name getMobile
	 * @return varchar
	 */
	public function getMobile() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getMobile', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getMobile', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> varchar(45)
	 * 
	 * @name getNote
	 * @return varchar
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of online -> datetime
	 * 
	 * @name getOnline
	 * @return datetime
	 */
	public function getOnline() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getOnline', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getOnline', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastlogin -> datetime
	 * 
	 * @name getLastlogin
	 * @return datetime
	 */
	public function getLastlogin() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getLastlogin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getLastlogin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail -> varchar(255)
	 * 
	 * @name getMail
	 * @return varchar
	 */
	public function getMail() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getMail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getMail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of password -> varchar(40)
	 * 
	 * @name getPassword
	 * @return varchar
	 */
	public function getPassword() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getPassword', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getPassword', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of initials -> varchar(10)
	 * 
	 * @name getInitials
	 * @return varchar
	 */
	public function getInitials() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getInitials', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getInitials', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (int) strtotime($this->_result[14]);
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (int) strtotime($this->_result[15]);
			else parent::throwGetColException('Not set JoshtrayPeopleModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From JoshtrayPeopleModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: JoshtrayPeopleModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: JoshtrayPeopleModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table joshtray_people
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new JoshtrayPeopleModel());
	}
	
	/**
	 * Select one item function from table joshtray_people
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
		$ret = DbModel::doSelect($conn, new JoshtrayPeopleModel());
		if (isset($ret[0]) && is_a($ret[0], 'JoshtrayPeopleModel')) return $ret[0];
		else {
			$class = new JoshtrayPeopleModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table joshtray_people
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new JoshtrayPeopleModel());
	}
	
	/**
	 * Basic pager function from table joshtray_people
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
		return DbModel::doPager($conn, new JoshtrayPeopleModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table joshtray_people
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
		return (int) DbModel::doAffected($conn, new JoshtrayPeopleModel());
	}
	
	/**
	 * Basic update function for table joshtray_people
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
		$af = (int) DbModel::doAffected($conn, new JoshtrayPeopleModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table joshtray_people
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
		return (int) DbModel::doInsert($conn, new JoshtrayPeopleModel());
	}
	
	/**
	 * Basic reader create function from table joshtray_people
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table joshtray_people
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
	 * Drop table function for table joshtray_people
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