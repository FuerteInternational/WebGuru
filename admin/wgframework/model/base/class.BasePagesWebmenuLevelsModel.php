<?php
/**
 * Database class for table pages_webmenu_levels
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_webmenu_levels
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BasePagesWebmenuLevelsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_webmenu_levels';
	
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
	 * id_pwl -> int(6) unsigned
	 */
	const PRIMARY_KEY = 'id_pwl';
	
	const FULL_PRIMARY_KEY = '`pages_webmenu_levels`.`id_pwl`';
	
	/**
	 * id_pwl -> int(6) unsigned
	 */
	const FULL_ID_PWL = '`pages_webmenu_levels`.`id_pwl`';
	
	const COL_ID_PWL = 'id_pwl';
	
	/**
	 * level_pwl -> smallint(6)
	 */
	const FULL_LEVEL_PWL = '`pages_webmenu_levels`.`level_pwl`';
	
	const COL_LEVEL_PWL = 'level_pwl';
	
	/**
	 * pw_id_pwl -> int(5)
	 */
	const FULL_PW_ID_PWL = '`pages_webmenu_levels`.`pw_id_pwl`';
	
	const COL_PW_ID_PWL = 'pw_id_pwl';
	
	/**
	 * start_pwl -> varchar(255)
	 */
	const FULL_START_PWL = '`pages_webmenu_levels`.`start_pwl`';
	
	const COL_START_PWL = 'start_pwl';
	
	/**
	 * left_pwl -> varchar(255)
	 */
	const FULL_LEFT_PWL = '`pages_webmenu_levels`.`left_pwl`';
	
	const COL_LEFT_PWL = 'left_pwl';
	
	/**
	 * active_pwl -> varchar(255)
	 */
	const FULL_ACTIVE_PWL = '`pages_webmenu_levels`.`active_pwl`';
	
	const COL_ACTIVE_PWL = 'active_pwl';
	
	/**
	 * more_pwl -> varchar(255)
	 */
	const FULL_MORE_PWL = '`pages_webmenu_levels`.`more_pwl`';
	
	const COL_MORE_PWL = 'more_pwl';
	
	/**
	 * right_pwl -> varchar(255)
	 */
	const FULL_RIGHT_PWL = '`pages_webmenu_levels`.`right_pwl`';
	
	const COL_RIGHT_PWL = 'right_pwl';
	
	/**
	 * end_pwl -> varchar(255)
	 */
	const FULL_END_PWL = '`pages_webmenu_levels`.`end_pwl`';
	
	const COL_END_PWL = 'end_pwl';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_webmenu_levels`.`id_pwl`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_webmenu_levels`.`id_pwl`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPwl'=>0, 'LevelPwl'=>1, 'PwIdPwl'=>2, 'StartPwl'=>3, 'LeftPwl'=>4, 'ActivePwl'=>5, 'MorePwl'=>6, 'RightPwl'=>7, 'EndPwl'=>8);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_webmenu_levels`.`IdPwl`'=>0, '`pages_webmenu_levels`.`LevelPwl`'=>1, '`pages_webmenu_levels`.`PwIdPwl`'=>2, '`pages_webmenu_levels`.`StartPwl`'=>3, '`pages_webmenu_levels`.`LeftPwl`'=>4, '`pages_webmenu_levels`.`ActivePwl`'=>5, '`pages_webmenu_levels`.`MorePwl`'=>6, '`pages_webmenu_levels`.`RightPwl`'=>7, '`pages_webmenu_levels`.`EndPwl`'=>8);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pwl'=>0, 'level_pwl'=>1, 'pw_id_pwl'=>2, 'start_pwl'=>3, 'left_pwl'=>4, 'active_pwl'=>5, 'more_pwl'=>6, 'right_pwl'=>7, 'end_pwl'=>8);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pwl', 'level_pwl', 'pw_id_pwl', 'start_pwl', 'left_pwl', 'active_pwl', 'more_pwl', 'right_pwl', 'end_pwl');
	
	
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
			throw new WgException("PagesWebmenuLevels could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesWebmenuLevels::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesWebmenuLevelsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesWebmenuLevelsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesWebmenuLevelsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesWebmenuLevelsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesWebmenuLevelsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesWebmenuLevelsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pwl -> int(6) unsigned
	 * 
	 * @name getIdPwl
	 * @return int
	 */
	public function getIdPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getIdPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getIdPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of level_pwl -> smallint(6)
	 * 
	 * @name getLevelPwl
	 * @return smallint
	 */
	public function getLevelPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getLevelPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getLevelPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pw_id_pwl -> int(5)
	 * 
	 * @name getPwIdPwl
	 * @return int
	 */
	public function getPwIdPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getPwIdPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getPwIdPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of start_pwl -> varchar(255)
	 * 
	 * @name getStartPwl
	 * @return varchar
	 */
	public function getStartPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getStartPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getStartPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of left_pwl -> varchar(255)
	 * 
	 * @name getLeftPwl
	 * @return varchar
	 */
	public function getLeftPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getLeftPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getLeftPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of active_pwl -> varchar(255)
	 * 
	 * @name getActivePwl
	 * @return varchar
	 */
	public function getActivePwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getActivePwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getActivePwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of more_pwl -> varchar(255)
	 * 
	 * @name getMorePwl
	 * @return varchar
	 */
	public function getMorePwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getMorePwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getMorePwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of right_pwl -> varchar(255)
	 * 
	 * @name getRightPwl
	 * @return varchar
	 */
	public function getRightPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getRightPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getRightPwl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end_pwl -> varchar(255)
	 * 
	 * @name getEndPwl
	 * @return varchar
	 */
	public function getEndPwl() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesWebmenuLevelsModel::getEndPwl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesWebmenuLevelsModel::getEndPwl', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesWebmenuLevelsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesWebmenuLevelsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_webmenu_levels
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesWebmenuLevelsModel());
	}
	
	/**
	 * Select one item function from table pages_webmenu_levels
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
		$ret = DbModel::doSelect($conn, new PagesWebmenuLevelsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesWebmenuLevelsModel')) return $ret[0];
		else {
			$class = new PagesWebmenuLevelsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_webmenu_levels
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesWebmenuLevelsModel());
	}
	
	/**
	 * Basic pager function from table pages_webmenu_levels
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
		return DbModel::doPager($conn, new PagesWebmenuLevelsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_webmenu_levels
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
		return (int) DbModel::doAffected($conn, new PagesWebmenuLevelsModel());
	}
	
	/**
	 * Basic update function for table pages_webmenu_levels
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
		$af = (int) DbModel::doAffected($conn, new PagesWebmenuLevelsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_webmenu_levels
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
		return (int) DbModel::doInsert($conn, new PagesWebmenuLevelsModel());
	}
	
	/**
	 * Basic reader create function from table pages_webmenu_levels
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_webmenu_levels
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
	 * Drop table function for table pages_webmenu_levels
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