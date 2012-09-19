<?php
/**
 * Database class for table language
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/language
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseLanguageModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'language';
	
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
	 * id_lang -> int(3)
	 */
	const PRIMARY_KEY = 'id_lang';
	
	const FULL_PRIMARY_KEY = '`language`.`id_lang`';
	
	/**
	 * id_lang -> int(3)
	 */
	const FULL_ID_LANG = '`language`.`id_lang`';
	
	const COL_ID_LANG = 'id_lang';
	
	/**
	 * name_lang -> varchar(32)
	 */
	const FULL_NAME_LANG = '`language`.`name_lang`';
	
	const COL_NAME_LANG = 'name_lang';
	
	/**
	 * code_lang -> varchar(255)
	 */
	const FULL_CODE_LANG = '`language`.`code_lang`';
	
	const COL_CODE_LANG = 'code_lang';
	
	/**
	 * image_lang -> varchar(15)
	 */
	const FULL_IMAGE_LANG = '`language`.`image_lang`';
	
	const COL_IMAGE_LANG = 'image_lang';
	
	/**
	 * directory_lang -> varchar(15)
	 */
	const FULL_DIRECTORY_LANG = '`language`.`directory_lang`';
	
	const COL_DIRECTORY_LANG = 'directory_lang';
	
	/**
	 * sort_lang -> int(3)
	 */
	const FULL_SORT_LANG = '`language`.`sort_lang`';
	
	const COL_SORT_LANG = 'sort_lang';
	
	/**
	 * default_lang -> set('y','n')
	 */
	const FULL_DEFAULT_LANG = '`language`.`default_lang`';
	
	const COL_DEFAULT_LANG = 'default_lang';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`language`.`id_lang`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `language`.`id_lang`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdLang'=>0, 'NameLang'=>1, 'CodeLang'=>2, 'ImageLang'=>3, 'DirectoryLang'=>4, 'SortLang'=>5, 'DefaultLang'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`language`.`IdLang`'=>0, '`language`.`NameLang`'=>1, '`language`.`CodeLang`'=>2, '`language`.`ImageLang`'=>3, '`language`.`DirectoryLang`'=>4, '`language`.`SortLang`'=>5, '`language`.`DefaultLang`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_lang'=>0, 'name_lang'=>1, 'code_lang'=>2, 'image_lang'=>3, 'directory_lang'=>4, 'sort_lang'=>5, 'default_lang'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_lang', 'name_lang', 'code_lang', 'image_lang', 'directory_lang', 'sort_lang', 'default_lang');
	
	
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
			throw new WgException("Language could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelLanguage::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('LanguageModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguageModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('LanguageModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LanguageModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in LanguageModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in LanguageModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_lang -> int(3)
	 * 
	 * @name getIdLang
	 * @return int
	 */
	public function getIdLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set LanguageModel::getIdLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getIdLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_lang -> varchar(32)
	 * 
	 * @name getNameLang
	 * @return varchar
	 */
	public function getNameLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set LanguageModel::getNameLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getNameLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of code_lang -> varchar(255)
	 * 
	 * @name getCodeLang
	 * @return varchar
	 */
	public function getCodeLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set LanguageModel::getCodeLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getCodeLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image_lang -> varchar(15)
	 * 
	 * @name getImageLang
	 * @return varchar
	 */
	public function getImageLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set LanguageModel::getImageLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getImageLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of directory_lang -> varchar(15)
	 * 
	 * @name getDirectoryLang
	 * @return varchar
	 */
	public function getDirectoryLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set LanguageModel::getDirectoryLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getDirectoryLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort_lang -> int(3)
	 * 
	 * @name getSortLang
	 * @return int
	 */
	public function getSortLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set LanguageModel::getSortLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getSortLang', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of default_lang -> set('y','n')
	 * 
	 * @name getDefaultLang
	 * @return set
	 */
	public function getDefaultLang() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set LanguageModel::getDefaultLang', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LanguageModel::getDefaultLang', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: LanguageModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: LanguageModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table language
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new LanguageModel());
	}
	
	/**
	 * Select one item function from table language
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
		$ret = DbModel::doSelect($conn, new LanguageModel());
		if (isset($ret[0]) && is_a($ret[0], 'LanguageModel')) return $ret[0];
		else {
			$class = new LanguageModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table language
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new LanguageModel());
	}
	
	/**
	 * Basic pager function from table language
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
		return DbModel::doPager($conn, new LanguageModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table language
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
		return (int) DbModel::doAffected($conn, new LanguageModel());
	}
	
	/**
	 * Basic update function for table language
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
		$af = (int) DbModel::doAffected($conn, new LanguageModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table language
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
		return (int) DbModel::doInsert($conn, new LanguageModel());
	}
	
	/**
	 * Basic reader create function from table language
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table language
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
	 * Drop table function for table language
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