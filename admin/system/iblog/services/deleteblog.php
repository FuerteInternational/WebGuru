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
$bid = (int) wgGet::getValue('bid');

$error = NULL;
if (IblogBlogsModel::validateBlogForUser($bid, $code, $uid)) {
	$result = (int) IblogBlogsModel::deleteBlog($bid);
	if (!(bool) $result) $error = 'Unable to delete this iBlog, please contact administrator.';
}
else {
	$result = 0;
	$error = 'Not enough permissions to delete this iBlog.';
}

?>{
	"result": <?php echo (int) $result; ?>,
	"error": "<?php echo $error; ?>"
}<?php

$db = NULL;
?>