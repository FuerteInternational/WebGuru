<?php
/**
 * Database class for table search_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_categories';
	
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
	 * id_sct -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_sct';
	
	const FULL_PRIMARY_KEY = '`search_categories`.`id_sct`';
	
	/**
	 * id_sct -> int(16) unsigned
	 */
	const FULL_ID_SCT = '`search_categories`.`id_sct`';
	
	const COL_ID_SCT = 'id_sct';
	
	/**
	 * parent_sct -> int(16)
	 */
	const FULL_PARENT_SCT = '`search_categories`.`parent_sct`';
	
	const COL_PARENT_SCT = 'parent_sct';
	
	/**
	 * name_sct -> varchar(255)
	 */
	const FULL_NAME_SCT = '`search_categories`.`name_sct`';
	
	const COL_NAME_SCT = 'name_sct';
	
	/**
	 * identifier_sct -> varchar(255)
	 */
	const FULL_IDENTIFIER_SCT = '`search_categories`.`identifier_sct`';
	
	const COL_IDENTIFIER_SCT = 'identifier_sct';
	
	/**
	 * title_sct -> varchar(255)
	 */
	const FULL_TITLE_SCT = '`search_categories`.`title_sct`';
	
	const COL_TITLE_SCT = 'title_sct';
	
	/**
	 * h1_sct -> varchar(255)
	 */
	const FULL_H1_SCT = '`search_categories`.`h1_sct`';
	
	const COL_H1_SCT = 'h1_sct';
	
	/**
	 * head_sct -> text
	 */
	const FULL_HEAD_SCT = '`search_categories`.`head_sct`';
	
	const COL_HEAD_SCT = 'head_sct';
	
	/**
	 * desc_sct -> text
	 */
	const FULL_DESC_SCT = '`search_categories`.`desc_sct`';
	
	const COL_DESC_SCT = 'desc_sct';
	
	/**
	 * keywords_sct -> text
	 */
	const FULL_KEYWORDS_SCT = '`search_categories`.`keywords_sct`';
	
	const COL_KEYWORDS_SCT = 'keywords_sct';
	
	/**
	 * description_sct -> text
	 */
	const FULL_DESCRIPTION_SCT = '`search_categories`.`description_sct`';
	
	const COL_DESCRIPTION_SCT = 'description_sct';
	
	/**
	 * added_sct -> datetime
	 */
	const FULL_ADDED_SCT = '`search_categories`.`added_sct`';
	
	const COL_ADDED_SCT = 'added_sct';
	
	/**
	 * changed_sct -> datetime
	 */
	const FULL_CHANGED_SCT = '`search_categories`.`changed_sct`';
	
	const COL_CHANGED_SCT = 'changed_sct';
	
	/**
	 * users_id_sct -> int(16)
	 */
	const FULL_USERS_ID_SCT = '`search_categories`.`users_id_sct`';
	
	const COL_USERS_ID_SCT = 'users_id_sct';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_categories`.`id_sct`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_categories`.`id_sct`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSct'=>0, 'ParentSct'=>1, 'NameSct'=>2, 'IdentifierSct'=>3, 'TitleSct'=>4, 'H1Sct'=>5, 'HeadSct'=>6, 'DescSct'=>7, 'KeywordsSct'=>8, 'DescriptionSct'=>9, 'AddedSct'=>10, 'ChangedSct'=>11, 'UsersIdSct'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_categories`.`IdSct`'=>0, '`search_categories`.`ParentSct`'=>1, '`search_categories`.`NameSct`'=>2, '`search_categories`.`IdentifierSct`'=>3, '`search_categories`.`TitleSct`'=>4, '`search_categories`.`H1Sct`'=>5, '`search_categories`.`HeadSct`'=>6, '`search_categories`.`DescSct`'=>7, '`search_categories`.`KeywordsSct`'=>8, '`search_categories`.`DescriptionSct`'=>9, '`search_categories`.`AddedSct`'=>10, '`search_categories`.`ChangedSct`'=>11, '`search_categories`.`UsersIdSct`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sct'=>0, 'parent_sct'=>1, 'name_sct'=>2, 'identifier_sct'=>3, 'title_sct'=>4, 'h1_sct'=>5, 'head_sct'=>6, 'desc_sct'=>7, 'keywords_sct'=>8, 'description_sct'=>9, 'added_sct'=>10, 'changed_sct'=>11, 'users_id_sct'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sct', 'parent_sct', 'name_sct', 'identifier_sct', 'title_sct', 'h1_sct', 'head_sct', 'desc_sct', 'keywords_sct', 'description_sct', 'added_sct', 'changed_sct', 'users_id_sct');
	
	
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
			throw new WgException("SearchCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchCategoriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sct -> int(16) unsigned
	 * 
	 * @name getIdSct
	 * @return int
	 */
	public function getIdSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchCategoriesModel::getIdSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getIdSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parent_sct -> int(16)
	 * 
	 * @name getParentSct
	 * @return int
	 */
	public function getParentSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchCategoriesModel::getParentSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getParentSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_sct -> varchar(255)
	 * 
	 * @name getNameSct
	 * @return varchar
	 */
	public function getNameSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchCategoriesModel::getNameSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getNameSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_sct -> varchar(255)
	 * 
	 * @name getIdentifierSct
	 * @return varchar
	 */
	public function getIdentifierSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchCategoriesModel::getIdentifierSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getIdentifierSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_sct -> varchar(255)
	 * 
	 * @name getTitleSct
	 * @return varchar
	 */
	public function getTitleSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchCategoriesModel::getTitleSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getTitleSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1_sct -> varchar(255)
	 * 
	 * @name getH1Sct
	 * @return varchar
	 */
	public function getH1Sct() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchCategoriesModel::getH1Sct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getH1Sct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head_sct -> text
	 * 
	 * @name getHeadSct
	 * @return text
	 */
	public function getHeadSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SearchCategoriesModel::getHeadSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getHeadSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_sct -> text
	 * 
	 * @name getDescSct
	 * @return text
	 */
	public function getDescSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SearchCategoriesModel::getDescSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getDescSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_sct -> text
	 * 
	 * @name getKeywordsSct
	 * @return text
	 */
	public function getKeywordsSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchCategoriesModel::getKeywordsSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getKeywordsSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description_sct -> text
	 * 
	 * @name getDescriptionSct
	 * @return text
	 */
	public function getDescriptionSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SearchCategoriesModel::getDescriptionSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getDescriptionSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sct -> datetime
	 * 
	 * @name getAddedSct
	 * @return datetime
	 */
	public function getAddedSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (int) strtotime($this->_result[10]);
			else parent::throwGetColException('Not set SearchCategoriesModel::getAddedSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getAddedSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_sct -> datetime
	 * 
	 * @name getChangedSct
	 * @return datetime
	 */
	public function getChangedSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) strtotime($this->_result[11]);
			else parent::throwGetColException('Not set SearchCategoriesModel::getChangedSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getChangedSct', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_sct -> int(16)
	 * 
	 * @name getUsersIdSct
	 * @return int
	 */
	public function getUsersIdSct() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SearchCategoriesModel::getUsersIdSct', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCategoriesModel::getUsersIdSct', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchCategoriesModel());
	}
	
	/**
	 * Select one item function from table search_categories
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
		$ret = DbModel::doSelect($conn, new SearchCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchCategoriesModel')) return $ret[0];
		else {
			$class = new SearchCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchCategoriesModel());
	}
	
	/**
	 * Basic pager function from table search_categories
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
		return DbModel::doPager($conn, new SearchCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_categories
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
		return (int) DbModel::doAffected($conn, new SearchCategoriesModel());
	}
	
	/**
	 * Basic update function for table search_categories
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
		$af = (int) DbModel::doAffected($conn, new SearchCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_categories
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
		return (int) DbModel::doInsert($conn, new SearchCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table search_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_categories
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
	 * Drop table function for table search_categories
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