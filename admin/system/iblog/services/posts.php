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

$uid = (int) moduleUsers::getId();
$bid = wgGet::getValue('bid');
$code = wgGet::getValue('code');
$ssid = wgGet::getValue('ssid');

if (!(bool) $uid && empty($code)) {

?>{
	"result": 0,
	"error": "No device code or user id provided."
}<?php

}
else if (!(bool) $bid) {

?>{
	"result": 0,
	"error": "No iBlog id provided."
}<?php

}
else {
	//if (!(bool) $uid) $arr = IblogBlogsModel::getDeviceBlogsData($code);
	//else $arr = IblogBlogsModel::getUserBlogsData($uid);
	$arr = IblogPostsModel::getDataForBlog($bid);
	$count = count($arr);
	$c = $count;
	$data = TAB.TAB.'['.NL;
	foreach ($arr as $v) {
		$c--;
		if ($c <= 0) $comma = NULL;
		else $comma = ',';		
		$data .= TAB.TAB.TAB.'{
				"id": '.(int) $v->getId().',
				"iblog_blogs_id": '.(int) $v->getIblogBlogsId().',
				"users_id": '.(int) $v->getUsersId().',
				"name": "'.wgText::encodeJsonText($v->getName()).'",
				"identifier": "'.$v->getIdentifier().'",
				"head": "'.wgText::encodeJsonText($v->getHead()).'",
				"text": "'.wgText::encodeJsonText($v->getText()).'",
				"added": '.(int) $v->getAdded().',
				"changed": '.(int) $v->getChanged().',
				"views": '.(int) $v->getViews().',
				"comments": '.(int) $v->getComments().',
				"lastcomment": '.(int) $v->getLastcomment().',
				"enabled": '.(int) $v->getEnabled().'
			}'.$comma.NL;
		
		
	}
	$data .= TAB.TAB.']'.NL;
?>{
	"result": 1,
	"count": <?php echo $count; ?>,
	"error": "",
	"data": 
<?php echo $data; ?>}<?php
	
}


$db = NULL;
?>