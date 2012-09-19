<?php
/**
 * Database class for table clicktrack_hits
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/clicktrack_hits
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:27:42
 */

class BaseClicktrackHitsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'clicktrack_hits';
	
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
	 * id -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`clicktrack_hits`.`id`';
	
	/**
	 * id -> int(16) unsigned
	 */
	const FULL_ID = '`clicktrack_hits`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * campaign_id -> int(8) unsigned
	 */
	const FULL_CAMPAIGN_ID = '`clicktrack_hits`.`campaign_id`';
	
	const COL_CAMPAIGN_ID = 'campaign_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`clicktrack_hits`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * top -> int(4) unsigned
	 */
	const FULL_TOP = '`clicktrack_hits`.`top`';
	
	const COL_TOP = 'top';
	
	/**
	 * left -> int(4) unsigned
	 */
	const FULL_LEFT = '`clicktrack_hits`.`left`';
	
	const COL_LEFT = 'left';
	
	/**
	 * usrx -> int(4) unsigned
	 */
	const FULL_USRX = '`clicktrack_hits`.`usrx`';
	
	const COL_USRX = 'usrx';
	
	/**
	 * usry -> int(4) unsigned
	 */
	const FULL_USRY = '`clicktrack_hits`.`usry`';
	
	const COL_USRY = 'usry';
	
	/**
	 * url -> varchar(255)
	 */
	const FULL_URL = '`clicktrack_hits`.`url`';
	
	const COL_URL = 'url';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`clicktrack_hits`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `clicktrack_hits`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'CampaignId'=>1, 'Added'=>2, 'Top'=>3, 'Left'=>4, 'Usrx'=>5, 'Usry'=>6, 'Url'=>7);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`clicktrack_hits`.`Id`'=>0, '`clicktrack_hits`.`CampaignId`'=>1, '`clicktrack_hits`.`Added`'=>2, '`clicktrack_hits`.`Top`'=>3, '`clicktrack_hits`.`Left`'=>4, '`clicktrack_hits`.`Usrx`'=>5, '`clicktrack_hits`.`Usry`'=>6, '`clicktrack_hits`.`Url`'=>7);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'campaign_id'=>1, 'added'=>2, 'top'=>3, 'left'=>4, 'usrx'=>5, 'usry'=>6, 'url'=>7);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'campaign_id', 'added', 'top', 'left', 'usrx', 'usry', 'url');
	
	
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
			throw new WgException("ClicktrackHits could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelClicktrackHits::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ClicktrackHitsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ClicktrackHitsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ClicktrackHitsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ClicktrackHitsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ClicktrackHitsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ClicktrackHitsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(16) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of campaign_id -> int(8) unsigned
	 * 
	 * @name getCampaignId
	 * @return int
	 */
	public function getCampaignId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getCampaignId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getCampaignId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) strtotime($this->_result[2]);
			else parent::throwGetColException('Not set ClicktrackHitsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of top -> int(4) unsigned
	 * 
	 * @name getTop
	 * @return int
	 */
	public function getTop() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getTop', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getTop', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of left -> int(4) unsigned
	 * 
	 * @name getLeft
	 * @return int
	 */
	public function getLeft() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getLeft', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getLeft', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of usrx -> int(4) unsigned
	 * 
	 * @name getUsrx
	 * @return int
	 */
	public function getUsrx() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getUsrx', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getUsrx', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of usry -> int(4) unsigned
	 * 
	 * @name getUsry
	 * @return int
	 */
	public function getUsry() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getUsry', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getUsry', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of url -> varchar(255)
	 * 
	 * @name getUrl
	 * @return varchar
	 */
	public function getUrl() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ClicktrackHitsModel::getUrl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ClicktrackHitsModel::getUrl', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ClicktrackHitsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ClicktrackHitsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table clicktrack_hits
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ClicktrackHitsModel());
	}
	
	/**
	 * Select one item function from table clicktrack_hits
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
		$ret = DbModel::doSelect($conn, new ClicktrackHitsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ClicktrackHitsModel')) return $ret[0];
		else {
			$class = new ClicktrackHitsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table clicktrack_hits
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ClicktrackHitsModel());
	}
	
	/**
	 * Basic pager function from table clicktrack_hits
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
		return DbModel::doPager($conn, new ClicktrackHitsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table clicktrack_hits
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
		return (int) DbModel::doAffected($conn, new ClicktrackHitsModel());
	}
	
	/**
	 * Basic update function for table clicktrack_hits
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
		$af = (int) DbModel::doAffected($conn, new ClicktrackHitsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table clicktrack_hits
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
		return (int) DbModel::doInsert($conn, new ClicktrackHitsModel());
	}
	
	/**
	 * Basic reader create function from table clicktrack_hits
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table clicktrack_hits
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
	 * Drop table function for table clicktrack_hits
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