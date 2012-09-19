<?php
/**
 * Page index for module Forms
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- forms (Block: forms) start -----------
$block = 'forms';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexforms';
$var['ACTIONNEW'] = wgPaths::makePageLink('editforms');

$lv = array();
$item = new FormsItemsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = FormsItemsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listforms');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LMAILFIELD'] = $val->getMailfield();
	$lv['LFORMSMESSAGESGROUPID'] = $val->getFormsMessagesGroupId();
	$lv['LADMINMAIL'] = $val->getAdminmail();
	$lv['LTEMPLATE'] = $val->getTemplate();
	$lv['LOKMESSAGE'] = $val->getOkmessage();
	$lv['LERRORMESSAGE'] = $val->getErrormessage();
	$lv['LWARNINGMESSAGE'] = $val->getWarningmessage();
	$lv['LREDIRECT'] = $val->getRedirect();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makePageLink('editforms', 'show=indexforms&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=indexforms&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listforms');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexforms') $item = $val;
}
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('forms', wgLang::get('forms'), true, $tpl->getBlock($block));
// ----------- forms end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>