<?php
/**
 * Generating new module class
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

define('DEVGENTOFOLDER', 'system/');

final class createmodActionsDeveloper extends BaseActions {
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
		self::$_par['mname'] = wgPost::getValue('modname');
		self::$_par['modid'] = str_ireplace('-', '', wgPost::getValue('modid'));
		self::$_par['mucft'] = ucfirst(self::$_par['modid']);
		self::$_par['mpags'] = wgPost::getValue('modpages');
		self::$_par['mparr'] = explode(',', wgPost::getValue('modpages'));
		foreach (self::$_par['mparr'] as $k=>$v) self::$_par['mparr'][$k] = trim($v);
		
		//print_r(self::$_par['mparr']);
		
		self::$_par['mauth'] = wgPost::getValue('modauthor');
		self::$_par['adate'] = date('j. F Y');
		self::init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return unknown
	 */
	public static function init() {
		$ok = true;
		if (empty(self::$_par['mname'])) { wgError::add('emptyname');
			$ok = false;
		}
		if (empty(self::$_par['modid'])) { wgError::add('emptyidentifier', 1);
			self::$_par['modid'] = str_ireplace('-', '', valid::safeText(self::$_par['mname']));
		}
		if (empty(self::$_par['mpags'])) { wgError::add('emptypages', 1);
			self::$_par['mpags'] = 'index';
		}
		if (empty(self::$_par['mauth'])) { wgError::add('emptyauthor', 1);
			elf::$_par['mauth'] = wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname');
		}
		if ((bool) self::_checkSafeMode()) { wgError::add('safemodeproblem');
			$ok = false;
		}
		if ($ok) {
			if (!self::_createFolders()) { wgError::add('mofoldnotwritable');
				return false;
			}
			self::_createFiles(); wgError::add('modulecreated', 2);
			return true;
		}
		else return false;
	}
	
	/**
	 * Initialising files creation
	 *
	 */
	private static function _createFiles() {
		self::_createClassActions();      // class.actions.php
		self::_createClassMain();         // class.__your_module__.php
		self::_createClassGenerate();     // class.generate.php
		self::_createClassGenerateAuto(); // class.generate.auto.php
		self::_createClassInstall();      // class.install.php
		//self::_createClassDbmodel();      // class.dbmodel.php
		self::_createAdminFiles();        // pages and templates
		self::_createLanguageFiles();     // example language files
		self::_createAjaxFiles();         // example ajax files
		self::_createActionsFiles();      // example actions files (for pages)
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Creates module folders
	 *
	 * @return bool Success
	 */
	private static function _createFolders() {
		
		if (is_writable(wgPaths::getAdminPath().''.DEVGENTOFOLDER.'/')) {
			$path = wgPaths::getAdminPath().''.DEVGENTOFOLDER.'/'.self::$_par['modid'].'/';
			if (is_dir($path)) wgIo::copy($path, wgPaths::getAdminPath().'_backup/overwrited/modules/'.self::$_par['modid'].date('-Y-m-d@H-i-s').'/');
			self::$_par['mpath'] = $path;
			wgIo::mkdir(wgPaths::getAdminPath().''.DEVGENTOFOLDER.'/');
			wgIo::mkdir($path.'actions/');
			// frontend
			wgIo::mkdir($path.'frontend/');
			wgIo::writeFile($path.'frontend/example.php', '<?php echo \':)\'; ?>');
			wgIo::writeFile($path.'frontend/example.pretext.php', 'wgModules::runModule(\''.self::$_par['modid'].'\');');
			wgIo::mkdir($path.'data/');
			wgIo::mkdir($path.'ajax/');
			wgIo::mkdir($path.'install/');
			wgIo::mkdir($path.'js/');
			wgIo::mkdir($path.'languages/');
			$syslangs = wgIo::getFolders(wgPaths::getAdminPath().'languages/');
			foreach ($syslangs as $lname) wgIo::mkdir($path.'languages/'.$lname.'/');
			wgIo::mkdir($path.'pages/');
			wgIo::mkdir($path.'plugins/');
			wgIo::mkdir($path.'templates/');
			return true;
		}
		else return false;
	}
	
	/**
	 * Checks if the safe_mode is enabled
	 *
	 * @return bool
	 */
	private static function _checkSafeMode() {
		return (bool) ini_get('safe_mode');
	}
	
	/**
	 * Creates actions class of the module
	 *
	 * @return bool Success
	 */
	private static function _createClassActions() {
		$file = 'class.actions.php';
		
		$functions = NULL;
		$list = NULL;
		foreach (self::$_par['mparr'] as $page) {
			$functions .= '/**
	 * This is the _do'.ucfirst($page).'Job function description
	 *
	 * @name _do'.ucfirst($page).'Job
	 * @author '.self::$_par['mauth'].'
	 * @param array $parameters Params from url
	 * @return bool Success
	 */
	private function _do'.ucfirst($page).'Job($parameters) {
		require(wgPaths::getModulePath().\'actions/class.'.$page.'.php\');
		$class = new '.self::$_par['modid'].'Actions'.ucfirst($page).'();
		if ((bool) $class->init()) { wgError::add(\'actionok\', 2);
			return true;
		}
		else { wgError::add(\'actionfailed\');
			return false;
		}
	}
	
	';
			$list .= '$func[\'do'.$page.'job\'] = array(\'do'.ucfirst($page).'Job\', \''.$page.'\');
		';
		}
		
		$data = self::_getFileHeader('Action class for module '.self::$_par['mname']).'
class actions'.self::$_par['mucft'].' extends actions {
	
	public function __construct($parameters) {
		$func = array();
		// SYSTEM: functions-list -------------------------------------------------------------
		'.$list.'
		// END: functions-list ----------------------------------------------------------------
		$funcname = parent::_init($func, $parameters);
		$ok = false;
		if ((bool) $funcname && method_exists($this, $funcname)) $ok = $this->$funcname($parameters);
		else parent::_reportError($funcname, __FILE__);
		wgPaths::moduleRedirect(NULL, !$ok);
	}
	
	// SYSTEM: functions ----------------------------------------------------------------------

	'.$functions.'
	
	// END: functions ----------------------------------------------------------------------
	
}
		
?>';
		
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates main class of the module
	 *
	 * @return bool Success
	 */
	private static function _createClassMain() {
		$file = 'class.'.self::$_par['modid'].'.php';
		// extends dbModel'.self::$_par['mucft'].'
		$data = self::_getFileHeader('Main class for module '.self::$_par['mname']).'
class module'.self::$_par['mucft'].' {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = \''.self::$_par['mname'].'\';
		$this->code    = \''.self::$_par['modid'].'\';
		$this->version = \'0.0.0.0\';
		$this->author  = \''.self::$_par['mauth'].'\';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module[\'part\'].\'/\';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public function myFirstFunction() { wgError::add(\'Hello world :-)\');
	}
}
		
?>';
		
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates generate class for the module
	 *
	 * @return bool Success
	 */
	private static function _createClassGenerate() {
		$file = 'class.generate.php';
		
		$data = self::_getFileHeader('Generate class for module '.self::$_par['mname']).'
		
class generate'.self::$_par['mucft'].' {
		
	public function __construct() {
		
	}
	
}
?>';
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates auto generate class for the module
	 *
	 * @return bool Success
	 */
	private static function _createClassGenerateAuto() {
		$file = 'class.generate.auto.php';
		
		$data = self::_getFileHeader('Auto generate class for module '.self::$_par['mname']).'

class autoGenerate'.self::$_par['mucft'].' {
		
	public function __construct() {
		
	}
	
}
?>';
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates install class for the module
	 *
	 * @return bool Success
	 */
	private static function _createClassInstall() {
		$file = 'class.install.php';
		
		$data = self::_getFileHeader('Install class for module '.self::$_par['mname']).'
class install'.self::$_par['mucft'].' {
	
	public $tables     = array(); // array with CREATE TABLE sql queries
	public $queries    = array(); // array with INSERT INTO (ALTER TABLE, etc ...) sql queries
	
	/**
	 * Installation constructor
	 * 
	 */
	function __construct() {
		
		$this->tables[] = "";
		
		//$this->tables[] = "";
		
		//$this->tables[] = "";
		
		$this->queries[] = "";
		
		//$this->queries[] = "";
		
		//$this->queries[] = "";
		
	}
}
		
?>';
		
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates DB Model for tables in module
	 *
	 * @return bool Success
	 */
	private static function _createClassDbmodel() {
		$file = 'class.dbmodel.php';
		
		$data = self::_getFileHeader('Database model for module '.self::$_par['mname']).'
abstract class dbModel'.self::$_par['mucft'].' {

}
?>';
		
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates pages and templates for administration
	 *
	 */
	private static function _createAdminFiles() {
		foreach (self::$_par['mparr'] as $page) {
			if ($page == 'index') $data = self::_getIndexPage($page);
			else $data = self::_getBasicPage($page);
			wgIo::writeFile(self::$_par['mpath'].'pages/'.$page.'.php', $data['page']);
			wgIo::writeFile(self::$_par['mpath'].'templates/'.$page.'.html', $data['temp']);
		}
		return true;
	}
	
	private static function _getIndexPage($page) {
		$data = array();
		$data['page'] = self::_getFileHeader('Page '.ucfirst($page).' in the '.self::$_par['mname'].' module', 'pages/').'
$system[\'parse\'][\'head\'] = \'\';
$system[\'parse\'][\'editor\'] = false;
$tab = new myTabs(\'myTabs\');
// ----------- encoding (Block: index) start -----------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

if (file_exists(wgPaths::getModulePath().\'/menu.xml\')) $arr = xml::xmlFileToArray(wgPaths::getModulePath().\'/menu.xml\');
else {
	$arr = wgIo::getFiles(wgPaths::getModulePath().\'/pages/\');
	sort($arr);
}
if (!empty($arr) && is_array($arr)) foreach ($arr as $k=>$page) {
	if (is_array($page)) {
		if ((bool) $page[\'show\'] && $k != \'index\') {
			if (isset($page[\'ajax\']) && (bool) $page[\'ajax\']) $ajax = \' ajax\';
			else $ajax = NULL;
			$link = wgPaths::makeModuleLink(wgSystem::getModule(), $k);
			$pagename = wgLang::get($page[\'name\']);
			$page = $k;
			$tpl->setCurrentBlock(\'functions\');
			$var[\'LINK\'] = $link;
			$var[\'PAGENAME\'] = $pagename;
			$var[\'FUNCIMAGE\'] = wgIcons::getPageIcon($page, $pagename);
			$var[\'DESCRIPTION\'] = wgLang::get(\'desc\'.$page);
			$tpl->setVariable($var);
			$tpl->parseBlock(\'functions\');
		}
	}
	else if ($page != \'index.php\') {
		$name = explode(\'.\', $page);
		$link = wgPaths::makeModuleLink(wgSystem::getModule(), $name[0]);
		$pagename = wgLang::get($name[0]);
		$page = $name[0];
		$tpl->setCurrentBlock(\'functions\');
		$var[\'LINK\'] = $link;
		$var[\'PAGENAME\'] = $pagename;
		$var[\'FUNCIMAGE\'] = wgIcons::getPageIcon($page, $pagename);
		$var[\'DESCRIPTION\'] = wgLang::get(\'desc\'.$page);
		$tpl->setVariable($var);
		$tpl->parseBlock(\'functions\');
	}
}
$var = array();
$tpl->parseBlock($block);
// ----------- countries end -----------
$system[\'parse\'][\'content\'] = $tpl->getBlock($block);
?>';
		$data['temp'] = '<!-- BEGIN index -->
<div id="wgindextiles">
	<ul>
		<!-- BEGIN functions -->
		<li>
			<h3><a href="{LINK}">{PAGENAME}</a></h3>
			<a href="{LINK}">{FUNCIMAGE}</a>
			<p>{DESCRIPTION}</p>
		</li>
		<!-- END functions -->
	</ul>
</div>
<!-- END index -->
';
		return $data;
	}
	
	private static function _getBasicPage($page) {
		$data = array();
		$data['page'] = self::_getFileHeader('Page '.ucfirst($page).' in the '.self::$_par['mname'].' module', 'pages/').'
$system[\'parse\'][\'head\'] = \'
<script type="text/javascript" src="./\'.wgPaths::getAdminPath(\'url\').\''.self::$_par['modid'].'js/functions.js"></script>
\'; // any code you want to include to the head section of the WebGuru administration
$system[\'parse\'][\'editor\'] = true; // enable or disable wysiwyg for user on the page (leave false if you are not using this one)
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

// setting plain variable
$var[\'TEXT\'] = \'Hello World :-)\';

// setting default _POST variable
wgSystem::defPostValue(\'myvalue\', \'My value with postback\');

// setting postback for _POST variables
$var = wgSystem::getFormCallback($var);

// adding variables to the template
$tpl->setVariable($var);

// parsing block from template
$tpl->parseBlock($block);
// --------------------------------- end content ---------------------------------
$var = array();
$system[\'parse\'][\'content\'] = $tpl->getBlock($block);
?>
';
		$data['temp'] = '<!-- BEGIN '.$page.' -->
<form action="{ACTION}" method="post">
	<h1>{TEXT}</h1>
	<p>
		<label>{wMYVALUELABEL}:</label>
		<input name="myvalue" id="myvalue" type="text" value="{MYVALUE}" />
	</p>
	<p>
		<!-- hidden "act" field is mandatory if you want to use action class system -->
		<input name="act" id="act" type="hidden" value="do'.$page.'job" />
		<input name="submit" id="submit" type="submit" value="{wSUBMIT}" />
	</p>
</form>
<!-- END '.$page.' -->			
		';
		return $data;
	}
	
	
	/**
	 * Creates language files for modules
	 *
	 */
	private static function _createLanguageFiles() {
		$path = self::$_par['mpath'].'languages/';
		$syslangs = wgIo::getFolders(wgPaths::getAdminPath().'languages/');
		foreach ($syslangs as $lname){
			wgIo::writeFile($path.$lname.'/global.'.self::$_par['modid'].'.txt', '');
			foreach (self::$_par['mparr'] as $page) {
				wgIo::writeFile($path.$lname.'/'.$page.'.txt', '');
			}
		}
	}
	
	/**
	 * Creates example ajax file for module
	 *
	 * @return bool Success
	 */
	private static function _createAjaxFiles() {
		$file = 'ajax/ajaxExample.php';
		
		$data = self::_getFileHeader('Example AJAX file for module '.self::$_par['mname'].'', 'ajax/').'
chdir(\'../../../\');
require(\'init/init.basic.php\');
require(\'init/init.admin.php\');

$par = wgGet::getValue(\'parameter\');

echo $par;

$db = NULL;
?>';
		wgIo::writeFile(self::$_par['mpath'].'js/functions.js', '');
		return wgIo::writeFile(self::$_par['mpath'].$file, $data);
	}
	
	/**
	 * Creates example actions files for module pages
	 *
	 */
	private static function _createActionsFiles() {
		foreach (self::$_par['mparr'] as $page) {
			$data = self::_getFileHeader('Page '.ucfirst($page).' in the '.self::$_par['mname'].' module', 'pages/').'
final class '.$page.'Actions'.ucfirst(self::$_par['modid']).' extends BaseActions {
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
		
	}
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function init() { wgError::add("You have run the test action in '.self::$_par['modid'].'Actions'.ucfirst($page).' class (".__LINE__."=>".__FILE__.")", 1);
		return true;
	}
	
}	
?>';	
		
			wgIo::writeFile(self::$_par['mpath'].'actions/class.'.$page.'.php', $data);
		}
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
 * @author       Fuerte International WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    '.WGVERSION.'
 * @wgdeveloper  '.$module->version.'
 * @since        '.self::$_par['adate'].'
 */
';		
	}
	
}

?>