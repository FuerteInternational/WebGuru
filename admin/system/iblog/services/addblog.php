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
$name = wgGet::getValue('name');
$motto = wgPost::getValue('motto');
$desc = wgPost::getValue('description');

$error = '';
$result = 0;

if (empty($code)) {
	$result = 0;
	$error = 'No device code provided.';
}
else {
	if (empty($name)) {
		$result = 0;
		$error = 'iBlog name can not be empty.';
	}
	else {
		$result = (bool) IblogBlogsModel::createBlogForDevice($code, $name, $desc, $motto);
		IblogDevicesModel::mergeCodeWithUser($code, $uid);
	}
}
?>{
	"result": <?php echo (int) $result; ?>,
	"error": "<?php echo $error; ?>",
	"ssid": "<?php echo session_id(); ?>"
}<?php

$db = NULL;
?>