<?php
/**
 * Returns select box for table
 * 
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      28. October 2008
 */
chdir('../../../');
require('./init/init.basic.php');
require('./init/init.admin.php');
$modname = wgGet::getValue('module');
$pages = wgPaths::getModulePath('ftp', $modname);
wgLang::addModuleFile($modname, 'global.'.$modname);
$pages = wgIo::getFiles($pages.'pages/', false);
$count = count($pages);
$x=1;
echo '{ ';
foreach ($pages as $pg) {
	$pg = explode('.', $pg);
	$pg[0] = trim($pg[0]);
	if (!empty($pg[0])) {
		if ($x < $count) $comma = ', ';
		else $comma = NULL;
		echo '"'.$pg[0].'": "'.trim(wgLang::get($pg[0])).'"'.$comma;
	}
	$x++;
}
echo ' }';
$db = NULL;
?>