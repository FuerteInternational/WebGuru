<?php
/**
 * Page templates for module Users
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        1. April 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- userdetails (Block: userdetails) start -----------
$block = 'userdetails';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, 0);
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, 'user');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, 0);
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, wgLang::get('nopermsmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, wgLang::get('wrongmailmess'));
//wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, wgLang::get('nopermsmess'));
//wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, wgLang::get('nopermsmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, wgLang::get('nopermsmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '<div>
	<h1>{%Lastname}, {%Firstname}</h1>
	<p>Mail: {%Mail}</p>
</div>');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '<div>
	<h1>There is no user under this ID</h1>
</div>');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listuserdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listuserdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(0), array('id'=>'detailDS'));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('userdetails', wgLang::get('userdetails'), true, $tpl->getBlock($block));
// ----------- userdetails end -----------

// ----------- userlists (Block: userlists) start -----------
$block = 'userlists';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, '');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listuserlists');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listuserlists');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(1));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = wgText::decodeTemplate($item->getMess1());
$var['COLMESSB'] = wgText::decodeTemplate($item->getMess2());
$var['COLMESSC'] = wgText::decodeTemplate($item->getMess3());
$var['COLMESSD'] = wgText::decodeTemplate($item->getMess4());
$var['COLMESSE'] = wgText::decodeTemplate($item->getMess5());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('userlists', wgLang::get('userlists'), false, $tpl->getBlock($block));
// ----------- userlists end -----------

// ----------- messageslist (Block: messageslist) start -----------
$block = 'messageslist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, '');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 2);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmessageslist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'act='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmessageslist');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(2));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('messageslist', wgLang::get('messageslist'), false, $tpl->getBlock($block));
// ----------- messageslist end -----------

// ----------- messagesforms (Block: messagesforms) start -----------
$block = 'messagesforms';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, '');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 3);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listmessagesforms');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'act='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listmessagesforms');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(3));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('messagesforms', wgLang::get('messagesforms'), false, $tpl->getBlock($block));
// ----------- messagesforms end -----------

// ----------- friendslist (Block: friendslist) start -----------
$block = 'friendslist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, '');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 4);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listfriendslist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'act='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listfriendslist');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(4));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('friendslist', wgLang::get('friendslist'), false, $tpl->getBlock($block));
// ----------- friendslist end -----------

// ----------- addfriends (Block: addfriends) start -----------
$block = 'addfriends';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_PAGER, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_PERPAGE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, '');
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 5);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listaddfriends');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'act='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listaddfriends');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(5));
$var['COLDATASOURCEB'] = $item->getDatasource2();
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('addfriends', wgLang::get('addfriends'), false, $tpl->getBlock($block));
// ----------- addfriends end -----------

// ----------- login (Block: login) start -----------
$block = 'login';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, 'logout');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, wgLang::get('wrongloginmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, wgLang::get('loggeginmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, wgLang::get('logoutmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, wgLang::get('wrongpermsmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, wgLang::get('logoutmess'));
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '<form action="" method="post">
	<p>
		<label>Username / Email</label>
		<input type="text" name="login" value="{%AutoName}" />
	</p>
	<p>
		<label>Password</label>
		<input type="password" name="password" value="" />
	</p>
	<p>
		<label>Remember login</label>
		<input type="checkbox" name="remember" value="1" />
	</p>
	<p>
		<input type="submit" name="submit" value="Login" />
	</p>
</form>');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '<div>
	<h1>{%Lastname}, {%Firstname}</h1>
	<p>Avatar: {%Avatar}</p>
	<p>Nickname: {%Nickname}</p>
	<p>Email: {%Mail}</p>
	<p>Account created: {%Added}</p>
	<p>Last login: {%Lastlogin}</p>
	<p>Last login from: {%Lastip}</p>
	<p>Country: {%Country}</p>
	<p>Group: {%Group}</p>
	<p><a href="?logout">Logout</a></p>
</div>');

$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 6);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlogin');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlogin');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLVARIABLE'] = formsHelper::getSelectBox('variable', $item->getVariable(), array('mail'=>wgLang::get('maillogin'), 'nickname'=>wgLang::get('nicknamelogin'), 'info'=>wgLang::get('justinfo')));
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();
$var['LOGGEDINREDIRECT'] = formsHelper::getSelectBox('redirect1', $item->getRedirect1(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirection'));
$var['LOGOUTREDIRECT'] = formsHelper::getSelectBox('redirect2', $item->getRedirect2(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirection'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('login', wgLang::get('login'), false, $tpl->getBlock($block));
// ----------- login end -----------

// ----------- registration (Block: registration) start -----------
$block = 'registration';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templateslogin';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_DATASOURCE2, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_VARIABLE, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_USEEDIT, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPSTART, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMP, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_TEMPEND, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_NOITEM, '');
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS1, wgLang::get('registeredok'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS2, wgLang::get('checkname'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS3, wgLang::get('checkpass'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS4, wgLang::get('checkmail'));
wgSystem::defPostValue(UsersTemplatesModel::COL_MESS5, wgLang::get('checknickname'));
$lv = array();
$item = new UsersTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = UsersTemplatesModel::getPagerForType(pager::getPage($block), 7);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listregistration');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'act='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listregistration');
	if (wgSystem::getRequestValue('edit') == $val->getId()) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();

$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASRC'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), UsersTemplatesModel::getDataSources(7));
$var['COLDATASOURCEB'] = formsHelper::getSelectBox('datasource', $item->getDatasource2(), UsersGroupsModel::getGroupsSelectBox(), array(), wgLang::get('nogroup'));
$var['COLVARIABLE'] = $item->getVariable();
$var['FULLCOLUSEEDIT'] = formsHelper::getCheckBox('useedit', $item->getUseedit(), 1);
$var['COLTEMPSTART'] = wgText::decodeTemplate($item->getTempstart());
$var['COLTEMP'] = wgText::decodeTemplate($item->getTemp());
$var['COLTEMPEND'] = wgText::decodeTemplate($item->getTempend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['REGREDIRECT'] = formsHelper::getSelectBox('redirect1', $item->getRedirect1(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirection'));
$var['COLMESSA'] = $item->getMess1();
$var['COLMESSB'] = $item->getMess2();
$var['COLMESSC'] = $item->getMess3();
$var['COLMESSD'] = $item->getMess4();
$var['COLMESSE'] = $item->getMess5();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('registration', wgLang::get('registration'), false, $tpl->getBlock($block));
// ----------- registration end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>