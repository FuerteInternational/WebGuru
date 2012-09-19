<?php
/**
 * Page wallpapers for module Iwallpapers
 * 
 * @package      WebGuru3
 * @subpackage   modules/iwallpapers/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        26. January 2010
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- images (Block: images) start -----------
$block = 'images';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'wallpapersimages';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(IwallpapersImagesModel::COL_ID, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_NAME, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_FILE, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_RATINGDATA, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_VOTES, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_RATING, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_KEYWORDS, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_USER_ID, '');
wgSystem::defPostValue(IwallpapersImagesModel::COL_ADDED, time());
$lv = array();
$item = new IwallpapersImagesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = IwallpapersImagesModel::getSelfPagerData(pager::getPage($block), 20);
$arr = IwallpapersImagesModel::doPager(array(), pager::getPage($block));
// IwallpapersImagesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listimages');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LFILE'] = $val->getFile();
	$lv['LRATINGDATA'] = $val->getRatingdata();
	$lv['LVOTES'] = $val->getVotes();
	$lv['LRATING'] = $val->getRating();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LKEYWORDS'] = $val->getKeywords();
	$lv['LUSERID'] = $val->getUserId();
	$lv['LADDED'] = $val->getAdded();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listimages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$img = $item->getId().'-'.$item->getFile();
if (file_exists(wgPaths::getUserfilesPath('ftp', $item->getAdded()).$img)) $var['IMAGEPATH'] = wgPaths::getUserfilesPath('url', $item->getAdded()).$img;
else $var['IMAGEPATH'] = wgPaths::getModulePath('url', 'iwallpapers').'data/default-wpaper.jpg';

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLFILE'] = $item->getFile();
$var['COLRATINGDATA'] = $item->getRatingdata();
$var['COLVOTES'] = $item->getVotes();
$var['COLRATING'] = $item->getRating();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLUSERID'] = $item->getUserId();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('images', wgLang::get('images'), true, $tpl->getBlock($block));
// ----------- images end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>