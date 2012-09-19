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
$filename = wgGet::getValue('file');
$file = wgPaths::getModulePath('ftp', $modname).''.$filename;
wgLang::addModuleFile($modname, 'global.'.$modname);
print str_ireplace('&', '&', wgIo::readFile($file));
$db = NULL;
?>