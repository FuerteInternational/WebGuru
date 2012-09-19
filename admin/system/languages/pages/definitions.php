<?php
/**
 * Page definitions for module Languages
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- pagedefinitions (Block: pagedefinitions) start -----------
$block = 'pagedefinitions';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'definitionspagedefinitions';

wgSessions::setPageValueDefault('mypage', PagesModel::getHomeId());
if (wgPost::isValue('mypage')) wgSessions::setPageValue('mypage', wgPost::getValue('mypage'));
$mypage = (int) wgSessions::getPageValue('mypage');

$var['FULLMYPAGE'] = formsHelper::getSelectBox('mypage', $mypage, PagesModel::getSelectBoxTree());

wgSystem::defPostValue(LanguagesDefinitionsModel::COL_NAME, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_MINCHAR, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_MAXCHAR, 999999);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ENABLED, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_DEFAULT_LANG_ID, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_DEFAULT_TEXT, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ALLOWHTML, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ISGLOBAL, 0);
$lv = array();
$item = new LanguagesDefinitionsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = LanguagesDefinitionsModel::getDefinitionsPagerByName(pager::getPage($block), 20, $mypage);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpagedefinitions');
	$lv['LNAME'] = $val->getName();
	$lv['LCODE'] = strtolower($val->getName());
	$lv['LMINCHAR'] = $val->getMinchar();
	$lv['LMAXCHAR'] = $val->getMaxchar();
	$lv['LENABLED'] = (bool) $val->getEnabled() ? 'green bold' : 'red bold';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpagedefinitions');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['MYPAGEID'] = $mypage;
$var['COLMINCHAR'] = (int) $item->getMinchar();
$var['COLMAXCHAR'] = (int) $item->getMaxchar();
$var['COLPAGESID'] = $item->getPagesId();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['FULLCOLISGLOBAL'] = formsHelper::getCheckBox('isglobal', $item->getIsglobal(), 1);
$var['FULLDEFAULTLANGID'] = formsHelper::getSelectBox('default_lang_id', $item->getDefaultLangId(), SystemLanguageModel::getLanguagesWithPermissionsForWebsite(), array(), wgLang::get('nodeflang'));
$var['COLDEFAULTTEXT'] = $item->getDefaultText();
$var['FULLCOLALLOWHTML'] = formsHelper::getCheckBox('allowhtml', $item->getAllowhtml(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pagedefinitions', wgLang::get('pagedefinitions'), true, $tpl->getBlock($block));
// ----------- pagedefinitions end -----------

// ----------- globaldefinitions (Block: globaldefinitions) start -----------
$block = 'globaldefinitions';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

//$var['ACTIONNAME'] = 'definitionsglobaldefinitions';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_NAME, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_MINCHAR, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_MAXCHAR, 999999);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ENABLED, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_DEFAULT_LANG_ID, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_DEFAULT_TEXT, '');
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ALLOWHTML, 1);
wgSystem::defPostValue(LanguagesDefinitionsModel::COL_ISGLOBAL, 1);
$lv = array();
$item = new LanguagesDefinitionsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = LanguagesDefinitionsModel::getDefinitionsPagerByName(pager::getPage($block), 20, 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listglobaldefinitions');
	$lv['LNAME'] = $val->getName();
	$lv['LCODE'] = strtolower($val->getName());
	$lv['LMINCHAR'] = $val->getMinchar();
	$lv['LMAXCHAR'] = $val->getMaxchar();
	$lv['LENABLED'] = (bool) $val->getEnabled() ? 'green bold' : 'red bold';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listglobaldefinitions');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLMINCHAR'] = (int) $item->getMinchar();
$var['COLMAXCHAR'] = (int) $item->getMaxchar();
$var['COLPAGESID'] = $item->getPagesId();
$var['FULLCOLENABLED'] = formsHelper::getCheckBox('enabled', $item->getEnabled(), 1);
$var['FULLCOLISGLOBAL'] = formsHelper::getCheckBox('isglobal', $item->getIsglobal(), 1);
$var['FULLDEFAULTLANGID'] = formsHelper::getSelectBox('default_lang_id', $item->getDefaultLangId(), SystemLanguageModel::getLanguagesWithPermissionsForWebsite(), array(), wgLang::get('nodeflang'));
$var['COLDEFAULTTEXT'] = $item->getDefaultText();
$var['FULLCOLALLOWHTML'] = formsHelper::getCheckBox('allowhtml', $item->getAllowhtml(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('globaldefinitions', wgLang::get('globaldefinitions'), false, $tpl->getBlock($block));
// ----------- globaldefinitions end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>