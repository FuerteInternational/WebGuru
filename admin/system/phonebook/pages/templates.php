<?php
/**
 * Page templates for module Phonebook
 * 
 * @package      WebGuru3
 * @subpackage   modules/phonebook/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        25. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- people (Block: people) start -----------
$block = 'people';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespeople';


wgSystem::defPostValue(JoshtrayTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_SEARCH, 0);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_TEMPBEGIN, '<table>
	<thead>
		<tr>
			<th>Full Extra Small Image</th>
			<th>Full Small Image</th>
			<th>Full Medium Image</th>
			<th>Full Large Image</th>
			<th>Full name</th>
			<th>Mail</th>
			<th>Line</th>
			<th>Phone</th>
			<th>Mobile</th>
			<th>Note</th>
			<th>Lastlogin</th>
			<th>Title</th>
			<th>Initials</th>
		</tr>
	</thead>
	<tbody>');
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_TEMPITEM, '<tr>
	<td><a href="?person={%Id}">{%FullXSmallImage}</a></td>
	<td>{%FullSmallImage}</td>
	<td>{%FullMediumImage}</td>
	<td>{%FullLargeImage}</td>
	<td><a href="?person={%Id}">{%Lastname}, {%Firstname}</a></td>
	<td>{%Mail}</td>
	<td>{%Line}</td>
	<td>{%Phone}</td>
	<td>{%Mobile}</td>
	<p>{%Note}</td>
	<td>{%Lastlogin}</td>
	<td>{%Title}</td>
	<td>{%Initials}</td>
</tr>');
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_TEMPEND, '	</tbody>
</table>
{%PAGER}');

$lv = array();
$item = new JoshtrayTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = JoshtrayTemplatesModel::getTemplatesPagerByType(0, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listpeople');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatespeople'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatespeople'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listpeople');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatespeople') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1, array('id'=>'listSearchCheck'));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('people', wgLang::get('people'), true, $tpl->getBlock($block));
// ----------- people end -----------


// ----------- people (Block: people) start -----------
$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatespeople';

wgSystem::clearDefPostValue();
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_SEARCH, 0);
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_TEMPITEM, '<div>
	<h1>{%FullXSmallImage} {%Lastname}, {%Firstname}</h1>
	<p>Mail: {%Mail}</p>
	<p>Phone line: {%Line}</p>
	<p>Phone: {%Phone}</p>
	<p>Mobile phone: {%Mobile}</p>
	<p>Note: {%Note}</p>
	<p>Lastlogin: {%Lastlogin}</p>
	<p>Title: {%Title}</p>
	<p>Initials: {%Initials}</p>
	<p>{%FullSmallImage}</p>
	<p>{%FullMediumImage}</p>
	<p>{%FullLargeImage}</p>
</div>');
wgSystem::defPostValue(JoshtrayTemplatesModel::COL_TEMPEND, '<h1>Sorry selectected contact was not found</h1>');

$lv = array();
$item = new JoshtrayTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = JoshtrayTemplatesModel::getTemplatesPagerByType(1, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatespeople'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatespeople'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatespeople') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['FULLPERPAGE'] = formsHelper::getSelectBox('perpage', $item->getPerpage(), JoshtrayTemplatesModel::getSelectDataForType(1));
$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['FULLCOLSEARCH'] = formsHelper::getCheckBox('search', $item->getSearch(), 1, array('id'=>'listSearchCheck'));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), true, $tpl->getBlock($block));
// ----------- people end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>