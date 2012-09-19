<?php
/**
 * Database class for table discuss_posts
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/discuss_posts
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDiscussPostsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'discuss_posts';
	
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
	 * id_dp -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_dp';
	
	const FULL_PRIMARY_KEY = '`discuss_posts`.`id_dp`';
	
	/**
	 * id_dp -> int(32) unsigned
	 */
	const FULL_ID_DP = '`discuss_posts`.`id_dp`';
	
	const COL_ID_DP = 'id_dp';
	
	/**
	 * dt_id_dp -> int(16) unsigned
	 */
	const FULL_DT_ID_DP = '`discuss_posts`.`dt_id_dp`';
	
	const COL_DT_ID_DP = 'dt_id_dp';
	
	/**
	 * title_dp -> varchar(255)
	 */
	const FULL_TITLE_DP = '`discuss_posts`.`title_dp`';
	
	const COL_TITLE_DP = 'title_dp';
	
	/**
	 * text_dp -> text
	 */
	const FULL_TEXT_DP = '`discuss_posts`.`text_dp`';
	
	const COL_TEXT_DP = 'text_dp';
	
	/**
	 * added_dp -> datetime
	 */
	const FULL_ADDED_DP = '`discuss_posts`.`added_dp`';
	
	const COL_ADDED_DP = 'added_dp';
	
	/**
	 * users_id_dp -> int(16)
	 */
	const FULL_USERS_ID_DP = '`discuss_posts`.`users_id_dp`';
	
	const COL_USERS_ID_DP = 'users_id_dp';
	
	/**
	 * status_dp -> tinyint(2) unsigned
	 */
	const FULL_STATUS_DP = '`discuss_posts`.`status_dp`';
	
	const COL_STATUS_DP = 'status_dp';
	
	/**
	 * ip_dp -> varchar(15)
	 */
	const FULL_IP_DP = '`discuss_posts`.`ip_dp`';
	
	const COL_IP_DP = 'ip_dp';
	
	/**
	 * link_dp -> varchar(255)
	 */
	const FULL_LINK_DP = '`discuss_posts`.`link_dp`';
	
	const COL_LINK_DP = 'link_dp';
	
	/**
	 * youcode_dp -> varchar(40)
	 */
	const FULL_YOUCODE_DP = '`discuss_posts`.`youcode_dp`';
	
	const COL_YOUCODE_DP = 'youcode_dp';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`discuss_posts`.`id_dp`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `discuss_posts`.`id_dp`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdDp'=>0, 'DtIdDp'=>1, 'TitleDp'=>2, 'TextDp'=>3, 'AddedDp'=>4, 'UsersIdDp'=>5, 'StatusDp'=>6, 'IpDp'=>7, 'LinkDp'=>8, 'YoucodeDp'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`discuss_posts`.`IdDp`'=>0, '`discuss_posts`.`DtIdDp`'=>1, '`discuss_posts`.`TitleDp`'=>2, '`discuss_posts`.`TextDp`'=>3, '`discuss_posts`.`AddedDp`'=>4, '`discuss_posts`.`UsersIdDp`'=>5, '`discuss_posts`.`StatusDp`'=>6, '`discuss_posts`.`IpDp`'=>7, '`discuss_posts`.`LinkDp`'=>8, '`discuss_posts`.`YoucodeDp`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_dp'=>0, 'dt_id_dp'=>1, 'title_dp'=>2, 'text_dp'=>3, 'added_dp'=>4, 'users_id_dp'=>5, 'status_dp'=>6, 'ip_dp'=>7, 'link_dp'=>8, 'youcode_dp'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_dp', 'dt_id_dp', 'title_dp', 'text_dp', 'added_dp', 'users_id_dp', 'status_dp', 'ip_dp', 'link_dp', 'youcode_dp');
	
	
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
			throw new WgException("DiscussPosts could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDiscussPosts::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DiscussPostsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussPostsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DiscussPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DiscussPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DiscussPostsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_dp -> int(32) unsigned
	 * 
	 * @name getIdDp
	 * @return int
	 */
	public function getIdDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DiscussPostsModel::getIdDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getIdDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dt_id_dp -> int(16) unsigned
	 * 
	 * @name getDtIdDp
	 * @return int
	 */
	public function getDtIdDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DiscussPostsModel::getDtIdDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getDtIdDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_dp -> varchar(255)
	 * 
	 * @name getTitleDp
	 * @return varchar
	 */
	public function getTitleDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DiscussPostsModel::getTitleDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getTitleDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text_dp -> text
	 * 
	 * @name getTextDp
	 * @return text
	 */
	public function getTextDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DiscussPostsModel::getTextDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getTextDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_dp -> datetime
	 * 
	 * @name getAddedDp
	 * @return datetime
	 */
	public function getAddedDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set DiscussPostsModel::getAddedDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getAddedDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_dp -> int(16)
	 * 
	 * @name getUsersIdDp
	 * @return int
	 */
	public function getUsersIdDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DiscussPostsModel::getUsersIdDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getUsersIdDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status_dp -> tinyint(2) unsigned
	 * 
	 * @name getStatusDp
	 * @return tinyint
	 */
	public function getStatusDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set DiscussPostsModel::getStatusDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getStatusDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ip_dp -> varchar(15)
	 * 
	 * @name getIpDp
	 * @return varchar
	 */
	public function getIpDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DiscussPostsModel::getIpDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getIpDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link_dp -> varchar(255)
	 * 
	 * @name getLinkDp
	 * @return varchar
	 */
	public function getLinkDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DiscussPostsModel::getLinkDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getLinkDp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of youcode_dp -> varchar(40)
	 * 
	 * @name getYoucodeDp
	 * @return varchar
	 */
	public function getYoucodeDp() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DiscussPostsModel::getYoucodeDp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussPostsModel::getYoucodeDp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DiscussPostsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DiscussPostsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table discuss_posts
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DiscussPostsModel());
	}
	
	/**
	 * Select one item function from table discuss_posts
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
		$ret = DbModel::doSelect($conn, new DiscussPostsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DiscussPostsModel')) return $ret[0];
		else {
			$class = new DiscussPostsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table discuss_posts
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DiscussPostsModel());
	}
	
	/**
	 * Basic pager function from table discuss_posts
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
		return DbModel::doPager($conn, new DiscussPostsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table discuss_posts
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
		return (int) DbModel::doAffected($conn, new DiscussPostsModel());
	}
	
	/**
	 * Basic update function for table discuss_posts
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
		$af = (int) DbModel::doAffected($conn, new DiscussPostsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table discuss_posts
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
		return (int) DbModel::doInsert($conn, new DiscussPostsModel());
	}
	
	/**
	 * Basic reader create function from table discuss_posts
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table discuss_posts
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
	 * Drop table function for table discuss_posts
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