<?php
/**
 * Database class for table forms_qforms
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/forms_qforms
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseFormsQformsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'forms_qforms';
	
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
	 * id_fq -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_fq';
	
	const FULL_PRIMARY_KEY = '`forms_qforms`.`id_fq`';
	
	/**
	 * id_fq -> int(8) unsigned
	 */
	const FULL_ID_FQ = '`forms_qforms`.`id_fq`';
	
	const COL_ID_FQ = 'id_fq';
	
	/**
	 * name_fq -> varchar(255)
	 */
	const FULL_NAME_FQ = '`forms_qforms`.`name_fq`';
	
	const COL_NAME_FQ = 'name_fq';
	
	/**
	 * identifier_fq -> varchar(255)
	 */
	const FULL_IDENTIFIER_FQ = '`forms_qforms`.`identifier_fq`';
	
	const COL_IDENTIFIER_FQ = 'identifier_fq';
	
	/**
	 * subscribe_fq -> tinyint(1)
	 */
	const FULL_SUBSCRIBE_FQ = '`forms_qforms`.`subscribe_fq`';
	
	const COL_SUBSCRIBE_FQ = 'subscribe_fq';
	
	/**
	 * ng_id_fq -> int(8)
	 */
	const FULL_NG_ID_FQ = '`forms_qforms`.`ng_id_fq`';
	
	const COL_NG_ID_FQ = 'ng_id_fq';
	
	/**
	 * nt_id_fq -> int(8)
	 */
	const FULL_NT_ID_FQ = '`forms_qforms`.`nt_id_fq`';
	
	const COL_NT_ID_FQ = 'nt_id_fq';
	
	/**
	 * mailfield_fq -> varchar(255)
	 */
	const FULL_MAILFIELD_FQ = '`forms_qforms`.`mailfield_fq`';
	
	const COL_MAILFIELD_FQ = 'mailfield_fq';
	
	/**
	 * mail_fq -> tinyint(1)
	 */
	const FULL_MAIL_FQ = '`forms_qforms`.`mail_fq`';
	
	const COL_MAIL_FQ = 'mail_fq';
	
	/**
	 * db_fq -> tinyint(1)
	 */
	const FULL_DB_FQ = '`forms_qforms`.`db_fq`';
	
	const COL_DB_FQ = 'db_fq';
	
	/**
	 * mailto_fq -> varchar(255)
	 */
	const FULL_MAILTO_FQ = '`forms_qforms`.`mailto_fq`';
	
	const COL_MAILTO_FQ = 'mailto_fq';
	
	/**
	 * mailfrom_fq -> varchar(255)
	 */
	const FULL_MAILFROM_FQ = '`forms_qforms`.`mailfrom_fq`';
	
	const COL_MAILFROM_FQ = 'mailfrom_fq';
	
	/**
	 * mailfromfield_fq -> int(16)
	 */
	const FULL_MAILFROMFIELD_FQ = '`forms_qforms`.`mailfromfield_fq`';
	
	const COL_MAILFROMFIELD_FQ = 'mailfromfield_fq';
	
	/**
	 * temp_fq -> text
	 */
	const FULL_TEMP_FQ = '`forms_qforms`.`temp_fq`';
	
	const COL_TEMP_FQ = 'temp_fq';
	
	/**
	 * okmess_fq -> varchar(255)
	 */
	const FULL_OKMESS_FQ = '`forms_qforms`.`okmess_fq`';
	
	const COL_OKMESS_FQ = 'okmess_fq';
	
	/**
	 * errmess_fq -> varchar(255)
	 */
	const FULL_ERRMESS_FQ = '`forms_qforms`.`errmess_fq`';
	
	const COL_ERRMESS_FQ = 'errmess_fq';
	
	/**
	 * redirect_fq -> varchar(255)
	 */
	const FULL_REDIRECT_FQ = '`forms_qforms`.`redirect_fq`';
	
	const COL_REDIRECT_FQ = 'redirect_fq';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`forms_qforms`.`id_fq`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `forms_qforms`.`id_fq`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdFq'=>0, 'NameFq'=>1, 'IdentifierFq'=>2, 'SubscribeFq'=>3, 'NgIdFq'=>4, 'NtIdFq'=>5, 'MailfieldFq'=>6, 'MailFq'=>7, 'DbFq'=>8, 'MailtoFq'=>9, 'MailfromFq'=>10, 'MailfromfieldFq'=>11, 'TempFq'=>12, 'OkmessFq'=>13, 'ErrmessFq'=>14, 'RedirectFq'=>15);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`forms_qforms`.`IdFq`'=>0, '`forms_qforms`.`NameFq`'=>1, '`forms_qforms`.`IdentifierFq`'=>2, '`forms_qforms`.`SubscribeFq`'=>3, '`forms_qforms`.`NgIdFq`'=>4, '`forms_qforms`.`NtIdFq`'=>5, '`forms_qforms`.`MailfieldFq`'=>6, '`forms_qforms`.`MailFq`'=>7, '`forms_qforms`.`DbFq`'=>8, '`forms_qforms`.`MailtoFq`'=>9, '`forms_qforms`.`MailfromFq`'=>10, '`forms_qforms`.`MailfromfieldFq`'=>11, '`forms_qforms`.`TempFq`'=>12, '`forms_qforms`.`OkmessFq`'=>13, '`forms_qforms`.`ErrmessFq`'=>14, '`forms_qforms`.`RedirectFq`'=>15);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_fq'=>0, 'name_fq'=>1, 'identifier_fq'=>2, 'subscribe_fq'=>3, 'ng_id_fq'=>4, 'nt_id_fq'=>5, 'mailfield_fq'=>6, 'mail_fq'=>7, 'db_fq'=>8, 'mailto_fq'=>9, 'mailfrom_fq'=>10, 'mailfromfield_fq'=>11, 'temp_fq'=>12, 'okmess_fq'=>13, 'errmess_fq'=>14, 'redirect_fq'=>15);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_fq', 'name_fq', 'identifier_fq', 'subscribe_fq', 'ng_id_fq', 'nt_id_fq', 'mailfield_fq', 'mail_fq', 'db_fq', 'mailto_fq', 'mailfrom_fq', 'mailfromfield_fq', 'temp_fq', 'okmess_fq', 'errmess_fq', 'redirect_fq');
	
	
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
			throw new WgException("FormsQforms could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelFormsQforms::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('FormsQformsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsQformsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('FormsQformsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsQformsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in FormsQformsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in FormsQformsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_fq -> int(8) unsigned
	 * 
	 * @name getIdFq
	 * @return int
	 */
	public function getIdFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set FormsQformsModel::getIdFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getIdFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_fq -> varchar(255)
	 * 
	 * @name getNameFq
	 * @return varchar
	 */
	public function getNameFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set FormsQformsModel::getNameFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getNameFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_fq -> varchar(255)
	 * 
	 * @name getIdentifierFq
	 * @return varchar
	 */
	public function getIdentifierFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set FormsQformsModel::getIdentifierFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getIdentifierFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of subscribe_fq -> tinyint(1)
	 * 
	 * @name getSubscribeFq
	 * @return tinyint
	 */
	public function getSubscribeFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set FormsQformsModel::getSubscribeFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getSubscribeFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ng_id_fq -> int(8)
	 * 
	 * @name getNgIdFq
	 * @return int
	 */
	public function getNgIdFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set FormsQformsModel::getNgIdFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getNgIdFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nt_id_fq -> int(8)
	 * 
	 * @name getNtIdFq
	 * @return int
	 */
	public function getNtIdFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set FormsQformsModel::getNtIdFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getNtIdFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailfield_fq -> varchar(255)
	 * 
	 * @name getMailfieldFq
	 * @return varchar
	 */
	public function getMailfieldFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set FormsQformsModel::getMailfieldFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getMailfieldFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail_fq -> tinyint(1)
	 * 
	 * @name getMailFq
	 * @return tinyint
	 */
	public function getMailFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set FormsQformsModel::getMailFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getMailFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of db_fq -> tinyint(1)
	 * 
	 * @name getDbFq
	 * @return tinyint
	 */
	public function getDbFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set FormsQformsModel::getDbFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getDbFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailto_fq -> varchar(255)
	 * 
	 * @name getMailtoFq
	 * @return varchar
	 */
	public function getMailtoFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set FormsQformsModel::getMailtoFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getMailtoFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailfrom_fq -> varchar(255)
	 * 
	 * @name getMailfromFq
	 * @return varchar
	 */
	public function getMailfromFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set FormsQformsModel::getMailfromFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getMailfromFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mailfromfield_fq -> int(16)
	 * 
	 * @name getMailfromfieldFq
	 * @return int
	 */
	public function getMailfromfieldFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set FormsQformsModel::getMailfromfieldFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getMailfromfieldFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp_fq -> text
	 * 
	 * @name getTempFq
	 * @return text
	 */
	public function getTempFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set FormsQformsModel::getTempFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getTempFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of okmess_fq -> varchar(255)
	 * 
	 * @name getOkmessFq
	 * @return varchar
	 */
	public function getOkmessFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set FormsQformsModel::getOkmessFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getOkmessFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess_fq -> varchar(255)
	 * 
	 * @name getErrmessFq
	 * @return varchar
	 */
	public function getErrmessFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set FormsQformsModel::getErrmessFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getErrmessFq', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect_fq -> varchar(255)
	 * 
	 * @name getRedirectFq
	 * @return varchar
	 */
	public function getRedirectFq() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set FormsQformsModel::getRedirectFq', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQformsModel::getRedirectFq', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: FormsQformsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: FormsQformsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table forms_qforms
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new FormsQformsModel());
	}
	
	/**
	 * Select one item function from table forms_qforms
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
		$ret = DbModel::doSelect($conn, new FormsQformsModel());
		if (isset($ret[0]) && is_a($ret[0], 'FormsQformsModel')) return $ret[0];
		else {
			$class = new FormsQformsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table forms_qforms
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new FormsQformsModel());
	}
	
	/**
	 * Basic pager function from table forms_qforms
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
		return DbModel::doPager($conn, new FormsQformsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table forms_qforms
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
		return (int) DbModel::doAffected($conn, new FormsQformsModel());
	}
	
	/**
	 * Basic update function for table forms_qforms
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
		$af = (int) DbModel::doAffected($conn, new FormsQformsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table forms_qforms
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
		return (int) DbModel::doInsert($conn, new FormsQformsModel());
	}
	
	/**
	 * Basic reader create function from table forms_qforms
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table forms_qforms
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
	 * Drop table function for table forms_qforms
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