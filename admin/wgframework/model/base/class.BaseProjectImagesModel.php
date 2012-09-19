<?php
/**
 * Database class for table project_images
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/project_images
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        15. June 2009 17:46:50
 */

class BaseProjectImagesModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'project_images';
	
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
	
	const FULL_PRIMARY_KEY = '`project_images`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`project_images`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`project_images`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`project_images`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * filename -> varchar(255)
	 */
	const FULL_FILENAME = '`project_images`.`filename`';
	
	const COL_FILENAME = 'filename';
	
	/**
	 * type -> varchar(20)
	 */
	const FULL_TYPE = '`project_images`.`type`';
	
	const COL_TYPE = 'type';
	
	/**
	 * h1 -> varchar(255)
	 */
	const FULL_H1 = '`project_images`.`h1`';
	
	const COL_H1 = 'h1';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`project_images`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * mdescription -> text
	 */
	const FULL_MDESCRIPTION = '`project_images`.`mdescription`';
	
	const COL_MDESCRIPTION = 'mdescription';
	
	/**
	 * mkeywords -> text
	 */
	const FULL_MKEYWORDS = '`project_images`.`mkeywords`';
	
	const COL_MKEYWORDS = 'mkeywords';
	
	/**
	 * h2 -> varchar(255)
	 */
	const FULL_H2 = '`project_images`.`h2`';
	
	const COL_H2 = 'h2';
	
	/**
	 * h3 -> varchar(255)
	 */
	const FULL_H3 = '`project_images`.`h3`';
	
	const COL_H3 = 'h3';
	
	/**
	 * text1 -> text
	 */
	const FULL_TEXT1 = '`project_images`.`text1`';
	
	const COL_TEXT1 = 'text1';
	
	/**
	 * text2 -> text
	 */
	const FULL_TEXT2 = '`project_images`.`text2`';
	
	const COL_TEXT2 = 'text2';
	
	/**
	 * text3 -> text
	 */
	const FULL_TEXT3 = '`project_images`.`text3`';
	
	const COL_TEXT3 = 'text3';
	
	/**
	 * text4 -> text
	 */
	const FULL_TEXT4 = '`project_images`.`text4`';
	
	const COL_TEXT4 = 'text4';
	
	/**
	 * views -> bigint(20)
	 */
	const FULL_VIEWS = '`project_images`.`views`';
	
	const COL_VIEWS = 'views';
	
	/**
	 * downloads -> bigint(20)
	 */
	const FULL_DOWNLOADS = '`project_images`.`downloads`';
	
	const COL_DOWNLOADS = 'downloads';
	
	/**
	 * size -> int(11)
	 */
	const FULL_SIZE = '`project_images`.`size`';
	
	const COL_SIZE = 'size';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`project_images`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `project_images`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Filename'=>3, 'Type'=>4, 'H1'=>5, 'Title'=>6, 'Mdescription'=>7, 'Mkeywords'=>8, 'H2'=>9, 'H3'=>10, 'Text1'=>11, 'Text2'=>12, 'Text3'=>13, 'Text4'=>14, 'Views'=>15, 'Downloads'=>16, 'Size'=>17);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`project_images`.`Id`'=>0, '`project_images`.`Name`'=>1, '`project_images`.`Identifier`'=>2, '`project_images`.`Filename`'=>3, '`project_images`.`Type`'=>4, '`project_images`.`H1`'=>5, '`project_images`.`Title`'=>6, '`project_images`.`Mdescription`'=>7, '`project_images`.`Mkeywords`'=>8, '`project_images`.`H2`'=>9, '`project_images`.`H3`'=>10, '`project_images`.`Text1`'=>11, '`project_images`.`Text2`'=>12, '`project_images`.`Text3`'=>13, '`project_images`.`Text4`'=>14, '`project_images`.`Views`'=>15, '`project_images`.`Downloads`'=>16, '`project_images`.`Size`'=>17);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'filename'=>3, 'type'=>4, 'h1'=>5, 'title'=>6, 'mdescription'=>7, 'mkeywords'=>8, 'h2'=>9, 'h3'=>10, 'text1'=>11, 'text2'=>12, 'text3'=>13, 'text4'=>14, 'views'=>15, 'downloads'=>16, 'size'=>17);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'filename', 'type', 'h1', 'title', 'mdescription', 'mkeywords', 'h2', 'h3', 'text1', 'text2', 'text3', 'text4', 'views', 'downloads', 'size');
	
	
	protected $_result = array();
	
	protected $_query  = NULL;
	
	protected $_data   = array();
	
	
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
			throw new WgException("ProjectImages could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelProjectImages::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('ProjectImagesModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('ProjectImagesModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectImagesModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set ProjectImagesModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set ProjectImagesModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of filename -> varchar(255)
	 * 
	 * @name getFilename
	 * @return varchar
	 */
	public function getFilename() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set ProjectImagesModel::getFilename', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getFilename', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of type -> varchar(20)
	 * 
	 * @name getType
	 * @return varchar
	 */
	public function getType() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set ProjectImagesModel::getType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h1 -> varchar(255)
	 * 
	 * @name getH1
	 * @return varchar
	 */
	public function getH1() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set ProjectImagesModel::getH1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getH1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set ProjectImagesModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mdescription -> text
	 * 
	 * @name getMdescription
	 * @return text
	 */
	public function getMdescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set ProjectImagesModel::getMdescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getMdescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of mkeywords -> text
	 * 
	 * @name getMkeywords
	 * @return text
	 */
	public function getMkeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set ProjectImagesModel::getMkeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getMkeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h2 -> varchar(255)
	 * 
	 * @name getH2
	 * @return varchar
	 */
	public function getH2() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set ProjectImagesModel::getH2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getH2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of h3 -> varchar(255)
	 * 
	 * @name getH3
	 * @return varchar
	 */
	public function getH3() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set ProjectImagesModel::getH3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getH3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text1 -> text
	 * 
	 * @name getText1
	 * @return text
	 */
	public function getText1() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set ProjectImagesModel::getText1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getText1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text2 -> text
	 * 
	 * @name getText2
	 * @return text
	 */
	public function getText2() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set ProjectImagesModel::getText2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getText2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text3 -> text
	 * 
	 * @name getText3
	 * @return text
	 */
	public function getText3() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set ProjectImagesModel::getText3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getText3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of text4 -> text
	 * 
	 * @name getText4
	 * @return text
	 */
	public function getText4() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set ProjectImagesModel::getText4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getText4', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views -> bigint(20)
	 * 
	 * @name getViews
	 * @return bigint
	 */
	public function getViews() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set ProjectImagesModel::getViews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getViews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of downloads -> bigint(20)
	 * 
	 * @name getDownloads
	 * @return bigint
	 */
	public function getDownloads() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set ProjectImagesModel::getDownloads', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getDownloads', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of size -> int(11)
	 * 
	 * @name getSize
	 * @return int
	 */
	public function getSize() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set ProjectImagesModel::getSize', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From ProjectImagesModel::getSize', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: ProjectImagesModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: ProjectImagesModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table project_images
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME);
		return DbModel::doSelect($conn, new ProjectImagesModel());
	}
	
	/**
	 * Select one item function from table project_images
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
		$ret = DbModel::doSelect($conn, new ProjectImagesModel());
		if (isset($ret[0]) && is_a($ret[0], 'ProjectImagesModel')) return $ret[0];
		else {
			$class = new ProjectImagesModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table project_images
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new ProjectImagesModel());
	}
	
	/**
	 * Basic pager function from table project_images
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
		return DbModel::doPager($conn, new ProjectImagesModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table project_images
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
		return (int) DbModel::doAffected($conn, new ProjectImagesModel());
	}
	
	/**
	 * Basic update function for table project_images
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
		$af = (int) DbModel::doAffected($conn, new ProjectImagesModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table project_images
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
		return (int) DbModel::doInsert($conn, new ProjectImagesModel());
	}
	
	/**
	 * Basic reader create function from table project_images
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table project_images
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
	 * Drop table function for table project_images
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