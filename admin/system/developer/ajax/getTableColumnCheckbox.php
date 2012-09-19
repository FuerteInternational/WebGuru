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
$pages = wgPaths::getModulePath('ftp', $modname);
wgLang::addModuleFile($modname, 'global.'.$modname);
$columns = getDb::getTableColumns(wgGet::getValue('table'));
$count = count($pages);
$x=1;
echo '<fieldset><legend>'.wgLang::get('tab').' '.(wgGet::getValue('id')+1).'</legend>';
?>
<p>
	<label><?php echo wgLang::get('tabname'); ?></label>
	<input type="text" name="<?php echo 'tabname['.wgGet::getValue('id').']'; ?>" value="<?php echo 'tab'.(wgGet::getValue('id')+1); ?>" />
</p>
<?php
foreach ($columns as $col) {
	?>
<p>
	<label><?php echo $col['Field']; ?></label>
	<input type="checkbox" name="<?php echo $col['Field'].'['.wgGet::getValue('id').']'; ?>" value="1" />
	<input type="text" name="<?php echo 'name'.$col['Field'].'['.wgGet::getValue('id').']'; ?>" value="<?php echo '{wCOL'.strtoupper(str_ireplace('_', '', $col['Field'])).'}'; ?>" />
</p>
<?php 
	$x++;
}
echo '<!--<input type="button" value="'.wgLang::get('deletetab').'" onclick="deleteTab('.wgGet::getValue('id').')" />--></fieldset><div id="tabonebox'.(wgGet::getValue('id')+1).'"></div>';
$db = NULL;
?>