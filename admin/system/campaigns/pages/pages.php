<?php
/**
 * Page pages for module Campaigns
 * 
 * @package      WebGuru3
 * @subpackage   modules/campaigns/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        28. July 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- pages (Block: pages) start -----------
$block = 'pages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'pagespages';
$var['ACTION'] = wgPaths::makePageLink('pagesedit');

wgSystem::clearDefPostValue();

$lv = array();
$item = new CampaignPagesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CampaignPagesModel::doPager(array(), pager::getPage($block));
// CampaignPagesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpages');
	$lv['LNAME'] = $val->getName();
	$lv['LREWRITE'] = $val->getRewrite();
	$lv['LENABLED'] = $val->getEnabled();
	$lv['LPARENTID'] = $val->getParentid();
	$lv['LHOME'] = $val->getHome();
	$lv['LSORT'] = $val->getSort();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME'], 'pagesedit'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pages', wgLang::get('pages'), true, $tpl->getBlock($block));
// ----------- pages end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>