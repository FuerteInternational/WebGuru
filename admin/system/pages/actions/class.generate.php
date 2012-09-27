<?php
/**
 * Database class for table pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages
 * @author       Ondrej Rafaj
 * @version      2.0.0.0
 * @since        12. January 2009
 */

class generate {
	
	/**
	 * Opening delimiters for template
	 *
	 * @var array
	 */
	private static $_opDelimiter       = array();
	
	/**
	 * Closing delimiters for template
	 *
	 * @var array
	 */
	private static $_clDelimiter       = array();
	
	/**
	 * Function used to parse selected type of delimiter
	 *
	 * @var array
	 */
	private static $_fcDelimiter       = array();
	
	/**
	 * Array with all pages objects
	 *
	 * @var array
	 */
	private static $_pages             = array();
	
	/**
	 * Array caching templates objects
	 *
	 * @var array
	 */
	private static $_templates         = array();
	
	/**
	 * Shortcuts for self::$_pages
	 * Contains:
	 * 	- web
	 * 	- language
	 *
	 * @var array
	 */
	private static $_shortcuts         = array();
	
	/**
	 * Temporary data for page
	 * Contains (at least :-)):
	 * 	- used modules
	 * 	- used templates
	 *
	 * @var array
	 */
	private static $_tempdata          = array();
	
	private static $_actpath           = './';
	
	/**
	 * Class constructor, declaring delimiters and other arrays
	 * 
	 * @name __construct
	 * @author Ondrej Rafaj
	 */
	public function __construct() {
		// parsing "old style templates"
		self::$_opDelimiter['main']    = '{#';
		self::$_clDelimiter['main']    = '}';
		self::$_fcDelimiter['main']    = 'parseTemplate';
		// parsing variables
		self::$_opDelimiter['vars']    = '{%';
		self::$_clDelimiter['vars']    = '}';
		self::$_fcDelimiter['vars']    = 'parseVariables';
		
		self::$_shortcuts['web']       = array();
		self::$_shortcuts['language']  = array();
		
		self::$_tempdata['var']        = array();
		self::$_tempdata['js']         = array();
		self::$_tempdata['head']       = array();
		self::$_tempdata['pretext']    = array();
		
	}
	
	private static function _init() {
		$store_as = 'file';
		$options = array('cache_dir' => wgPaths::getTempPath());
		$cache = new wgCache($store_as, $options);
		
		
		new generate();
	}
	
	/**
	 * Generates all webs, languages and pages
	 * 
	 * @name generateAll
	 * @author Ondrej Rafaj
	 * @return bool Success
	 */
	public static function generateAll() {
		$mt = microtime();
		self::_init();
		self::_getAllPages();
		$folder = wgPaths::getPath().'wgwebdata/';
		wgIo::mkdir($folder);
		wgIo::deleteContent($folder);
		$count = count(self::$_pages);
		$a=1;
		foreach (self::$_pages as $id=>$page) {
			wgIo::createTempFile('generate', wgLang::get('genpage').': '.$a.' / '.$count);
			self::_writeOnePage($id);
			//print round(memory_get_usage() / 1048576, 4).' Mb. ('.$id.')<br />';
			//unset(self::$_pages[$id]);
			$a++;
		}
		self::_doForAll();
		//wgIo::deleteTempFile('generate');
		return round(timer::getTime($mt), 3);
	}
	
	private static function _doForAll() {
		self::generateModulesAutoFunctions();
		self::_addPagesRewrites();
	}
	
