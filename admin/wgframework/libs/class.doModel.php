<?php
/**
 * Generate complete database model
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      10. November 2008
 * 
 * @todo Do actions better
 */

require_once('class.getdb.php');

class doModel extends getDb {
	
	/**
	 * Object constructor
	 */
	public function __construct() {
	}
	
	protected static function _checkFolders() {
		if (!is_dir(wgPaths::getAdminPath().'wgframework/model/')) wgIo::mkdir(wgPaths::getAdminPath().'wgframework/model/');
		//if (!is_dir(wgPaths::getAdminPath().'wgframework/model/relations/')) wgIo::mkdir(wgPaths::getAdminPath().'wgframework/model/relations/');
		if (!is_dir(wgPaths::getAdminPath().'wgframework/model/info/')) wgIo::mkdir(wgPaths::getAdminPath().'wgframework/model/info/');
		if (!is_dir(wgPaths::getAdminPath().'wgframework/model/base/')) wgIo::mkdir(wgPaths::getAdminPath().'wgframework/model/base/');
		//if (!is_dir(wgPaths::getAdminPath().'wgframework/model/extended/')) wgIo::mkdir(wgPaths::getAdminPath().'wgframework/model/extended/');
	}
	
	protected static function _createModels() {
		$tables = parent::getTables();
		/*
		// TODO: Solve creating of the include file
		$path = wgPaths::getAdminPath().'wgframework/init.include.php';
		$data = self::_getHeader($table, '', true).'
'.self::_getMainTableIncludes($tables).'
?>';
		wgIo::writeFile($path, $data);
		//*/
		$arr = parent::getTablesStatus();
		$status = array();
		foreach ($arr as $info) $status[$info[0]] = $info;
		foreach ($tables as $table) {
			self::_createModelForTable($table[0], $status[$table[0]]);
		}
		// generate include path file
		$path = wgPaths::getAdminPath().'wgframework/init.include.php';
		$data = self::_getHeader($table, '', true).'
'.self::_getMainTableIncludes($tables).'
?>';
		//wgIo::writeFile($path, $data);
		return $tables;
	}
	
