<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'editmailemailsgroups';

// set default values for columns here
wgSystem::defPostValue(EmailsGroupsModel::COL_ID, '');
wgSystem::defPostValue(EmailsGroupsModel::COL_NAME, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new EmailsGroupsModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = EmailsGroupsModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting group (emailsgroupsa) -----------------------------
$block = 'emailsgroupsa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = $item->getName();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('group'), false, $tpl->getBlock($block));

// ----------- mastertemplates (Block: mastertemplates) start -----------
$block = 'mastertemplates';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'groupsmastertemplates';


wgSystem::defPostValue(EmailsTemplatesModel::COL_ID, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_DEFAULT, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_HTML, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_TEXT, '');
$lv = array();
$item = new EmailsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'groupsmastertemplates') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$arr = EmailsTemplatesModel::getTemplatesPagerByDefault(pager::getPage($block), 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmastertemplates');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LDEFAULT'] = $val->getDefault();
	$lv['LSYSTEMENCODINGID'] = $val->getSystemEncodingId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LEMAILSGROUPSID'] = $val->getEmailsGroupsId();
	$lv['LHTML'] = $val->getHtml();
	$lv['LTEXT'] = $val->getText();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=groupsmastertemplates&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=groupsmastertemplates&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmastertemplates');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'groupsmastertemplates') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
//$var['FULLCOLDEFAULT'] = formsHelper::getCheckBox('default', $item->getDefault(), 1);
$var['FULLCOLDEFAULT'] = 1;
$params = array();
/*
$params['baseclass'] = 'SystemEncodingModel';
$var['FULLCOLSYSTEMENCODINGID'] = formsHelper::getSelectBox('system_encoding_id', $item->getSystemEncodingId(), SystemEncodingModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'EmailsGroupsModel';
$var['FULLCOLEMAILSGROUPSID'] = formsHelper::getSelectBox('emails_groups_id', $item->getEmailsGroupsId(), EmailsGroupsModel::doSelect(), $params);
*/
$params = array();
$params['baseclass'] = 'SystemEncodingModel';
$var['FULLCOLSYSTEMENCODINGID'] = formsHelper::getSelectBox('system_encoding_id', $item->getSystemEncodingId(), SystemEncodingModel::doSelect(), $params);
$var['COLSYSTEMLANGUAGEID'] = $item->getSystemLanguageId();
$var['COLSYSTEMWEBSITESID'] = $item->getSystemWebsitesId();
$var['COLEMAILSGROUPSID'] = $item->getEmailsGroupsId();
$var['COLHTML'] = wgParse::decode($item->getHtml());
$var['COLTEXT'] = wgParse::decode($item->getText());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('mastertemplates', wgLang::get('mastertemplates'), false, $tpl->getBlock($block));
// ----------- mastertemplates end -----------


// ----------- templates (Block: templates) start -----------
$block = 'templates';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'groupstemplates';


wgSystem::defPostValue(EmailsTemplatesModel::COL_ID, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_DEFAULT, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_HTML, '');
wgSystem::defPostValue(EmailsTemplatesModel::COL_TEXT, '');
$lv = array();
$item = new EmailsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'groupstemplates') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$arr = EmailsTemplatesModel::getTemplatesPagerByDefault(pager::getPage($block), 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtemplates');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = '{#TMP_'.$val->getIdentifier().'}';
	$lv['LWGCODECLASS'] = ' class="wgcode"';
	$lv['LDEFAULT'] = $val->getDefault();
	$lv['LSYSTEMENCODINGID'] = $val->getSystemEncodingId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LEMAILSGROUPSID'] = $val->getEmailsGroupsId();
	$lv['LHTML'] = $val->getHtml();
	$lv['LTEXT'] = $val->getText();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=groupstemplates&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=groupstemplates&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtemplates');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'groupstemplates') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
//$var['FULLCOLDEFAULT'] = formsHelper::getCheckBox('default', $item->getDefault(), 1);
$var['FULLCOLDEFAULT'] = 0;
$params = array();
$params['baseclass'] = 'SystemEncodingModel';
$var['COLSYSTEMENCODINGID'] = $item->getSystemEncodingId();
$var['COLSYSTEMLANGUAGEID'] = $item->getSystemLanguageId();
$var['COLSYSTEMWEBSITESID'] = $item->getSystemWebsitesId();
$var['COLEMAILSGROUPSID'] = $item->getEmailsGroupsId();
$var['COLHTML'] = wgParse::decode($item->getHtml());
$var['COLTEXT'] = wgParse::decode($item->getText());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('templates', wgLang::get('templates'), true, $tpl->getBlock($block));
// ----------- templates end -----------

// ----------------------------- starting subscribers (emailsgroupsc) -----------------------------

$block = 'emailsgroupsc';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLID'] = $item->getId();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('subscribers'), false, $tpl->getBlock($block));

// ----------------------------- starting unsubscriptions (emailsgroupsd) -----------------------------
$block = 'emailsgroupsd';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var = array();
$var['COLID'] = $item->getId();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('unsubscriptions'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['EDIT'] = $item->getPrimaryKey();
// inserting tabs into the main template
$var['PAGETABSCONTENT'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>