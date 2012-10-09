<?php
/**
 * Database class for table gallery_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/gallery_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseGalleryItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'gallery_items';
	
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
	
	const FULL_PRIMARY_KEY = '`gallery_items`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`gallery_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`gallery_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * h1 -> varchar(255)
	 */
	const FULL_H1 = '`gallery_items`.`h1`';
	
	const COL_H1 = 'h1';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`gallery_items`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * metakeywords -> text
	 */
	const FULL_METAKEYWORDS = '`gallery_items`.`metakeywords`';
	
	const COL_METAKEYWORDS = 'metakeywords';
	
	/**
	 * metadescription -> text
	 */
	const FULL_METADESCRIPTION = '`gallery_items`.`metadescription`';
	
	const COL_METADESCRIPTION = 'metadescription';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`gallery_items`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`gallery_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * captured -> datetime
	 */
	const FULL_CAPTURED = '`gallery_items`.`captured`';
	
	const COL_CAPTURED = 'captured';
	
	/**
	 * users_id -> int(11) unsigned
	 */
	const FULL_USERS_ID = '`gallery_items`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * system_users_id -> int(11) unsigned
	 */
	const FULL_SYSTEM_USERS_ID = '`gallery_items`.`system_users_id`';
	
	const COL_SYSTEM_USERS_ID = 'system_users_id';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`gallery_items`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * description -> longtext
	 */
	const FULL_DESCRIPTION = '`gallery_items`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * exif -> longtext
	 */
	const FULL_EXIF = '`gallery_items`.`exif`';
	
	const COL_EXIF = 'exif';
	
	/**
	 * sort -> int(11)
	 */
	const FULL_SORT = '`gallery_items`.`sort`';
	
	const COL_SORT = 'sort';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`gallery_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `gallery_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'H1'=>2, 'Title'=>3, 'Metakeywords'=>4, 'Metadescription'=>5, 'Note'=>6, 'Added'=>7, 'Captured'=>8, 'UsersId'=>9, 'SystemUsersId'=>10, 'Head'=>11, 'Description'=>12, 'Exif'=>13, 'Sort'=>14);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`gallery_items`.`Id`'=>0, '`gallery_items`.`Name`'=>1, '`gallery_items`.`H1`'=>2, '`gallery_items`.`Title`'=>3, '`gallery_items`.`Metakeywords`'=>4, '`gallery_items`.`Metadescription`'=>5, '`gallery_items`.`Note`'=>6, '`gallery_items`.`Added`'=>7, '`gallery_items`.`Captured`'=>8, '`gallery_items`.`UsersId`'=>9, '`gallery_items`.`SystemUsersId`'=>10, '`gallery_items`.`Head`'=>11, '`gallery_items`.`Description`'=>12, '`gallery_items`.`Exif`'=>13, '`gallery_items`.`Sort`'=>14);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'h1'=>2, 'title'=>3, 'metakeywords'=>4, 'metadescription'=>5, 'note'=>6, 'added'=>7, 'captured'=>8, 'users_id'=>9, 'system_users_id'=>10, 'head'=>11, 'description'=>12, 'exif'=>13, 'sort'=>14);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'h1', 'title', 'metakeywords', 'metadescription', 'note', 'added', 'captured', 'users_id', 'system_users_id', 'head', 'description', 'exif', 'sort');
	
	
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
			throw new WgException("GalleryItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelGalleryItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('GalleryItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('GalleryItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('GalleryItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('GalleryItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in GalleryItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in GalleryItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set GalleryItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set GalleryItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1 -> varchar(255)
	 * 
	 * @name getH1
	 * @return varchar
	 */
	public function getH1() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set GalleryItemsModel::getH1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getH1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set GalleryItemsModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of metakeywords -> text
	 * 
	 * @name getMetakeywords
	 * @return text
	 */
	public function getMetakeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set GalleryItemsModel::getMetakeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getMetakeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of metadescription -> text
	 * 
	 * @name getMetadescription
	 * @return text
	 */
	public function getMetadescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set GalleryItemsModel::getMetadescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getMetadescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set GalleryItemsModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getNote', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set GalleryItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of captured -> datetime
	 * 
	 * @name getCaptured
	 * @return datetime
	 */
	public function getCaptured() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set GalleryItemsModel::getCaptured', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getCaptured', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11) unsigned
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set GalleryItemsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_users_id -> int(11) unsigned
	 * 
	 * @name getSystemUsersId
	 * @return int
	 */
	public function getSystemUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set GalleryItemsModel::getSystemUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getSystemUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set GalleryItemsModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> longtext
	 * 
	 * @name getDescription
	 * @return longtext
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set GalleryItemsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of exif -> longtext
	 * 
	 * @name getExif
	 * @return longtext
	 */
	public function getExif() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set GalleryItemsModel::getExif', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getExif', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(11)
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set GalleryItemsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From GalleryItemsModel::getSort', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: GalleryItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: GalleryItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table gallery_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new GalleryItemsModel());
	}
	
	/** Left join select function from table gallery_items
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryItemsModel());
	}
	
	/** Right join select function from table gallery_items
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryItemsModel());
	}
	
	/** Inner join select function from table gallery_items
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new GalleryItemsModel());
	}
	
	/**
	 * Select one item function from table gallery_items
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
		$ret = DbModel::doSelect($conn, new GalleryItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'GalleryItemsModel')) return $ret[0];
		else {
			$class = new GalleryItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table gallery_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new GalleryItemsModel());
	}
	
	/**
	 * Basic pager function from table gallery_items
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
		return DbModel::doPager($conn, new GalleryItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table gallery_items
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
		return (int) DbModel::doAffected($conn, new GalleryItemsModel());
	}
	
	/**
	 * Basic update function for table gallery_items
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
		$af = (int) DbModel::doAffected($conn, new GalleryItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table gallery_items
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
		return (int) DbModel::doInsert($conn, new GalleryItemsModel());
	}
	
	/**
	 * Basic reader create function from table gallery_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table gallery_items
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
	 * Drop table function for table gallery_items
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