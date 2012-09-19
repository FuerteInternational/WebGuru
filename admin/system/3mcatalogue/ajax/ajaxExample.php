<?php
/**
 * Example AJAX file for module 3M Catalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/ajax/
 * @author       Ondrej Rafaj (FiftyFootSquid)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

chdir('../../../');
require('init/init.basic.php');
require('init/init.admin.php');

$par = wgGet::getValue('parameter');

echo $par;

$db = NULL;
?>