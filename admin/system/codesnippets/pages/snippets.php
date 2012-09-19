<?php
/**
 * Page snippets for module Codesnippets
 * 
 * @package      WebGuru3
 * @subpackage   modules/codesnippets/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        6. August 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- snippets (Block: snippets) start -----------
$block = 'snippets';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'snippetssnippets';

wgSessions::setModuleValueDefault('cat', 0);

wgSystem::clearDefPostValue();
wgSystem::defPostValue(CsnippetsSnippetsModel::COL_SNIPPET, '');
wgSystem::defPostValue(CsnippetsSnippetsModel::COL_EXCERPT, '');
wgSystem::defPostValue(CsnippetsSnippetsModel::COL_DESCRIPTION, '');
wgSystem::defPostValue(CsnippetsSnippetsModel::COL_KEYWORDS, '');
wgSystem::defPostValue(CsnippetsSnippetsModel::COL_CSNIPPETS_CATEGORIES_ID, wgSessions::getModuleValue('cat'));

$lv = array();
$item = new CsnippetsSnippetsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CsnippetsSnippetsModel::getSelfPagerData(pager::getPage($block), 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsnippets');
	$lv['LNAME'] = $val->getName();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LCLASS'] = ((bool) $val->getApproved()) ? 'green' : 'red';
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsnippets');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();
if ((bool) $item->getId()) wgSessions::setModuleValue('cat', $item->getCsnippetsCategoriesId());
$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['FULLCOLAPPROVED'] = formsHelper::getCheckBox('approved', $item->getApproved(), 1);
$var['COLSNIPPET'] = $item->getSnippet();
$var['COLEXCERPT'] = $item->getExcerpt();
$var['COLDESCRIPTION'] = $item->getDescription();
$var['COLKEYWORDS'] = $item->getKeywords();
$var['COLCSNIPPETSCATEGORIESID'] = formsHelper::getSelectBox('csnippets_categories_id', $item->getCsnippetsCategoriesId(), CsnippetsCategoriesModel::getCsnippetsCategoriesData(), array(), wgLang::get('nocat'));
$var['FULLCOLADDED'] = formsHelper::getDateTimeBox('added', $item->getAdded());
$var['FULLCOLCHANGED'] = formsHelper::getDateTimeBox('changed', $item->getChanged());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('snippets', wgLang::get('snippets'), true, $tpl->getBlock($block));
// ----------- snippets end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>