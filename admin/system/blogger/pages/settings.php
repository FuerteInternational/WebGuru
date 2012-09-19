<?php
/**
 * Page settings for module Blogger
 * 
 * @package      WebGuru3
 * @subpackage   modules/blogger/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        11. June 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- accounts (Block: accounts) start -----------
$block = 'accounts';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settingsaccounts';


wgSystem::defPostValue(BloggerAccountsModel::COL_ID, '');
wgSystem::defPostValue(BloggerAccountsModel::COL_NAME, '');
wgSystem::defPostValue(BloggerAccountsModel::COL_PASSWORD, '');
wgSystem::defPostValue(BloggerAccountsModel::COL_BLOGID, '');
wgSystem::defPostValue(BloggerAccountsModel::COL_NOTE, '');
$lv = array();
$item = new BloggerAccountsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = BloggerAccountsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listaccounts');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LPASSWORD'] = $val->getPassword();
	$lv['LBLOGID'] = $val->getBlogid();
	$lv['LNOTE'] = $val->getNote();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listaccounts');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'settingsaccounts') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLPASSWORD'] = $item->getPassword();
$var['COLBLOGID'] = $item->getBlogid();
$var['COLNOTE'] = $item->getNote();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('accounts', wgLang::get('accounts'), true, $tpl->getBlock($block));
// ----------- accounts end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>