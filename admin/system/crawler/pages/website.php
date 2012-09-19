<?php
// add something to the head of the page here
$system['parse']['head'] = '';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'websitecrawlerwebsites';

// set default values for columns here
wgSystem::defPostValue(CrawlerWebsitesModel::COL_NAME, '');
wgSystem::defPostValue(CrawlerWebsitesModel::COL_URL, 'http://');
wgSystem::defPostValue(CrawlerWebsitesModel::COL_DESCRIPTION, '...');

if (!(bool) wgGet::getValue('edit')) {
	$item = new CrawlerWebsitesModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = CrawlerWebsitesModel::doSelectPKey(wgGet::getValue('edit'));

// ----------------------------- starting settings (crawlerwebsitesa) -----------------------------
$block = 'crawlerwebsitesa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = $item->getName();
$var['COLURL'] = $item->getUrl();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['FULLCATEGORY'] = formsHelper::getSelectBox('crawler_categories_id', $item->getCrawlerCategoriesId(), CrawlerCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('settings'), false, $tpl->getBlock($block));


// ----------------------------- starting pages (crawlerwebsitesb) -----------------------------

$arr = CrawlerResultsModel::getPagesPagerForWebsite($item->getId(), pager::getPage($block));
if (!empty($arr['data'])) {
	$block = 'crawlerwebsitesb';
	$tpl = new wgParse($temp, $path);
	$tpl->setCurrentBlock($block);
	if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
		$tpl->setCurrentBlock('listwebsites');
		$lv['LID'] = $val->getId();
		$lv['LTITLE'] = valid::cutText($val->getTitle(), 50);
		$lv['LURL'] = valid::cutText($val->getAddr(), 50);
		$lv['FULLURL'] = $val->getAddr();
		$lv['EDITROW'] = wgIcons::getButton('edit', $val->getTitle(), wgPaths::makeTableEditLink($val->getId(), 'show=sitemapsresults&amp;edit='.wgGet::getValue('edit')));
		$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getTitle(), wgPaths::makeTableDeleteLink($val->getId(), 'act=sitemapsresults&amp;edit='.wgGet::getValue('edit')), true);
		$tpl->setVariable($lv);
		$tpl->parseBlock('listwebsites');
	}
	$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
	$lv = array();
	$tpl->setVariable($var);
	$tpl->parseBlock($block);
	$tab->addTab($block, wgLang::get('pages'), true, $tpl->getBlock($block));
}

// ----------------------------- starting images (crawlerwebsitesc) -----------------------------

$arr = array();
if (!empty($arr['data'])) {
	$block = 'crawlerwebsitesc';
	$tpl = new wgParse($temp, $path);
	$tpl->setCurrentBlock($block);
	if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
		$tpl->setCurrentBlock('listwebsites');
		$lv['LID'] = $val->getId();
		$lv['LTITLE'] = valid::cutText($val->getTitle(), 50);
		$lv['LURL'] = valid::cutText($val->getAddr(), 50);
		$lv['FULLURL'] = $val->getAddr();
		$lv['EDITROW'] = wgIcons::getButton('edit', $val->getTitle(), wgPaths::makeTableEditLink($val->getId(), 'show=sitemapsresults&amp;edit='.wgGet::getValue('edit')));
		$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getTitle(), wgPaths::makeTableDeleteLink($val->getId(), 'act=sitemapsresults&amp;edit='.wgGet::getValue('edit')), true);
		$tpl->setVariable($lv);
		$tpl->parseBlock('listwebsites');
	}
	$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
	$lv = array();
	$var = wgSystem::getFormCallback($var);
	$tpl->setVariable($var);
	$tpl->parseBlock($block);
	$tab->addTab($block, wgLang::get('images'), false, $tpl->getBlock($block));
}

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