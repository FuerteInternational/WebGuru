<?php
/**
 * Database class for table motocatalogue_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/motocatalogue_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        28. September 2012 16:42:12
 */

class BaseMotocatalogueItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'motocatalogue_items';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`motocatalogue_items`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`motocatalogue_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`motocatalogue_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * pretext -> text
	 */
	const FULL_PRETEXT = '`motocatalogue_items`.`pretext`';
	
	const COL_PRETEXT = 'pretext';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`motocatalogue_items`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * cubature -> varchar(50)
	 */
	const FULL_CUBATURE = '`motocatalogue_items`.`cubature`';
	
	const COL_CUBATURE = 'cubature';
	
	/**
	 * power -> varchar(50)
	 */
	const FULL_POWER = '`motocatalogue_items`.`power`';
	
	const COL_POWER = 'power';
	
	/**
	 * kilometers -> varchar(50)
	 */
	const FULL_KILOMETERS = '`motocatalogue_items`.`kilometers`';
	
	const COL_KILOMETERS = 'kilometers';
	
	/**
	 * price -> int(11)
	 */
	const FULL_PRICE = '`motocatalogue_items`.`price`';
	
	const COL_PRICE = 'price';
	
	/**
	 * vintage -> date
	 */
	const FULL_VINTAGE = '`motocatalogue_items`.`vintage`';
	
	const COL_VINTAGE = 'vintage';
	
	/**
	 * technical_approve -> tinyint(1)
	 */
	const FULL_TECHNICAL_APPROVE = '`motocatalogue_items`.`technical_approve`';
	
	const COL_TECHNICAL_APPROVE = 'technical_approve';
	
	/**
	 * origin -> int(11)
	 */
	const FULL_ORIGIN = '`motocatalogue_items`.`origin`';
	
	const COL_ORIGIN = 'origin';
	
	/**
	 * leasing -> tinyint(1)
	 */
	const FULL_LEASING = '`motocatalogue_items`.`leasing`';
	
	const COL_LEASING = 'leasing';
	
	/**
	 * tax -> tinyint(1)
	 */
	const FULL_TAX = '`motocatalogue_items`.`tax`';
	
	const COL_TAX = 'tax';
	
	/**
	 * brand -> varchar(100)
	 */
	const FULL_BRAND = '`motocatalogue_items`.`brand`';
	
	const COL_BRAND = 'brand';
	
	/**
	 * type -> varchar(100)
	 */
	const FULL_TYPE = '`motocatalogue_items`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * promo -> tinyint(1)
	 */
	const FULL_PROMO = '`motocatalogue_items`.`promo`';
	
	const COL_PROMO = 'promo';
	
	/**
	 * state -> varchar(50)
	 */
	const FULL_STATE = '`motocatalogue_items`.`state`';
	
	const COL_STATE = 'state';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`motocatalogue_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`motocatalogue_items`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`motocatalogue_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `motocatalogue_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Pretext'=>2, 'Description'=>3, 'Cubature'=>4, 'Power'=>5, 'Kilometers'=>6, 'Price'=>7, 'Vintage'=>8, 'TechnicalApprove'=>9, 'Origin'=>10, 'Leasing'=>11, 'Tax'=>12, 'Brand'=>13, 'Type'=>14, 'Promo'=>15, 'State'=>16, 'Added'=>17, 'Changed'=>18);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`motocatalogue_items`.`Id`'=>0, '`motocatalogue_items`.`Name`'=>1, '`motocatalogue_items`.`Pretext`'=>2, '`motocatalogue_items`.`Description`'=>3, '`motocatalogue_items`.`Cubature`'=>4, '`motocatalogue_items`.`Power`'=>5, '`motocatalogue_items`.`Kilometers`'=>6, '`motocatalogue_items`.`Price`'=>7, '`motocatalogue_items`.`Vintage`'=>8, '`motocatalogue_items`.`TechnicalApprove`'=>9, '`motocatalogue_items`.`Origin`'=>10, '`motocatalogue_items`.`Leasing`'=>11, '`motocatalogue_items`.`Tax`'=>12, '`motocatalogue_items`.`Brand`'=>13, '`motocatalogue_items`.`Type`'=>14, '`motocatalogue_items`.`Promo`'=>15, '`motocatalogue_items`.`State`'=>16, '`motocatalogue_items`.`Added`'=>17, '`motocatalogue_items`.`Changed`'=>18);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'pretext'=>2, 'description'=>3, 'cubature'=>4, 'power'=>5, 'kilometers'=>6, 'price'=>7, 'vintage'=>8, 'technical_approve'=>9, 'origin'=>10, 'leasing'=>11, 'tax'=>12, 'brand'=>13, 'type'=>14, 'promo'=>15, 'state'=>16, 'added'=>17, 'changed'=>18);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'pretext', 'description', 'cubature', 'power', 'kilometers', 'price', 'vintage', 'technical_approve', 'origin', 'leasing', 'tax', 'brand', 'type', 'promo', 'state', 'added', 'changed');
	
	
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
			throw new WgException("MotocatalogueItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelMotocatalogueItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('MotocatalogueItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MotocatalogueItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('MotocatalogueItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('MotocatalogueItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in MotocatalogueItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in MotocatalogueItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pretext -> text
	 * 
	 * @name getPretext
	 * @return text
	 */
	public function getPretext() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getPretext', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getPretext', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cubature -> varchar(50)
	 * 
	 * @name getCubature
	 * @return varchar
	 */
	public function getCubature() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getCubature', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getCubature', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of power -> varchar(50)
	 * 
	 * @name getPower
	 * @return varchar
	 */
	public function getPower() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getPower', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getPower', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of kilometers -> varchar(50)
	 * 
	 * @name getKilometers
	 * @return varchar
	 */
	public function getKilometers() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getKilometers', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getKilometers', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of price -> int(11)
	 * 
	 * @name getPrice
	 * @return int
	 */
	public function getPrice() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getPrice', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getPrice', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of vintage -> date
	 * 
	 * @name getVintage
	 * @return date
	 */
	public function getVintage() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getVintage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getVintage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of technical_approve -> tinyint(1)
	 * 
	 * @name getTechnicalApprove
	 * @return tinyint
	 */
	public function getTechnicalApprove() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getTechnicalApprove', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getTechnicalApprove', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of origin -> int(11)
	 * 
	 * @name getOrigin
	 * @return int
	 */
	public function getOrigin() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getOrigin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getOrigin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of leasing -> tinyint(1)
	 * 
	 * @name getLeasing
	 * @return tinyint
	 */
	public function getLeasing() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getLeasing', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getLeasing', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tax -> tinyint(1)
	 * 
	 * @name getTax
	 * @return tinyint
	 */
	public function getTax() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getTax', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getTax', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of brand -> varchar(100)
	 * 
	 * @name getBrand
	 * @return varchar
	 */
	public function getBrand() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getBrand', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getBrand', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> varchar(100)
	 * 
	 * @name getType
	 * @return varchar
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of promo -> tinyint(1)
	 * 
	 * @name getPromo
	 * @return tinyint
	 */
	public function getPromo() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getPromo', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getPromo', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of state -> varchar(50)
	 * 
	 * @name getState
	 * @return varchar
	 */
	public function getState() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getState', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getState', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (int) strtotime($this->_result[17]);
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (int) strtotime($this->_result[18]);
			else parent::throwGetColException('Not set MotocatalogueItemsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From MotocatalogueItemsModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: MotocatalogueItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: MotocatalogueItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table motocatalogue_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new MotocatalogueItemsModel());
	}
	
	/**
	 * Select one item function from table motocatalogue_items
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
		$ret = DbModel::doSelect($conn, new MotocatalogueItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'MotocatalogueItemsModel')) return $ret[0];
		else {
			$class = new MotocatalogueItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table motocatalogue_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new MotocatalogueItemsModel());
	}
	
	/**
	 * Basic pager function from table motocatalogue_items
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
		return DbModel::doPager($conn, new MotocatalogueItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table motocatalogue_items
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
		return (int) DbModel::doAffected($conn, new MotocatalogueItemsModel());
	}
	
	/**
	 * Basic update function for table motocatalogue_items
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
		$af = (int) DbModel::doAffected($conn, new MotocatalogueItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table motocatalogue_items
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
		return (int) DbModel::doInsert($conn, new MotocatalogueItemsModel());
	}
	
	/**
	 * Basic reader create function from table motocatalogue_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table motocatalogue_items
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
	 * Drop table function for table motocatalogue_items
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