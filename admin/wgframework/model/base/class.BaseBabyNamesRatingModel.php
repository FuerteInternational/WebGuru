<?php
/**
 * Database class for table _baby_names_rating
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/_baby_names_rating
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        20. February 2010 18:10:33
 */

class BaseBabyNamesRatingModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = '_baby_names_rating';
	
	/**
	 * engine
	 */
	const TABLE_ENGINE = 'MyISAM';
	
	/**
	 * collation
	 */
	const TABLE_COLLATION = 'ucs2_general_ci';
	
	/**
	 * row_format
	 */
	const TABLE_ROW_FORMAT = 'Dynamic';
	
	/**
	 * comment
	 */
	const TABLE_COMMENT = '';
	
	
	/**
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`_baby_names_rating`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`_baby_names_rating`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`_baby_names_rating`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * number -> int(11) unsigned
	 */
	const FULL_NUMBER = '`_baby_names_rating`.`number`';
	
	const COL_NUMBER = 'number';
	
	/**
	 * category -> int(4)
	 */
	const FULL_CATEGORY = '`_baby_names_rating`.`category`';
	
	const COL_CATEGORY = 'category';
	
	/**
	 * year -> year(4)
	 */
	const FULL_YEAR = '`_baby_names_rating`.`year`';
	
	const COL_YEAR = 'year';
	
	/**
	 * note -> varchar(255)
	 */
	const FULL_NOTE = '`_baby_names_rating`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * file -> varchar(150)
	 */
	const FULL_FILE = '`_baby_names_rating`.`file`';
	
	const COL_FILE = 'file';
	
	/**
	 * gender -> tinyint(1) unsigned
	 */
	const FULL_GENDER = '`_baby_names_rating`.`gender`';
	
	const COL_GENDER = 'gender';
	
	/**
	 * location -> varchar(150)
	 */
	const FULL_LOCATION = '`_baby_names_rating`.`location`';
	
	const COL_LOCATION = 'location';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`_baby_names_rating`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `_baby_names_rating`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Number'=>2, 'Category'=>3, 'Year'=>4, 'Note'=>5, 'File'=>6, 'Gender'=>7, 'Location'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`_baby_names_rating`.`Id`'=>0, '`_baby_names_rating`.`Name`'=>1, '`_baby_names_rating`.`Number`'=>2, '`_baby_names_rating`.`Category`'=>3, '`_baby_names_rating`.`Year`'=>4, '`_baby_names_rating`.`Note`'=>5, '`_baby_names_rating`.`File`'=>6, '`_baby_names_rating`.`Gender`'=>7, '`_baby_names_rating`.`Location`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'number'=>2, 'category'=>3, 'year'=>4, 'note'=>5, 'file'=>6, 'gender'=>7, 'location'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'number', 'category', 'year', 'note', 'file', 'gender', 'location');
	
	
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
			throw new WgException("BabyNamesRating could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelBabyNamesRating::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('BabyNamesRatingModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BabyNamesRatingModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('BabyNamesRatingModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BabyNamesRatingModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in BabyNamesRatingModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in BabyNamesRatingModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BabyNamesRatingModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BabyNamesRatingModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of number -> int(11) unsigned
	 * 
	 * @name getNumber
	 * @return int
	 */
	public function getNumber() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getNumber', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getNumber', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of category -> int(4)
	 * 
	 * @name getCategory
	 * @return int
	 */
	public function getCategory() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getCategory', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getCategory', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of year -> year(4)
	 * 
	 * @name getYear
	 * @return year
	 */
	public function getYear() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getYear', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getYear', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> varchar(255)
	 * 
	 * @name getNote
	 * @return varchar
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of file -> varchar(150)
	 * 
	 * @name getFile
	 * @return varchar
	 */
	public function getFile() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getFile', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getFile', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of gender -> tinyint(1) unsigned
	 * 
	 * @name getGender
	 * @return tinyint
	 */
	public function getGender() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getGender', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getGender', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of location -> varchar(150)
	 * 
	 * @name getLocation
	 * @return varchar
	 */
	public function getLocation() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set BabyNamesRatingModel::getLocation', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BabyNamesRatingModel::getLocation', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: BabyNamesRatingModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: BabyNamesRatingModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table _baby_names_rating
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new BabyNamesRatingModel());
	}
	
	/**
	 * Select one item function from table _baby_names_rating
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
		$ret = DbModel::doSelect($conn, new BabyNamesRatingModel());
		if (isset($ret[0]) && is_a($ret[0], 'BabyNamesRatingModel')) return $ret[0];
		else {
			$class = new BabyNamesRatingModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table _baby_names_rating
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new BabyNamesRatingModel());
	}
	
	/**
	 * Basic pager function from table _baby_names_rating
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
		return DbModel::doPager($conn, new BabyNamesRatingModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table _baby_names_rating
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
		return (int) DbModel::doAffected($conn, new BabyNamesRatingModel());
	}
	
	/**
	 * Basic update function for table _baby_names_rating
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
		$af = (int) DbModel::doAffected($conn, new BabyNamesRatingModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table _baby_names_rating
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
		return (int) DbModel::doInsert($conn, new BabyNamesRatingModel());
	}
	
	/**
	 * Basic reader create function from table _baby_names_rating
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table _baby_names_rating
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
	 * Drop table function for table _baby_names_rating
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