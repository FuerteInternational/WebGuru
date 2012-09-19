<?php
/**
 * Database class for table blackhat_pages
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/blackhat_pages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:24
 */

class BaseBlackhatPagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'blackhat_pages';
	
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
	 * id_bp -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_bp';
	
	const FULL_PRIMARY_KEY = '`blackhat_pages`.`id_bp`';
	
	/**
	 * id_bp -> int(16) unsigned
	 */
	const FULL_ID_BP = '`blackhat_pages`.`id_bp`';
	
	const COL_ID_BP = 'id_bp';
	
	/**
	 * name_bp -> varchar(255)
	 */
	const FULL_NAME_BP = '`blackhat_pages`.`name_bp`';
	
	const COL_NAME_BP = 'name_bp';
	
	/**
	 * title_bp -> varchar(255)
	 */
	const FULL_TITLE_BP = '`blackhat_pages`.`title_bp`';
	
	const COL_TITLE_BP = 'title_bp';
	
	/**
	 * h1_bp -> varchar(255)
	 */
	const FULL_H1_BP = '`blackhat_pages`.`h1_bp`';
	
	const COL_H1_BP = 'h1_bp';
	
	/**
	 * keywords_bp -> text
	 */
	const FULL_KEYWORDS_BP = '`blackhat_pages`.`keywords_bp`';
	
	const COL_KEYWORDS_BP = 'keywords_bp';
	
	/**
	 * description_bp -> text
	 */
	const FULL_DESCRIPTION_BP = '`blackhat_pages`.`description_bp`';
	
	const COL_DESCRIPTION_BP = 'description_bp';
	
	/**
	 * text_bp -> text
	 */
	const FULL_TEXT_BP = '`blackhat_pages`.`text_bp`';
	
	const COL_TEXT_BP = 'text_bp';
	
	/**
	 * link_bp -> varchar(255)
	 */
	const FULL_LINK_BP = '`blackhat_pages`.`link_bp`';
	
	const COL_LINK_BP = 'link_bp';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`blackhat_pages`.`id_bp`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `blackhat_pages`.`id_bp`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdBp'=>0, 'NameBp'=>1, 'TitleBp'=>2, 'H1Bp'=>3, 'KeywordsBp'=>4, 'DescriptionBp'=>5, 'TextBp'=>6, 'LinkBp'=>7);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`blackhat_pages`.`IdBp`'=>0, '`blackhat_pages`.`NameBp`'=>1, '`blackhat_pages`.`TitleBp`'=>2, '`blackhat_pages`.`H1Bp`'=>3, '`blackhat_pages`.`KeywordsBp`'=>4, '`blackhat_pages`.`DescriptionBp`'=>5, '`blackhat_pages`.`TextBp`'=>6, '`blackhat_pages`.`LinkBp`'=>7);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_bp'=>0, 'name_bp'=>1, 'title_bp'=>2, 'h1_bp'=>3, 'keywords_bp'=>4, 'description_bp'=>5, 'text_bp'=>6, 'link_bp'=>7);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_bp', 'name_bp', 'title_bp', 'h1_bp', 'keywords_bp', 'description_bp', 'text_bp', 'link_bp');
	
	
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
			throw new WgException("BlackhatPages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelBlackhatPages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('BlackhatPagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlackhatPagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('BlackhatPagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlackhatPagesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in BlackhatPagesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in BlackhatPagesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_bp -> int(16) unsigned
	 * 
	 * @name getIdBp
	 * @return int
	 */
	public function getIdBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set BlackhatPagesModel::getIdBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getIdBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_bp -> varchar(255)
	 * 
	 * @name getNameBp
	 * @return varchar
	 */
	public function getNameBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set BlackhatPagesModel::getNameBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getNameBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title_bp -> varchar(255)
	 * 
	 * @name getTitleBp
	 * @return varchar
	 */
	public function getTitleBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set BlackhatPagesModel::getTitleBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getTitleBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1_bp -> varchar(255)
	 * 
	 * @name getH1Bp
	 * @return varchar
	 */
	public function getH1Bp() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set BlackhatPagesModel::getH1Bp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getH1Bp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords_bp -> text
	 * 
	 * @name getKeywordsBp
	 * @return text
	 */
	public function getKeywordsBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set BlackhatPagesModel::getKeywordsBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getKeywordsBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description_bp -> text
	 * 
	 * @name getDescriptionBp
	 * @return text
	 */
	public function getDescriptionBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set BlackhatPagesModel::getDescriptionBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getDescriptionBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text_bp -> text
	 * 
	 * @name getTextBp
	 * @return text
	 */
	public function getTextBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set BlackhatPagesModel::getTextBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getTextBp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link_bp -> varchar(255)
	 * 
	 * @name getLinkBp
	 * @return varchar
	 */
	public function getLinkBp() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set BlackhatPagesModel::getLinkBp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlackhatPagesModel::getLinkBp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: BlackhatPagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: BlackhatPagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table blackhat_pages
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new BlackhatPagesModel());
	}
	
	/**
	 * Select one item function from table blackhat_pages
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
		$ret = DbModel::doSelect($conn, new BlackhatPagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'BlackhatPagesModel')) return $ret[0];
		else {
			$class = new BlackhatPagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table blackhat_pages
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new BlackhatPagesModel());
	}
	
	/**
	 * Basic pager function from table blackhat_pages
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
		return DbModel::doPager($conn, new BlackhatPagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table blackhat_pages
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
		return (int) DbModel::doAffected($conn, new BlackhatPagesModel());
	}
	
	/**
	 * Basic update function for table blackhat_pages
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
		$af = (int) DbModel::doAffected($conn, new BlackhatPagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table blackhat_pages
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
		return (int) DbModel::doInsert($conn, new BlackhatPagesModel());
	}
	
	/**
	 * Basic reader create function from table blackhat_pages
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table blackhat_pages
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
	 * Drop table function for table blackhat_pages
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