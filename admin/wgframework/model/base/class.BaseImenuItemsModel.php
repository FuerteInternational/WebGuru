<?php
/**
 * Database class for table imenu_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/imenu_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseImenuItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'imenu_items';
	
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
	
	const FULL_PRIMARY_KEY = '`imenu_items`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`imenu_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`imenu_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * type -> varchar(10)
	 */
	const FULL_TYPE = '`imenu_items`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * image -> varchar(255)
	 */
	const FULL_IMAGE = '`imenu_items`.`image`';
	
	const COL_IMAGE = 'image';
	
	/**
	 * imagetype -> tinyint(1)
	 */
	const FULL_IMAGETYPE = '`imenu_items`.`imagetype`';
	
	const COL_IMAGETYPE = 'imagetype';
	
	/**
	 * variable1 -> varchar(255)
	 */
	const FULL_VARIABLE1 = '`imenu_items`.`variable1`';
	
	const COL_VARIABLE1 = 'variable1';
	
	/**
	 * variable2 -> varchar(255)
	 */
	const FULL_VARIABLE2 = '`imenu_items`.`variable2`';
	
	const COL_VARIABLE2 = 'variable2';
	
	/**
	 * variable3 -> varchar(255)
	 */
	const FULL_VARIABLE3 = '`imenu_items`.`variable3`';
	
	const COL_VARIABLE3 = 'variable3';
	
	/**
	 * sort -> int(11) unsigned
	 */
	const FULL_SORT = '`imenu_items`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * imenu_menus_id -> int(11) unsigned
	 */
	const FULL_IMENU_MENUS_ID = '`imenu_items`.`imenu_menus_id`';
	
	const COL_IMENU_MENUS_ID = 'imenu_menus_id';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`imenu_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `imenu_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Type'=>2, 'Image'=>3, 'Imagetype'=>4, 'Variable1'=>5, 'Variable2'=>6, 'Variable3'=>7, 'Sort'=>8, 'ImenuMenusId'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`imenu_items`.`Id`'=>0, '`imenu_items`.`Name`'=>1, '`imenu_items`.`Type`'=>2, '`imenu_items`.`Image`'=>3, '`imenu_items`.`Imagetype`'=>4, '`imenu_items`.`Variable1`'=>5, '`imenu_items`.`Variable2`'=>6, '`imenu_items`.`Variable3`'=>7, '`imenu_items`.`Sort`'=>8, '`imenu_items`.`ImenuMenusId`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'type'=>2, 'image'=>3, 'imagetype'=>4, 'variable1'=>5, 'variable2'=>6, 'variable3'=>7, 'sort'=>8, 'imenu_menus_id'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'type', 'image', 'imagetype', 'variable1', 'variable2', 'variable3', 'sort', 'imenu_menus_id');
	
	
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
			throw new WgException("ImenuItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelImenuItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ImenuItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ImenuItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ImenuItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ImenuItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ImenuItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ImenuItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ImenuItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ImenuItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> varchar(10)
	 * 
	 * @name getType
	 * @return varchar
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ImenuItemsModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> varchar(255)
	 * 
	 * @name getImage
	 * @return varchar
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ImenuItemsModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getImage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of imagetype -> tinyint(1)
	 * 
	 * @name getImagetype
	 * @return tinyint
	 */
	public function getImagetype() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ImenuItemsModel::getImagetype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getImagetype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable1 -> varchar(255)
	 * 
	 * @name getVariable1
	 * @return varchar
	 */
	public function getVariable1() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ImenuItemsModel::getVariable1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getVariable1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable2 -> varchar(255)
	 * 
	 * @name getVariable2
	 * @return varchar
	 */
	public function getVariable2() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ImenuItemsModel::getVariable2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getVariable2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of variable3 -> varchar(255)
	 * 
	 * @name getVariable3
	 * @return varchar
	 */
	public function getVariable3() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ImenuItemsModel::getVariable3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getVariable3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11) unsigned
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set ImenuItemsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of imenu_menus_id -> int(11) unsigned
	 * 
	 * @name getImenuMenusId
	 * @return int
	 */
	public function getImenuMenusId() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set ImenuItemsModel::getImenuMenusId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ImenuItemsModel::getImenuMenusId', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ImenuItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ImenuItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table imenu_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ImenuItemsModel());
	}
	
	/** Left join select function from table imenu_items
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ImenuItemsModel());
	}
	
	/** Right join select function from table imenu_items
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ImenuItemsModel());
	}
	
	/** Inner join select function from table imenu_items
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ImenuItemsModel());
	}
	
	/**
	 * Select one item function from table imenu_items
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
		$ret = DbModel::doSelect($conn, new ImenuItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ImenuItemsModel')) return $ret[0];
		else {
			$class = new ImenuItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table imenu_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ImenuItemsModel());
	}
	
	/**
	 * Basic pager function from table imenu_items
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
		return DbModel::doPager($conn, new ImenuItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table imenu_items
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
		return (int) DbModel::doAffected($conn, new ImenuItemsModel());
	}
	
	/**
	 * Basic update function for table imenu_items
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
		$af = (int) DbModel::doAffected($conn, new ImenuItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table imenu_items
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
		return (int) DbModel::doInsert($conn, new ImenuItemsModel());
	}
	
	/**
	 * Basic reader create function from table imenu_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table imenu_items
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
	 * Drop table function for table imenu_items
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