<?php
/**
 * Database class for table newsletter_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/newsletter_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseNewsletterTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'newsletter_templates';
	
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
	 * id_nt -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_nt';
	
	const FULL_PRIMARY_KEY = '`newsletter_templates`.`id_nt`';
	
	/**
	 * id_nt -> int(8) unsigned
	 */
	const FULL_ID_NT = '`newsletter_templates`.`id_nt`';
	
	const COL_ID_NT = 'id_nt';
	
	/**
	 * name_nt -> varchar(255)
	 */
	const FULL_NAME_NT = '`newsletter_templates`.`name_nt`';
	
	const COL_NAME_NT = 'name_nt';
	
	/**
	 * mailtemp_nt -> tinyint(1)
	 */
	const FULL_MAILTEMP_NT = '`newsletter_templates`.`mailtemp_nt`';
	
	const COL_MAILTEMP_NT = 'mailtemp_nt';
	
	/**
	 * temp_nt -> text
	 */
	const FULL_TEMP_NT = '`newsletter_templates`.`temp_nt`';
	
	const COL_TEMP_NT = 'temp_nt';
	
	/**
	 * encoding_nt -> varchar(20)
	 */
	const FULL_ENCODING_NT = '`newsletter_templates`.`encoding_nt`';
	
	const COL_ENCODING_NT = 'encoding_nt';
	
	/**
	 * added_nt -> datetime
	 */
	const FULL_ADDED_NT = '`newsletter_templates`.`added_nt`';
	
	const COL_ADDED_NT = 'added_nt';
	
	/**
	 * changed_nt -> datetime
	 */
	const FULL_CHANGED_NT = '`newsletter_templates`.`changed_nt`';
	
	const COL_CHANGED_NT = 'changed_nt';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`newsletter_templates`.`id_nt`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `newsletter_templates`.`id_nt`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdNt'=>0, 'NameNt'=>1, 'MailtempNt'=>2, 'TempNt'=>3, 'EncodingNt'=>4, 'AddedNt'=>5, 'ChangedNt'=>6);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`newsletter_templates`.`IdNt`'=>0, '`newsletter_templates`.`NameNt`'=>1, '`newsletter_templates`.`MailtempNt`'=>2, '`newsletter_templates`.`TempNt`'=>3, '`newsletter_templates`.`EncodingNt`'=>4, '`newsletter_templates`.`AddedNt`'=>5, '`newsletter_templates`.`ChangedNt`'=>6);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_nt'=>0, 'name_nt'=>1, 'mailtemp_nt'=>2, 'temp_nt'=>3, 'encoding_nt'=>4, 'added_nt'=>5, 'changed_nt'=>6);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_nt', 'name_nt', 'mailtemp_nt', 'temp_nt', 'encoding_nt', 'added_nt', 'changed_nt');
	
	
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
			throw new WgException("NewsletterTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsletterTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsletterTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsletterTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsletterTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsletterTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_nt -> int(8) unsigned
	 * 
	 * @name getIdNt
	 * @return int
	 */
	public function getIdNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getIdNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getIdNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_nt -> varchar(255)
	 * 
	 * @name getNameNt
	 * @return varchar
	 */
	public function getNameNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getNameNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getNameNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailtemp_nt -> tinyint(1)
	 * 
	 * @name getMailtempNt
	 * @return tinyint
	 */
	public function getMailtempNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getMailtempNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getMailtempNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp_nt -> text
	 * 
	 * @name getTempNt
	 * @return text
	 */
	public function getTempNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getTempNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getTempNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of encoding_nt -> varchar(20)
	 * 
	 * @name getEncodingNt
	 * @return varchar
	 */
	public function getEncodingNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getEncodingNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getEncodingNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_nt -> datetime
	 * 
	 * @name getAddedNt
	 * @return datetime
	 */
	public function getAddedNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getAddedNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getAddedNt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_nt -> datetime
	 * 
	 * @name getChangedNt
	 * @return datetime
	 */
	public function getChangedNt() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set NewsletterTemplatesModel::getChangedNt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterTemplatesModel::getChangedNt', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsletterTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsletterTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table newsletter_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsletterTemplatesModel());
	}
	
	/**
	 * Select one item function from table newsletter_templates
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
		$ret = DbModel::doSelect($conn, new NewsletterTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsletterTemplatesModel')) return $ret[0];
		else {
			$class = new NewsletterTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table newsletter_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsletterTemplatesModel());
	}
	
	/**
	 * Basic pager function from table newsletter_templates
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
		return DbModel::doPager($conn, new NewsletterTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table newsletter_templates
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
		return (int) DbModel::doAffected($conn, new NewsletterTemplatesModel());
	}
	
	/**
	 * Basic update function for table newsletter_templates
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
		$af = (int) DbModel::doAffected($conn, new NewsletterTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table newsletter_templates
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
		return (int) DbModel::doInsert($conn, new NewsletterTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table newsletter_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table newsletter_templates
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
	 * Drop table function for table newsletter_templates
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