	private static function _createModelForTable($table, $status) {
		global $db;
		$columns = parent::getTableColumns($table);
		$name = self::_getClassNameFromTable($table);
		// generate xml structure
		$path = wgPaths::getAdminPath().'wgframework/model/relations/config.'.self::_getClassNameFromTable($table).'.xml';
		if (!file_exists($path) || true) {
			$data = '<?xml version="1.0" encoding="UTF-8"?>
<database>
	<table name="'.$table.'" phpName="'.self::_getClassNameFromTable($table).'" engine="'.$status['Engine'].'">'.self::_doXmlColumns($table, $columns).'	
	</table>
</database>
';
			//wgIo::writeFile($path, $data);
		}
		
		// generate xml structure
		$path = wgPaths::getAdminPath().'wgframework/model/info/class.Info'.self::_getClassNameFromTable($table).'Model.php';
		$data = self::_getHeader($table, 'info/', true).'
class Info'.self::_getClassNameFromTable($table).'Model {
	
	const ENGINE = \''.$status['Engine'].'\';
	
	const TABLE = \''.$table.'\';'.self::_doInfoColumns($table, $columns).'

}
?>
';
		wgIo::writeFile($path, $data);
			
		
		//xmlModelReader::getForeignKeys($table);
		// generate non editable model for system
		$data = self::_getHeader($table, 'model/base/', true).'
class Base'.$name.'Model extends DbModel {

	'.self::_getColumnInfo($status).'
	'.self::_getColumnConstants($table, $columns).'
	'.self::_getColumnCountConstants($table, $columns).'
	'.self::_getColumnArrays($table, $name, $columns).'
	'.self::_getClassVariables($table, $name, $columns).'
	'.self::_getClassFunctions($table, $name, $columns).'
	'.self::_getColumnFunctions($table, $name, $columns).'
	'.self::_getDatabaseFunction($table, $name, $columns).'
}
?>';
		wgIo::writeFile(wgPaths::getAdminPath().'wgframework/model/base/class.Base'.self::_getClassNameFromTable($table).'Model.php', $data);
		
		// generate editable model for user
		$path = wgPaths::getAdminPath().'wgframework/model/class.'.self::_getClassNameFromTable($table).'Model.php';
		
		$temptype = NULL;
		$temptypepar = NULL;
		$temptypewhere = NULL;
		if (self::_columnExist($columns, 'temptype')) {
			$temptype = '/*
	public static function getTemplateByIdentifierAndType($identifier, $type=0) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, wgText::safeText($identifier));
		$conn->where(parent::COL_TEMPTYPE, $type);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new '.$name.'Model();
	}
	//*/'.NL.NL;
			$temptypepar = ', $templateType=0';
			$temptypewhere = NL."\t\t".'$conn->where(parent::COL_TEMPTYPE, (int) $templateType);';
		}
		else if (eregi('template', $name)) {
			$temptype = '/*
	public static function getTemplateByIdentifier($identifier) {
		$type = (int) $type;
		$conn = new wgConnector();
		$conn->where(parent::COL_IDENTIFIER, wgText::safeText($identifier));
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new '.$name.'Model();
	}
	//*/'.NL.NL;
		}
		
		$enabledtable = NULL;
		if (self::_columnExist($columns, 'enabled')) $enabledtable = '/*
	public static function getEnabledSelfData($enabled=true'.$temptypepar.') {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_ENABLED, (int) $enabled);'.$temptypewhere.'
		//$conn->order(parent::COL_NAME, \'ASC\');
		return parent::doSelect($conn);
	}
	//*/
	
	/*
	public static function getEnabledSelfPagerData($page'.$temptypepar.', $enabled=true, $limit=20) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);
		$conn->where(parent::COL_ENABLED, (int) $enabled);'.$temptypewhere.'
		//$conn->order(parent::COL_NAME, \'ASC\');
		return parent::doPager($conn, $page, $limit);
	}
	//*/'.NL.NL;
		
		if (!file_exists($path)) {
			$data = self::_getHeader($table, 'model/', false).'
class '.$name.'Model extends Base'.$name.'Model {
	
	
	// --------------------- Predefined functions for '.$name.' ---------------------

	'.$temptype.'/*
	public static function getSelfData('.$temptypepar.') {
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);'.$temptypewhere.'
		//$conn->order(parent::COL_NAME, \'ASC\');
		return parent::doSelect($conn);
	}
	//*/
	
	/*
	public static function getSelfPagerData($page, $limit=20'.$temptypepar.') {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 20;
		$conn = new wgConnector();
		//$conn->where(parent::COL_ID, $id);'.$temptypewhere.'
		//$conn->order(parent::COL_NAME, \'ASC\');
		return parent::doPager($conn, $page, $limit);
	}
	//*/
	
	/*
	public static function getOneSelfData($id'.$name.') {
		$id = (int) $id'.$name.';
		if ((bool) $id) {
			$conn = new wgConnector();
			$conn->where(parent::COL_ID, $id);
			$conn->limit(1);
			$arr = parent::doSelect($conn);
		}
		if (isset($arr[0]) && !empty($arr[0])) return $arr[0];
		else return new '.$name.'Model();
	}
	//*/
	
}
?>';
			wgIo::writeFile($path, $data);
		}
		
		
	}
	
	private static function _columnExist($columnsArray, $columnName) {
		foreach ($columnsArray as $c) if (strtolower($c[0]) == strtolower($columnName)) return true;
		return false;
	}
	
	
	private static function _doInfoColumns($table, $columns) {
		$data = NULL;
		$arr = getDb::getTableKeys($table);
		$keys = array();
		if (is_array($arr) && !empty($arr)) foreach ($arr as $key) {
			$keys[$key['COLUMN_NAME']][] = $key;
		}
		$refs = array();
		foreach ($columns as $col) {
			$field = '
	const COL_'.strtoupper($col['Field']).'_';
			$params = $field."NULL = ".(($col['Null'] == 'YES') ? 'true' : 'false').';';
			if (eregi('unsigned', $col['Type'])) {
				$unsigned = 'true';
				$col['Type'] = trim(str_ireplace('unsigned', '', $col['Type']));
			}
			else $unsigned = 'false';
			$params .= $field."UNSIGNED = ".$unsigned.';';
			$sz = array();
			preg_match('/.*?\((.*?)\)/si', $col['Type'], $sz);
			if (isset($sz[1]) && !empty($sz[1])) {
				$size = $sz[1];
				$col['Type'] = trim(str_ireplace('\('.$sz[1].'\)', '', $col['Type']));
			}
			else $size = '0';
			$params .= $field.'SIZE = '.$size.';';
			$params .= $field.'TYPE = \''.$col['Type'].'\';';
			$params = $field."DEFAULT = ".(((bool) $col['Default']) ? "'".$col['Default']."'" : 'NULL').';';
			$params = $field."COLATION = ".((isset($col['Collation'])) ? "'".$col['Collation']."'" : 'NULL').';';
			$fkeys = NULL;
			if (isset($keys[$col['Field']])) foreach ($keys[$col['Field']] as $con) {
				if ($con['CONSTRAINT_NAME'] == 'PRIMARY') $params .= "\n".$field.'PRIMARY = true;';
				else {
					$params .= "\n".$field.'REF_TABLE = \''.$con['REFERENCED_TABLE_NAME'].'\';
	'.$field.'REF_COL = \''.$con['REFERENCED_COLUMN_NAME']."';";
					$refs[] = 'array(array(\''.$con['TABLE_NAME'].'\', \''.$con['COLUMN_NAME'].'\'), array(\''.$con['REFERENCED_TABLE_NAME'].'\', \''.$con['REFERENCED_COLUMN_NAME'].'\'))';
				}
			}
			$data .= '
		'.$params.''.$fkeys.'';
		}
		$data .= '
	
	public static function getForeignKeys() { 
		return array(
			'.implode(", \n\t\t\t", $refs).'
		);
	}	
	';
		return $data;
	}
	
	private static function _doXmlColumns($table, $columns) {
		$data = NULL;
		$arr = getDb::getTableKeys($table);
		$keys = array();
		if (is_array($arr) && !empty($arr)) foreach ($arr as $key) {
			$keys[$key['COLUMN_NAME']][] = $key;
		}
		foreach ($columns as $col) {
			$params = ' null="'.(($col['Null'] == 'YES') ? 'true' : 'false').'"';
			if (eregi('unsigned', $col['Type'])) {
				$params .= ' unsigned="true"';
				$col['Type'] = trim(str_ireplace('unsigned', '', $col['Type']));
			}
			$sz = array();
			preg_match('/.*?\((.*?)\)/si', $col['Type'], $sz);
			if (isset($sz[1]) && !empty($sz[1])) {
				$params .= ' size="'.$sz[1].'"';
				$col['Type'] = trim(str_ireplace('\('.$sz[1].'\)', '', $col['Type']));
			}
			$params .= ' type="'.$col['Type'].'"';
			if ((bool) $col['Default']) $params .= ' default="'.$col['Default'].'"';
			if (isset($col['Collation']) && (bool) $col['Collation']) $params .= ' collation="'.$col['Collation'].'"';
			$fkeys = NULL;
			if (isset($keys[$col['Field']])) foreach ($keys[$col['Field']] as $con) {
				if ($con['CONSTRAINT_NAME'] == 'PRIMARY') $params .= ' primary="true"';
				else $fkeys .= '
			<constraint refTable="'.$con['REFERENCED_TABLE_NAME'].'" refColumn="'.$con['REFERENCED_COLUMN_NAME'].'" />';
			}
			if ((bool) $fkeys) $fkeys = '>'.$fkeys.'
		</column>';
			else $fkeys = ' />';
			$data .= '
		<column name="'.$col['Field'].'"'.$params.''.$fkeys.'';
		}
		return $data;
	}
	
	private static function _getMainTableIncludes($tables) {
		$data = NULL;
		$data .= 'require(\'class.wgConnector.php\');
		
require(\'libs/class.dbmodel.php\');

require(\'libs/class.exceptions.php\');

/*
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/\';
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/libs/\';
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/libs/helpers/\';
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/model/base/\';
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/model/extended/\';
$conf[\'inclusion\'][] = wgPaths::getAdminPath().\'wgframework/model/\';
if (!defined(\'PATH_SEPARATOR\')) define(\'PATH_SEPARATOR\', \';\');
set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR, $conf[\'inclusion\']));
*/

function __autoload($class_name) {
    require(\'class.\'.$class_name.\'.php\');
}
';
		// It's not necessary to require everything since we have __autoload
		/*foreach ($tables as $table) {
			$table = $table[0];
			$name = self::_getClassNameFromTable($table);
			$data .= 'require(\'model/base/base.'.$name.'.php\');
require(\'model/model.'.$name.'.php\');
require(\'model/extended/extended.'.$name.'.php\');
';
		}*/
		return $data;
	}
	
	private static function _getClassVariables($table, $name, $columns) {
		$data = 'protected $_result = array();
	
	protected $_query  = NULL;
	
	protected $_data   = array();
	
	protected $_resultFields  = array();
	
	';
		
		return $data;
	}
	
	private static function _getClassFunctions($table, $name, $columns) {
		$data = '/**
	 * Returns name of the table
	 * 
	 * @name __toString
	 * @param mixed $params
	 * @return string Name of the class table
	 */
	/*
	public function __toString() {
		if ((bool) self::$_result && method_exists($this, \'getPrimaryKey\')) return $this->getPrimaryKey();
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
			throw new WgException("'.$name.' could not be found in the field names. These are: ".print_r(self::$$fromType, true));
		}
		return $toNames[$key];
	}

	public static function getFieldNames($type=DbModel::FIELD_PHPNAME) {
		if (!isset(self::$$type)) {
			throw new WgException(\'Method Model'.$name.'::getFieldNames() expects the parameter $type to be one of the class constants FIELD_PHPNAME, FIELD_COLVALUE, FIELD_FIELDNAME. \'.$type.\' was given.\');
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
			else $this->_result[$k] = \'\';
		}
		return true;
	}
	';
		return $data;
	}
	
	private static function _getDatabaseFunction($table, $name, $columns) {
		$thisClass = ''.$name.'Model';
		$data = '/**
	 * Basic select function from table '.$table.'
	 * 
	 * @name doSelect
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doSelect($params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->select(self::TABLE_NAME, $what);
		return DbModel::doSelect($conn, new '.$thisClass.'());
	}
	
	/** Left join select function from table '.$table.'
	 * 
	 * @name doLeftJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doLeftJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->leftJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new '.$thisClass.'());
	}
	
	/** Right join select function from table '.$table.'
	 * 
	 * @name doRightJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doRightJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->rightJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new '.$thisClass.'());
	}
	
	/** Inner join select function from table '.$table.'
	 * 
	 * @name doInnerJoin
	 * @param array $params
	 * @return array Array of the items from database
	 */
	public static function doInnerJoin($table2, $params=NULL, $fields=array()) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$what = parent::_getSelectFields($fields);
		$conn->innerJoin(self::TABLE_NAME, $table2, $what);
		return DbModel::doSelect($conn, new '.$thisClass.'());
	}
	
	/**
	 * Select one item function from table '.$table.'
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
		$ret = DbModel::doSelect($conn, new '.$thisClass.'());
		if (isset($ret[0]) && is_a($ret[0], \''.$thisClass.'\')) return $ret[0];
		else {
			$class = new '.$thisClass.'();
			$class->setNullResults();
			return $class;
		}
	}
	
	/**
	 * Basic select count function from table '.$table.'
	 * 
	 * @name doCount
	 * @param array $params
	 * @return int Number of items in database
	 */
	public static function doCount($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->select(self::TABLE_NAME, self::COUNT_TABLE);
		return (int) DbModel::doSelectOne($conn, new '.$thisClass.'());
	}
	
	/**
	 * Basic pager function from table '.$table.'
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
		return DbModel::doPager($conn, new '.$thisClass.'(), $itemsPerPage, $selectPage, $count, $params);
	}
	
	/**
	 * Basic delete function from table '.$table.'
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
		return (int) DbModel::doAffected($conn, new '.$thisClass.'());
	}
	
	/**
	 * Basic update function for table '.$table.'
	 * 
	 * @name doUpdate
	 * @param object $conn wgConnector class instance or NULL
	 * @param array $updates
	 * @return int Number of updated items
	 */
	public static function doUpdate($params=NULL) {
		$conn = parent::_initwgConnector($params, self::PRIMARY_KEY);
		$conn->update(self::TABLE_NAME);
		if (!is_a($params, \'wgConnector\') && isset($params[\'where\'])) {
			if (!isset($params[\'wherecol\'])) $params[\'wherecol\'] = self::PRIMARY_KEY;
			$conn->where($params[\'wherecol\'], $params[\'where\']);
			unset($params[\'where\']);
			unset($params[\'wherecol\']);
		}
		if (!empty($params) && is_array($params)) {
			foreach ($params as $key=>$par) {
				if (isset(self::$_tableFields[$key])) $conn->set($key, $par);
				else throw new WgException("Field ".self::TABLE_NAME.".$key does not exist.");
			}
		}
		$af = (int) DbModel::doAffected($conn, new '.$thisClass.'());
		if (!(bool) $af) $af = 1;
		return (int) $af;
	}
	
	/**
	 * Basic insert function for table '.$table.'
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
		return (int) DbModel::doInsert($conn, new '.$thisClass.'());
	}
	
	/**
	 * Basic reader create function from table '.$table.'
	 * 
	 * @name doReader
	 * @param object $conn wgConnector class instance or NULL
	 * @param mixed $params
	 * @return object Data reader
	 */
	public static function doReader($params=NULL) {
		
	}
	
	/**
	 * Truncate table function for table '.$table.'
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
	 * Drop table function for table '.$table.'
	 * 
	 * @name doDrop
	 * @param mixed $params
	 * @return bool Success
	 */
	public static function doDrop() {
		$conn = new wgConnector();
		return (bool) $conn->drop(self::TABLE_NAME);
	}
	
	';
		return $data;
	}
	
	private static function _getColumnCountConstants($table, $columns) {
		$data = NULL;
		$isPrimary = false;
		foreach ($columns as $col) if ($col[3] == 'PRI') {
			$data = '/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = \'COUNT(`'.$table.'`.`'.$col[0].'`)\';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = \'COUNT(DISTINCT `'.$table.'`.`'.$col[0].'`)\';
	
	';
			$isPrimary = true;
		}
		if (!$isPrimary) {
			$data = '/**
		}
	 * Count (on primary key)
	 */
	const COUNT_TABLE = \'COUNT(`'.$table.'`.`'.$col[0].'`)\';
			
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = \'COUNT(DISTINCT `'.$table.'`.`'.$col[0].'`)\';
			
	';
		}
		if (!(bool) $data) $data = '/**
	 * Count (on primary key)
	 */
	const COUNT_TABLE = \'COUNT(*)\';
	
	/**
	 * Count (on primary key) with Distinct
	 */
	const COUNT_DISTINCT_TABLE = \'COUNT(DISTINCT *)\';
	
	';
		return $data;
	}

	private static function _getColumnConstants($table, $columns) {
		$data = NULL;
		$isPrimary = false;
		foreach ($columns as $col) if ($col[3] == 'PRI') {
			$data = '/**
		}
	 * '.$col[0].' -> '.$col[1].'
	 */
	const PRIMARY_KEY = \''.$col[0].'\';
	
	const FULL_PRIMARY_KEY = \'`'.$table.'`.`'.$col[0].'`\';
	
	';
			$isPrimary = true;
		}
		if (!$isPrimary) {
			$data = '/**
		}
	 * '.$col[0].' -> '.$col[1].'
	 */
	const PRIMARY_KEY = \''.$col[0].'\';
			
	const FULL_PRIMARY_KEY = \'`'.$table.'`.`'.$col[0].'`\';
			
	';
		}
		foreach ($columns as $col) {
			$data .= '/**
	 * '.$col[0].' -> '.$col[1].'
	 */
	const FULL_'.strtoupper($col[0]).' = \'`'.$table.'`.`'.$col[0].'`\';
	
	const COL_'.strtoupper($col[0]).' = \''.$col[0].'\';
	
	';
		}
		return $data;
	}

	private static function _getColumnInfo($status) {
		$data = NULL;
		$new = array();
		$new['name'] = $status['Name'];
		$new['engine'] = $status['Engine'];
		$new['collation'] = $status['Collation'];
		$new['row_format'] = $status['Row_format'];
		$new['comment'] = $status['Comment'];
		foreach ($new as $key=>$val) if (!is_numeric($key)) {
			$data .= '/**
	 * '.$key.'
	 */
	const TABLE_'.strtoupper($key).' = \''.$val.'\';
	
	';
		}
		return $data;
	}
	
	private static function _getColumnFunctions($table, $name, $columns) {
		$data = NULL;
		foreach ($columns as $key=>$col) if ($col[3] == 'PRI') $data = '/**
	 * Get value of the primary key
	 * 
	 * @name getPrimaryKey
	 * @return int
	 */
	public function getPrimaryKey() {
		if ((bool) $this->_result) {
			if (isset($this->_result['.$key.'])) return (int) $this->_result['.$key.'];
			else parent::throwGetColException(\''.$name.'Model::getPrimaryKey\', __LINE__, __FILE__);
		}
		else return parent::throwNoResException(\''.$name.'Model::getPrimaryKey\', __LINE__, __FILE__);
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
			else parent::throwGetColException(\''.$name.'Model::getFieldByName\', __LINE__, __FILE__);
		}
		else return parent::throwNoResException(\''.$name.'Model::getFieldByName\', __LINE__, __FILE__);
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
			else parent::throwGetColException(\'trying to get non existing data (\'.$field.\') in '.$name.'Model::getFieldByName\', __LINE__, __FILE__);
		}
		else return parent::throwNoResException(\'trying to get non existing data (\'.$field.\') in '.$name.'Model::getFieldByName\', __LINE__, __FILE__);
	}
	
	';
		foreach ($columns as $key=>$col) {
			$type = strtolower(preg_replace('/(\(.*)/si', '', $col[1]));
			$pre = NULL;
			$pos = NULL;
			if ($type == 'int' || $type == 'tinyint') $return = 'int';
			if ($type == 'datetime' || $type == 'timestamp') {
				$pre = 'strtotime(';
				$pos = ')';
				$return = 'int';
			}
			else $return = 'string';
			$data .= '/**
	 * Get value of '.$col[0].' -> '.$col[1].'
	 * 
	 * @name get'.self::_getClassNameFromTable($col[0]).'
	 * @return '.$type.'
	 */
	public function get'.self::_getClassNameFromTable($col[0]).'() {
		if ((bool) $this->_result) {
			if (array_key_exists('.$key.', $this->_result)) return ('.$return.') '.$pre.'$this->_result['.$key.']'.$pos.';
			else parent::throwGetColException(\'Not set '.$name.'Model::get'.self::_getClassNameFromTable($col[0]).'\', __LINE__, __FILE__);
		}
		else return parent::throwNoResException(\'No result From '.$name.'Model::get'.self::_getClassNameFromTable($col[0]).'\', __LINE__, __FILE__);
	}
	
	';
		}
		$data .= '/**
	 * __call function
	 * 
	 * @name __call
	 * @return mixed
	 */
	public function __call($function, $args) {
		if ((bool) $this->_result) {
			$col = strtolower(str_replace(\'get\', \'\', $function));
			if (isset($this->_result[$col])) return (int) $this->_result[$col];
			else throw new Exception(\'Call to undefined method/class function: '.$name.'Model::\'.$function.\'()\');
		}
		else throw new Exception(\'Call to undefined method/class function: '.$name.'Model::\'.$function.\'()\');
	}
	
	';
		return $data;
	}
	
	private static function _getColumnArrays($table, $name, $columns) {
		$data   = NULL;
		$names  = array();
		$values = array();
		$fields = array();
		foreach ($columns as $key=>$col) {
			$names[]  = "'".self::_getClassNameFromTable($col[0])."'=>".$key;
			$values[] = $key;
			$fullfl[] = "'`".$table."`.`".self::_getClassNameFromTable($col[0])."`'=>".$key;
			$fields[] = "'".$col[0]."'=>".$key;
			$fielbk[] = "'".$col[0]."'";
		}
		$data = '/**
	 * @var array $_tableNames Array with column names translated to php
	 */
	private static $_tableNames = array('.implode(', ', $names).');
	
	/**
	 * @var array $_tableValues Array with key values of the columns
	 */
	private static $_tableValues = array('.implode(', ', $values).');
	
	/**
	 * @var array $_fullTblFields Array with real column names in table
	 */
	private static $_fullTblFields = array('.implode(', ', $fullfl).');
	
	/**
	 * @var array $_tableFields Array with real column names
	 */
	private static $_tableFields = array('.implode(', ', $fields).');
	
	/**
	 * @var array $_tableFieldsByKey Array with real column names
	 */
	private static $_tableFieldsByKey = array('.implode(', ', $fielbk).');
	
	';
		return $data;
	}
	
	protected static function _getClassNameFromTable($table) {
		$parts = explode('_', $table);
		foreach ($parts as $key=>$part) $parts[$key] = ucfirst($part);
		return implode('', $parts);
	}
	
	private static function _getTableName($table) {
		global $conf;
		return str_ireplace($conf['db']['pref'], '', $table);
	}
	
	protected static function _getHeader($table, $sub='', $warning=false) {
		if ((bool) $warning) $warning = ' * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don\'t want to loose your work !!!
 * 
';
		else $warning = '';
		return '<?php
/**
 * Database class for table '.$table.'
 * 
'.$warning.' * @package      WebGuru3
 * @subpackage   wgframework/'.$sub.$table.'
 * @author       '.wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname').' ('.wgUsers::getDetail('company').')
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    '.WGVERSION.'
 * @since        '.date('j. F Y H:i:s', time()).'
 */
';
	}

}

?>