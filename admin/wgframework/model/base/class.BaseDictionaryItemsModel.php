<?php
/**
 * Database class for table dictionary_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/dictionary_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDictionaryItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'dictionary_items';
	
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
	 * id -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`dictionary_items`.`id`';
	
	/**
	 * id -> int(16) unsigned
	 */
	const FULL_ID = '`dictionary_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * dictionary_categories_id -> int(8)
	 */
	const FULL_DICTIONARY_CATEGORIES_ID = '`dictionary_items`.`dictionary_categories_id`';
	
	const COL_DICTIONARY_CATEGORIES_ID = 'dictionary_categories_id';
	
	/**
	 * word -> varchar(255)
	 */
	const FULL_WORD = '`dictionary_items`.`word`';
	
	const COL_WORD = 'word';
	
	/**
	 * accent -> varchar(255)
	 */
	const FULL_ACCENT = '`dictionary_items`.`accent`';
	
	const COL_ACCENT = 'accent';
	
	/**
	 * definition -> text
	 */
	const FULL_DEFINITION = '`dictionary_items`.`definition`';
	
	const COL_DEFINITION = 'definition';
	
	/**
	 * notes -> varchar(255)
	 */
	const FULL_NOTES = '`dictionary_items`.`notes`';
	
	const COL_NOTES = 'notes';
	
	/**
	 * specnotes -> varchar(255)
	 */
	const FULL_SPECNOTES = '`dictionary_items`.`specnotes`';
	
	const COL_SPECNOTES = 'specnotes';
	
	/**
	 * translation -> varchar(255)
	 */
	const FULL_TRANSLATION = '`dictionary_items`.`translation`';
	
	const COL_TRANSLATION = 'translation';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`dictionary_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * users_id -> int(16)
	 */
	const FULL_USERS_ID = '`dictionary_items`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * approved -> tinyint(1)
	 */
	const FULL_APPROVED = '`dictionary_items`.`approved`';
	
	const COL_APPROVED = 'approved';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`dictionary_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `dictionary_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'DictionaryCategoriesId'=>1, 'Word'=>2, 'Accent'=>3, 'Definition'=>4, 'Notes'=>5, 'Specnotes'=>6, 'Translation'=>7, 'Added'=>8, 'UsersId'=>9, 'Approved'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`dictionary_items`.`Id`'=>0, '`dictionary_items`.`DictionaryCategoriesId`'=>1, '`dictionary_items`.`Word`'=>2, '`dictionary_items`.`Accent`'=>3, '`dictionary_items`.`Definition`'=>4, '`dictionary_items`.`Notes`'=>5, '`dictionary_items`.`Specnotes`'=>6, '`dictionary_items`.`Translation`'=>7, '`dictionary_items`.`Added`'=>8, '`dictionary_items`.`UsersId`'=>9, '`dictionary_items`.`Approved`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'dictionary_categories_id'=>1, 'word'=>2, 'accent'=>3, 'definition'=>4, 'notes'=>5, 'specnotes'=>6, 'translation'=>7, 'added'=>8, 'users_id'=>9, 'approved'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'dictionary_categories_id', 'word', 'accent', 'definition', 'notes', 'specnotes', 'translation', 'added', 'users_id', 'approved');
	
	
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
			throw new WgException("DictionaryItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDictionaryItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DictionaryItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DictionaryItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DictionaryItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DictionaryItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DictionaryItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DictionaryItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(16) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DictionaryItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dictionary_categories_id -> int(8)
	 * 
	 * @name getDictionaryCategoriesId
	 * @return int
	 */
	public function getDictionaryCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DictionaryItemsModel::getDictionaryCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getDictionaryCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of word -> varchar(255)
	 * 
	 * @name getWord
	 * @return varchar
	 */
	public function getWord() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DictionaryItemsModel::getWord', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getWord', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of accent -> varchar(255)
	 * 
	 * @name getAccent
	 * @return varchar
	 */
	public function getAccent() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DictionaryItemsModel::getAccent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getAccent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of definition -> text
	 * 
	 * @name getDefinition
	 * @return text
	 */
	public function getDefinition() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DictionaryItemsModel::getDefinition', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getDefinition', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notes -> varchar(255)
	 * 
	 * @name getNotes
	 * @return varchar
	 */
	public function getNotes() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DictionaryItemsModel::getNotes', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getNotes', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of specnotes -> varchar(255)
	 * 
	 * @name getSpecnotes
	 * @return varchar
	 */
	public function getSpecnotes() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set DictionaryItemsModel::getSpecnotes', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getSpecnotes', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of translation -> varchar(255)
	 * 
	 * @name getTranslation
	 * @return varchar
	 */
	public function getTranslation() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DictionaryItemsModel::getTranslation', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getTranslation', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set DictionaryItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(16)
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DictionaryItemsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of approved -> tinyint(1)
	 * 
	 * @name getApproved
	 * @return tinyint
	 */
	public function getApproved() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set DictionaryItemsModel::getApproved', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DictionaryItemsModel::getApproved', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DictionaryItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DictionaryItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table dictionary_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DictionaryItemsModel());
	}
	
	/**
	 * Select one item function from table dictionary_items
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
		$ret = DbModel::doSelect($conn, new DictionaryItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'DictionaryItemsModel')) return $ret[0];
		else {
			$class = new DictionaryItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table dictionary_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DictionaryItemsModel());
	}
	
	/**
	 * Basic pager function from table dictionary_items
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
		return DbModel::doPager($conn, new DictionaryItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table dictionary_items
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
		return (int) DbModel::doAffected($conn, new DictionaryItemsModel());
	}
	
	/**
	 * Basic update function for table dictionary_items
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
		$af = (int) DbModel::doAffected($conn, new DictionaryItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table dictionary_items
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
		return (int) DbModel::doInsert($conn, new DictionaryItemsModel());
	}
	
	/**
	 * Basic reader create function from table dictionary_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table dictionary_items
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
	 * Drop table function for table dictionary_items
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