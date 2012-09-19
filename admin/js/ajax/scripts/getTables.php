<?php
/**
 * Returns select box for table
 * 
 * @package    WebGuru3
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      28. October 2008
 */

chdir('../../../');
require('init/init.basic.php');
require('init/init.admin.php');

$tables = $db->getAll('SHOW TABLES ;');

$count = count($tables);
$x=1;
echo '{ ';
foreach ($tables as $tbl) {
	if ($x < $count) $comma = ', ';
	else $comma = NULL;
	echo '"'.$tbl[0].'": "'.$tbl[0].'"'.$comma;
	$x++;
}
echo ' }';
$db = NULL;
?>