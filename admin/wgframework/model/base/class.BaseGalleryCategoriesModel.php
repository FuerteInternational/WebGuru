<?php
/**
 * Database class for table gallery_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/gallery_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:59
 */

class BaseGalleryCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'gallery_categories';
	
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
	
	const FULL_PRIMARY_KEY = '`gallery_categories`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`gallery_categories`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * parent -> int(11)
	 */
	const FULL_PARENT = '`gallery_categories`.`parent`';
	
	const COL_PARENT = 'parent';
	
	/**
	 * system_language_id -> int(3)
	 */
	const FULL_SYSTEM_LANGUAGE_ID = '`gallery_categories`.`system_language_id`';
	
	const COL_SYSTEM_LANGUAGE_ID = 'system_language_id';
	
	/**
	 * system_websites_id -> int(4)
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`gallery_categories`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`gallery_categories`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`gallery_categories`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`gallery_categories`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`gallery_categories`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * main_thumb_id -> bigint(20) unsigned
	 */
	const FULL_MAIN_THUMB_ID = '`gallery_categories`.`main_thumb_id`';
	
	const COL_MAIN_THUMB_ID = 'main_thumb_id';
	
	/**
	 * date -> datetime
	 */
	const FULL_DATE = '`gallery_categories`.`date`';
	
	const COL_DATE = 'date';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`gallery_categories`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * description -> longtext
	 */
	const FULL_DESCRIPTION = '`gallery_categories`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`gallery_categories`.`note`';
	
	const COL_NOTE = 'note';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`gallery_categories`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `gallery_categories`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Parent'=>1, 'SystemLanguageId'=>2, 'SystemWebsitesId'=>3, 'Name'=>4, 'Identifier'=>5, 'Added'=>6, 'Changed'=>7, 'MainThumbId'=>8, 'Date'=>9, 'Head'=>10, 'Description'=>11, 'Note'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`gallery_categories`.`Id`'=>0, '`gallery_categories`.`Parent`'=>1, '`gallery_categories`.`SystemLanguageId`'=>2, '`gallery_categories`.`SystemWebsitesId`'=>3, '`gallery_categories`.`Name`'=>4, '`gallery_categories`.`Identifier`'=>5, '`gallery_categories`.`Added`'=>6, '`gallery_categories`.`Changed`'=>7, '`gallery_categories`.`MainThumbId`'=>8, '`gallery_categories`.`Date`'=>9, '`gallery_categories`.`Head`'=>10, '`gallery_categories`.`Description`'=>11, '`gallery_categories`.`Note`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'parent'=>1, 'system_language_id'=>2, 'system_websites_id'=>3, 'name'=>4, 'identifier'=>5, 'added'=>6, 'changed'=>7, 'main_thumb_id'=>8, 'date'=>9, 'head'=>10, 'description'=>11, 'note'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'parent', 'system_language_id', 'system_websites_id', 'name', 'identifier', 'added', 'changed', 'main_thumb_id', 'date', 'head', 'description', 'note');
	
	
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
			throw new WgException("GalleryCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelGalleryCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('GalleryCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('GalleryCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('GalleryCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('GalleryCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in GalleryCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in GalleryCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set GalleryCategoriesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parent -> int(11)
	 * 
	 * @name getParent
	 * @return int
	 */
	public function getParent() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getParent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getParent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_language_id -> int(3)
	 * 
	 * @name getSystemLanguageId
	 * @return int
	 */
	public function getSystemLanguageId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) $this->_result[2];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getSystemLanguageId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getSystemLanguageId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4)
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) $this->_result[3];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getSystemWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set GalleryCategoriesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set GalleryCategoriesModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of main_thumb_id -> bigint(20) unsigned
	 * 
	 * @name getMainThumbId
	 * @return bigint
	 */
	public function getMainThumbId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getMainThumbId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getMainThumbId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of date -> datetime
	 * 
	 * @name getDate
	 * @return datetime
	 */
	public function getDate() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set GalleryCategoriesModel::getDate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getDate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> longtext
	 * 
	 * @name getDescription
	 * @return longtext
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set GalleryCategoriesModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryCategoriesModel::getNote', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: GalleryCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: GalleryCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table gallery_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new GalleryCategoriesModel());
	}
	
	/** Left join select function from table gallery_categories
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryCategoriesModel());
	}
	
	/** Right join select function from table gallery_categories
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryCategoriesModel());
	}
	
	/** Inner join select function from table gallery_categories
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryCategoriesModel());
	}
	
	/**
	 * Select one item function from table gallery_categories
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
		$ret = DbModel::doSelect($conn, new GalleryCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'GalleryCategoriesModel')) return $ret[0];
		else {
			$class = new GalleryCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table gallery_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new GalleryCategoriesModel());
	}
	
	/**
	 * Basic pager function from table gallery_categories
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
		return DbModel::doPager($conn, new GalleryCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table gallery_categories
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
		return (int) DbModel::doAffected($conn, new GalleryCategoriesModel());
	}
	
	/**
	 * Basic update function for table gallery_categories
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
		$af = (int) DbModel::doAffected($conn, new GalleryCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table gallery_categories
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
		return (int) DbModel::doInsert($conn, new GalleryCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table gallery_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table gallery_categories
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
	 * Drop table function for table gallery_categories
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