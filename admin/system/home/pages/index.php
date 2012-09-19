<?php
/**
 * Home page for the system
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      22. October 2008
 * 
 * @todo Show version, change to modules (from system), add personalised feeds, add default system icon
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$type = 'system';
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$arr = dbSystem::getModulesByType();
$path = wgPaths::getAdminPath('url').''.$type.'/';
$var2 = array();
if (!empty($arr[$type]) && is_array($arr[$type])) foreach ($arr[$type] as $val) {
	if ($val['name'] != 'home' && wgModules::canRun($val['name'])) {
		$myMod = $mod->runModule($val['name']);
		$tpl->setCurrentBlock('modlist');
		$var2['NAME'] = wgLang::get($val['name']);
		$var2['LINK'] = wgPaths::makeLink($val['name'], 'index', NULL, $type);
		if (!isset($myMod->version) || empty($myMod->version)) $myMod->version = 'N/A';
		$var2['VERSION'] = $myMod->version;
		$var2['ICO'] = wgIcons::getModuleIcon($val['name'], $val['name']);
		$var2['ICOXXL'] = wgIcons::getModuleIcon($val['name'], $val['name'], 'xxl');
		$tpl->setVariable($var2);
		$tpl->parseBlock('modlist');
	}
}
$tpl->setVariable($var);
$tpl->parseBlock($block);
// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);







?>