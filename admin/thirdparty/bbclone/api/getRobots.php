<?php
require('init.php');

include('./var/access.php');
include('./lib/robot.php');

arsort($access['stat']['robot']);

$arr = &$access['stat']['robot'];
$c = count($arr);

echo '{ "result": '.$c.', "time": '.time().', "data": [';
foreach ($arr as $k=>$v) {
	$c--;
	if ($c == 0) $comma = NULL;
	else $comma = ', ';
	echo '{"key": "'.$k.'", "name": "'.$robot[$k]['title'].'"';
	echo ', "value": "'.(int) $v.'", "icon": "'.$robot[$k]['icon'].'"}'.$comma;
}
echo ']}';
?>