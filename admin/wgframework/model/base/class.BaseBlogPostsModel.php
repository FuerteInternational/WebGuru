<?php
/**
 * Database class for table blog_posts
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/base/blog_posts
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. September 2012 17:05:25
 */

class BaseBlogPostsModel extends DbModel {

	/**
	 * name
	 */
	const TABLE_NAME = 'blog_posts';
	
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
	
	const FULL_PRIMARY_KEY = '`blog_posts`.`id`';
	
	/**
	 * id -> bigint(20) unsigned
	 */
	const FULL_ID = '`blog_posts`.`id`';
	
	const COL_ID = 'id';
	
	/**
	 * blog_id -> int(11) unsigned
	 */
	const FULL_BLOG_ID = '`blog_posts`.`blog_id`';
	
	const COL_BLOG_ID = 'blog_id';
	
	/**
	 * users_id -> bigint(20)
	 */
	const FULL_USERS_ID = '`blog_posts`.`users_id`';
	
	const COL_USERS_ID = 'users_id';
	
	/**
	 * system_users_id -> int(8) unsigned
	 */
	const FULL_SYSTEM_USERS_ID = '`blog_posts`.`system_users_id`';
	
	const COL_SYSTEM_USERS_ID = 'system_users_id';
	
	/**
	 * blog_categories_id -> int(11) unsigned
	 */
	const FULL_BLOG_CATEGORIES_ID = '`blog_posts`.`blog_categories_id`';
	
	const COL_BLOG_CATEGORIES_ID = 'blog_categories_id';
	
	/**
	 * blog_groups_id -> int(11) unsigned
	 */
	const FULL_BLOG_GROUPS_ID = '`blog_posts`.`blog_groups_id`';
	
	const COL_BLOG_GROUPS_ID = 'blog_groups_id';
	
	/**
	 * added -> datetime
	 */
	const FULL_ADDED = '`blog_posts`.`added`';
	
	const COL_ADDED = 'added';
	
	/**
	 * added_gmt -> datetime
	 */
	const FULL_ADDED_GMT = '`blog_posts`.`added_gmt`';
	
	const COL_ADDED_GMT = 'added_gmt';
	
	/**
	 * content -> longtext
	 */
	const FULL_CONTENT = '`blog_posts`.`content`';
	
	const COL_CONTENT = 'content';
	
	/**
	 * title -> varchar(255)
	 */
	const FULL_TITLE = '`blog_posts`.`title`';
	
	const COL_TITLE = 'title';
	
	/**
	 * identifier -> varchar(255)
	 */
	const FULL_IDENTIFIER = '`blog_posts`.`identifier`';
	
	const COL_IDENTIFIER = 'identifier';
	
	/**
	 * category -> int(4)
	 */
	const FULL_CATEGORY = '`blog_posts`.`category`';
	
	const COL_CATEGORY = 'category';
	
	/**
	 * excerpt -> text
	 */
	const FULL_EXCERPT = '`blog_posts`.`excerpt`';
	
	const COL_EXCERPT = 'excerpt';
	
	/**
	 * status -> tinyint(1)
	 */
	const FULL_STATUS = '`blog_posts`.`status`';
	
	const COL_STATUS = 'status';
	
	/**
	 * password -> varchar(40)
	 */
	const FULL_PASSWORD = '`blog_posts`.`password`';
	
	const COL_PASSWORD = 'password';
	
	/**
	 * name -> varchar(255)
	 */
	const FULL_NAME = '`blog_posts`.`name`';
	
	const COL_NAME = 'name';
	
	/**
	 * changed -> datetime
	 */
	const FULL_CHANGED = '`blog_posts`.`changed`';
	
	const COL_CHANGED = 'changed';
	
	/**
	 * changed_gmt -> datetime
	 */
	const FULL_CHANGED_GMT = '`blog_posts`.`changed_gmt`';
	
	const COL_CHANGED_GMT = 'changed_gmt';
	
	/**
	 * content_filtered -> text
	 */
	const FULL_CONTENT_FILTERED = '`blog_posts`.`content_filtered`';
	
	const COL_CONTENT_FILTERED = 'content_filtered';
	
	/**
	 * parent -> bigint(20)
	 */
	const FULL_PARENT = '`blog_posts`.`parent`';
	
	const COL_PARENT = 'parent';
	
	/**
	 * menu_order -> int(11)
	 */
	const FULL_MENU_ORDER = '`blog_posts`.`menu_order`';
	
	const COL_MENU_ORDER = 'menu_order';
	
	/**
	 * post_type -> tinyint(1)
	 */
	const FULL_POST_TYPE = '`blog_posts`.`post_type`';
	
