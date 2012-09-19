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
$pages = wgIo::getFiles($pages.'pages/', false);
$count = count($pages);
$x=1;
echo '<table>
	<colgroup>
		<col style="width: 30%;">
		<col style="width: 40%;">
		<col style="width: 10%;">
		<col style="width: 10%;">
	</colgroup>
	<thead>
		<tr>
			<th class="header">'.wgLang::get('identifier').'</th>
			<th class="header">'.wgLang::get('name').'</th>
			<th class="header">'.wgLang::get('edit').'</th>
			<th class="header">'.wgLang::get('delete').'</th>
		</tr>
	</thead>
	<tbody>
';
foreach ($pages as $pg) {
	$pg = explode('.', $pg);
	$pg[0] = trim($pg[0]);
	if (!empty($pg[0]) && !isset($pg[2])) {
		echo '<tr>
			<td>'.$pg[0].'</td><td>'.wgLang::get($pg[0]).'</td>
			<td>'.wgIcons::getButton('edit', wgLang::get($pg[0]), 'javascript: editPage(\''.$modname.'\', \''.$pg[0].'\', \''.wgPaths::getModulePath('url', 'developer').'\');').'</td>
			<td>'.wgIcons::getButton('delete', wgLang::get($pg[0]), wgPaths::makeLink('developer', 'admin', array('act'=>'admin', 'delete'=>$pg[0], 'module'=>$modname), 'system'), true).'</td>
		</tr>';
	}
	$x++;
}
echo '</tbody>
</table>';
$db = NULL;
?>