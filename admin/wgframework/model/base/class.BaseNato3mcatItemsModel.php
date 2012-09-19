<?php
/**
 * Database class for table nato3mcat_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/nato3mcat_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        26. November 2009 13:21:25
 */

class BaseNato3mcatItemsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'nato3mcat_items';
	
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
	
	const FULL_PRIMARY_KEY = '`nato3mcat_items`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`nato3mcat_items`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * bigb -> varchar(255)
	 */
	const FULL_BIGB = '`nato3mcat_items`.`bigb`';
	
	const COL_BIGB = 'bigb';
	
	/**
	 * smallb -> varchar(255)
	 */
	const FULL_SMALLB = '`nato3mcat_items`.`smallb`';
	
	const COL_SMALLB = 'smallb';
	
	/**
	 * niin -> int(11) unsigned
	 */
	const FULL_NIIN = '`nato3mcat_items`.`niin`';
	
	const COL_NIIN = 'niin';
	
	/**
	 * market -> varchar(255)
	 */
	const FULL_MARKET = '`nato3mcat_items`.`market`';
	
	const COL_MARKET = 'market';
	
	/**
	 * clasification -> varchar(255)
	 */
	const FULL_CLASIFICATION = '`nato3mcat_items`.`clasification`';
	
	const COL_CLASIFICATION = 'clasification';
	
	/**
	 * item_type -> varchar(255)
	 */
	const FULL_ITEM_TYPE = '`nato3mcat_items`.`item_type`';
	
	const COL_ITEM_TYPE = 'item_type';
	
	/**
	 * description -> varchar(255)
	 */
	const FULL_DESCRIPTION = '`nato3mcat_items`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * common_ref_name -> varchar(255)
	 */
	const FULL_COMMON_REF_NAME = '`nato3mcat_items`.`common_ref_name`';
	
	const COL_COMMON_REF_NAME = 'common_ref_name';
	
	/**
	 * common_description -> text
	 */
	const FULL_COMMON_DESCRIPTION = '`nato3mcat_items`.`common_description`';
	
	const COL_COMMON_DESCRIPTION = 'common_description';
	
	/**
	 * nato_item_name -> varchar(255)
	 */
	const FULL_NATO_ITEM_NAME = '`nato3mcat_items`.`nato_item_name`';
	
	const COL_NATO_ITEM_NAME = 'nato_item_name';
	
	/**
	 * nato_description -> text
	 */
	const FULL_NATO_DESCRIPTION = '`nato3mcat_items`.`nato_description`';
	
	const COL_NATO_DESCRIPTION = 'nato_description';
	
	/**
	 * length -> varchar(11)
	 */
	const FULL_LENGTH = '`nato3mcat_items`.`length`';
	
	const COL_LENGTH = 'length';
	
	/**
	 * length_unit -> varchar(20)
	 */
	const FULL_LENGTH_UNIT = '`nato3mcat_items`.`length_unit`';
	
	const COL_LENGTH_UNIT = 'length_unit';
	
	/**
	 * width -> varchar(11)
	 */
	const FULL_WIDTH = '`nato3mcat_items`.`width`';
	
	const COL_WIDTH = 'width';
	
	/**
	 * width_unit -> varchar(20)
	 */
	const FULL_WIDTH_UNIT = '`nato3mcat_items`.`width_unit`';
	
	const COL_WIDTH_UNIT = 'width_unit';
	
	/**
	 * height -> varchar(11)
	 */
	const FULL_HEIGHT = '`nato3mcat_items`.`height`';
	
	const COL_HEIGHT = 'height';
	
	/**
	 * height_unit -> varchar(20)
	 */
	const FULL_HEIGHT_UNIT = '`nato3mcat_items`.`height_unit`';
	
	const COL_HEIGHT_UNIT = 'height_unit';
	
	/**
	 * volume_weight -> varchar(11)
	 */
	const FULL_VOLUME_WEIGHT = '`nato3mcat_items`.`volume_weight`';
	
	const COL_VOLUME_WEIGHT = 'volume_weight';
	
	/**
	 * volume_weight_unit -> varchar(20)
	 */
	const FULL_VOLUME_WEIGHT_UNIT = '`nato3mcat_items`.`volume_weight_unit`';
	
	const COL_VOLUME_WEIGHT_UNIT = 'volume_weight_unit';
	
	/**
	 * diameter -> varchar(11)
	 */
	const FULL_DIAMETER = '`nato3mcat_items`.`diameter`';
	
	const COL_DIAMETER = 'diameter';
	
	/**
	 * diameter_unit -> varchar(20)
	 */
	const FULL_DIAMETER_UNIT = '`nato3mcat_items`.`diameter_unit`';
	
	const COL_DIAMETER_UNIT = 'diameter_unit';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`nato3mcat_items`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `nato3mcat_items`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Bigb'=>1, 'Smallb'=>2, 'Niin'=>3, 'Market'=>4, 'Clasification'=>5, 'ItemType'=>6, 'Description'=>7, 'CommonRefName'=>8, 'CommonDescription'=>9, 'NatoItemName'=>10, 'NatoDescription'=>11, 'Length'=>12, 'LengthUnit'=>13, 'Width'=>14, 'WidthUnit'=>15, 'Height'=>16, 'HeightUnit'=>17, 'VolumeWeight'=>18, 'VolumeWeightUnit'=>19, 'Diameter'=>20, 'DiameterUnit'=>21);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`nato3mcat_items`.`Id`'=>0, '`nato3mcat_items`.`Bigb`'=>1, '`nato3mcat_items`.`Smallb`'=>2, '`nato3mcat_items`.`Niin`'=>3, '`nato3mcat_items`.`Market`'=>4, '`nato3mcat_items`.`Clasification`'=>5, '`nato3mcat_items`.`ItemType`'=>6, '`nato3mcat_items`.`Description`'=>7, '`nato3mcat_items`.`CommonRefName`'=>8, '`nato3mcat_items`.`CommonDescription`'=>9, '`nato3mcat_items`.`NatoItemName`'=>10, '`nato3mcat_items`.`NatoDescription`'=>11, '`nato3mcat_items`.`Length`'=>12, '`nato3mcat_items`.`LengthUnit`'=>13, '`nato3mcat_items`.`Width`'=>14, '`nato3mcat_items`.`WidthUnit`'=>15, '`nato3mcat_items`.`Height`'=>16, '`nato3mcat_items`.`HeightUnit`'=>17, '`nato3mcat_items`.`VolumeWeight`'=>18, '`nato3mcat_items`.`VolumeWeightUnit`'=>19, '`nato3mcat_items`.`Diameter`'=>20, '`nato3mcat_items`.`DiameterUnit`'=>21);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'bigb'=>1, 'smallb'=>2, 'niin'=>3, 'market'=>4, 'clasification'=>5, 'item_type'=>6, 'description'=>7, 'common_ref_name'=>8, 'common_description'=>9, 'nato_item_name'=>10, 'nato_description'=>11, 'length'=>12, 'length_unit'=>13, 'width'=>14, 'width_unit'=>15, 'height'=>16, 'height_unit'=>17, 'volume_weight'=>18, 'volume_weight_unit'=>19, 'diameter'=>20, 'diameter_unit'=>21);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'bigb', 'smallb', 'niin', 'market', 'clasification', 'item_type', 'description', 'common_ref_name', 'common_description', 'nato_item_name', 'nato_description', 'length', 'length_unit', 'width', 'width_unit', 'height', 'height_unit', 'volume_weight', 'volume_weight_unit', 'diameter', 'diameter_unit');
	
	
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
			throw new WgException("Nato3mcatItems could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNato3mcatItems::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('Nato3mcatItemsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('Nato3mcatItemsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('Nato3mcatItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('Nato3mcatItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in Nato3mcatItemsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in Nato3mcatItemsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of bigb -> varchar(255)
	 * 
	 * @name getBigb
	 * @return varchar
	 */
	public function getBigb() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getBigb', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getBigb', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of smallb -> varchar(255)
	 * 
	 * @name getSmallb
	 * @return varchar
	 */
	public function getSmallb() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getSmallb', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getSmallb', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of niin -> int(11) unsigned
	 * 
	 * @name getNiin
	 * @return int
	 */
	public function getNiin() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getNiin', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getNiin', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of market -> varchar(255)
	 * 
	 * @name getMarket
	 * @return varchar
	 */
	public function getMarket() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getMarket', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getMarket', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of clasification -> varchar(255)
	 * 
	 * @name getClasification
	 * @return varchar
	 */
	public function getClasification() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getClasification', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getClasification', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of item_type -> varchar(255)
	 * 
	 * @name getItemType
	 * @return varchar
	 */
	public function getItemType() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getItemType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getItemType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> varchar(255)
	 * 
	 * @name getDescription
	 * @return varchar
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of common_ref_name -> varchar(255)
	 * 
	 * @name getCommonRefName
	 * @return varchar
	 */
	public function getCommonRefName() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getCommonRefName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getCommonRefName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of common_description -> text
	 * 
	 * @name getCommonDescription
	 * @return text
	 */
	public function getCommonDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getCommonDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getCommonDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nato_item_name -> varchar(255)
	 * 
	 * @name getNatoItemName
	 * @return varchar
	 */
	public function getNatoItemName() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getNatoItemName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getNatoItemName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of nato_description -> text
	 * 
	 * @name getNatoDescription
	 * @return text
	 */
	public function getNatoDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getNatoDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getNatoDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of length -> varchar(11)
	 * 
	 * @name getLength
	 * @return varchar
	 */
	public function getLength() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getLength', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getLength', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of length_unit -> varchar(20)
	 * 
	 * @name getLengthUnit
	 * @return varchar
	 */
	public function getLengthUnit() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getLengthUnit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getLengthUnit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of width -> varchar(11)
	 * 
	 * @name getWidth
	 * @return varchar
	 */
	public function getWidth() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getWidth', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getWidth', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of width_unit -> varchar(20)
	 * 
	 * @name getWidthUnit
	 * @return varchar
	 */
	public function getWidthUnit() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getWidthUnit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getWidthUnit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of height -> varchar(11)
	 * 
	 * @name getHeight
	 * @return varchar
	 */
	public function getHeight() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getHeight', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getHeight', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of height_unit -> varchar(20)
	 * 
	 * @name getHeightUnit
	 * @return varchar
	 */
	public function getHeightUnit() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getHeightUnit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getHeightUnit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of volume_weight -> varchar(11)
	 * 
	 * @name getVolumeWeight
	 * @return varchar
	 */
	public function getVolumeWeight() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getVolumeWeight', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getVolumeWeight', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of volume_weight_unit -> varchar(20)
	 * 
	 * @name getVolumeWeightUnit
	 * @return varchar
	 */
	public function getVolumeWeightUnit() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getVolumeWeightUnit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getVolumeWeightUnit', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of diameter -> varchar(11)
	 * 
	 * @name getDiameter
	 * @return varchar
	 */
	public function getDiameter() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getDiameter', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getDiameter', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of diameter_unit -> varchar(20)
	 * 
	 * @name getDiameterUnit
	 * @return varchar
	 */
	public function getDiameterUnit() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set Nato3mcatItemsModel::getDiameterUnit', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From Nato3mcatItemsModel::getDiameterUnit', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: Nato3mcatItemsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: Nato3mcatItemsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table nato3mcat_items
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new Nato3mcatItemsModel());
	}
	
	/**
	 * Select one item function from table nato3mcat_items
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
		$ret = DbModel::doSelect($conn, new Nato3mcatItemsModel());
		if (isset($ret[0]) && is_a($ret[0], 'Nato3mcatItemsModel')) return $ret[0];
		else {
			$class = new Nato3mcatItemsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table nato3mcat_items
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new Nato3mcatItemsModel());
	}
	
	/**
	 * Basic pager function from table nato3mcat_items
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
		return DbModel::doPager($conn, new Nato3mcatItemsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table nato3mcat_items
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
		return (int) DbModel::doAffected($conn, new Nato3mcatItemsModel());
	}
	
	/**
	 * Basic update function for table nato3mcat_items
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
		$af = (int) DbModel::doAffected($conn, new Nato3mcatItemsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table nato3mcat_items
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
		return (int) DbModel::doInsert($conn, new Nato3mcatItemsModel());
	}
	
	/**
	 * Basic reader create function from table nato3mcat_items
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table nato3mcat_items
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
	 * Drop table function for table nato3mcat_items
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