	private static function _addPagesRewrites() {
		$arr = self::_getAllPages();
		//print_r($arr);
		$data = array();
		$mHta = wgModules::runModule('hraccess');
		if (!(bool) $mHta) $mode = 'w';
		else $mode = 'a';
		foreach ($arr as $pg) {
			$rew = $pg->getRewrite();
			//$pg = new PagesModel();
			if (!empty($rew)) {
				if (!isset($data[$pg->getSystemWebsitesId()])) $data[$pg->getSystemWebsitesId()] = NULL;
				$webpath = wgPaths::getWebPath($pg->getSystemWebsitesId());
				if (!empty($webpath)) $pagepath = str_ireplace($webpath, '', wgPaths::getPagePath($pg->getId()));
				else $pagepath = wgPaths::getPagePath($pg->getId());
				$data[$pg->getSystemWebsitesId()] .= 'RewriteRule ^'.$rew.'$ '.$pagepath.NL;
			}
		}
		
		foreach ($data as $w=>$d) {
			$path = '../'.wgPaths::getWebPath($w).'.htaccess';
			//print (int) $w;
			//print $path;
			$d .= '# module pages rewrites'.NL;
			if ($mode == 'w') $d = 'RewriteEngine on'.NL.$d;
			//chdir('..');
			//print wgPaths::getPath();
			wgIo::writeFile($path, $d, $mode);
			//chdir(wgPaths::getAdminPath());
		}
	}
	
	
	/**
	 * Generates one page from any web or language
	 *
	 * @name generatePage
	 * @author Ondrej Rafaj
	 * @param int $id Page id
	 */
	public static function generatePage($id) {
		$mt = microtime();
		self::_init();
		self::_getOnePage($id);
		$folder = wgPaths::getPath().'wgwebdata/';
		wgIo::mkdir($folder);
		//wgIo::deleteContent($folder);
		$count = count(self::$_pages);
		$a=0;
		foreach (self::$_pages as $id=>$page) {
			wgIo::createTempFile('generate', wgLang::get('genpage').': '.($a + 1).' / '.$count);
			self::_writeOnePage($id);
			$a++;
		}
		self::_doForAll();
		return (bool) $a;
	}

	public static function generatePreview($id) {
		$mt = microtime();
		self::_init();
		self::setPath('../');
		self::_writeOnePage($id, true);
		return round(timer::getTime($mt), 3);
	}

	public static function getPreview($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		self::_init();
		return self::_generateOnePage($id, true);
	}
	
	public function setPath($path) {
		self::$_actpath = $path;
	}

	public function getPath() {
		return self::$_actpath;
	}

	/**
	 * Generates all pages in one website
	 *
	 * @name generateWeb
	 * @author Ondrej Rafaj
	 * @param int $id Web id
	 */
	public static function generateWeb($id) {
		$mt = microtime();
		self::_init();
		self::_getPagesForWebsite($id);
		//print_r(self::$_pages);
		$folder = wgPaths::getPath().'wgwebdata/';
		wgIo::mkdir($folder);
		//wgIo::deleteContent($folder);
		$count = count(self::$_pages);
		$a=0;
		foreach (self::$_pages as $id=>$page) {
			wgIo::createTempFile('generate', wgLang::get('genpage').': '.($a + 1).' / '.$count);
			self::_writeOnePage($id);
			$a++;
		}
		//self::_doForAll();
		self::generateModulesAutoFunctions();
		return (int) $a;
	}
	
	public static function generateModulesAutoFunctions() {
		$mods = wgModules::getModules();
		foreach ($mods as $k=>$m) {
			$path = wgPaths::getModulePath('ftp', $m['name']).'class.generate.auto.php';
			if (file_exists($path)) {
				require_once($path);
				$class = 'autoGenerate'.ucfirst($m['name']);
				new $class;
			}
		}
	}
	
	private static function _writeOnePage($id, $preview=false) {
		if ((bool) $preview) $folder = wgPaths::getPath().'temp/';
		else $folder = wgPaths::getPath().'wgwebdata/';
		if (!is_dir($folder)) wgIo::mkdir($folder);
		$data = self::_generateOnePage($id, $preview);
		if (false) $id = 'home';
		if ((bool) $preview) $data .= '<?php wgIo::delete(\''.$folder.$id.'.php\'); ?>';
		return self::writeFiles($id, $folder, $data);
	}
	
	private static function writeFiles($id, $folder, $data) {
		$page = self::_getOnePage($id);
		if (!wgSystem::isSafeMode()) self::createNavigationFiles($id, $page);
		return wgIo::writeFile($folder.$id.'.php', $data);
	}
	
