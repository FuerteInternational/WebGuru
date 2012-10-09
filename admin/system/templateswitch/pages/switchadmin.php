<?php
/**
 * Page switchadmin for module Templateswitch
 * 
 * @package      WebGuru3
 * @subpackage   modules/templateswitch/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        8. October 2012
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- tempswadmin (Block: tempswadmin) start -----------
$block = 'tempswadmin';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'switchadmintempswadmin';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(TemplateswitchModel::COL_ID, '');
wgSystem::defPostValue(TemplateswitchModel::COL_NAME, '');
wgSystem::defPostValue(TemplateswitchModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(TemplateswitchModel::COL_TEMPLATENAME, '');
$lv = array();
$item = new TemplateswitchModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = TemplateswitchModel::getSelfPagerData(pager::getPage($block), 20);
$arr = TemplateswitchModel::doPager(array(), pager::getPage($block));
// TemplateswitchModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtempswadmin');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPLATECODE'] = '{#MOD_templateswitch_switch_'.$val->getIdentifier().'}';
	$lv['LTEMPLATENAME'] = $val->getTemplatename();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtempswadmin');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLTEMPLATENAME'] = $item->getTemplatename();
$var['COLTEMPLATEFOLDERFULL'] = formsHelper::getSelectBox('templatename', $item->getTemplatename(), wgIo::getFolders(wgPaths::getPath('ftp').'assets/'), array(), false, false);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('tempswadmin', wgLang::get('tempswadmin'), true, $tpl->getBlock($block));
// ----------- tempswadmin end -----------

// ----------- tempswsettings (Block: tempswsettings) start -----------
$block = 'tempswsettings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'switchadmintempswsettings';

wgSystem::defPostValue('pagetempswsettings', 'New module -> tempswsettings');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('tempswsettings', wgLang::get('tempswsettings'), false, $tpl->getBlock($block));
// ----------- tempswsettings end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>