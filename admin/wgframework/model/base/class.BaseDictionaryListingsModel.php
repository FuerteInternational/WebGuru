<?php
/**
 * Database class for table dictionary_listings
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/dictionary_listings
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDictionaryListingsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'dictionary_listings';
	
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
	 * id -> int(4) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`dictionary_listings`.`id`';
	
	/**
	 * id -> int(4) unsigned
	 */
	const FULL_ID = '`dictionary_listings`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * type -> int(1)
	 */
	const FULL_TYPE = '`dictionary_listings`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`dictionary_listings`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`dictionary_listings`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * dictionary_categories_id -> int(8)
	 */
	const FULL_DICTIONARY_CATEGORIES_ID = '`dictionary_listings`.`dictionary_categories_id`';
	
	const COL_DICTIONARY_CATEGORIES_ID = 'dictionary_categories_id';
	
	/**
	 * perpage -> int(4)
	 */
	const FULL_PERPAGE = '`dictionary_listings`.`perpage`';
	
	const COL_PERPAGE = 'perpage';
	
	/**
	 * link -> varchar(255)
	 */
	const FULL_LINK = '`dictionary_listings`.`link`';
	
	const COL_LINK = 'link';
	
	/**
	 * tbegin -> text
	 */
	const FULL_TBEGIN = '`dictionary_listings`.`tbegin`';
	
	const COL_TBEGIN = 'tbegin';
	
	/**
	 * titem -> text
	 */
	const FULL_TITEM = '`dictionary_listings`.`titem`';
	
	const COL_TITEM = 'titem';
	
	/**
	 * tend -> text
	 */
	const FULL_TEND = '`dictionary_listings`.`tend`';
	
	const COL_TEND = 'tend';
	
	/**
	 * pager -> tinyint(1)
	 */
	const FULL_PAGER = '`dictionary_listings`.`pager`';
	
	const COL_PAGER = 'pager';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`dictionary_listings`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `dictionary_listings`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Type'=>1, 'Name'=>2, 'Identifier'=>3, 'DictionaryCategoriesId'=>4, 'Perpage'=>5, 'Link'=>6, 'Tbegin'=>7, 'Titem'=>8, 'Tend'=>9, 'Pager'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`dictionary_listings`.`Id`'=>0, '`dictionary_listings`.`Type`'=>1, '`dictionary_listings`.`Name`'=>2, '`dictionary_listings`.`Identifier`'=>3, '`dictionary_listings`.`DictionaryCategoriesId`'=>4, '`dictionary_listings`.`Perpage`'=>5, '`dictionary_listings`.`Link`'=>6, '`dictionary_listings`.`Tbegin`'=>7, '`dictionary_listings`.`Titem`'=>8, '`dictionary_listings`.`Tend`'=>9, '`dictionary_listings`.`Pager`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'type'=>1, 'name'=>2, 'identifier'=>3, 'dictionary_categories_id'=>4, 'perpage'=>5, 'link'=>6, 'tbegin'=>7, 'titem'=>8, 'tend'=>9, 'pager'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'type', 'name', 'identifier', 'dictionary_categories_id', 'perpage', 'link', 'tbegin', 'titem', 'tend', 'pager');
	
	
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
			throw new WgException("DictionaryListings could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDictionaryListings::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DictionaryListingsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DictionaryListingsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DictionaryListingsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DictionaryListingsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DictionaryListingsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DictionaryListingsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(4) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DictionaryListingsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> int(1)
	 * 
	 * @name getType
	 * @return int
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DictionaryListingsModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DictionaryListingsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DictionaryListingsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dictionary_categories_id -> int(8)
	 * 
	 * @name getDictionaryCategoriesId
	 * @return int
	 */
	public function getDictionaryCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DictionaryListingsModel::getDictionaryCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getDictionaryCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage -> int(4)
	 * 
	 * @name getPerpage
	 * @return int
	 */
	public function getPerpage() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DictionaryListingsModel::getPerpage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getPerpage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link -> varchar(255)
	 * 
	 * @name getLink
	 * @return varchar
	 */
	public function getLink() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set DictionaryListingsModel::getLink', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getLink', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tbegin -> text
	 * 
	 * @name getTbegin
	 * @return text
	 */
	public function getTbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DictionaryListingsModel::getTbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getTbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of titem -> text
	 * 
	 * @name getTitem
	 * @return text
	 */
	public function getTitem() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DictionaryListingsModel::getTitem', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getTitem', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tend -> text
	 * 
	 * @name getTend
	 * @return text
	 */
	public function getTend() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DictionaryListingsModel::getTend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getTend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pager -> tinyint(1)
	 * 
	 * @name getPager
	 * @return tinyint
	 */
	public function getPager() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set DictionaryListingsModel::getPager', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryListingsModel::getPager', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DictionaryListingsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DictionaryListingsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table dictionary_listings
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DictionaryListingsModel());
	}
	
	/**
	 * Select one item function from table dictionary_listings
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
		$ret = DbModel::doSelect($conn, new DictionaryListingsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DictionaryListingsModel')) return $ret[0];
		else {
			$class = new DictionaryListingsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table dictionary_listings
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DictionaryListingsModel());
	}
	
	/**
	 * Basic pager function from table dictionary_listings
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
		return DbModel::doPager($conn, new DictionaryListingsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table dictionary_listings
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
		return (int) DbModel::doAffected($conn, new DictionaryListingsModel());
	}
	
	/**
	 * Basic update function for table dictionary_listings
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
		$af = (int) DbModel::doAffected($conn, new DictionaryListingsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table dictionary_listings
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
		return (int) DbModel::doInsert($conn, new DictionaryListingsModel());
	}
	
	/**
	 * Basic reader create function from table dictionary_listings
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table dictionary_listings
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
	 * Drop table function for table dictionary_listings
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