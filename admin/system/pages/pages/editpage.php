<?php
$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

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

if (!wgGet::isValue('edit')) {
	$item = new PagesModel();
	$item->setDefaultResults(wgPost::getAll());
}
else $item = PagesModel::getOnePage(wgGet::getValue('edit'));

// ----------------------------- starting page (pagesa) -----------------------------
$block = 'pagesa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

if (!(bool) $item->getId()) $var['HIDDEN'] = ' style="display:none;"';

//$var = array();
$var['FULLCOLPAGESTEMPLATESID'] = formsHelper::getSelectBox('pages_templates_id', $item->getPagesTemplatesId(), PagesTemplatesModel::getSelectablePageTemplates(), array(), wgLang::get('inherit'));
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLTITLE'] = $item->getTitle();
$var['COLHEADING1'] = $item->getHeading1();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['COLPARENTID'] = $item->getParentid();
if ((bool) $item->getId()) $selected = $item->getParentid();
else $selected = (int) wgGet::getValue('parent');
$var['FULLPARENTID'] = formsHelper::getSelectBox('parentid', $selected, PagesModel::getSelectBoxTree(0, $item->getId()), array(), wgLang::get('homecat'));
$var['FULLHOME'] = formsHelper::getCheckBox('home', $item->getHome(), 1);
$var['COLPAGE'] = wgText::decodeTemplate($item->getPage());
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('page'), true, $tpl->getBlock($block));

// ----------------------------- starting seosettings (pagesb) -----------------------------
$block = 'pagesb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var = array();
$var['COLHEADING2'] = $item->getHeading2();
$var['COLHEADING3'] = $item->getHeading3();
$var['COLREWRITE'] = $item->getRewrite();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLADDTEXT1'] = $item->getAddtext1();
$var['COLADDTEXT2'] = $item->getAddtext2();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('seosettings'), false, $tpl->getBlock($block));

// ----------------------------- starting preferences (pagesc) -----------------------------
$block = 'pagesc';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var = array();
$var['NOTLOGGEDREDIECT'] = formsHelper::getSelectBox('redirect1', $item->getRedirect1(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirection'));
$var['LOGGEDREDIECT'] = formsHelper::getSelectBox('redirect2', $item->getRedirect2(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirection'));
$var['COLREDIRECT3'] = $item->getRedirect3();
$var['COLREDIRECT4'] = $item->getRedirect4();
$var['COLSORT'] = $item->getSort();
$var['COLHEAD'] = wgText::decodeTemplate($item->getHead());
$var['COLNOTE'] = $item->getNote();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('preferences'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'pagetabscontainer';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

// inserting tabs into the main template
$var['EDIT'] = $item->getId();
$var['PAGETABSCONTENT'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);

$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>