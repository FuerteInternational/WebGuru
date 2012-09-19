<?php
/**
 * Page Modulespermissions in the System users module
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
// --------------------------------- start content ---------------------------------
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSessions::setPageValueDefault('team', wgUsers::getTeamId());
if (wgSystem::isRequest('team')) wgSessions::setPageValue('team', (int) wgSystem::getRequestValue('team'));
$team = wgSessions::getPageValue('team');
$arr = wgModules::getModules();
//ksort($arr);
if (!empty($arr)) foreach ($arr as $k=>$m) if ($k != 'home') {
	$v = array();
	$tpl->setCurrentBlock('moduleslist');
	$v['NAME'] = wgLang::get($k);
	$params = array();
	$params['id'] = 'mod'.ucfirst($k);
	if (!wgUsers::isSu()) $params['disabled'] = 'disabled';
	$v['FULLCHECK'] = formsHelper::getCheckBox('mod['.$m['id'].']', (int) wgModules::canRun($m['id'], $team), 1, $params);
	$tpl->setVariable($v);
	$tpl->parseBlock('moduleslist');
}

$var['ICO'] = wgIcons::getIcon('lock_edit', wgLang::get('lockedit'));
$var['TEAMID'] = (int) $team;
$var['FULLTEAM'] = formsHelper::getSelectBox('team', $team, SystemTeamsModel::doSelect());
if (!wgUsers::isSu()) {
	$var['DISABLED'] = ' disabled="disabled"'; wgError::add('forsuonly', 1);
}

$tpl->setVariable($var);

$tpl->parseBlock($block);
// --------------------------------- end content ---------------------------------
$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>
