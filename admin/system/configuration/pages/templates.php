<?php
/**
 * Page templates for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. July 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');

// ----------- custoerrors (Block: custoerrors) start -----------
$block = 'custoerrors';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'templatescustoerrors';

wgSystem::clearDefPostValue();

wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ID, '');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_NAME, '');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_IDENTIFIER, '');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ERRORBEGIN, '<div class="errors">');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPOKBEGIN, '<ul class="green">');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ITEMOK, '<li>{%Message}</li>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPOKEND, '</ul>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPALERTBEGIN, '<ul class="orange">');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ITEMALERT, '<li>{%Message}</li>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPALERTEND, '</ul>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPERRORBEGIN, '<ul class="red">');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ITEMERROR, '<li>{%Message}</li>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPERROREND, '</ul>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_ERROREND, '</div>');
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_GROUPMESSAGES, 1);
wgSystem::defPostValue(SystemErrorsTemplatesModel::COL_FIRSTINLIST, 0);
$lv = array();
$item = new SystemErrorsTemplatesModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = SystemErrorsTemplatesModel::getSelfPagerData(pager::getPage($block), 20);
// SystemErrorsTemplatesModel::getPagerData(pager::getPage($block), 0, 20);
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcustoerrors');
	$lv['LNAME'] = $val->getName();
	$lv['LIDENTIFIER'] = $val->getIdentifier();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcustoerrors');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == $var['ACTIONNAME']) $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['COLERRORBEGIN'] = wgParse::decode($item->getErrorbegin());
$var['COLGROUPOKBEGIN'] = wgParse::decode($item->getGroupokbegin());
$var['COLITEMOK'] = wgParse::decode($item->getItemok());
$var['COLGROUPOKEND'] = wgParse::decode($item->getGroupokend());
$var['COLGROUPALERTBEGIN'] = wgParse::decode($item->getGroupalertbegin());
$var['COLITEMALERT'] = wgParse::decode($item->getItemalert());
$var['COLGROUPALERTEND'] = wgParse::decode($item->getGroupalertend());
$var['COLGROUPERRORBEGIN'] = wgParse::decode($item->getGrouperrorbegin());
$var['COLITEMERROR'] = wgParse::decode($item->getItemerror());
$var['COLGROUPERROREND'] = wgParse::decode($item->getGrouperrorend());
$var['COLERROREND'] = wgParse::decode($item->getErrorend());
$var['FULLCOLGROUPMESSAGES'] = formsHelper::getCheckBox('groupmessages', $item->getGroupmessages(), 1);
$var['FULLCOLFIRSTINLIST'] = formsHelper::getSelectBox('firstinlist', $item->getFirstinlist(), array(wgLang::get('errorred'), wgLang::get('errororange'), wgLang::get('errorgreen')));

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('custoerrors', wgLang::get('custoerrors'), true, $tpl->getBlock($block));
// ----------- custoerrors end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>