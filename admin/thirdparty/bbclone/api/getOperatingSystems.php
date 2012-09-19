<?php
require('init.php');

include('./var/access.php');
include('./lib/os.php');

arsort($access['stat']['os']);

$arr = &$access['stat']['os'];
$c = count($arr);

echo '{ "result": '.$c.', "time": '.time().', "data": [';
foreach ($arr as $k=>$v) {
	$c--;
	if ($c == 0) $comma = NULL;
	else $comma = ', ';
	echo '{"key": "'.$k.'", "name": "'.$os[$k]['title'].'"';
	echo ', "value": "'.(int) $v.'", "icon": "'.$os[$k]['icon'].'"}'.$comma;
}
echo ']}';
?>