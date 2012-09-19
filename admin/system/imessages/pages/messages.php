<?php
/**
 * Page messages for module Imessages
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

// ----------- Messages (Block: messages) start -----------
$block = 'messages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'messagesMessages';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(ImessagesMessagesModel::COL_ID, '');
wgSystem::defPostValue(ImessagesMessagesModel::COL_IMESSAGES_FORMS_ID, '');
wgSystem::defPostValue(ImessagesMessagesModel::COL_DATA, '');
wgSystem::defPostValue(ImessagesMessagesModel::COL_FROM, '');
wgSystem::defPostValue(ImessagesMessagesModel::COL_ADDED, time());
wgSystem::defPostValue(ImessagesMessagesModel::COL_DEVICE, '');
wgSystem::defPostValue(ImessagesMessagesModel::COL_CODE, '');
$lv = array();
$item = new ImessagesMessagesModel();
$item->setDefaultResults(wgSystem::getPost());

//$arr = ImessagesMessagesModel::getSelfPagerData(pager::getPage($block), 20);
$arr = ImessagesMessagesModel::doPager(array(), pager::getPage($block));
// ImessagesMessagesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listMessages');
	$lv['LID'] = $val->getId();
	$lv['LIMESSAGESFORMSID'] = $val->getImessagesFormsId();
	$lv['LDATA'] = $val->getData();
	$lv['LFROM'] = $val->getFrom();
	$lv['LADDED'] = $val->getAdded();
	$lv['LDEVICE'] = $val->getDevice();
	$lv['LCODE'] = $val->getCode();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listMessages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLIMESSAGESFORMSID'] = $item->getImessagesFormsId();
$var['COLDATA'] = $item->getData();
$var['COLFROM'] = $item->getFrom();
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['COLDEVICE'] = $item->getDevice();
$var['COLCODE'] = $item->getCode();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('messages', wgLang::get('Messages'), true, $tpl->getBlock($block));
// ----------- Messages end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>