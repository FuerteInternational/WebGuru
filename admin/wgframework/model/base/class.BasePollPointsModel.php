<?php
/**
 * Database class for table poll_points
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/poll_points
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePollPointsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'poll_points';
	
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
	 * id_ps -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_ps';
	
	const FULL_PRIMARY_KEY = '`poll_points`.`id_ps`';
	
	/**
	 * id_ps -> int(32) unsigned
	 */
	const FULL_ID_PS = '`poll_points`.`id_ps`';
	
	const COL_ID_PS = 'id_ps';
	
	/**
	 * ip_ps -> varchar(20)
	 */
	const FULL_IP_PS = '`poll_points`.`ip_ps`';
	
	const COL_IP_PS = 'ip_ps';
	
	/**
	 * users_id_ps -> int(16)
	 */
	const FULL_USERS_ID_PS = '`poll_points`.`users_id_ps`';
	
	const COL_USERS_ID_PS = 'users_id_ps';
	
	/**
	 * pp_id_ps -> int(8)
	 */
	const FULL_PP_ID_PS = '`poll_points`.`pp_id_ps`';
	
	const COL_PP_ID_PS = 'pp_id_ps';
	
	/**
	 * pq_id_ps -> int(16)
	 */
	const FULL_PQ_ID_PS = '`poll_points`.`pq_id_ps`';
	
	const COL_PQ_ID_PS = 'pq_id_ps';
	
	/**
	 * pg_id_ps -> int(16)
	 */
	const FULL_PG_ID_PS = '`poll_points`.`pg_id_ps`';
	
	const COL_PG_ID_PS = 'pg_id_ps';
	
	/**
	 * added_ps -> datetime
	 */
	const FULL_ADDED_PS = '`poll_points`.`added_ps`';
	
	const COL_ADDED_PS = 'added_ps';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`poll_points`.`id_ps`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `poll_points`.`id_ps`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPs'=>0, 'IpPs'=>1, 'UsersIdPs'=>2, 'PpIdPs'=>3, 'PqIdPs'=>4, 'PgIdPs'=>5, 'AddedPs'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`poll_points`.`IdPs`'=>0, '`poll_points`.`IpPs`'=>1, '`poll_points`.`UsersIdPs`'=>2, '`poll_points`.`PpIdPs`'=>3, '`poll_points`.`PqIdPs`'=>4, '`poll_points`.`PgIdPs`'=>5, '`poll_points`.`AddedPs`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_ps'=>0, 'ip_ps'=>1, 'users_id_ps'=>2, 'pp_id_ps'=>3, 'pq_id_ps'=>4, 'pg_id_ps'=>5, 'added_ps'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_ps', 'ip_ps', 'users_id_ps', 'pp_id_ps', 'pq_id_ps', 'pg_id_ps', 'added_ps');
	
	
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
			throw new WgException("PollPoints could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPollPoints::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PollPointsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollPointsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PollPointsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollPointsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PollPointsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PollPointsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_ps -> int(32) unsigned
	 * 
	 * @name getIdPs
	 * @return int
	 */
	public function getIdPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PollPointsModel::getIdPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getIdPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ip_ps -> varchar(20)
	 * 
	 * @name getIpPs
	 * @return varchar
	 */
	public function getIpPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PollPointsModel::getIpPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getIpPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_ps -> int(16)
	 * 
	 * @name getUsersIdPs
	 * @return int
	 */
	public function getUsersIdPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PollPointsModel::getUsersIdPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getUsersIdPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pp_id_ps -> int(8)
	 * 
	 * @name getPpIdPs
	 * @return int
	 */
	public function getPpIdPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PollPointsModel::getPpIdPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getPpIdPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pq_id_ps -> int(16)
	 * 
	 * @name getPqIdPs
	 * @return int
	 */
	public function getPqIdPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PollPointsModel::getPqIdPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getPqIdPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pg_id_ps -> int(16)
	 * 
	 * @name getPgIdPs
	 * @return int
	 */
	public function getPgIdPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PollPointsModel::getPgIdPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getPgIdPs', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_ps -> datetime
	 * 
	 * @name getAddedPs
	 * @return datetime
	 */
	public function getAddedPs() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set PollPointsModel::getAddedPs', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPointsModel::getAddedPs', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PollPointsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PollPointsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table poll_points
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PollPointsModel());
	}
	
	/**
	 * Select one item function from table poll_points
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
		$ret = DbModel::doSelect($conn, new PollPointsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PollPointsModel')) return $ret[0];
		else {
			$class = new PollPointsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table poll_points
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PollPointsModel());
	}
	
	/**
	 * Basic pager function from table poll_points
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
		return DbModel::doPager($conn, new PollPointsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table poll_points
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
		return (int) DbModel::doAffected($conn, new PollPointsModel());
	}
	
	/**
	 * Basic update function for table poll_points
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
		$af = (int) DbModel::doAffected($conn, new PollPointsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table poll_points
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
		return (int) DbModel::doInsert($conn, new PollPointsModel());
	}
	
	/**
	 * Basic reader create function from table poll_points
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table poll_points
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
	 * Drop table function for table poll_points
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