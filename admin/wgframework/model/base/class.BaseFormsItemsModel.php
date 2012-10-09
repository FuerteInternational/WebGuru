<?php
/**
 * Database class for table forms_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/forms_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        9. October 2012 16:29:58
 */

class BaseFormsItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'forms_items';
	
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
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`forms_items`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`forms_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * system_language_id -> int(3)
	 */
	const FULL_SYSTEM_LANGUAGE_ID = '`forms_items`.`system_language_id`';
	
	const COL_SYSTEM_LANGUAGE_ID = 'system_language_id';
	
	/**
	 * system_websites_id -> int(4)
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`forms_items`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	/**
	 * mailfield -> varchar(80)
	 */
	const FULL_MAILFIELD = '`forms_items`.`mailfield`';
	
	const COL_MAILFIELD = 'mailfield';
	
	/**
	 * forms_messages_group_id -> int(8) unsigned
	 */
	const FULL_FORMS_MESSAGES_GROUP_ID = '`forms_items`.`forms_messages_group_id`';
	
	const COL_FORMS_MESSAGES_GROUP_ID = 'forms_messages_group_id';
	
	/**
	 * adminmail -> varchar(255)
	 */
	const FULL_ADMINMAIL = '`forms_items`.`adminmail`';
	
	const COL_ADMINMAIL = 'adminmail';
	
	/**
	 * template -> text
	 */
	const FULL_TEMPLATE = '`forms_items`.`template`';
	
	const COL_TEMPLATE = 'template';
	
	/**
	 * usehtml -> tinyint(1) unsigned
	 */
	const FULL_USEHTML = '`forms_items`.`usehtml`';
	
	const COL_USEHTML = 'usehtml';
	
	/**
	 * mailhtml -> text
	 */
	const FULL_MAILHTML = '`forms_items`.`mailhtml`';
	
	const COL_MAILHTML = 'mailhtml';
	
	/**
	 * usetxt -> tinyint(1) unsigned
	 */
	const FULL_USETXT = '`forms_items`.`usetxt`';
	
	const COL_USETXT = 'usetxt';
	
	/**
	 * mailtxt -> text
	 */
	const FULL_MAILTXT = '`forms_items`.`mailtxt`';
	
	const COL_MAILTXT = 'mailtxt';
	
	/**
	 * okmessage -> varchar(255)
	 */
	const FULL_OKMESSAGE = '`forms_items`.`okmessage`';
	
	const COL_OKMESSAGE = 'okmessage';
	
	/**
	 * errormessage -> varchar(255)
	 */
	const FULL_ERRORMESSAGE = '`forms_items`.`errormessage`';
	
	const COL_ERRORMESSAGE = 'errormessage';
	
	/**
	 * warningmessage -> varchar(255)
	 */
	const FULL_WARNINGMESSAGE = '`forms_items`.`warningmessage`';
	
	const COL_WARNINGMESSAGE = 'warningmessage';
	
	/**
	 * redirect -> varchar(255)
	 */
	const FULL_REDIRECT = '`forms_items`.`redirect`';
	
	const COL_REDIRECT = 'redirect';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`forms_items`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`forms_items`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`forms_items`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`forms_items`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`forms_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `forms_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'SystemLanguageId'=>1, 'SystemWebsitesId'=>2, 'Mailfield'=>3, 'FormsMessagesGroupId'=>4, 'Adminmail'=>5, 'Template'=>6, 'Usehtml'=>7, 'Mailhtml'=>8, 'Usetxt'=>9, 'Mailtxt'=>10, 'Okmessage'=>11, 'Errormessage'=>12, 'Warningmessage'=>13, 'Redirect'=>14, 'Name'=>15, 'Identifier'=>16, 'Added'=>17, 'Changed'=>18);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`forms_items`.`Id`'=>0, '`forms_items`.`SystemLanguageId`'=>1, '`forms_items`.`SystemWebsitesId`'=>2, '`forms_items`.`Mailfield`'=>3, '`forms_items`.`FormsMessagesGroupId`'=>4, '`forms_items`.`Adminmail`'=>5, '`forms_items`.`Template`'=>6, '`forms_items`.`Usehtml`'=>7, '`forms_items`.`Mailhtml`'=>8, '`forms_items`.`Usetxt`'=>9, '`forms_items`.`Mailtxt`'=>10, '`forms_items`.`Okmessage`'=>11, '`forms_items`.`Errormessage`'=>12, '`forms_items`.`Warningmessage`'=>13, '`forms_items`.`Redirect`'=>14, '`forms_items`.`Name`'=>15, '`forms_items`.`Identifier`'=>16, '`forms_items`.`Added`'=>17, '`forms_items`.`Changed`'=>18);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'system_language_id'=>1, 'system_websites_id'=>2, 'mailfield'=>3, 'forms_messages_group_id'=>4, 'adminmail'=>5, 'template'=>6, 'usehtml'=>7, 'mailhtml'=>8, 'usetxt'=>9, 'mailtxt'=>10, 'okmessage'=>11, 'errormessage'=>12, 'warningmessage'=>13, 'redirect'=>14, 'name'=>15, 'identifier'=>16, 'added'=>17, 'changed'=>18);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'system_language_id', 'system_websites_id', 'mailfield', 'forms_messages_group_id', 'adminmail', 'template', 'usehtml', 'mailhtml', 'usetxt', 'mailtxt', 'okmessage', 'errormessage', 'warningmessage', 'redirect', 'name', 'identifier', 'added', 'changed');
	
	
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
			throw new WgException("FormsItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelFormsItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('FormsItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('FormsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in FormsItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in FormsItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set FormsItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_language_id -> int(3)
	 * 
	 * @name getSystemLanguageId
	 * @return int
	 */
	public function getSystemLanguageId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (int) $this->_result[1];
			else parent::throwGetColException('Not set FormsItemsModel::getSystemLanguageId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getSystemLanguageId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4)
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (int) $this->_result[2];
			else parent::throwGetColException('Not set FormsItemsModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getSystemWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailfield -> varchar(80)
	 * 
	 * @name getMailfield
	 * @return varchar
	 */
	public function getMailfield() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set FormsItemsModel::getMailfield', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getMailfield', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of forms_messages_group_id -> int(8) unsigned
	 * 
	 * @name getFormsMessagesGroupId
	 * @return int
	 */
	public function getFormsMessagesGroupId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) $this->_result[4];
			else parent::throwGetColException('Not set FormsItemsModel::getFormsMessagesGroupId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getFormsMessagesGroupId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of adminmail -> varchar(255)
	 * 
	 * @name getAdminmail
	 * @return varchar
	 */
	public function getAdminmail() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set FormsItemsModel::getAdminmail', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getAdminmail', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of template -> text
	 * 
	 * @name getTemplate
	 * @return text
	 */
	public function getTemplate() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set FormsItemsModel::getTemplate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getTemplate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of usehtml -> tinyint(1) unsigned
	 * 
	 * @name getUsehtml
	 * @return tinyint
	 */
	public function getUsehtml() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) $this->_result[7];
			else parent::throwGetColException('Not set FormsItemsModel::getUsehtml', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getUsehtml', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailhtml -> text
	 * 
	 * @name getMailhtml
	 * @return text
	 */
	public function getMailhtml() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set FormsItemsModel::getMailhtml', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getMailhtml', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of usetxt -> tinyint(1) unsigned
	 * 
	 * @name getUsetxt
	 * @return tinyint
	 */
	public function getUsetxt() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (int) $this->_result[9];
			else parent::throwGetColException('Not set FormsItemsModel::getUsetxt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getUsetxt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailtxt -> text
	 * 
	 * @name getMailtxt
	 * @return text
	 */
	public function getMailtxt() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set FormsItemsModel::getMailtxt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getMailtxt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of okmessage -> varchar(255)
	 * 
	 * @name getOkmessage
	 * @return varchar
	 */
	public function getOkmessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set FormsItemsModel::getOkmessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getOkmessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errormessage -> varchar(255)
	 * 
	 * @name getErrormessage
	 * @return varchar
	 */
	public function getErrormessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set FormsItemsModel::getErrormessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getErrormessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of warningmessage -> varchar(255)
	 * 
	 * @name getWarningmessage
	 * @return varchar
	 */
	public function getWarningmessage() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set FormsItemsModel::getWarningmessage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getWarningmessage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect -> varchar(255)
	 * 
	 * @name getRedirect
	 * @return varchar
	 */
	public function getRedirect() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set FormsItemsModel::getRedirect', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getRedirect', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set FormsItemsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set FormsItemsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (int) strtotime($this->_result[17]);
			else parent::throwGetColException('Not set FormsItemsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (int) strtotime($this->_result[18]);
			else parent::throwGetColException('Not set FormsItemsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsItemsModel::getChanged', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: FormsItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: FormsItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table forms_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new FormsItemsModel());
	}
	
	/** Left join select function from table forms_items
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsItemsModel());
	}
	
	/** Right join select function from table forms_items
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsItemsModel());
	}
	
	/** Inner join select function from table forms_items
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new FormsItemsModel());
	}
	
	/**
	 * Select one item function from table forms_items
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
		$ret = DbModel::doSelect($conn, new FormsItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'FormsItemsModel')) return $ret[0];
		else {
			$class = new FormsItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table forms_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new FormsItemsModel());
	}
	
	/**
	 * Basic pager function from table forms_items
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
		return DbModel::doPager($conn, new FormsItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table forms_items
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
		return (int) DbModel::doAffected($conn, new FormsItemsModel());
	}
	
	/**
	 * Basic update function for table forms_items
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
		$af = (int) DbModel::doAffected($conn, new FormsItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table forms_items
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
		return (int) DbModel::doInsert($conn, new FormsItemsModel());
	}
	
	/**
	 * Basic reader create function from table forms_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table forms_items
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
	 * Drop table function for table forms_items
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