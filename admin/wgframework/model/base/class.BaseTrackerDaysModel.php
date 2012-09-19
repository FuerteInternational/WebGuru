<?php
/**
 * Database class for table tracker_days
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/tracker_days
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:26
 */

class BaseTrackerDaysModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'tracker_days';
	
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
	const TABLE_ROW_FORMAT = 'Fixed';
	
	/**
	 * comment
	 */
	const TABLE_COMMENT = '';
	
	
	/**
	 * id_td -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_td';
	
	const FULL_PRIMARY_KEY = '`tracker_days`.`id_td`';
	
	/**
	 * id_td -> int(16) unsigned
	 */
	const FULL_ID_TD = '`tracker_days`.`id_td`';
	
	const COL_ID_TD = 'id_td';
	
	/**
	 * tc_id_td -> int(8)
	 */
	const FULL_TC_ID_TD = '`tracker_days`.`tc_id_td`';
	
	const COL_TC_ID_TD = 'tc_id_td';
	
	/**
	 * date_td -> date
	 */
	const FULL_DATE_TD = '`tracker_days`.`date_td`';
	
	const COL_DATE_TD = 'date_td';
	
	/**
	 * count_td -> int(16)
	 */
	const FULL_COUNT_TD = '`tracker_days`.`count_td`';
	
	const COL_COUNT_TD = 'count_td';
	
	/**
	 * unique_td -> int(16)
	 */
	const FULL_UNIQUE_TD = '`tracker_days`.`unique_td`';
	
	const COL_UNIQUE_TD = 'unique_td';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`tracker_days`.`id_td`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `tracker_days`.`id_td`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdTd'=>0, 'TcIdTd'=>1, 'DateTd'=>2, 'CountTd'=>3, 'UniqueTd'=>4);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`tracker_days`.`IdTd`'=>0, '`tracker_days`.`TcIdTd`'=>1, '`tracker_days`.`DateTd`'=>2, '`tracker_days`.`CountTd`'=>3, '`tracker_days`.`UniqueTd`'=>4);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_td'=>0, 'tc_id_td'=>1, 'date_td'=>2, 'count_td'=>3, 'unique_td'=>4);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_td', 'tc_id_td', 'date_td', 'count_td', 'unique_td');
	
	
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
			throw new WgException("TrackerDays could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelTrackerDays::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('TrackerDaysModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerDaysModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('TrackerDaysModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TrackerDaysModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in TrackerDaysModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in TrackerDaysModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_td -> int(16) unsigned
	 * 
	 * @name getIdTd
	 * @return int
	 */
	public function getIdTd() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set TrackerDaysModel::getIdTd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerDaysModel::getIdTd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tc_id_td -> int(8)
	 * 
	 * @name getTcIdTd
	 * @return int
	 */
	public function getTcIdTd() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set TrackerDaysModel::getTcIdTd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerDaysModel::getTcIdTd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of date_td -> date
	 * 
	 * @name getDateTd
	 * @return date
	 */
	public function getDateTd() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set TrackerDaysModel::getDateTd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerDaysModel::getDateTd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of count_td -> int(16)
	 * 
	 * @name getCountTd
	 * @return int
	 */
	public function getCountTd() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set TrackerDaysModel::getCountTd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerDaysModel::getCountTd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of unique_td -> int(16)
	 * 
	 * @name getUniqueTd
	 * @return int
	 */
	public function getUniqueTd() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set TrackerDaysModel::getUniqueTd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TrackerDaysModel::getUniqueTd', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: TrackerDaysModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: TrackerDaysModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table tracker_days
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new TrackerDaysModel());
	}
	
	/**
	 * Select one item function from table tracker_days
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
		$ret = DbModel::doSelect($conn, new TrackerDaysModel());
		if (isset($ret[0]) && is_a($ret[0], 'TrackerDaysModel')) return $ret[0];
		else {
			$class = new TrackerDaysModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table tracker_days
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new TrackerDaysModel());
	}
	
	/**
	 * Basic pager function from table tracker_days
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
		return DbModel::doPager($conn, new TrackerDaysModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table tracker_days
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
		return (int) DbModel::doAffected($conn, new TrackerDaysModel());
	}
	
	/**
	 * Basic update function for table tracker_days
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
		$af = (int) DbModel::doAffected($conn, new TrackerDaysModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table tracker_days
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
		return (int) DbModel::doInsert($conn, new TrackerDaysModel());
	}
	
	/**
	 * Basic reader create function from table tracker_days
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table tracker_days
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
	 * Drop table function for table tracker_days
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