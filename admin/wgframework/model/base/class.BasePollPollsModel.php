<?php
/**
 * Database class for table poll_polls
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/poll_polls
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePollPollsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'poll_polls';
	
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
	 * id_pp -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_pp';
	
	const FULL_PRIMARY_KEY = '`poll_polls`.`id_pp`';
	
	/**
	 * id_pp -> int(8) unsigned
	 */
	const FULL_ID_PP = '`poll_polls`.`id_pp`';
	
	const COL_ID_PP = 'id_pp';
	
	/**
	 * lang_id_pp -> int(3)
	 */
	const FULL_LANG_ID_PP = '`poll_polls`.`lang_id_pp`';
	
	const COL_LANG_ID_PP = 'lang_id_pp';
	
	/**
	 * name_pp -> varchar(255)
	 */
	const FULL_NAME_PP = '`poll_polls`.`name_pp`';
	
	const COL_NAME_PP = 'name_pp';
	
	/**
	 * identifier_pp -> varchar(255)
	 */
	const FULL_IDENTIFIER_PP = '`poll_polls`.`identifier_pp`';
	
	const COL_IDENTIFIER_PP = 'identifier_pp';
	
	/**
	 * added_pp -> datetime
	 */
	const FULL_ADDED_PP = '`poll_polls`.`added_pp`';
	
	const COL_ADDED_PP = 'added_pp';
	
	/**
	 * okmess_pp -> varchar(255)
	 */
	const FULL_OKMESS_PP = '`poll_polls`.`okmess_pp`';
	
	const COL_OKMESS_PP = 'okmess_pp';
	
	/**
	 * badmess_pp -> varchar(255)
	 */
	const FULL_BADMESS_PP = '`poll_polls`.`badmess_pp`';
	
	const COL_BADMESS_PP = 'badmess_pp';
	
	/**
	 * redirect_pp -> varchar(255)
	 */
	const FULL_REDIRECT_PP = '`poll_polls`.`redirect_pp`';
	
	const COL_REDIRECT_PP = 'redirect_pp';
	
	/**
	 * dateformat_pp -> varchar(50)
	 */
	const FULL_DATEFORMAT_PP = '`poll_polls`.`dateformat_pp`';
	
	const COL_DATEFORMAT_PP = 'dateformat_pp';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`poll_polls`.`id_pp`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `poll_polls`.`id_pp`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPp'=>0, 'LangIdPp'=>1, 'NamePp'=>2, 'IdentifierPp'=>3, 'AddedPp'=>4, 'OkmessPp'=>5, 'BadmessPp'=>6, 'RedirectPp'=>7, 'DateformatPp'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`poll_polls`.`IdPp`'=>0, '`poll_polls`.`LangIdPp`'=>1, '`poll_polls`.`NamePp`'=>2, '`poll_polls`.`IdentifierPp`'=>3, '`poll_polls`.`AddedPp`'=>4, '`poll_polls`.`OkmessPp`'=>5, '`poll_polls`.`BadmessPp`'=>6, '`poll_polls`.`RedirectPp`'=>7, '`poll_polls`.`DateformatPp`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pp'=>0, 'lang_id_pp'=>1, 'name_pp'=>2, 'identifier_pp'=>3, 'added_pp'=>4, 'okmess_pp'=>5, 'badmess_pp'=>6, 'redirect_pp'=>7, 'dateformat_pp'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pp', 'lang_id_pp', 'name_pp', 'identifier_pp', 'added_pp', 'okmess_pp', 'badmess_pp', 'redirect_pp', 'dateformat_pp');
	
	
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
			throw new WgException("PollPolls could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPollPolls::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PollPollsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollPollsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PollPollsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollPollsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PollPollsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PollPollsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pp -> int(8) unsigned
	 * 
	 * @name getIdPp
	 * @return int
	 */
	public function getIdPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PollPollsModel::getIdPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getIdPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lang_id_pp -> int(3)
	 * 
	 * @name getLangIdPp
	 * @return int
	 */
	public function getLangIdPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PollPollsModel::getLangIdPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getLangIdPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pp -> varchar(255)
	 * 
	 * @name getNamePp
	 * @return varchar
	 */
	public function getNamePp() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PollPollsModel::getNamePp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getNamePp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pp -> varchar(255)
	 * 
	 * @name getIdentifierPp
	 * @return varchar
	 */
	public function getIdentifierPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PollPollsModel::getIdentifierPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getIdentifierPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_pp -> datetime
	 * 
	 * @name getAddedPp
	 * @return datetime
	 */
	public function getAddedPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (int) strtotime($this->_result[4]);
			else parent::throwGetColException('Not set PollPollsModel::getAddedPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getAddedPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of okmess_pp -> varchar(255)
	 * 
	 * @name getOkmessPp
	 * @return varchar
	 */
	public function getOkmessPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PollPollsModel::getOkmessPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getOkmessPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of badmess_pp -> varchar(255)
	 * 
	 * @name getBadmessPp
	 * @return varchar
	 */
	public function getBadmessPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PollPollsModel::getBadmessPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getBadmessPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect_pp -> varchar(255)
	 * 
	 * @name getRedirectPp
	 * @return varchar
	 */
	public function getRedirectPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PollPollsModel::getRedirectPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getRedirectPp', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat_pp -> varchar(50)
	 * 
	 * @name getDateformatPp
	 * @return varchar
	 */
	public function getDateformatPp() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PollPollsModel::getDateformatPp', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollPollsModel::getDateformatPp', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PollPollsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PollPollsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table poll_polls
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PollPollsModel());
	}
	
	/**
	 * Select one item function from table poll_polls
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
		$ret = DbModel::doSelect($conn, new PollPollsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PollPollsModel')) return $ret[0];
		else {
			$class = new PollPollsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table poll_polls
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PollPollsModel());
	}
	
	/**
	 * Basic pager function from table poll_polls
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
		return DbModel::doPager($conn, new PollPollsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table poll_polls
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
		return (int) DbModel::doAffected($conn, new PollPollsModel());
	}
	
	/**
	 * Basic update function for table poll_polls
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
		$af = (int) DbModel::doAffected($conn, new PollPollsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table poll_polls
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
		return (int) DbModel::doInsert($conn, new PollPollsModel());
	}
	
	/**
	 * Basic reader create function from table poll_polls
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table poll_polls
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
	 * Drop table function for table poll_polls
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