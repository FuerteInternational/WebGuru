<?php
/**
 * Page templates for module Codesnippets
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

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- templates (Block: templates) start -----------
$block = 'templates';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$temptype = 0;

$var['ACTIONNAME'] = 'templatestemplates';


wgSystem::clearDefPostValue();

wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ISSEARCH, 0);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_VARIABLE, 'snippet');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TITEM, '<li><a href="?snippet={%Id}">{%Name}</a></li>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TEND, '</ul>
{%PAGER}');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_FOFRED, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_NOITEM, '<!-- there is no snippet -->');

wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS1, wgLang::get('messdeletedok'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS2, wgLang::get('messcantdelete'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS3, wgLang::get('nopermstodelete'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS4, 0);

$lv = array();
$item = new CsnippetsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CsnippetsTemplatesModel::getSelfPagerData(pager::getPage($block), 20, $temptype);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listtemplates');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listtemplates');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLTEMPTYPE'] = $temptype;
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCATEGORY'] = formsHelper::getSelectBox('csnippets_categories_id', $item->getCsnippetsCategoriesId(), CsnippetsCategoriesModel::getCsnippetsCategoriesData());

$var['FULLDATASOURCE'] = formsHelper::getSelectBox('ds', $item->getDatasource(), CsnippetsTemplatesModel::getDatasourceArray($temptype), array('id'=>'listDS'));
$var['FULLCOLISSEARCH'] = formsHelper::getCheckBox('issearch', $item->getIssearch(), 1, array('id'=>'listSearch'));
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1, array('id'=>'listPager'));
$var['COLPERPAGE'] = $item->getPerpage();
$var['VARIABLE'] = $item->getVariable();
$var['COLTBEGIN'] = wgText::decodeTemplate($item->getTbegin());
$var['COLTITEM'] = wgText::decodeTemplate($item->getTitem());
$var['COLTEND'] = wgText::decodeTemplate($item->getTend());
$var['FULLCOLFOFRED'] = formsHelper::getCheckBox('fofred', $item->getFofred(), 1);
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());

$var['ERR1'] = $item->getErrmess1();
$var['ERR2'] = $item->getErrmess2();
$var['ERR3'] = $item->getErrmess3();
$var['ERR4'] = formsHelper::getSelectBox('errmess4', $item->getErrmess4(), PagesModel::getSelectBoxTree(), array(), wgLang::get('noredirect'));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get('listing'), true, $tpl->getBlock($block));
// ----------- templates end -----------
// ----------- snipdetails (Block: snipdetails) start -----------
$block = 'snipdetails';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$temptype = 1;

$var['ACTIONNAME'] = 'templatestemplates';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ISSEARCH, 0);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_VARIABLE, 'snippet');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TBEGIN, '');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TITEM, '<div>
	<h2>{%Name}</h2>
	<p><em>{%Excerpt}</em></p>
	<p><code>{%Snippet}</code></p>
	<p>{%Description}</p>
	<p>Author: {%Author}</p>
</div>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TEND, '');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_FOFRED, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_NOITEM, '<p>there is no snippet</p>');
$lv = array();
$item = new CsnippetsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CsnippetsTemplatesModel::getSelfPagerData(pager::getPage($block), 20, $temptype);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsnipdetails');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsnipdetails');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLTEMPTYPE'] = $temptype;
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCATEGORY'] = formsHelper::getSelectBox('csnippets_categories_id', $item->getCsnippetsCategoriesId(), CsnippetsCategoriesModel::getCsnippetsCategoriesData());
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('ds', $item->getDatasource(), CsnippetsTemplatesModel::getDatasourceArray($temptype), array('id'=>'detailDS'));
$var['VARIABLE'] = $item->getVariable();
$var['COLUSESEO'] = formsHelper::getCheckBox('useseo', $item->getUseseo(), 1);
$var['COLTBEGIN'] = wgText::decodeTemplate($item->getTbegin());
$var['COLTITEM'] = wgText::decodeTemplate($item->getTitem());
$var['COLTEND'] = wgText::decodeTemplate($item->getTend());
$var['FULLCOLFOFRED'] = formsHelper::getCheckBox('fofred', $item->getFofred(), 1, array('id'=>'detailFOF'));
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), false, $tpl->getBlock($block));
// ----------- templates end -----------

// ----------- catlist (Block: catlist) start -----------
$block = 'catlist';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$temptype = 2;

$var['ACTIONNAME'] = 'templatestemplates';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ISSEARCH, 0);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_VARIABLE, 'snippet');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PAGER, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TBEGIN, '<ul>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TITEM, '<li><a href="?cat={%Id}">{%Name}</a> - {%Description}</li>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TEND, '</ul>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_FOFRED, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_NOITEM, '<!-- there is no category -->');
$lv = array();
$item = new CsnippetsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CsnippetsTemplatesModel::getSelfPagerData(pager::getPage($block), 20, $temptype);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcatlist');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcatlist');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLTEMPTYPE'] = $temptype;
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('ds', $item->getDatasource(), CsnippetsTemplatesModel::getDatasourceArray($temptype));
$var['FULLCOLISSEARCH'] = formsHelper::getCheckBox('issearch', $item->getIssearch(), 1);
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['COLPERPAGE'] = $item->getPerpage();
$var['COLTBEGIN'] = wgText::decodeTemplate($item->getTbegin());
$var['COLTITEM'] = wgText::decodeTemplate($item->getTitem());
$var['COLTEND'] = wgText::decodeTemplate($item->getTend());
$var['FULLCOLFOFRED'] = formsHelper::getCheckBox('fofred', $item->getFofred(), 1);
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), false, $tpl->getBlock($block));
// ----------- templates end -----------

// ----------- sendsnippet (Block: sendsnippet) start -----------
$block = 'sendsnippet';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$temptype = 3;

$var['ACTIONNAME'] = 'templatestemplates';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ISSEARCH, 1);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_VARIABLE, 'snippet');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TITEM, '<h3>Edit {%Name}</h3>
<form action="" method="post">
	<p>
		<label for="cname">Name</label>
		<input type="text" name="cname" id="cname" value="{%Name}" />
	</p>
	<p>
		<label for="csnippet">Code</label>
		<textarea name="csnippet" cols="50" rows="20">{%Snippet}</textarea>
	</p>
	<p>
		<label for="cexcerpt">Short description</label>
		<textarea name="cexcerpt" cols="50" rows="3">{%Excerpt}</textarea>
	</p>
	<p>
		<label for="cdescription">Full description</label>
		<textarea name="cdescription" cols="50" rows="10">{%Description}</textarea>
	</p>
	<p>
		<label for="ckeywords">Keyword tags</label>
		<input type="text" name="ckeywords" id="ckeywords" value="{%Keywords}" />
	</p>
	<p>
		<input type="hidden" name="cid" value="{%Id}" />
		<button type="reset">Reset</button>
		<button type="submit" name="sendsnippet">Save snippet</button>
	</p>
</form>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TBEGIN, '<h3>Add new snippet</h3>
<form action="" method="post">
	<p>
		<label for="cname">Name</label>
		<input type="text" name="cname" id="cname" value="{%Name}" />
	</p>
	<p>
		<label for="csnippet">Code</label>
		<textarea name="csnippet" cols="50" rows="20">{%Snippet}</textarea>
	</p>
	<p>
		<label for="cexcerpt">Short description</label>
		<textarea name="cexcerpt" cols="50" rows="3">{%Excerpt}</textarea>
	</p>
	<p>
		<label for="cdescription">Full description</label>
		<textarea name="cdescription" cols="50" rows="10">{%Description}</textarea>
	</p>
	<p>
		<label for="ckeywords">Keyword tags</label>
		<input type="text" name="ckeywords" id="ckeywords" value="{%Keywords}" />
	</p>
	<p>
		<button type="reset">Reset</button>
		<button type="submit" name="sendsnippet">Add snippet</button>
	</p>
</form>');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS1, wgLang::get('nonamemessform'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS2, wgLang::get('nocodemessform'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS3, wgLang::get('nopermissionsmessform'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_ERRMESS4, wgLang::get('successfulsentform'));
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_FOFRED, 0);
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_TEND, 'http://');
wgSystem::defPostValue(CsnippetsTemplatesModel::COL_NOITEM, '<!-- you need to be logged in to see the form -->');
$lv = array();
$item = new CsnippetsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

wgPost::getValue('aaaa');
wgGet::getValue('aaaa');

$arr = CsnippetsTemplatesModel::getSelfPagerData(pager::getPage($block), 20, $temptype);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsendsnippet');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsendsnippet');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLTEMPTYPE'] = $temptype;
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('ds', $item->getDatasource(), CsnippetsTemplatesModel::getDatasourceArray($temptype), array('id'=>'formDS'));
$var['FULLCOLISSEARCH'] = formsHelper::getCheckBox('issearch', $item->getIssearch(), 1, array('id'=>'formFOF'));
$var['FULLCOLFOFRED'] = formsHelper::getSelectBox('fofred', $item->getFofred(), array(0=>wgLang::get('forall'), wgLang::get('forregred'), wgLang::get('forregtmp'), wgLang::get('forregfof')), array('id'=>'formWTD', 'onchange'=>'checkFormWTD(this.value);'));
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCATEGORY'] = formsHelper::getSelectBox('csnippets_categories_id', $item->getCsnippetsCategoriesId(), CsnippetsCategoriesModel::getCsnippetsCategoriesData());
$var['COLPERPAGE'] = $item->getPerpage();
$var['VARIABLE'] = $item->getVariable();
$var['COLTBEGIN'] = wgText::decodeTemplate($item->getTbegin());
$var['COLTITEM'] = wgText::decodeTemplate($item->getTitem());
$var['COLTEND'] = wgText::decodeTemplate($item->getTend());
$var['COLNOITEM'] = wgText::decodeTemplate($item->getNoitem());
$var['ERR1'] = $item->getErrmess1();
$var['ERR2'] = $item->getErrmess2();
$var['ERR3'] = $item->getErrmess3();
$var['ERR4'] = $item->getErrmess4();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab($block, wgLang::get($block), false, $tpl->getBlock($block));
// ----------- templates end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>