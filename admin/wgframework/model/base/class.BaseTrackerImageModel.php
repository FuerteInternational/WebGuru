<?php
/**
 * Database class for table tracker_image
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/tracker_image
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseTrackerImageModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'tracker_image';
	
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
	 * id_ti -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_ti';
	
	const FULL_PRIMARY_KEY = '`tracker_image`.`id_ti`';
	
	/**
	 * id_ti -> int(32) unsigned
	 */
	const FULL_ID_TI = '`tracker_image`.`id_ti`';
	
	const COL_ID_TI = 'id_ti';
	
	/**
	 * tc_id_ti -> int(1)
	 */
	const FULL_TC_ID_TI = '`tracker_image`.`tc_id_ti`';
	
	const COL_TC_ID_TI = 'tc_id_ti';
	
	/**
	 * td_id_ti -> int(16)
	 */
	const FULL_TD_ID_TI = '`tracker_image`.`td_id_ti`';
	
	const COL_TD_ID_TI = 'td_id_ti';
	
	/**
	 * fulldate_ti -> datetime
	 */
	const FULL_FULLDATE_TI = '`tracker_image`.`fulldate_ti`';
	
	const COL_FULLDATE_TI = 'fulldate_ti';
	
	/**
	 * referer_ti -> varchar(255)
	 */
	const FULL_REFERER_TI = '`tracker_image`.`referer_ti`';
	
	const COL_REFERER_TI = 'referer_ti';
	
	/**
	 * actual_ti -> varchar(255)
	 */
	const FULL_ACTUAL_TI = '`tracker_image`.`actual_ti`';
	
	const COL_ACTUAL_TI = 'actual_ti';
	
	/**
	 * ip_ti -> varchar(255)
	 */
	const FULL_IP_TI = '`tracker_image`.`ip_ti`';
	
	const COL_IP_TI = 'ip_ti';
	
	/**
	 * agent_ti -> varchar(255)
	 */
	const FULL_AGENT_TI = '`tracker_image`.`agent_ti`';
	
	const COL_AGENT_TI = 'agent_ti';
	
	/**
	 * par_ti -> varchar(255)
	 */
	const FULL_PAR_TI = '`tracker_image`.`par_ti`';
	
	const COL_PAR_TI = 'par_ti';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`tracker_image`.`id_ti`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `tracker_image`.`id_ti`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdTi'=>0, 'TcIdTi'=>1, 'TdIdTi'=>2, 'FulldateTi'=>3, 'RefererTi'=>4, 'ActualTi'=>5, 'IpTi'=>6, 'AgentTi'=>7, 'ParTi'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`tracker_image`.`IdTi`'=>0, '`tracker_image`.`TcIdTi`'=>1, '`tracker_image`.`TdIdTi`'=>2, '`tracker_image`.`FulldateTi`'=>3, '`tracker_image`.`RefererTi`'=>4, '`tracker_image`.`ActualTi`'=>5, '`tracker_image`.`IpTi`'=>6, '`tracker_image`.`AgentTi`'=>7, '`tracker_image`.`ParTi`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_ti'=>0, 'tc_id_ti'=>1, 'td_id_ti'=>2, 'fulldate_ti'=>3, 'referer_ti'=>4, 'actual_ti'=>5, 'ip_ti'=>6, 'agent_ti'=>7, 'par_ti'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_ti', 'tc_id_ti', 'td_id_ti', 'fulldate_ti', 'referer_ti', 'actual_ti', 'ip_ti', 'agent_ti', 'par_ti');
	
	
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
			throw new WgException("TrackerImage could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelTrackerImage::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('TrackerImageModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerImageModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('TrackerImageModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerImageModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in TrackerImageModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in TrackerImageModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_ti -> int(32) unsigned
	 * 
	 * @name getIdTi
	 * @return int
	 */
	public function getIdTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set TrackerImageModel::getIdTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getIdTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tc_id_ti -> int(1)
	 * 
	 * @name getTcIdTi
	 * @return int
	 */
	public function getTcIdTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set TrackerImageModel::getTcIdTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getTcIdTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of td_id_ti -> int(16)
	 * 
	 * @name getTdIdTi
	 * @return int
	 */
	public function getTdIdTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set TrackerImageModel::getTdIdTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getTdIdTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of fulldate_ti -> datetime
	 * 
	 * @name getFulldateTi
	 * @return datetime
	 */
	public function getFulldateTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set TrackerImageModel::getFulldateTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getFulldateTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of referer_ti -> varchar(255)
	 * 
	 * @name getRefererTi
	 * @return varchar
	 */
	public function getRefererTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set TrackerImageModel::getRefererTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getRefererTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of actual_ti -> varchar(255)
	 * 
	 * @name getActualTi
	 * @return varchar
	 */
	public function getActualTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set TrackerImageModel::getActualTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getActualTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ip_ti -> varchar(255)
	 * 
	 * @name getIpTi
	 * @return varchar
	 */
	public function getIpTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set TrackerImageModel::getIpTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getIpTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of agent_ti -> varchar(255)
	 * 
	 * @name getAgentTi
	 * @return varchar
	 */
	public function getAgentTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set TrackerImageModel::getAgentTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getAgentTi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of par_ti -> varchar(255)
	 * 
	 * @name getParTi
	 * @return varchar
	 */
	public function getParTi() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set TrackerImageModel::getParTi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerImageModel::getParTi', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: TrackerImageModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: TrackerImageModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table tracker_image
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new TrackerImageModel());
	}
	
	/**
	 * Select one item function from table tracker_image
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
		$ret = DbModel::doSelect($conn, new TrackerImageModel());
		if (isset($ret[0]) && is_a($ret[0], 'TrackerImageModel')) return $ret[0];
		else {
			$class = new TrackerImageModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table tracker_image
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new TrackerImageModel());
	}
	
	/**
	 * Basic pager function from table tracker_image
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
		return DbModel::doPager($conn, new TrackerImageModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table tracker_image
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
		return (int) DbModel::doAffected($conn, new TrackerImageModel());
	}
	
	/**
	 * Basic update function for table tracker_image
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
		$af = (int) DbModel::doAffected($conn, new TrackerImageModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table tracker_image
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
		return (int) DbModel::doInsert($conn, new TrackerImageModel());
	}
	
	/**
	 * Basic reader create function from table tracker_image
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table tracker_image
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
	 * Drop table function for table tracker_image
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