<?php
/**
 * Database class for table projects_images_details
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/projects_images_details
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        10. October 2012 11:04:36
 */

class BaseProjectsImagesDetailsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'projects_images_details';
	
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
	 * id_pid -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_pid';
	
	const FULL_PRIMARY_KEY = '`projects_images_details`.`id_pid`';
	
	/**
	 * id_pid -> int(8) unsigned
	 */
	const FULL_ID_PID = '`projects_images_details`.`id_pid`';
	
	const COL_ID_PID = 'id_pid';
	
	/**
	 * name_pid -> varchar(255)
	 */
	const FULL_NAME_PID = '`projects_images_details`.`name_pid`';
	
	const COL_NAME_PID = 'name_pid';
	
	/**
	 * identifier_pid -> varchar(255)
	 */
	const FULL_IDENTIFIER_PID = '`projects_images_details`.`identifier_pid`';
	
	const COL_IDENTIFIER_PID = 'identifier_pid';
	
	/**
	 * image_pid -> varchar(50)
	 */
	const FULL_IMAGE_PID = '`projects_images_details`.`image_pid`';
	
	const COL_IMAGE_PID = 'image_pid';
	
	/**
	 * temp_pid -> text
	 */
	const FULL_TEMP_PID = '`projects_images_details`.`temp_pid`';
	
	const COL_TEMP_PID = 'temp_pid';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`projects_images_details`.`id_pid`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `projects_images_details`.`id_pid`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdPid'=>0, 'NamePid'=>1, 'IdentifierPid'=>2, 'ImagePid'=>3, 'TempPid'=>4);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`projects_images_details`.`IdPid`'=>0, '`projects_images_details`.`NamePid`'=>1, '`projects_images_details`.`IdentifierPid`'=>2, '`projects_images_details`.`ImagePid`'=>3, '`projects_images_details`.`TempPid`'=>4);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_pid'=>0, 'name_pid'=>1, 'identifier_pid'=>2, 'image_pid'=>3, 'temp_pid'=>4);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_pid', 'name_pid', 'identifier_pid', 'image_pid', 'temp_pid');
	
	
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
			throw new WgException("ProjectsImagesDetails could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectsImagesDetails::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectsImagesDetailsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsImagesDetailsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('ProjectsImagesDetailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectsImagesDetailsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in ProjectsImagesDetailsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in ProjectsImagesDetailsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_pid -> int(8) unsigned
	 * 
	 * @name getIdPid
	 * @return int
	 */
	public function getIdPid() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (int) $this->_result[0];
			else parent::throwGetColException('Not set ProjectsImagesDetailsModel::getIdPid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsImagesDetailsModel::getIdPid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_pid -> varchar(255)
	 * 
	 * @name getNamePid
	 * @return varchar
	 */
	public function getNamePid() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set ProjectsImagesDetailsModel::getNamePid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsImagesDetailsModel::getNamePid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_pid -> varchar(255)
	 * 
	 * @name getIdentifierPid
	 * @return varchar
	 */
	public function getIdentifierPid() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ProjectsImagesDetailsModel::getIdentifierPid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsImagesDetailsModel::getIdentifierPid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image_pid -> varchar(50)
	 * 
	 * @name getImagePid
	 * @return varchar
	 */
	public function getImagePid() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectsImagesDetailsModel::getImagePid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsImagesDetailsModel::getImagePid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of temp_pid -> text
	 * 
	 * @name getTempPid
	 * @return text
	 */
	public function getTempPid() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectsImagesDetailsModel::getTempPid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectsImagesDetailsModel::getTempPid', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectsImagesDetailsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectsImagesDetailsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table projects_images_details
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new ProjectsImagesDetailsModel());
	}
	
	/** Left join select function from table projects_images_details
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ProjectsImagesDetailsModel());
	}
	
	/** Right join select function from table projects_images_details
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ProjectsImagesDetailsModel());
	}
	
	/** Inner join select function from table projects_images_details
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new ProjectsImagesDetailsModel());
	}
	
	/**
	 * Select one item function from table projects_images_details
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
		$ret = DbModel::doSelect($conn, new ProjectsImagesDetailsModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectsImagesDetailsModel')) return $ret[0];
		else {
			$class = new ProjectsImagesDetailsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table projects_images_details
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectsImagesDetailsModel());
	}
	
	/**
	 * Basic pager function from table projects_images_details
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
		return DbModel::doPager($conn, new ProjectsImagesDetailsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table projects_images_details
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
		return (int) DbModel::doAffected($conn, new ProjectsImagesDetailsModel());
	}
	
	/**
	 * Basic update function for table projects_images_details
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
		$af = (int) DbModel::doAffected($conn, new ProjectsImagesDetailsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table projects_images_details
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
		return (int) DbModel::doInsert($conn, new ProjectsImagesDetailsModel());
	}
	
	/**
	 * Basic reader create function from table projects_images_details
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table projects_images_details
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
	 * Drop table function for table projects_images_details
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