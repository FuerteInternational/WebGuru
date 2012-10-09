<?php
/**
 * Database class for table dda_pohledavky
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/dda_pohledavky
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 18:42:00
 */

class BaseDdaPohledavkyModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'dda_pohledavky';
	
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
		}
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`dda_pohledavky`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`dda_pohledavky`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`dda_pohledavky`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * dda_firmy_id -> int(10) unsigned
	 */
	const FULL_DDA_FIRMY_ID = '`dda_pohledavky`.`dda_firmy_id`';
	
	const COL_DDA_FIRMY_ID = 'dda_firmy_id';
	
	/**
	 * dda_firmy_dluznik_id -> int(10) unsigned
	 */
	const FULL_DDA_FIRMY_DLUZNIK_ID = '`dda_pohledavky`.`dda_firmy_dluznik_id`';
	
	const COL_DDA_FIRMY_DLUZNIK_ID = 'dda_firmy_dluznik_id';
	
	/**
	 * castka -> int(11)
	 */
	const FULL_CASTKA = '`dda_pohledavky`.`castka`';
	
	const COL_CASTKA = 'castka';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`dda_pohledavky`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * status -> tinyint(1)
	 */
	const FULL_STATUS = '`dda_pohledavky`.`status`';
	
	const COL_STATUS = 'status';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`dda_pohledavky`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `dda_pohledavky`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'UsersId'=>1, 'DdaFirmyId'=>2, 'DdaFirmyDluznikId'=>3, 'Castka'=>4, 'Added'=>5, 'Status'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`dda_pohledavky`.`Id`'=>0, '`dda_pohledavky`.`UsersId`'=>1, '`dda_pohledavky`.`DdaFirmyId`'=>2, '`dda_pohledavky`.`DdaFirmyDluznikId`'=>3, '`dda_pohledavky`.`Castka`'=>4, '`dda_pohledavky`.`Added`'=>5, '`dda_pohledavky`.`Status`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'users_id'=>1, 'dda_firmy_id'=>2, 'dda_firmy_dluznik_id'=>3, 'castka'=>4, 'added'=>5, 'status'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'users_id', 'dda_firmy_id', 'dda_firmy_dluznik_id', 'castka', 'added', 'status');
	
	
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
			throw new WgException("DdaPohledavky could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDdaPohledavky::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DdaPohledavkyModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DdaPohledavkyModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DdaPohledavkyModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DdaPohledavkyModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DdaPohledavkyModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DdaPohledavkyModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(11) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dda_firmy_id -> int(10) unsigned
	 * 
	 * @name getDdaFirmyId
	 * @return int
	 */
	public function getDdaFirmyId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) $this->_result[2];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getDdaFirmyId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getDdaFirmyId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dda_firmy_dluznik_id -> int(10) unsigned
	 * 
	 * @name getDdaFirmyDluznikId
	 * @return int
	 */
	public function getDdaFirmyDluznikId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getDdaFirmyDluznikId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getDdaFirmyDluznikId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of castka -> int(11)
	 * 
	 * @name getCastka
	 * @return int
	 */
	public function getCastka() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) $this->_result[4];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getCastka', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getCastka', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set DdaPohledavkyModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status -> tinyint(1)
	 * 
	 * @name getStatus
	 * @return tinyint
	 */
	public function getStatus() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) $this->_result[6];
			else parent::throwGetColException('Not set DdaPohledavkyModel::getStatus', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DdaPohledavkyModel::getStatus', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DdaPohledavkyModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DdaPohledavkyModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table dda_pohledavky
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DdaPohledavkyModel());
	}
	
	/** Left join select function from table dda_pohledavky
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new DdaPohledavkyModel());
	}
	
	/** Right join select function from table dda_pohledavky
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new DdaPohledavkyModel());
	}
	
	/** Inner join select function from table dda_pohledavky
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new DdaPohledavkyModel());
	}
	
	/**
	 * Select one item function from table dda_pohledavky
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
		$ret = DbModel::doSelect($conn, new DdaPohledavkyModel());
		if (isset($ret[0]) && is_a($ret[0], 'DdaPohledavkyModel')) return $ret[0];
		else {
			$class = new DdaPohledavkyModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table dda_pohledavky
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DdaPohledavkyModel());
	}
	
	/**
	 * Basic pager function from table dda_pohledavky
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
		return DbModel::doPager($conn, new DdaPohledavkyModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table dda_pohledavky
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
		return (int) DbModel::doAffected($conn, new DdaPohledavkyModel());
	}
	
	/**
	 * Basic update function for table dda_pohledavky
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
		$af = (int) DbModel::doAffected($conn, new DdaPohledavkyModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table dda_pohledavky
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
		return (int) DbModel::doInsert($conn, new DdaPohledavkyModel());
	}
	
	/**
	 * Basic reader create function from table dda_pohledavky
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table dda_pohledavky
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
	 * Drop table function for table dda_pohledavky
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