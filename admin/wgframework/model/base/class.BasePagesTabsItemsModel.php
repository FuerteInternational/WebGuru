<?php
/**
 * Database class for table pages_tabs_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_tabs_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePagesTabsItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_tabs_items';
	
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
	 * id_pti -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_pti';
	
	const FULL_PRIMARY_KEY = '`pages_tabs_items`.`id_pti`';
	
	/**
	 * id_pti -> int(16) unsigned
	 */
	const FULL_ID_PTI = '`pages_tabs_items`.`id_pti`';
	
	const COL_ID_PTI = 'id_pti';
	
	/**
	 * ptc_id_pti -> int(8)
	 */
	const FULL_PTC_ID_PTI = '`pages_tabs_items`.`ptc_id_pti`';
	
	const COL_PTC_ID_PTI = 'ptc_id_pti';
	
	/**
	 * name_pti -> varchar(255)
	 */
	const FULL_NAME_PTI = '`pages_tabs_items`.`name_pti`';
	
	const COL_NAME_PTI = 'name_pti';
	
	/**
	 * identifier_pti -> varchar(255)
	 */
	const FULL_IDENTIFIER_PTI = '`pages_tabs_items`.`identifier_pti`';
	
	const COL_IDENTIFIER_PTI = 'identifier_pti';
	
	/**
	 * content_pti -> text
	 */
	const FULL_CONTENT_PTI = '`pages_tabs_items`.`content_pti`';
	
	const COL_CONTENT_PTI = 'content_pti';
	
	/**
	 * show_pti -> tinyint(1)
	 */
	const FULL_SHOW_PTI = '`pages_tabs_items`.`show_pti`';
	
	const COL_SHOW_PTI = 'show_pti';
	
	/**
	 * reg_pti -> tinyint(1)
	 */
	const FULL_REG_PTI = '`pages_tabs_items`.`reg_pti`';
	
	const COL_REG_PTI = 'reg_pti';
	
	/**
	 * notreg_pti -> tinyint(1)
	 */
	const FULL_NOTREG_PTI = '`pages_tabs_items`.`notreg_pti`';
	
	const COL_NOTREG_PTI = 'notreg_pti';
	
	/**
	 * ajax_pti -> tinyint(1)
	 */
	const FULL_AJAX_PTI = '`pages_tabs_items`.`ajax_pti`';
	
	const COL_AJAX_PTI = 'ajax_pti';
	
	/**
	 * ajaxfile_pti -> varchar(255)
	 */
	const FULL_AJAXFILE_PTI = '`pages_tabs_items`.`ajaxfile_pti`';
	
	const COL_AJAXFILE_PTI = 'ajaxfile_pti';
	
	/**
	 * sort_pti -> int(8)
	 */
	const FULL_SORT_PTI = '`pages_tabs_items`.`sort_pti`';
	
	const COL_SORT_PTI = 'sort_pti';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_tabs_items`.`id_pti`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_tabs_items`.`id_pti`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPti'=>0, 'PtcIdPti'=>1, 'NamePti'=>2, 'IdentifierPti'=>3, 'ContentPti'=>4, 'ShowPti'=>5, 'RegPti'=>6, 'NotregPti'=>7, 'AjaxPti'=>8, 'AjaxfilePti'=>9, 'SortPti'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_tabs_items`.`IdPti`'=>0, '`pages_tabs_items`.`PtcIdPti`'=>1, '`pages_tabs_items`.`NamePti`'=>2, '`pages_tabs_items`.`IdentifierPti`'=>3, '`pages_tabs_items`.`ContentPti`'=>4, '`pages_tabs_items`.`ShowPti`'=>5, '`pages_tabs_items`.`RegPti`'=>6, '`pages_tabs_items`.`NotregPti`'=>7, '`pages_tabs_items`.`AjaxPti`'=>8, '`pages_tabs_items`.`AjaxfilePti`'=>9, '`pages_tabs_items`.`SortPti`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pti'=>0, 'ptc_id_pti'=>1, 'name_pti'=>2, 'identifier_pti'=>3, 'content_pti'=>4, 'show_pti'=>5, 'reg_pti'=>6, 'notreg_pti'=>7, 'ajax_pti'=>8, 'ajaxfile_pti'=>9, 'sort_pti'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pti', 'ptc_id_pti', 'name_pti', 'identifier_pti', 'content_pti', 'show_pti', 'reg_pti', 'notreg_pti', 'ajax_pti', 'ajaxfile_pti', 'sort_pti');
	
	
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
			throw new WgException("PagesTabsItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesTabsItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesTabsItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesTabsItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesTabsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesTabsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesTabsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesTabsItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pti -> int(16) unsigned
	 * 
	 * @name getIdPti
	 * @return int
	 */
	public function getIdPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getIdPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getIdPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ptc_id_pti -> int(8)
	 * 
	 * @name getPtcIdPti
	 * @return int
	 */
	public function getPtcIdPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getPtcIdPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getPtcIdPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pti -> varchar(255)
	 * 
	 * @name getNamePti
	 * @return varchar
	 */
	public function getNamePti() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getNamePti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getNamePti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pti -> varchar(255)
	 * 
	 * @name getIdentifierPti
	 * @return varchar
	 */
	public function getIdentifierPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getIdentifierPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getIdentifierPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of content_pti -> text
	 * 
	 * @name getContentPti
	 * @return text
	 */
	public function getContentPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getContentPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getContentPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of show_pti -> tinyint(1)
	 * 
	 * @name getShowPti
	 * @return tinyint
	 */
	public function getShowPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getShowPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getShowPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of reg_pti -> tinyint(1)
	 * 
	 * @name getRegPti
	 * @return tinyint
	 */
	public function getRegPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getRegPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getRegPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of notreg_pti -> tinyint(1)
	 * 
	 * @name getNotregPti
	 * @return tinyint
	 */
	public function getNotregPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getNotregPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getNotregPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ajax_pti -> tinyint(1)
	 * 
	 * @name getAjaxPti
	 * @return tinyint
	 */
	public function getAjaxPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getAjaxPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getAjaxPti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ajaxfile_pti -> varchar(255)
	 * 
	 * @name getAjaxfilePti
	 * @return varchar
	 */
	public function getAjaxfilePti() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getAjaxfilePti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getAjaxfilePti', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort_pti -> int(8)
	 * 
	 * @name getSortPti
	 * @return int
	 */
	public function getSortPti() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PagesTabsItemsModel::getSortPti', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTabsItemsModel::getSortPti', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesTabsItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesTabsItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_tabs_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesTabsItemsModel());
	}
	
	/**
	 * Select one item function from table pages_tabs_items
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
		$ret = DbModel::doSelect($conn, new PagesTabsItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesTabsItemsModel')) return $ret[0];
		else {
			$class = new PagesTabsItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_tabs_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesTabsItemsModel());
	}
	
	/**
	 * Basic pager function from table pages_tabs_items
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
		return DbModel::doPager($conn, new PagesTabsItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_tabs_items
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
		return (int) DbModel::doAffected($conn, new PagesTabsItemsModel());
	}
	
	/**
	 * Basic update function for table pages_tabs_items
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
		$af = (int) DbModel::doAffected($conn, new PagesTabsItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_tabs_items
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
		return (int) DbModel::doInsert($conn, new PagesTabsItemsModel());
	}
	
	/**
	 * Basic reader create function from table pages_tabs_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_tabs_items
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
	 * Drop table function for table pages_tabs_items
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