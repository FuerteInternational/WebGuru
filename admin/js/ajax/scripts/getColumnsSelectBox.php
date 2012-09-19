<?php
/**
 * Returns select box for table
 * 
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      16. October 2008
 */

chdir('../../../');
require('init/init.basic.php');
require('init/init.admin.php');
$table = wgSystem::getValue('table');
if ((bool) $table) {
	$arr = $db->getAll('SHOW COLUMNS FROM `'.$table.'`;');
	
	
	//error_reporting(0);
	if (true) {
		if (!empty($arr) && is_array($arr)) {
			$count = count($arr);
			$x=1;
			echo '{ ';
			foreach ($arr as $col) {
				if ($x < $count) $comma = ', ';
				else $comma = NULL;
				echo '"'.$col[0].'": "'.$col[0].'"'.$comma;
				$x++;
			}
			echo ' }';
		}
	}
	else {
		header ("content-type: text/xml");
		echo '<?xml version="1.0"?>';
		echo '<result>';
		if (!empty($arr) && is_array($arr)) {
			foreach ($arr as $col) {
				$type = explode(' ', $col[1]);
				$match = array();
				preg_match('/.*?\((.*?)\)/si', $type[0], $match);
				if (!isset($match[1])) $match[1] = NULL;
				$type = preg_replace('/\(.*?\)/si', '', $type[0]);
				echo '<col type="'.$type.'" long="'.$match[1].'" key="'.$col[3].'">'.$col[0].'</col>';		
			}
		}
		echo '</result>';
	}
}
$db = NULL;
?>