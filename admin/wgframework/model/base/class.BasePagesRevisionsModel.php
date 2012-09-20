<?php
/**
 * Database class for table pages_revisions
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/pages_revisions
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 18:38:56
 */

class BasePagesRevisionsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'pages_revisions';
	
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
	 * id -> int(11) unsigned
	 */
	const PRIMARY_KEY = 'id';
	
	const FULL_PRIMARY_KEY = '`pages_revisions`.`id`';
	
	/**
	 * id -> int(11) unsigned
	 */
	const FULL_ID = '`pages_revisions`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * pages_id -> int(11) unsigned
	 */
	const FULL_PAGES_ID = '`pages_revisions`.`pages_id`';
	
	const COL_PAGES_ID = 'pages_id';
	
	/**
	 * system_websites_id -> int(4)
	 */
	const FULL_SYSTEM_WEBSITES_ID = '`pages_revisions`.`system_websites_id`';
	
	const COL_SYSTEM_WEBSITES_ID = 'system_websites_id';
	
	/**
	 * revision -> int(11)
	 */
	const FULL_REVISION = '`pages_revisions`.`revision`';
	
	const COL_REVISION = 'revision';
	
	/**
	 * system_language_id -> int(3)
	 */
	const FULL_SYSTEM_LANGUAGE_ID = '`pages_revisions`.`system_language_id`';
	
	const COL_SYSTEM_LANGUAGE_ID = 'system_language_id';
	
	/**
	 * pages_templates_id -> int(11) unsigned
	 */
	const FULL_PAGES_TEMPLATES_ID = '`pages_revisions`.`pages_templates_id`';
	
	const COL_PAGES_TEMPLATES_ID = 'pages_templates_id';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`pages_revisions`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`pages_revisions`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`pages_revisions`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * heading1 -> varchar(255)
	 */
	const FULL_HEADING1 = '`pages_revisions`.`heading1`';
	
	const COL_HEADING1 = 'heading1';
	
	/**
	 * heading2 -> varchar(255)
	 */
	const FULL_HEADING2 = '`pages_revisions`.`heading2`';
	
	const COL_HEADING2 = 'heading2';
	
	/**
	 * heading3 -> varchar(255)
	 */
	const FULL_HEADING3 = '`pages_revisions`.`heading3`';
	
	const COL_HEADING3 = 'heading3';
	
	/**
	 * rewrite -> varchar(255)
	 */
	const FULL_REWRITE = '`pages_revisions`.`rewrite`';
	
	const COL_REWRITE = 'rewrite';
	
	/**
	 * keywords -> text
	 */
	const FULL_KEYWORDS = '`pages_revisions`.`keywords`';
	
	const COL_KEYWORDS = 'keywords';
	
	/**
	 * description -> text
	 */
	const FULL_DESCRIPTION = '`pages_revisions`.`description`';
	
	const COL_DESCRIPTION = 'description';
	
	/**
	 * addtext1 -> varchar(255)
	 */
	const FULL_ADDTEXT1 = '`pages_revisions`.`addtext1`';
	
	const COL_ADDTEXT1 = 'addtext1';
	
	/**
	 * addtext2 -> varchar(255)
	 */
	const FULL_ADDTEXT2 = '`pages_revisions`.`addtext2`';
	
	const COL_ADDTEXT2 = 'addtext2';
	
	/**
	 * enabled -> tinyint(1) unsigned
	 */
	const FULL_ENABLED = '`pages_revisions`.`enabled`';
	
	const COL_ENABLED = 'enabled';
	
	/**
	 * parentid -> int(10) unsigned
	 */
	const FULL_PARENTID = '`pages_revisions`.`parentid`';
	
	const COL_PARENTID = 'parentid';
	
	/**
	 * sort -> int(8) unsigned
	 */
	const FULL_SORT = '`pages_revisions`.`sort`';
	
	const COL_SORT = 'sort';
	
	/**
	 * head -> text
	 */
	const FULL_HEAD = '`pages_revisions`.`head`';
	
	const COL_HEAD = 'head';
	
	/**
	 * page -> longtext
	 */
	const FULL_PAGE = '`pages_revisions`.`page`';
	
	const COL_PAGE = 'page';
	
	/**
	 * note -> text
	 */
	const FULL_NOTE = '`pages_revisions`.`note`';
	
	const COL_NOTE = 'note';
	
	/**
	 * redirect1 -> int(11)
	 */
	const FULL_REDIRECT1 = '`pages_revisions`.`redirect1`';
	
	const COL_REDIRECT1 = 'redirect1';
	
	/**
	 * redirect2 -> int(11)
	 */
	const FULL_REDIRECT2 = '`pages_revisions`.`redirect2`';
	
	const COL_REDIRECT2 = 'redirect2';
	
	/**
	 * redirect3 -> varchar(255)
	 */
	const FULL_REDIRECT3 = '`pages_revisions`.`redirect3`';
	
	const COL_REDIRECT3 = 'redirect3';
	
	/**
	 * redirect4 -> varchar(255)
	 */
	const FULL_REDIRECT4 = '`pages_revisions`.`redirect4`';
	
	const COL_REDIRECT4 = 'redirect4';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`pages_revisions`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `pages_revisions`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'PagesId'=>1, 'SystemWebsitesId'=>2, 'Revision'=>3, 'SystemLanguageId'=>4, 'PagesTemplatesId'=>5, 'Name'=>6, 'Identifier'=>7, 'Title'=>8, 'Heading1'=>9, 'Heading2'=>10, 'Heading3'=>11, 'Rewrite'=>12, 'Keywords'=>13, 'Description'=>14, 'Addtext1'=>15, 'Addtext2'=>16, 'Enabled'=>17, 'Parentid'=>18, 'Sort'=>19, 'Head'=>20, 'Page'=>21, 'Note'=>22, 'Redirect1'=>23, 'Redirect2'=>24, 'Redirect3'=>25, 'Redirect4'=>26);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`pages_revisions`.`Id`'=>0, '`pages_revisions`.`PagesId`'=>1, '`pages_revisions`.`SystemWebsitesId`'=>2, '`pages_revisions`.`Revision`'=>3, '`pages_revisions`.`SystemLanguageId`'=>4, '`pages_revisions`.`PagesTemplatesId`'=>5, '`pages_revisions`.`Name`'=>6, '`pages_revisions`.`Identifier`'=>7, '`pages_revisions`.`Title`'=>8, '`pages_revisions`.`Heading1`'=>9, '`pages_revisions`.`Heading2`'=>10, '`pages_revisions`.`Heading3`'=>11, '`pages_revisions`.`Rewrite`'=>12, '`pages_revisions`.`Keywords`'=>13, '`pages_revisions`.`Description`'=>14, '`pages_revisions`.`Addtext1`'=>15, '`pages_revisions`.`Addtext2`'=>16, '`pages_revisions`.`Enabled`'=>17, '`pages_revisions`.`Parentid`'=>18, '`pages_revisions`.`Sort`'=>19, '`pages_revisions`.`Head`'=>20, '`pages_revisions`.`Page`'=>21, '`pages_revisions`.`Note`'=>22, '`pages_revisions`.`Redirect1`'=>23, '`pages_revisions`.`Redirect2`'=>24, '`pages_revisions`.`Redirect3`'=>25, '`pages_revisions`.`Redirect4`'=>26);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'pages_id'=>1, 'system_websites_id'=>2, 'revision'=>3, 'system_language_id'=>4, 'pages_templates_id'=>5, 'name'=>6, 'identifier'=>7, 'title'=>8, 'heading1'=>9, 'heading2'=>10, 'heading3'=>11, 'rewrite'=>12, 'keywords'=>13, 'description'=>14, 'addtext1'=>15, 'addtext2'=>16, 'enabled'=>17, 'parentid'=>18, 'sort'=>19, 'head'=>20, 'page'=>21, 'note'=>22, 'redirect1'=>23, 'redirect2'=>24, 'redirect3'=>25, 'redirect4'=>26);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'pages_id', 'system_websites_id', 'revision', 'system_language_id', 'pages_templates_id', 'name', 'identifier', 'title', 'heading1', 'heading2', 'heading3', 'rewrite', 'keywords', 'description', 'addtext1', 'addtext2', 'enabled', 'parentid', 'sort', 'head', 'page', 'note', 'redirect1', 'redirect2', 'redirect3', 'redirect4');
	
	
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
			throw new WgException("PagesRevisions could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelPagesRevisions::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('PagesRevisionsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesRevisionsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('PagesRevisionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('PagesRevisionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in PagesRevisionsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in PagesRevisionsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set PagesRevisionsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_id -> int(11) unsigned
	 * 
	 * @name getPagesId
	 * @return int
	 */
	public function getPagesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set PagesRevisionsModel::getPagesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getPagesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_websites_id -> int(4)
	 * 
	 * @name getSystemWebsitesId
	 * @return int
	 */
	public function getSystemWebsitesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set PagesRevisionsModel::getSystemWebsitesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getSystemWebsitesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of revision -> int(11)
	 * 
	 * @name getRevision
	 * @return int
	 */
	public function getRevision() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRevision', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRevision', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_language_id -> int(3)
	 * 
	 * @name getSystemLanguageId
	 * @return int
	 */
	public function getSystemLanguageId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set PagesRevisionsModel::getSystemLanguageId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getSystemLanguageId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of pages_templates_id -> int(11) unsigned
	 * 
	 * @name getPagesTemplatesId
	 * @return int
	 */
	public function getPagesTemplatesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set PagesRevisionsModel::getPagesTemplatesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getPagesTemplatesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (string) $this->_result[6];
			else parent::throwGetColException('Not set PagesRevisionsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (string) $this->_result[7];
			else parent::throwGetColException('Not set PagesRevisionsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set PagesRevisionsModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading1 -> varchar(255)
	 * 
	 * @name getHeading1
	 * @return varchar
	 */
	public function getHeading1() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set PagesRevisionsModel::getHeading1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getHeading1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading2 -> varchar(255)
	 * 
	 * @name getHeading2
	 * @return varchar
	 */
	public function getHeading2() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set PagesRevisionsModel::getHeading2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getHeading2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of heading3 -> varchar(255)
	 * 
	 * @name getHeading3
	 * @return varchar
	 */
	public function getHeading3() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set PagesRevisionsModel::getHeading3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getHeading3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rewrite -> varchar(255)
	 * 
	 * @name getRewrite
	 * @return varchar
	 */
	public function getRewrite() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRewrite', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRewrite', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of keywords -> text
	 * 
	 * @name getKeywords
	 * @return text
	 */
	public function getKeywords() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set PagesRevisionsModel::getKeywords', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getKeywords', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of description -> text
	 * 
	 * @name getDescription
	 * @return text
	 */
	public function getDescription() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set PagesRevisionsModel::getDescription', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getDescription', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addtext1 -> varchar(255)
	 * 
	 * @name getAddtext1
	 * @return varchar
	 */
	public function getAddtext1() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set PagesRevisionsModel::getAddtext1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getAddtext1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of addtext2 -> varchar(255)
	 * 
	 * @name getAddtext2
	 * @return varchar
	 */
	public function getAddtext2() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (string) $this->_result[16];
			else parent::throwGetColException('Not set PagesRevisionsModel::getAddtext2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getAddtext2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of enabled -> tinyint(1) unsigned
	 * 
	 * @name getEnabled
	 * @return tinyint
	 */
	public function getEnabled() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (string) $this->_result[17];
			else parent::throwGetColException('Not set PagesRevisionsModel::getEnabled', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getEnabled', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parentid -> int(10) unsigned
	 * 
	 * @name getParentid
	 * @return int
	 */
	public function getParentid() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set PagesRevisionsModel::getParentid', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getParentid', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of sort -> int(8) unsigned
	 * 
	 * @name getSort
	 * @return int
	 */
	public function getSort() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set PagesRevisionsModel::getSort', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getSort', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of head -> text
	 * 
	 * @name getHead
	 * @return text
	 */
	public function getHead() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set PagesRevisionsModel::getHead', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getHead', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of page -> longtext
	 * 
	 * @name getPage
	 * @return longtext
	 */
	public function getPage() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set PagesRevisionsModel::getPage', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getPage', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of note -> text
	 * 
	 * @name getNote
	 * @return text
	 */
	public function getNote() {
		if ((bool) $this->_result) {
			if (array_key_exists(22, $this->_result)) return (string) $this->_result[22];
			else parent::throwGetColException('Not set PagesRevisionsModel::getNote', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getNote', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect1 -> int(11)
	 * 
	 * @name getRedirect1
	 * @return int
	 */
	public function getRedirect1() {
		if ((bool) $this->_result) {
			if (array_key_exists(23, $this->_result)) return (string) $this->_result[23];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRedirect1', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRedirect1', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect2 -> int(11)
	 * 
	 * @name getRedirect2
	 * @return int
	 */
	public function getRedirect2() {
		if ((bool) $this->_result) {
			if (array_key_exists(24, $this->_result)) return (string) $this->_result[24];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRedirect2', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRedirect2', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect3 -> varchar(255)
	 * 
	 * @name getRedirect3
	 * @return varchar
	 */
	public function getRedirect3() {
		if ((bool) $this->_result) {
			if (array_key_exists(25, $this->_result)) return (string) $this->_result[25];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRedirect3', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRedirect3', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of redirect4 -> varchar(255)
	 * 
	 * @name getRedirect4
	 * @return varchar
	 */
	public function getRedirect4() {
		if ((bool) $this->_result) {
			if (array_key_exists(26, $this->_result)) return (string) $this->_result[26];
			else parent::throwGetColException('Not set PagesRevisionsModel::getRedirect4', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From PagesRevisionsModel::getRedirect4', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: PagesRevisionsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: PagesRevisionsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table pages_revisions
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new PagesRevisionsModel());
	}
	
	/**
	 * Select one item function from table pages_revisions
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
		$ret = DbModel::doSelect($conn, new PagesRevisionsModel());
		if (isset($ret[0]) && is_a($ret[0], 'PagesRevisionsModel')) return $ret[0];
		else {
			$class = new PagesRevisionsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table pages_revisions
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new PagesRevisionsModel());
	}
	
	/**
	 * Basic pager function from table pages_revisions
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
		return DbModel::doPager($conn, new PagesRevisionsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table pages_revisions
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
		return (int) DbModel::doAffected($conn, new PagesRevisionsModel());
	}
	
	/**
	 * Basic update function for table pages_revisions
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
		$af = (int) DbModel::doAffected($conn, new PagesRevisionsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table pages_revisions
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
		return (int) DbModel::doInsert($conn, new PagesRevisionsModel());
	}
	
	/**
	 * Basic reader create function from table pages_revisions
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table pages_revisions
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
	 * Drop table function for table pages_revisions
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