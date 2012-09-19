<?php
/**
 * Page languages for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        7. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- languages (Block: languages) start -----------
$block = 'languages';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'languageslanguages';


wgSystem::defPostValue(SystemLanguageModel::COL_ID, '');
wgSystem::defPostValue(SystemLanguageModel::COL_NAME, '');
wgSystem::defPostValue(SystemLanguageModel::COL_CODE, '');
wgSystem::defPostValue(SystemLanguageModel::COL_IMAGE, '');
wgSystem::defPostValue(SystemLanguageModel::COL_DIRECTORY, '');
wgSystem::defPostValue(SystemLanguageModel::COL_SORT, '');
wgSystem::defPostValue(SystemLanguageModel::COL_ISDEFAULT, '');
$lv = array();
$item = new SystemLanguageModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = SystemLanguageModel::getLanguagesPagerWithPermissionsForWebsite(pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listlanguages');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LCODE'] = $val->getCode();
	$lv['LIMAGE'] = wgIcons::getFlag($val->getImage(), $val->getImage());
	if ((bool) $val->getIsdefault()) $lv['LDIRECTORY'] = '/';
	else $lv['LDIRECTORY'] = $val->getDirectory();
	$lv['LSORT'] = $val->getSort();
	$lv['LDEFAULT'] = ((bool) $val->getIsdefault()) ? 'green bold' : 'bold';
	$path = wgPaths::getFullPath(wgPaths::getLangPath($val->getId()));
	$icon = ((bool) is_writable($path)) ? 'lock_open' : 'lock_delete';
	$lv['LWRITABLE'] = wgIcons::getIcon($icon, wgLang::get($icon));
	$lv['LSYSTEMWEBSITESID'] = SystemWebsitesModel::getWebNameByPK($val->getSystemWebsitesId());
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show=languageslanguages'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act=languageslanguages'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listlanguages');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'languageslanguages') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLCODE'] = $item->getCode();
$var['COLIMAGE'] = $item->getImage();
$var['COLDIRECTORY'] = $item->getDirectory();
$var['FULLPATH'] = wgPaths::getFullPath(wgPaths::getLangPath($item->getId()));
$var['COLSORT'] = $item->getSort();
$var['FULLCOLDEFAULT'] = formsHelper::getCheckBox('isdefault', $item->getIsdefault(), 1);
$params = array();
$params['baseclass'] = 'SystemWebsitesModel';
$var['FULLCOLSYSTEMWEBSITESID'] = formsHelper::getSelectBox('system_websites_id', $item->getSystemWebsitesId(), SystemWebsitesModel::doSelect(), $params);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('languages', wgLang::get('languages'), true, $tpl->getBlock($block));
// ----------- languages end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>