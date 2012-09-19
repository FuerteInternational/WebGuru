<?php
/**
 * Generating new installer class
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */


final class createinstActionsDeveloper extends BaseActions {
	
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct() {
		self::$_par['mname'] = ucfirst(wgPost::getValue('modname'));
		self::$_par['modid'] = wgPost::getValue('modname');
		self::$_par['table'] = wgPost::getValue('table');
		self::$_par['tdata'] = wgPost::getValue('tdata');
		self::$_par['modid'] = wgPost::getValue('modname');
		self::$_par['mucft'] = ucfirst(self::$_par['modid']);
		self::$_par['mauth'] = wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname');
		self::$_par['adate'] = date('j. F Y');
		self::init(); wgError::add('generated', 2);
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return unknown
	 */
	public static function init() {
		
		$path = wgPaths::getModulePath('ftp', self::$_par['modid']);
		self::$_par['mpath'] = $path;
		
		$file = 'class.install.php';
		
		if (!is_writable($path.$file)) { wgError::add(wgLang::get('notwritable').': '.$path.$file);
			return false;
		}
		
		$data = self::_getFileHeader('Install class for module '.self::$_par['mname'].'').'
class install'.self::$_par['mucft'].' {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		'.self::_getTables().'
		
		'.self::_getQueries().'
		
	}
}
?>';
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	
	// functions ---------------------------------------------------------------------------
	
	private static function _getTables() {
		$data = NULL;
		require('class.getdb.php');
		if (!empty(self::$_par['table']) && is_array(self::$_par['table'])) foreach (self::$_par['table'] as $table) {
			$data .= '// Table '.$table.'
		$this->tables[\''.$table.'\'] = "
'.getDb::getTable($table).'
		";
			
		';
		}
		
		return $data;
	}
	
	private static function _getQueries() {
		global $db;
		$data = NULL;
		
		if (!empty(self::$_par['tdata']) && is_array(self::$_par['tdata'])) foreach (self::$_par['tdata'] as $table) {
			$db->select($table);
			$db->makeReader();
			while ($row = $db->read()) {
				if (!empty($row) && is_array($row)) {
					$c = array();
					$v = array();
					foreach ($row as $col=>$val) if (!is_numeric($col)) {
						$c[] = '`'.$col.'`';
						$v[] = "\'".str_ireplace("'", "\\'", $val)."\'";
					}
					$data .= '$this->queries[] = \'INSERT INTO `'.$table.'` ('.implode(', ', $c).') VALUES ('.implode(', ', $v).') ;\';
		';
				}
			}			
		}
		return $data;
	}
	
	/**
	 * Creates example actions files for module pages
	 *
	 */
	private static function _getFileHeader($description, $subpackage=NULL) {
		$module = wgModules::runModule('developer');
		return '<?php
/**
 * '.$description.'
 * 
 * @package      WebGuru3
 * @subpackage   modules/'.self::$_par['modid'].'/'.$subpackage.'
 * @author       '.self::$_par['mauth'].'
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    '.WGVERSION.'
 * @wgdeveloper  '.$module->version.'
 * @since        '.self::$_par['adate'].'
 */
';		
	}
	
	
}

?>