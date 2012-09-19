<?php
/**
 * Generate Web file for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2009
 */

chdir('../../../');
require('./init/init.basic.php');
require('./init/init.admin.php');
$a=0;
$b=0;
$pid = wgGet::getValue('pid');
$gpath = wgPaths::getModulePath('pages');
require('./system/pages/actions/class.generate.php');
$mod->runModule('pages');
echo (int) generate::generatePage($pid);
wgIo::createTempFile('generate', wgLang::get('genpage').': 0 / 0');
$db = NULL;
?>