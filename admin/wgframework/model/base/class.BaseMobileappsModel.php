<?php
/**
 * Database class for table mobileapps
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/mobileapps
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:24
 */

class BaseMobileappsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'mobileapps';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`mobileapps`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`mobileapps`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(150)
	 */
	const FULL_NAME = '`mobileapps`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(150)
	 */
	const FULL_IDENTIFIER = '`mobileapps`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * devtype -> tinyint(1) unsigned
	 */
	const FULL_DEVTYPE = '`mobileapps`.`devtype`';
	
	const COL_DEVTYPE = 'devtype';
	
	/**
	 * apptype -> smallint(1) unsigned
	 */
	const FULL_APPTYPE = '`mobileapps`.`apptype`';
	
	const COL_APPTYPE = 'apptype';
	
	/**
	 * icon -> smallint(1) unsigned
	 */
	const FULL_ICON = '`mobileapps`.`icon`';
	
	const COL_ICON = 'icon';
	
	/**
	 * sort -> int(11)
	 */
	const FULL_SORT = '`mobileapps`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`mobileapps`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`mobileapps`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * version -> varchar(20)
	 */
	const FULL_VERSION = '`mobileapps`.`version`';
	
	const COL_VERSION = 'version';
	
	/**
	 * size -> int(11) unsigned
	 */
	const FULL_SIZE = '`mobileapps`.`size`';
	
	const COL_SIZE = 'size';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`mobileapps`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `mobileapps`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Devtype'=>3, 'Apptype'=>4, 'Icon'=>5, 'Sort'=>6, 'Added'=>7, 'Changed'=>8, 'Version'=>9, 'Size'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`mobileapps`.`Id`'=>0, '`mobileapps`.`Name`'=>1, '`mobileapps`.`Identifier`'=>2, '`mobileapps`.`Devtype`'=>3, '`mobileapps`.`Apptype`'=>4, '`mobileapps`.`Icon`'=>5, '`mobileapps`.`Sort`'=>6, '`mobileapps`.`Added`'=>7, '`mobileapps`.`Changed`'=>8, '`mobileapps`.`Version`'=>9, '`mobileapps`.`Size`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'devtype'=>3, 'apptype'=>4, 'icon'=>5, 'sort'=>6, 'added'=>7, 'changed'=>8, 'version'=>9, 'size'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'devtype', 'apptype', 'icon', 'sort', 'added', 'changed', 'version', 'size');
	
	
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
			throw new WgException("Mobileapps could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelMobileapps::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('MobileappsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MobileappsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('MobileappsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MobileappsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in MobileappsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in MobileappsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set MobileappsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(150)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set MobileappsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(150)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set MobileappsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of devtype -> tinyint(1) unsigned
	 * 
	 * @name getDevtype
	 * @return tinyint
	 */
	public function getDevtype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set MobileappsModel::getDevtype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getDevtype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of apptype -> smallint(1) unsigned
	 * 
	 * @name getApptype
	 * @return smallint
	 */
	public function getApptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set MobileappsModel::getApptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getApptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of icon -> smallint(1) unsigned
	 * 
	 * @name getIcon
	 * @return smallint
	 */
	public function getIcon() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set MobileappsModel::getIcon', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getIcon', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11)
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set MobileappsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getSort', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set MobileappsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set MobileappsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of version -> varchar(20)
	 * 
	 * @name getVersion
	 * @return varchar
	 */
	public function getVersion() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set MobileappsModel::getVersion', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getVersion', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of size -> int(11) unsigned
	 * 
	 * @name getSize
	 * @return int
	 */
	public function getSize() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set MobileappsModel::getSize', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MobileappsModel::getSize', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: MobileappsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: MobileappsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table mobileapps
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new MobileappsModel());
	}
	
	/**
	 * Select one item function from table mobileapps
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
		$ret = DbModel::doSelect($conn, new MobileappsModel());
		if (isset($ret[0]) && is_a($ret[0], 'MobileappsModel')) return $ret[0];
		else {
			$class = new MobileappsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table mobileapps
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new MobileappsModel());
	}
	
	/**
	 * Basic pager function from table mobileapps
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
		return DbModel::doPager($conn, new MobileappsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table mobileapps
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
		return (int) DbModel::doAffected($conn, new MobileappsModel());
	}
	
	/**
	 * Basic update function for table mobileapps
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
		$af = (int) DbModel::doAffected($conn, new MobileappsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table mobileapps
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
		return (int) DbModel::doInsert($conn, new MobileappsModel());
	}
	
	/**
	 * Basic reader create function from table mobileapps
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table mobileapps
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
	 * Drop table function for table mobileapps
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