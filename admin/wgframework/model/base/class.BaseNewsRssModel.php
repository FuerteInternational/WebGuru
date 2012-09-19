<?php
/**
 * Database class for table news_rss
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/news_rss
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:26
 */

class BaseNewsRssModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'news_rss';
	
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
	 * id -> int(8) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`news_rss`.`id`';
	
	/**
	 * id -> int(8) unsigned
	 */
	const FULL_ID = '`news_rss`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`news_rss`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`news_rss`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * version -> tinyint(1) unsigned
	 */
	const FULL_VERSION = '`news_rss`.`version`';
	
	const COL_VERSION = 'version';
	
	/**
	 * news_categories_id -> int(8) unsigned
	 */
	const FULL_NEWS_CATEGORIES_ID = '`news_rss`.`news_categories_id`';
	
	const COL_NEWS_CATEGORIES_ID = 'news_categories_id';
	
	/**
	 * showitems -> int(4) unsigned
	 */
	const FULL_SHOWITEMS = '`news_rss`.`showitems`';
	
	const COL_SHOWITEMS = 'showitems';
	
	/**
	 * link -> varchar(255)
	 */
	const FULL_LINK = '`news_rss`.`link`';
	
	const COL_LINK = 'link';
	
	/**
	 * folder -> varchar(255)
	 */
	const FULL_FOLDER = '`news_rss`.`folder`';
	
	const COL_FOLDER = 'folder';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`news_rss`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * displaylanguage -> varchar(30)
	 */
	const FULL_DISPLAYLANGUAGE = '`news_rss`.`displaylanguage`';
	
	const COL_DISPLAYLANGUAGE = 'displaylanguage';
	
	/**
	 * copyright -> text
	 */
	const FULL_COPYRIGHT = '`news_rss`.`copyright`';
	
	const COL_COPYRIGHT = 'copyright';
	
	/**
	 * ttl -> int(4) unsigned
	 */
	const FULL_TTL = '`news_rss`.`ttl`';
	
	const COL_TTL = 'ttl';
	
	/**
	 * image -> varchar(255)
	 */
	const FULL_IMAGE = '`news_rss`.`image`';
	
	const COL_IMAGE = 'image';
	
	/**
	 * imagetitle -> varchar(255)
	 */
	const FULL_IMAGETITLE = '`news_rss`.`imagetitle`';
	
	const COL_IMAGETITLE = 'imagetitle';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`news_rss`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `news_rss`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'Name'=>1, 'Identifier'=>2, 'Version'=>3, 'NewsCategoriesId'=>4, 'Showitems'=>5, 'Link'=>6, 'Folder'=>7, 'Description'=>8, 'Displaylanguage'=>9, 'Copyright'=>10, 'Ttl'=>11, 'Image'=>12, 'Imagetitle'=>13);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`news_rss`.`Id`'=>0, '`news_rss`.`Name`'=>1, '`news_rss`.`Identifier`'=>2, '`news_rss`.`Version`'=>3, '`news_rss`.`NewsCategoriesId`'=>4, '`news_rss`.`Showitems`'=>5, '`news_rss`.`Link`'=>6, '`news_rss`.`Folder`'=>7, '`news_rss`.`Description`'=>8, '`news_rss`.`Displaylanguage`'=>9, '`news_rss`.`Copyright`'=>10, '`news_rss`.`Ttl`'=>11, '`news_rss`.`Image`'=>12, '`news_rss`.`Imagetitle`'=>13);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'name'=>1, 'identifier'=>2, 'version'=>3, 'news_categories_id'=>4, 'showitems'=>5, 'link'=>6, 'folder'=>7, 'description'=>8, 'displaylanguage'=>9, 'copyright'=>10, 'ttl'=>11, 'image'=>12, 'imagetitle'=>13);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'name', 'identifier', 'version', 'news_categories_id', 'showitems', 'link', 'folder', 'description', 'displaylanguage', 'copyright', 'ttl', 'image', 'imagetitle');
	
	
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
			throw new WgException("NewsRss could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelNewsRss::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('NewsRssModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsRssModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('NewsRssModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('NewsRssModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in NewsRssModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in NewsRssModel::getFieldByName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of id -> int(8) unsigned
	 * 
	 * @name getId
	 * @return int
	 */
	public function getId() {
		if ((bool) $this->_result) {
			if (array_key_exists(0, $this->_result)) return (string) $this->_result[0];
			else parent::throwGetColException('Not set NewsRssModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getId', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsRssModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set NewsRssModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of version -> tinyint(1) unsigned
	 * 
	 * @name getVersion
	 * @return tinyint
	 */
	public function getVersion() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set NewsRssModel::getVersion', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getVersion', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of news_categories_id -> int(8) unsigned
	 * 
	 * @name getNewsCategoriesId
	 * @return int
	 */
	public function getNewsCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set NewsRssModel::getNewsCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getNewsCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of showitems -> int(4) unsigned
	 * 
	 * @name getShowitems
	 * @return int
	 */
	public function getShowitems() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set NewsRssModel::getShowitems', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getShowitems', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of link -> varchar(255)
	 * 
	 * @name getLink
	 * @return varchar
	 */
	public function getLink() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set NewsRssModel::getLink', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getLink', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of folder -> varchar(255)
	 * 
	 * @name getFolder
	 * @return varchar
	 */
	public function getFolder() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set NewsRssModel::getFolder', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getFolder', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set NewsRssModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of displaylanguage -> varchar(30)
	 * 
	 * @name getDisplaylanguage
	 * @return varchar
	 */
	public function getDisplaylanguage() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set NewsRssModel::getDisplaylanguage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getDisplaylanguage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of copyright -> text
	 * 
	 * @name getCopyright
	 * @return text
	 */
	public function getCopyright() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set NewsRssModel::getCopyright', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getCopyright', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of ttl -> int(4) unsigned
	 * 
	 * @name getTtl
	 * @return int
	 */
	public function getTtl() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set NewsRssModel::getTtl', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getTtl', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of image -> varchar(255)
	 * 
	 * @name getImage
	 * @return varchar
	 */
	public function getImage() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set NewsRssModel::getImage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getImage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of imagetitle -> varchar(255)
	 * 
	 * @name getImagetitle
	 * @return varchar
	 */
	public function getImagetitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set NewsRssModel::getImagetitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From NewsRssModel::getImagetitle', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: NewsRssModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: NewsRssModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table news_rss
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new NewsRssModel());
	}
	
	/**
	 * Select one item function from table news_rss
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
		$ret = DbModel::doSelect($conn, new NewsRssModel());
		if (isset($ret[0]) && is_a($ret[0], 'NewsRssModel')) return $ret[0];
		else {
			$class = new NewsRssModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table news_rss
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new NewsRssModel());
	}
	
	/**
	 * Basic pager function from table news_rss
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
		return DbModel::doPager($conn, new NewsRssModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table news_rss
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
		return (int) DbModel::doAffected($conn, new NewsRssModel());
	}
	
	/**
	 * Basic update function for table news_rss
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
		$af = (int) DbModel::doAffected($conn, new NewsRssModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table news_rss
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
		return (int) DbModel::doInsert($conn, new NewsRssModel());
	}
	
	/**
	 * Basic reader create function from table news_rss
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table news_rss
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
	 * Drop table function for table news_rss
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