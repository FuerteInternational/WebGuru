<?php
/**
 * Database class for table system_websites
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/system_websites
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class BaseSystemWebsitesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'system_websites';
	
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
	 * id -> int(4)
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`system_websites`.`id`';
	
	/**
	 * id -> int(4)
	 */
	const FULL_ID = '`system_websites`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(32)
	 */
	const FULL_NAME = '`system_websites`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * code -> char(3)
	 */
	const FULL_CODE = '`system_websites`.`code`';
	
	const COL_CODE = 'code';
	
	/**
	 * image -> varchar(15)
	 */
	const FULL_IMAGE = '`system_websites`.`image`';
	
	const COL_IMAGE = 'image';
	
	/**
	 * directory -> varchar(255)
	 */
	const FULL_DIRECTORY = '`system_websites`.`directory`';
	
	const COL_DIRECTORY = 'directory';
	
	/**
	 * sort -> int(3)
	 */
	const FULL_SORT = '`system_websites`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * isdefault -> tinyint(1)
	 */
	const FULL_ISDEFAULT = '`system_websites`.`isdefault`';
	
	const COL_ISDEFAULT = 'isdefault';
	
	/**
	 * alternativepath -> varchar(255)
	 */
	const FULL_ALTERNATIVEPATH = '`system_websites`.`alternativepath`';
	
	const COL_ALTERNATIVEPATH = 'alternativepath';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`system_websites`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`system_websites`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`system_websites`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `system_websites`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Code'=>2, 'Image'=>3, 'Directory'=>4, 'Sort'=>5, 'Isdefault'=>6, 'Alternativepath'=>7, 'Added'=>8, 'Changed'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`system_websites`.`Id`'=>0, '`system_websites`.`Name`'=>1, '`system_websites`.`Code`'=>2, '`system_websites`.`Image`'=>3, '`system_websites`.`Directory`'=>4, '`system_websites`.`Sort`'=>5, '`system_websites`.`Isdefault`'=>6, '`system_websites`.`Alternativepath`'=>7, '`system_websites`.`Added`'=>8, '`system_websites`.`Changed`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'code'=>2, 'image'=>3, 'directory'=>4, 'sort'=>5, 'isdefault'=>6, 'alternativepath'=>7, 'added'=>8, 'changed'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'code', 'image', 'directory', 'sort', 'isdefault', 'alternativepath', 'added', 'changed');
	
	
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
			throw new WgException("SystemWebsites could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSystemWebsites::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SystemWebsitesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemWebsitesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SystemWebsitesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemWebsitesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SystemWebsitesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SystemWebsitesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(4)
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SystemWebsitesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(32)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SystemWebsitesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of code -> char(3)
	 * 
	 * @name getCode
	 * @return char
	 */
	public function getCode() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SystemWebsitesModel::getCode', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getCode', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> varchar(15)
	 * 
	 * @name getImage
	 * @return varchar
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SystemWebsitesModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getImage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of directory -> varchar(255)
	 * 
	 * @name getDirectory
	 * @return varchar
	 */
	public function getDirectory() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SystemWebsitesModel::getDirectory', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getDirectory', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(3)
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SystemWebsitesModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of isdefault -> tinyint(1)
	 * 
	 * @name getIsdefault
	 * @return tinyint
	 */
	public function getIsdefault() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SystemWebsitesModel::getIsdefault', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getIsdefault', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of alternativepath -> varchar(255)
	 * 
	 * @name getAlternativepath
	 * @return varchar
	 */
	public function getAlternativepath() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SystemWebsitesModel::getAlternativepath', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getAlternativepath', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set SystemWebsitesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set SystemWebsitesModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemWebsitesModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SystemWebsitesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SystemWebsitesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table system_websites
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SystemWebsitesModel());
	}
	
	/**
	 * Select one item function from table system_websites
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
		$ret = DbModel::doSelect($conn, new SystemWebsitesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SystemWebsitesModel')) return $ret[0];
		else {
			$class = new SystemWebsitesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table system_websites
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SystemWebsitesModel());
	}
	
	/**
	 * Basic pager function from table system_websites
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
		return DbModel::doPager($conn, new SystemWebsitesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table system_websites
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
		return (int) DbModel::doAffected($conn, new SystemWebsitesModel());
	}
	
	/**
	 * Basic update function for table system_websites
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
		$af = (int) DbModel::doAffected($conn, new SystemWebsitesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table system_websites
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
		return (int) DbModel::doInsert($conn, new SystemWebsitesModel());
	}
	
	/**
	 * Basic reader create function from table system_websites
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table system_websites
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
	 * Drop table function for table system_websites
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