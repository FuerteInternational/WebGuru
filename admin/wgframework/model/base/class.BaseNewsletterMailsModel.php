<?php
/**
 * Database class for table newsletter_mails
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/newsletter_mails
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseNewsletterMailsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'newsletter_mails';
	
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
	 * id_nm -> int(16) unsigned
	 */
	const PRIMARY_KEY = 'id_nm';
	
	const FULL_PRIMARY_KEY = '`newsletter_mails`.`id_nm`';
	
	/**
	 * id_nm -> int(16) unsigned
	 */
	const FULL_ID_NM = '`newsletter_mails`.`id_nm`';
	
	const COL_ID_NM = 'id_nm';
	
	/**
	 * ng_id_nm -> int(8)
	 */
	const FULL_NG_ID_NM = '`newsletter_mails`.`ng_id_nm`';
	
	const COL_NG_ID_NM = 'ng_id_nm';
	
	/**
	 * mail_nm -> varchar(255)
	 */
	const FULL_MAIL_NM = '`newsletter_mails`.`mail_nm`';
	
	const COL_MAIL_NM = 'mail_nm';
	
	/**
	 * name_nm -> varchar(255)
	 */
	const FULL_NAME_NM = '`newsletter_mails`.`name_nm`';
	
	const COL_NAME_NM = 'name_nm';
	
	/**
	 * surname_nm -> varchar(255)
	 */
	const FULL_SURNAME_NM = '`newsletter_mails`.`surname_nm`';
	
	const COL_SURNAME_NM = 'surname_nm';
	
	/**
	 * use_nm -> tinyint(1)
	 */
	const FULL_USE_NM = '`newsletter_mails`.`use_nm`';
	
	const COL_USE_NM = 'use_nm';
	
	/**
	 * added_nm -> datetime
	 */
	const FULL_ADDED_NM = '`newsletter_mails`.`added_nm`';
	
	const COL_ADDED_NM = 'added_nm';
	
	/**
	 * unsubscribed_nm -> datetime
	 */
	const FULL_UNSUBSCRIBED_NM = '`newsletter_mails`.`unsubscribed_nm`';
	
	const COL_UNSUBSCRIBED_NM = 'unsubscribed_nm';
	
	/**
	 * from_nm -> varchar(255)
	 */
	const FULL_FROM_NM = '`newsletter_mails`.`from_nm`';
	
	const COL_FROM_NM = 'from_nm';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`newsletter_mails`.`id_nm`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `newsletter_mails`.`id_nm`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdNm'=>0, 'NgIdNm'=>1, 'MailNm'=>2, 'NameNm'=>3, 'SurnameNm'=>4, 'UseNm'=>5, 'AddedNm'=>6, 'UnsubscribedNm'=>7, 'FromNm'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`newsletter_mails`.`IdNm`'=>0, '`newsletter_mails`.`NgIdNm`'=>1, '`newsletter_mails`.`MailNm`'=>2, '`newsletter_mails`.`NameNm`'=>3, '`newsletter_mails`.`SurnameNm`'=>4, '`newsletter_mails`.`UseNm`'=>5, '`newsletter_mails`.`AddedNm`'=>6, '`newsletter_mails`.`UnsubscribedNm`'=>7, '`newsletter_mails`.`FromNm`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_nm'=>0, 'ng_id_nm'=>1, 'mail_nm'=>2, 'name_nm'=>3, 'surname_nm'=>4, 'use_nm'=>5, 'added_nm'=>6, 'unsubscribed_nm'=>7, 'from_nm'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_nm', 'ng_id_nm', 'mail_nm', 'name_nm', 'surname_nm', 'use_nm', 'added_nm', 'unsubscribed_nm', 'from_nm');
	
	
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
			throw new WgException("NewsletterMails could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsletterMails::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsletterMailsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterMailsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsletterMailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterMailsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsletterMailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsletterMailsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_nm -> int(16) unsigned
	 * 
	 * @name getIdNm
	 * @return int
	 */
	public function getIdNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsletterMailsModel::getIdNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getIdNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ng_id_nm -> int(8)
	 * 
	 * @name getNgIdNm
	 * @return int
	 */
	public function getNgIdNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set NewsletterMailsModel::getNgIdNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getNgIdNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail_nm -> varchar(255)
	 * 
	 * @name getMailNm
	 * @return varchar
	 */
	public function getMailNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set NewsletterMailsModel::getMailNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getMailNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_nm -> varchar(255)
	 * 
	 * @name getNameNm
	 * @return varchar
	 */
	public function getNameNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set NewsletterMailsModel::getNameNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getNameNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of surname_nm -> varchar(255)
	 * 
	 * @name getSurnameNm
	 * @return varchar
	 */
	public function getSurnameNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set NewsletterMailsModel::getSurnameNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getSurnameNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of use_nm -> tinyint(1)
	 * 
	 * @name getUseNm
	 * @return tinyint
	 */
	public function getUseNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set NewsletterMailsModel::getUseNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getUseNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_nm -> datetime
	 * 
	 * @name getAddedNm
	 * @return datetime
	 */
	public function getAddedNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set NewsletterMailsModel::getAddedNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getAddedNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of unsubscribed_nm -> datetime
	 * 
	 * @name getUnsubscribedNm
	 * @return datetime
	 */
	public function getUnsubscribedNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set NewsletterMailsModel::getUnsubscribedNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getUnsubscribedNm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of from_nm -> varchar(255)
	 * 
	 * @name getFromNm
	 * @return varchar
	 */
	public function getFromNm() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set NewsletterMailsModel::getFromNm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterMailsModel::getFromNm', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsletterMailsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsletterMailsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table newsletter_mails
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsletterMailsModel());
	}
	
	/**
	 * Select one item function from table newsletter_mails
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
		$ret = DbModel::doSelect($conn, new NewsletterMailsModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsletterMailsModel')) return $ret[0];
		else {
			$class = new NewsletterMailsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table newsletter_mails
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsletterMailsModel());
	}
	
	/**
	 * Basic pager function from table newsletter_mails
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
		return DbModel::doPager($conn, new NewsletterMailsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table newsletter_mails
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
		return (int) DbModel::doAffected($conn, new NewsletterMailsModel());
	}
	
	/**
	 * Basic update function for table newsletter_mails
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
		$af = (int) DbModel::doAffected($conn, new NewsletterMailsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table newsletter_mails
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
		return (int) DbModel::doInsert($conn, new NewsletterMailsModel());
	}
	
	/**
	 * Basic reader create function from table newsletter_mails
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table newsletter_mails
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
	 * Drop table function for table newsletter_mails
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