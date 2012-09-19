<?php
/**
 * Page list for module Jobnumbers
 * 
 * @package      WebGuru3
 * @subpackage   modules/jobnumbers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. March 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- jobnumbers (Block: jobnumbers) start -----------
$block = 'jobnumbers';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'listjobnumbers';

wgSessions::setPageValueDefault('search', NULL);
if ((bool) wgPost::isValue('search')) wgSessions::setPageValue('search', wgPost::getValue('search'));
$var['SEARCHVAL'] = wgSessions::getPageValue('search');

wgSystem::defPostValue(JobnumbersModel::COL_NAME, '');
wgSystem::defPostValue(JobnumbersModel::COL_SHORTNAME, '');
wgSystem::defPostValue(JobnumbersModel::COL_JNUMBER, '');
wgSystem::defPostValue(JobnumbersModel::COL_STATUS, 1);
$lv = array();
$item = new JobnumbersModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = JobnumbersModel::getAllWithSearchPager(pager::getPage($block), 20, wgSessions::getPageValue('search'));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listjobnumbers');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LSHORTNAME'] = $val->getShortname();
	$lv['LJNUMBER'] = $val->getJnumber();
	$lv['LSTATUS'] = ((bool) $val->getStatus()) ? 'green' : 'red';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=listjobnumbers'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=listjobnumbers'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listjobnumbers');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'listjobnumbers') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLSHORTNAME'] = $item->getShortname();
$var['COLJNUMBER'] = $item->getJnumber();
$var['FULLCOLSTATUS'] = formsHelper::getCheckBox('status', $item->getStatus(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('jobnumbers', wgLang::get('jobnumbers'), true, $tpl->getBlock($block));
// ----------- jobnumbers end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>