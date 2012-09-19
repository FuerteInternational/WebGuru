<?php
/**
 * Page templates for module Subscriptions
 * 
 * @package      WebGuru3
 * @subpackage   modules/subscriptions/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        3. July 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- subsctiptions (Block: subsctiptions) start -----------
$block = 'subsctiptions';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatessubsctiptions';


wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_ID, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS5, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS6, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS7, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION2, '');
$lv = array();
$item = new EmailsFrontendTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = EmailsFrontendTemplatesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsubsctiptions');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LMESSA'] = $val->getMess1();
	$lv['LMESSB'] = $val->getMess2();
	$lv['LMESSC'] = $val->getMess3();
	$lv['LMESSD'] = $val->getMess4();
	$lv['LMESSE'] = $val->getMess5();
	$lv['LMESSF'] = $val->getMess6();
	$lv['LMESSG'] = $val->getMess7();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LTEMPLATEB'] = $val->getTemplate2();
	$lv['LTEMPLATEC'] = $val->getTemplate3();
	$lv['LDATEFORMAT'] = $val->getDateformat();
	$lv['LREDIRECTIONA'] = $val->getRedirection1();
	$lv['LREDIRECTIONB'] = $val->getRedirection2();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsubsctiptions');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatessubsctiptions') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();
$var['COLMESSF'] = $item->getMess6();
$var['COLMESSG'] = $item->getMess7();
$var['COLTEMPLATE'] = $item->getTemplate();
$var['COLTEMPLATEB'] = $item->getTemplate2();
$var['COLTEMPLATEC'] = $item->getTemplate3();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLREDIRECTIONA'] = $item->getRedirection1();
$var['COLREDIRECTIONB'] = $item->getRedirection2();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('subsctiptions', wgLang::get('subsctiptions'), true, $tpl->getBlock($block));
// ----------- subsctiptions end -----------

// ----------- unsubsctiptions (Block: unsubsctiptions) start -----------
$block = 'unsubsctiptions';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesunsubsctiptions';


wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_ID, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS5, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS6, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS7, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION2, '');
$lv = array();
$item = new EmailsFrontendTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = EmailsFrontendTemplatesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listunsubsctiptions');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LMESSA'] = $val->getMess1();
	$lv['LMESSB'] = $val->getMess2();
	$lv['LMESSC'] = $val->getMess3();
	$lv['LMESSD'] = $val->getMess4();
	$lv['LMESSE'] = $val->getMess5();
	$lv['LMESSF'] = $val->getMess6();
	$lv['LMESSG'] = $val->getMess7();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LTEMPLATEB'] = $val->getTemplate2();
	$lv['LTEMPLATEC'] = $val->getTemplate3();
	$lv['LDATEFORMAT'] = $val->getDateformat();
	$lv['LREDIRECTIONA'] = $val->getRedirection1();
	$lv['LREDIRECTIONB'] = $val->getRedirection2();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listunsubsctiptions');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesunsubsctiptions') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();
$var['COLMESSF'] = $item->getMess6();
$var['COLMESSG'] = $item->getMess7();
$var['COLTEMPLATE'] = $item->getTemplate();
$var['COLTEMPLATEB'] = $item->getTemplate2();
$var['COLTEMPLATEC'] = $item->getTemplate3();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLREDIRECTIONA'] = $item->getRedirection1();
$var['COLREDIRECTIONB'] = $item->getRedirection2();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('unsubsctiptions', wgLang::get('unsubsctiptions'), false, $tpl->getBlock($block));
// ----------- unsubsctiptions end -----------

// ----------- confirmationmail (Block: confirmationmail) start -----------
$block = 'confirmationmail';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesconfirmationmail';


wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_ID, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS5, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS6, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_MESS7, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE2, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_TEMPLATE3, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION1, '');
wgSystem::defPostValue(EmailsFrontendTemplatesModel::COL_REDIRECTION2, '');
$lv = array();
$item = new EmailsFrontendTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = EmailsFrontendTemplatesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listconfirmationmail');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LMESSA'] = $val->getMess1();
	$lv['LMESSB'] = $val->getMess2();
	$lv['LMESSC'] = $val->getMess3();
	$lv['LMESSD'] = $val->getMess4();
	$lv['LMESSE'] = $val->getMess5();
	$lv['LMESSF'] = $val->getMess6();
	$lv['LMESSG'] = $val->getMess7();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LTEMPLATEB'] = $val->getTemplate2();
	$lv['LTEMPLATEC'] = $val->getTemplate3();
	$lv['LDATEFORMAT'] = $val->getDateformat();
	$lv['LREDIRECTIONA'] = $val->getRedirection1();
	$lv['LREDIRECTIONB'] = $val->getRedirection2();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listconfirmationmail');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesconfirmationmail') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();
$var['COLMESSF'] = $item->getMess6();
$var['COLMESSG'] = $item->getMess7();
$var['COLTEMPLATE'] = $item->getTemplate();
$var['COLTEMPLATEB'] = $item->getTemplate2();
$var['COLTEMPLATEC'] = $item->getTemplate3();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLREDIRECTIONA'] = $item->getRedirection1();
$var['COLREDIRECTIONB'] = $item->getRedirection2();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('confirmationmail', wgLang::get('confirmationmail'), false, $tpl->getBlock($block));
// ----------- confirmationmail end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>