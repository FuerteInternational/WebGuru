<?php
/**
 * Database class for table projects_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/projects_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:15
 */

class BaseProjectsItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'projects_items';
	
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
	
	const FULL_PRIMARY_KEY = '`projects_items`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`projects_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * projects_categories_id -> int(11) unsigned
	 */
	const FULL_PROJECTS_CATEGORIES_ID = '`projects_items`.`projects_categories_id`';
	
	const COL_PROJECTS_CATEGORIES_ID = 'projects_categories_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`projects_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`projects_items`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * client -> varchar(255)
	 */
	const FULL_CLIENT = '`projects_items`.`client`';
	
	const COL_CLIENT = 'client';
	
	/**
	 * link -> varchar(255)
	 */
	const FULL_LINK = '`projects_items`.`link`';
	
	const COL_LINK = 'link';
	
	/**
	 * info -> varchar(255)
	 */
	const FULL_INFO = '`projects_items`.`info`';
	
	const COL_INFO = 'info';
	
	/**
	 * views -> int(11)
	 */
	const FULL_VIEWS = '`projects_items`.`views`';
	
	const COL_VIEWS = 'views';
	
	/**
	 * date -> datetime
	 */
	const FULL_DATE = '`projects_items`.`date`';
	
	const COL_DATE = 'date';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`projects_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`projects_items`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * h1 -> varchar(255)
	 */
	const FULL_H1 = '`projects_items`.`h1`';
	
	const COL_H1 = 'h1';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`projects_items`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * mkeywords -> text
	 */
	const FULL_MKEYWORDS = '`projects_items`.`mkeywords`';
	
	const COL_MKEYWORDS = 'mkeywords';
	
	/**
	 * mdescription -> text
	 */
	const FULL_MDESCRIPTION = '`projects_items`.`mdescription`';
	
	const COL_MDESCRIPTION = 'mdescription';
	
	/**
	 * h2 -> varchar(255)
	 */
	const FULL_H2 = '`projects_items`.`h2`';
	
	const COL_H2 = 'h2';
	
	/**
	 * h3 -> varchar(255)
	 */
	const FULL_H3 = '`projects_items`.`h3`';
	
	const COL_H3 = 'h3';
	
	/**
	 * text1 -> text
	 */
	const FULL_TEXT1 = '`projects_items`.`text1`';
	
	const COL_TEXT1 = 'text1';
	
	/**
	 * text2 -> text
	 */
	const FULL_TEXT2 = '`projects_items`.`text2`';
	
	const COL_TEXT2 = 'text2';
	
	/**
	 * text3 -> text
	 */
	const FULL_TEXT3 = '`projects_items`.`text3`';
	
	const COL_TEXT3 = 'text3';
	
	/**
	 * text4 -> text
	 */
	const FULL_TEXT4 = '`projects_items`.`text4`';
	
	const COL_TEXT4 = 'text4';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`projects_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `projects_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'ProjectsCategoriesId'=>1, 'Name'=>2, 'Identifier'=>3, 'Client'=>4, 'Link'=>5, 'Info'=>6, 'Views'=>7, 'Date'=>8, 'Added'=>9, 'Changed'=>10, 'H1'=>11, 'Title'=>12, 'Mkeywords'=>13, 'Mdescription'=>14, 'H2'=>15, 'H3'=>16, 'Text1'=>17, 'Text2'=>18, 'Text3'=>19, 'Text4'=>20);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`projects_items`.`Id`'=>0, '`projects_items`.`ProjectsCategoriesId`'=>1, '`projects_items`.`Name`'=>2, '`projects_items`.`Identifier`'=>3, '`projects_items`.`Client`'=>4, '`projects_items`.`Link`'=>5, '`projects_items`.`Info`'=>6, '`projects_items`.`Views`'=>7, '`projects_items`.`Date`'=>8, '`projects_items`.`Added`'=>9, '`projects_items`.`Changed`'=>10, '`projects_items`.`H1`'=>11, '`projects_items`.`Title`'=>12, '`projects_items`.`Mkeywords`'=>13, '`projects_items`.`Mdescription`'=>14, '`projects_items`.`H2`'=>15, '`projects_items`.`H3`'=>16, '`projects_items`.`Text1`'=>17, '`projects_items`.`Text2`'=>18, '`projects_items`.`Text3`'=>19, '`projects_items`.`Text4`'=>20);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'projects_categories_id'=>1, 'name'=>2, 'identifier'=>3, 'client'=>4, 'link'=>5, 'info'=>6, 'views'=>7, 'date'=>8, 'added'=>9, 'changed'=>10, 'h1'=>11, 'title'=>12, 'mkeywords'=>13, 'mdescription'=>14, 'h2'=>15, 'h3'=>16, 'text1'=>17, 'text2'=>18, 'text3'=>19, 'text4'=>20);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'projects_categories_id', 'name', 'identifier', 'client', 'link', 'info', 'views', 'date', 'added', 'changed', 'h1', 'title', 'mkeywords', 'mdescription', 'h2', 'h3', 'text1', 'text2', 'text3', 'text4');
	
	
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
			throw new WgException("ProjectsItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectsItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectsItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ProjectsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ProjectsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ProjectsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectsItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of projects_categories_id -> int(11) unsigned
	 * 
	 * @name getProjectsCategoriesId
	 * @return int
	 */
	public function getProjectsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ProjectsItemsModel::getProjectsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getProjectsCategoriesId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectsItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectsItemsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of client -> varchar(255)
	 * 
	 * @name getClient
	 * @return varchar
	 */
	public function getClient() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectsItemsModel::getClient', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getClient', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link -> varchar(255)
	 * 
	 * @name getLink
	 * @return varchar
	 */
	public function getLink() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ProjectsItemsModel::getLink', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getLink', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of info -> varchar(255)
	 * 
	 * @name getInfo
	 * @return varchar
	 */
	public function getInfo() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ProjectsItemsModel::getInfo', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getInfo', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views -> int(11)
	 * 
	 * @name getViews
	 * @return int
	 */
	public function getViews() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ProjectsItemsModel::getViews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getViews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of date -> datetime
	 * 
	 * @name getDate
	 * @return datetime
	 */
	public function getDate() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) strtotime($this->_result[8]);
			else parent::throwGetColException('Not set ProjectsItemsModel::getDate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getDate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) strtotime($this->_result[9]);
			else parent::throwGetColException('Not set ProjectsItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (int) strtotime($this->_result[10]);
			else parent::throwGetColException('Not set ProjectsItemsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1 -> varchar(255)
	 * 
	 * @name getH1
	 * @return varchar
	 */
	public function getH1() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set ProjectsItemsModel::getH1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getH1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set ProjectsItemsModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mkeywords -> text
	 * 
	 * @name getMkeywords
	 * @return text
	 */
	public function getMkeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set ProjectsItemsModel::getMkeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getMkeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mdescription -> text
	 * 
	 * @name getMdescription
	 * @return text
	 */
	public function getMdescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set ProjectsItemsModel::getMdescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getMdescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h2 -> varchar(255)
	 * 
	 * @name getH2
	 * @return varchar
	 */
	public function getH2() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set ProjectsItemsModel::getH2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getH2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h3 -> varchar(255)
	 * 
	 * @name getH3
	 * @return varchar
	 */
	public function getH3() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set ProjectsItemsModel::getH3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getH3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text1 -> text
	 * 
	 * @name getText1
	 * @return text
	 */
	public function getText1() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set ProjectsItemsModel::getText1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getText1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text2 -> text
	 * 
	 * @name getText2
	 * @return text
	 */
	public function getText2() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set ProjectsItemsModel::getText2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getText2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text3 -> text
	 * 
	 * @name getText3
	 * @return text
	 */
	public function getText3() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set ProjectsItemsModel::getText3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getText3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text4 -> text
	 * 
	 * @name getText4
	 * @return text
	 */
	public function getText4() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set ProjectsItemsModel::getText4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsItemsModel::getText4', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectsItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectsItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table projects_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ProjectsItemsModel());
	}
	
	/**
	 * Select one item function from table projects_items
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
		$ret = DbModel::doSelect($conn, new ProjectsItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectsItemsModel')) return $ret[0];
		else {
			$class = new ProjectsItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table projects_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectsItemsModel());
	}
	
	/**
	 * Basic pager function from table projects_items
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
		return DbModel::doPager($conn, new ProjectsItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table projects_items
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
		return (int) DbModel::doAffected($conn, new ProjectsItemsModel());
	}
	
	/**
	 * Basic update function for table projects_items
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
		$af = (int) DbModel::doAffected($conn, new ProjectsItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table projects_items
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
		return (int) DbModel::doInsert($conn, new ProjectsItemsModel());
	}
	
	/**
	 * Basic reader create function from table projects_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table projects_items
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
	 * Drop table function for table projects_items
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