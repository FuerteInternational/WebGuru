<?php
/**
 * Database class for table news_fronttemps
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/news_fronttemps
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseNewsFronttempsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'news_fronttemps';
	
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
	 * id_nf -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_nf';
	
	const FULL_PRIMARY_KEY = '`news_fronttemps`.`id_nf`';
	
	/**
	 * id_nf -> int(8) unsigned
	 */
	const FULL_ID_NF = '`news_fronttemps`.`id_nf`';
	
	const COL_ID_NF = 'id_nf';
	
	/**
	 * nc_id_nf -> int(4)
	 */
	const FULL_NC_ID_NF = '`news_fronttemps`.`nc_id_nf`';
	
	const COL_NC_ID_NF = 'nc_id_nf';
	
	/**
	 * name_nf -> varchar(255)
	 */
	const FULL_NAME_NF = '`news_fronttemps`.`name_nf`';
	
	const COL_NAME_NF = 'name_nf';
	
	/**
	 * identifier_nf -> varchar(255)
	 */
	const FULL_IDENTIFIER_NF = '`news_fronttemps`.`identifier_nf`';
	
	const COL_IDENTIFIER_NF = 'identifier_nf';
	
	/**
	 * perpage_nf -> int(3)
	 */
	const FULL_PERPAGE_NF = '`news_fronttemps`.`perpage_nf`';
	
	const COL_PERPAGE_NF = 'perpage_nf';
	
	/**
	 * sortby_nf -> varchar(70)
	 */
	const FULL_SORTBY_NF = '`news_fronttemps`.`sortby_nf`';
	
	const COL_SORTBY_NF = 'sortby_nf';
	
	/**
	 * link_nf -> varchar(255)
	 */
	const FULL_LINK_NF = '`news_fronttemps`.`link_nf`';
	
	const COL_LINK_NF = 'link_nf';
	
	/**
	 * image_nf -> varchar(10)
	 */
	const FULL_IMAGE_NF = '`news_fronttemps`.`image_nf`';
	
	const COL_IMAGE_NF = 'image_nf';
	
	/**
	 * begin_nf -> text
	 */
	const FULL_BEGIN_NF = '`news_fronttemps`.`begin_nf`';
	
	const COL_BEGIN_NF = 'begin_nf';
	
	/**
	 * item_nf -> text
	 */
	const FULL_ITEM_NF = '`news_fronttemps`.`item_nf`';
	
	const COL_ITEM_NF = 'item_nf';
	
	/**
	 * end_nf -> text
	 */
	const FULL_END_NF = '`news_fronttemps`.`end_nf`';
	
	const COL_END_NF = 'end_nf';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`news_fronttemps`.`id_nf`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `news_fronttemps`.`id_nf`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdNf'=>0, 'NcIdNf'=>1, 'NameNf'=>2, 'IdentifierNf'=>3, 'PerpageNf'=>4, 'SortbyNf'=>5, 'LinkNf'=>6, 'ImageNf'=>7, 'BeginNf'=>8, 'ItemNf'=>9, 'EndNf'=>10);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`news_fronttemps`.`IdNf`'=>0, '`news_fronttemps`.`NcIdNf`'=>1, '`news_fronttemps`.`NameNf`'=>2, '`news_fronttemps`.`IdentifierNf`'=>3, '`news_fronttemps`.`PerpageNf`'=>4, '`news_fronttemps`.`SortbyNf`'=>5, '`news_fronttemps`.`LinkNf`'=>6, '`news_fronttemps`.`ImageNf`'=>7, '`news_fronttemps`.`BeginNf`'=>8, '`news_fronttemps`.`ItemNf`'=>9, '`news_fronttemps`.`EndNf`'=>10);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_nf'=>0, 'nc_id_nf'=>1, 'name_nf'=>2, 'identifier_nf'=>3, 'perpage_nf'=>4, 'sortby_nf'=>5, 'link_nf'=>6, 'image_nf'=>7, 'begin_nf'=>8, 'item_nf'=>9, 'end_nf'=>10);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_nf', 'nc_id_nf', 'name_nf', 'identifier_nf', 'perpage_nf', 'sortby_nf', 'link_nf', 'image_nf', 'begin_nf', 'item_nf', 'end_nf');
	
	
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
			throw new WgException("NewsFronttemps could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsFronttemps::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsFronttempsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsFronttempsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsFronttempsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsFronttempsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsFronttempsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsFronttempsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_nf -> int(8) unsigned
	 * 
	 * @name getIdNf
	 * @return int
	 */
	public function getIdNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsFronttempsModel::getIdNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getIdNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nc_id_nf -> int(4)
	 * 
	 * @name getNcIdNf
	 * @return int
	 */
	public function getNcIdNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set NewsFronttempsModel::getNcIdNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getNcIdNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_nf -> varchar(255)
	 * 
	 * @name getNameNf
	 * @return varchar
	 */
	public function getNameNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set NewsFronttempsModel::getNameNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getNameNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_nf -> varchar(255)
	 * 
	 * @name getIdentifierNf
	 * @return varchar
	 */
	public function getIdentifierNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set NewsFronttempsModel::getIdentifierNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getIdentifierNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage_nf -> int(3)
	 * 
	 * @name getPerpageNf
	 * @return int
	 */
	public function getPerpageNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set NewsFronttempsModel::getPerpageNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getPerpageNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sortby_nf -> varchar(70)
	 * 
	 * @name getSortbyNf
	 * @return varchar
	 */
	public function getSortbyNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set NewsFronttempsModel::getSortbyNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getSortbyNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link_nf -> varchar(255)
	 * 
	 * @name getLinkNf
	 * @return varchar
	 */
	public function getLinkNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set NewsFronttempsModel::getLinkNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getLinkNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image_nf -> varchar(10)
	 * 
	 * @name getImageNf
	 * @return varchar
	 */
	public function getImageNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set NewsFronttempsModel::getImageNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getImageNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin_nf -> text
	 * 
	 * @name getBeginNf
	 * @return text
	 */
	public function getBeginNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set NewsFronttempsModel::getBeginNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getBeginNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item_nf -> text
	 * 
	 * @name getItemNf
	 * @return text
	 */
	public function getItemNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set NewsFronttempsModel::getItemNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getItemNf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end_nf -> text
	 * 
	 * @name getEndNf
	 * @return text
	 */
	public function getEndNf() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set NewsFronttempsModel::getEndNf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsFronttempsModel::getEndNf', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsFronttempsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsFronttempsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table news_fronttemps
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsFronttempsModel());
	}
	
	/**
	 * Select one item function from table news_fronttemps
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
		$ret = DbModel::doSelect($conn, new NewsFronttempsModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsFronttempsModel')) return $ret[0];
		else {
			$class = new NewsFronttempsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table news_fronttemps
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsFronttempsModel());
	}
	
	/**
	 * Basic pager function from table news_fronttemps
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
		return DbModel::doPager($conn, new NewsFronttempsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table news_fronttemps
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
		return (int) DbModel::doAffected($conn, new NewsFronttempsModel());
	}
	
	/**
	 * Basic update function for table news_fronttemps
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
		$af = (int) DbModel::doAffected($conn, new NewsFronttempsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table news_fronttemps
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
		return (int) DbModel::doInsert($conn, new NewsFronttempsModel());
	}
	
	/**
	 * Basic reader create function from table news_fronttemps
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table news_fronttemps
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
	 * Drop table function for table news_fronttemps
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