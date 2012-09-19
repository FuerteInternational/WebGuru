<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'pageseditcampaignpages';

// set default values for columns here
wgSystem::defPostValue(CampaignPagesModel::COL_CAMPAIGN_ID, '');
wgSystem::defPostValue(CampaignPagesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(CampaignPagesModel::COL_ADDTEXT1, '');
wgSystem::defPostValue(CampaignPagesModel::COL_ADDTEXT2, '');
wgSystem::defPostValue(CampaignPagesModel::COL_SORT, '');
wgSystem::defPostValue(CampaignPagesModel::COL_HEAD, '');
wgSystem::defPostValue(CampaignPagesModel::COL_NOTE, '');
wgSystem::defPostValue(CampaignPagesModel::COL_REDIRECT1, '');
wgSystem::defPostValue(CampaignPagesModel::COL_REDIRECT2, '');
wgSystem::defPostValue(CampaignPagesModel::COL_REDIRECT3, '');
wgSystem::defPostValue(CampaignPagesModel::COL_REDIRECT4, '');
wgSystem::defPostValue(CampaignPagesModel::COL_NAME, '');
wgSystem::defPostValue(CampaignPagesModel::COL_TITLE, '');
wgSystem::defPostValue(CampaignPagesModel::COL_HEADING1, '');
wgSystem::defPostValue(CampaignPagesModel::COL_ENABLED, '');
wgSystem::defPostValue(CampaignPagesModel::COL_PARENTID, '');
wgSystem::defPostValue(CampaignPagesModel::COL_HOME, '');
wgSystem::defPostValue(CampaignPagesModel::COL_PAGE, '');
wgSystem::defPostValue(CampaignPagesModel::COL_HEADING2, '');
wgSystem::defPostValue(CampaignPagesModel::COL_HEADING3, '');
wgSystem::defPostValue(CampaignPagesModel::COL_REWRITE, '');
wgSystem::defPostValue(CampaignPagesModel::COL_KEYWORDS, '');
wgSystem::defPostValue(CampaignPagesModel::COL_DESCRIPTION, '');

if (!(bool) wgGet::getValue('edit')) {
	$item = new CampaignPagesModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = CampaignPagesModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting main (campaignpagesa) -----------------------------
$block = 'campaignpagesa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = $item->getName();
$var['COLTITLE'] = $item->getTitle();
$var['COLHEADING1'] = $item->getHeading1();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['COLPARENTID'] = $item->getParentid();
$var['FULLCOLHOME'] = formsHelper::getCheckBox('home', $item->getHome(), 1);
$var['COLPAGE'] = $item->getPage();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('main'), true, $tpl->getBlock($block));




// ----------------------------- starting settings (campaignpagesc) -----------------------------
$block = 'campaignpagesc';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLCAMPAIGNID'] = $item->getCampaignId();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLADDTEXT1'] = $item->getAddtext1();
$var['COLADDTEXT2'] = $item->getAddtext2();
$var['COLSORT'] = $item->getSort();
$var['COLHEAD'] = $item->getHead();
$var['COLNOTE'] = $item->getNote();
$var['COLREDIRECT1'] = $item->getRedirect1();
$var['COLREDIRECT2'] = $item->getRedirect2();
$var['COLREDIRECT3'] = $item->getRedirect3();
$var['COLREDIRECT4'] = $item->getRedirect4();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('settings'), false, $tpl->getBlock($block));


// ----------------------------- starting seo (campaignpagesb) -----------------------------
$block = 'campaignpagesb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLHEADING2'] = $item->getHeading2();
$var['COLHEADING3'] = $item->getHeading3();
$var['COLREWRITE'] = $item->getRewrite();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLDESCRIPTION'] = $item->getDescription();
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('seo'), false, $tpl->getBlock($block));

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