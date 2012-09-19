<?php
/**
 * Database class for table languages_translations
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/languages_translations
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:26
 */

class BaseLanguagesTranslationsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'languages_translations';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`languages_translations`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`languages_translations`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * languages_definitions_id -> bigint(20) unsigned
	 */
	const FULL_LANGUAGES_DEFINITIONS_ID = '`languages_translations`.`languages_definitions_id`';
	
	const COL_LANGUAGES_DEFINITIONS_ID = 'languages_definitions_id';
	
	/**
	 * system_languages_id -> int(11) unsigned
	 */
	const FULL_SYSTEM_LANGUAGES_ID = '`languages_translations`.`system_languages_id`';
	
	const COL_SYSTEM_LANGUAGES_ID = 'system_languages_id';
	
	/**
	 * definition -> text
	 */
	const FULL_DEFINITION = '`languages_translations`.`definition`';
	
	const COL_DEFINITION = 'definition';
	
	/**
	 * key -> varchar(255)
	 */
	const FULL_KEY = '`languages_translations`.`key`';
	
	const COL_KEY = 'key';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`languages_translations`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `languages_translations`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'LanguagesDefinitionsId'=>1, 'SystemLanguagesId'=>2, 'Definition'=>3, 'Key'=>4);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`languages_translations`.`Id`'=>0, '`languages_translations`.`LanguagesDefinitionsId`'=>1, '`languages_translations`.`SystemLanguagesId`'=>2, '`languages_translations`.`Definition`'=>3, '`languages_translations`.`Key`'=>4);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'languages_definitions_id'=>1, 'system_languages_id'=>2, 'definition'=>3, 'key'=>4);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'languages_definitions_id', 'system_languages_id', 'definition', 'key');
	
	
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
			throw new WgException("LanguagesTranslations could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelLanguagesTranslations::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('LanguagesTranslationsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguagesTranslationsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('LanguagesTranslationsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguagesTranslationsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in LanguagesTranslationsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in LanguagesTranslationsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LanguagesTranslationsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesTranslationsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of languages_definitions_id -> bigint(20) unsigned
	 * 
	 * @name getLanguagesDefinitionsId
	 * @return bigint
	 */
	public function getLanguagesDefinitionsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set LanguagesTranslationsModel::getLanguagesDefinitionsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesTranslationsModel::getLanguagesDefinitionsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_languages_id -> int(11) unsigned
	 * 
	 * @name getSystemLanguagesId
	 * @return int
	 */
	public function getSystemLanguagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set LanguagesTranslationsModel::getSystemLanguagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesTranslationsModel::getSystemLanguagesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of definition -> text
	 * 
	 * @name getDefinition
	 * @return text
	 */
	public function getDefinition() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set LanguagesTranslationsModel::getDefinition', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesTranslationsModel::getDefinition', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of key -> varchar(255)
	 * 
	 * @name getKey
	 * @return varchar
	 */
	public function getKey() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set LanguagesTranslationsModel::getKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesTranslationsModel::getKey', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: LanguagesTranslationsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: LanguagesTranslationsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table languages_translations
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new LanguagesTranslationsModel());
	}
	
	/**
	 * Select one item function from table languages_translations
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
		$ret = DbModel::doSelect($conn, new LanguagesTranslationsModel());
		if (isset($ret[0]) && is_a($ret[0], 'LanguagesTranslationsModel')) return $ret[0];
		else {
			$class = new LanguagesTranslationsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table languages_translations
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new LanguagesTranslationsModel());
	}
	
	/**
	 * Basic pager function from table languages_translations
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
		return DbModel::doPager($conn, new LanguagesTranslationsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table languages_translations
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
		return (int) DbModel::doAffected($conn, new LanguagesTranslationsModel());
	}
	
	/**
	 * Basic update function for table languages_translations
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
		$af = (int) DbModel::doAffected($conn, new LanguagesTranslationsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table languages_translations
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
		return (int) DbModel::doInsert($conn, new LanguagesTranslationsModel());
	}
	
	/**
	 * Basic reader create function from table languages_translations
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table languages_translations
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
	 * Drop table function for table languages_translations
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