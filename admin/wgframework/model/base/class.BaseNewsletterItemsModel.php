<?php
/**
 * Database class for table newsletter_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/newsletter_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseNewsletterItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'newsletter_items';
	
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
	 * id_ni -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_ni';
	
	const FULL_PRIMARY_KEY = '`newsletter_items`.`id_ni`';
	
	/**
	 * id_ni -> int(8) unsigned
	 */
	const FULL_ID_NI = '`newsletter_items`.`id_ni`';
	
	const COL_ID_NI = 'id_ni';
	
	/**
	 * name_ni -> varchar(255)
	 */
	const FULL_NAME_NI = '`newsletter_items`.`name_ni`';
	
	const COL_NAME_NI = 'name_ni';
	
	/**
	 * from_ni -> varchar(255)
	 */
	const FULL_FROM_NI = '`newsletter_items`.`from_ni`';
	
	const COL_FROM_NI = 'from_ni';
	
	/**
	 * nt_id_ni -> int(8)
	 */
	const FULL_NT_ID_NI = '`newsletter_items`.`nt_id_ni`';
	
	const COL_NT_ID_NI = 'nt_id_ni';
	
	/**
	 * added_ni -> datetime
	 */
	const FULL_ADDED_NI = '`newsletter_items`.`added_ni`';
	
	const COL_ADDED_NI = 'added_ni';
	
	/**
	 * changed_ni -> datetime
	 */
	const FULL_CHANGED_NI = '`newsletter_items`.`changed_ni`';
	
	const COL_CHANGED_NI = 'changed_ni';
	
	/**
	 * sended_ni -> datetime
	 */
	const FULL_SENDED_NI = '`newsletter_items`.`sended_ni`';
	
	const COL_SENDED_NI = 'sended_ni';
	
	/**
	 * total_ni -> int(8)
	 */
	const FULL_TOTAL_NI = '`newsletter_items`.`total_ni`';
	
	const COL_TOTAL_NI = 'total_ni';
	
	/**
	 * body_ni -> text
	 */
	const FULL_BODY_NI = '`newsletter_items`.`body_ni`';
	
	const COL_BODY_NI = 'body_ni';
	
	/**
	 * ng_id_ni -> int(8)
	 */
	const FULL_NG_ID_NI = '`newsletter_items`.`ng_id_ni`';
	
	const COL_NG_ID_NI = 'ng_id_ni';
	
	/**
	 * tc_id_ni -> int(8)
	 */
	const FULL_TC_ID_NI = '`newsletter_items`.`tc_id_ni`';
	
	const COL_TC_ID_NI = 'tc_id_ni';
	
	/**
	 * unsubscribes_ni -> int(8)
	 */
	const FULL_UNSUBSCRIBES_NI = '`newsletter_items`.`unsubscribes_ni`';
	
	const COL_UNSUBSCRIBES_NI = 'unsubscribes_ni';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`newsletter_items`.`id_ni`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `newsletter_items`.`id_ni`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdNi'=>0, 'NameNi'=>1, 'FromNi'=>2, 'NtIdNi'=>3, 'AddedNi'=>4, 'ChangedNi'=>5, 'SendedNi'=>6, 'TotalNi'=>7, 'BodyNi'=>8, 'NgIdNi'=>9, 'TcIdNi'=>10, 'UnsubscribesNi'=>11);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`newsletter_items`.`IdNi`'=>0, '`newsletter_items`.`NameNi`'=>1, '`newsletter_items`.`FromNi`'=>2, '`newsletter_items`.`NtIdNi`'=>3, '`newsletter_items`.`AddedNi`'=>4, '`newsletter_items`.`ChangedNi`'=>5, '`newsletter_items`.`SendedNi`'=>6, '`newsletter_items`.`TotalNi`'=>7, '`newsletter_items`.`BodyNi`'=>8, '`newsletter_items`.`NgIdNi`'=>9, '`newsletter_items`.`TcIdNi`'=>10, '`newsletter_items`.`UnsubscribesNi`'=>11);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_ni'=>0, 'name_ni'=>1, 'from_ni'=>2, 'nt_id_ni'=>3, 'added_ni'=>4, 'changed_ni'=>5, 'sended_ni'=>6, 'total_ni'=>7, 'body_ni'=>8, 'ng_id_ni'=>9, 'tc_id_ni'=>10, 'unsubscribes_ni'=>11);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_ni', 'name_ni', 'from_ni', 'nt_id_ni', 'added_ni', 'changed_ni', 'sended_ni', 'total_ni', 'body_ni', 'ng_id_ni', 'tc_id_ni', 'unsubscribes_ni');
	
	
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
			throw new WgException("NewsletterItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsletterItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsletterItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsletterItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsletterItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsletterItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsletterItemsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_ni -> int(8) unsigned
	 * 
	 * @name getIdNi
	 * @return int
	 */
	public function getIdNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsletterItemsModel::getIdNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getIdNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_ni -> varchar(255)
	 * 
	 * @name getNameNi
	 * @return varchar
	 */
	public function getNameNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set NewsletterItemsModel::getNameNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getNameNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of from_ni -> varchar(255)
	 * 
	 * @name getFromNi
	 * @return varchar
	 */
	public function getFromNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set NewsletterItemsModel::getFromNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getFromNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nt_id_ni -> int(8)
	 * 
	 * @name getNtIdNi
	 * @return int
	 */
	public function getNtIdNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set NewsletterItemsModel::getNtIdNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getNtIdNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_ni -> datetime
	 * 
	 * @name getAddedNi
	 * @return datetime
	 */
	public function getAddedNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set NewsletterItemsModel::getAddedNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getAddedNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_ni -> datetime
	 * 
	 * @name getChangedNi
	 * @return datetime
	 */
	public function getChangedNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (int) strtotime($this->_result[5]);
			else parent::throwGetColException('Not set NewsletterItemsModel::getChangedNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getChangedNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sended_ni -> datetime
	 * 
	 * @name getSendedNi
	 * @return datetime
	 */
	public function getSendedNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set NewsletterItemsModel::getSendedNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getSendedNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of total_ni -> int(8)
	 * 
	 * @name getTotalNi
	 * @return int
	 */
	public function getTotalNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set NewsletterItemsModel::getTotalNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getTotalNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of body_ni -> text
	 * 
	 * @name getBodyNi
	 * @return text
	 */
	public function getBodyNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set NewsletterItemsModel::getBodyNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getBodyNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ng_id_ni -> int(8)
	 * 
	 * @name getNgIdNi
	 * @return int
	 */
	public function getNgIdNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set NewsletterItemsModel::getNgIdNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getNgIdNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of tc_id_ni -> int(8)
	 * 
	 * @name getTcIdNi
	 * @return int
	 */
	public function getTcIdNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set NewsletterItemsModel::getTcIdNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getTcIdNi', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of unsubscribes_ni -> int(8)
	 * 
	 * @name getUnsubscribesNi
	 * @return int
	 */
	public function getUnsubscribesNi() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set NewsletterItemsModel::getUnsubscribesNi', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsletterItemsModel::getUnsubscribesNi', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsletterItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsletterItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table newsletter_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsletterItemsModel());
	}
	
	/**
	 * Select one item function from table newsletter_items
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
		$ret = DbModel::doSelect($conn, new NewsletterItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsletterItemsModel')) return $ret[0];
		else {
			$class = new NewsletterItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table newsletter_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsletterItemsModel());
	}
	
	/**
	 * Basic pager function from table newsletter_items
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
		return DbModel::doPager($conn, new NewsletterItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table newsletter_items
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
		return (int) DbModel::doAffected($conn, new NewsletterItemsModel());
	}
	
	/**
	 * Basic update function for table newsletter_items
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
		$af = (int) DbModel::doAffected($conn, new NewsletterItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table newsletter_items
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
		return (int) DbModel::doInsert($conn, new NewsletterItemsModel());
	}
	
	/**
	 * Basic reader create function from table newsletter_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table newsletter_items
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
	 * Drop table function for table newsletter_items
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