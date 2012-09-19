<?php
/**
 * Page edittranslations for module Languages
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

// ----------- translations (Block: translations) start -----------
$block = 'translations';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'edittranslationstranslations';

wgSessions::setPageValueDefault('mypage', PagesModel::getHomeId());
if (wgPost::isValue('mypage')) wgSessions::setPageValue('mypage', wgPost::getValue('mypage'));
$mypage = (int) wgSessions::getPageValue('mypage');

$var['FULLMYPAGE'] = formsHelper::getSelectBox('mypage', $mypage, PagesModel::getSelectBoxTree());

$lv = array();
$item = new LanguagesDefinitionsModel();
$itemdefinition = new LanguagesTranslationsModel();

$arr = LanguagesDefinitionsModel::getDefinitionsPagerByName(pager::getPage($block), 20, $mypage, true);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtranslations');
	$definition = LanguagesTranslationsModel::getTranslationById($val->getId(), wgLang::getLanguageId());
	$lv['LLANGKEY'] = $val->getName();
	$lv['LDEFINITION'] = valid::cutText($definition->getDefinition(), 80);
	$ok = true;
	$chcount = strlen($definition->getDefinition());
	if ($chcount < $val->getMinchar()) $ok = false;
	if ($chcount > $val->getMaxchar()) $ok = false;
	$lv['CLASS'] = (bool) $ok ? 'green bold' : 'red bold';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	if ((bool) $definition->getId()) $lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($definition->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtranslations');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) {
		$item = $val;
		$itemdefinition = $definition;
	}
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['MIN'] = (int) $item->getMinchar();
$var['MAX'] = (int) $item->getMaxchar();
$var['DEFID'] = $itemdefinition->getId();
if ((bool) $item->getId()) $var['LANGKEY'] = $item->getName();
else $var['HIDDEN'] = ' style="display:none;"';
$var['COLLANGUAGESDEFINITIONSID'] = $item->getId();
$var['COLDEFINITION'] = wgParse::decode($itemdefinition->getDefinition());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pagetranslations', wgLang::get('pagetranslations'), true, $tpl->getBlock($block));
// ----------- translations end -----------

// ----------- globaltranslations (Block: globaltranslations) start -----------
$block = 'globaltranslations';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$lv = array();
$item = new LanguagesDefinitionsModel();
$itemdefinition = new LanguagesTranslationsModel();

$arr = LanguagesDefinitionsModel::getDefinitionsPagerByName(pager::getPage($block), 20, false, true);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('glisttranslations');
	$definition = LanguagesTranslationsModel::getTranslationById($val->getId(), wgLang::getLanguageId());
	$lv['LLANGKEY'] = $val->getName();
	$lv['LDEFINITION'] = valid::cutText($definition->getDefinition(), 80);
	$ok = true;
	$chcount = strlen($definition->getDefinition());
	if ($chcount < $val->getMinchar()) $ok = false;
	if ($chcount > $val->getMaxchar()) $ok = false;
	$lv['CLASS'] = (bool) $ok ? 'green bold' : 'red bold';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	if ((bool) $definition->getId()) $lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($definition->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('glisttranslations');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) {
		$item = $val;
		$itemdefinition = $definition;
	}
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();
$var['COLID'] = $item->getId();
$var['MIN'] = (int) $item->getMinchar();
$var['MAX'] = (int) $item->getMaxchar();
$var['DEFID'] = $itemdefinition->getId();
if ((bool) $item->getId()) {
	$var['LANGKEY'] = $item->getName();
	$var['HIDDEN'] = NULL;
}
else $var['HIDDEN'] = ' style="display:none;"';
$var['COLLANGUAGESDEFINITIONSID'] = $item->getId();
$var['COLDEFINITION'] = wgParse::decode($itemdefinition->getDefinition());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
if ((bool) count($arr['data'])) $tab->addTab('globaltranslations', wgLang::get('globaltranslations'), false, $tpl->getBlock($block));
// ----------- globaltranslations end -----------

// ----------- exportimport (Block: exportimport) start -----------
$block = 'exportimport';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'edittranslationsexportimport';
$var['ACTIONEXPORT'] = wgPaths::makeSelfLink('act=exportimportexport');
$var['ACTIONIMPORT'] = wgPaths::makeSelfLink('act=exportimportimport');

$mypage = (int) wgSessions::getPageValue('mypage');

$var['FULLMYPAGE'] = formsHelper::getSelectBox('mypage', $mypage, PagesModel::getSelectBoxTree(), array(), wgLang::get('globaltranslation'));

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('exportimport', wgLang::get('exportimport'), false, $tpl->getBlock($block));
// ----------- exportimport end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>