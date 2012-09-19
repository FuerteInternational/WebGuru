<?php
/**
 * Database class for table discuss_categories
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/discuss_categories
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDiscussCategoriesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'discuss_categories';
	
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
	 * id_dc -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_dc';
	
	const FULL_PRIMARY_KEY = '`discuss_categories`.`id_dc`';
	
	/**
	 * id_dc -> int(8) unsigned
	 */
	const FULL_ID_DC = '`discuss_categories`.`id_dc`';
	
	const COL_ID_DC = 'id_dc';
	
	/**
	 * parent_dc -> int(8) unsigned
	 */
	const FULL_PARENT_DC = '`discuss_categories`.`parent_dc`';
	
	const COL_PARENT_DC = 'parent_dc';
	
	/**
	 * name_dc -> varchar(255)
	 */
	const FULL_NAME_DC = '`discuss_categories`.`name_dc`';
	
	const COL_NAME_DC = 'name_dc';
	
	/**
	 * identifier_dc -> varchar(255)
	 */
	const FULL_IDENTIFIER_DC = '`discuss_categories`.`identifier_dc`';
	
	const COL_IDENTIFIER_DC = 'identifier_dc';
	
	/**
	 * desc_dc -> text
	 */
	const FULL_DESC_DC = '`discuss_categories`.`desc_dc`';
	
	const COL_DESC_DC = 'desc_dc';
	
	/**
	 * keywords_dc -> text
	 */
	const FULL_KEYWORDS_DC = '`discuss_categories`.`keywords_dc`';
	
	const COL_KEYWORDS_DC = 'keywords_dc';
	
	/**
	 * topics_dc -> int(8) unsigned
	 */
	const FULL_TOPICS_DC = '`discuss_categories`.`topics_dc`';
	
	const COL_TOPICS_DC = 'topics_dc';
	
	/**
	 * posts_dc -> int(8) unsigned
	 */
	const FULL_POSTS_DC = '`discuss_categories`.`posts_dc`';
	
	const COL_POSTS_DC = 'posts_dc';
	
	/**
	 * lastpost_dc -> datetime
	 */
	const FULL_LASTPOST_DC = '`discuss_categories`.`lastpost_dc`';
	
	const COL_LASTPOST_DC = 'lastpost_dc';
	
	/**
	 * lastby_dc -> int(16)
	 */
	const FULL_LASTBY_DC = '`discuss_categories`.`lastby_dc`';
	
	const COL_LASTBY_DC = 'lastby_dc';
	
	/**
	 * views_dc -> int(8) unsigned
	 */
	const FULL_VIEWS_DC = '`discuss_categories`.`views_dc`';
	
	const COL_VIEWS_DC = 'views_dc';
	
	/**
	 * added_dc -> datetime
	 */
	const FULL_ADDED_DC = '`discuss_categories`.`added_dc`';
	
	const COL_ADDED_DC = 'added_dc';
	
	/**
	 * changed_dc -> datetime
	 */
	const FULL_CHANGED_DC = '`discuss_categories`.`changed_dc`';
	
	const COL_CHANGED_DC = 'changed_dc';
	
	/**
	 * sort_dc -> int(8)
	 */
	const FULL_SORT_DC = '`discuss_categories`.`sort_dc`';
	
	const COL_SORT_DC = 'sort_dc';
	
	/**
	 * status_dc -> tinyint(2) unsigned
	 */
	const FULL_STATUS_DC = '`discuss_categories`.`status_dc`';
	
	const COL_STATUS_DC = 'status_dc';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`discuss_categories`.`id_dc`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `discuss_categories`.`id_dc`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdDc'=>0, 'ParentDc'=>1, 'NameDc'=>2, 'IdentifierDc'=>3, 'DescDc'=>4, 'KeywordsDc'=>5, 'TopicsDc'=>6, 'PostsDc'=>7, 'LastpostDc'=>8, 'LastbyDc'=>9, 'ViewsDc'=>10, 'AddedDc'=>11, 'ChangedDc'=>12, 'SortDc'=>13, 'StatusDc'=>14);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`discuss_categories`.`IdDc`'=>0, '`discuss_categories`.`ParentDc`'=>1, '`discuss_categories`.`NameDc`'=>2, '`discuss_categories`.`IdentifierDc`'=>3, '`discuss_categories`.`DescDc`'=>4, '`discuss_categories`.`KeywordsDc`'=>5, '`discuss_categories`.`TopicsDc`'=>6, '`discuss_categories`.`PostsDc`'=>7, '`discuss_categories`.`LastpostDc`'=>8, '`discuss_categories`.`LastbyDc`'=>9, '`discuss_categories`.`ViewsDc`'=>10, '`discuss_categories`.`AddedDc`'=>11, '`discuss_categories`.`ChangedDc`'=>12, '`discuss_categories`.`SortDc`'=>13, '`discuss_categories`.`StatusDc`'=>14);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_dc'=>0, 'parent_dc'=>1, 'name_dc'=>2, 'identifier_dc'=>3, 'desc_dc'=>4, 'keywords_dc'=>5, 'topics_dc'=>6, 'posts_dc'=>7, 'lastpost_dc'=>8, 'lastby_dc'=>9, 'views_dc'=>10, 'added_dc'=>11, 'changed_dc'=>12, 'sort_dc'=>13, 'status_dc'=>14);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_dc', 'parent_dc', 'name_dc', 'identifier_dc', 'desc_dc', 'keywords_dc', 'topics_dc', 'posts_dc', 'lastpost_dc', 'lastby_dc', 'views_dc', 'added_dc', 'changed_dc', 'sort_dc', 'status_dc');
	
	
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
			throw new WgException("DiscussCategories could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDiscussCategories::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DiscussCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussCategoriesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DiscussCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussCategoriesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DiscussCategoriesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DiscussCategoriesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_dc -> int(8) unsigned
	 * 
	 * @name getIdDc
	 * @return int
	 */
	public function getIdDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getIdDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getIdDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parent_dc -> int(8) unsigned
	 * 
	 * @name getParentDc
	 * @return int
	 */
	public function getParentDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getParentDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getParentDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_dc -> varchar(255)
	 * 
	 * @name getNameDc
	 * @return varchar
	 */
	public function getNameDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getNameDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getNameDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_dc -> varchar(255)
	 * 
	 * @name getIdentifierDc
	 * @return varchar
	 */
	public function getIdentifierDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getIdentifierDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getIdentifierDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_dc -> text
	 * 
	 * @name getDescDc
	 * @return text
	 */
	public function getDescDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getDescDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getDescDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_dc -> text
	 * 
	 * @name getKeywordsDc
	 * @return text
	 */
	public function getKeywordsDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getKeywordsDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getKeywordsDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of topics_dc -> int(8) unsigned
	 * 
	 * @name getTopicsDc
	 * @return int
	 */
	public function getTopicsDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getTopicsDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getTopicsDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of posts_dc -> int(8) unsigned
	 * 
	 * @name getPostsDc
	 * @return int
	 */
	public function getPostsDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getPostsDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getPostsDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastpost_dc -> datetime
	 * 
	 * @name getLastpostDc
	 * @return datetime
	 */
	public function getLastpostDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set DiscussCategoriesModel::getLastpostDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getLastpostDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lastby_dc -> int(16)
	 * 
	 * @name getLastbyDc
	 * @return int
	 */
	public function getLastbyDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getLastbyDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getLastbyDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views_dc -> int(8) unsigned
	 * 
	 * @name getViewsDc
	 * @return int
	 */
	public function getViewsDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getViewsDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getViewsDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_dc -> datetime
	 * 
	 * @name getAddedDc
	 * @return datetime
	 */
	public function getAddedDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (int) strtotime($this->_result[11]);
			else parent::throwGetColException('Not set DiscussCategoriesModel::getAddedDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getAddedDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_dc -> datetime
	 * 
	 * @name getChangedDc
	 * @return datetime
	 */
	public function getChangedDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) strtotime($this->_result[12]);
			else parent::throwGetColException('Not set DiscussCategoriesModel::getChangedDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getChangedDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort_dc -> int(8)
	 * 
	 * @name getSortDc
	 * @return int
	 */
	public function getSortDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getSortDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getSortDc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status_dc -> tinyint(2) unsigned
	 * 
	 * @name getStatusDc
	 * @return tinyint
	 */
	public function getStatusDc() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set DiscussCategoriesModel::getStatusDc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussCategoriesModel::getStatusDc', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DiscussCategoriesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DiscussCategoriesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table discuss_categories
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DiscussCategoriesModel());
	}
	
	/**
	 * Select one item function from table discuss_categories
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
		$ret = DbModel::doSelect($conn, new DiscussCategoriesModel());
		if (isset($ret[0]) && is_a($ret[0], 'DiscussCategoriesModel')) return $ret[0];
		else {
			$class = new DiscussCategoriesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table discuss_categories
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DiscussCategoriesModel());
	}
	
	/**
	 * Basic pager function from table discuss_categories
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
		return DbModel::doPager($conn, new DiscussCategoriesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table discuss_categories
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
		return (int) DbModel::doAffected($conn, new DiscussCategoriesModel());
	}
	
	/**
	 * Basic update function for table discuss_categories
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
		$af = (int) DbModel::doAffected($conn, new DiscussCategoriesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table discuss_categories
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
		return (int) DbModel::doInsert($conn, new DiscussCategoriesModel());
	}
	
	/**
	 * Basic reader create function from table discuss_categories
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table discuss_categories
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
	 * Drop table function for table discuss_categories
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