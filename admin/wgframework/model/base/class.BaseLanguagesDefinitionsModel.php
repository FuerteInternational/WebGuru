<?php
/**
 * Database class for table languages_definitions
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/languages_definitions
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 14:58:36
 */

class BaseLanguagesDefinitionsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'languages_definitions';
	
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
	
	const FULL_PRIMARY_KEY = '`languages_definitions`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`languages_definitions`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`languages_definitions`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * minchar -> int(11)
	 */
	const FULL_MINCHAR = '`languages_definitions`.`minchar`';
	
	const COL_MINCHAR = 'minchar';
	
	/**
	 * maxchar -> int(11)
	 */
	const FULL_MAXCHAR = '`languages_definitions`.`maxchar`';
	
	const COL_MAXCHAR = 'maxchar';
	
	/**
	 * pages_id -> int(11) unsigned
	 */
	const FULL_PAGES_ID = '`languages_definitions`.`pages_id`';
	
	const COL_PAGES_ID = 'pages_id';
	
	/**
	 * isglobal -> tinyint(1) unsigned
	 */
	const FULL_ISGLOBAL = '`languages_definitions`.`isglobal`';
	
	const COL_ISGLOBAL = 'isglobal';
	
	/**
	 * system_websites_id -> int(4) unsigned
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`languages_definitions`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`languages_definitions`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	/**
	 * default_lang_id -> int(11) unsigned
	 */
	const FULL_DEFAULT_LANG_ID = '`languages_definitions`.`default_lang_id`';
	
	const COL_DEFAULT_LANG_ID = 'default_lang_id';
	
	/**
	 * default_text -> text
	 */
	const FULL_DEFAULT_TEXT = '`languages_definitions`.`default_text`';
	
	const COL_DEFAULT_TEXT = 'default_text';
	
	/**
	 * allowhtml -> tinyint(1) unsigned
	 */
	const FULL_ALLOWHTML = '`languages_definitions`.`allowhtml`';
	
	const COL_ALLOWHTML = 'allowhtml';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`languages_definitions`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `languages_definitions`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Minchar'=>2, 'Maxchar'=>3, 'PagesId'=>4, 'Isglobal'=>5, 'SystemWebsitesId'=>6, 'Enabled'=>7, 'DefaultLangId'=>8, 'DefaultText'=>9, 'Allowhtml'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`languages_definitions`.`Id`'=>0, '`languages_definitions`.`Name`'=>1, '`languages_definitions`.`Minchar`'=>2, '`languages_definitions`.`Maxchar`'=>3, '`languages_definitions`.`PagesId`'=>4, '`languages_definitions`.`Isglobal`'=>5, '`languages_definitions`.`SystemWebsitesId`'=>6, '`languages_definitions`.`Enabled`'=>7, '`languages_definitions`.`DefaultLangId`'=>8, '`languages_definitions`.`DefaultText`'=>9, '`languages_definitions`.`Allowhtml`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'minchar'=>2, 'maxchar'=>3, 'pages_id'=>4, 'isglobal'=>5, 'system_websites_id'=>6, 'enabled'=>7, 'default_lang_id'=>8, 'default_text'=>9, 'allowhtml'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'minchar', 'maxchar', 'pages_id', 'isglobal', 'system_websites_id', 'enabled', 'default_lang_id', 'default_text', 'allowhtml');
	
	
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
			throw new WgException("LanguagesDefinitions could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelLanguagesDefinitions::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('LanguagesDefinitionsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguagesDefinitionsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('LanguagesDefinitionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguagesDefinitionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in LanguagesDefinitionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in LanguagesDefinitionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of minchar -> int(11)
	 * 
	 * @name getMinchar
	 * @return int
	 */
	public function getMinchar() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getMinchar', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getMinchar', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of maxchar -> int(11)
	 * 
	 * @name getMaxchar
	 * @return int
	 */
	public function getMaxchar() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getMaxchar', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getMaxchar', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_id -> int(11) unsigned
	 * 
	 * @name getPagesId
	 * @return int
	 */
	public function getPagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getPagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getPagesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of isglobal -> tinyint(1) unsigned
	 * 
	 * @name getIsglobal
	 * @return tinyint
	 */
	public function getIsglobal() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getIsglobal', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getIsglobal', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4) unsigned
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getSystemWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getEnabled', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of default_lang_id -> int(11) unsigned
	 * 
	 * @name getDefaultLangId
	 * @return int
	 */
	public function getDefaultLangId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getDefaultLangId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getDefaultLangId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of default_text -> text
	 * 
	 * @name getDefaultText
	 * @return text
	 */
	public function getDefaultText() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getDefaultText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getDefaultText', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of allowhtml -> tinyint(1) unsigned
	 * 
	 * @name getAllowhtml
	 * @return tinyint
	 */
	public function getAllowhtml() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set LanguagesDefinitionsModel::getAllowhtml', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguagesDefinitionsModel::getAllowhtml', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: LanguagesDefinitionsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: LanguagesDefinitionsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table languages_definitions
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new LanguagesDefinitionsModel());
	}
	
	/** Left join select function from table languages_definitions
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LanguagesDefinitionsModel());
	}
	
	/** Right join select function from table languages_definitions
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LanguagesDefinitionsModel());
	}
	
	/** Inner join select function from table languages_definitions
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LanguagesDefinitionsModel());
	}
	
	/**
	 * Select one item function from table languages_definitions
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
		$ret = DbModel::doSelect($conn, new LanguagesDefinitionsModel());
		if (isset($ret[0]) && is_a($ret[0], 'LanguagesDefinitionsModel')) return $ret[0];
		else {
			$class = new LanguagesDefinitionsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table languages_definitions
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new LanguagesDefinitionsModel());
	}
	
	/**
	 * Basic pager function from table languages_definitions
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
		return DbModel::doPager($conn, new LanguagesDefinitionsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table languages_definitions
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
		return (int) DbModel::doAffected($conn, new LanguagesDefinitionsModel());
	}
	
	/**
	 * Basic update function for table languages_definitions
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
		$af = (int) DbModel::doAffected($conn, new LanguagesDefinitionsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table languages_definitions
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
		return (int) DbModel::doInsert($conn, new LanguagesDefinitionsModel());
	}
	
	/**
	 * Basic reader create function from table languages_definitions
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table languages_definitions
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
	 * Drop table function for table languages_definitions
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