	private static function createNavigationFiles($id, $page) {
		$web = $page->getSystemWebsitesId();
		$lang = $page->getSystemLanguageId();
		$path = wgPaths::getPagePath($id);
		$fullpath = wgPaths::getPath().wgPaths::getPagePath($id);
		$reverse = wgPaths::getReversePath($path);
		$writable = (bool) wgIo::mkdirWritable($fullpath);
		if ($writable) {
			$homeid = 1;
			if ($reverse != './') $chdir = '
		chdir(\''.$reverse.'\');';
			else $chdir = NULL;
			$data = '<?php
	$id = '.$id.';
	$home = '.$homeid.';
	if (is_dir(\''.$reverse.'wgwebdata/\')) {'.$chdir.'
		if (!file_exists(\'./wgwebdata/\'.$id.\'.php\')) {
			if ($id == $home) die(\'<strong>WebGuru Error:</strong> Website was not generated!!!\');
			else $id = $home;
		}
		include(\'./wgwebdata/\'.$id.\'.php\');
	}
	else die(\'<strong>WebGuru Error:</strong> No '.$reverse.'wgwebdata/ folder!!!\');
	?>
	';
			return (bool) wgIo::writeFile($fullpath.'index.php', $data);
		}
		else return false;
	}
	
	private static function _generateOneContent($id) {
		if (!isset(self::$_pages[$id])) return false;
		$folder = wgPaths::getPath().'wgwebdata/';
		if (!is_dir($folder)) wgIo::mkdir($folder);
		$data = self::parseTemplate(self::$_pages[$id]->getPage(), self::$_pages[$id]);
		return (bool) wgIo::writeFile($folder.'content-'.$id.'.php', $data);
	}

	/**
	 * Generates all pages in one language (for one selected website or all of them)
	 *
	 * @name generateLanguage
	 * @author Ondrej Rafaj
	 * @param int $id Language id
	 * @param int $web Website id
	 */
	public static function generateLanguage($id, $web=0) {
		self::_init();
		self::_getAllPages();
		$count = count(self::$_pages);
		$a=1;
		$folder = wgPaths::getPath().'wgwebdata/';
		if (!is_dir($folder)) wgIo::mkdir($folder);
		foreach (self::$_pages as $id=>$page) {
			wgIo::createTempFile('generate', wgLang::get('genpage').': '.$a.' / '.$count);
			$data = self::_generateOnePage($id);
			wgIo::writeFile($folder.$id.'.php', $data);
			$a++;
		}
		self::_doForAll();
		wgIo::deleteTempFile('generate');
	}
	
	private static function _doAccessRedirection($page) {
		if (wgModules::isModule('users')) {
			$out = NULL;
			if ((bool) $page->getRedirect1()) {
				$path = wgPaths::getPagePath($page->getRedirect1(), 'url');
				$err = NULL;
				if ((bool) $page->getRedirect3()) $err = NL.'	wgError::add(\''.$page->getRedirect3().'\');';
				$out .= 'if (!moduleUsers::isLogged()) {'.$err.'
	wgPaths::redirect(\''.$path.'\');
}';
			}
			if ((bool) $page->getRedirect2()) {
				$path = wgPaths::getPagePath($page->getRedirect2(), 'url');
				$err = NULL;
				if ((bool) $page->getRedirect4()) $err = NL.'	wgError::add(\''.$page->getRedirect4().'\');';
				$out .= 'if (moduleUsers::isLogged()) {'.$err.'
	wgPaths::redirect(\''.$path.'\');
}';
			}
			self::$_tempdata['pretext'] .= $out;
			self::_addToModules('users');
		}
	}
	
	
	public static function parseTemplate($temp, $page, $st=0) {
		$id = (int) $page->getPrimaryKey();
		$tpl = new HTML_Template_IT();
		$tpl->openingDelimiter = self::$_opDelimiter['main'];
		$tpl->closingDelimiter = self::$_clDelimiter['main'];
		$tpl->HTML_Template_IT();
		$tpl->setTemplate($temp, true, false);
		$tpl->setCurrentBlock();
		if (!isset($tpl->blockvariables['__global__']) || empty($tpl->blockvariables['__global__'])) return $temp;
		$bv = $tpl->blockvariables['__global__'];
		$var = array();
		if (isset($bv['TITLE'])) $var['TITLE']               = self::_wrapOnPageFactor('title', $page->getTitle());
		if (isset($bv['H1'])) $var['H1']                     = self::_wrapOnPageFactor('h1', $page->getHeading1());
		if (isset($bv['H2'])) $var['H2']                     = self::_wrapOnPageFactor('h2', $page->getHeading2());
		if (isset($bv['H3'])) $var['H3']                     = self::_wrapOnPageFactor('h3', $page->getHeading3());
		if (isset($bv['NAME'])) $var['NAME']                 = $page->getName();
		if (isset($bv['IDENTIFIER'])) $var['IDENTIFIER']     = $page->getIdentifier();
		if (isset($bv['KEYWORDS'])) $var['KEYWORDS']         = self::_wrapOnPageFactor('keywords', $page->getKeywords());
		if (isset($bv['DESCRIPTION'])) $var['DESCRIPTION']   = self::_wrapOnPageFactor('description', $page->getDescription());
		if (isset($bv['SELF'])) $var['SELF']   			     = wgPaths::getPagePath($page->getId(), 'url');
		if (isset($bv['YEAR'])) $var['YEAR']   			     = '<?php echo date(\'Y\'); ?>';
		if (isset($bv['BREADCRUMBS'])) $var['BREADCRUMBS']   = self::getBreadcrumbs($page);
		if (isset($bv['ADDTEXT1'])) $var['ADDTEXT1']         = $page->getAddtext1();
		if (isset($bv['ADDTEXT2'])) $var['ADDTEXT2']         = $page->getAddtext2();
		if (isset($bv['NOTE'])) $var['NOTE']                 = $page->getNote();
		/*foreach ($var as $k=>$v) $var[$k] = '<?php if (isset($web[\''.strtolower($k).'\'])) echo $web[\''.strtolower($k).'\']; else { ?>'.$v.'<?php } ?>';*/
		if (isset($bv['REWRITE'])) $var['REWRITE']           = $page->getRewrite();
		if (isset($bv['LANGCODE'])) $var['LANGCODE']         = '<?php echo wgLang::getFrontCode(); ?>';
		if (isset($bv['ADMINROOT'])) $var['ADMINROOT']       = wgPaths::getAdminPath('url');
		if (isset($bv['ROOT'])) $var['ROOT']       			 = wgPaths::getPath('url');
		if (isset($bv['WEBROOT'])) $var['WEBROOT']           = wgPaths::getWebPath($page->getSystemWebsitesId(), 'url');
		if (isset($bv['DOCROOT'])) $var['DOCROOT']           = wgPaths::getReversePath(wgPaths::getWebPath($page->getSystemWebsitesId()));
		if (isset($bv['CONTENT'])) {
			$var['CONTENT']                                  = self::parseTemplate($page->getPage(), $page);
			$var['CONTENT']                                  = self::_makeXeditContent($var['CONTENT']);
		}
		if (isset($bv['HEAD'])) $var['HEAD']                 = '{*HEAD}'; // Head hack
		$dvar = array();
		foreach ($tpl->blockvariables as $arr) {
			$arr = array_keys($arr);
			foreach ($arr as $bv) {
				if (!isset($var[$bv])) {
					$p = explode('_', $bv);
					if ($p[0] == 'TMP' || $p[0] == 'TEMPLATE' || $p[0] == 'TEMP') $dvar[$bv] = self::parseTemplate(self::_getTemplateByIdentifier($p[1]), $page);
					if ($p[0] == 'ERRORS' || $p[0] == 'ERROR') $dvar[$bv] = self::_parseErrors($p);
					if ($p[0] == 'ADD' || $p[0] == 'ADDON') $dvar[$bv] = self::_parseAddon($p);
					if ($p[0] == 'INC' || $p[0] == 'INCLUDE') $dvar[$bv] = self::parseTemplate(wgIncludes::getIncludeCode($p[1], $p[2]), $page);
					if ($p[0] == 'FRONT' || $p[0] == 'FRONTEND') $dvar[$bv] = self::_sortCodeOutput(self::getFrontendCode($p, $page), $page);
					if ($p[0] == 'STATIC') $dvar[$bv] = self::_sortCodeOutput(self::getFrontendCode($p, $page, true), $page);
					if ($p[0] == 'LANG' || $p[0] == 'LNG') {
						wgModules::runModule('languages');
						$data = moduleLanguages::getTranslationCode($p[1], $page->getId());
						$dvar[$bv] = self::_sortCodeOutput($data, $page);
						//$dvar[$bv] = $data['content'];
					}
					if ($p[0] == 'MOD' || $p[0] == 'MODULE') {
						$data = self::_parseModule($p); 
						$dvar[$bv] = self::_sortCodeOutput($data, $page);
						$data = NULL;
					}
					if ($p[0] == 'AJAX') $dvar[$bv] = self::_getAjaxLink($p);
					if ($p[0] == 'LINK') $dvar[$bv] = self::_getLink($p);
					if ($p[0] == 'ACTIVE') $dvar[$bv] = self::_getActive($page, $p);
				}
			}
		}
		$tpl->setVariable($var);
		$tpl->setVariable($dvar);
		$tpl->parse();
		$temp = $tpl->get();
		$temp = self::parseTemplate($temp, $page);
		return $temp;
	}
	
	public static function getFrontendCode($params, $page, $hardInclude=false) {
		$module = $params[1];
		$file = $params[2];
		$out = array();
		$path = wgPaths::getModulePath('ftp', $module).'frontend/'.$file.'.php';
		if (!$hardInclude) {
			if (file_exists($path)) $out['content'] = '<?php include(wgPaths::getModulePath(\'ftp\', \''.$module.'\').\'frontend/'.$file.'.php\'); ?>';
		}
		else {
			$out['content'] = self::parseTemplate(file_get_contents($path), $page);
		}
 		$path = wgPaths::getModulePath('ftp', $module).'frontend/'.$file.'.pretext.php';
		if (!$hardInclude) {
			if (file_exists($path)) $out['pretext'] = 'include(wgPaths::getModulePath(\'ftp\', \''.$module.'\').\'frontend/'.$file.'.pretext.php\');'.NL;
		}
		else $out['pretext'] = self::parseTemplate(file_get_contents($path), $page);
		return $out;
	}
	
	public static function _wrapOnPageFactor($type, $text) {
		return '<?php if (!isset($system[\'seo\'][\''.$type.'\']) || empty($system[\'seo\'][\''.$type.'\'])) echo \''.str_ireplace("'", "\\'", $text).'\'; else echo $system[\'seo\'][\''.$type.'\']; ?>';
	}
	
	
	public static function getBreadcrumbs($page) {
		$arr = PagesModel::makeBreadcrumbsArray($page->getId());
		$arr = array_reverse($arr);
		//$data = '<a href="'.wgPaths::getPagePath().'">'.wgLang::get('homepage').'</a>';
		$data = NULL;
		$separator = NULL;
		$x=1;
		$c = count($arr);
		foreach ($arr as $p) if ((bool) $p->getId()) if ($p->getHome() == 0) {
			if ($x == $c) $data .= $separator.'<span>'.$p->getName().'<span>';
			else $data .= $separator.'<a href="'.wgPaths::getPagePath($p->getParentid()).'">'.$p->getName().'</a>';
			$x++;
		}
		return $data;
	}
	
	
	private static function _sortCodeOutput($data, $page) {
		$out = '';
		if (is_array($data)) {
			if (isset($data['modules'])) self::_addToModules($data['modules']);
			if (isset($data['pretext']) ) self::$_tempdata['pretext'] .= $data['pretext'];
			if (isset($data['once'])) {
				if (is_array($data['once'])) foreach ($data['once'] as $code) self::_addOneOnce($code);
				else self::_addOneOnce($data['once']);
			}
			if (isset($data['content'])) $out = self::parseTemplate($data['content'], $page);
		}
		else $out = $data;
		return $out;
	}
	
	private static function _addOneOnce($code) {
		if (!isset(self::$_tempdata['once'])) self::$_tempdata['once'] = array();
		$ok = true;
		foreach (self::$_tempdata['once'] as $c) if ($c == $code) $ok = false;
		if ((bool) $ok) self::$_tempdata['once'][] = $code;
	}
	
	
	private static function _makeXeditContent($content) {
		$content = '<?php if ((bool) wgUsers::isLogged()) { ?><div id="wgXeditContent"><?php } ?>'.$content.'<?php if ((bool) wgUsers::isLogged()) { ?></div><?php } ?>';
		return $content;
	}
	
	private static function _addToModules($arr) {
		if (empty($arr)) return false;
		if (is_array($arr)) foreach ($arr as $mod) self::$_tempdata['modules'][$mod] = 1;
		else self::$_tempdata['modules'][$arr] = 1;
		return true;
	}
	
	
	private static function _parseErrors($params) {
		if (isset($params[1])) $class = $params[1];
		else $class = 'errors';
		$data = '<?php
$arr = wgError::getErrors();
if (!empty($arr)) foreach ($arr as $type=>$group) {
	if ($type == 0) $class = \'red\';
	elseif ($type == 1) $class = \'orange\';
	else $class = \'green\';
	echo \'<ul class="'.$class.'">\';
	foreach ($group as $err) echo \'<li class="\'.$class.\'">\'.$err[0].\'</li>\';
	echo \'</ul>\';
} wgError::clearSession();
unset($err);
unset($grp);
?>';
		return $data;
	}
	
	private static function _parseAddon($params) {
		;
	}
	
	private static function _parseModule($params) {
		if (!isset($params[1])) return false;
		$mname = $params[1];
		$path = wgPaths::getModulePath('ftp', $mname).'class.generate.php';
		if (!file_exists($path)) return false;
		require_once($path);
		$class = 'generate'.ucfirst($mname);
		$cl = new $class();
		if (isset($params[2])) {
			$fname = 'generate'.ucfirst($params[2]);
			if (method_exists($cl, $fname)) {
				$ret = $cl->$fname($params);
				if (!empty($ret)) return $ret;
				else array('content'=>'', 'pretext'=>'');
			}
		}
		return array('content'=>'', 'pretext'=>'');
	}
	
	
	private static function _getTempVariables($blArr) {
		$var = array();
		$td = self::$_tempdata['var'];
		foreach ($blArr as $k=>$v) if (isset($td[$k])) $var[$k] = $td[$k];
		return $var;
	}
	
	private static function _getHead($pageHead, $page) {
		$data = NULL;
		if (isset(self::$_tempdata['js'])) {
			$js = &self::$_tempdata['js'];
			if (is_array($js) && !empty($js)) foreach ($js as $k=>$v) {
				if (file_exists(wgPaths::getAdminPath().'js/'.$k)) {
					$data .= '<script type="text/javascript" src="{#ADMINROOT}js/'.$k.'"></script>
';
				}
				else $data .= $v;
			}
		}
		$data .= '<?php if ((bool) wgUsers::isLogged()) { ?><script type="text/javascript" src="{#ADMINROOT}system/pages/data/xeditbar.js"></script>
<script type="text/javascript">
<!--
wgXeditBar.root = \'{#ADMINROOT}\';
wgXeditBar.checkJquery();
$(document).ready( function() {
	//wgXeditBar.init();
});
-->
</script>
<?php } ?>
';
		return self::parseTemplate($data.$pageHead, $page);
	}
	
	private static function _getActive($page, $params, $status='passive') {
		if ($status == 'active') return $status;
		if (isset($params[2])) {
			$func = 'get'.ucfirst($params[2]);
			if (is_numeric($params[2])) return '<?php 
if (isset($_GET[\''.$params[1].'\']) && $_GET[\''.$params[1].'\'] == '.(int) $params[2].') echo \'active\';
else echo \'passive\';
?>';
			else return '<?php 
if (isset($_GET[\''.$params[1].'\']) && $_GET[\''.$params[1].'\'] == $v->'.$func.'()) echo \'active\';
else echo \'passive\';
?>';
		}
		else {
			$pid = (int) $params[1];
			if ($pid == $page->getId()) return 'active';
			else {
				if ($page->getParentid() != 0) return self::_getActive(self::_getOnePage($page->getParentid()), $pid, $status);
				else return $status;
			}
		}
	}
	
	private static function _getLink($params) {
		if (is_array($params)) $id = (int) $params[1];
		else $id = (int) $params;
		if ($id == 0 || $id == 1) return wgPaths::getPath('url');
		$forpage = self::_getOnePage($id);
		if ((bool) $forpage->getRewrite()) return wgPaths::getWebPath($forpage->getSystemWebsitesId()).$forpage->getRewrite();
		else {
			if (wgSystem::isSafeMode()) return wgPaths::getPath('url').'?pageid='.$id;
			else return wgPaths::getPagePath($id, 'url');
		}
	}
	
	private static function _getAjaxLink($params) {
		global $conf;
		$id = (int) $params[1];
		if (!(bool) $id) return NULL;
		self::$_tempdata['js']['jquery.js'] = NULL;
		if (isset($params[2]) && !empty($params[2])) $div = (string) $params[2];
		else {
			if (isset($conf['ajax']['content']) && !empty($conf['ajax']['content'])) $div = $conf['ajax']['content'];
			else $div = 'content';
		}
		return ' onclick="$(\'#'.$div.'\').load(\''.wgPaths::getPath('url').'wgwebdata/content-'.$id.'.php\'); return false;"';
	}
	
	private static function _getTemplateByIdentifier($identifier) {
		$conn = new wgConnector();
		$conn->where(PagesTemplatesModel::COL_IDENTIFIER, $identifier);
		$conn->limit(1);
		$ret = PagesTemplatesModel::doSelect($conn);
		if (isset($ret[0]) &&!empty($ret[0])) {
			 $temp = $ret[0]->getTemplate();
			 if ((bool) $ret[0]->getRegistered()) self::_addToModules('users');
			 if ($ret[0]->getRegistered() == 1) $temp = '<?php if (moduleUsers::isLogged()) { ?>'.$temp.'<?php } ?>';
			 elseif ($ret[0]->getRegistered() == 2) $temp = '<?php if (!moduleUsers::isLogged()) { ?>'.$temp.'<?php } ?>';
			 return $temp;
		}
		else return '';
	}
	
	/**
	 * Parse template
	 *
	 * @name _parseTemplate
	 * @author Ondrej Rafaj
	 * @param string $template Template block
	 * @return string Parsed template
	 * /
	private static function _parseTemplate($template=NULL) {
		
		return $template;
	}*/
	
	/**
	 * Parse template variables
	 *
	 * @name _parseVariables
	 * @author Ondrej Rafaj
	 * @param string $template Template block
	 * @return string Parsed template
	 */
	private static function _parseVariables($template=NULL) {
		
		return $template;
	}
	
	/**
	 * Generates one one complete page and returns the code of it
	 *
	 * @name _generateOnePage
	 * @author Ondrej Rafaj
	 * @param int $id Page id
	 * @return string Page
	 */
	private static function _generateOnePage($id, $preview=false) {
		global $conf;
		self::$_tempdata = array();
		$page = self::_getOnePage($id);
		self::$_tempdata['var'] = array();
		self::$_tempdata['pretext'] = '';
		self::$_tempdata['modules'] = array();
		if (!(bool) $preview) self::_generateOneContent($id);
		self::$_tempdata['var'] = array();
		self::$_tempdata['pretext'] = '';
		self::$_tempdata['modules'] = array();
		self::_doAccessRedirection($page);
		$rootpath = './';
		if ((bool) $preview) $rootpath = '../';
		$var = array();
		$var['ERRORREP']                       = 'E_ALL';
		require_once('class.wgConfig.php');
		$var['CONFIG']                         = wgConfig::getConfigAsPhpCode();
		$var['WEBROOT']                        = WEBROOT;
		$var['ROOTPATH']                       = $rootpath;
		$var['PAGEID']                         = $page->getPrimaryKey();
		$var['LANGCODE']   					   = '';
		$var['LANGID']    					   = $page->getSystemLanguageId('tblevents', 'listofevents');
		$var['WEBID']    					   = $page->getSystemWebsitesId();
		$var['TITLE']  						   = str_ireplace("'", "\'", $page->getTitle());
		$var['DEVELOP']  					   = (DEVELOP == true) ? 'true' : 'false';
		$var['XEDIT']    					   = '';
		$var['MODULES']  					   = self::_getRunModules();
		$temp = self::_getOneTemplate($page->getPagesTemplatesId(), $page->getId());
		if (!is_string($temp)) $template = $temp->getTemplate();
		else $template = $temp;
		$var['TEMPLATE']   					   = self::parseTemplate($template, $page);
		$var['TEMPLATE']     				   = preg_replace("(\<\?xml.*\?\>)", "<?php echo '$0'; ?>\n", $var['TEMPLATE']); // php/xml bug
		$var['PRETEXT'] 	 				   = self::_getPretext($page);
		$baseTemp = self::_getSystemTemplate();
		$temp = wgParse::parseVarTemplate($baseTemp, $var);
		$temp = str_replace('{*HEAD}', self::_getHead($page->getHead(), $page), $temp);
		//return phpCompressor::compress($temp);
		return $temp;
	}
	
	private static function _getSystemTemplate() {
		$data = wgIo::readFile(wgPaths::getModulePath('ftp', 'pages').'data/simple.generate.php');
		//if (DEVELOP == true) $data = phpCompressor::compress($data);
		return $data;
	}
	
	private static function _getPretext($page) {
		$data = NULL;
		if (!empty(self::$_tempdata['modules'])) foreach (self::$_tempdata['modules'] as $mod=>$v) {
			$data .= '$m'.ucfirst($mod).' = $mod->runModule(\''.$mod.'\');'."\r\n";
		}
		if (isset(self::$_tempdata['once']) && is_array(self::$_tempdata['once'])) {
			foreach (self::$_tempdata['once'] as $code) $data .= $code."\r\n";
		}
		if (!isset(self::$_tempdata['pretext'])) self::$_tempdata['pretext'] = NULL;
		return self::parseTemplate($data.self::$_tempdata['pretext'], $page);
	}
	
	private static function _getRunModules() {
		
		return '';
	}
	
	/**
	 * Returns one page from cache
	 *
	 * @param int $id Page id
	 * @return object Page object
	 */
	private static function _getOnePage($id) {
		$id = (int) $id;
		if (!(bool) $id) {
			self::$_pages = array();
			return false;
		}
		if (isset(self::$_pages[$id])) return self::$_pages[$id];
		else {
			self::$_pages[$id] = PagesModel::doSelectPKey($id);
			return self::$_pages[$id];
		}
	}
	
	private static function _getPagesForWebsite($id) {
		$id = (int) $id;
		if (!empty(self::$_pages) || !is_array(self::$_pages)) self::$_pages = array();
		$arr = PagesModel::getPagesForWebsite($id, true);
		foreach ($arr as $page) if ((bool) $page->getSystemLanguageId()) {
			$id    = (int) $page->getPrimaryKey();
			$web   = (int) $page->getSystemWebsitesId();
			$lang  = (int) $page->getSystemLanguageId();
			self::$_pages[$id] = $page;
			self::$_shortcuts['web'][$web][$id] = &self::$_pages[$id];
			self::$_shortcuts['language'][$lang][$id] = &self::$_pages[$id];
		}
		return self::$_pages;
	}
	
	private static function _getOneTemplate($id, $pid=0) {
		$id  = (int) $id;
		if (!(bool) $id) {
			$page = self::_getOnePage($pid);
			if ((bool) $page->getPagesTemplatesId()) $id = $page->getPagesTemplatesId();
			else {
				if ($page->getHome() && !(bool) $page->getPagesTemplatesId()) return '{#CONTENT}';
				else {
					if (!(bool) $page->getParentid()) {
						$pid = PagesModel::getHomeId($page->getSystemLanguageId(), $page->getSystemWebsitesId());
						$page = self::_getOnePage($pid);
						return self::_getOneTemplate($page->getPagesTemplatesId(), $page->getId());
					}
					else return self::_getOneTemplate(0, $page->getParentid());
				}
			}
		}
		if (isset(self::$_templates[$id])) return self::$_templates[$id];
		else {
			if ((bool) $pid && $id == -1) {}
			self::$_templates[$id] = PagesTemplatesModel::doSelectPKey($id);
			return self::$_templates[$id];
		}
	}
	
	/**
	 * Filling page cache and creating shortcuts (&) for them
	 * 
	 * @name _getAllPages
	 * @author Ondrej Rafaj
	 */
	private static function _getAllPages() {
		$arr = PagesModel::getEnabledForWebsite();
		foreach ($arr as $page) {
			$id    = (int) $page->getPrimaryKey();
			$web   = (int) $page->getSystemWebsitesId();
			$lang  = (int) $page->getSystemLanguageId();
			self::$_pages[$id] = $page;
			self::$_shortcuts['web'][$web][$id] = &self::$_pages[$id];
			self::$_shortcuts['language'][$lang][$id] = &self::$_pages[$id];
		}
		return self::$_pages;
	}
	
	/**
	 * Object destructor
	 */
	public function __destruct() {

	}
}


?>