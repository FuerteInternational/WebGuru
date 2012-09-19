<?php
/**
 * Database class for table discuss_templates
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/discuss_templates
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseDiscussTemplatesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'discuss_templates';
	
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
	 * id_dm -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id_dm';
	
	const FULL_PRIMARY_KEY = '`discuss_templates`.`id_dm`';
	
	/**
	 * id_dm -> int(8) unsigned
	 */
	const FULL_ID_DM = '`discuss_templates`.`id_dm`';
	
	const COL_ID_DM = 'id_dm';
	
	/**
	 * name_dm -> varchar(255)
	 */
	const FULL_NAME_DM = '`discuss_templates`.`name_dm`';
	
	const COL_NAME_DM = 'name_dm';
	
	/**
	 * identifier_dm -> varchar(255)
	 */
	const FULL_IDENTIFIER_DM = '`discuss_templates`.`identifier_dm`';
	
	const COL_IDENTIFIER_DM = 'identifier_dm';
	
	/**
	 * type_dm -> int(4) unsigned
	 */
	const FULL_TYPE_DM = '`discuss_templates`.`type_dm`';
	
	const COL_TYPE_DM = 'type_dm';
	
	/**
	 * dateformat_dm -> varchar(20)
	 */
	const FULL_DATEFORMAT_DM = '`discuss_templates`.`dateformat_dm`';
	
	const COL_DATEFORMAT_DM = 'dateformat_dm';
	
	/**
	 * dc_id_dm -> int(8) unsigned
	 */
	const FULL_DC_ID_DM = '`discuss_templates`.`dc_id_dm`';
	
	const COL_DC_ID_DM = 'dc_id_dm';
	
	/**
	 * seo_dm -> tinyint(1) unsigned
	 */
	const FULL_SEO_DM = '`discuss_templates`.`seo_dm`';
	
	const COL_SEO_DM = 'seo_dm';
	
	/**
	 * ispager_dm -> tinyint(1) unsigned
	 */
	const FULL_ISPAGER_DM = '`discuss_templates`.`ispager_dm`';
	
	const COL_ISPAGER_DM = 'ispager_dm';
	
	/**
	 * perpage_dm -> int(4) unsigned
	 */
	const FULL_PERPAGE_DM = '`discuss_templates`.`perpage_dm`';
	
	const COL_PERPAGE_DM = 'perpage_dm';
	
	/**
	 * begin_dm -> text
	 */
	const FULL_BEGIN_DM = '`discuss_templates`.`begin_dm`';
	
	const COL_BEGIN_DM = 'begin_dm';
	
	/**
	 * item_dm -> text
	 */
	const FULL_ITEM_DM = '`discuss_templates`.`item_dm`';
	
	const COL_ITEM_DM = 'item_dm';
	
	/**
	 * end_dm -> text
	 */
	const FULL_END_DM = '`discuss_templates`.`end_dm`';
	
	const COL_END_DM = 'end_dm';
	
	/**
	 * bbegin_dm -> text
	 */
	const FULL_BBEGIN_DM = '`discuss_templates`.`bbegin_dm`';
	
	const COL_BBEGIN_DM = 'bbegin_dm';
	
	/**
	 * bitem_dm -> text
	 */
	const FULL_BITEM_DM = '`discuss_templates`.`bitem_dm`';
	
	const COL_BITEM_DM = 'bitem_dm';
	
	/**
	 * bend_dm -> text
	 */
	const FULL_BEND_DM = '`discuss_templates`.`bend_dm`';
	
	const COL_BEND_DM = 'bend_dm';
	
	/**
	 * noitem_dm -> text
	 */
	const FULL_NOITEM_DM = '`discuss_templates`.`noitem_dm`';
	
	const COL_NOITEM_DM = 'noitem_dm';
	
	/**
	 * bnoitem_dm -> text
	 */
	const FULL_BNOITEM_DM = '`discuss_templates`.`bnoitem_dm`';
	
	const COL_BNOITEM_DM = 'bnoitem_dm';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`discuss_templates`.`id_dm`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `discuss_templates`.`id_dm`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('IdDm'=>0, 'NameDm'=>1, 'IdentifierDm'=>2, 'TypeDm'=>3, 'DateformatDm'=>4, 'DcIdDm'=>5, 'SeoDm'=>6, 'IspagerDm'=>7, 'PerpageDm'=>8, 'BeginDm'=>9, 'ItemDm'=>10, 'EndDm'=>11, 'BbeginDm'=>12, 'BitemDm'=>13, 'BendDm'=>14, 'NoitemDm'=>15, 'BnoitemDm'=>16);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`discuss_templates`.`IdDm`'=>0, '`discuss_templates`.`NameDm`'=>1, '`discuss_templates`.`IdentifierDm`'=>2, '`discuss_templates`.`TypeDm`'=>3, '`discuss_templates`.`DateformatDm`'=>4, '`discuss_templates`.`DcIdDm`'=>5, '`discuss_templates`.`SeoDm`'=>6, '`discuss_templates`.`IspagerDm`'=>7, '`discuss_templates`.`PerpageDm`'=>8, '`discuss_templates`.`BeginDm`'=>9, '`discuss_templates`.`ItemDm`'=>10, '`discuss_templates`.`EndDm`'=>11, '`discuss_templates`.`BbeginDm`'=>12, '`discuss_templates`.`BitemDm`'=>13, '`discuss_templates`.`BendDm`'=>14, '`discuss_templates`.`NoitemDm`'=>15, '`discuss_templates`.`BnoitemDm`'=>16);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id_dm'=>0, 'name_dm'=>1, 'identifier_dm'=>2, 'type_dm'=>3, 'dateformat_dm'=>4, 'dc_id_dm'=>5, 'seo_dm'=>6, 'ispager_dm'=>7, 'perpage_dm'=>8, 'begin_dm'=>9, 'item_dm'=>10, 'end_dm'=>11, 'bbegin_dm'=>12, 'bitem_dm'=>13, 'bend_dm'=>14, 'noitem_dm'=>15, 'bnoitem_dm'=>16);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id_dm', 'name_dm', 'identifier_dm', 'type_dm', 'dateformat_dm', 'dc_id_dm', 'seo_dm', 'ispager_dm', 'perpage_dm', 'begin_dm', 'item_dm', 'end_dm', 'bbegin_dm', 'bitem_dm', 'bend_dm', 'noitem_dm', 'bnoitem_dm');
	
	
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
			throw new WgException("DiscussTemplates could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelDiscussTemplates::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('DiscussTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussTemplatesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('DiscussTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('DiscussTemplatesModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in DiscussTemplatesModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in DiscussTemplatesModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id_dm -> int(8) unsigned
	 * 
	 * @name getIdDm
	 * @return int
	 */
	public function getIdDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getIdDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getIdDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name_dm -> varchar(255)
	 * 
	 * @name getNameDm
	 * @return varchar
	 */
	public function getNameDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getNameDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getNameDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier_dm -> varchar(255)
	 * 
	 * @name getIdentifierDm
	 * @return varchar
	 */
	public function getIdentifierDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getIdentifierDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getIdentifierDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type_dm -> int(4) unsigned
	 * 
	 * @name getTypeDm
	 * @return int
	 */
	public function getTypeDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getTypeDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getTypeDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dateformat_dm -> varchar(20)
	 * 
	 * @name getDateformatDm
	 * @return varchar
	 */
	public function getDateformatDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getDateformatDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getDateformatDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of dc_id_dm -> int(8) unsigned
	 * 
	 * @name getDcIdDm
	 * @return int
	 */
	public function getDcIdDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getDcIdDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getDcIdDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of seo_dm -> tinyint(1) unsigned
	 * 
	 * @name getSeoDm
	 * @return tinyint
	 */
	public function getSeoDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getSeoDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getSeoDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ispager_dm -> tinyint(1) unsigned
	 * 
	 * @name getIspagerDm
	 * @return tinyint
	 */
	public function getIspagerDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getIspagerDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getIspagerDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of perpage_dm -> int(4) unsigned
	 * 
	 * @name getPerpageDm
	 * @return int
	 */
	public function getPerpageDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getPerpageDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getPerpageDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of begin_dm -> text
	 * 
	 * @name getBeginDm
	 * @return text
	 */
	public function getBeginDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getBeginDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getBeginDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item_dm -> text
	 * 
	 * @name getItemDm
	 * @return text
	 */
	public function getItemDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getItemDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getItemDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of end_dm -> text
	 * 
	 * @name getEndDm
	 * @return text
	 */
	public function getEndDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getEndDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getEndDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of bbegin_dm -> text
	 * 
	 * @name getBbeginDm
	 * @return text
	 */
	public function getBbeginDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getBbeginDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getBbeginDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of bitem_dm -> text
	 * 
	 * @name getBitemDm
	 * @return text
	 */
	public function getBitemDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getBitemDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getBitemDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of bend_dm -> text
	 * 
	 * @name getBendDm
	 * @return text
	 */
	public function getBendDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getBendDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getBendDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of noitem_dm -> text
	 * 
	 * @name getNoitemDm
	 * @return text
	 */
	public function getNoitemDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getNoitemDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getNoitemDm', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of bnoitem_dm -> text
	 * 
	 * @name getBnoitemDm
	 * @return text
	 */
	public function getBnoitemDm() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set DiscussTemplatesModel::getBnoitemDm', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From DiscussTemplatesModel::getBnoitemDm', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: DiscussTemplatesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: DiscussTemplatesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table discuss_templates
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new DiscussTemplatesModel());
	}
	
	/**
	 * Select one item function from table discuss_templates
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
		$ret = DbModel::doSelect($conn, new DiscussTemplatesModel());
		if (isset($ret[0]) && is_a($ret[0], 'DiscussTemplatesModel')) return $ret[0];
		else {
			$class = new DiscussTemplatesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table discuss_templates
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new DiscussTemplatesModel());
	}
	
	/**
	 * Basic pager function from table discuss_templates
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
		return DbModel::doPager($conn, new DiscussTemplatesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table discuss_templates
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
		return (int) DbModel::doAffected($conn, new DiscussTemplatesModel());
	}
	
	/**
	 * Basic update function for table discuss_templates
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
		$af = (int) DbModel::doAffected($conn, new DiscussTemplatesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table discuss_templates
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
		return (int) DbModel::doInsert($conn, new DiscussTemplatesModel());
	}
	
	/**
	 * Basic reader create function from table discuss_templates
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table discuss_templates
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
	 * Drop table function for table discuss_templates
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