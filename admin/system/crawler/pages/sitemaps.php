<?php
/**
 * Page sitemaps for module Crawler
 * 
 * @package      WebGuru3
 * @subpackage   modules/crawler/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        18. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- results (Block: results) start -----------
$block = 'results';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'sitemapsresults';


wgSystem::defPostValue(CrawlerResultsModel::COL_ID, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_ADDR, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_ROOT, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_CRAWLER_WEBSITES_ID, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_ARANK, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_LEVEL, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_TEXT, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_TITLE, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_H1, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_KEYWORDS, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(CrawlerResultsModel::COL_ADDED, time());
wgSystem::defPostValue(CrawlerResultsModel::COL_CHANGED, time());
wgSystem::defPostValue(CrawlerResultsModel::COL_IMAGE, '');
$lv = array();
$item = new CrawlerResultsModel();
$item->setDefaultResults(wgSystem::getPost());

//$var['NEWACTIONNAME'] = makeTableEditLink($val->getId(), 'show=sitemapsresults');

// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'sitemapsresults') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = CrawlerResultsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listresults');
	$lv['LID'] = $val->getId();
	$lv['LADDR'] = $val->getAddr();
	$lv['LROOT'] = $val->getRoot();
	$lv['LCRAWLERWEBSITESID'] = $val->getCrawlerWebsitesId();
	$lv['LARANK'] = $val->getArank();
	$lv['LLEVEL'] = $val->getLevel();
	$lv['LTEXT'] = $val->getText();
	$lv['LTITLE'] = $val->getTitle();
	$lv['LHA'] = $val->getH1();
	$lv['LKEYWORDS'] = $val->getKeywords();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LIMAGE'] = $val->getImage();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=sitemapsresults'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=sitemapsresults'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listresults');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'sitemapsresults') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLADDR'] = $item->getAddr();
$var['COLROOT'] = $item->getRoot();
$var['COLCRAWLERWEBSITESID'] = $item->getCrawlerWebsitesId();
$var['COLARANK'] = $item->getArank();
$var['COLLEVEL'] = $item->getLevel();
$var['COLTEXT'] = $item->getText();
$var['COLTITLE'] = $item->getTitle();
$var['COLHA'] = $item->getH1();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['FULLCOLIMAGE'] = formsHelper::getCheckBox('image', $item->getImage(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('results', wgLang::get('results'), true, $tpl->getBlock($block));
// ----------- results end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>