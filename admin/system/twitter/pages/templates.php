<?php
/**
 * Page templates for module Twitter
 * 
 * @package      WebGuru3
 * @subpackage   modules/twitter/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. June 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- listmessages (Block: listmessages) start -----------
$block = 'listmessages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslistmessages';

wgSystem::defPostValue(TwitterTemplatesModel::COL_LIMIT, 20);
wgSystem::defPostValue(TwitterTemplatesModel::COL_DATASOURCE, 1);
wgSystem::defPostValue(TwitterTemplatesModel::COL_DATEFORMAT, 'd. m. Y, H:i:s');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPBEGIN, '<dl>');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPITEM, '<dt id="date{%Id}">{%Date}</dt>
<dd id="text{%Id}"><img src="{%Image}" alt="{%Username}" /><em>{%Fullname}</em> {%Text}</dd>');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPEND, '</dl>');
$lv = array();
$item = new TwitterTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());


$arr = TwitterTemplatesModel::getPagerByType(pager::getPage($block), 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlistmessages');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlistmessages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['COLLIMIT'] = $item->getLimit();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), array(wgLang::get('desc'), wgLang::get('asc')));
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLTEMPBEGIN'] = $item->getTempbegin();
$var['COLTEMPITEM'] = $item->getTempitem();
$var['COLTEMPEND'] = $item->getTempend();
$var['FULLTWITTERACCOUNTSID'] = formsHelper::getSelectBox('twitter_accounts_id', $item->getTwitterAccountsId(), TwitterAccountsModel::getAccountsByName());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('listmessages', wgLang::get('listmessages'), true, $tpl->getBlock($block));
// ----------- listmessages end -----------

// ----------- lastmessage (Block: lastmessage) start -----------
$block = 'lastmessage';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(TwitterTemplatesModel::COL_DATEFORMAT, 'd. m. Y, H:i:s');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPITEM, '<div>
	<p id="date{%Id}">{%Date}</p>
	<p id="text{%Id}"><img src="{%Image}" alt="{%Username}" /><em>{%Fullname}</em> {%Text}</p>
</div>');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPEND, '<p>'.wgLang::get('nomessage').'</p>');
$lv = array();
$item = new TwitterTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = TwitterTemplatesModel::getPagerByType(pager::getPage($block), 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlastmessage');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlastmessage');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLLIMIT'] = $item->getLimit();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLTEMPBEGIN'] = $item->getTempbegin();
$var['COLTEMPITEM'] = $item->getTempitem();
$var['COLTEMPEND'] = $item->getTempend();
$var['COLTWITTERACCOUNTSID'] = $item->getTwitterAccountsId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('lastmessage', wgLang::get('lastmessage'), false, $tpl->getBlock($block));
// ----------- lastmessage end -----------

// ----------- sendmessage (Block: sendmessage) start -----------
$block = 'sendmessage';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(TwitterTemplatesModel::COL_DATEFORMAT, '');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPBEGIN, '');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPITEM, '');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(TwitterTemplatesModel::COL_TWITTER_ACCOUNTS_ID, '');
$lv = array();
$item = new TwitterTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = TwitterTemplatesModel::getPagerByType(pager::getPage($block), 2);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsendmessage');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsendmessage');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();
$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLLIMIT'] = $item->getLimit();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLDATEFORMAT'] = $item->getDateformat();
$var['COLTEMPBEGIN'] = $item->getTempbegin();
$var['COLTEMPITEM'] = $item->getTempitem();
$var['COLTEMPEND'] = $item->getTempend();
$var['COLTWITTERACCOUNTSID'] = $item->getTwitterAccountsId();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('sendmessage', wgLang::get('sendmessage'), false, $tpl->getBlock($block));
// ----------- sendmessage end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>