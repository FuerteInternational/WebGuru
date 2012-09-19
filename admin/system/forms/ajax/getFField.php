<?php
/**
 * Example AJAX file for module Forms
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

chdir('../../../');
require('./init/init.basic.php');
require('./init/init.admin.php');
wgSystem::setModule('forms');
wgLang::addFile(wgPaths::getModulePath().'languages/english/editforms.txt');
include(wgPaths::getModulePath().'data/field-temp.php');
echo $data;
$db = NULL;
?>