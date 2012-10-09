<?php
/**
 * Database class for table system_errors_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/system_errors_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        8. October 2012 16:18:55
 */

class BaseSystemErrorsTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'system_errors_templates';
	
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
	
	const FULL_PRIMARY_KEY = '`system_errors_templates`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`system_errors_templates`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`system_errors_templates`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`system_errors_templates`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * errorbegin -> text
	 */
	const FULL_ERRORBEGIN = '`system_errors_templates`.`errorbegin`';
	
	const COL_ERRORBEGIN = 'errorbegin';
	
	/**
	 * groupokbegin -> text
	 */
	const FULL_GROUPOKBEGIN = '`system_errors_templates`.`groupokbegin`';
	
	const COL_GROUPOKBEGIN = 'groupokbegin';
	
	/**
	 * itemok -> text
	 */
	const FULL_ITEMOK = '`system_errors_templates`.`itemok`';
	
	const COL_ITEMOK = 'itemok';
	
	/**
	 * groupokend -> text
	 */
	const FULL_GROUPOKEND = '`system_errors_templates`.`groupokend`';
	
	const COL_GROUPOKEND = 'groupokend';
	
	/**
	 * groupalertbegin -> text
	 */
	const FULL_GROUPALERTBEGIN = '`system_errors_templates`.`groupalertbegin`';
	
	const COL_GROUPALERTBEGIN = 'groupalertbegin';
	
	/**
	 * itemalert -> text
	 */
	const FULL_ITEMALERT = '`system_errors_templates`.`itemalert`';
	
	const COL_ITEMALERT = 'itemalert';
	
	/**
	 * groupalertend -> text
	 */
	const FULL_GROUPALERTEND = '`system_errors_templates`.`groupalertend`';
	
	const COL_GROUPALERTEND = 'groupalertend';
	
	/**
	 * grouperrorbegin -> text
	 */
	const FULL_GROUPERRORBEGIN = '`system_errors_templates`.`grouperrorbegin`';
	
	const COL_GROUPERRORBEGIN = 'grouperrorbegin';
	
	/**
	 * itemerror -> text
	 */
	const FULL_ITEMERROR = '`system_errors_templates`.`itemerror`';
	
	const COL_ITEMERROR = 'itemerror';
	
	/**
	 * grouperrorend -> text
	 */
	const FULL_GROUPERROREND = '`system_errors_templates`.`grouperrorend`';
	
	const COL_GROUPERROREND = 'grouperrorend';
	
	/**
	 * errorend -> text
	 */
	const FULL_ERROREND = '`system_errors_templates`.`errorend`';
	
	const COL_ERROREND = 'errorend';
	
	/**
	 * groupmessages -> tinyint(1)
	 */
	const FULL_GROUPMESSAGES = '`system_errors_templates`.`groupmessages`';
	
	const COL_GROUPMESSAGES = 'groupmessages';
	
	/**
	 * firstinlist -> tinyint(1)
	 */
	const FULL_FIRSTINLIST = '`system_errors_templates`.`firstinlist`';
	
	const COL_FIRSTINLIST = 'firstinlist';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`system_errors_templates`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `system_errors_templates`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Errorbegin'=>3, 'Groupokbegin'=>4, 'Itemok'=>5, 'Groupokend'=>6, 'Groupalertbegin'=>7, 'Itemalert'=>8, 'Groupalertend'=>9, 'Grouperrorbegin'=>10, 'Itemerror'=>11, 'Grouperrorend'=>12, 'Errorend'=>13, 'Groupmessages'=>14, 'Firstinlist'=>15);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`system_errors_templates`.`Id`'=>0, '`system_errors_templates`.`Name`'=>1, '`system_errors_templates`.`Identifier`'=>2, '`system_errors_templates`.`Errorbegin`'=>3, '`system_errors_templates`.`Groupokbegin`'=>4, '`system_errors_templates`.`Itemok`'=>5, '`system_errors_templates`.`Groupokend`'=>6, '`system_errors_templates`.`Groupalertbegin`'=>7, '`system_errors_templates`.`Itemalert`'=>8, '`system_errors_templates`.`Groupalertend`'=>9, '`system_errors_templates`.`Grouperrorbegin`'=>10, '`system_errors_templates`.`Itemerror`'=>11, '`system_errors_templates`.`Grouperrorend`'=>12, '`system_errors_templates`.`Errorend`'=>13, '`system_errors_templates`.`Groupmessages`'=>14, '`system_errors_templates`.`Firstinlist`'=>15);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'errorbegin'=>3, 'groupokbegin'=>4, 'itemok'=>5, 'groupokend'=>6, 'groupalertbegin'=>7, 'itemalert'=>8, 'groupalertend'=>9, 'grouperrorbegin'=>10, 'itemerror'=>11, 'grouperrorend'=>12, 'errorend'=>13, 'groupmessages'=>14, 'firstinlist'=>15);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'errorbegin', 'groupokbegin', 'itemok', 'groupokend', 'groupalertbegin', 'itemalert', 'groupalertend', 'grouperrorbegin', 'itemerror', 'grouperrorend', 'errorend', 'groupmessages', 'firstinlist');
	
	
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
			throw new WgException("SystemErrorsTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelSystemErrorsTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('SystemErrorsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemErrorsTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('SystemErrorsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('SystemErrorsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in SystemErrorsTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in SystemErrorsTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errorbegin -> text
	 * 
	 * @name getErrorbegin
	 * @return text
	 */
	public function getErrorbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getErrorbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getErrorbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of groupokbegin -> text
	 * 
	 * @name getGroupokbegin
	 * @return text
	 */
	public function getGroupokbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGroupokbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGroupokbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of itemok -> text
	 * 
	 * @name getItemok
	 * @return text
	 */
	public function getItemok() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getItemok', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getItemok', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of groupokend -> text
	 * 
	 * @name getGroupokend
	 * @return text
	 */
	public function getGroupokend() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGroupokend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGroupokend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of groupalertbegin -> text
	 * 
	 * @name getGroupalertbegin
	 * @return text
	 */
	public function getGroupalertbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGroupalertbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGroupalertbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of itemalert -> text
	 * 
	 * @name getItemalert
	 * @return text
	 */
	public function getItemalert() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getItemalert', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getItemalert', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of groupalertend -> text
	 * 
	 * @name getGroupalertend
	 * @return text
	 */
	public function getGroupalertend() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGroupalertend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGroupalertend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of grouperrorbegin -> text
	 * 
	 * @name getGrouperrorbegin
	 * @return text
	 */
	public function getGrouperrorbegin() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGrouperrorbegin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGrouperrorbegin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of itemerror -> text
	 * 
	 * @name getItemerror
	 * @return text
	 */
	public function getItemerror() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getItemerror', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getItemerror', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of grouperrorend -> text
	 * 
	 * @name getGrouperrorend
	 * @return text
	 */
	public function getGrouperrorend() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGrouperrorend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGrouperrorend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errorend -> text
	 * 
	 * @name getErrorend
	 * @return text
	 */
	public function getErrorend() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getErrorend', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getErrorend', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of groupmessages -> tinyint(1)
	 * 
	 * @name getGroupmessages
	 * @return tinyint
	 */
	public function getGroupmessages() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getGroupmessages', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getGroupmessages', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of firstinlist -> tinyint(1)
	 * 
	 * @name getFirstinlist
	 * @return tinyint
	 */
	public function getFirstinlist() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set SystemErrorsTemplatesModel::getFirstinlist', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From SystemErrorsTemplatesModel::getFirstinlist', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: SystemErrorsTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: SystemErrorsTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table system_errors_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new SystemErrorsTemplatesModel());
	}
	
	/** Left join select function from table system_errors_templates
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemErrorsTemplatesModel());
	}
	
	/** Right join select function from table system_errors_templates
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemErrorsTemplatesModel());
	}
	
	/** Inner join select function from table system_errors_templates
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new SystemErrorsTemplatesModel());
	}
	
	/**
	 * Select one item function from table system_errors_templates
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
		$ret = DbModel::doSelect($conn, new SystemErrorsTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'SystemErrorsTemplatesModel')) return $ret[0];
		else {
			$class = new SystemErrorsTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table system_errors_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new SystemErrorsTemplatesModel());
	}
	
	/**
	 * Basic pager function from table system_errors_templates
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
		return DbModel::doPager($conn, new SystemErrorsTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table system_errors_templates
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
		return (int) DbModel::doAffected($conn, new SystemErrorsTemplatesModel());
	}
	
	/**
	 * Basic update function for table system_errors_templates
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
		$af = (int) DbModel::doAffected($conn, new SystemErrorsTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table system_errors_templates
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
		return (int) DbModel::doInsert($conn, new SystemErrorsTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table system_errors_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table system_errors_templates
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
	 * Drop table function for table system_errors_templates
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