<?php
/**
 * Database class for table iwallpapers_images
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/iwallpapers_images
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class BaseIwallpapersImagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'iwallpapers_images';
	
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
	
	const FULL_PRIMARY_KEY = '`iwallpapers_images`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`iwallpapers_images`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`iwallpapers_images`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * file -> varchar(255)
	 */
	const FULL_FILE = '`iwallpapers_images`.`file`';
	
	const COL_FILE = 'file';
	
	/**
	 * ratingdata -> longtext
	 */
	const FULL_RATINGDATA = '`iwallpapers_images`.`ratingdata`';
	
	const COL_RATINGDATA = 'ratingdata';
	
	/**
	 * votes -> bigint(20)
	 */
	const FULL_VOTES = '`iwallpapers_images`.`votes`';
	
	const COL_VOTES = 'votes';
	
	/**
	 * rating -> int(4)
	 */
	const FULL_RATING = '`iwallpapers_images`.`rating`';
	
	const COL_RATING = 'rating';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`iwallpapers_images`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * keywords -> text
	 */
	const FULL_KEYWORDS = '`iwallpapers_images`.`keywords`';
	
	const COL_KEYWORDS = 'keywords';
	
	/**
	 * user_id -> int(11) unsigned
	 */
	const FULL_USER_ID = '`iwallpapers_images`.`user_id`';
	
	const COL_USER_ID = 'user_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`iwallpapers_images`.`added`';
	
	const COL_ADDED = 'added';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`iwallpapers_images`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `iwallpapers_images`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'File'=>2, 'Ratingdata'=>3, 'Votes'=>4, 'Rating'=>5, 'Description'=>6, 'Keywords'=>7, 'UserId'=>8, 'Added'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`iwallpapers_images`.`Id`'=>0, '`iwallpapers_images`.`Name`'=>1, '`iwallpapers_images`.`File`'=>2, '`iwallpapers_images`.`Ratingdata`'=>3, '`iwallpapers_images`.`Votes`'=>4, '`iwallpapers_images`.`Rating`'=>5, '`iwallpapers_images`.`Description`'=>6, '`iwallpapers_images`.`Keywords`'=>7, '`iwallpapers_images`.`UserId`'=>8, '`iwallpapers_images`.`Added`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'file'=>2, 'ratingdata'=>3, 'votes'=>4, 'rating'=>5, 'description'=>6, 'keywords'=>7, 'user_id'=>8, 'added'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'file', 'ratingdata', 'votes', 'rating', 'description', 'keywords', 'user_id', 'added');
	
	
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
			throw new WgException("IwallpapersImages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelIwallpapersImages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('IwallpapersImagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IwallpapersImagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('IwallpapersImagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('IwallpapersImagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in IwallpapersImagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in IwallpapersImagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IwallpapersImagesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IwallpapersImagesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of file -> varchar(255)
	 * 
	 * @name getFile
	 * @return varchar
	 */
	public function getFile() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getFile', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getFile', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ratingdata -> longtext
	 * 
	 * @name getRatingdata
	 * @return longtext
	 */
	public function getRatingdata() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getRatingdata', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getRatingdata', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of votes -> bigint(20)
	 * 
	 * @name getVotes
	 * @return bigint
	 */
	public function getVotes() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getVotes', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getVotes', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rating -> int(4)
	 * 
	 * @name getRating
	 * @return int
	 */
	public function getRating() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getRating', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getRating', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords -> text
	 * 
	 * @name getKeywords
	 * @return text
	 */
	public function getKeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getKeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getKeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of user_id -> int(11) unsigned
	 * 
	 * @name getUserId
	 * @return int
	 */
	public function getUserId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set IwallpapersImagesModel::getUserId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getUserId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set IwallpapersImagesModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From IwallpapersImagesModel::getAdded', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: IwallpapersImagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: IwallpapersImagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table iwallpapers_images
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new IwallpapersImagesModel());
	}
	
	/**
	 * Select one item function from table iwallpapers_images
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
		$ret = DbModel::doSelect($conn, new IwallpapersImagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'IwallpapersImagesModel')) return $ret[0];
		else {
			$class = new IwallpapersImagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table iwallpapers_images
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new IwallpapersImagesModel());
	}
	
	/**
	 * Basic pager function from table iwallpapers_images
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
		return DbModel::doPager($conn, new IwallpapersImagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table iwallpapers_images
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
		return (int) DbModel::doAffected($conn, new IwallpapersImagesModel());
	}
	
	/**
	 * Basic update function for table iwallpapers_images
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
		$af = (int) DbModel::doAffected($conn, new IwallpapersImagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table iwallpapers_images
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
		return (int) DbModel::doInsert($conn, new IwallpapersImagesModel());
	}
	
	/**
	 * Basic reader create function from table iwallpapers_images
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table iwallpapers_images
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
	 * Drop table function for table iwallpapers_images
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