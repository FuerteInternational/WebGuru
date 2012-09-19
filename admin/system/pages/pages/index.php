<?php
/**
 * Page index for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/pages/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        10. December 2008
 */

$system['parse']['head'] = '
<script type="text/javascript" src="./thirdparty/dhtmlxtree/codebase/dhtmlxcommon.js"></script>
<script type="text/javascript" src="./thirdparty/dhtmlxtree/codebase/dhtmlxtree.js"></script>
<script type="text/javascript" src="./thirdparty/dhtmlxtree/codebase/ext/dhtmlxtree_start.js"></script>
<script type="text/javascript" src="'.wgPaths::getModulePath('url').'js/wgPagesAjax.js"></script>
';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- pages (Block: pages) start -----------
$block = 'pages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexpages';
$var['ACTIONNEW'] = wgPaths::makePageLink('editpage', 'parent='.wgGet::getValue('parent'));

$var['BREADCRUMBS'] = PagesModel::getBreadcrumbs(wgGet::getValue('parent'), ' &raquo; ');

$lv = array();
$item = new PagesModel();
$item->setDefaultResults(wgSystem::getPost());

$ishome = false;
$parent = (int) wgGet::getValue('parent');
$arr = PagesModel::getSubPagesPager(wgGet::getValue('parent'), pager::getPage($block), 30);
if (empty($arr['data'])) {
	PagesModel::checkHomePage();
	$arr = PagesModel::getSubPagesPager(wgGet::getValue('parent'), pager::getPage($block), 30);
}
$x=1;
if (!empty($arr['data']) && is_array($arr['data'])) {
	$c = (int) count($arr['data']);
	if ($arr['data'][0]->getHome() == 1) $c--;
	$home = false;
	foreach ($arr['data'] as $val) {
		$tpl->setCurrentBlock('listpages');
		$lv['LID'] = $val->getId();
		if ((bool) $val->getHome()) {
			$lv['CLASS'] = ' class="bold"';
			$ishome = true;
			$lv['NAMELINK'] = '#';
			$home = true;
		}
		else {
			$lv['CLASS'] = '';
			if (($x > 1 && $c > 1)) $lv['PLUS'] = modulePages::movePageUpButton($val->getId());
			else $lv['PLUS'] = NULL;
			if ($x < $c) {
				$lv['MINUS'] = modulePages::movePageDownButton($val->getId());
				
			}
			else $lv['MINUS'] = NULL;
			$lv['NAMELINK'] = wgPaths::makeSelfLink('parent='.$val->getId());
			$x++;
		}
		$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
		$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
		$lv['LPAGESTEMPLATESID'] = $val->getPagesTemplatesId();
		$lv['SUBFOLDER'] = modulePages::getSubFolderButton($val->getId(), $val->getHome());
		$lv['PREVIEW'] = wgIcons::getButton('eye', wgLang::get('moveup'), 'javascript: wgPagesAjax.getPagePreview('.$val->getId().');');
		$lv['SETTINGS'] = wgIcons::getButton('agt_softwareD', wgLang::get('moveup'), 'javascript: wgPagesAjax.getSmallEditPage('.$val->getId().');');
		$lv['LNAME'] = $val->getName();
		$lv['LIDENTIFIER'] = $val->getIdentifier();
		$lv['LENABLED'] = booleanHelper::getYesNo($val->getEnabled(), true);
		$lv['LPARENTID'] = $val->getParentid();
		$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexpages', 'editpage'), false, array('title'=>'Id: '.$val->getId()));
		$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexpages&amp;parent='.$parent), true, array('title'=>'Id: '.$val->getId()));
		$tpl->setVariable($lv);
		$tpl->parseBlock('listpages');
		if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexpages') $item = $val;
		
	}
	$var['TABLEMESSAGE'] = '';
}
else {
	$var['TABLEMESSAGE'] = wgLang::get('nopagescreate');
}
$lv = array();
if (!(bool) $ishome && !(bool) wgGet::getValue('parent')) wgError::add('nohomepage');
if ((bool) wgGet::getValue('parent')) {
	$var['PARENTLINK'] = '<a href="'.wgPaths::makeSelfLink('parent='.PagesModel::getParentPageId(wgGet::getValue('parent'))).'">'.wgLang::get('goback').'</a>';
}
else $var['PARENTLINK'] = '&nbsp;';

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('pages', wgLang::get('pages'), true, $tpl->getBlock($block));
// ----------- pages end -----------

