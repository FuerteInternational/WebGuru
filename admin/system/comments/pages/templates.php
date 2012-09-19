<?php
/**
 * Page templates for module Comments
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/pages/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- comments (Block: comments) start -----------
$block = 'comments';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatescomments';

wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(CommentsTemplatesModel::COL_PAGER, 0);
wgSystem::defPostValue(CommentsTemplatesModel::COL_COMMENTS_GROUPS_ID, '');
wgSystem::defPostValue(CommentsTemplatesModel::COL_PERPAGE, 20);
wgSystem::defPostValue(CommentsTemplatesModel::COL_VARIABLE, 'article');
wgSystem::defPostValue(CommentsTemplatesModel::COL_DATASOURCE, 0);
wgSystem::defPostValue(CommentsTemplatesModel::COL_NOIDSYSERROR, wgLang::get('noidsyserror'));
wgSystem::defPostValue(CommentsTemplatesModel::COL_EMPTYAUTHOR, wgLang::get('emptyauthor'));
wgSystem::defPostValue(CommentsTemplatesModel::COL_EMPTYEMAIL, wgLang::get('emptyemail'));
wgSystem::defPostValue(CommentsTemplatesModel::COL_EMPTYCOMMENT, wgLang::get('emptycomment'));
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPBEGIN, '<ol>');
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPITEM, '<li class="{%OddEven}">
    <div id="div-comment-{%Id}">
        <div class="comment-author">
            <img src="{%Gravatar}" alt="{%Author}" width="100" height="100">
            <cite><a href="{%AuthorLink}" rel="external nofollow">{%Author}</a> (IP:{%Ip})</cite>
            <span>says:</span>
        </div>
        <div class="comment-meta">
            {%FullDate}&nbsp;&nbsp;{%EditLink}
        </div>
        <p>{%Content}</p>
    </div>
</li>');
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPEND, '</ol>
{%PAGER}');
$lv = array();
$item = new CommentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CommentsTemplatesModel::getPagerByType(pager::getPage($block), 0);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcomments');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LCOMMENTSGROUPSID'] = $val->getCommentsGroupsId();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LVARIABLE'] = $val->getVariable();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatescomments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatescomments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcomments');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatescomments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOMMGROUPS'] = formsHelper::getSelectBox('comments_groups_id', $item->getCommentsGroupsId(), CommentsGroupsModel::getGroups());
$var['COLPERPAGE'] = (int) $item->getPerpage();
$var['COLVARIABLE'] = $item->getVariable();
$var['IDERR'] = $item->getNoidsyserror();
$var['NONAME'] = $item->getEmptyauthor();
$var['NOMAIL'] = $item->getEmptyemail();
$var['NOCOMMENT'] = $item->getEmptycomment();
$var['FULLDATASOURCE'] = formsHelper::getSelectBox('datasource', $item->getDatasource(), array(wgLang::get('asc'), wgLang::get('desc')));
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('comments', wgLang::get('comments'), true, $tpl->getBlock($block));
// ----------- comments end -----------

// ----------- forms (Block: forms) start -----------
$block = 'forms';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatescomments';
$form = '<h3>Leave a Reply</h3>
<form action="" method="post">
    <p>
        <label for="author" class="required">Name / Nickname</label>
        <input type="text" name="author" id="author" value="{%Name}" tabindex="1" aria-required="true" />
    </p>
    <p>
    	<label for="email" class="required">Mail (will not be published)</label>
    	<input type="text" name="email" id="email" value="{%Mail}" tabindex="2" aria-required="true" />
    </p>
    <p>
    	<label for="url">Website</label>
    	<input type="text" name="url" id="url" value="{%Website}" tabindex="3" />
    </p>
    <p>
    	<label for="email" class="required">Comment</label>
    	<textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>
    </p>
    <p>
        <input name="for_id" type="hidden" id="for_id" value="{%For}" />
        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />
        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>
    </p>
</form>';
wgSystem::clearDefPostValue();
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPTYPE, '');
wgSystem::defPostValue(CommentsTemplatesModel::COL_PAGER, 0);
wgSystem::defPostValue(CommentsTemplatesModel::COL_COMMENTS_GROUPS_ID, '');
wgSystem::defPostValue(CommentsTemplatesModel::COL_PERPAGE, 0);
wgSystem::defPostValue(CommentsTemplatesModel::COL_VARIABLE, 'article');
wgSystem::defPostValue(CommentsTemplatesModel::COL_DATASOURCE, 0);
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPBEGIN, $form);
wgSystem::defPostValue(CommentsTemplatesModel::COL_TEMPITEM, $form);
$lv = array();
$item = new CommentsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CommentsTemplatesModel::getPagerByType(pager::getPage($block), 1);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listforms');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['LTEMPTYPE'] = $val->getTemptype();
	$lv['LPAGER'] = $val->getPager();
	$lv['LCOMMENTSGROUPSID'] = $val->getCommentsGroupsId();
	$lv['LPERPAGE'] = $val->getPerpage();
	$lv['LVARIABLE'] = $val->getVariable();
	$lv['LDATASOURCE'] = $val->getDatasource();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=templatescomments'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=templatescomments'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listforms');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'templatescomments') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLTEMPTYPE'] = formsHelper::getCheckBox('temptype', $item->getTemptype(), 1);
$var['FULLCOLPAGER'] = formsHelper::getCheckBox('pager', $item->getPager(), 1);
$var['FULLCOMMGROUPS'] = formsHelper::getSelectBox('comments_groups_id', $item->getCommentsGroupsId(), CommentsGroupsModel::getGroups());
$var['COLPERPAGE'] = $item->getPerpage();
$var['COLVARIABLE'] = $item->getVariable();
$var['COLDATASOURCE'] = $item->getDatasource();
$var['COLTEMPBEGIN'] = wgParse::decode($item->getTempbegin());
$var['COLTEMPITEM'] = wgParse::decode($item->getTempitem());
$var['COLTEMPEND'] = wgParse::decode($item->getTempend());

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('forms', wgLang::get('forms'), false, $tpl->getBlock($block));
// ----------- forms end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>