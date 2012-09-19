<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. November 2008
 * 
 * @todo Put the default values on the top of the php page
 */
require_once('./system/developer/actions/class.admin.php');
final class adminonetableActionsDeveloper extends adminActionsDeveloper  {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	protected static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct($run=true) {
		parent::__construct(false);
		if ((bool) $run) {
			$data = self::_init();
			if ((bool) $data) self::writeFile($data); wgError::add('generated', 2);
		}
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool
	 */
	public static function _init() {
		$ok = true;
		self::$_par['modoname'] = wgPost::getValue('modoname');
		if (empty(self::$_par['modoname']) || self::$_par['modoname'] == '#') { wgError::add('nomodule');
			$ok = false;
		}
		self::$_par['modopage'] = wgPost::getValue('modopage');
		if (empty(self::$_par['modopage'])) { wgError::add('nomodulepage');
			$ok = false;
		}
		self::$_par['modoparent'] = wgPost::getValue('modoparent');
		if (empty(self::$_par['modoparent'])) { wgError::add('noparent');
			$ok = false;
		}
		self::$_par['modlpath'] = wgPaths::getModulePath('ftp', wgPost::getValue('modoname'));
		self::$_par['type'] = wgPost::getValue('setcontent');
		if (empty(self::$_par['type'])) { wgError::add('notype');
			$ok = false;
		}
		if (!$ok) return false;
		self::$_par['first'] = true;
		self::$_par['caldr'] = false;
		self::$_par['editr'] = (bool) wgPost::getValue('useoneeditor');
		parent::$_par['modid'] = wgPost::getValue('modoname');
		parent::$_par['mauth'] = wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname');
		parent::$_par['adate'] = date('j. F Y');
		parent::$_par['mpage'] = wgPost::getValue('modopage');
		self::$_par['defaults'] = array();
		$data = self::_prepareData();
		$content = self::_prepareTabsContent($data);
		$content = self::_makeTabsContent($content);
		$params['name'] = strtolower(self::_makeTempName(self::$_par['type']));
		$params['type'] = self::$_par['type'];
		if (self::$_par['type'] != 'blank') $params['table'] = self::$_par['type'];
		//$params['bigname'] = self::);
		//if (empty($name)) $name = 'Xxxx '.$k;
		//$block = valid::safeText($name);
		//$params['block'] = $block;
		$content['action'] = parent::_createTabActions($params);
		return $content;
	}
	
	// functions ---------------------------------------------------------------------------
	
