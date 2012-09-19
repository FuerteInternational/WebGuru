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
$code = wgGet::getValue('code');
$ssid = wgGet::getValue('ssid');

if (!(bool) $uid && empty($code)) {

?>{
	"result": 0,
	"error": "No device code or user id provided."
}<?php

}
else {
	if (!(bool) $uid) $arr = IblogBlogsModel::getDeviceBlogsData($code);
	else $arr = IblogBlogsModel::getUserBlogsData($uid);
	$count = count($arr);
	$c = $count;
	$data = TAB.TAB.'['.NL;
	foreach ($arr as $v) {
		$c--;
		if ($c <= 0) $comma = NULL;
		else $comma = ',';		
		$data .= TAB.TAB.TAB.'{
				"id": "'.(int) $v->getId().'",
				"name": "'.wgText::encodeJsonText($v->getName()).'",
				"identifier": "'.$v->getIdentifier().'",
				"description": "'.wgText::encodeJsonText($v->getDescription()).'",
				"htmldesc": "'.wgText::encodeJsonText(nl2br($v->getDescription())).'",
				"users_id": '.(int) $v->getUsersId().',
				"posts": '.(int) $v->getPosts().',
				"pictures": '.(int) $v->getPictures().',
				"added": "'.$v->getAdded().'",
				"changed": "'.$v->getChanged().'",
				"motto": "'.wgText::encodeJsonText($v->getMotto()).'"
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