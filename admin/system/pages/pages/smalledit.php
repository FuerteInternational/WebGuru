<?php
$system['parse']['head'] = '';
$system['parse']['editor'] = true;

$params = array();
$var['ACTIONNAME'] = 'editpagepages';

wgSystem::defPostValue(PagesModel::COL_PAGES_TEMPLATES_ID, 0);
wgSystem::defPostValue(PagesModel::COL_ENABLED, 1);
wgSystem::defPostValue(PagesModel::COL_PARENTID, '');
wgSystem::defPostValue(PagesModel::COL_PAGE, '');
wgSystem::defPostValue(PagesModel::COL_HOME, 0);
wgSystem::defPostValue(PagesModel::COL_SYSTEM_WEBSITES_ID, wgSystem::getCurrentWebsite());
wgSystem::defPostValue(PagesModel::COL_SYSTEM_LANGUAGE_ID, wgLang::getLanguageId());
wgSystem::defPostValue(PagesModel::COL_SORT, 0);
wgSystem::defPostValue(PagesModel::COL_NOTE, '...');
wgSystem::defPostValue(PagesModel::COL_REWRITE, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new PagesModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = PagesModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting page (pagesa) -----------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$params = array();
$var['FULLCOLPAGESTEMPLATESID'] = formsHelper::getSelectBox('pages_templates_id', $item->getPagesTemplatesId(), PagesTemplatesModel::getSelectablePageTemplates(), array(), wgLang::get('inherit'));
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLTITLE'] = $item->getTitle();
$var['COLHEADING1'] = $item->getHeading1();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['COLPARENTID'] = $item->getParentid();
$var['COLPAGE'] = $item->getPage();
$var['COLHEADING2'] = $item->getHeading2();
$var['COLHEADING3'] = $item->getHeading3();
$var['COLREWRITE'] = $item->getRewrite();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLADDTEXT1'] = $item->getAddtext1();
$var['COLADDTEXT2'] = $item->getAddtext2();
$var = wgSystem::getFormCallback($var);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'SystemLanguageModel';
$var['FULLCOLSYSTEMLANGUAGEID'] = formsHelper::getSelectBox('system_language_id', $item->getSystemLanguageId(), SystemLanguageModel::doSelect(), $params);
$var['COLSORT'] = $item->getSort();
$var['COLHEAD'] = $item->getHead();
$var['COLNOTE'] = $item->getNote();
$var = wgSystem::getFormCallback($var);
$var['EDIT'] = $item->getPrimaryKey();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>