	private static function _makeTabsContent($content) {
		$out = array();
		if (self::$_par['caldr']) $head = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
		else $head = NULL;
		if (self::$_par['editr']) $editor = 'true';
		else $editor = 'false';
		$out['php'] = '<?php
// add something to the head of the page here
$system[\'parse\'][\'head\'] = \''.$head.'\';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system[\'parse\'][\'editor\'] = '.$editor.';
$tab = new myTabs(\'myTabs\');

$params = array();
$var[\'ACTIONNAME\'] = \''.strtolower(self::_makeTempName(self::$_par['modopage'].self::$_par['type'])).'\';

// set default values for columns here'.implode('', self::$_par['defaults']).'

if (!(bool) wgGet::getValue(\'edit\')) {
	$item = new '.self::_getClassName(self::$_par['type'], 'Model').'();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = '.self::_getClassName(self::$_par['type'], 'Model').'::doSelectPKey(wgGet::getValue(\'edit\'));

';
		$out['html'] = '
<!-- BEGIN pagetabscontainer -->
<form action="{ACTION}" method="post">
	{PAGETABSCONTENT}
	<p class="bottombuttons">
		<input name="edit" type="hidden" value="{EDIT}" />
		<input name="act" type="hidden" value="{ACTIONNAME}" />
		<input name="reset" type="reset" value="{wRESET}" />
		<input name="apply" type="submit" value="{wAPPLY}" />
		<input name="submit" type="submit" value="{wSAVE}" />
	</p>
</form>
<!-- END pagetabscontainer -->	
';
		foreach ($content as $cont) {
			$out['php'] .= $cont['php'];
			$out['html'] .= $cont['html']."\n";
		}
		$out['php'] .= '// --------------------------------- end content -----------------------------------
$block = \'pagetabscontainer\';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var[\'EDIT\'] = $item->getPrimaryKey();
// inserting tabs into the main template
$var[\'PAGETABSCONTENT\'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system[\'parse\'][\'content\'] = $tpl->getBlock($block);
?>';
		return $out;
	}
	
	private static function _prepareTabsContent($data) {
		$new = array();
		foreach ($data['tabs'] as $k=>$name) {
			$new[$k] = array();
			$new[$k]['php'] = self::_getTabContentPhp($k, $data);
			$new[$k]['html'] = self::_getTabContentHtml($k, $data);
		}
		return $new;
	}
	
	private static function _getTabContentPhp($key, $data) {
		$out = '

//$var = array();';
		$classname = self::_getClassName(self::$_par['type'], 'Model');
		$item = NULL;
		$defs = array();
		if ((bool) self::$_par['first']) {
			$isdefault = 'true';
			self::$_par['first'] = false;
		}
		else $isdefault = 'false';
		foreach ($data['cols'][$key] as $col=>$name) {
			$isdate = false;
			$column = $data['info'][$col];
			$bigcol = self::_makeTempName($col);
			if (isset($data['fkeys'][$col]) && !empty($data['fkeys'][$col])) {
				$subclassname = self::_getClassName($data['fkeys'][$col][0], '').'Model';
				$item .= '
$params = array();
$params[\'baseclass\'] = \''.$subclassname.'\';
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getSelectBox(\''.$col.'\', '.self::_getGetFunc($col, 'item').', '.$subclassname.'::doSelect(), $params);';
				$defs[$col] = '
wgSystem::defPostValue('.$classname.'::COL_'.strtoupper($col).', \'\');';
			}
			else {
				if (eregi('datetime', strtolower($column['Type'])) || wgText::eregi('date', strtolower($column['Type']))) {
					self::$_par['caldr'] = true;
					$isdate = true;
					$item .= '
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getDateTimeBox(\''.$col.'\', '.self::_getGetFunc($col, 'item').');';
				}
				elseif (eregi('tinyint\(1\)', strtolower($column['Type']))) $item .= '
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getCheckBox(\''.$col.'\', '.self::_getGetFunc($col, 'item').', 1);';
				else $item .= '
$var[\'COL'.$bigcol.'\'] = '.self::_getGetFunc($col, 'item').';';
//$item[\''.$col.'\'] = NULL;';
				if ($isdate) $defs[$col] = '
wgSystem::defPostValue('.$classname.'::COL_'.strtoupper($col).', time());';
				else $defs[$col] = '
wgSystem::defPostValue('.$classname.'::COL_'.strtoupper($col).', \'\');';
				//$out .= '$var[\'COL'.self::_makeTempName($col).'\'] = '.self::_getGetFunc($col, 'item').';
//';
			}
		}
		$out = $out.$item;
		$out = '
// ----------------------------- starting '.$data['tabs'][$key].' ('.self::_getBlockName($key).') -----------------------------
$block = \''.self::_getBlockName($key).'\';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
'.$out.'
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get(\''.$data['tabs'][$key].'\'), '.$isdefault.', $tpl->getBlock($block));

';
		foreach ($defs as $k=>$v) self::$_par['defaults'][$k] = $v;
		return $out;
	}
	
	private static function _getBlockName($key) {
		$text = (string) $key;
		$num = '0123456789';
		$let = 'abcdefghij';
		$altext = '';
		$text = strtr($text, $num, $let);
		$ltext = strlen($text);
		for ($i=0; $i<$ltext; $i++) {
			if(isset($let[strpos($num, $text[$i])]) && strstr($num, $text[$i])) $text[$i] = $let[strpos($num, $text[$i])];
		}
		return strtolower(self::_makeTempName(self::$_par['type'].$text));
	}
	
	private static function _getTabContentHtml($key, $data) {
		$out = '
<!-- BEGIN '.self::_getBlockName($key).' -->
<p class="topbuttons">
	<input name="reset" type="reset" value="{wRESET}" />
	<input name="apply" type="submit" value="{wAPPLY}" />
	<input name="submit" type="submit" value="{wSAVE}" />
</p>
';
		$id = NULL;
		foreach ($data['cols'][$key] as $column=>$name) {
			$col = $column;
			$bigcol = self::_makeTempName($column);
			$editor = NULL;
			if (self::$_par['editr']) $editor = ' class="editor"';
			if ($col != 'id' && $col != 'added' && $col != 'changed') {
				$fullcode = false;
				if (eregi('tinyint\(1\)', strtolower($data['info'][$column]['Type']))) $fullcode = true;
				//if (eregi('text', strtolower($data['info'][$column]['Type']))) $fullcode = true;
				if (eregi('datetime', strtolower($data['info'][$column]['Type']))) $fullcode = true;
				if (isset($data['fkeys'][$col]) && !empty($data['fkeys'][$col])) $fullcode = true;
				if ($fullcode) {
					$out .= '<p>
	<label>{wCOL'.$bigcol.'}:</label>
	{FULLCOL'.$bigcol.'}
</p>
';
													}
				elseif (eregi('text', strtolower($data['info'][$column]['Type']))) {
					$out .= '<p>
	<label>{wCOL'.$bigcol.'}:</label>
	<textarea cols="50" rows="9" name="'.$col.'" id="'.$col.'"'.$editor.'>{COL'.$bigcol.'}</textarea>
</p>
';
				}
				else {
					$out .= '<p>
	<label>{wCOL'.$bigcol.'}:</label>
	<input name="'.$col.'" id="'.$col.'" type="text" value="{COL'.$bigcol.'}" />
</p>
';
				}
			}
			else $id = '<input name="edit" type="hidden" value="{COLID}" />
	';
		}
		$out .= '<!-- END '.self::_getBlockName($key).' -->
';
		return $out;
	}
	
	private static function _prepareData() {
		$post = wgSystem::getPost();
		$columns = array();
		$fkeys = array();
		$new = array();
		if (self::$_par['type'] != 0 || self::$_par['type'] != 'blank') {
			$columns = getDb::getTableColumns(self::$_par['type']);
			$arr = getDb::getTableKeys(self::$_par['type']);
			foreach ($arr as $key) if (isset($key['REFERENCED_COLUMN_NAME'])) {
				$new['fkeys'][$key['COLUMN_NAME']] = array($key['REFERENCED_TABLE_NAME'], $key['REFERENCED_COLUMN_NAME']);
			}
			$arr = NULL;
		}
		foreach ($columns as $col) {
			$name = $col['Field'];
			$checked = wgPost::getValue($name);
			$fnames = wgPost::getValue('name'.$name);
			$tnames = wgPost::getValue('tabname');
			if (!empty($checked) && is_array($checked)) foreach ($checked as $t=>$v) {
				if (isset($fnames[$t]) && !empty($fnames[$t])) $colname = $fnames[$t];
				else $colname = '{wCOL'.self::_makeTempName($name).'}';
				$new['cols'][$t][$name] = $colname;
				$new['tabs'][$t] = $tnames[$t];
			}
			$new['info'][$name] = $col;
		}
		$new['table'] = self::$_par['type'];
		return $new;
	}
	
	private static function _getGetFunc($column, $variable='val') {
		return '$'.$variable.'->get'.self::_getClassName($column).'()';
	}
	
	private static function _getClassName($table, $postfix='') {
		$table = explode('_', $table);
		foreach ($table as $k=>$part) $table[$k] = ucfirst(strtolower($part));
		return implode('', $table).$postfix;
	}
	
	private static function _makeTempName($text) {
		return strtoupper(str_ireplace('_', '', $text));
	}
	
	private static function writeFile($content, $backup=true) {
		$path = self::$_par['modlpath'];
		$file = self::$_par['modopage'];
		$acfile = strtolower(self::_makeTempName(self::$_par['modopage'].self::$_par['type']));
		if ((bool) $backup) {
			wgIo::backup($path.'actions/class.'.$acfile.'.php');
			wgIo::backup($path.'pages/'.$file.'.php');
			wgIo::backup($path.'templates/'.$file.'.html');
		}
		wgIo::writeFile($path.'actions/class.'.$acfile.'.php', $content['action']);
		wgIo::writeFile($path.'pages/'.$file.'.php', $content['php']);
		wgIo::writeFile($path.'templates/'.$file.'.html', $content['html']);
		//exit();
	}
	
}

?>