<?php
/**
 * Database class for table documents_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/documents_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:55
 */

class BaseDocumentsItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'documents_items';
	
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
	
	const FULL_PRIMARY_KEY = '`documents_items`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`documents_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * documents_categories_id -> int(8) unsigned
	 */
	const FULL_DOCUMENTS_CATEGORIES_ID = '`documents_items`.`documents_categories_id`';
	
	const COL_DOCUMENTS_CATEGORIES_ID = 'documents_categories_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`documents_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * file -> varchar(255)
	 */
	const FULL_FILE = '`documents_items`.`file`';
	
	const COL_FILE = 'file';
	
	/**
	 * size -> int(8) unsigned
	 */
	const FULL_SIZE = '`documents_items`.`size`';
	
	const COL_SIZE = 'size';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`documents_items`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`documents_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`documents_items`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`documents_items`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	/**
	 * views -> int(11) unsigned
	 */
	const FULL_VIEWS = '`documents_items`.`views`';
	
	const COL_VIEWS = 'views';
	
	/**
	 * downloads -> int(11) unsigned
	 */
	const FULL_DOWNLOADS = '`documents_items`.`downloads`';
	
	const COL_DOWNLOADS = 'downloads';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`documents_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `documents_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'DocumentsCategoriesId'=>1, 'Name'=>2, 'File'=>3, 'Size'=>4, 'Description'=>5, 'Added'=>6, 'Changed'=>7, 'Enabled'=>8, 'Views'=>9, 'Downloads'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`documents_items`.`Id`'=>0, '`documents_items`.`DocumentsCategoriesId`'=>1, '`documents_items`.`Name`'=>2, '`documents_items`.`File`'=>3, '`documents_items`.`Size`'=>4, '`documents_items`.`Description`'=>5, '`documents_items`.`Added`'=>6, '`documents_items`.`Changed`'=>7, '`documents_items`.`Enabled`'=>8, '`documents_items`.`Views`'=>9, '`documents_items`.`Downloads`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'documents_categories_id'=>1, 'name'=>2, 'file'=>3, 'size'=>4, 'description'=>5, 'added'=>6, 'changed'=>7, 'enabled'=>8, 'views'=>9, 'downloads'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'documents_categories_id', 'name', 'file', 'size', 'description', 'added', 'changed', 'enabled', 'views', 'downloads');
	
	
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
			throw new WgException("DocumentsItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDocumentsItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DocumentsItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DocumentsItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DocumentsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DocumentsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DocumentsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DocumentsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DocumentsItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of documents_categories_id -> int(8) unsigned
	 * 
	 * @name getDocumentsCategoriesId
	 * @return int
	 */
	public function getDocumentsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DocumentsItemsModel::getDocumentsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getDocumentsCategoriesId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DocumentsItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of file -> varchar(255)
	 * 
	 * @name getFile
	 * @return varchar
	 */
	public function getFile() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DocumentsItemsModel::getFile', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getFile', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of size -> int(8) unsigned
	 * 
	 * @name getSize
	 * @return int
	 */
	public function getSize() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DocumentsItemsModel::getSize', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getSize', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DocumentsItemsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getDescription', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DocumentsItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getAdded', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DocumentsItemsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DocumentsItemsModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getEnabled', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views -> int(11) unsigned
	 * 
	 * @name getViews
	 * @return int
	 */
	public function getViews() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DocumentsItemsModel::getViews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getViews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of downloads -> int(11) unsigned
	 * 
	 * @name getDownloads
	 * @return int
	 */
	public function getDownloads() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set DocumentsItemsModel::getDownloads', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DocumentsItemsModel::getDownloads', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DocumentsItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DocumentsItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table documents_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DocumentsItemsModel());
	}
	
	/**
	 * Select one item function from table documents_items
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
		$ret = DbModel::doSelect($conn, new DocumentsItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DocumentsItemsModel')) return $ret[0];
		else {
			$class = new DocumentsItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table documents_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DocumentsItemsModel());
	}
	
	/**
	 * Basic pager function from table documents_items
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
		return DbModel::doPager($conn, new DocumentsItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table documents_items
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
		return (int) DbModel::doAffected($conn, new DocumentsItemsModel());
	}
	
	/**
	 * Basic update function for table documents_items
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
		$af = (int) DbModel::doAffected($conn, new DocumentsItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table documents_items
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
		return (int) DbModel::doInsert($conn, new DocumentsItemsModel());
	}
	
	/**
	 * Basic reader create function from table documents_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table documents_items
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
	 * Drop table function for table documents_items
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