<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$showgroup = (int) wgSessions::getModuleValue('showgroup');

$params = array();
$var['ACTIONNAME'] = 'edittemplatepagestemplates';

// set default values for columns here
wgSystem::defPostValue(PagesTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_MASTER, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_TEMPLATE, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_REGISTERED, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_SYSTEM_LANGUAGE_ID, '');
wgSystem::defPostValue(PagesTemplatesModel::COL_PAGES_TEMPLATES_GROUPS_ID, $showgroup);
wgSystem::defPostValue(PagesTemplatesModel::COL_NOTE, '...');

if (!(bool) wgGet::getValue('edit')) {
	$item = new PagesTemplatesModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = PagesTemplatesModel::doSelectPKey(wgGet::getValue('edit'));


// ----------------------------- starting template (pagestemplatesa) -----------------------------
$block = 'pagestemplatesa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLMASTER'] = formsHelper::getCheckBox('master', $item->getMaster(), 1);
$var['COLTEMPLATE'] = wgText::decodeTemplate($item->getTemplate());
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('template'), true, $tpl->getBlock($block));


// ----------------------------- starting settings (pagestemplatesb) -----------------------------
$block = 'pagestemplatesb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLCOLREGISTERED'] = formsHelper::getSelectBox('registered', $item->getRegistered(), array(0=>wgLang::get('foreveryone'), 1=>wgLang::get('forregistered'), 2=>wgLang::get('fornotregistered'), 3=>wgLang::get('forallmobile'), 4=>wgLang::get('fornomobile'), 5=>wgLang::get('formobile'), 6=>wgLang::get('fortablets'), 7=>wgLang::get('forios'), 8=>wgLang::get('forandroid'), 7=>wgLang::get('forpcandtablet')));
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'PagesTemplatesGroupsModel';
$var['FULLCOLPAGESTEMPLATESGROUPSID'] = formsHelper::getSelectBox('pages_templates_groups_id', $item->getPagesTemplatesGroupsId(), PagesTemplatesGroupsModel::doSelect(), $params, wgLang::get('nogroup'));
$var['COLNOTE'] = $item->getNote();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('settings'), false, $tpl->getBlock($block));

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