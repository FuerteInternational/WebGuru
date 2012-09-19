<?php
/**
 * Database class for table search_cached
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_cached
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchCachedModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_cached';
	
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
	 * id_sc -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_sc';
	
	const FULL_PRIMARY_KEY = '`search_cached`.`id_sc`';
	
	/**
	 * id_sc -> int(32) unsigned
	 */
	const FULL_ID_SC = '`search_cached`.`id_sc`';
	
	const COL_ID_SC = 'id_sc';
	
	/**
	 * addr_sc -> text
	 */
	const FULL_ADDR_SC = '`search_cached`.`addr_sc`';
	
	const COL_ADDR_SC = 'addr_sc';
	
	/**
	 * root_sc -> varchar(255)
	 */
	const FULL_ROOT_SC = '`search_cached`.`root_sc`';
	
	const COL_ROOT_SC = 'root_sc';
	
	/**
	 * sw_id_sc -> int(8)
	 */
	const FULL_SW_ID_SC = '`search_cached`.`sw_id_sc`';
	
	const COL_SW_ID_SC = 'sw_id_sc';
	
	/**
	 * level_sc -> int(4)
	 */
	const FULL_LEVEL_SC = '`search_cached`.`level_sc`';
	
	const COL_LEVEL_SC = 'level_sc';
	
	/**
	 * html_sc -> text
	 */
	const FULL_HTML_SC = '`search_cached`.`html_sc`';
	
	const COL_HTML_SC = 'html_sc';
	
	/**
	 * text_sc -> text
	 */
	const FULL_TEXT_SC = '`search_cached`.`text_sc`';
	
	const COL_TEXT_SC = 'text_sc';
	
	/**
	 * links_sc -> text
	 */
	const FULL_LINKS_SC = '`search_cached`.`links_sc`';
	
	const COL_LINKS_SC = 'links_sc';
	
	/**
	 * title_sc -> text
	 */
	const FULL_TITLE_SC = '`search_cached`.`title_sc`';
	
	const COL_TITLE_SC = 'title_sc';
	
	/**
	 * h1_sc -> text
	 */
	const FULL_H1_SC = '`search_cached`.`h1_sc`';
	
	const COL_H1_SC = 'h1_sc';
	
	/**
	 * keywords_sc -> text
	 */
	const FULL_KEYWORDS_SC = '`search_cached`.`keywords_sc`';
	
	const COL_KEYWORDS_SC = 'keywords_sc';
	
	/**
	 * description_sc -> text
	 */
	const FULL_DESCRIPTION_SC = '`search_cached`.`description_sc`';
	
	const COL_DESCRIPTION_SC = 'description_sc';
	
	/**
	 * added_sc -> datetime
	 */
	const FULL_ADDED_SC = '`search_cached`.`added_sc`';
	
	const COL_ADDED_SC = 'added_sc';
	
	/**
	 * changed_sc -> datetime
	 */
	const FULL_CHANGED_SC = '`search_cached`.`changed_sc`';
	
	const COL_CHANGED_SC = 'changed_sc';
	
	/**
	 * cached_sc -> datetime
	 */
	const FULL_CACHED_SC = '`search_cached`.`cached_sc`';
	
	const COL_CACHED_SC = 'cached_sc';
	
	/**
	 * cid_sc -> int(16)
	 */
	const FULL_CID_SC = '`search_cached`.`cid_sc`';
	
	const COL_CID_SC = 'cid_sc';
	
	/**
	 * ilinks_sc -> int(16)
	 */
	const FULL_ILINKS_SC = '`search_cached`.`ilinks_sc`';
	
	const COL_ILINKS_SC = 'ilinks_sc';
	
	/**
	 * elinks_sc -> int(16)
	 */
	const FULL_ELINKS_SC = '`search_cached`.`elinks_sc`';
	
	const COL_ELINKS_SC = 'elinks_sc';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_cached`.`id_sc`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_cached`.`id_sc`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSc'=>0, 'AddrSc'=>1, 'RootSc'=>2, 'SwIdSc'=>3, 'LevelSc'=>4, 'HtmlSc'=>5, 'TextSc'=>6, 'LinksSc'=>7, 'TitleSc'=>8, 'H1Sc'=>9, 'KeywordsSc'=>10, 'DescriptionSc'=>11, 'AddedSc'=>12, 'ChangedSc'=>13, 'CachedSc'=>14, 'CidSc'=>15, 'IlinksSc'=>16, 'ElinksSc'=>17);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_cached`.`IdSc`'=>0, '`search_cached`.`AddrSc`'=>1, '`search_cached`.`RootSc`'=>2, '`search_cached`.`SwIdSc`'=>3, '`search_cached`.`LevelSc`'=>4, '`search_cached`.`HtmlSc`'=>5, '`search_cached`.`TextSc`'=>6, '`search_cached`.`LinksSc`'=>7, '`search_cached`.`TitleSc`'=>8, '`search_cached`.`H1Sc`'=>9, '`search_cached`.`KeywordsSc`'=>10, '`search_cached`.`DescriptionSc`'=>11, '`search_cached`.`AddedSc`'=>12, '`search_cached`.`ChangedSc`'=>13, '`search_cached`.`CachedSc`'=>14, '`search_cached`.`CidSc`'=>15, '`search_cached`.`IlinksSc`'=>16, '`search_cached`.`ElinksSc`'=>17);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sc'=>0, 'addr_sc'=>1, 'root_sc'=>2, 'sw_id_sc'=>3, 'level_sc'=>4, 'html_sc'=>5, 'text_sc'=>6, 'links_sc'=>7, 'title_sc'=>8, 'h1_sc'=>9, 'keywords_sc'=>10, 'description_sc'=>11, 'added_sc'=>12, 'changed_sc'=>13, 'cached_sc'=>14, 'cid_sc'=>15, 'ilinks_sc'=>16, 'elinks_sc'=>17);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sc', 'addr_sc', 'root_sc', 'sw_id_sc', 'level_sc', 'html_sc', 'text_sc', 'links_sc', 'title_sc', 'h1_sc', 'keywords_sc', 'description_sc', 'added_sc', 'changed_sc', 'cached_sc', 'cid_sc', 'ilinks_sc', 'elinks_sc');
	
	
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
			throw new WgException("SearchCached could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchCached::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchCachedModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchCachedModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchCachedModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchCachedModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchCachedModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchCachedModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sc -> int(32) unsigned
	 * 
	 * @name getIdSc
	 * @return int
	 */
	public function getIdSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchCachedModel::getIdSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getIdSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addr_sc -> text
	 * 
	 * @name getAddrSc
	 * @return text
	 */
	public function getAddrSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchCachedModel::getAddrSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getAddrSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of root_sc -> varchar(255)
	 * 
	 * @name getRootSc
	 * @return varchar
	 */
	public function getRootSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchCachedModel::getRootSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getRootSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sw_id_sc -> int(8)
	 * 
	 * @name getSwIdSc
	 * @return int
	 */
	public function getSwIdSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchCachedModel::getSwIdSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getSwIdSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of level_sc -> int(4)
	 * 
	 * @name getLevelSc
	 * @return int
	 */
	public function getLevelSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchCachedModel::getLevelSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getLevelSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of html_sc -> text
	 * 
	 * @name getHtmlSc
	 * @return text
	 */
	public function getHtmlSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchCachedModel::getHtmlSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getHtmlSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text_sc -> text
	 * 
	 * @name getTextSc
	 * @return text
	 */
	public function getTextSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SearchCachedModel::getTextSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getTextSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of links_sc -> text
	 * 
	 * @name getLinksSc
	 * @return text
	 */
	public function getLinksSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SearchCachedModel::getLinksSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getLinksSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_sc -> text
	 * 
	 * @name getTitleSc
	 * @return text
	 */
	public function getTitleSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchCachedModel::getTitleSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getTitleSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1_sc -> text
	 * 
	 * @name getH1Sc
	 * @return text
	 */
	public function getH1Sc() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SearchCachedModel::getH1Sc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getH1Sc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_sc -> text
	 * 
	 * @name getKeywordsSc
	 * @return text
	 */
	public function getKeywordsSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SearchCachedModel::getKeywordsSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getKeywordsSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description_sc -> text
	 * 
	 * @name getDescriptionSc
	 * @return text
	 */
	public function getDescriptionSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SearchCachedModel::getDescriptionSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getDescriptionSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sc -> datetime
	 * 
	 * @name getAddedSc
	 * @return datetime
	 */
	public function getAddedSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) strtotime($this->_result[12]);
			else parent::throwGetColException('Not set SearchCachedModel::getAddedSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getAddedSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_sc -> datetime
	 * 
	 * @name getChangedSc
	 * @return datetime
	 */
	public function getChangedSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) strtotime($this->_result[13]);
			else parent::throwGetColException('Not set SearchCachedModel::getChangedSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getChangedSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cached_sc -> datetime
	 * 
	 * @name getCachedSc
	 * @return datetime
	 */
	public function getCachedSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (int) strtotime($this->_result[14]);
			else parent::throwGetColException('Not set SearchCachedModel::getCachedSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getCachedSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cid_sc -> int(16)
	 * 
	 * @name getCidSc
	 * @return int
	 */
	public function getCidSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set SearchCachedModel::getCidSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getCidSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ilinks_sc -> int(16)
	 * 
	 * @name getIlinksSc
	 * @return int
	 */
	public function getIlinksSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set SearchCachedModel::getIlinksSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getIlinksSc', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of elinks_sc -> int(16)
	 * 
	 * @name getElinksSc
	 * @return int
	 */
	public function getElinksSc() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set SearchCachedModel::getElinksSc', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchCachedModel::getElinksSc', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchCachedModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchCachedModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_cached
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchCachedModel());
	}
	
	/**
	 * Select one item function from table search_cached
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
		$ret = DbModel::doSelect($conn, new SearchCachedModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchCachedModel')) return $ret[0];
		else {
			$class = new SearchCachedModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_cached
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchCachedModel());
	}
	
	/**
	 * Basic pager function from table search_cached
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
		return DbModel::doPager($conn, new SearchCachedModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_cached
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
		return (int) DbModel::doAffected($conn, new SearchCachedModel());
	}
	
	/**
	 * Basic update function for table search_cached
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
		$af = (int) DbModel::doAffected($conn, new SearchCachedModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_cached
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
		return (int) DbModel::doInsert($conn, new SearchCachedModel());
	}
	
	/**
	 * Basic reader create function from table search_cached
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_cached
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
	 * Drop table function for table search_cached
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