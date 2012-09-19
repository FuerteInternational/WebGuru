<?php
/**
 * Page templates for module Documents
 * 
 * @package      WebGuru3
 * @subpackage   modules/documents/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        24. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- categories (Block: categories) start -----------
$block = 'categories';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdocuments';


wgSystem::defPostValue(DocumentsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPBEGIN, '<ul>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPITEM, '<li><a href="?cat={%Id}">{%Name}</a></li>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPEND, '</ul>{%PAGER}');
$lv = array();
$item = new DocumentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsTemplatesModel::getTemplatesPagerByType(0, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcategories');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['LTEMPBEGIN'] = $val->getTempbegin();
	$lv['LTEMPITEM'] = $val->getTempitem();
	$lv['LTEMPEND'] = $val->getTempend();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatesdocuments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatesdocuments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcategories');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesdocuments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), DocumentsTemplatesModel::getSelectDataForType(0));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('categories', wgLang::get('categories'), true, $tpl->getBlock($block));
// ----------- categories end -----------

// ----------- documents (Block: documents) start -----------

wgSystem::clearDefPostValue();
wgSystem::defPostValue(DocumentsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPBEGIN, '<ul>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPITEM, '<li><a href="{%DownloadLink}">{%Icon} - {%Name}</a></li>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPEND, '</ul>{%PAGER}');

$block = 'documents';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdocuments';

$lv = array();
$item = new DocumentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsTemplatesModel::getTemplatesPagerByType(1, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdocuments');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['TYPECODE'] = 'docs';
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['LTEMPBEGIN'] = $val->getTempbegin();
	$lv['LTEMPITEM'] = $val->getTempitem();
	$lv['LTEMPEND'] = $val->getTempend();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatesdocuments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatesdocuments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdocuments');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesdocuments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['TYPE'] = 1;
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), DocumentsTemplatesModel::getSelectDataForType(1));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('documents', wgLang::get('documents'), false, $tpl->getBlock($block));
// ----------- documents end -----------

// ----------- documents (Block: documents) start -----------

wgSystem::clearDefPostValue();
wgSystem::defPostValue(DocumentsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPBEGIN, '<ul>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPITEM, '<li><a href="{%DownloadLink}">{%Icon} - {%Name}</a></li>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPEND, '</ul>{%PAGER}');

$block = 'documents';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdocuments';

$lv = array();
$item = new DocumentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsTemplatesModel::getTemplatesPagerByType(3, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdocuments');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['TYPECODE'] = 'favs';
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['LTEMPBEGIN'] = $val->getTempbegin();
	$lv['LTEMPITEM'] = $val->getTempitem();
	$lv['LTEMPEND'] = $val->getTempend();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatesdocuments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatesdocuments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdocuments');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesdocuments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['TYPE'] = 3;
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), DocumentsTemplatesModel::getSelectDataForType(3));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('favorites', wgLang::get('favorites'), false, $tpl->getBlock($block));
// ----------- documents end -----------

// ----------- details (Block: details) start -----------

wgSystem::clearDefPostValue();
wgSystem::defPostValue(DocumentsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(DocumentsTemplatesModel::COL_DATASOURCE, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPBEGIN, '');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPITEM, '<h1><a href="{%DownloadLink}">{%Name} ({%Icon})</a></h1>');
wgSystem::defPostValue(DocumentsTemplatesModel::COL_TEMPEND, '<h1>There is nothing in there</h1>');

$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdocuments';

$lv = array();
$item = new DocumentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = DocumentsTemplatesModel::getTemplatesPagerByType(2, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['LTEMPBEGIN'] = $val->getTempbegin();
	$lv['LTEMPITEM'] = $val->getTempitem();
	$lv['LTEMPEND'] = $val->getTempend();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatesdocuments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatesdocuments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatesdocuments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), DocumentsTemplatesModel::getSelectDataForType(2));
//$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), false, $tpl->getBlock($block));
// ----------- details end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>