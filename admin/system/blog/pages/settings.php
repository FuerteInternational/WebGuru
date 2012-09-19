<?php
/**
 * Page settings for module Blog
 * 
 * @package      WebGuru3
 * @subpackage   modules/blog/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. June 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- blogs (Block: blogs) start -----------
$block = 'blogs';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settingsblogs';


wgSystem::defPostValue(BlogModel::COL_ID, '');
wgSystem::defPostValue(BlogModel::COL_NAME, '');
wgSystem::defPostValue(BlogModel::COL_USERS_GROUPS_ID, '');
wgSystem::defPostValue(BlogModel::COL_SYSTEM_WEBSITES_ID, '');
$lv = array();
$item = new BlogModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = BlogModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listblogs');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LUSERSGROUPSID'] = $val->getUsersGroupsId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listblogs');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'settingsblogs') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLUSERSGROUPSID'] = $item->getUsersGroupsId();
$var['COLSYSTEMWEBSITESID'] = $item->getSystemWebsitesId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('blogs', wgLang::get('blogs'), true, $tpl->getBlock($block));
// ----------- blogs end -----------

// ----------- settings (Block: settings) start -----------
$block = 'settings';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'settingssettings';

wgSystem::defPostValue('pagesettings', 'New module -> settings');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('settings', wgLang::get('settings'), false, $tpl->getBlock($block));
// ----------- settings end -----------

// ----------- defpic (Block: defpic) start -----------
$block = 'defpic';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'settings';

$file = 'blog-items-def-xsmall.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['XSML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'blog-items-def-small.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['SML'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'blog-items-def-medium.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['MED'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';
$file = 'blog-items-def-large.jpg';
if (file_exists(wgPaths::getUserfilesPath().$file)) $var['LRG'] = '<img src="'.wgPaths::getUserfilesPath('url').$file.'" alt="" />';

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get('picturesset'), false, $tpl->getBlock($block));


$var = array();
$system['parse']['content'] = $tab->getAll();
?>