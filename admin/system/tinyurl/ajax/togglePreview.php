<?php
/**
 * Example AJAX file for module TinyUrl
 * 
 * @package      WebGuru3
 * @subpackage   modules/tinyurl/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. June 2009
 */

chdir('../../../');
require('./init/init.basic.php');
//require('./init/init.admin.php');

wgModules::runModule('tinyurl');
if ((bool) wgSystem::getRequestValue('status')) echo (int) moduleTinyurl::previewEnabled(); 
else echo (int) moduleTinyurl::togglePreview();

$db = NULL;
?>