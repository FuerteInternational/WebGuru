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
$module = wgModules::runModule('developer');
$modname = wgGet::getValue('module');
$tables = $db->getAll('SHOW TABLES ;');
foreach ($tables as $tbl) {
	$chtbl = NULL;
	$chdat = NULL;
	if ((bool) $modname && $module->checkInstalledTable($modname, $tbl[0])) $chtbl = ' checked="checked"';
	if ((bool) $modname && $module->checkInstalledTableData($modname, $tbl[0])) $chdat = ' checked="checked"';
	?>
<tr>
	<td><input type="checkbox" name="table[<?php echo $tbl[0]; ?>]" value="<?php echo $tbl[0]; ?>"<?php echo $chtbl; ?> /></td>
	<td><?php echo $tbl[0]; ?></td>
	<td><input type="checkbox" name="tdata[<?php echo $tbl[0]; ?>]" value="<?php echo $tbl[0]; ?>"<?php echo $chdat; ?> /></td>
	<td><?php echo $module->getTableRows($tbl[0]); ?></td>
</tr>
<?php
}
$db = NULL;
?>