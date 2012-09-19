<?php
/**
 * Database class for table emails_frontend_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/emails_frontend_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseEmailsFrontendTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'emails_frontend_templates';
	
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
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`emails_frontend_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`emails_frontend_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`emails_frontend_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`emails_frontend_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * temptype -> tinyint(1) unsigned
	 */
	const FULL_TEMPTYPE = '`emails_frontend_templates`.`temptype`';
	
	const COL_TEMPTYPE = 'temptype';
	
	/**
	 * mess1 -> varchar(255)
	 */
	const FULL_MESS1 = '`emails_frontend_templates`.`mess1`';
	
	const COL_MESS1 = 'mess1';
	
	/**
	 * mess2 -> varchar(255)
	 */
	const FULL_MESS2 = '`emails_frontend_templates`.`mess2`';
	
	const COL_MESS2 = 'mess2';
	
	/**
	 * mess3 -> varchar(255)
	 */
	const FULL_MESS3 = '`emails_frontend_templates`.`mess3`';
	
	const COL_MESS3 = 'mess3';
	
	/**
	 * mess4 -> varchar(255)
	 */
	const FULL_MESS4 = '`emails_frontend_templates`.`mess4`';
	
	const COL_MESS4 = 'mess4';
	
	/**
	 * mess5 -> varchar(255)
	 */
	const FULL_MESS5 = '`emails_frontend_templates`.`mess5`';
	
	const COL_MESS5 = 'mess5';
	
	/**
	 * mess6 -> varchar(255)
	 */
	const FULL_MESS6 = '`emails_frontend_templates`.`mess6`';
	
	const COL_MESS6 = 'mess6';
	
	/**
	 * mess7 -> varchar(255)
	 */
	const FULL_MESS7 = '`emails_frontend_templates`.`mess7`';
	
	const COL_MESS7 = 'mess7';
	
	/**
	 * template -> text
	 */
	const FULL_TEMPLATE = '`emails_frontend_templates`.`template`';
	
	const COL_TEMPLATE = 'template';
	
	/**
	 * template2 -> text
	 */
	const FULL_TEMPLATE2 = '`emails_frontend_templates`.`template2`';
	
	const COL_TEMPLATE2 = 'template2';
	
	/**
	 * template3 -> text
	 */
	const FULL_TEMPLATE3 = '`emails_frontend_templates`.`template3`';
	
	const COL_TEMPLATE3 = 'template3';
	
	/**
	 * dateformat -> varchar(255)
	 */
	const FULL_DATEFORMAT = '`emails_frontend_templates`.`dateformat`';
	
	const COL_DATEFORMAT = 'dateformat';
	
	/**
	 * redirection1 -> varchar(255)
	 */
	const FULL_REDIRECTION1 = '`emails_frontend_templates`.`redirection1`';
	
	const COL_REDIRECTION1 = 'redirection1';
	
	/**
	 * redirection2 -> varchar(255)
	 */
	const FULL_REDIRECTION2 = '`emails_frontend_templates`.`redirection2`';
	
	const COL_REDIRECTION2 = 'redirection2';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`emails_frontend_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `emails_frontend_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Temptype'=>3, 'Mess1'=>4, 'Mess2'=>5, 'Mess3'=>6, 'Mess4'=>7, 'Mess5'=>8, 'Mess6'=>9, 'Mess7'=>10, 'Template'=>11, 'Template2'=>12, 'Template3'=>13, 'Dateformat'=>14, 'Redirection1'=>15, 'Redirection2'=>16);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`emails_frontend_templates`.`Id`'=>0, '`emails_frontend_templates`.`Name`'=>1, '`emails_frontend_templates`.`Identifier`'=>2, '`emails_frontend_templates`.`Temptype`'=>3, '`emails_frontend_templates`.`Mess1`'=>4, '`emails_frontend_templates`.`Mess2`'=>5, '`emails_frontend_templates`.`Mess3`'=>6, '`emails_frontend_templates`.`Mess4`'=>7, '`emails_frontend_templates`.`Mess5`'=>8, '`emails_frontend_templates`.`Mess6`'=>9, '`emails_frontend_templates`.`Mess7`'=>10, '`emails_frontend_templates`.`Template`'=>11, '`emails_frontend_templates`.`Template2`'=>12, '`emails_frontend_templates`.`Template3`'=>13, '`emails_frontend_templates`.`Dateformat`'=>14, '`emails_frontend_templates`.`Redirection1`'=>15, '`emails_frontend_templates`.`Redirection2`'=>16);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'temptype'=>3, 'mess1'=>4, 'mess2'=>5, 'mess3'=>6, 'mess4'=>7, 'mess5'=>8, 'mess6'=>9, 'mess7'=>10, 'template'=>11, 'template2'=>12, 'template3'=>13, 'dateformat'=>14, 'redirection1'=>15, 'redirection2'=>16);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'temptype', 'mess1', 'mess2', 'mess3', 'mess4', 'mess5', 'mess6', 'mess7', 'template', 'template2', 'template3', 'dateformat', 'redirection1', 'redirection2');
	
	
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
			throw new WgException("EmailsFrontendTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelEmailsFrontendTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('EmailsFrontendTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EmailsFrontendTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('EmailsFrontendTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('EmailsFrontendTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in EmailsFrontendTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in EmailsFrontendTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temptype -> tinyint(1) unsigned
	 * 
	 * @name getTemptype
	 * @return tinyint
	 */
	public function getTemptype() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getTemptype', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getTemptype', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess1 -> varchar(255)
	 * 
	 * @name getMess1
	 * @return varchar
	 */
	public function getMess1() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess2 -> varchar(255)
	 * 
	 * @name getMess2
	 * @return varchar
	 */
	public function getMess2() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess3 -> varchar(255)
	 * 
	 * @name getMess3
	 * @return varchar
	 */
	public function getMess3() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess4 -> varchar(255)
	 * 
	 * @name getMess4
	 * @return varchar
	 */
	public function getMess4() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess5 -> varchar(255)
	 * 
	 * @name getMess5
	 * @return varchar
	 */
	public function getMess5() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess5', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess5', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess6 -> varchar(255)
	 * 
	 * @name getMess6
	 * @return varchar
	 */
	public function getMess6() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess6', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess6', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mess7 -> varchar(255)
	 * 
	 * @name getMess7
	 * @return varchar
	 */
	public function getMess7() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getMess7', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getMess7', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of template -> text
	 * 
	 * @name getTemplate
	 * @return text
	 */
	public function getTemplate() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getTemplate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getTemplate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of template2 -> text
	 * 
	 * @name getTemplate2
	 * @return text
	 */
	public function getTemplate2() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getTemplate2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getTemplate2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of template3 -> text
	 * 
	 * @name getTemplate3
	 * @return text
	 */
	public function getTemplate3() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getTemplate3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getTemplate3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat -> varchar(255)
	 * 
	 * @name getDateformat
	 * @return varchar
	 */
	public function getDateformat() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getDateformat', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getDateformat', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirection1 -> varchar(255)
	 * 
	 * @name getRedirection1
	 * @return varchar
	 */
	public function getRedirection1() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getRedirection1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getRedirection1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirection2 -> varchar(255)
	 * 
	 * @name getRedirection2
	 * @return varchar
	 */
	public function getRedirection2() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set EmailsFrontendTemplatesModel::getRedirection2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From EmailsFrontendTemplatesModel::getRedirection2', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: EmailsFrontendTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: EmailsFrontendTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table emails_frontend_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new EmailsFrontendTemplatesModel());
	}
	
	/**
	 * Select one item function from table emails_frontend_templates
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
		$ret = DbModel::doSelect($conn, new EmailsFrontendTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'EmailsFrontendTemplatesModel')) return $ret[0];
		else {
			$class = new EmailsFrontendTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table emails_frontend_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new EmailsFrontendTemplatesModel());
	}
	
	/**
	 * Basic pager function from table emails_frontend_templates
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
		return DbModel::doPager($conn, new EmailsFrontendTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table emails_frontend_templates
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
		return (int) DbModel::doAffected($conn, new EmailsFrontendTemplatesModel());
	}
	
	/**
	 * Basic update function for table emails_frontend_templates
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
		$af = (int) DbModel::doAffected($conn, new EmailsFrontendTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table emails_frontend_templates
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
		return (int) DbModel::doInsert($conn, new EmailsFrontendTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table emails_frontend_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table emails_frontend_templates
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
	 * Drop table function for table emails_frontend_templates
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