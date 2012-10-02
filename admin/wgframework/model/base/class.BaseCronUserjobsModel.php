<?php
/**
 * Database class for table cron_userjobs
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/cron_userjobs
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:23
 */

class BaseCronUserjobsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'cron_userjobs';
	
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
	
	const FULL_PRIMARY_KEY = '`cron_userjobs`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`cron_userjobs`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`cron_userjobs`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * datefrom -> datetime
	 */
	const FULL_DATEFROM = '`cron_userjobs`.`datefrom`';
	
	const COL_DATEFROM = 'datefrom';
	
	/**
	 * dateto -> datetime
	 */
	const FULL_DATETO = '`cron_userjobs`.`dateto`';
	
	const COL_DATETO = 'dateto';
	
	/**
	 * period -> int(11) unsigned
	 */
	const FULL_PERIOD = '`cron_userjobs`.`period`';
	
	const COL_PERIOD = 'period';
	
	/**
	 * lastrun -> datetime
	 */
	const FULL_LASTRUN = '`cron_userjobs`.`lastrun`';
	
	const COL_LASTRUN = 'lastrun';
	
	/**
	 * counter -> int(11) unsigned
	 */
	const FULL_COUNTER = '`cron_userjobs`.`counter`';
	
	const COL_COUNTER = 'counter';
	
	/**
	 * user_id -> int(11) unsigned
	 */
	const FULL_USER_ID = '`cron_userjobs`.`user_id`';
	
	const COL_USER_ID = 'user_id';
	
	/**
	 * url -> varchar(255)
	 */
	const FULL_URL = '`cron_userjobs`.`url`';
	
	const COL_URL = 'url';
	
	/**
	 * reportmail -> varchar(255)
	 */
	const FULL_REPORTMAIL = '`cron_userjobs`.`reportmail`';
	
	const COL_REPORTMAIL = 'reportmail';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`cron_userjobs`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `cron_userjobs`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Datefrom'=>2, 'Dateto'=>3, 'Period'=>4, 'Lastrun'=>5, 'Counter'=>6, 'UserId'=>7, 'Url'=>8, 'Reportmail'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`cron_userjobs`.`Id`'=>0, '`cron_userjobs`.`Name`'=>1, '`cron_userjobs`.`Datefrom`'=>2, '`cron_userjobs`.`Dateto`'=>3, '`cron_userjobs`.`Period`'=>4, '`cron_userjobs`.`Lastrun`'=>5, '`cron_userjobs`.`Counter`'=>6, '`cron_userjobs`.`UserId`'=>7, '`cron_userjobs`.`Url`'=>8, '`cron_userjobs`.`Reportmail`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'datefrom'=>2, 'dateto'=>3, 'period'=>4, 'lastrun'=>5, 'counter'=>6, 'user_id'=>7, 'url'=>8, 'reportmail'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'datefrom', 'dateto', 'period', 'lastrun', 'counter', 'user_id', 'url', 'reportmail');
	
	
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
			throw new WgException("CronUserjobs could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCronUserjobs::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CronUserjobsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CronUserjobsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CronUserjobsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CronUserjobsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CronUserjobsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CronUserjobsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CronUserjobsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CronUserjobsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datefrom -> datetime
	 * 
	 * @name getDatefrom
	 * @return datetime
	 */
	public function getDatefrom() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) strtotime($this->_result[2]);
			else parent::throwGetColException('Not set CronUserjobsModel::getDatefrom', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getDatefrom', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateto -> datetime
	 * 
	 * @name getDateto
	 * @return datetime
	 */
	public function getDateto() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set CronUserjobsModel::getDateto', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getDateto', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of period -> int(11) unsigned
	 * 
	 * @name getPeriod
	 * @return int
	 */
	public function getPeriod() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CronUserjobsModel::getPeriod', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getPeriod', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastrun -> datetime
	 * 
	 * @name getLastrun
	 * @return datetime
	 */
	public function getLastrun() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set CronUserjobsModel::getLastrun', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getLastrun', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of counter -> int(11) unsigned
	 * 
	 * @name getCounter
	 * @return int
	 */
	public function getCounter() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CronUserjobsModel::getCounter', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getCounter', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of user_id -> int(11) unsigned
	 * 
	 * @name getUserId
	 * @return int
	 */
	public function getUserId() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CronUserjobsModel::getUserId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getUserId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of url -> varchar(255)
	 * 
	 * @name getUrl
	 * @return varchar
	 */
	public function getUrl() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CronUserjobsModel::getUrl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getUrl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of reportmail -> varchar(255)
	 * 
	 * @name getReportmail
	 * @return varchar
	 */
	public function getReportmail() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CronUserjobsModel::getReportmail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CronUserjobsModel::getReportmail', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CronUserjobsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CronUserjobsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table cron_userjobs
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CronUserjobsModel());
	}
	
	/**
	 * Select one item function from table cron_userjobs
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
		$ret = DbModel::doSelect($conn, new CronUserjobsModel());
		if (isset($ret[0]) && is_a($ret[0], 'CronUserjobsModel')) return $ret[0];
		else {
			$class = new CronUserjobsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table cron_userjobs
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CronUserjobsModel());
	}
	
	/**
	 * Basic pager function from table cron_userjobs
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
		return DbModel::doPager($conn, new CronUserjobsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table cron_userjobs
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
		return (int) DbModel::doAffected($conn, new CronUserjobsModel());
	}
	
	/**
	 * Basic update function for table cron_userjobs
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
		$af = (int) DbModel::doAffected($conn, new CronUserjobsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table cron_userjobs
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
		return (int) DbModel::doInsert($conn, new CronUserjobsModel());
	}
	
	/**
	 * Basic reader create function from table cron_userjobs
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table cron_userjobs
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
	 * Drop table function for table cron_userjobs
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