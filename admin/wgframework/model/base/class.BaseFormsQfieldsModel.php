<?php
/**
 * Database class for table forms_qfields
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/forms_qfields
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseFormsQfieldsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'forms_qfields';
	
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
	 * id_fqf -> int(32) unsigned
	 */
	const PRIMARY_KEY = 'id_fqf';
	
	const FULL_PRIMARY_KEY = '`forms_qfields`.`id_fqf`';
	
	/**
	 * id_fqf -> int(32) unsigned
	 */
	const FULL_ID_FQF = '`forms_qfields`.`id_fqf`';
	
	const COL_ID_FQF = 'id_fqf';
	
	/**
	 * fq_id_fqf -> int(8)
	 */
	const FULL_FQ_ID_FQF = '`forms_qfields`.`fq_id_fqf`';
	
	const COL_FQ_ID_FQF = 'fq_id_fqf';
	
	/**
	 * name_fqf -> varchar(255)
	 */
	const FULL_NAME_FQF = '`forms_qfields`.`name_fqf`';
	
	const COL_NAME_FQF = 'name_fqf';
	
	/**
	 * label_fqf -> varchar(255)
	 */
	const FULL_LABEL_FQF = '`forms_qfields`.`label_fqf`';
	
	const COL_LABEL_FQF = 'label_fqf';
	
	/**
	 * isfile_fqf -> tinyint(1) unsigned
	 */
	const FULL_ISFILE_FQF = '`forms_qfields`.`isfile_fqf`';
	
	const COL_ISFILE_FQF = 'isfile_fqf';
	
	/**
	 * validation_fqf -> varchar(50)
	 */
	const FULL_VALIDATION_FQF = '`forms_qfields`.`validation_fqf`';
	
	const COL_VALIDATION_FQF = 'validation_fqf';
	
	/**
	 * errmess_fqf -> varchar(255)
	 */
	const FULL_ERRMESS_FQF = '`forms_qfields`.`errmess_fqf`';
	
	const COL_ERRMESS_FQF = 'errmess_fqf';
	
	/**
	 * errtype_fqf -> tinyint(4)
	 */
	const FULL_ERRTYPE_FQF = '`forms_qfields`.`errtype_fqf`';
	
	const COL_ERRTYPE_FQF = 'errtype_fqf';
	
	/**
	 * okmess_fqf -> varchar(255)
	 */
	const FULL_OKMESS_FQF = '`forms_qfields`.`okmess_fqf`';
	
	const COL_OKMESS_FQF = 'okmess_fqf';
	
	/**
	 * sort_fqf -> int(4)
	 */
	const FULL_SORT_FQF = '`forms_qfields`.`sort_fqf`';
	
	const COL_SORT_FQF = 'sort_fqf';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`forms_qfields`.`id_fqf`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `forms_qfields`.`id_fqf`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdFqf'=>0, 'FqIdFqf'=>1, 'NameFqf'=>2, 'LabelFqf'=>3, 'IsfileFqf'=>4, 'ValidationFqf'=>5, 'ErrmessFqf'=>6, 'ErrtypeFqf'=>7, 'OkmessFqf'=>8, 'SortFqf'=>9);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`forms_qfields`.`IdFqf`'=>0, '`forms_qfields`.`FqIdFqf`'=>1, '`forms_qfields`.`NameFqf`'=>2, '`forms_qfields`.`LabelFqf`'=>3, '`forms_qfields`.`IsfileFqf`'=>4, '`forms_qfields`.`ValidationFqf`'=>5, '`forms_qfields`.`ErrmessFqf`'=>6, '`forms_qfields`.`ErrtypeFqf`'=>7, '`forms_qfields`.`OkmessFqf`'=>8, '`forms_qfields`.`SortFqf`'=>9);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_fqf'=>0, 'fq_id_fqf'=>1, 'name_fqf'=>2, 'label_fqf'=>3, 'isfile_fqf'=>4, 'validation_fqf'=>5, 'errmess_fqf'=>6, 'errtype_fqf'=>7, 'okmess_fqf'=>8, 'sort_fqf'=>9);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_fqf', 'fq_id_fqf', 'name_fqf', 'label_fqf', 'isfile_fqf', 'validation_fqf', 'errmess_fqf', 'errtype_fqf', 'okmess_fqf', 'sort_fqf');
	
	
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
			throw new WgException("FormsQfields could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelFormsQfields::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('FormsQfieldsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsQfieldsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('FormsQfieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('FormsQfieldsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in FormsQfieldsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in FormsQfieldsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_fqf -> int(32) unsigned
	 * 
	 * @name getIdFqf
	 * @return int
	 */
	public function getIdFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set FormsQfieldsModel::getIdFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getIdFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of fq_id_fqf -> int(8)
	 * 
	 * @name getFqIdFqf
	 * @return int
	 */
	public function getFqIdFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set FormsQfieldsModel::getFqIdFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getFqIdFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_fqf -> varchar(255)
	 * 
	 * @name getNameFqf
	 * @return varchar
	 */
	public function getNameFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set FormsQfieldsModel::getNameFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getNameFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of label_fqf -> varchar(255)
	 * 
	 * @name getLabelFqf
	 * @return varchar
	 */
	public function getLabelFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set FormsQfieldsModel::getLabelFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getLabelFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of isfile_fqf -> tinyint(1) unsigned
	 * 
	 * @name getIsfileFqf
	 * @return tinyint
	 */
	public function getIsfileFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set FormsQfieldsModel::getIsfileFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getIsfileFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of validation_fqf -> varchar(50)
	 * 
	 * @name getValidationFqf
	 * @return varchar
	 */
	public function getValidationFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set FormsQfieldsModel::getValidationFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getValidationFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errmess_fqf -> varchar(255)
	 * 
	 * @name getErrmessFqf
	 * @return varchar
	 */
	public function getErrmessFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set FormsQfieldsModel::getErrmessFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getErrmessFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of errtype_fqf -> tinyint(4)
	 * 
	 * @name getErrtypeFqf
	 * @return tinyint
	 */
	public function getErrtypeFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set FormsQfieldsModel::getErrtypeFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getErrtypeFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of okmess_fqf -> varchar(255)
	 * 
	 * @name getOkmessFqf
	 * @return varchar
	 */
	public function getOkmessFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set FormsQfieldsModel::getOkmessFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getOkmessFqf', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort_fqf -> int(4)
	 * 
	 * @name getSortFqf
	 * @return int
	 */
	public function getSortFqf() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set FormsQfieldsModel::getSortFqf', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From FormsQfieldsModel::getSortFqf', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: FormsQfieldsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: FormsQfieldsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table forms_qfields
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new FormsQfieldsModel());
	}
	
	/**
	 * Select one item function from table forms_qfields
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
		$ret = DbModel::doSelect($conn, new FormsQfieldsModel());
		if (isset($ret[0]) && is_a($ret[0], 'FormsQfieldsModel')) return $ret[0];
		else {
			$class = new FormsQfieldsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table forms_qfields
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new FormsQfieldsModel());
	}
	
	/**
	 * Basic pager function from table forms_qfields
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
		return DbModel::doPager($conn, new FormsQfieldsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table forms_qfields
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
		return (int) DbModel::doAffected($conn, new FormsQfieldsModel());
	}
	
	/**
	 * Basic update function for table forms_qfields
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
		$af = (int) DbModel::doAffected($conn, new FormsQfieldsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table forms_qfields
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
		return (int) DbModel::doInsert($conn, new FormsQfieldsModel());
	}
	
	/**
	 * Basic reader create function from table forms_qfields
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table forms_qfields
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
	 * Drop table function for table forms_qfields
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