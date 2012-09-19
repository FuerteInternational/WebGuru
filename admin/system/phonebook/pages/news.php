<?php
/**
 * Page news for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- news (Block: news) start -----------
$block = 'news';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'newsnews';


wgSystem::defPostValue(JoshtrayNewsModel::COL_ID, '');
wgSystem::defPostValue(JoshtrayNewsModel::COL_ADDED, time());
wgSystem::defPostValue(JoshtrayNewsModel::COL_CHANGED, time());
wgSystem::defPostValue(JoshtrayNewsModel::COL_NAME, '');
wgSystem::defPostValue(JoshtrayNewsModel::COL_MESSAGE, '');
wgSystem::defPostValue(JoshtrayNewsModel::COL_SHOW, 1);
$lv = array();
$item = new JoshtrayNewsModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'newsnews') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = JoshtrayNewsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listnews');
	$lv['LID'] = $val->getId();
	$lv['LJOSHTRAYPEOPLEID'] = $val->getJoshtrayPeopleId();
	$lv['LJOSHTRAYGROUPSID'] = $val->getJoshtrayGroupsId();
	$lv['LADDED'] = $val->getAdded();
	$lv['LCHANGED'] = $val->getChanged();
	$lv['LNAME'] = $val->getName();
	$lv['LMESSAGE'] = $val->getMessage();
	$lv['LSHOW'] = $val->getShow();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=newsnews&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=newsnews&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listnews');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'newsnews') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'JoshtrayPeopleModel';
//$var['FULLCOLJOSHTRAYPEOPLEID'] = formsHelper::getSelectBox('joshtray_people_id', $item->getJoshtrayPeopleId(), JoshtrayPeopleModel::doSelect(), $params);
$params = array();
$params['baseclass'] = 'JoshtrayGroupsModel';
$var['FULLCOLJOSHTRAYGROUPSID'] = formsHelper::getSelectBox('joshtray_groups_id', $item->getJoshtrayGroupsId(), JoshtrayGroupsModel::doSelect(), $params);
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());
$var['COLNAME'] = $item->getName();
$var['COLMESSAGE'] = $item->getMessage();
$var['FULLCOLSHOW'] = formsHelper::getCheckBox('show', $item->getShow(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('news', wgLang::get('news'), true, $tpl->getBlock($block));
// ----------- news end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>