<?php
/**
 * Database class for table crawler_images
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/crawler_images
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseCrawlerImagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'crawler_images';
	
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
	
	const FULL_PRIMARY_KEY = '`crawler_images`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`crawler_images`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * crawler_results_id -> int(11)
	 */
	const FULL_CRAWLER_RESULTS_ID = '`crawler_images`.`crawler_results_id`';
	
	const COL_CRAWLER_RESULTS_ID = 'crawler_results_id';
	
	/**
	 * url -> varchar(255)
	 */
	const FULL_URL = '`crawler_images`.`url`';
	
	const COL_URL = 'url';
	
	/**
	 * alt -> varchar(255)
	 */
	const FULL_ALT = '`crawler_images`.`alt`';
	
	const COL_ALT = 'alt';
	
	/**
	 * image -> longblob
	 */
	const FULL_IMAGE = '`crawler_images`.`image`';
	
	const COL_IMAGE = 'image';
	
	/**
	 * mime -> varchar(30)
	 */
	const FULL_MIME = '`crawler_images`.`mime`';
	
	const COL_MIME = 'mime';
	
	/**
	 * internal -> tinyint(1)
	 */
	const FULL_INTERNAL = '`crawler_images`.`internal`';
	
	const COL_INTERNAL = 'internal';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`crawler_images`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `crawler_images`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'CrawlerResultsId'=>1, 'Url'=>2, 'Alt'=>3, 'Image'=>4, 'Mime'=>5, 'Internal'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`crawler_images`.`Id`'=>0, '`crawler_images`.`CrawlerResultsId`'=>1, '`crawler_images`.`Url`'=>2, '`crawler_images`.`Alt`'=>3, '`crawler_images`.`Image`'=>4, '`crawler_images`.`Mime`'=>5, '`crawler_images`.`Internal`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'crawler_results_id'=>1, 'url'=>2, 'alt'=>3, 'image'=>4, 'mime'=>5, 'internal'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'crawler_results_id', 'url', 'alt', 'image', 'mime', 'internal');
	
	
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
			throw new WgException("CrawlerImages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCrawlerImages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CrawlerImagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerImagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CrawlerImagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CrawlerImagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CrawlerImagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CrawlerImagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set CrawlerImagesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of crawler_results_id -> int(11)
	 * 
	 * @name getCrawlerResultsId
	 * @return int
	 */
	public function getCrawlerResultsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set CrawlerImagesModel::getCrawlerResultsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getCrawlerResultsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of url -> varchar(255)
	 * 
	 * @name getUrl
	 * @return varchar
	 */
	public function getUrl() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set CrawlerImagesModel::getUrl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getUrl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of alt -> varchar(255)
	 * 
	 * @name getAlt
	 * @return varchar
	 */
	public function getAlt() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CrawlerImagesModel::getAlt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getAlt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> longblob
	 * 
	 * @name getImage
	 * @return longblob
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CrawlerImagesModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getImage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mime -> varchar(30)
	 * 
	 * @name getMime
	 * @return varchar
	 */
	public function getMime() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CrawlerImagesModel::getMime', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getMime', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of internal -> tinyint(1)
	 * 
	 * @name getInternal
	 * @return tinyint
	 */
	public function getInternal() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CrawlerImagesModel::getInternal', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CrawlerImagesModel::getInternal', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CrawlerImagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CrawlerImagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table crawler_images
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CrawlerImagesModel());
	}
	
	/** Left join select function from table crawler_images
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CrawlerImagesModel());
	}
	
	/** Right join select function from table crawler_images
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CrawlerImagesModel());
	}
	
	/** Inner join select function from table crawler_images
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new CrawlerImagesModel());
	}
	
	/**
	 * Select one item function from table crawler_images
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
		$ret = DbModel::doSelect($conn, new CrawlerImagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CrawlerImagesModel')) return $ret[0];
		else {
			$class = new CrawlerImagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table crawler_images
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CrawlerImagesModel());
	}
	
	/**
	 * Basic pager function from table crawler_images
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
		return DbModel::doPager($conn, new CrawlerImagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table crawler_images
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
		return (int) DbModel::doAffected($conn, new CrawlerImagesModel());
	}
	
	/**
	 * Basic update function for table crawler_images
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
		$af = (int) DbModel::doAffected($conn, new CrawlerImagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table crawler_images
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
		return (int) DbModel::doInsert($conn, new CrawlerImagesModel());
	}
	
	/**
	 * Basic reader create function from table crawler_images
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table crawler_images
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
	 * Drop table function for table crawler_images
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