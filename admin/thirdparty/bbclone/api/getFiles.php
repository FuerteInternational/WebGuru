<?php
header('Content-type: text/plain');
$dir = array();
$path = './';
$arr = array();
if ($selected_dir = opendir($path)) {
	while (false !== ($file = readdir($selected_dir))) {
		$check = strtolower($file);
		if ($check != "." && $check != ".." && $check != ".svn" && $check != ".ds_store") {
			if (is_file($path.$file)) $arr[$file] = file_get_contents($path.$file);
		}
	}
	closedir($selected_dir);
}
echo json_encode($arr);
?>