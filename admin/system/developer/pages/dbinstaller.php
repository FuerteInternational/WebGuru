<?php
/**
 * Generate installer page
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 */

$system['parse']['head'] = '
<script type="text/javascript" src="'.wgPaths::getModulePath('url').'js/installer-ajax.js"></script>
';
$system['parse']['editor'] = true;
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::defPostValue('modname', 'New module');
wgSystem::defPostValue('modid', 'new-module');
wgSystem::defPostValue('modpages', 'index');
wgSystem::defPostValue('modauthor', wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname'));



$modules = dbSystem::getModulesByType();
foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('partlist');
	$tpl->setVariable('LMODGROUP', $pname);
	foreach ($part as $mymod) {
		$tpl->setCurrentBlock('modulelist');
		$tpl->setVariable('LMODNAME', $mymod['name']);
		$tpl->parseBlock('modulelist');
	}
	$tpl->parseBlock('partlist');
}

$tables = $db->getAll('SHOW TABLES ;');
foreach ($tables as $tbl) {
	$tpl->setCurrentBlock('tablelist');
	$tpl->setVariable('TABLENAME', $tbl[0]);
	$tpl->setVariable('TABLEROWS', $module->getTableRows($tbl[0]));
	$tpl->parseBlock('tablelist');
}


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
// --------------------------------- end content -----------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);







?>