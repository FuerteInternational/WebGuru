<?php
/**
 * Database class for table pages_webmenu
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_webmenu
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePagesWebmenuModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_webmenu';
	
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
	 * id_pw -> int(5) unsigned
	 */
	const PRIMARY_KEY = 'id_pw';
	
	const FULL_PRIMARY_KEY = '`pages_webmenu`.`id_pw`';
	
	/**
	 * id_pw -> int(5) unsigned
	 */
	const FULL_ID_PW = '`pages_webmenu`.`id_pw`';
	
	const COL_ID_PW = 'id_pw';
	
	/**
	 * name_pw -> varchar(255)
	 */
	const FULL_NAME_PW = '`pages_webmenu`.`name_pw`';
	
	const COL_NAME_PW = 'name_pw';
	
	/**
	 * identifier_pw -> varchar(255)
	 */
	const FULL_IDENTIFIER_PW = '`pages_webmenu`.`identifier_pw`';
	
	const COL_IDENTIFIER_PW = 'identifier_pw';
	
	/**
	 * desc_pw -> text
	 */
	const FULL_DESC_PW = '`pages_webmenu`.`desc_pw`';
	
	const COL_DESC_PW = 'desc_pw';
	
	/**
	 * start_pw -> int(15)
	 */
	const FULL_START_PW = '`pages_webmenu`.`start_pw`';
	
	const COL_START_PW = 'start_pw';
	
	/**
	 * home_pw -> tinyint(1)
	 */
	const FULL_HOME_PW = '`pages_webmenu`.`home_pw`';
	
	const COL_HOME_PW = 'home_pw';
	
	/**
	 * homename_pw -> varchar(255)
	 */
	const FULL_HOMENAME_PW = '`pages_webmenu`.`homename_pw`';
	
	const COL_HOMENAME_PW = 'homename_pw';
	
	/**
	 * alltree_pw -> tinyint(1)
	 */
	const FULL_ALLTREE_PW = '`pages_webmenu`.`alltree_pw`';
	
	const COL_ALLTREE_PW = 'alltree_pw';
	
	/**
	 * lang_id_pw -> int(3)
	 */
	const FULL_LANG_ID_PW = '`pages_webmenu`.`lang_id_pw`';
	
	const COL_LANG_ID_PW = 'lang_id_pw';
	
	/**
	 * web_id_pw -> int(3)
	 */
	const FULL_WEB_ID_PW = '`pages_webmenu`.`web_id_pw`';
	
	const COL_WEB_ID_PW = 'web_id_pw';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_webmenu`.`id_pw`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_webmenu`.`id_pw`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPw'=>0, 'NamePw'=>1, 'IdentifierPw'=>2, 'DescPw'=>3, 'StartPw'=>4, 'HomePw'=>5, 'HomenamePw'=>6, 'AlltreePw'=>7, 'LangIdPw'=>8, 'WebIdPw'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_webmenu`.`IdPw`'=>0, '`pages_webmenu`.`NamePw`'=>1, '`pages_webmenu`.`IdentifierPw`'=>2, '`pages_webmenu`.`DescPw`'=>3, '`pages_webmenu`.`StartPw`'=>4, '`pages_webmenu`.`HomePw`'=>5, '`pages_webmenu`.`HomenamePw`'=>6, '`pages_webmenu`.`AlltreePw`'=>7, '`pages_webmenu`.`LangIdPw`'=>8, '`pages_webmenu`.`WebIdPw`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pw'=>0, 'name_pw'=>1, 'identifier_pw'=>2, 'desc_pw'=>3, 'start_pw'=>4, 'home_pw'=>5, 'homename_pw'=>6, 'alltree_pw'=>7, 'lang_id_pw'=>8, 'web_id_pw'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pw', 'name_pw', 'identifier_pw', 'desc_pw', 'start_pw', 'home_pw', 'homename_pw', 'alltree_pw', 'lang_id_pw', 'web_id_pw');
	
	
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
			throw new WgException("PagesWebmenu could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesWebmenu::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesWebmenuModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesWebmenuModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesWebmenuModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesWebmenuModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesWebmenuModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesWebmenuModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pw -> int(5) unsigned
	 * 
	 * @name getIdPw
	 * @return int
	 */
	public function getIdPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PagesWebmenuModel::getIdPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getIdPw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pw -> varchar(255)
	 * 
	 * @name getNamePw
	 * @return varchar
	 */
	public function getNamePw() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PagesWebmenuModel::getNamePw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getNamePw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pw -> varchar(255)
	 * 
	 * @name getIdentifierPw
	 * @return varchar
	 */
	public function getIdentifierPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesWebmenuModel::getIdentifierPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getIdentifierPw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of desc_pw -> text
	 * 
	 * @name getDescPw
	 * @return text
	 */
	public function getDescPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PagesWebmenuModel::getDescPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getDescPw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of start_pw -> int(15)
	 * 
	 * @name getStartPw
	 * @return int
	 */
	public function getStartPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesWebmenuModel::getStartPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getStartPw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of home_pw -> tinyint(1)
	 * 
	 * @name getHomePw
	 * @return tinyint
	 */
	public function getHomePw() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesWebmenuModel::getHomePw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getHomePw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of homename_pw -> varchar(255)
	 * 
	 * @name getHomenamePw
	 * @return varchar
	 */
	public function getHomenamePw() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesWebmenuModel::getHomenamePw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getHomenamePw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of alltree_pw -> tinyint(1)
	 * 
	 * @name getAlltreePw
	 * @return tinyint
	 */
	public function getAlltreePw() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesWebmenuModel::getAlltreePw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getAlltreePw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of lang_id_pw -> int(3)
	 * 
	 * @name getLangIdPw
	 * @return int
	 */
	public function getLangIdPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesWebmenuModel::getLangIdPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getLangIdPw', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of web_id_pw -> int(3)
	 * 
	 * @name getWebIdPw
	 * @return int
	 */
	public function getWebIdPw() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PagesWebmenuModel::getWebIdPw', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuModel::getWebIdPw', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesWebmenuModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesWebmenuModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_webmenu
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesWebmenuModel());
	}
	
	/**
	 * Select one item function from table pages_webmenu
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
		$ret = DbModel::doSelect($conn, new PagesWebmenuModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesWebmenuModel')) return $ret[0];
		else {
			$class = new PagesWebmenuModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_webmenu
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesWebmenuModel());
	}
	
	/**
	 * Basic pager function from table pages_webmenu
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
		return DbModel::doPager($conn, new PagesWebmenuModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_webmenu
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
		return (int) DbModel::doAffected($conn, new PagesWebmenuModel());
	}
	
	/**
	 * Basic update function for table pages_webmenu
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
		$af = (int) DbModel::doAffected($conn, new PagesWebmenuModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_webmenu
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
		return (int) DbModel::doInsert($conn, new PagesWebmenuModel());
	}
	
	/**
	 * Basic reader create function from table pages_webmenu
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_webmenu
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
	 * Drop table function for table pages_webmenu
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