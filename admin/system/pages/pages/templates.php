<?php
/**
 * Page templates for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        11. December 2008
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- templates (Block: templates) start -----------
$block = 'templates';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSessions::setModuleValueDefault('showgroup', 0);
if (wgSystem::isRequest('showgroup')) wgSessions::setModuleValue('showgroup', wgSystem::getRequestValue('showgroup'));

$showgroup = (int) wgSessions::getModuleValue('showgroup');

$var['ACTION'] = wgPaths::makePageLink('edittemplate', 'showgroup='.$showgroup, false);
$var['ACTIONNAME'] = 'templatestemplates';
$var['CHGROUPACTION'] = wgPaths::makeSelfLink(NULL, false);
$data = dataHelper::getIdNameFromResult(PagesTemplatesGroupsModel::doSelect(), array('0'=>wgLang::get('allgroups')));
$var['SELECTGROUPTEMP'] = formsHelper::getSelectBox('showgroup', $showgroup, $data);
$data = NULL;

$lv = array();
$item = new PagesTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());
$arr = PagesTemplatesModel::getTemplatesPagerByGroup($showgroup, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtemplates');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	if ((bool) $val->getMaster()) $lv['LMASTER'] = ' class="bold"';
	else $lv['LMASTER'] = NULL;
	$lv['LREGISTERED'] = $val->getRegistered();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LPAGESTEMPLATESGROUPSID'] = $val->getPagesTemplatesGroupsId();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LNOTE'] = $val->getNote();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makePageLink('edittemplate', 'show=templatestemplates&amp;edit='.$val->getId()), false, array('title'=>'Id: '.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=templatestemplates&amp;delete='.$val->getId().'&amp;showgroup='.$showgroup), true, array('title'=>'Id: '.$val->getId()));
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtemplates');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatestemplates') $item = $val;
}
$lv = array();
$var['DATAPAGER'] = $arr['pager'];

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('templates', wgLang::get('templates'), true, $tpl->getBlock($block));
// ----------- templates end -----------

// ----------- groups (Block: groups) start -----------
$block = 'groups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesgroups';
$var['ACTION'] = wgPaths::makeSelfLink();


wgSystem::defPostValue(PagesTemplatesGroupsModel::COL_FOLDER, 'assets/');
$lv = array();
$item = new PagesTemplatesGroupsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'templatesgroups') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = PagesTemplatesGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LFOLDER'] = $val->getFolder();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=templatesgroups&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=templatesgroups&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesgroups') $item = $val;
}
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLFOLDER'] = $item->getFolder();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('groups', wgLang::get('groups'), false, $tpl->getBlock($block));
// ----------- groups end -----------

// ----------- exportimport (Block: exportimport) start -----------
$block = 'exportimport';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'templatesexportimport';

wgSystem::defPostValue('pageexportimport', 'New module -> exportimport');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('exportimport', wgLang::get('exportimport'), false, $tpl->getBlock($block));
// ----------- exportimport end -----------

// ----------- cssadmin (Block: cssadmin) start -----------
$block = 'cssadmin';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'templatescssadmin';

wgSystem::defPostValue('pagecssadmin', 'New module -> cssadmin');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('cssadmin', wgLang::get('cssadmin'), false, $tpl->getBlock($block));
// ----------- cssadmin end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>