<?php
/**
 * Database class for table links_urls
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/links_urls
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 18:42:00
 */

class BaseLinksUrlsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'links_urls';
	
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
	 * id -> bigint(20)
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`links_urls`.`id`';
	
	/**
	 * id -> bigint(20)
	 */
	const FULL_ID = '`links_urls`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * url -> varchar(255)
	 */
	const FULL_URL = '`links_urls`.`url`';
	
	const COL_URL = 'url';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`links_urls`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * image -> varchar(255)
	 */
	const FULL_IMAGE = '`links_urls`.`image`';
	
	const COL_IMAGE = 'image';
	
	/**
	 * target -> varchar(25)
	 */
	const FULL_TARGET = '`links_urls`.`target`';
	
	const COL_TARGET = 'target';
	
	/**
	 * links_categories_id -> int(8)
	 */
	const FULL_LINKS_CATEGORIES_ID = '`links_urls`.`links_categories_id`';
	
	const COL_LINKS_CATEGORIES_ID = 'links_categories_id';
	
	/**
	 * description -> varchar(255)
	 */
	const FULL_DESCRIPTION = '`links_urls`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * visible -> tinyint(1)
	 */
	const FULL_VISIBLE = '`links_urls`.`visible`';
	
	const COL_VISIBLE = 'visible';
	
	/**
	 * users_id -> int(11)
	 */
	const FULL_USERS_ID = '`links_urls`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`links_urls`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`links_urls`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * rel -> varchar(255)
	 */
	const FULL_REL = '`links_urls`.`rel`';
	
	const COL_REL = 'rel';
	
	/**
	 * notes -> text
	 */
	const FULL_NOTES = '`links_urls`.`notes`';
	
	const COL_NOTES = 'notes';
	
	/**
	 * rss -> varchar(255)
	 */
	const FULL_RSS = '`links_urls`.`rss`';
	
	const COL_RSS = 'rss';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`links_urls`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `links_urls`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Url'=>1, 'Name'=>2, 'Image'=>3, 'Target'=>4, 'LinksCategoriesId'=>5, 'Description'=>6, 'Visible'=>7, 'UsersId'=>8, 'Added'=>9, 'Changed'=>10, 'Rel'=>11, 'Notes'=>12, 'Rss'=>13);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`links_urls`.`Id`'=>0, '`links_urls`.`Url`'=>1, '`links_urls`.`Name`'=>2, '`links_urls`.`Image`'=>3, '`links_urls`.`Target`'=>4, '`links_urls`.`LinksCategoriesId`'=>5, '`links_urls`.`Description`'=>6, '`links_urls`.`Visible`'=>7, '`links_urls`.`UsersId`'=>8, '`links_urls`.`Added`'=>9, '`links_urls`.`Changed`'=>10, '`links_urls`.`Rel`'=>11, '`links_urls`.`Notes`'=>12, '`links_urls`.`Rss`'=>13);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'url'=>1, 'name'=>2, 'image'=>3, 'target'=>4, 'links_categories_id'=>5, 'description'=>6, 'visible'=>7, 'users_id'=>8, 'added'=>9, 'changed'=>10, 'rel'=>11, 'notes'=>12, 'rss'=>13);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'url', 'name', 'image', 'target', 'links_categories_id', 'description', 'visible', 'users_id', 'added', 'changed', 'rel', 'notes', 'rss');
	
	
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
			throw new WgException("LinksUrls could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelLinksUrls::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('LinksUrlsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LinksUrlsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('LinksUrlsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('LinksUrlsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in LinksUrlsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in LinksUrlsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20)
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set LinksUrlsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of url -> varchar(255)
	 * 
	 * @name getUrl
	 * @return varchar
	 */
	public function getUrl() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set LinksUrlsModel::getUrl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getUrl', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LinksUrlsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> varchar(255)
	 * 
	 * @name getImage
	 * @return varchar
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set LinksUrlsModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getImage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of target -> varchar(25)
	 * 
	 * @name getTarget
	 * @return varchar
	 */
	public function getTarget() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set LinksUrlsModel::getTarget', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getTarget', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of links_categories_id -> int(8)
	 * 
	 * @name getLinksCategoriesId
	 * @return int
	 */
	public function getLinksCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) $this->_result[5];
			else parent::throwGetColException('Not set LinksUrlsModel::getLinksCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getLinksCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> varchar(255)
	 * 
	 * @name getDescription
	 * @return varchar
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set LinksUrlsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of visible -> tinyint(1)
	 * 
	 * @name getVisible
	 * @return tinyint
	 */
	public function getVisible() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set LinksUrlsModel::getVisible', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getVisible', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> int(11)
	 * 
	 * @name getUsersId
	 * @return int
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (int) $this->_result[8];
			else parent::throwGetColException('Not set LinksUrlsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getUsersId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LinksUrlsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getAdded', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set LinksUrlsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rel -> varchar(255)
	 * 
	 * @name getRel
	 * @return varchar
	 */
	public function getRel() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set LinksUrlsModel::getRel', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getRel', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notes -> text
	 * 
	 * @name getNotes
	 * @return text
	 */
	public function getNotes() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set LinksUrlsModel::getNotes', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getNotes', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rss -> varchar(255)
	 * 
	 * @name getRss
	 * @return varchar
	 */
	public function getRss() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set LinksUrlsModel::getRss', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From LinksUrlsModel::getRss', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: LinksUrlsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: LinksUrlsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table links_urls
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new LinksUrlsModel());
	}
	
	/** Left join select function from table links_urls
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LinksUrlsModel());
	}
	
	/** Right join select function from table links_urls
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LinksUrlsModel());
	}
	
	/** Inner join select function from table links_urls
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new LinksUrlsModel());
	}
	
	/**
	 * Select one item function from table links_urls
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
		$ret = DbModel::doSelect($conn, new LinksUrlsModel());
		if (isset($ret[0]) && is_a($ret[0], 'LinksUrlsModel')) return $ret[0];
		else {
			$class = new LinksUrlsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table links_urls
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new LinksUrlsModel());
	}
	
	/**
	 * Basic pager function from table links_urls
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
		return DbModel::doPager($conn, new LinksUrlsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table links_urls
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
		return (int) DbModel::doAffected($conn, new LinksUrlsModel());
	}
	
	/**
	 * Basic update function for table links_urls
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
		$af = (int) DbModel::doAffected($conn, new LinksUrlsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table links_urls
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
		return (int) DbModel::doInsert($conn, new LinksUrlsModel());
	}
	
	/**
	 * Basic reader create function from table links_urls
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table links_urls
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
	 * Drop table function for table links_urls
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