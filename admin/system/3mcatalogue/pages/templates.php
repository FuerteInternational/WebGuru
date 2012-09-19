<?php
/**
 * Page templates for module 3mcatalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        29. September 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- lists (Block: lists) start -----------
$block = 'lists';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdetails';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TBEGIN, '<table>');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TITEM, '<tr>
	<td><a href="?item={%Id}">{%Niin}</a></td>
	<td>{%Bigb}</td>
	<td>{%Smallb}</td>
	<td>{%Market}</td>
	<td>{%Clasification}</td>
	<td>{%ItemType}</td>
	<td>{%Description}</td>
	<td>{%CommonRefName}</td>
	<td>{%CommonDescription}</td>
	<td>{%NatoItemName}</td>
	<td>{%NatoDescription}</td>
	<td>{%Length}</td>
	<td>{%LengthUnit}</td>
	<td>{%Width}</td>
	<td>{%WidthUnit}</td>
	<td>{%Height}</td>
	<td>{%HeightUnit}</td>
	<td>{%VolumeWeight}</td>
	<td>{%VolumeWeightUnit}</td>
	<td>{%Diameter}</td>
	<td>{%DiameterUnit}</td>
</tr>');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TEND, '</table>');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TNOITEM, '<p>No item had been found</p>');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_ISSEARCH, 0);
$lv = array();
$item = new Nato3mcatTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = Nato3mcatTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 0);
//$arr = Nato3mcatTemplatesModel::doPager(array(), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlists');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LTBEGIN'] = $val->getTbegin();
	$lv['LTITEM'] = $val->getTitem();
	$lv['LTEND'] = $val->getTend();
	$lv['LTNOITEM'] = $val->getTnoitem();
	$lv['LISSEARCH'] = $val->getIssearch();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlists');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLTBEGIN'] = $item->getTbegin();
$var['COLTITEM'] = $item->getTitem();
$var['COLTEND'] = $item->getTend();
$var['COLTNOITEM'] = $item->getTnoitem();
$var['FULLCOLISSEARCH'] = formsHelper::getCheckBox('issearch', $item->getIssearch(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('lists', wgLang::get('lists'), true, $tpl->getBlock($block));
// ----------- lists end -----------

// ----------- details (Block: details) start -----------
$block = 'details';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatesdetails';

wgSystem::clearDefPostValue();

//wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TITEM, '<ul>
	<li>{%Id}</li>
	<li>{%Bigb}</li>
	<li>{%Smallb}</li>
	<li>{%Niin}</li>
	<li>{%Market}</li>
	<li>{%Clasification}</li>
	<li>{%ItemType}</li>
	<li>{%Description}</li>
	<li>{%CommonRefName}</li>
	<li>{%CommonDescription}</li>
	<li>{%NatoItemName}</li>
	<li>{%NatoDescription}</li>
	<li>{%Length}</li>
	<li>{%LengthUnit}</li>
	<li>{%Width}</li>
	<li>{%WidthUnit}</li>
	<li>{%Height}</li>
	<li>{%HeightUnit}</li>
	<li>{%VolumeWeight}</li>
	<li>{%VolumeWeightUnit}</li>
	<li>{%Diameter}</li>
	<li>{%DiameterUnit}</li>
</ul>');
//wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TEND, '');
wgSystem::defPostValue(Nato3mcatTemplatesModel::COL_TNOITEM, '<p>This item does not exists</p>');
$lv = array();
$item = new Nato3mcatTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = Nato3mcatTemplatesModel::getSelfPagerData(pager::getPage($block), 20, 1);
//$arr = Nato3mcatTemplatesModel::doPager(array(), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listdetails');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LTBEGIN'] = $val->getTbegin();
	$lv['LTITEM'] = $val->getTitem();
	$lv['LTEND'] = $val->getTend();
	$lv['LTNOITEM'] = $val->getTnoitem();
	$lv['LISSEARCH'] = $val->getIssearch();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLTBEGIN'] = $item->getTbegin();
$var['COLTITEM'] = $item->getTitem();
$var['COLTEND'] = $item->getTend();
$var['COLTNOITEM'] = $item->getTnoitem();
$var['FULLCOLISSEARCH'] = formsHelper::getCheckBox('issearch', $item->getIssearch(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('details', wgLang::get('details'), false, $tpl->getBlock($block));
// ----------- details end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>