<?php
/**
 * Page templates for module Youtube
 * 
 * @package      WebGuru3
 * @subpackage   modules/youtube/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        3. March 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(SystemTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(SystemTemplatesModel::COL_LIMIT, 20);
wgSystem::defPostValue(SystemTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_VAR1, 'cat');
wgSystem::defPostValue(SystemTemplatesModel::COL_BEGIN1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_ITEM1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_END1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_NOTEMP1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_NOTEMP2, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_TINT1, 1);
$lv = array();
$item = new SystemTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = SystemTemplatesModel::getTemplatesPager(0, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templateslists'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templateslists'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLMODULE'] = $item->getModule();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1, array('id'=>'pagercat'));
$var['COLLIMIT'] = $item->getLimit();
$var['COLTEMPTYPE'] = $item->getTemptype();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLGROUPA'] = $item->getGroup1();
$var['COLGROUPB'] = $item->getGroup2();
$var['COLGROUPC'] = $item->getGroup3();
$var['COLVARA'] = $item->getVar1();
$var['COLVARB'] = $item->getVar2();
$var['COLVARC'] = $item->getVar3();
$var['COLBEGINA'] = $item->getBegin1();
$var['COLITEMA'] = $item->getItem1();
$var['COLENDA'] = $item->getEnd1();
$var['COLNOTEMPA'] = $item->getNotemp1();
$var['COLBEGINB'] = $item->getBegin2();
$var['COLITEMB'] = $item->getItem2();
$var['COLENDB'] = $item->getEnd2();
$var['COLNOTEMPB'] = $item->getNotemp2();
$var['COLINTA'] = $item->getInt1();
$var['COLINTB'] = $item->getInt2();
$var['COLINTC'] = $item->getInt3();
$var['FULLCOLTINTA'] = formsHelper::getCheckBox('tint1', $item->getTint1(), 1);
$var['FULLCOLTINTB'] = formsHelper::getCheckBox('tint2', $item->getTint2(), 1);
$var['FULLCOLTINTC'] = formsHelper::getCheckBox('tint3', $item->getTint3(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), true, $tpl->getBlock($block));
// ----------- categories end -----------

// ----------- lists (Block: lists) start -----------
$block = 'lists';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(SystemTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(SystemTemplatesModel::COL_LIMIT, 20);
wgSystem::defPostValue(SystemTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_VAR1, 'cat');
wgSystem::defPostValue(SystemTemplatesModel::COL_BEGIN1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_ITEM1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_END1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_NOTEMP1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_NOTEMP2, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_TINT1, 1);
$lv = array();
$item = new SystemTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = SystemTemplatesModel::getTemplatesPager(1, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlists');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templateslists'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templateslists'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlists');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLMODULE'] = $item->getModule();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1, array('id'=>'pagerlist'));
$var['COLLIMIT'] = $item->getLimit();
$var['COLTEMPTYPE'] = $item->getTemptype();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLGROUPA'] = $item->getGroup1();
$var['COLGROUPB'] = $item->getGroup2();
$var['COLGROUPC'] = $item->getGroup3();
$var['COLVARA'] = $item->getVar1();
$var['COLVARB'] = $item->getVar2();
$var['COLVARC'] = $item->getVar3();
$var['COLBEGINA'] = $item->getBegin1();
$var['COLITEMA'] = $item->getItem1();
$var['COLENDA'] = $item->getEnd1();
$var['COLNOTEMPA'] = $item->getNotemp1();
$var['COLBEGINB'] = $item->getBegin2();
$var['COLITEMB'] = $item->getItem2();
$var['COLENDB'] = $item->getEnd2();
$var['COLNOTEMPB'] = $item->getNotemp2();
$var['COLINTA'] = $item->getInt1();
$var['COLINTB'] = $item->getInt2();
$var['COLINTC'] = $item->getInt3();
$var['FULLCOLTINTA'] = formsHelper::getCheckBox('tint1', $item->getTint1(), 1);
$var['FULLCOLTINTB'] = formsHelper::getCheckBox('tint2', $item->getTint2(), 1);
$var['FULLCOLTINTC'] = formsHelper::getCheckBox('tint3', $item->getTint3(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('lists', wgLang::get('lists'), false, $tpl->getBlock($block));
// ----------- lists end -----------

// ----------- details (Block: details) start -----------
$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslists';


wgSystem::defPostValue(SystemTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_VAR1, 'detail');
wgSystem::defPostValue(SystemTemplatesModel::COL_BEGIN1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_ITEM1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_END1, '');
wgSystem::defPostValue(SystemTemplatesModel::COL_TINT1, 1);
$lv = array();
$item = new SystemTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = SystemTemplatesModel::getTemplatesPager(2, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templateslists'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templateslists'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templateslists') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLMODULE'] = $item->getModule();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLLIMIT'] = $item->getLimit();
$var['COLTEMPTYPE'] = $item->getTemptype();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLGROUPA'] = $item->getGroup1();
$var['COLGROUPB'] = $item->getGroup2();
$var['COLGROUPC'] = $item->getGroup3();
$var['COLVARA'] = $item->getVar1();
$var['COLVARB'] = $item->getVar2();
$var['COLVARC'] = $item->getVar3();
$var['COLBEGINA'] = $item->getBegin1();
$var['COLITEMA'] = $item->getItem1();
$var['COLENDA'] = $item->getEnd1();
$var['COLNOTEMPA'] = $item->getNotemp1();
$var['COLBEGINB'] = $item->getBegin2();
$var['COLITEMB'] = $item->getItem2();
$var['COLENDB'] = $item->getEnd2();
$var['COLNOTEMPB'] = $item->getNotemp2();
$var['COLINTA'] = $item->getInt1();
$var['COLINTB'] = $item->getInt2();
$var['COLINTC'] = $item->getInt3();
$var['FULLCOLTINTA'] = formsHelper::getCheckBox('tint1', $item->getTint1(), 1);
$var['FULLCOLTINTB'] = formsHelper::getCheckBox('tint2', $item->getTint2(), 1);
$var['FULLCOLTINTC'] = formsHelper::getCheckBox('tint3', $item->getTint3(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), false, $tpl->getBlock($block));
// ----------- details end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>