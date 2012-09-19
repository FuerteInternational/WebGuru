<?php
/**
 * 
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/actions
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */
final class servicesgenerateActionsDeveloper extends BaseActions {
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
		// setup callback parameters after redirection
		parent::$_onSaveParam = NULL;       // After save
		parent::$_onApplyParam = NULL;      // After apply
		parent::$_onDeleteParam = NULL;     // After delete
		
		// filling parameters with data
		self::$_par = array();
		//Array
		
		$ok = (bool) $this->generateServices(wgPost::getValue('table'));
		if ($ok) wgError::add('modelgenerated', 2);
		else wgError::add('cantgeneratemodel');
		parent::$_ok = (bool) $ok;
	}
	
	
	// functions ---------------------------------------------------------------------------
	
	private static function generateServices($table) {
		wgError::add($table, 1);
		self::generateMainInclude();
		$columns = getDb::getTableColumns($table);
		self::generateEdit($table, $columns);
		self::generateDelete($table);
		return self::generateSelect($table, $columns);
	}
	
	private static function getTableName($table) {
		$t = explode('_', $table);
		foreach ($t as $k=>$v) $t[$k] = ucfirst(strtolower($v));
		return implode($t);
	}
	
	private static function generateSelect($table, $columns) {
		$cols = NULL;
		$struct = NULL;
		$chcol = NULL;
		$count = count($columns);
		
		foreach ($columns as $k=>$c) {
			$count--;
			//$count--;
			if ($count <= 0) $comma = NULL;
			else $comma = ', ';
			if (eregi('int', $c['Type']) || eregi('date', $c['Type']) || eregi('time', $c['Type'])) {
				$cols .= '"'.$c['Field'].'": \'.(int) $v->get'.self::getTableName($c['Field']).'().\''.$comma;
				$struct .= '{ "type": "INTEGER", "name": "'.$c['Field'].'", "extra": "" }'.$comma;
			}
			else {
				if (eregi('text', $c['Type'])) $type = 'TEXT';
				else $type = 'VARCHAR';
				$cols .= '"'.$c['Field'].'": "\'.(string) wgText::encodeJsonText($v->get'.self::getTableName($c['Field']).'()).\'"'.$comma;
				$struct .= '{ "type": "'.$type.'", "name": "'.$c['Field'].'", "extra": "" }'.$comma;
			}
			if ($k == 0) $chcol = $c['Field'];
		}
		$data = '<?php
$res = true;
$error = NULL;
$data = NULL;
set_time_limit(0);
$arr = '.self::getTableName($table).'Model::doSelect();
$count = (int) count($arr);
$c = $count;

foreach ($arr as $k=>$v) {
	$c--;
	if ($c <= 0) $comma = NULL;
	else $comma = \',\';
	$data .= \'{ '.$cols.' }\'.$comma; 
}
?>{
	"result": <?php echo (int) $res; ?>,
	"error": "<?php echo $error; ?>",
	"count": <?php echo (int) $count; ?>,
	"table": "'.$table.'",
	"structure": [ '.$struct.' ],
	"data": [ <?php echo $data; ?> ]
}';
		return (bool) self::writeFile('select', $data);
	}
	
	private static function generateEdit($table, $columns) {
		$cols = NULL;
		$chcol = NULL;
		foreach ($columns as $k=>$c) {
			if (eregi('int', $c['Type'])) $pre = 'int';
			else $pre = 'string';
			$cols .= '$save[\''.$c['Field'].'\'] = ('.$pre.') wgPost::getValue(\''.$c['Field'].'\');'.NL;
			if ($k == 0) $chcol = $c['Field'];
		}
		$data = '<?php
$error = NULL;
$id = (int) wgPost::getValue(\'id\');
'.$cols.'
if (wgPost::isValue(\''.$chcol.'\')) {
	if ((bool) $id) {
		$save[\'where\'] = $id;
		$res = (bool) '.self::getTableName($table).'Model::doUpdate($save);
		if (!$res) $error = \'Unable to update entry.\';
	}
	else {
		$id = '.self::getTableName($table).'Model::doInsert($save);
		$res = (bool) $id;
		if (!$res) $error = \'Unable to insert entry.\';
	}
}
else {
	$res = false;
	$error = \'No data has been sent.\';
}
?>{
	"result": <?php echo (int) $res; ?>,
	"error": "<?php echo $error; ?>"
}';
		return (bool) self::writeFile('edit', $data);
	}
	
	private static function generateMainInclude() {
		$data = '<?php
chdir(\'../admin/\');
require(\'./init/init.basic.php\');	
?>';
		return (bool) self::writeFile('inc.main', $data);
	}
	
	private static function generateDelete($table) {
		$data = '<?php
$error = NULL;
$id = (int) wgGet::getValue(\'id\');
if ((bool) $id) {
	$conn = new wgConnector();
	$conn->where(\'id\', $id);
	$conn->limit(1);
	$res = (bool) '.self::getTableName($table).'Model::doDelete($conn);
	if (!$res) $error = \'Unable to delete entry.\';
}
else {
	$res = false;
	$error = \'No item Id has been sent.\';
}
?>{
	"result": <?php echo (int) $res; ?>,
	"error": "<?php echo $error; ?>"
}';
		return (bool) self::writeFile('delete', $data);
	}
	
	private static function writeFile($name, $data=NULL) {
		$path = wgPaths::getPath().'services/';
		if (!is_dir($path)) wgIo::mkdir($path, 0755);
		$file = $name.'.php';
		if ($name != 'inc.main') {
			$data = '<?php require(\'./inc.main.php\'); ?>'.$data.'<?php ?>';
			$file = $name.self::getTableName(wgPost::getValue('table')).'.php';
		}
		return (bool) wgIo::writeFile($path.$file, $data);
	}
	
	
}

?>