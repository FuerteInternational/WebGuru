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
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//wgSystem::defPostValue('modname', 'New module');

$modules = dbSystem::getModulesByType();
//print_r($modules);
foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('partlist');
	$tpl->setVariable('LMODGROUP', wgLang::get($pname));
	foreach ($part as $mymod) {
		$m = wgModules::runModule($mymod['name']);
		if (!isset($m->version)) $m->version = 'N/A';
		$tpl->setCurrentBlock('modulelist');
		if ($pname == 'system') $tpl->setVariable('LMODCHECKED', ' checked="checked"');
		$tpl->setVariable('LPART', $pname);
		$tpl->setVariable('LMODID', $mymod['name']);
		$tpl->setVariable('LMODNAME', wgLang::get($mymod['name']));
		$tpl->setVariable('LMODVERSION', $m->version);
		$tpl->setVariable('LMODSIZE', developer::getModuleSize($mymod['name']));
		$tpl->parseBlock('modulelist');
	}
	$tpl->parseBlock('partlist');
}
$tpl->setCurrentBlock('partlist');
$tpl->setVariable('LMODGROUP', wgLang::get('adminstyles'));
$styles = wgIo::getFolders(wgPaths::getAdminPath().'issues/');
$version = 'N/A';
foreach ($styles as $style) {
	$tpl->setCurrentBlock('modulelist');
	if ($pname == 'system') $tpl->setVariable('LMODCHECKED', ' checked="checked"');
	$tpl->setVariable('LPART', 'issues');
	$tpl->setVariable('LMODID', $style);
	$tpl->setVariable('LMODNAME', wgLang::get($style));
	$tpl->setVariable('LMODVERSION', $version);
	$tpl->setVariable('LMODSIZE', developer::getStyleSize($style));
	$tpl->parseBlock('modulelist');
}
$tpl->parseBlock('partlist');

$var['BLOCK'] = 'createinstall';


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), true, $tpl->getBlock($block));
// --------------------------------- end content -----------------------------------
$block = 'backup';
$tpl = new wgParse($temp, $path, false, false);
$tpl->setCurrentBlock($block);

//$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'installer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('partlist');
	$tpl->setVariable('LMODGROUP', wgLang::get($pname));
	foreach ($part as $mymod) {
		$m = wgModules::runModule($mymod['name']);
		if (!isset($m->version)) $m->version = 'N/A';
		$tpl->setCurrentBlock('modulelist');
		if ($pname == 'system') $tpl->setVariable('LMODCHECKED', ' checked="checked"');
		$tpl->setVariable('LPART', $pname);
		$tpl->setVariable('LMODID', $mymod['name']);
		$tpl->setVariable('LMODNAME', wgLang::get($mymod['name']));
		$tpl->setVariable('LMODVERSION', $m->version);
		$tpl->setVariable('LMODSIZE', developer::getModuleSize($mymod['name']));
		$tpl->parseBlock('modulelist');
	}
	$tpl->parseBlock('partlist');
}
$tpl->setVariable('BLOCK', 'createmodinst');
$tpl->parseBlock($block);
$tab->addTab($block.'mod', wgLang::get('domodules'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$var = array();
$system['parse']['content'] = $tab->getAll();







?>