<?php
$url = 'http://www.audi.co.uk/centrelocator/searchoriginsearch.html?format=json&numOfResult=15&searchParam=N1';
$content = file_get_contents($url);
$json = json_decode($content, true);


$arr = array();
$arr['data'] = $json['results']['centres'];
$arr['time'] = time();
$arr['cached'] = 0;
$arr['count'] = count($arr['data']);
$arr['origRequest'] = $url;

print_r(json_encode($arr));
?>