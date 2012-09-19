<?php
require('init.php');

include('./var/last.php');
include('./lib/browser.php');
include('./lib/os.php');
include('./lib/robot.php');

$arr = &$last['traffic'];
$arr = array_reverse($arr);

$c = count($arr);
$x=30;
if (isset($_GET['limit'])) $x = (int) $_GET['limit'];

$type = 2;
if (isset($_GET['type']) && $_GET['type'] != 2) {
	$type = (int) $_GET['type'];
	$r=0;
	$b=0;
	$c=0; 
	foreach ($arr as $v) {
		if (isset($v['robot'])) $r++;
		else $b++;
	}
	if ($type == 1) $c = $r;
	elseif ($type == 0) $c = $b;
}

if (!(bool) $x) $x = 30;
if ($x > $c) $x = ($c-1);
$pages = array();
foreach ($last['pages'] as $k=>$v) $pages['p'.$k] = $v;
echo '{ "result": '.$c.', "limit": '.$x.', "time": '.time().', "pages": '.json_encode($pages).', "data": [';
foreach ($arr as $k=>$v) {
	if ($x >= 0) {
		if ($v['referer'] == 'unknown') $v['referer'] = NULL;
		$views = array();
		$pc = 0;
		foreach ($v['views'] as $w) {
			$t = explode('|', $w);
			$views['d'][$t[0]] = array('p'=>'p'.$t[1], 'c'=>$t[2]);
			$pc += $t[2];
		} 
		$views['c'] = $pc;
		
		$brn = $browser[$v['browser']]['title'];
		$bri = $browser[$v['browser']]['icon'];
		$osn = $os[$v['os']]['title'];
		$osi = $os[$v['os']]['icon'];
		$isrobot = 0;
		if (isset($v['robot'])) {
			$brn = $robot[$v['robot']]['title'];
			$bri = $robot[$v['robot']]['icon'];
			$osn = $robot[$v['robot']]['title'];
			$osi = $robot[$v['robot']]['icon'];
			$v['browser_note'] = $v['robot_note'];
			$v['os_note'] = $v['robot_note'];
			$isrobot = 1;
		}
		if ($type == 2 || $isrobot == $type) {
			$c--; 
			$x--;
			if ($c > 0 || $x == 0) $comma = ', ';
			else $comma = NULL;
			echo '{"t": '.(int) $v['time'].', "ip": "'.$v['ip'].'", "dns": "'.$v['dns'].'", "ref": '.json_encode($v['referer']).'';
			echo ', "br": "'.$v['browser'].'", "brv": "'.$v['browser_note'].'", "brn": "'.$brn.'", "bri": "'.$bri.'"';
			echo ', "os": "'.$v['os'].'", "osv": "'.$v['os_note'].'", "osn": "'.$osn.'", "osi": "'.$osi.'"';
			echo ', "ext": "'.$v['ext'].'", "sq": "'.$v['search'].'", "views": '.json_encode($views).', "r":'.$isrobot.'}'.$comma;
		}
	}
}
echo ']}';
?>