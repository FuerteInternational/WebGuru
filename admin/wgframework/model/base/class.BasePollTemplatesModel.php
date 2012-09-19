<?php
/**
 * Database class for table poll_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/poll_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePollTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'poll_templates';
	
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
	 * id_pt -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_pt';
	
	const FULL_PRIMARY_KEY = '`poll_templates`.`id_pt`';
	
	/**
	 * id_pt -> int(8) unsigned
	 */
	const FULL_ID_PT = '`poll_templates`.`id_pt`';
	
	const COL_ID_PT = 'id_pt';
	
	/**
	 * name_pt -> varchar(255)
	 */
	const FULL_NAME_PT = '`poll_templates`.`name_pt`';
	
	const COL_NAME_PT = 'name_pt';
	
	/**
	 * identifier_pt -> varchar(255)
	 */
	const FULL_IDENTIFIER_PT = '`poll_templates`.`identifier_pt`';
	
	const COL_IDENTIFIER_PT = 'identifier_pt';
	
	/**
	 * begina_pt -> text
	 */
	const FULL_BEGINA_PT = '`poll_templates`.`begina_pt`';
	
	const COL_BEGINA_PT = 'begina_pt';
	
	/**
	 * itema_pt -> text
	 */
	const FULL_ITEMA_PT = '`poll_templates`.`itema_pt`';
	
	const COL_ITEMA_PT = 'itema_pt';
	
	/**
	 * enda_pt -> text
	 */
	const FULL_ENDA_PT = '`poll_templates`.`enda_pt`';
	
	const COL_ENDA_PT = 'enda_pt';
	
	/**
	 * beginb_pt -> text
	 */
	const FULL_BEGINB_PT = '`poll_templates`.`beginb_pt`';
	
	const COL_BEGINB_PT = 'beginb_pt';
	
	/**
	 * itemb_pt -> text
	 */
	const FULL_ITEMB_PT = '`poll_templates`.`itemb_pt`';
	
	const COL_ITEMB_PT = 'itemb_pt';
	
	/**
	 * endb_pt -> text
	 */
	const FULL_ENDB_PT = '`poll_templates`.`endb_pt`';
	
	const COL_ENDB_PT = 'endb_pt';
	
	/**
	 * useajax_pt -> tinyint(1)
	 */
	const FULL_USEAJAX_PT = '`poll_templates`.`useajax_pt`';
	
	const COL_USEAJAX_PT = 'useajax_pt';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`poll_templates`.`id_pt`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `poll_templates`.`id_pt`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPt'=>0, 'NamePt'=>1, 'IdentifierPt'=>2, 'BeginaPt'=>3, 'ItemaPt'=>4, 'EndaPt'=>5, 'BeginbPt'=>6, 'ItembPt'=>7, 'EndbPt'=>8, 'UseajaxPt'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`poll_templates`.`IdPt`'=>0, '`poll_templates`.`NamePt`'=>1, '`poll_templates`.`IdentifierPt`'=>2, '`poll_templates`.`BeginaPt`'=>3, '`poll_templates`.`ItemaPt`'=>4, '`poll_templates`.`EndaPt`'=>5, '`poll_templates`.`BeginbPt`'=>6, '`poll_templates`.`ItembPt`'=>7, '`poll_templates`.`EndbPt`'=>8, '`poll_templates`.`UseajaxPt`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pt'=>0, 'name_pt'=>1, 'identifier_pt'=>2, 'begina_pt'=>3, 'itema_pt'=>4, 'enda_pt'=>5, 'beginb_pt'=>6, 'itemb_pt'=>7, 'endb_pt'=>8, 'useajax_pt'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pt', 'name_pt', 'identifier_pt', 'begina_pt', 'itema_pt', 'enda_pt', 'beginb_pt', 'itemb_pt', 'endb_pt', 'useajax_pt');
	
	
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
			throw new WgException("PollTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPollTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PollTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PollTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PollTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PollTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PollTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pt -> int(8) unsigned
	 * 
	 * @name getIdPt
	 * @return int
	 */
	public function getIdPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PollTemplatesModel::getIdPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getIdPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pt -> varchar(255)
	 * 
	 * @name getNamePt
	 * @return varchar
	 */
	public function getNamePt() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PollTemplatesModel::getNamePt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getNamePt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pt -> varchar(255)
	 * 
	 * @name getIdentifierPt
	 * @return varchar
	 */
	public function getIdentifierPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PollTemplatesModel::getIdentifierPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getIdentifierPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begina_pt -> text
	 * 
	 * @name getBeginaPt
	 * @return text
	 */
	public function getBeginaPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PollTemplatesModel::getBeginaPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getBeginaPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of itema_pt -> text
	 * 
	 * @name getItemaPt
	 * @return text
	 */
	public function getItemaPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PollTemplatesModel::getItemaPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getItemaPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enda_pt -> text
	 * 
	 * @name getEndaPt
	 * @return text
	 */
	public function getEndaPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PollTemplatesModel::getEndaPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getEndaPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of beginb_pt -> text
	 * 
	 * @name getBeginbPt
	 * @return text
	 */
	public function getBeginbPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PollTemplatesModel::getBeginbPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getBeginbPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of itemb_pt -> text
	 * 
	 * @name getItembPt
	 * @return text
	 */
	public function getItembPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PollTemplatesModel::getItembPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getItembPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of endb_pt -> text
	 * 
	 * @name getEndbPt
	 * @return text
	 */
	public function getEndbPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PollTemplatesModel::getEndbPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getEndbPt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of useajax_pt -> tinyint(1)
	 * 
	 * @name getUseajaxPt
	 * @return tinyint
	 */
	public function getUseajaxPt() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PollTemplatesModel::getUseajaxPt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PollTemplatesModel::getUseajaxPt', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PollTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PollTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table poll_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PollTemplatesModel());
	}
	
	/**
	 * Select one item function from table poll_templates
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
		$ret = DbModel::doSelect($conn, new PollTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'PollTemplatesModel')) return $ret[0];
		else {
			$class = new PollTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table poll_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PollTemplatesModel());
	}
	
	/**
	 * Basic pager function from table poll_templates
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
		return DbModel::doPager($conn, new PollTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table poll_templates
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
		return (int) DbModel::doAffected($conn, new PollTemplatesModel());
	}
	
	/**
	 * Basic update function for table poll_templates
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
		$af = (int) DbModel::doAffected($conn, new PollTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table poll_templates
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
		return (int) DbModel::doInsert($conn, new PollTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table poll_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table poll_templates
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
	 * Drop table function for table poll_templates
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