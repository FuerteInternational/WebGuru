<?php
require('init.php');

include('./var/access.php');
include('./lib/browser.php');

arsort($access['stat']['browser']);

$arr = &$access['stat']['browser'];
$c = count($arr);
$x = 100;

echo '{ "result": '.$c.', "limit": '.$x.', "time": '.time().', "data": [';
foreach ($arr as $k=>$v) {
	$c--;
	$x--;
	if ($c == 0 || $x == 0) $comma = NULL;
	else $comma = ', ';
	if ($x >= 0) {
		echo '{"key": "'.$k.'", "name": "'.$browser[$k]['title'].'"';
		echo ', "value": "'.(int) $v.'", "icon": "'.$browser[$k]['icon'].'"}'.$comma;
	}
}
echo ']}';
?>