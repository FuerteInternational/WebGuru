<?php
/**
 * Database class for table projects_listings
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/projects_listings
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:24
 */

class BaseProjectsListingsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'projects_listings';
	
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
	 * id_pl -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_pl';
	
	const FULL_PRIMARY_KEY = '`projects_listings`.`id_pl`';
	
	/**
	 * id_pl -> int(8) unsigned
	 */
	const FULL_ID_PL = '`projects_listings`.`id_pl`';
	
	const COL_ID_PL = 'id_pl';
	
	/**
	 * pc_id_pl -> int(8)
	 */
	const FULL_PC_ID_PL = '`projects_listings`.`pc_id_pl`';
	
	const COL_PC_ID_PL = 'pc_id_pl';
	
	/**
	 * name_pl -> varchar(255)
	 */
	const FULL_NAME_PL = '`projects_listings`.`name_pl`';
	
	const COL_NAME_PL = 'name_pl';
	
	/**
	 * identifier_pl -> varchar(255)
	 */
	const FULL_IDENTIFIER_PL = '`projects_listings`.`identifier_pl`';
	
	const COL_IDENTIFIER_PL = 'identifier_pl';
	
	/**
	 * dateformat_pl -> varchar(50)
	 */
	const FULL_DATEFORMAT_PL = '`projects_listings`.`dateformat_pl`';
	
	const COL_DATEFORMAT_PL = 'dateformat_pl';
	
	/**
	 * perpage_pl -> int(4)
	 */
	const FULL_PERPAGE_PL = '`projects_listings`.`perpage_pl`';
	
	const COL_PERPAGE_PL = 'perpage_pl';
	
	/**
	 * link_pl -> varchar(255)
	 */
	const FULL_LINK_PL = '`projects_listings`.`link_pl`';
	
	const COL_LINK_PL = 'link_pl';
	
	/**
	 * image_pl -> varchar(10)
	 */
	const FULL_IMAGE_PL = '`projects_listings`.`image_pl`';
	
	const COL_IMAGE_PL = 'image_pl';
	
	/**
	 * begin_pl -> text
	 */
	const FULL_BEGIN_PL = '`projects_listings`.`begin_pl`';
	
	const COL_BEGIN_PL = 'begin_pl';
	
	/**
	 * clstart_pl -> text
	 */
	const FULL_CLSTART_PL = '`projects_listings`.`clstart_pl`';
	
	const COL_CLSTART_PL = 'clstart_pl';
	
	/**
	 * item_pl -> text
	 */
	const FULL_ITEM_PL = '`projects_listings`.`item_pl`';
	
	const COL_ITEM_PL = 'item_pl';
	
	/**
	 * clend_pl -> text
	 */
	const FULL_CLEND_PL = '`projects_listings`.`clend_pl`';
	
	const COL_CLEND_PL = 'clend_pl';
	
	/**
	 * end_pl -> text
	 */
	const FULL_END_PL = '`projects_listings`.`end_pl`';
	
	const COL_END_PL = 'end_pl';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`projects_listings`.`id_pl`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `projects_listings`.`id_pl`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPl'=>0, 'PcIdPl'=>1, 'NamePl'=>2, 'IdentifierPl'=>3, 'DateformatPl'=>4, 'PerpagePl'=>5, 'LinkPl'=>6, 'ImagePl'=>7, 'BeginPl'=>8, 'ClstartPl'=>9, 'ItemPl'=>10, 'ClendPl'=>11, 'EndPl'=>12);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`projects_listings`.`IdPl`'=>0, '`projects_listings`.`PcIdPl`'=>1, '`projects_listings`.`NamePl`'=>2, '`projects_listings`.`IdentifierPl`'=>3, '`projects_listings`.`DateformatPl`'=>4, '`projects_listings`.`PerpagePl`'=>5, '`projects_listings`.`LinkPl`'=>6, '`projects_listings`.`ImagePl`'=>7, '`projects_listings`.`BeginPl`'=>8, '`projects_listings`.`ClstartPl`'=>9, '`projects_listings`.`ItemPl`'=>10, '`projects_listings`.`ClendPl`'=>11, '`projects_listings`.`EndPl`'=>12);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pl'=>0, 'pc_id_pl'=>1, 'name_pl'=>2, 'identifier_pl'=>3, 'dateformat_pl'=>4, 'perpage_pl'=>5, 'link_pl'=>6, 'image_pl'=>7, 'begin_pl'=>8, 'clstart_pl'=>9, 'item_pl'=>10, 'clend_pl'=>11, 'end_pl'=>12);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pl', 'pc_id_pl', 'name_pl', 'identifier_pl', 'dateformat_pl', 'perpage_pl', 'link_pl', 'image_pl', 'begin_pl', 'clstart_pl', 'item_pl', 'clend_pl', 'end_pl');
	
	
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
			throw new WgException("ProjectsListings could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectsListings::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectsListingsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsListingsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ProjectsListingsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsListingsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ProjectsListingsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ProjectsListingsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pl -> int(8) unsigned
	 * 
	 * @name getIdPl
	 * @return int
	 */
	public function getIdPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set ProjectsListingsModel::getIdPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getIdPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pc_id_pl -> int(8)
	 * 
	 * @name getPcIdPl
	 * @return int
	 */
	public function getPcIdPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ProjectsListingsModel::getPcIdPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getPcIdPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pl -> varchar(255)
	 * 
	 * @name getNamePl
	 * @return varchar
	 */
	public function getNamePl() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ProjectsListingsModel::getNamePl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getNamePl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pl -> varchar(255)
	 * 
	 * @name getIdentifierPl
	 * @return varchar
	 */
	public function getIdentifierPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectsListingsModel::getIdentifierPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getIdentifierPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat_pl -> varchar(50)
	 * 
	 * @name getDateformatPl
	 * @return varchar
	 */
	public function getDateformatPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectsListingsModel::getDateformatPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getDateformatPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage_pl -> int(4)
	 * 
	 * @name getPerpagePl
	 * @return int
	 */
	public function getPerpagePl() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ProjectsListingsModel::getPerpagePl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getPerpagePl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link_pl -> varchar(255)
	 * 
	 * @name getLinkPl
	 * @return varchar
	 */
	public function getLinkPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ProjectsListingsModel::getLinkPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getLinkPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image_pl -> varchar(10)
	 * 
	 * @name getImagePl
	 * @return varchar
	 */
	public function getImagePl() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ProjectsListingsModel::getImagePl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getImagePl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin_pl -> text
	 * 
	 * @name getBeginPl
	 * @return text
	 */
	public function getBeginPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set ProjectsListingsModel::getBeginPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getBeginPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of clstart_pl -> text
	 * 
	 * @name getClstartPl
	 * @return text
	 */
	public function getClstartPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set ProjectsListingsModel::getClstartPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getClstartPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item_pl -> text
	 * 
	 * @name getItemPl
	 * @return text
	 */
	public function getItemPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set ProjectsListingsModel::getItemPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getItemPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of clend_pl -> text
	 * 
	 * @name getClendPl
	 * @return text
	 */
	public function getClendPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set ProjectsListingsModel::getClendPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getClendPl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end_pl -> text
	 * 
	 * @name getEndPl
	 * @return text
	 */
	public function getEndPl() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set ProjectsListingsModel::getEndPl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsListingsModel::getEndPl', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectsListingsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectsListingsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table projects_listings
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ProjectsListingsModel());
	}
	
	/**
	 * Select one item function from table projects_listings
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
		$ret = DbModel::doSelect($conn, new ProjectsListingsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectsListingsModel')) return $ret[0];
		else {
			$class = new ProjectsListingsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table projects_listings
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectsListingsModel());
	}
	
	/**
	 * Basic pager function from table projects_listings
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
		return DbModel::doPager($conn, new ProjectsListingsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table projects_listings
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
		return (int) DbModel::doAffected($conn, new ProjectsListingsModel());
	}
	
	/**
	 * Basic update function for table projects_listings
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
		$af = (int) DbModel::doAffected($conn, new ProjectsListingsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table projects_listings
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
		return (int) DbModel::doInsert($conn, new ProjectsListingsModel());
	}
	
	/**
	 * Basic reader create function from table projects_listings
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table projects_listings
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
	 * Drop table function for table projects_listings
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