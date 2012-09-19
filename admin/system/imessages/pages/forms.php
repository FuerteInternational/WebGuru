<?php
/**
 * Page forms for module Imessages
 * 
 * @package      WebGuru3
 * @subpackage   modules/imessages/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        1. February 2010
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- forms (Block: forms) start -----------
$block = 'forms';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'formsforms';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(ImessagesFormsModel::COL_ID, '');
wgSystem::defPostValue(ImessagesFormsModel::COL_NAME, '');
wgSystem::defPostValue(ImessagesFormsModel::COL_USERS_ID, '');
wgSystem::defPostValue(ImessagesFormsModel::COL_CODE, '');
wgSystem::defPostValue(ImessagesFormsModel::COL_ADDED, time());
$lv = array();
$item = new ImessagesFormsModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = ImessagesFormsModel::getSelfPagerData(pager::getPage($block), 20);
$arr = ImessagesFormsModel::doPager(array(), pager::getPage($block));
// ImessagesFormsModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listforms');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LUSERSID'] = $val->getUsersId();
	$lv['LCODE'] = $val->getCode();
	$lv['LADDED'] = $val->getAdded();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listforms');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLUSERSID'] = $item->getUsersId();
$var['COLCODE'] = $item->getCode();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('forms', wgLang::get('forms'), true, $tpl->getBlock($block));
// ----------- forms end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>