	const COL_POST_TYPE = 'post_type';
	
	/**
	 * views -> bigint(20)
	 */
	const FULL_VIEWS = '`blog_posts`.`views`';
	
	const COL_VIEWS = 'views';
	
	/**
	 * rssviews -> bigint(20)
	 */
	const FULL_RSSVIEWS = '`blog_posts`.`rssviews`';
	
	const COL_RSSVIEWS = 'rssviews';
	
	/**
	 * featured -> tinyint(1)
	 */
	const FULL_FEATURED = '`blog_posts`.`featured`';
	
	const COL_FEATURED = 'featured';
	
	
	/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = 'COUNT(`blog_posts`.`id`)';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = 'COUNT(DISTINCT `blog_posts`.`id`)';
	
	
	/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('Id'=>0, 'BlogId'=>1, 'UsersId'=>2, 'SystemUsersId'=>3, 'BlogCategoriesId'=>4, 'BlogGroupsId'=>5, 'Added'=>6, 'AddedGmt'=>7, 'Content'=>8, 'Title'=>9, 'Identifier'=>10, 'Category'=>11, 'Excerpt'=>12, 'Status'=>13, 'Password'=>14, 'Name'=>15, 'Changed'=>16, 'ChangedGmt'=>17, 'ContentFiltered'=>18, 'Parent'=>19, 'MenuOrder'=>20, 'PostType'=>21, 'Views'=>22, 'Rssviews'=>23, 'Featured'=>24);
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('`blog_posts`.`Id`'=>0, '`blog_posts`.`BlogId`'=>1, '`blog_posts`.`UsersId`'=>2, '`blog_posts`.`SystemUsersId`'=>3, '`blog_posts`.`BlogCategoriesId`'=>4, '`blog_posts`.`BlogGroupsId`'=>5, '`blog_posts`.`Added`'=>6, '`blog_posts`.`AddedGmt`'=>7, '`blog_posts`.`Content`'=>8, '`blog_posts`.`Title`'=>9, '`blog_posts`.`Identifier`'=>10, '`blog_posts`.`Category`'=>11, '`blog_posts`.`Excerpt`'=>12, '`blog_posts`.`Status`'=>13, '`blog_posts`.`Password`'=>14, '`blog_posts`.`Name`'=>15, '`blog_posts`.`Changed`'=>16, '`blog_posts`.`ChangedGmt`'=>17, '`blog_posts`.`ContentFiltered`'=>18, '`blog_posts`.`Parent`'=>19, '`blog_posts`.`MenuOrder`'=>20, '`blog_posts`.`PostType`'=>21, '`blog_posts`.`Views`'=>22, '`blog_posts`.`Rssviews`'=>23, '`blog_posts`.`Featured`'=>24);
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('id'=>0, 'blog_id'=>1, 'users_id'=>2, 'system_users_id'=>3, 'blog_categories_id'=>4, 'blog_groups_id'=>5, 'added'=>6, 'added_gmt'=>7, 'content'=>8, 'title'=>9, 'identifier'=>10, 'category'=>11, 'excerpt'=>12, 'status'=>13, 'password'=>14, 'name'=>15, 'changed'=>16, 'changed_gmt'=>17, 'content_filtered'=>18, 'parent'=>19, 'menu_order'=>20, 'post_type'=>21, 'views'=>22, 'rssviews'=>23, 'featured'=>24);
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('id', 'blog_id', 'users_id', 'system_users_id', 'blog_categories_id', 'blog_groups_id', 'added', 'added_gmt', 'content', 'title', 'identifier', 'category', 'excerpt', 'status', 'password', 'name', 'changed', 'changed_gmt', 'content_filtered', 'parent', 'menu_order', 'post_type', 'views', 'rssviews', 'featured');
	
	
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
			throw new WgException("BlogPosts could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException('Method ModelBlogPosts::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. '.$type.' was given.');
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
			else parent::throwGetColException('BlogPostsModel::getPrimaryKey', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlogPostsModel::getPrimaryKey', __LINE__, __FILE__);
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
			else parent::throwGetColException('BlogPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('BlogPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('trying to get non existing data ('.$field.') in BlogPostsModel::getFieldByName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('trying to get non existing data ('.$field.') in BlogPostsModel::getFieldByName', __LINE__, __FILE__);
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
			else parent::throwGetColException('Not set BlogPostsModel::getId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of blog_id -> int(11) unsigned
	 * 
	 * @name getBlogId
	 * @return int
	 */
	public function getBlogId() {
		if ((bool) $this->_result) {
			if (array_key_exists(1, $this->_result)) return (string) $this->_result[1];
			else parent::throwGetColException('Not set BlogPostsModel::getBlogId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getBlogId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of users_id -> bigint(20)
	 * 
	 * @name getUsersId
	 * @return bigint
	 */
	public function getUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(2, $this->_result)) return (string) $this->_result[2];
			else parent::throwGetColException('Not set BlogPostsModel::getUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of system_users_id -> int(8) unsigned
	 * 
	 * @name getSystemUsersId
	 * @return int
	 */
	public function getSystemUsersId() {
		if ((bool) $this->_result) {
			if (array_key_exists(3, $this->_result)) return (string) $this->_result[3];
			else parent::throwGetColException('Not set BlogPostsModel::getSystemUsersId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getSystemUsersId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of blog_categories_id -> int(11) unsigned
	 * 
	 * @name getBlogCategoriesId
	 * @return int
	 */
	public function getBlogCategoriesId() {
		if ((bool) $this->_result) {
			if (array_key_exists(4, $this->_result)) return (string) $this->_result[4];
			else parent::throwGetColException('Not set BlogPostsModel::getBlogCategoriesId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getBlogCategoriesId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of blog_groups_id -> int(11) unsigned
	 * 
	 * @name getBlogGroupsId
	 * @return int
	 */
	public function getBlogGroupsId() {
		if ((bool) $this->_result) {
			if (array_key_exists(5, $this->_result)) return (string) $this->_result[5];
			else parent::throwGetColException('Not set BlogPostsModel::getBlogGroupsId', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getBlogGroupsId', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added -> datetime
	 * 
	 * @name getAdded
	 * @return datetime
	 */
	public function getAdded() {
		if ((bool) $this->_result) {
			if (array_key_exists(6, $this->_result)) return (int) strtotime($this->_result[6]);
			else parent::throwGetColException('Not set BlogPostsModel::getAdded', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getAdded', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of added_gmt -> datetime
	 * 
	 * @name getAddedGmt
	 * @return datetime
	 */
	public function getAddedGmt() {
		if ((bool) $this->_result) {
			if (array_key_exists(7, $this->_result)) return (int) strtotime($this->_result[7]);
			else parent::throwGetColException('Not set BlogPostsModel::getAddedGmt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getAddedGmt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of content -> longtext
	 * 
	 * @name getContent
	 * @return longtext
	 */
	public function getContent() {
		if ((bool) $this->_result) {
			if (array_key_exists(8, $this->_result)) return (string) $this->_result[8];
			else parent::throwGetColException('Not set BlogPostsModel::getContent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getContent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of title -> varchar(255)
	 * 
	 * @name getTitle
	 * @return varchar
	 */
	public function getTitle() {
		if ((bool) $this->_result) {
			if (array_key_exists(9, $this->_result)) return (string) $this->_result[9];
			else parent::throwGetColException('Not set BlogPostsModel::getTitle', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getTitle', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of identifier -> varchar(255)
	 * 
	 * @name getIdentifier
	 * @return varchar
	 */
	public function getIdentifier() {
		if ((bool) $this->_result) {
			if (array_key_exists(10, $this->_result)) return (string) $this->_result[10];
			else parent::throwGetColException('Not set BlogPostsModel::getIdentifier', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getIdentifier', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of category -> int(4)
	 * 
	 * @name getCategory
	 * @return int
	 */
	public function getCategory() {
		if ((bool) $this->_result) {
			if (array_key_exists(11, $this->_result)) return (string) $this->_result[11];
			else parent::throwGetColException('Not set BlogPostsModel::getCategory', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getCategory', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of excerpt -> text
	 * 
	 * @name getExcerpt
	 * @return text
	 */
	public function getExcerpt() {
		if ((bool) $this->_result) {
			if (array_key_exists(12, $this->_result)) return (string) $this->_result[12];
			else parent::throwGetColException('Not set BlogPostsModel::getExcerpt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getExcerpt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of status -> tinyint(1)
	 * 
	 * @name getStatus
	 * @return tinyint
	 */
	public function getStatus() {
		if ((bool) $this->_result) {
			if (array_key_exists(13, $this->_result)) return (string) $this->_result[13];
			else parent::throwGetColException('Not set BlogPostsModel::getStatus', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getStatus', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of password -> varchar(40)
	 * 
	 * @name getPassword
	 * @return varchar
	 */
	public function getPassword() {
		if ((bool) $this->_result) {
			if (array_key_exists(14, $this->_result)) return (string) $this->_result[14];
			else parent::throwGetColException('Not set BlogPostsModel::getPassword', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getPassword', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of name -> varchar(255)
	 * 
	 * @name getName
	 * @return varchar
	 */
	public function getName() {
		if ((bool) $this->_result) {
			if (array_key_exists(15, $this->_result)) return (string) $this->_result[15];
			else parent::throwGetColException('Not set BlogPostsModel::getName', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getName', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed -> datetime
	 * 
	 * @name getChanged
	 * @return datetime
	 */
	public function getChanged() {
		if ((bool) $this->_result) {
			if (array_key_exists(16, $this->_result)) return (int) strtotime($this->_result[16]);
			else parent::throwGetColException('Not set BlogPostsModel::getChanged', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getChanged', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of changed_gmt -> datetime
	 * 
	 * @name getChangedGmt
	 * @return datetime
	 */
	public function getChangedGmt() {
		if ((bool) $this->_result) {
			if (array_key_exists(17, $this->_result)) return (int) strtotime($this->_result[17]);
			else parent::throwGetColException('Not set BlogPostsModel::getChangedGmt', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getChangedGmt', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of content_filtered -> text
	 * 
	 * @name getContentFiltered
	 * @return text
	 */
	public function getContentFiltered() {
		if ((bool) $this->_result) {
			if (array_key_exists(18, $this->_result)) return (string) $this->_result[18];
			else parent::throwGetColException('Not set BlogPostsModel::getContentFiltered', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getContentFiltered', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of parent -> bigint(20)
	 * 
	 * @name getParent
	 * @return bigint
	 */
	public function getParent() {
		if ((bool) $this->_result) {
			if (array_key_exists(19, $this->_result)) return (string) $this->_result[19];
			else parent::throwGetColException('Not set BlogPostsModel::getParent', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getParent', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of menu_order -> int(11)
	 * 
	 * @name getMenuOrder
	 * @return int
	 */
	public function getMenuOrder() {
		if ((bool) $this->_result) {
			if (array_key_exists(20, $this->_result)) return (string) $this->_result[20];
			else parent::throwGetColException('Not set BlogPostsModel::getMenuOrder', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getMenuOrder', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of post_type -> tinyint(1)
	 * 
	 * @name getPostType
	 * @return tinyint
	 */
	public function getPostType() {
		if ((bool) $this->_result) {
			if (array_key_exists(21, $this->_result)) return (string) $this->_result[21];
			else parent::throwGetColException('Not set BlogPostsModel::getPostType', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getPostType', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of views -> bigint(20)
	 * 
	 * @name getViews
	 * @return bigint
	 */
	public function getViews() {
		if ((bool) $this->_result) {
			if (array_key_exists(22, $this->_result)) return (string) $this->_result[22];
			else parent::throwGetColException('Not set BlogPostsModel::getViews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getViews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of rssviews -> bigint(20)
	 * 
	 * @name getRssviews
	 * @return bigint
	 */
	public function getRssviews() {
		if ((bool) $this->_result) {
			if (array_key_exists(23, $this->_result)) return (string) $this->_result[23];
			else parent::throwGetColException('Not set BlogPostsModel::getRssviews', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getRssviews', __LINE__, __FILE__);
	}
	
	/**
	 * Get value of featured -> tinyint(1)
	 * 
	 * @name getFeatured
	 * @return tinyint
	 */
	public function getFeatured() {
		if ((bool) $this->_result) {
			if (array_key_exists(24, $this->_result)) return (string) $this->_result[24];
			else parent::throwGetColException('Not set BlogPostsModel::getFeatured', __LINE__, __FILE__);
		}
		else return parent::throwNoResException('No result From BlogPostsModel::getFeatured', __LINE__, __FILE__);
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
			else throw new Exception('Call to undefined method/class function: BlogPostsModel::'.$function.'()');
		}
		else throw new Exception('Call to undefined method/class function: BlogPostsModel::'.$function.'()');
	}
	
	
	/**
	 * Basic select function from table blog_posts
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new BlogPostsModel());
	}
	
	/**
	 * Select one item function from table blog_posts
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
		$ret = DbModel::doSelect($conn, new BlogPostsModel());
		if (isset($ret[0]) && is_a($ret[0], 'BlogPostsModel')) return $ret[0];
		else {
			$class = new BlogPostsModel();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table blog_posts
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new BlogPostsModel());
	}
	
	/**
	 * Basic pager function from table blog_posts
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
		return DbModel::doPager($conn, new BlogPostsModel(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table blog_posts
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
		return (int) DbModel::doAffected($conn, new BlogPostsModel());
	}
	
	/**
	 * Basic update function for table blog_posts
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
		$af = (int) DbModel::doAffected($conn, new BlogPostsModel());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table blog_posts
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
		return (int) DbModel::doInsert($conn, new BlogPostsModel());
	}
	
	/**
	 * Basic reader create function from table blog_posts
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table blog_posts
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
	 * Drop table function for table blog_posts
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