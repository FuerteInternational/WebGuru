<?php
/**
 * Page messages for module Forms
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. April 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- messages (Block: messages) start -----------
$groups = FormsMessagesGroupsModel::getGroups();
$xml = new xml();
foreach ($groups as $group) {
	$gid = $group->getId();
	$block = 'messages';
	$tpl = new wgParse($temp, $path);
	$tpl->setCurrentBlock($block);
	
	$var['ACTIONNAME'] = 'messagesmessages';
	
	wgSystem::defPostValue(FormsMessagesModel::COL_FORMS_MESSAGES_GROUPS_ID, '');
	wgSystem::defPostValue(FormsMessagesModel::COL_DATA, '');
	$lv = array();
	$item = new FormsMessagesModel();
	$item->setDefaultResults(wgSystem::getPost());
	
	$arr = FormsMessagesModel::getMessagesPagerForGroup($gid, pager::getPage($block));
	if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
		$form = FormsItemsModel::getFormByIdFromCache($val->getFormsItemsId());
		$data = xml::xmlToArray($val->getData());
		if ((bool) $form->getMailfield() && isset($data[$form->getMailfield()])) {
			$from = $data[$form->getMailfield()];
			$from = '<a href="mailto:'.$from.'">'.$from.'</a>';
		}
		else $from = '---';
		$tpl->setCurrentBlock('listmessages');
		$lv['LID'] = $val->getId();
		$lv['FORMNAME'] = $form->getName();
		$lv['FROM'] = $from;
		$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
		$lv['EDITROW'] = wgIcons::getButton('eye', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
		$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
		$tpl->setVariable($lv);
		$tpl->parseBlock('listmessages');
		if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'messagesmessages') $item = $val;
	}
	$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
	$lv = array();
	
	
	if ((bool) $item->getId()) {
		$form = FormsItemsModel::getFormByIdFromCache($item->getFormsItemsId());
		$data = xml::xmlToArray($item->getData());

		foreach ($data as $fk=>$field) $data[$fk] = nl2br($field);
		
		$var['FORMNAME'] = $form->getName();
		if (!$form->getUsehtml()) {
			$temp = $form->getMailhtml();
			$var['MESSAGE'] = moduleForms::parseMessage($temp, $data);
		}
		else $var['MESSAGE'] = moduleForms::doAutoHtmlMessage($form, $data);
		$var['ADDED'] = wgSystem::formatDate($item->getAdded());
		
		$var = wgSystem::getFormCallback($var);
	}
	else $var['HIDDEN'] = ' style="display:none;"';
	
	$tpl->setVariable($var);
	$tpl->parseBlock($block);
	$tab->addTab('messgro'.$gid, $group->getName(), true, $tpl->getBlock($block));
}
// ----------- messages end -----------

// ----------- mgroups (Block: mgroups) start -----------
$block = 'mgroups';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'messagesmgroups';


wgSystem::defPostValue(FormsMessagesGroupsModel::COL_ID, '');
wgSystem::defPostValue(FormsMessagesGroupsModel::COL_NAME, '');
$lv = array();
$item = new FormsMessagesGroupsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = FormsMessagesGroupsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmgroups');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmgroups');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'messagesmgroups') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('mgroups', wgLang::get('mgroups'), false, $tpl->getBlock($block));
// ----------- mgroups end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>