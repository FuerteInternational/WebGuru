<?php
/**
 * Page rss for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        20. February 2009
 */

$system['parse']['head'] = '<script type="text/javascript">
function toggleRssInfo() {
	$(\'#hiddeninfo\').toggle(100);
}
$(document).ready(
	function() {
		$(\'#hiddeninfo\').hide();
	}
);
</script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- rss (Block: rss) start -----------
$block = 'rss';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'rssrss';


wgSystem::defPostValue(NewsRssModel::COL_NAME, '');
wgSystem::defPostValue(NewsRssModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(NewsRssModel::COL_VERSION, 2);
wgSystem::defPostValue(NewsRssModel::COL_SHOWITEMS, 20);
wgSystem::defPostValue(NewsRssModel::COL_LINK, '');
wgSystem::defPostValue(NewsRssModel::COL_FOLDER, 'rss/');
wgSystem::defPostValue(NewsRssModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(NewsRssModel::COL_DISPLAYLANGUAGE, SystemLanguageModel::getCurrentLanguageCode());
wgSystem::defPostValue(NewsRssModel::COL_COPYRIGHT, '');
wgSystem::defPostValue(NewsRssModel::COL_TTL, 15);
wgSystem::defPostValue(NewsRssModel::COL_IMAGE, '');
wgSystem::defPostValue(NewsRssModel::COL_IMAGETITLE, '');
$lv = array();
$item = new NewsRssModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=rssrss');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'rssrss') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = NewsRssModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listrss');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LVERSION'] = $val->getVersion().'.0';
	if ($val->getNewsCategoriesId() == 0) $lv['LNEWSCATEGORY'] = wgLang::get('homecat');
	else $lv['LNEWSCATEGORY'] = NewsCategoriesModel::getCatName($val->getNewsCategoriesId());
	$lv['LSHOWITEMS'] = $val->getShowitems();
	$lv['LFOLDER'] = $val->getFolder();
	$lv['LDISPLAYLANGUAGE'] = $val->getDisplaylanguage();
	$lv['LTTL'] = $val->getTtl();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=rssrss'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=rssrss'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listrss');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'rssrss') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLVERSION'] = formsHelper::getSelectBox('version', $item->getVersion(), array(1=>'1.0', 2=>'2.0'), array());
$params = array();
$params['baseclass'] = 'NewsCategoriesModel';
$var['FULLCOLNEWSCATEGORIESID'] = formsHelper::getSelectBox('news_categories_id', $item->getNewsCategoriesId(), NewsCategoriesModel::doSelect(), $params, wgLang::get('homecat'));
$var['COLSHOWITEMS'] = $item->getShowitems();
$var['COLLINK'] = wgParse::decode($item->getLink());
$var['COLFOLDER'] = $item->getFolder();
$var['COLDESCRIPTION'] = wgParse::decode($item->getDescription());
$var['COLDISPLAYLANGUAGE'] = $item->getDisplaylanguage();
$var['COLCOPYRIGHT'] = wgParse::decode($item->getCopyright());
$var['COLTTL'] = $item->getTtl();
$var['COLIMAGE'] = $item->getImage();
$var['COLIMAGETITLE'] = $item->getImagetitle();
$var['INFOBUTT'] = wgIcons::getButton('info', wgLang::get('infolink'), "javascript: toggleRssInfo();");

$var = wgSystem::getFormCallback($var);

$tpl2 = new wgParse($temp, $path);
$tpl2->setCurrentBlock('main');
$tpl2->setVariable($var);
$tpl2->parseBlock('main');
$tab->addTab('main', wgLang::get('main'), true, $tpl2->getBlock('main'));
//print_r($tpl2);

$tpl2 = new wgParse($temp, $path);
$tpl2->setCurrentBlock('settings');
$tpl2->setVariable($var);
$tpl2->parseBlock('settings');
$tab->addTab('settings', wgLang::get('settings'), true, $tpl2->getBlock('settings'));

$var['TABS'] = $tab->getAll();

$tpl->setVariable($var);
$tpl->parseBlock($block);


// ----------- rss end -----------



$var = array();
$system['parse']['content'] = $tpl->getBlock($block);
?>