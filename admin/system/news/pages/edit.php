<?php
// add something to the head of the page here
$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
// enable or disable on page javascript editor (tiny_mce, etc ...)
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

$params = array();
$var['ACTIONNAME'] = 'editnewsitems';

// set default values for columns here
wgSystem::defPostValue(NewsItemsModel::COL_NAME, '');
wgSystem::defPostValue(NewsItemsModel::COL_HEAD, '');
wgSystem::defPostValue(NewsItemsModel::COL_TEXT, '');
wgSystem::defPostValue(NewsItemsModel::COL_DISPLAYFROM, time());
wgSystem::defPostValue(NewsItemsModel::COL_DISPLAYTO, strtotime('+1 year'));
wgSystem::defPostValue(NewsItemsModel::COL_DATEFOR, time());

if (!(bool) wgGet::getValue('edit')) {
	$item = new NewsItemsModel();
	$item->setDefaultResults(wgSystem::getPost());
}
else $item = NewsItemsModel::doSelectPKey(wgGet::getValue('edit'));


// ----------------------------- starting text (newsitemsa) -----------------------------
$block = 'newsitemsa';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['COLNAME'] = wgParse::decode($item->getName());
$var['COLHEAD'] = wgParse::decode($item->getHead());
$var['COLTEXT'] = wgParse::decode($item->getText());

if ((bool) $item->getId()) $selected = $item->getNewsCategoriesId();
else $selected = (int) wgGet::getValue('parent');
$var['FULLCAT'] = formsHelper::getSelectBox('news_categories_id', $selected, NewsCategoriesModel::getSelectBoxTree(), array(), wgLang::get('homecat'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab($block, wgLang::get('text'), true, $tpl->getBlock($block));


// ----------------------------- starting settings (newsitemsb) -----------------------------
$block = 'newsitemsb';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);


//$var = array();
$var['FULLCOLDISPLAYFROM'] = formsHelper::getDateTimeBox('displayfrom', $item->getDisplayfrom());
$var['FULLCOLDISPLAYTO'] = formsHelper::getDateTimeBox('displayto', $item->getDisplayto(), strtotime('+1 year'));
$var['FULLCOLDATEFOR'] = formsHelper::getDateTimeBox('datefor', $item->getDatefor());
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