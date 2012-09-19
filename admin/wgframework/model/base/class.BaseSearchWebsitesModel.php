<?php
/**
 * Database class for table search_websites
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_websites
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchWebsitesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_websites';
	
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
	 * id_sw -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_sw';
	
	const FULL_PRIMARY_KEY = '`search_websites`.`id_sw`';
	
	/**
	 * id_sw -> int(8) unsigned
	 */
	const FULL_ID_SW = '`search_websites`.`id_sw`';
	
	const COL_ID_SW = 'id_sw';
	
	/**
	 * name_sw -> varchar(255)
	 */
	const FULL_NAME_SW = '`search_websites`.`name_sw`';
	
	const COL_NAME_SW = 'name_sw';
	
	/**
	 * url_sw -> text
	 */
	const FULL_URL_SW = '`search_websites`.`url_sw`';
	
	const COL_URL_SW = 'url_sw';
	
	/**
	 * desc_sw -> text
	 */
	const FULL_DESC_SW = '`search_websites`.`desc_sw`';
	
	const COL_DESC_SW = 'desc_sw';
	
	/**
	 * added_sw -> datetime
	 */
	const FULL_ADDED_SW = '`search_websites`.`added_sw`';
	
	const COL_ADDED_SW = 'added_sw';
	
	/**
	 * changed_sw -> datetime
	 */
	const FULL_CHANGED_SW = '`search_websites`.`changed_sw`';
	
	const COL_CHANGED_SW = 'changed_sw';
	
	/**
	 * crawled_sw -> datetime
	 */
	const FULL_CRAWLED_SW = '`search_websites`.`crawled_sw`';
	
	const COL_CRAWLED_SW = 'crawled_sw';
	
	/**
	 * cached_sw -> datetime
	 */
	const FULL_CACHED_SW = '`search_websites`.`cached_sw`';
	
	const COL_CACHED_SW = 'cached_sw';
	
	/**
	 * users_id_sw -> int(16)
	 */
	const FULL_USERS_ID_SW = '`search_websites`.`users_id_sw`';
	
	const COL_USERS_ID_SW = 'users_id_sw';
	
	/**
	 * account_sw -> int(8)
	 */
	const FULL_ACCOUNT_SW = '`search_websites`.`account_sw`';
	
	const COL_ACCOUNT_SW = 'account_sw';
	
	/**
	 * aproved_sw -> tinyint(1)
	 */
	const FULL_APROVED_SW = '`search_websites`.`aproved_sw`';
	
	const COL_APROVED_SW = 'aproved_sw';
	
	/**
	 * sct_id_sw -> int(16)
	 */
	const FULL_SCT_ID_SW = '`search_websites`.`sct_id_sw`';
	
	const COL_SCT_ID_SW = 'sct_id_sw';
	
	/**
	 * image_sw -> varchar(255)
	 */
	const FULL_IMAGE_SW = '`search_websites`.`image_sw`';
	
	const COL_IMAGE_SW = 'image_sw';
	
	/**
	 * uiaproved_sw -> tinyint(1)
	 */
	const FULL_UIAPROVED_SW = '`search_websites`.`uiaproved_sw`';
	
	const COL_UIAPROVED_SW = 'uiaproved_sw';
	
	/**
	 * usrimg_sw -> varchar(255)
	 */
	const FULL_USRIMG_SW = '`search_websites`.`usrimg_sw`';
	
	const COL_USRIMG_SW = 'usrimg_sw';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_websites`.`id_sw`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_websites`.`id_sw`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSw'=>0, 'NameSw'=>1, 'UrlSw'=>2, 'DescSw'=>3, 'AddedSw'=>4, 'ChangedSw'=>5, 'CrawledSw'=>6, 'CachedSw'=>7, 'UsersIdSw'=>8, 'AccountSw'=>9, 'AprovedSw'=>10, 'SctIdSw'=>11, 'ImageSw'=>12, 'UiaprovedSw'=>13, 'UsrimgSw'=>14);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_websites`.`IdSw`'=>0, '`search_websites`.`NameSw`'=>1, '`search_websites`.`UrlSw`'=>2, '`search_websites`.`DescSw`'=>3, '`search_websites`.`AddedSw`'=>4, '`search_websites`.`ChangedSw`'=>5, '`search_websites`.`CrawledSw`'=>6, '`search_websites`.`CachedSw`'=>7, '`search_websites`.`UsersIdSw`'=>8, '`search_websites`.`AccountSw`'=>9, '`search_websites`.`AprovedSw`'=>10, '`search_websites`.`SctIdSw`'=>11, '`search_websites`.`ImageSw`'=>12, '`search_websites`.`UiaprovedSw`'=>13, '`search_websites`.`UsrimgSw`'=>14);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sw'=>0, 'name_sw'=>1, 'url_sw'=>2, 'desc_sw'=>3, 'added_sw'=>4, 'changed_sw'=>5, 'crawled_sw'=>6, 'cached_sw'=>7, 'users_id_sw'=>8, 'account_sw'=>9, 'aproved_sw'=>10, 'sct_id_sw'=>11, 'image_sw'=>12, 'uiaproved_sw'=>13, 'usrimg_sw'=>14);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sw', 'name_sw', 'url_sw', 'desc_sw', 'added_sw', 'changed_sw', 'crawled_sw', 'cached_sw', 'users_id_sw', 'account_sw', 'aproved_sw', 'sct_id_sw', 'image_sw', 'uiaproved_sw', 'usrimg_sw');
	
	
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
			throw new WgException("SearchWebsites could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchWebsites::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchWebsitesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchWebsitesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchWebsitesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchWebsitesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchWebsitesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchWebsitesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sw -> int(8) unsigned
	 * 
	 * @name getIdSw
	 * @return int
	 */
	public function getIdSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchWebsitesModel::getIdSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getIdSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_sw -> varchar(255)
	 * 
	 * @name getNameSw
	 * @return varchar
	 */
	public function getNameSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchWebsitesModel::getNameSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getNameSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of url_sw -> text
	 * 
	 * @name getUrlSw
	 * @return text
	 */
	public function getUrlSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchWebsitesModel::getUrlSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getUrlSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_sw -> text
	 * 
	 * @name getDescSw
	 * @return text
	 */
	public function getDescSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchWebsitesModel::getDescSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getDescSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sw -> datetime
	 * 
	 * @name getAddedSw
	 * @return datetime
	 */
	public function getAddedSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set SearchWebsitesModel::getAddedSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getAddedSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_sw -> datetime
	 * 
	 * @name getChangedSw
	 * @return datetime
	 */
	public function getChangedSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set SearchWebsitesModel::getChangedSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getChangedSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of crawled_sw -> datetime
	 * 
	 * @name getCrawledSw
	 * @return datetime
	 */
	public function getCrawledSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set SearchWebsitesModel::getCrawledSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getCrawledSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cached_sw -> datetime
	 * 
	 * @name getCachedSw
	 * @return datetime
	 */
	public function getCachedSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set SearchWebsitesModel::getCachedSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getCachedSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id_sw -> int(16)
	 * 
	 * @name getUsersIdSw
	 * @return int
	 */
	public function getUsersIdSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchWebsitesModel::getUsersIdSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getUsersIdSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of account_sw -> int(8)
	 * 
	 * @name getAccountSw
	 * @return int
	 */
	public function getAccountSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SearchWebsitesModel::getAccountSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getAccountSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of aproved_sw -> tinyint(1)
	 * 
	 * @name getAprovedSw
	 * @return tinyint
	 */
	public function getAprovedSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SearchWebsitesModel::getAprovedSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getAprovedSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sct_id_sw -> int(16)
	 * 
	 * @name getSctIdSw
	 * @return int
	 */
	public function getSctIdSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SearchWebsitesModel::getSctIdSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getSctIdSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image_sw -> varchar(255)
	 * 
	 * @name getImageSw
	 * @return varchar
	 */
	public function getImageSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SearchWebsitesModel::getImageSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getImageSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of uiaproved_sw -> tinyint(1)
	 * 
	 * @name getUiaprovedSw
	 * @return tinyint
	 */
	public function getUiaprovedSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set SearchWebsitesModel::getUiaprovedSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getUiaprovedSw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of usrimg_sw -> varchar(255)
	 * 
	 * @name getUsrimgSw
	 * @return varchar
	 */
	public function getUsrimgSw() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set SearchWebsitesModel::getUsrimgSw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchWebsitesModel::getUsrimgSw', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchWebsitesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchWebsitesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_websites
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchWebsitesModel());
	}
	
	/**
	 * Select one item function from table search_websites
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
		$ret = DbModel::doSelect($conn, new SearchWebsitesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchWebsitesModel')) return $ret[0];
		else {
			$class = new SearchWebsitesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_websites
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchWebsitesModel());
	}
	
	/**
	 * Basic pager function from table search_websites
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
		return DbModel::doPager($conn, new SearchWebsitesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_websites
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
		return (int) DbModel::doAffected($conn, new SearchWebsitesModel());
	}
	
	/**
	 * Basic update function for table search_websites
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
		$af = (int) DbModel::doAffected($conn, new SearchWebsitesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_websites
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
		return (int) DbModel::doInsert($conn, new SearchWebsitesModel());
	}
	
	/**
	 * Basic reader create function from table search_websites
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_websites
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
	 * Drop table function for table search_websites
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