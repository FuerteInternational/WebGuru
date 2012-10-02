<?php
/**
 * Database class for table twitter_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/twitter_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:15
 */

class BaseTwitterTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'twitter_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`twitter_templates`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`twitter_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`twitter_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`twitter_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`twitter_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * limit -> int(4)
	 */
	const FULL_LIMIT = '`twitter_templates`.`limit`';
	
	const COL_LIMIT = 'limit';
	
	/**
	 * datasource -> int(4) unsigned
	 */
	const FULL_DATASOURCE = '`twitter_templates`.`datasource`';
	
	const COL_DATASOURCE = 'datasource';
	
	/**
	 * dateformat -> varchar(150)
	 */
	const FULL_DATEFORMAT = '`twitter_templates`.`dateformat`';
	
	const COL_DATEFORMAT = 'dateformat';
	
	/**
	 * tempbegin -> text
	 */
	const FULL_TEMPBEGIN = '`twitter_templates`.`tempbegin`';
	
	const COL_TEMPBEGIN = 'tempbegin';
	
	/**
	 * tempitem -> text
	 */
	const FULL_TEMPITEM = '`twitter_templates`.`tempitem`';
	
	const COL_TEMPITEM = 'tempitem';
	
	/**
	 * tempend -> text
	 */
	const FULL_TEMPEND = '`twitter_templates`.`tempend`';
	
	const COL_TEMPEND = 'tempend';
	
	/**
	 * twitter_accounts_id -> int(11) unsigned
	 */
	const FULL_TWITTER_ACCOUNTS_ID = '`twitter_templates`.`twitter_accounts_id`';
	
	const COL_TWITTER_ACCOUNTS_ID = 'twitter_accounts_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`twitter_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `twitter_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Limit'=>4, 'Datasource'=>5, 'Dateformat'=>6, 'Tempbegin'=>7, 'Tempitem'=>8, 'Tempend'=>9, 'TwitterAccountsId'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`twitter_templates`.`Id`'=>0, '`twitter_templates`.`Name`'=>1, '`twitter_templates`.`Identifier`'=>2, '`twitter_templates`.`Temptype`'=>3, '`twitter_templates`.`Limit`'=>4, '`twitter_templates`.`Datasource`'=>5, '`twitter_templates`.`Dateformat`'=>6, '`twitter_templates`.`Tempbegin`'=>7, '`twitter_templates`.`Tempitem`'=>8, '`twitter_templates`.`Tempend`'=>9, '`twitter_templates`.`TwitterAccountsId`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'limit'=>4, 'datasource'=>5, 'dateformat'=>6, 'tempbegin'=>7, 'tempitem'=>8, 'tempend'=>9, 'twitter_accounts_id'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'limit', 'datasource', 'dateformat', 'tempbegin', 'tempitem', 'tempend', 'twitter_accounts_id');
	
	
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
			throw new WgException("TwitterTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelTwitterTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('TwitterTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TwitterTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('TwitterTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('TwitterTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in TwitterTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in TwitterTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set TwitterTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set TwitterTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of limit -> int(4)
	 * 
	 * @name getLimit
	 * @return int
	 */
	public function getLimit() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getLimit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getLimit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of datasource -> int(4) unsigned
	 * 
	 * @name getDatasource
	 * @return int
	 */
	public function getDatasource() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getDatasource', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getDatasource', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat -> varchar(150)
	 * 
	 * @name getDateformat
	 * @return varchar
	 */
	public function getDateformat() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getDateformat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getDateformat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempbegin -> text
	 * 
	 * @name getTempbegin
	 * @return text
	 */
	public function getTempbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getTempbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getTempbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempitem -> text
	 * 
	 * @name getTempitem
	 * @return text
	 */
	public function getTempitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getTempitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getTempitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tempend -> text
	 * 
	 * @name getTempend
	 * @return text
	 */
	public function getTempend() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getTempend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getTempend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of twitter_accounts_id -> int(11) unsigned
	 * 
	 * @name getTwitterAccountsId
	 * @return int
	 */
	public function getTwitterAccountsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set TwitterTemplatesModel::getTwitterAccountsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From TwitterTemplatesModel::getTwitterAccountsId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: TwitterTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: TwitterTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table twitter_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new TwitterTemplatesModel());
	}
	
	/**
	 * Select one item function from table twitter_templates
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
		$ret = DbModel::doSelect($conn, new TwitterTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'TwitterTemplatesModel')) return $ret[0];
		else {
			$class = new TwitterTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table twitter_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new TwitterTemplatesModel());
	}
	
	/**
	 * Basic pager function from table twitter_templates
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
		return DbModel::doPager($conn, new TwitterTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table twitter_templates
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
		return (int) DbModel::doAffected($conn, new TwitterTemplatesModel());
	}
	
	/**
	 * Basic update function for table twitter_templates
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
		$af = (int) DbModel::doAffected($conn, new TwitterTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table twitter_templates
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
		return (int) DbModel::doInsert($conn, new TwitterTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table twitter_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table twitter_templates
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
	 * Drop table function for table twitter_templates
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