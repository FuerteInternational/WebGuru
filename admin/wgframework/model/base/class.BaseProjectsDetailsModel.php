<?php
/**
 * Database class for table projects_details
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/projects_details
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 11:51:24
 */

class BaseProjectsDetailsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'projects_details';
	
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
	 * id_pd -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_pd';
	
	const FULL_PRIMARY_KEY = '`projects_details`.`id_pd`';
	
	/**
	 * id_pd -> int(8) unsigned
	 */
	const FULL_ID_PD = '`projects_details`.`id_pd`';
	
	const COL_ID_PD = 'id_pd';
	
	/**
	 * name_pd -> varchar(255)
	 */
	const FULL_NAME_PD = '`projects_details`.`name_pd`';
	
	const COL_NAME_PD = 'name_pd';
	
	/**
	 * identifier_pd -> varchar(255)
	 */
	const FULL_IDENTIFIER_PD = '`projects_details`.`identifier_pd`';
	
	const COL_IDENTIFIER_PD = 'identifier_pd';
	
	/**
	 * dateformat_pd -> varchar(50)
	 */
	const FULL_DATEFORMAT_PD = '`projects_details`.`dateformat_pd`';
	
	const COL_DATEFORMAT_PD = 'dateformat_pd';
	
	/**
	 * images_pd -> tinyint(1)
	 */
	const FULL_IMAGES_PD = '`projects_details`.`images_pd`';
	
	const COL_IMAGES_PD = 'images_pd';
	
	/**
	 * imgsize_pd -> varchar(10)
	 */
	const FULL_IMGSIZE_PD = '`projects_details`.`imgsize_pd`';
	
	const COL_IMGSIZE_PD = 'imgsize_pd';
	
	/**
	 * temp_pd -> text
	 */
	const FULL_TEMP_PD = '`projects_details`.`temp_pd`';
	
	const COL_TEMP_PD = 'temp_pd';
	
	/**
	 * istart_pd -> text
	 */
	const FULL_ISTART_PD = '`projects_details`.`istart_pd`';
	
	const COL_ISTART_PD = 'istart_pd';
	
	/**
	 * iitem_pd -> text
	 */
	const FULL_IITEM_PD = '`projects_details`.`iitem_pd`';
	
	const COL_IITEM_PD = 'iitem_pd';
	
	/**
	 * iend_pd -> text
	 */
	const FULL_IEND_PD = '`projects_details`.`iend_pd`';
	
	const COL_IEND_PD = 'iend_pd';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`projects_details`.`id_pd`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `projects_details`.`id_pd`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPd'=>0, 'NamePd'=>1, 'IdentifierPd'=>2, 'DateformatPd'=>3, 'ImagesPd'=>4, 'ImgsizePd'=>5, 'TempPd'=>6, 'IstartPd'=>7, 'IitemPd'=>8, 'IendPd'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`projects_details`.`IdPd`'=>0, '`projects_details`.`NamePd`'=>1, '`projects_details`.`IdentifierPd`'=>2, '`projects_details`.`DateformatPd`'=>3, '`projects_details`.`ImagesPd`'=>4, '`projects_details`.`ImgsizePd`'=>5, '`projects_details`.`TempPd`'=>6, '`projects_details`.`IstartPd`'=>7, '`projects_details`.`IitemPd`'=>8, '`projects_details`.`IendPd`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pd'=>0, 'name_pd'=>1, 'identifier_pd'=>2, 'dateformat_pd'=>3, 'images_pd'=>4, 'imgsize_pd'=>5, 'temp_pd'=>6, 'istart_pd'=>7, 'iitem_pd'=>8, 'iend_pd'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pd', 'name_pd', 'identifier_pd', 'dateformat_pd', 'images_pd', 'imgsize_pd', 'temp_pd', 'istart_pd', 'iitem_pd', 'iend_pd');
	
	
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
			throw new WgException("ProjectsDetails could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectsDetails::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectsDetailsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsDetailsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ProjectsDetailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsDetailsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ProjectsDetailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ProjectsDetailsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pd -> int(8) unsigned
	 * 
	 * @name getIdPd
	 * @return int
	 */
	public function getIdPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getIdPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getIdPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pd -> varchar(255)
	 * 
	 * @name getNamePd
	 * @return varchar
	 */
	public function getNamePd() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getNamePd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getNamePd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pd -> varchar(255)
	 * 
	 * @name getIdentifierPd
	 * @return varchar
	 */
	public function getIdentifierPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getIdentifierPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getIdentifierPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat_pd -> varchar(50)
	 * 
	 * @name getDateformatPd
	 * @return varchar
	 */
	public function getDateformatPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getDateformatPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getDateformatPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of images_pd -> tinyint(1)
	 * 
	 * @name getImagesPd
	 * @return tinyint
	 */
	public function getImagesPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getImagesPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getImagesPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of imgsize_pd -> varchar(10)
	 * 
	 * @name getImgsizePd
	 * @return varchar
	 */
	public function getImgsizePd() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getImgsizePd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getImgsizePd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp_pd -> text
	 * 
	 * @name getTempPd
	 * @return text
	 */
	public function getTempPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getTempPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getTempPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of istart_pd -> text
	 * 
	 * @name getIstartPd
	 * @return text
	 */
	public function getIstartPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getIstartPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getIstartPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of iitem_pd -> text
	 * 
	 * @name getIitemPd
	 * @return text
	 */
	public function getIitemPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getIitemPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getIitemPd', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of iend_pd -> text
	 * 
	 * @name getIendPd
	 * @return text
	 */
	public function getIendPd() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set ProjectsDetailsModel::getIendPd', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsDetailsModel::getIendPd', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectsDetailsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectsDetailsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table projects_details
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ProjectsDetailsModel());
	}
	
	/**
	 * Select one item function from table projects_details
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
		$ret = DbModel::doSelect($conn, new ProjectsDetailsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectsDetailsModel')) return $ret[0];
		else {
			$class = new ProjectsDetailsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table projects_details
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectsDetailsModel());
	}
	
	/**
	 * Basic pager function from table projects_details
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
		return DbModel::doPager($conn, new ProjectsDetailsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table projects_details
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
		return (int) DbModel::doAffected($conn, new ProjectsDetailsModel());
	}
	
	/**
	 * Basic update function for table projects_details
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
		$af = (int) DbModel::doAffected($conn, new ProjectsDetailsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table projects_details
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
		return (int) DbModel::doInsert($conn, new ProjectsDetailsModel());
	}
	
	/**
	 * Basic reader create function from table projects_details
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table projects_details
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
	 * Drop table function for table projects_details
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