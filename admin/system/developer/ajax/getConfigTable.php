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
require('./init/init.basic.php');
require('./init/init.admin.php');

$modname = wgGet::getValue('module');
if ((bool) $modname) $mymod = dbSystem::getModulesByName($modname);

$tables = $db->getAll('SHOW TABLES ;');

foreach ($tables as $tbl) {
	$chtbl = NULL;
?>
<tr>
	<td><input type="checkbox" name="table[<?php echo $tbl[0]; ?>]" value="1"<?php echo $chtbl; ?> /></td>
	<td><?php echo $tbl[0]; ?></td>
	<td><input type="checkbox" name="tdata[<?php echo $tbl[0]; ?>]" value="1"<?php echo $chtbl; ?> /></td>
	<td>x</td>
</tr>
<?php
}
$db = NULL;
?>