<?php
/**
 * Example AJAX file for module iBlog
 * 
 * @package      WebGuru3
 * @subpackage   modules/iblog/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        10. November 2009 
 */

print ':)';
exit();

chdir('../../../');
require('init/init.basic.php');

wgModules::runModule('users');

$code = wgGet::getValue('code');
$uid = (int) moduleUsers::getId();
$bid = wgGet::getValue('bid');
$identifier = wgGet::getValue('identifier');
print_r($_GET);
$error = NULL;
$result = (bool) IblogBlogsModel::checkIdentifier($identifier, $bid);

$result = 1;

if (!(bool) $result) $error = 'This identifier already exists in the system.';

?>{
	"result": <?php echo (int) $result; ?>,
	"error": "<?php echo $error; ?>"
}<?php

$db = NULL;
?>