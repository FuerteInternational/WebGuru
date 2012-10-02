<?php
/**
 * Database class for table pages_templates_revisions
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_templates_revisions
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        2. October 2012 13:06:15
 */

class BasePagesTemplatesRevisionsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_templates_revisions';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`pages_templates_revisions`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`pages_templates_revisions`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * pages_templates_id -> int(11) unsigned
	 */
	const FULL_PAGES_TEMPLATES_ID = '`pages_templates_revisions`.`pages_templates_id`';
	
	const COL_PAGES_TEMPLATES_ID = 'pages_templates_id';
	
	/**
	 * revision -> int(11)
	 */
	const FULL_REVISION = '`pages_templates_revisions`.`revision`';
	
	const COL_REVISION = 'revision';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`pages_templates_revisions`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`pages_templates_revisions`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`pages_templates_revisions`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * master -> tinyint(1) unsigned
	 */
	const FULL_MASTER = '`pages_templates_revisions`.`master`';
	
	const COL_MASTER = 'master';
	
	/**
	 * registered -> tinyint(1)
	 */
	const FULL_REGISTERED = '`pages_templates_revisions`.`registered`';
	
	const COL_REGISTERED = 'registered';
	
	/**
	 * system_language_id -> int(3)
	 */
	const FULL_SYSTEM_LANGUAGE_ID = '`pages_templates_revisions`.`system_language_id`';
	
	const COL_SYSTEM_LANGUAGE_ID = 'system_language_id';
	
	/**
	 * pages_templates_groups_id -> int(4) unsigned
	 */
	const FULL_PAGES_TEMPLATES_GROUPS_ID = '`pages_templates_revisions`.`pages_templates_groups_id`';
	
	const COL_PAGES_TEMPLATES_GROUPS_ID = 'pages_templates_groups_id';
	
	/**
	 * template -> longtext
	 */
	const FULL_TEMPLATE = '`pages_templates_revisions`.`template`';
	
	const COL_TEMPLATE = 'template';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`pages_templates_revisions`.`note`';
	
	const COL_NOTE = 'note';
	
	
	/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_templates_revisions`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_templates_revisions`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'PagesTemplatesId'=>1, 'Revision'=>2, 'Added'=>3, 'Name'=>4, 'Identifier'=>5, 'Master'=>6, 'Registered'=>7, 'SystemLanguageId'=>8, 'PagesTemplatesGroupsId'=>9, 'Template'=>10, 'Note'=>11);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_templates_revisions`.`Id`'=>0, '`pages_templates_revisions`.`PagesTemplatesId`'=>1, '`pages_templates_revisions`.`Revision`'=>2, '`pages_templates_revisions`.`Added`'=>3, '`pages_templates_revisions`.`Name`'=>4, '`pages_templates_revisions`.`Identifier`'=>5, '`pages_templates_revisions`.`Master`'=>6, '`pages_templates_revisions`.`Registered`'=>7, '`pages_templates_revisions`.`SystemLanguageId`'=>8, '`pages_templates_revisions`.`PagesTemplatesGroupsId`'=>9, '`pages_templates_revisions`.`Template`'=>10, '`pages_templates_revisions`.`Note`'=>11);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'pages_templates_id'=>1, 'revision'=>2, 'added'=>3, 'name'=>4, 'identifier'=>5, 'master'=>6, 'registered'=>7, 'system_language_id'=>8, 'pages_templates_groups_id'=>9, 'template'=>10, 'note'=>11);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'pages_templates_id', 'revision', 'added', 'name', 'identifier', 'master', 'registered', 'system_language_id', 'pages_templates_groups_id', 'template', 'note');
	
	
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
			throw new WgException("PagesTemplatesRevisions could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesTemplatesRevisions::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesTemplatesRevisionsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesTemplatesRevisionsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesTemplatesRevisionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesTemplatesRevisionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesTemplatesRevisionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesTemplatesRevisionsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(11) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_templates_id -> int(11) unsigned
	 * 
	 * @name getPagesTemplatesId
	 * @return int
	 */
	public function getPagesTemplatesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getPagesTemplatesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getPagesTemplatesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of revision -> int(11)
	 * 
	 * @name getRevision
	 * @return int
	 */
	public function getRevision() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getRevision', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getRevision', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (int) strtotime($this->_result[3]);
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of master -> tinyint(1) unsigned
	 * 
	 * @name getMaster
	 * @return tinyint
	 */
	public function getMaster() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getMaster', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getMaster', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of registered -> tinyint(1)
	 * 
	 * @name getRegistered
	 * @return tinyint
	 */
	public function getRegistered() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getRegistered', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getRegistered', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_language_id -> int(3)
	 * 
	 * @name getSystemLanguageId
	 * @return int
	 */
	public function getSystemLanguageId() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getSystemLanguageId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getSystemLanguageId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_templates_groups_id -> int(4) unsigned
	 * 
	 * @name getPagesTemplatesGroupsId
	 * @return int
	 */
	public function getPagesTemplatesGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getPagesTemplatesGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getPagesTemplatesGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of template -> longtext
	 * 
	 * @name getTemplate
	 * @return longtext
	 */
	public function getTemplate() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getTemplate', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getTemplate', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set PagesTemplatesRevisionsModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesTemplatesRevisionsModel::getNote', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesTemplatesRevisionsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesTemplatesRevisionsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_templates_revisions
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesTemplatesRevisionsModel());
	}
	
	/**
	 * Select one item function from table pages_templates_revisions
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
		$ret = DbModel::doSelect($conn, new PagesTemplatesRevisionsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesTemplatesRevisionsModel')) return $ret[0];
		else {
			$class = new PagesTemplatesRevisionsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_templates_revisions
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesTemplatesRevisionsModel());
	}
	
	/**
	 * Basic pager function from table pages_templates_revisions
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
		return DbModel::doPager($conn, new PagesTemplatesRevisionsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_templates_revisions
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
		return (int) DbModel::doAffected($conn, new PagesTemplatesRevisionsModel());
	}
	
	/**
	 * Basic update function for table pages_templates_revisions
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
		$af = (int) DbModel::doAffected($conn, new PagesTemplatesRevisionsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_templates_revisions
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
		return (int) DbModel::doInsert($conn, new PagesTemplatesRevisionsModel());
	}
	
	/**
	 * Basic reader create function from table pages_templates_revisions
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_templates_revisions
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
	 * Drop table function for table pages_templates_revisions
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