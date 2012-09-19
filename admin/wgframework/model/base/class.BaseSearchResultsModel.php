<?php
/**
 * Database class for table search_results
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/search_results
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseSearchResultsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'search_results';
	
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
	 * id_sr -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_sr';
	
	const FULL_PRIMARY_KEY = '`search_results`.`id_sr`';
	
	/**
	 * id_sr -> int(32) unsigned
	 */
	const FULL_ID_SR = '`search_results`.`id_sr`';
	
	const COL_ID_SR = 'id_sr';
	
	/**
	 * addr_sr -> text
	 */
	const FULL_ADDR_SR = '`search_results`.`addr_sr`';
	
	const COL_ADDR_SR = 'addr_sr';
	
	/**
	 * root_sr -> varchar(255)
	 */
	const FULL_ROOT_SR = '`search_results`.`root_sr`';
	
	const COL_ROOT_SR = 'root_sr';
	
	/**
	 * sw_id_sr -> int(8)
	 */
	const FULL_SW_ID_SR = '`search_results`.`sw_id_sr`';
	
	const COL_SW_ID_SR = 'sw_id_sr';
	
	/**
	 * level_sr -> int(4)
	 */
	const FULL_LEVEL_SR = '`search_results`.`level_sr`';
	
	const COL_LEVEL_SR = 'level_sr';
	
	/**
	 * html_sr -> text
	 */
	const FULL_HTML_SR = '`search_results`.`html_sr`';
	
	const COL_HTML_SR = 'html_sr';
	
	/**
	 * text_sr -> text
	 */
	const FULL_TEXT_SR = '`search_results`.`text_sr`';
	
	const COL_TEXT_SR = 'text_sr';
	
	/**
	 * links_sr -> text
	 */
	const FULL_LINKS_SR = '`search_results`.`links_sr`';
	
	const COL_LINKS_SR = 'links_sr';
	
	/**
	 * title_sr -> text
	 */
	const FULL_TITLE_SR = '`search_results`.`title_sr`';
	
	const COL_TITLE_SR = 'title_sr';
	
	/**
	 * h1_sr -> text
	 */
	const FULL_H1_SR = '`search_results`.`h1_sr`';
	
	const COL_H1_SR = 'h1_sr';
	
	/**
	 * keywords_sr -> text
	 */
	const FULL_KEYWORDS_SR = '`search_results`.`keywords_sr`';
	
	const COL_KEYWORDS_SR = 'keywords_sr';
	
	/**
	 * description_sr -> text
	 */
	const FULL_DESCRIPTION_SR = '`search_results`.`description_sr`';
	
	const COL_DESCRIPTION_SR = 'description_sr';
	
	/**
	 * added_sr -> datetime
	 */
	const FULL_ADDED_SR = '`search_results`.`added_sr`';
	
	const COL_ADDED_SR = 'added_sr';
	
	/**
	 * changed_sr -> datetime
	 */
	const FULL_CHANGED_SR = '`search_results`.`changed_sr`';
	
	const COL_CHANGED_SR = 'changed_sr';
	
	/**
	 * ilinks_sr -> int(16)
	 */
	const FULL_ILINKS_SR = '`search_results`.`ilinks_sr`';
	
	const COL_ILINKS_SR = 'ilinks_sr';
	
	/**
	 * elinks_sr -> int(16)
	 */
	const FULL_ELINKS_SR = '`search_results`.`elinks_sr`';
	
	const COL_ELINKS_SR = 'elinks_sr';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`search_results`.`id_sr`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `search_results`.`id_sr`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdSr'=>0, 'AddrSr'=>1, 'RootSr'=>2, 'SwIdSr'=>3, 'LevelSr'=>4, 'HtmlSr'=>5, 'TextSr'=>6, 'LinksSr'=>7, 'TitleSr'=>8, 'H1Sr'=>9, 'KeywordsSr'=>10, 'DescriptionSr'=>11, 'AddedSr'=>12, 'ChangedSr'=>13, 'IlinksSr'=>14, 'ElinksSr'=>15);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`search_results`.`IdSr`'=>0, '`search_results`.`AddrSr`'=>1, '`search_results`.`RootSr`'=>2, '`search_results`.`SwIdSr`'=>3, '`search_results`.`LevelSr`'=>4, '`search_results`.`HtmlSr`'=>5, '`search_results`.`TextSr`'=>6, '`search_results`.`LinksSr`'=>7, '`search_results`.`TitleSr`'=>8, '`search_results`.`H1Sr`'=>9, '`search_results`.`KeywordsSr`'=>10, '`search_results`.`DescriptionSr`'=>11, '`search_results`.`AddedSr`'=>12, '`search_results`.`ChangedSr`'=>13, '`search_results`.`IlinksSr`'=>14, '`search_results`.`ElinksSr`'=>15);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_sr'=>0, 'addr_sr'=>1, 'root_sr'=>2, 'sw_id_sr'=>3, 'level_sr'=>4, 'html_sr'=>5, 'text_sr'=>6, 'links_sr'=>7, 'title_sr'=>8, 'h1_sr'=>9, 'keywords_sr'=>10, 'description_sr'=>11, 'added_sr'=>12, 'changed_sr'=>13, 'ilinks_sr'=>14, 'elinks_sr'=>15);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_sr', 'addr_sr', 'root_sr', 'sw_id_sr', 'level_sr', 'html_sr', 'text_sr', 'links_sr', 'title_sr', 'h1_sr', 'keywords_sr', 'description_sr', 'added_sr', 'changed_sr', 'ilinks_sr', 'elinks_sr');
	
	
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
			throw new WgException("SearchResults could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSearchResults::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SearchResultsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchResultsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SearchResultsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SearchResultsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SearchResultsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SearchResultsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_sr -> int(32) unsigned
	 * 
	 * @name getIdSr
	 * @return int
	 */
	public function getIdSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set SearchResultsModel::getIdSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getIdSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addr_sr -> text
	 * 
	 * @name getAddrSr
	 * @return text
	 */
	public function getAddrSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set SearchResultsModel::getAddrSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getAddrSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of root_sr -> varchar(255)
	 * 
	 * @name getRootSr
	 * @return varchar
	 */
	public function getRootSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set SearchResultsModel::getRootSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getRootSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sw_id_sr -> int(8)
	 * 
	 * @name getSwIdSr
	 * @return int
	 */
	public function getSwIdSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SearchResultsModel::getSwIdSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getSwIdSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of level_sr -> int(4)
	 * 
	 * @name getLevelSr
	 * @return int
	 */
	public function getLevelSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SearchResultsModel::getLevelSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getLevelSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of html_sr -> text
	 * 
	 * @name getHtmlSr
	 * @return text
	 */
	public function getHtmlSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SearchResultsModel::getHtmlSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getHtmlSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text_sr -> text
	 * 
	 * @name getTextSr
	 * @return text
	 */
	public function getTextSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SearchResultsModel::getTextSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getTextSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of links_sr -> text
	 * 
	 * @name getLinksSr
	 * @return text
	 */
	public function getLinksSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SearchResultsModel::getLinksSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getLinksSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_sr -> text
	 * 
	 * @name getTitleSr
	 * @return text
	 */
	public function getTitleSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SearchResultsModel::getTitleSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getTitleSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1_sr -> text
	 * 
	 * @name getH1Sr
	 * @return text
	 */
	public function getH1Sr() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SearchResultsModel::getH1Sr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getH1Sr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_sr -> text
	 * 
	 * @name getKeywordsSr
	 * @return text
	 */
	public function getKeywordsSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SearchResultsModel::getKeywordsSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getKeywordsSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description_sr -> text
	 * 
	 * @name getDescriptionSr
	 * @return text
	 */
	public function getDescriptionSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SearchResultsModel::getDescriptionSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getDescriptionSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_sr -> datetime
	 * 
	 * @name getAddedSr
	 * @return datetime
	 */
	public function getAddedSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (int) strtotime($this->_result[12]);
			else parent::throwGetColException('Not set SearchResultsModel::getAddedSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getAddedSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_sr -> datetime
	 * 
	 * @name getChangedSr
	 * @return datetime
	 */
	public function getChangedSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (int) strtotime($this->_result[13]);
			else parent::throwGetColException('Not set SearchResultsModel::getChangedSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getChangedSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ilinks_sr -> int(16)
	 * 
	 * @name getIlinksSr
	 * @return int
	 */
	public function getIlinksSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set SearchResultsModel::getIlinksSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getIlinksSr', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of elinks_sr -> int(16)
	 * 
	 * @name getElinksSr
	 * @return int
	 */
	public function getElinksSr() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set SearchResultsModel::getElinksSr', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SearchResultsModel::getElinksSr', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SearchResultsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SearchResultsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table search_results
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SearchResultsModel());
	}
	
	/**
	 * Select one item function from table search_results
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
		$ret = DbModel::doSelect($conn, new SearchResultsModel());
		if (isset($ret[0]) && is_a($ret[0], 'SearchResultsModel')) return $ret[0];
		else {
			$class = new SearchResultsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table search_results
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SearchResultsModel());
	}
	
	/**
	 * Basic pager function from table search_results
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
		return DbModel::doPager($conn, new SearchResultsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table search_results
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
		return (int) DbModel::doAffected($conn, new SearchResultsModel());
	}
	
	/**
	 * Basic update function for table search_results
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
		$af = (int) DbModel::doAffected($conn, new SearchResultsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table search_results
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
		return (int) DbModel::doInsert($conn, new SearchResultsModel());
	}
	
	/**
	 * Basic reader create function from table search_results
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table search_results
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
	 * Drop table function for table search_results
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