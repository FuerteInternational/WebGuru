<?php
require('init.php');

include('./var/access.php');

arsort($access['key']);

$arr = &$access['key'];
$c = count($arr);
$x=100;

echo '{ "result": '.$c.', "limit": '.$x.', "time": '.time().', "data": [';
foreach ($arr as $k=>$v) {
	$c--;
	$x--;
	if ($c == 0 || $x == 0) $comma = NULL;
	else $comma = ', ';
	if ($x >= 0) echo '{"key": "'.$k.'", "value": "'.(int) $v.'"}'.$comma;
}
echo ']}';
?>