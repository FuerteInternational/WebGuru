<?php
/**
 * Page outputtemplates for module Languages
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- admin1 (Block: admin1) start -----------
$block = 'admin1';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'outputtemplatesadmin1';


wgSystem::defPostValue(FormsItemsModel::COL_ID, '');
wgSystem::defPostValue(FormsItemsModel::COL_MAILFIELD, '');
wgSystem::defPostValue(FormsItemsModel::COL_ADMINMAIL, '');
wgSystem::defPostValue(FormsItemsModel::COL_TEMPLATE, '');
wgSystem::defPostValue(FormsItemsModel::COL_USEHTML, '');
wgSystem::defPostValue(FormsItemsModel::COL_MAILHTML, '');
wgSystem::defPostValue(FormsItemsModel::COL_USETXT, '');
wgSystem::defPostValue(FormsItemsModel::COL_MAILTXT, '');
wgSystem::defPostValue(FormsItemsModel::COL_OKMESSAGE, '');
wgSystem::defPostValue(FormsItemsModel::COL_ERRORMESSAGE, '');
wgSystem::defPostValue(FormsItemsModel::COL_WARNINGMESSAGE, '');
wgSystem::defPostValue(FormsItemsModel::COL_REDIRECT, '');
wgSystem::defPostValue(FormsItemsModel::COL_NAME, '');
wgSystem::defPostValue(FormsItemsModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(FormsItemsModel::COL_ADDED, time());
wgSystem::defPostValue(FormsItemsModel::COL_CHANGED, time());
$lv = array();
$item = new FormsItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = FormsItemsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listadmin1');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LMAILFIELD'] = $val->getMailfield();
	$lv['LFORMSMESSAGESGROUPID'] = $val->getFormsMessagesGroupId();
	$lv['LADMINMAIL'] = $val->getAdminmail();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LUSEHTML'] = $val->getUsehtml();
	$lv['LMAILHTML'] = $val->getMailhtml();
	$lv['LUSETXT'] = $val->getUsetxt();
	$lv['LMAILTXT'] = $val->getMailtxt();
	$lv['LOKMESSAGE'] = $val->getOkmessage();
	$lv['LERRORMESSAGE'] = $val->getErrormessage();
	$lv['LWARNINGMESSAGE'] = $val->getWarningmessage();
	$lv['LREDIRECT'] = $val->getRedirect();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listadmin1');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'outputtemplatesadmin1') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$var['COLMAILFIELD'] = $item->getMailfield();
$params = array();
$params['baseclass'] = 'FormsMessagesGroupsModel';
$var['FULLCOLFORMSMESSAGESGROUPID'] = formsHelper::getSelectBox('forms_messages_group_id', $item->getFormsMessagesGroupId(), FormsMessagesGroupsModel::doSelect(), $params);
$var['COLADMINMAIL'] = $item->getAdminmail();
$var['COLTEMPLATE'] = $item->getTemplate();
$var['FULLCOLUSEHTML'] = formsHelper::getCheckBox('usehtml', $item->getUsehtml(), 1);
$var['COLMAILHTML'] = $item->getMailhtml();
$var['FULLCOLUSETXT'] = formsHelper::getCheckBox('usetxt', $item->getUsetxt(), 1);
$var['COLMAILTXT'] = $item->getMailtxt();
$var['COLOKMESSAGE'] = $item->getOkmessage();
$var['COLERRORMESSAGE'] = $item->getErrormessage();
$var['COLWARNINGMESSAGE'] = $item->getWarningmessage();
$var['COLREDIRECT'] = $item->getRedirect();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('admin1', wgLang::get('admin1'), true, $tpl->getBlock($block));
// ----------- admin1 end -----------

// ----------- table2 (Block: table2) start -----------
$block = 'table2';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'outputtemplatestable2';


wgSystem::defPostValue(CrawlerQueriesModel::COL_ID, '');
wgSystem::defPostValue(CrawlerQueriesModel::COL_CQC_ID, '');
wgSystem::defPostValue(CrawlerQueriesModel::COL_QUERY, '');
wgSystem::defPostValue(CrawlerQueriesModel::COL_ADDED, time());
wgSystem::defPostValue(CrawlerQueriesModel::COL_USERS_ID, '');
$lv = array();
$item = new CrawlerQueriesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CrawlerQueriesModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtable2');
	$lv['LID'] = $val->getId();
	$lv['LCQCID'] = $val->getCqcId();
	$lv['LQUERY'] = $val->getQuery();
	$lv['LADDED'] = $val->getAdded();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtable2');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'outputtemplatestable2') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLCQCID'] = $item->getCqcId();
$var['COLQUERY'] = $item->getQuery();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['COLUSERSID'] = $item->getUsersId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('table2', wgLang::get('table2'), false, $tpl->getBlock($block));
// ----------- table2 end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>