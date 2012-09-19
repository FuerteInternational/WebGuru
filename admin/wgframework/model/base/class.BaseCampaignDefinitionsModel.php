<?php
/**
 * Database class for table campaign_definitions
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/campaign_definitions
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        12. November 2009 17:04:01
 */

class BaseCampaignDefinitionsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'campaign_definitions';
	
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
	 * id -> bigint(20) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`campaign_definitions`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`campaign_definitions`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`campaign_definitions`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * minchar -> int(11)
	 */
	const FULL_MINCHAR = '`campaign_definitions`.`minchar`';
	
	const COL_MINCHAR = 'minchar';
	
	/**
	 * maxchar -> int(11)
	 */
	const FULL_MAXCHAR = '`campaign_definitions`.`maxchar`';
	
	const COL_MAXCHAR = 'maxchar';
	
	/**
	 * campaign_pages_id -> int(11) unsigned
	 */
	const FULL_CAMPAIGN_PAGES_ID = '`campaign_definitions`.`campaign_pages_id`';
	
	const COL_CAMPAIGN_PAGES_ID = 'campaign_pages_id';
	
	/**
	 * isglobal -> tinyint(1) unsigned
	 */
	const FULL_ISGLOBAL = '`campaign_definitions`.`isglobal`';
	
	const COL_ISGLOBAL = 'isglobal';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`campaign_definitions`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	/**
	 * default_campaign_languages_id -> int(11) unsigned
	 */
	const FULL_DEFAULT_CAMPAIGN_LANGUAGES_ID = '`campaign_definitions`.`default_campaign_languages_id`';
	
	const COL_DEFAULT_CAMPAIGN_LANGUAGES_ID = 'default_campaign_languages_id';
	
	/**
	 * default_text -> text
	 */
	const FULL_DEFAULT_TEXT = '`campaign_definitions`.`default_text`';
	
	const COL_DEFAULT_TEXT = 'default_text';
	
	/**
	 * allowhtml -> tinyint(1) unsigned
	 */
	const FULL_ALLOWHTML = '`campaign_definitions`.`allowhtml`';
	
	const COL_ALLOWHTML = 'allowhtml';
	
	/**
	 * previewfrom -> int(11)
	 */
	const FULL_PREVIEWFROM = '`campaign_definitions`.`previewfrom`';
	
	const COL_PREVIEWFROM = 'previewfrom';
	
	/**
	 * previewto -> int(11)
	 */
	const FULL_PREVIEWTO = '`campaign_definitions`.`previewto`';
	
	const COL_PREVIEWTO = 'previewto';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`campaign_definitions`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `campaign_definitions`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Minchar'=>2, 'Maxchar'=>3, 'CampaignPagesId'=>4, 'Isglobal'=>5, 'Enabled'=>6, 'DefaultCampaignLanguagesId'=>7, 'DefaultText'=>8, 'Allowhtml'=>9, 'Previewfrom'=>10, 'Previewto'=>11);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`campaign_definitions`.`Id`'=>0, '`campaign_definitions`.`Name`'=>1, '`campaign_definitions`.`Minchar`'=>2, '`campaign_definitions`.`Maxchar`'=>3, '`campaign_definitions`.`CampaignPagesId`'=>4, '`campaign_definitions`.`Isglobal`'=>5, '`campaign_definitions`.`Enabled`'=>6, '`campaign_definitions`.`DefaultCampaignLanguagesId`'=>7, '`campaign_definitions`.`DefaultText`'=>8, '`campaign_definitions`.`Allowhtml`'=>9, '`campaign_definitions`.`Previewfrom`'=>10, '`campaign_definitions`.`Previewto`'=>11);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'minchar'=>2, 'maxchar'=>3, 'campaign_pages_id'=>4, 'isglobal'=>5, 'enabled'=>6, 'default_campaign_languages_id'=>7, 'default_text'=>8, 'allowhtml'=>9, 'previewfrom'=>10, 'previewto'=>11);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'minchar', 'maxchar', 'campaign_pages_id', 'isglobal', 'enabled', 'default_campaign_languages_id', 'default_text', 'allowhtml', 'previewfrom', 'previewto');
	
	
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
			throw new WgException("CampaignDefinitions could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelCampaignDefinitions::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('CampaignDefinitionsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CampaignDefinitionsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('CampaignDefinitionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('CampaignDefinitionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in CampaignDefinitionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in CampaignDefinitionsModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> bigint(20) unsigned
	 * 
	 * @name getId
	 * @return bigint
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of minchar -> int(11)
	 * 
	 * @name getMinchar
	 * @return int
	 */
	public function getMinchar() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getMinchar', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getMinchar', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of maxchar -> int(11)
	 * 
	 * @name getMaxchar
	 * @return int
	 */
	public function getMaxchar() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getMaxchar', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getMaxchar', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of campaign_pages_id -> int(11) unsigned
	 * 
	 * @name getCampaignPagesId
	 * @return int
	 */
	public function getCampaignPagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getCampaignPagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getCampaignPagesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of isglobal -> tinyint(1) unsigned
	 * 
	 * @name getIsglobal
	 * @return tinyint
	 */
	public function getIsglobal() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getIsglobal', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getIsglobal', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getEnabled', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of default_campaign_languages_id -> int(11) unsigned
	 * 
	 * @name getDefaultCampaignLanguagesId
	 * @return int
	 */
	public function getDefaultCampaignLanguagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getDefaultCampaignLanguagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getDefaultCampaignLanguagesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of default_text -> text
	 * 
	 * @name getDefaultText
	 * @return text
	 */
	public function getDefaultText() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getDefaultText', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getDefaultText', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of allowhtml -> tinyint(1) unsigned
	 * 
	 * @name getAllowhtml
	 * @return tinyint
	 */
	public function getAllowhtml() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getAllowhtml', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getAllowhtml', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of previewfrom -> int(11)
	 * 
	 * @name getPreviewfrom
	 * @return int
	 */
	public function getPreviewfrom() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getPreviewfrom', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getPreviewfrom', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of previewto -> int(11)
	 * 
	 * @name getPreviewto
	 * @return int
	 */
	public function getPreviewto() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set CampaignDefinitionsModel::getPreviewto', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From CampaignDefinitionsModel::getPreviewto', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: CampaignDefinitionsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: CampaignDefinitionsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table campaign_definitions
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new CampaignDefinitionsModel());
	}
	
	/**
	 * Select one item function from table campaign_definitions
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
		$ret = DbModel::doSelect($conn, new CampaignDefinitionsModel());
		if (isset($ret[0]) && is_a($ret[0], 'CampaignDefinitionsModel')) return $ret[0];
		else {
			$class = new CampaignDefinitionsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table campaign_definitions
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new CampaignDefinitionsModel());
	}
	
	/**
	 * Basic pager function from table campaign_definitions
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
		return DbModel::doPager($conn, new CampaignDefinitionsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table campaign_definitions
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
		return (int) DbModel::doAffected($conn, new CampaignDefinitionsModel());
	}
	
	/**
	 * Basic update function for table campaign_definitions
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
		$af = (int) DbModel::doAffected($conn, new CampaignDefinitionsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table campaign_definitions
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
		return (int) DbModel::doInsert($conn, new CampaignDefinitionsModel());
	}
	
	/**
	 * Basic reader create function from table campaign_definitions
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table campaign_definitions
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
	 * Drop table function for table campaign_definitions
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