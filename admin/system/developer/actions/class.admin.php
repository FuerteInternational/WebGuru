<?php
/**
 * Generating new admin pages
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 * 
 * @todo Finish creating of the action class for pages
 * @todo Improve actions class generator when there will be no primary key
 */


class adminActionsDeveloper extends BaseActions {
	
	/**
	 * All variables neccessary for module
	 *
	 * @var array
	 */
	protected static $_par = array();
	
	const DEVGENTOFOLDER = 'system';
	
	/**
	 * Object constructor, assigning variables to the class from post
	 *
	 */
	public function __construct($run=true) {
		if ((bool) $run) {
			if ((bool) wgGet::getValue('parameter', 'delete')) {
				$module = wgGet::getValue('parameter', 'module');
				$page = wgGet::getValue('parameter', 'delete');
				$path = wgPaths::getModulePath('ftp', $module);
				//wgIo::delete($path.'actions/class'.$page.'.php');
				wgIo::backup($path.'templates/'.$page.'.html');
				wgIo::backup($path.'pages/'.$page.'.php');
				wgIo::delete($path.'templates/'.$page.'.html');
				wgIo::delete($path.'pages/'.$page.'.php');
			}
			else {
				$ok = true;
				self::$_par['mname'] = ucfirst(wgPost::getValue('modname'));
				if (self::$_par['mname'] == '#' || empty(self::$_par['mname'])) { wgError::add('nomodselected');
					$ok = false;
				}
				self::$_par['modid'] = wgPost::getValue('modname');
				self::$_par['mpage'] = wgPost::getValue('modpage');
				if (self::$_par['mpage'] == '#' || empty(self::$_par['mpage'])) { wgError::add('nopageselected');
					$ok = false;
				}
				self::$_par['editr'] = (bool) wgPost::getValue('useeditor');
				self::$_par['caldr'] = (bool) false;
				self::$_par['crttb'] = wgPost::getValue('createtab'); // function to use
				self::$_par['tabnm'] = wgPost::getValue('tabname'); // name of the tab
				self::$_par['eflds'] = wgPost::getValue('efields'); // use edit fields
				self::$_par['mucft'] = ucfirst(self::$_par['modid']);
				self::$_par['mauth'] = wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname');
				self::$_par['adate'] = date('j. F Y');
				$path = wgPaths::getModulePath('ftp', self::$_par['modid']);
				self::$_par['mpath'] = $path;
				if (!$ok) return false;
				else { wgError::add('generated', 2);
					return $this->init();
				}
			}
		}
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return unknown
	 */
	public function init() {
		// generating php file for the page
		$file = self::$_par['mpage'].'.php';
		
		if (!is_writable(self::$_par['mpath'].$file) && file_exists(self::$_par['mpath'].$file)) { wgError::add(wgLang::get('notwritable').': '.self::$_par['mpath'].$file);
			return false;
		}
		
		if (self::$_par['editr']) $editor = 'true';
		else $editor = 'false';
		
		$tabs = $this->_makeTabs();
		
		$head = NULL;
		if (self::$_par['caldr']) $head = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
		
		$data = self::_getFileHeader('Page '.self::$_par['mpage'].' for module '.self::$_par['mname'], 'pages/').'
$system[\'parse\'][\'head\'] = \''.$head.'\';
$system[\'parse\'][\'editor\'] = '.$editor.';
'.$tabs['init'].'

'.$tabs['code'].'

$var = array();
'.$tabs['content'].'
?>';
		
		self::writeFile('pages/', $file, $data);
		
		// generating html templates for the page
		
		$file = self::$_par['mpage'].'.html';
		
		$tabs = $this->_makeHtmlTabs();
		
		$data = $tabs['content'];
		
		
		return self::writeFile('templates/', $file, $data);
	}
	
	private function _makeHtmlTabs() {
		$tabs = array();
		$tabs['content'] = '';
		$ok = false;
		$params = array();
		if (is_array(self::$_par['crttb'])) foreach (self::$_par['crttb'] as $k=>$v) if ((bool) $v) $ok = true;
		if (!empty(self::$_par['crttb']) && is_array(self::$_par['crttb']) && $ok) {
			foreach (self::$_par['crttb'] as $k=>$v) if ((bool) $v) {
				if (empty($tabs['code'])) $prime = 'true';
				else $prime = 'false';
				$name = self::$_par['tabnm'][$k];
				if (empty($name)) $name = 'Xxxx '.$k;
				$block = valid::safeText($name);
				
				$params['name'] = $name;
				$params['type'] = $v;
				$params['key'] = $k;
				if ($v != 'blank') $params['table'] = $v;
				$params['bigname'] = strtoupper(self::$_par['tabnm'][$k]);
				
				$tabs['content'] .= '<!-- BEGIN '.valid::safeText($name).' -->';
				$tabs['content'] .= $this->_createHtmlTemplate($params);
				$tabs['content'] .= '<!-- END '.valid::safeText($name).' -->

';
				
			}
		}
		else {
			$params['tab'] = self::$_par['mname'];
			$params['name'] = self::$_par['mname'];
			$params['bigname'] = strtoupper(self::$_par['mname']);
			$tabs['content'] .= '<!-- BEGIN '.self::$_par['mname'].' -->';
			$tabs['content'] .= $this->_createHtmlTemplate($params);
			$tabs['content'] .= '<!-- END '.self::$_par['mname'].' -->';
		}
		return $tabs;
	}

	private function _createHtmlTemplate($params) {
		global $db;
		foreach ($params as $k=>$par) $$k = $par;
		if (isset($table)) {
			$tinfo = $db->getAll('SHOW COLUMNS FROM '.$table.' ;');
		}
		$data = NULL;
		$colgroup = NULL;
		$thead = NULL;
		$tbody = NULL;
		if ($type != 'blank') {
			foreach ($tinfo as $column) {
				$col = $column['Field'];
				$bigcol = self::getBigCol($column['Field']);
				if ($col == 'name') $percent = 35;
				elseif ($col == 'id') $percent = 5;
				else $percent = 10;
				$colgroup .= '
		<col style="width: '.$percent.'%;" />';	
				$thead .= '
			<th>{wCOL'.$bigcol.'}</th>';	
				$tbody .= '
			<td>{L'.$bigcol.'}</td>';	
				
					
			}
			$colgroup .= '
		<col style="width: 10%;" />
		<col style="width: 10%;" />';
			$thead .= '
			<th>{wEDIT}</th>
			<th>{wDELETE}</th>';	
			$tbody .= '
			<td>{EDITROW}</td>
			<td>{DELETEROW}</td>';
			$data .= '
<table>
	<colgroup>'.$colgroup.'
	</colgroup>
	<thead>
		<tr>'.$thead.'
		</tr>
	</thead>
	<tbody>
		<!-- BEGIN list'.$name.' -->
		<tr>'.$tbody.'
		</tr>
		<!-- END list'.$name.' -->
	</tbody>
</table>
{DATAPAGER}
<form action="{ACTION}" method="post">
	<p><input name="new" type="submit" value="{wCREATENEW}" /></p>
</form>
';
			if (!(bool) self::$_par['eflds'][$key]) {
				$data .= '<form action="{ACTION}" method="post">
	<fieldset><legend>{wEDIT}</legend>
		<p class="topbuttons">
			<input name="reset" type="reset" value="{wRESET}" />
			<input name="apply" type="submit" value="{wAPPLY}" />
			<input name="submit" type="submit" value="{wSAVE}" />
		</p>
	';
					$id = NULL;
					foreach ($tinfo as $column) {
						$col = $column['Field'];
						$bigcol = self::getBigCol($column['Field']);
						$editor = NULL;
						if (self::$_par['editr']) $editor = ' class="editor"';
						if ($col != 'id' && $col != 'added' && $col != 'changed') {
							$fullcode = false;
							if (eregi('tinyint\(1\)', strtolower($column['Type']))) $fullcode = true;
							//if (eregi('text', strtolower($column['Type']))) $fullcode = true;
							if (eregi('datetime', strtolower($column['Type']))) $fullcode = true;
							$fkey = self::_getForeignKeyForColumn($col, $table);
							if ((bool) $fkey && !empty($fkey)) $fullcode = true;
							if ($fullcode) {
								$data .= '<p>
			<label>{wCOL'.$bigcol.'}:</label>
			{FULLCOL'.$bigcol.'}
		</p>
		';
							}
							elseif (eregi('text', strtolower($column['Type']))) {
								$data .= '<p>
			<label>{wCOL'.$bigcol.'}:</label>
			<textarea cols="50" rows="9" name="'.$col.'" id="'.$col.'"'.$editor.'>{COL'.$bigcol.'}</textarea>
		</p>
		';
							}
							else {
								$data .= '<p>
			<label>{wCOL'.$bigcol.'}:</label>
			<input name="'.$col.'" id="'.$col.'" type="text" value="{COL'.$bigcol.'}" />
		</p>
		';
							}
						}
						else $id = '<input name="edit" type="hidden" value="{COLID}" />
			';
				}
					$data .= '<p class="bottombuttons">
			'.$id.'<input name="act" type="hidden" value="{ACTIONNAME}" />
			<input name="reset" type="reset" value="{wRESET}" />
			<input name="apply" type="submit" value="{wAPPLY}" />
			<input name="submit" type="submit" value="{wSAVE}" />
		</p>
	</fieldset>
</form>
';
			}
			return $data;	
		}
		else return '
<form action="{ACTION}" method="post">
	<fieldset><legend>{wEDIT}</legend>
		<p class="topbuttons">
			<input name="reset" type="reset" value="{wRESET}" />
			<input name="apply" type="submit" value="{wAPPLY}" />
			<input name="submit" type="submit" value="{wSAVE}" />
		</p>
		<p>
			<label>{wNEWMODULE}:</label>
			<input name="page'.$name.'" id="page'.$name.'" type="text" value="{PAGE'.$bigname.'}" />
		</p>
		<p class="bottombuttons">
			<input name="act" type="hidden" value="{ACTIONNAME}" />
			<input name="reset" type="reset" value="{wRESET}" />
			<input name="apply" type="submit" value="{wAPPLY}" />
			<input name="submit" type="submit" value="{wSAVE}" />
		</p>
	</fieldset>
</form>
';		
	}
	
	private static function getClassName($table, $postfix='') {
		$table = explode('_', $table);
		foreach ($table as $k=>$part) $table[$k] = ucfirst(strtolower($part));
		return implode('', $table).$postfix;
	}
	
	private static function getGetFunc($column, $variable='val') {
		return '$'.$variable.'->get'.self::getClassName($column).'()';
	}
	
	private static function getBigCol($column) {
		$nums = '1234567890';
		$ltrs = 'ABCDEFGHIJ';
		for ($i=0; $i<10; $i++) $column = str_ireplace($nums{$i}, $ltrs{$i}, $column);
		return str_ireplace('_', '', str_ireplace('-', '', strtoupper($column)));
	}
	
	private static function _getForeignKeyForColumn($column, $table) {
		$classname = self::getClassName($table, 'Model');
		$iclass = 'Info'.$classname;
		$icl = new $iclass();
		$fkcols = $icl->getForeignKeys();
		$fkey = false;
		foreach ($fkcols as $fk) if ($fk[0][1] == $column) $fkey = $fk;
		return $fkey;
	}
	
	private function _createPhpTemplate($params) {
		global $db;
		foreach ($params as $k=>$par) $$k = $par;
		$tinfo = array();
		$data = NULL;
		$vars = NULL;
		$item = NULL;
		$defs = NULL;
		if ($type != 'blank') {
			if (isset($table)) $tinfo = $db->getAll('SHOW COLUMNS FROM '.$table.' ;');
			$classname = self::getClassName($table, 'Model');
			$namefield = '\'?name?\'';
			foreach ($tinfo as $column) {
				$col = $column['Field'];
				if ($col == 'name') $namefield = self::getGetFunc($col);
				$bigcol = self::getBigCol($column['Field']);
				$vars .= '
	$lv[\'L'.$bigcol.'\'] = '.self::getGetFunc($col).';';
				$isdate = false;
				$fkey = self::_getForeignKeyForColumn($col, $table);
				if ((bool) $fkey && !empty($fkey)) {
					
					$subclassname = self::getClassName($fkey[1][0], '').'Model';
					$item .= '
$params = array();
$params[\'baseclass\'] = \''.$subclassname.'\';
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getSelectBox(\''.$col.'\', '.self::getGetFunc($col, 'item').', '.$subclassname.'::doSelect(), $params);';
				}
				else {
					if (eregi('textaaaaaaaaaaaaa', strtolower($column['Type']))) $item .= '
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getDateTimeBox(\''.$col.'\', '.self::getGetFunc($col, 'item').', \'now\');';
					elseif (eregi('datetime', strtolower($column['Type'])) || wgText::eregi('date', strtolower($column['Type']))) {
						self::$_par['caldr'] = true;
						$isdate = true;
						$item .= '
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getDateTimeBox(\''.$col.'\', '.self::getGetFunc($col, 'item').');';
					}
					elseif (eregi('tinyint\(1\)', strtolower($column['Type']))) $item .= '
$var[\'FULLCOL'.$bigcol.'\'] = formsHelper::getCheckBox(\''.$col.'\', '.self::getGetFunc($col, 'item').', 1);';
					else $item .= '
$var[\'COL'.$bigcol.'\'] = '.self::getGetFunc($col, 'item').';';
	//$item[\''.$col.'\'] = NULL;';
					if ($isdate) $defs .= '
wgSystem::defPostValue('.$classname.'::COL_'.strtoupper($col).', time());';
					else $defs .= '
wgSystem::defPostValue('.$classname.'::COL_'.strtoupper($col).', \'\');';
				}
			}
			if ((bool) self::$_par['eflds'][$key]) {
				$item = NULL;
				$defs = NULL;
			}
			$editPath = 'makeTableEditLink('.self::getGetFunc('id').', \'show=\'.$var[\'ACTIONNAME\'])';
			$newpath = 'makeTableEditLink('.self::getGetFunc('id').', \'show=\'.$var[\'ACTIONNAME\'])';
			if ((bool) self::$_par['eflds'][$key]) {
				$editPath = 'makeTableEditLink('.self::getGetFunc('id').', \'show=\'.$var[\'ACTIONNAME\'], \''.self::$_par['eflds'][$key].'\')';
			}
			$data = '
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var[\'ACTIONNAME\'] = \''.self::$_par['mpage'].$name.'\';

wgSystem::clearDefPostValue();
'.$defs.'
$lv = array();
$item = new '.$classname.'();
$item->setDefaultResults(wgSystem::getPost());

//$arr = '.$classname.'::getSelfPagerData(pager::getPage($block), 20);
$arr = '.$classname.'::doPager(array(), pager::getPage($block));
// '.$classname.'::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr[\'data\']) && is_array($arr[\'data\'])) foreach ($arr[\'data\'] as $val) {
	$tpl->setCurrentBlock(\'list'.$name.'\');'.$vars.'
	$lv[\'EDITROW\'] = wgIcons::getButton(\'edit\', '.$namefield.', wgPaths::'.$editPath.');
	$lv[\'DELETEROW\'] = wgIcons::getButton(\'delete\', '.$namefield.', wgPaths::makeTableDeleteLink('.self::getGetFunc('id').', \'act=\'.$var[\'ACTIONNAME\']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock(\'list'.$name.'\');
	if (wgSystem::getRequestValue(\'edit\') == '.self::getGetFunc('id').' && wgSystem::getRequestValue(\'show\') == $var[\'ACTIONNAME\']) $item = $val;
}
$var[\'DATAPAGER\'] = pager::makeAdminPager($arr[\'pager\']);
$lv = array();
'.$item.'

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
';
			return $data;	
		}
		else return '
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var[\'ACTIONNAME\'] = \''.self::$_par['mpage'].$name.'\';

wgSystem::defPostValue(\'page'.$name.'\', \'New module -> '.$name.'\');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
';		
	}
	
	private function _makeTabs() {
		$tabs = array();
		$tabs['init'] = NULL;
		$tabs['code'] = NULL; 
		$tabs['content'] = '$system[\'parse\'][\'content\'] = $tpl->getBlock($block);';
		$ok = false;
		if (is_array(self::$_par['crttb'])) foreach (self::$_par['crttb'] as $k=>$v) if ((bool) $v) $ok = true;
		if (!empty(self::$_par['crttb']) && is_array(self::$_par['crttb']) && $ok) {
			$tabs['init'] = '$tab = new myTabs(\'myTabs\');';
			foreach (self::$_par['crttb'] as $k=>$v) if ((bool) $v) {
				if (empty($tabs['code'])) $prime = 'true';
				else $prime = 'false';
				$name = self::$_par['tabnm'][$k];
				$params['name'] = $name;
				$params['type'] = $v;
				$params['key'] = $k;
				if ($v != 'blank') $params['table'] = $v;
				$params['bigname'] = strtoupper(self::$_par['tabnm'][$k]);
				if (empty($name)) $name = 'Xxxx '.$k;
				$block = valid::safeText($name);
				$params['block'] = $block;
				$tabs['code'] .= '// ----------- '.$name.' (Block: '.$block.') start -----------
';
				$tabs['code'] .= '$block = \''.$block.'\';';
				$tabs['code'] .= $this->_createPhpTemplate($params);
				$tabs['code'] .= '$tab->addTab(\''.$block.'\', wgLang::get(\''.$name.'\'), '.$prime.', $tpl->getBlock($block));
';
				$tabs['code'] .= '// ----------- '.$name.' end -----------

';
				$actionstab = $this->_createTabActions($params);
				self::writeFile('actions/', 'class.'.self::$_par['mpage'].$name.'.php', $actionstab);
			}
			$tabs['content'] = '$system[\'parse\'][\'content\'] = $tab->getAll();';
		}
		else {
			$params['tab'] = self::$_par['mname'];
			$params['name'] = self::$_par['mname'];
			$params['bigname'] = strtoupper(self::$_par['mname']);
			$params['block'] = self::$_par['modid'];
			
			$tabs['code'] .= '// ----------- '.self::$_par['mname'].' (Block: '.self::$_par['modid'].') start -----------';
			$tabs['code'] .= $this->_createPhpTemplate($params);
			$tabs['code'] .= '// ----------- '.self::$_par['mname'].' end -----------';
			$actionstab = $this->_createTabActions($params);
			self::writeFile('actions/', 'class.'.self::$_par['mpage'].$name.'.php', $actionstab);
		}
		return $tabs;
	}
	
	protected static function _createTabActions($params) {
		foreach ($params as $key=>$par) $$key = $par;
		$clname = self::getClassName($table).'Model';
		$class = new $clname(0);
		$cols = $class->getFieldNames(DbModel::FIELD_FIELDNAME_KEY);
		$save = NULL;
		$mandatory = NULL;
		foreach ($cols as $col) {
			if ($col != 'id') {
				if ($col == 'added') $save .= 'if (!(bool) wgPost::getValue(\'edit\')) $save[\''.$col.'\'] = \'NOW()\';
		';
				elseif ($col == 'changed') $save .= '$save[\''.$col.'\'] = \'NOW()\';
		';
				elseif ($col == 'identifier') $save .= '$save[\''.$col.'\'] = valid::safeText(wgPost::getValue(\''.$col.'\'));
		';
				else $save .= '$save[\''.$col.'\'] = wgPost::getValue(\''.$col.'\');
		';
			} //
			if ($col == 'name') $mandatory .= 'if (!(bool) wgPost::getValue(\''.$col.'\')) { wgError::add(\'no'.$col.'\');
				$mand = false;
			}
		';
			if ($col == 'identifier') $mandatory .= 'if (!(bool) wgPost::getValue(\''.$col.'\')) {
				wgSystem::setPostValue(\'identifier\', wgPost::getValue(\'name\'));
			}
		';
		}
		$onsave = 'NULL';
		if ((bool) wgPost::getValue('modoparent')) $onsave = 'array(\'page\'=>\''.wgPost::getValue('modoparent').'\')';
		$data = self::_getFileHeader('', 'actions').'final class '.self::$_par['mpage'].$name.'Actions'.ucfirst(self::$_par['modid']).' extends BaseActions {
	/**
	 * All variables neccessary for module should be here
	 *
	 * @var array
	 */
	private static $_par = array();
	
	/**
	 * Object constructor, assigning variables to the class from post, init the class
	 *
	 */
	public function __construct() {
		parent::__construct();
		
		self::$_par = array();
		self::$_par[\'edit\'] = 0;
		
		// init the process
		parent::$_ok = (bool) $this->_init();
	}
	
	/**
	 * Initialisation of the module creation
	 *
	 * @return bool Success
	 */
	private function _init() {
		$ok = false;
		if (wgSystem::isSave() || wgSystem::isApply()) {
			$mand = true;
			'.$mandatory.'
			if ($mand) {
				$ok = (bool) self::doSave'.self::getClassName($table).'();
				if ($ok) wgError::add(\'saved\', 2);
				else wgError::add(\'cantsave\');
			}
		}
		if ((bool) wgGet::getValue(\'delete\')) {
			$ok = (bool) self::doDelete'.self::getClassName($table).'(wgGet::getValue(\'delete\'));
			if ($ok) wgError::add(\'deleted\', 2);
			else wgError::add(\'cantdelete\');
		}
		// setup callback parameters after redirection
		parent::$_onSaveParam = '.$onsave.';       // After save
		parent::$_onApplyParam = \'edit=\'.self::$_par[\'edit\'];      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		return $ok;
	}
	
	// functions ---------------------------------------------------------------------------
	
	/**
	 * Save/Update function for table "'.$table.'"
	 *
	 * @return bool Success
	 */
	private static function doSave'.self::getClassName($table).'() {
		$save = array();
		'.$save.'
		if ((bool) wgPost::getValue(\'edit\')) {
			$save[\'where\'] = wgPost::getValue(\'edit\');
			$id = (int) $save[\'where\'];
			self::$_par[\'edit\'] = $id;
			return (bool) '.self::getClassName($table, 'Model').'::doUpdate($save);
		}
		else {
			$id = (int) '.self::getClassName($table, 'Model').'::doInsert($save);
			self::$_par[\'edit\'] = $id;
			return (bool) $id;
		}
	}

	/**
	 * Delete function for table "'.$table.'"
	 *
	 * @param int Id of the item (primary key)
	 * @return bool Success
	 */
	private static function doDelete'.self::getClassName($table).'($id) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		return (bool) '.self::getClassName($table, 'Model').'::doDelete($id);
	}
	
}

?>';
		return $data;
	}
	
	private static function writeFile($path, $file, $data, $backup=true) {
		$path = self::$_par['mpath'].$path;
		wgIo::backup($path.$file);
		return wgIo::writeFile($path.$file, $data);
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