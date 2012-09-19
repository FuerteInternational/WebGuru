<?php
/**
 * Database class for table comments_articles
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/comments_articles
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:24
 */

class BaseCommentsArticlesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'comments_articles';
	
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
	 * id_ca -> int(32) unsigned
	 */
	const FULL_ID_CA = '`comments_articles`.`id_ca`';
	
	const COL_ID_CA = 'id_ca';
	
	/**
	 * cc_id_ca -> int(4)
	 */
	const FULL_CC_ID_CA = '`comments_articles`.`cc_id_ca`';
	
	const COL_CC_ID_CA = 'cc_id_ca';
	
	/**
	 * show_ca -> tinyint(1)
	 */
	const FULL_SHOW_CA = '`comments_articles`.`show_ca`';
	
	const COL_SHOW_CA = 'show_ca';
	
	/**
	 * value_ca -> int(32)
	 */
	const FULL_VALUE_CA = '`comments_articles`.`value_ca`';
	
	const COL_VALUE_CA = 'value_ca';
	
	/**
	 * name_ca -> varchar(255)
	 */
	const FULL_NAME_CA = '`comments_articles`.`name_ca`';
	
	const COL_NAME_CA = 'name_ca';
	
	/**
	 * mail_ca -> varchar(255)
	 */
	const FULL_MAIL_CA = '`comments_articles`.`mail_ca`';
	
	const COL_MAIL_CA = 'mail_ca';
	
	/**
	 * added_ca -> datetime
	 */
	const FULL_ADDED_CA = '`comments_articles`.`added_ca`';
	
	const COL_ADDED_CA = 'added_ca';
	
	/**
	 * text_ca -> text
	 */
	const FULL_TEXT_CA = '`comments_articles`.`text_ca`';
	
	const COL_TEXT_CA = 'text_ca';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(*)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT *)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdCa'=>0, 'CcIdCa'=>1, 'ShowCa'=>2, 'ValueCa'=>3, 'NameCa'=>4, 'MailCa'=>5, 'AddedCa'=>6, 'TextCa'=>7);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`comments_articles`.`IdCa`'=>0, '`comments_articles`.`CcIdCa`'=>1, '`comments_articles`.`ShowCa`'=>2, '`comments_articles`.`ValueCa`'=>3, '`comments_articles`.`NameCa`'=>4, '`comments_articles`.`MailCa`'=>5, '`comments_articles`.`AddedCa`'=>6, '`comments_articles`.`TextCa`'=>7);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_ca'=>0, 'cc_id_ca'=>1, 'show_ca'=>2, 'value_ca'=>3, 'name_ca'=>4, 'mail_ca'=>5, 'added_ca'=>6, 'text_ca'=>7);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_ca', 'cc_id_ca', 'show_ca', 'value_ca', 'name_ca', 'mail_ca', 'added_ca', 'text_ca');
	
	
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
			throw new WgException("CommentsArticles could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCommentsArticles::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
	 * Get value of id_ca -> int(32) unsigned
	 * 
	 * @name getIdCa
	 * @return int
	 */
	public function getIdCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set CommentsArticlesModel::getIdCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getIdCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of cc_id_ca -> int(4)
	 * 
	 * @name getCcIdCa
	 * @return int
	 */
	public function getCcIdCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set CommentsArticlesModel::getCcIdCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getCcIdCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of show_ca -> tinyint(1)
	 * 
	 * @name getShowCa
	 * @return tinyint
	 */
	public function getShowCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set CommentsArticlesModel::getShowCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getShowCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of value_ca -> int(32)
	 * 
	 * @name getValueCa
	 * @return int
	 */
	public function getValueCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CommentsArticlesModel::getValueCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getValueCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_ca -> varchar(255)
	 * 
	 * @name getNameCa
	 * @return varchar
	 */
	public function getNameCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CommentsArticlesModel::getNameCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getNameCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mail_ca -> varchar(255)
	 * 
	 * @name getMailCa
	 * @return varchar
	 */
	public function getMailCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CommentsArticlesModel::getMailCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getMailCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_ca -> datetime
	 * 
	 * @name getAddedCa
	 * @return datetime
	 */
	public function getAddedCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set CommentsArticlesModel::getAddedCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getAddedCa', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text_ca -> text
	 * 
	 * @name getTextCa
	 * @return text
	 */
	public function getTextCa() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CommentsArticlesModel::getTextCa', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CommentsArticlesModel::getTextCa', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CommentsArticlesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CommentsArticlesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table comments_articles
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CommentsArticlesModel());
	}
	
	/**
	 * Select one item function from table comments_articles
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
		$ret = DbModel::doSelect($conn, new CommentsArticlesModel());
		if (isset($ret[0]) && is_a($ret[0], 'CommentsArticlesModel')) return $ret[0];
		else {
			$class = new CommentsArticlesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table comments_articles
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CommentsArticlesModel());
	}
	
	/**
	 * Basic pager function from table comments_articles
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
		return DbModel::doPager($conn, new CommentsArticlesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table comments_articles
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
		return (int) DbModel::doAffected($conn, new CommentsArticlesModel());
	}
	
	/**
	 * Basic update function for table comments_articles
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
		$af = (int) DbModel::doAffected($conn, new CommentsArticlesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table comments_articles
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
		return (int) DbModel::doInsert($conn, new CommentsArticlesModel());
	}
	
	/**
	 * Basic reader create function from table comments_articles
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table comments_articles
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
	 * Drop table function for table comments_articles
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