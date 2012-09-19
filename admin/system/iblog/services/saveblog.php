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

chdir('../../../');
require('init/init.basic.php');

wgModules::runModule('users');

$code = wgGet::getValue('code');
$uid = (int) moduleUsers::getId();
$name = wgPost::getValue('name');
$identifier = wgPost::getValue('identifier');
$motto = wgPost::getValue('motto');
$desc = wgPost::getValue('description');
$bid = (int) wgPost::getValue('bid');
//print_r($_GET);
//print_r($_POST);
$error = NULL;
if (IblogBlogsModel::validateBlogForUser($bid, $code, $uid)) {
	$result = (int) IblogBlogsModel::saveBlogForDevice($bid, $name, $identifier, $desc, $motto);
	if (!(bool) $result) $error = 'Unable to save this iBlog, please contact administrator.';
}
else {
	$result = 0;
	$error = 'Not enough permissions to save this iBlog.';
}

?>{
	"result": <?php echo (int) $result; ?>,
	"error": "<?php echo $error; ?>"
}<?php

$db = NULL;
?>