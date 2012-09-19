<?php
/**
 * Page templates for module Ipromote
 * 
 * @package      WebGuru3
 * @subpackage   modules/ipromote/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. August 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- promolist (Block: promolist) start -----------
$block = 'promolist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespromolist';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS1, wgLang::get('promodeleted'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS2, wgLang::get('cantdelpromo'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS3, wgLang::get('nopermpromo'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED1, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED2, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TBEGIN, '<table>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TITEM, '<tr>
	<td><a href="?promo={%Id}">{%Name}</a></td>
	<td>{#WEBROOT}ipromote-{%Id}-{%Identifier}.xml</td>
	<td><a href="?editpromo={%Id}">Edit</a></td>
	<td><a href="?deletepromo={%Id}">Delete</a></td>
</tr>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TEND, '</table>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TNOITEM, '<h2>There is no Promo list started yet.</h2>');

$lv = array();
$item = new IpromoteTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpromolist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpromolist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLREDA'] = $item->getRed1();
$var['COLREDB'] = $item->getRed2();
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('promolist', wgLang::get('promolist'), true, $tpl->getBlock($block));
// ----------- promolist end -----------

// ----------- editpromo (Block: editpromo) start -----------
$block = 'editpromo';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespromolist';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS1, wgLang::get('promosaved'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS2, wgLang::get('promononame'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS3, wgLang::get('promonoperm'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS4, wgLang::get('promonotsaved'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED1, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED2, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TITEM, '<form action="" method="post">
	<p>
		<label for="cname">New promotion list name:</label>
		<input type="text" name="cname" value="{%Name}" />
	</p>
	<p>
		<button type="submit" name="csave">Create</button>
	</p>
</form>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TEND, '<form action="" method="post">
	<p>
		<label for="cname">Edit promotion list {%Name}:</label>
		<input type="text" name="cname" value="{%Name}" />
	</p>
	<p>
		<input type="hidden" name="cedit" value="{%Id}" />
		<button type="submit" name="csave">Save</button>
	</p>
</form>');
$lv = array();
$item = new IpromoteTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listeditpromo');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listeditpromo');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLREDA'] = formsHelper::getSelectBox('red1', $item->getRed1(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirect'));
$var['COLREDB'] = $item->getRed2();
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('editpromo', wgLang::get('editpromo'), false, $tpl->getBlock($block));
// ----------- editpromo end -----------

// ----------- applist (Block: applist) start -----------
$block = 'applist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespromolist';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS1, wgLang::get('appdeleted'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS2, wgLang::get('cantdelapp'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS3, wgLang::get('nopermapp'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED1, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED2, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TBEGIN, '<table>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TITEM, '<tr>
	<td>{%SmallImage}</td>
	<!--<td>{%BigImage}</td>-->
	<!--<td>{%SmallImagePath}</td>-->
	<!--<td>{%BigImagePath}</td>-->
	<td>{%Name}</td>
	<td>{%Link}</td>
	<td>{%Head}</td>
	<td>{%Description}</td>
	<td><a href="?editapp={%Id}">Edit</a></td>
	<td><a href="?deleteapp={%Id}">Delete</a></td>
</tr>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TEND, '</table>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TNOITEM, '<h2>There are no Applications in this Promotional list yet.</h2>');

$lv = array();
$item = new IpromoteTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 2);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listapplist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listapplist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLREDA'] = $item->getRed1();
$var['COLREDB'] = $item->getRed2();
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());
$var['COLTNOITEM'] = wgParse::decode($item->getTnoitem());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('applist', wgLang::get('applist'), false, $tpl->getBlock($block));
// ----------- applist end -----------

// ----------- editapp (Block: editapp) start -----------
$block = 'editapp';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespromolist';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS1, wgLang::get('appsaved'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS2, wgLang::get('appnoname'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS3, wgLang::get('appnoperm'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_MESS4, wgLang::get('appnotsaved'));
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED1, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_RED2, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TITEM, '<form action="" method="post">
	<p>
		<label for="cname">New application name:</label>
		<input type="text" name="aname" value="{%Name}" />
	</p>
	<p>
		<button type="submit" name="asave">Create</button>
	</p>
</form>');
wgSystem::defPostValue(IpromoteTemplatesModel::COL_TEND, '<form action="" method="post">
	<p>
		<label for="cname">Edit {%Name}:</label>
		<input type="text" name="aname" value="{%Name}" />
	</p>
	<p>
		<input type="hidden" name="aedit" value="{%Id}" />
		<button type="submit" name="asave">Create</button>
	</p>
</form>');
$lv = array();
$item = new IpromoteTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = IpromoteTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 3);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listeditapp');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listeditapp');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLREDA'] = formsHelper::getSelectBox('red1', $item->getRed1(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirect'));
$var['COLREDB'] = $item->getRed2();
$var['COLTBEGIN'] = wgParse::decode($item->getTbegin());
$var['COLTITEM'] = wgParse::decode($item->getTitem());
$var['COLTEND'] = wgParse::decode($item->getTend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('editapp', wgLang::get('editapp'), false, $tpl->getBlock($block));
// ----------- editapp end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>