// ----------- treeview (Block: treeview) start -----------
$block = 'treeview';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);
$var = array();
$var['ACTIONNAME'] = 'indextreeview';

$var['FOLDERCOLLAPSE'] = wgIcons::getIcon('folder_delete', wgLang::get('collapse'));
$var['FOLDEREXPAND'] = wgIcons::getIcon('folder_add', wgLang::get('expand'));

wgSystem::defPostValue('pagetreeview', 'New module -> treeview');

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('treeview', wgLang::get('treeview'), false, $tpl->getBlock($block));
// ----------- treeview end -----------

// ----------- seotools (Block: seotools) start -----------
$block = 'seotools';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexseotools';


$lv = array();
$item = new PagesModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexseotools') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = PagesModel::doPager($params, pager::getPage($block), 40);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listseotools');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LPAGESTEMPLATESID'] = $val->getPagesTemplatesId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTITLE'] = $val->getTitle();
	$lv['LHEADINGA'] = $val->getHeading1();
	$lv['LHEADINGB'] = $val->getHeading2();
	$lv['LHEADINGC'] = $val->getHeading3();
	$lv['LREWRITE'] = $val->getRewrite();
	$lv['LKEYWORDS'] = $val->getKeywords();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDTEXTA'] = $val->getAddtext1();
	$lv['LADDTEXTB'] = $val->getAddtext2();
	$lv['LENABLED'] = $val->getEnabled();
	$lv['LPARENTID'] = $val->getParentid();
	$lv['LSORT'] = $val->getSort();
	$lv['LHEAD'] = $val->getHead();
	$lv['LPAGE'] = $val->getPage();
	$lv['LNOTE'] = $val->getNote();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexseotools', 'editpage'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexseotools'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listseotools');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexseotools') $item = $val;
}
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('seotools', wgLang::get('seotools'), false, $tpl->getBlock($block));
// ----------- seotools end -----------

// ----------- pagestools (Block: pagestools) start -----------
$block = 'pagestools';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexpagestools';


$lv = array();
$item = new PagesModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexpagestools') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = PagesModel::doPager($params, pager::getPage($block), 40);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpagestools');
	$lv['LID'] = $val->getId();
	$lv['LSYSTEMWEBSITESID'] = $val->getSystemWebsitesId();
	$lv['LSYSTEMLANGUAGEID'] = $val->getSystemLanguageId();
	$lv['LPAGESTEMPLATESID'] = $val->getPagesTemplatesId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTITLE'] = $val->getTitle();
	$lv['LHEADINGA'] = $val->getHeading1();
	$lv['LHEADINGB'] = $val->getHeading2();
	$lv['LHEADINGC'] = $val->getHeading3();
	$lv['LREWRITE'] = $val->getRewrite();
	$lv['LKEYWORDS'] = $val->getKeywords();
	$lv['LDESCRIPTION'] = $val->getDescription();
	$lv['LADDTEXTA'] = $val->getAddtext1();
	$lv['LADDTEXTB'] = $val->getAddtext2();
	$lv['LENABLED'] = $val->getEnabled();
	$lv['LPARENTID'] = $val->getParentid();
	$lv['LSORT'] = $val->getSort();
	$lv['LHEAD'] = $val->getHead();
	$lv['LPAGE'] = $val->getPage();
	$lv['LNOTE'] = $val->getNote();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=indexpagestools', 'editpage'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=indexpagestools'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpagestools');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexpagestools') $item = $val;
}
$lv = array();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('pagestools', wgLang::get('pagestools'), false, $tpl->getBlock($block));
// ----------- pagestools end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>