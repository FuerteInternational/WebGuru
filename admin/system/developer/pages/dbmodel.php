<?php
/**
 * Page dbmodel for module Developer
 * 
 * @package      WebGuru3
 * @subpackage   modules/developer/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */

$system['parse']['head'] = '';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- generate (Block: generate) start -----------
$block = 'generate';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'dbmodelgenerate';


$lv = array();

/*$params = array();
$arr = CrawlerHtmlModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listgenerate');
	$lv['LID'] = $val->getId();
	$lv['LCRAWLERRESULTSID'] = $val->getCrawlerResultsId();
	$lv['LHTML'] = $val->getHtml();
	$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeTableEditLink($val->getId(), 'show=dbmodelgenerate', 'admin'));
	$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeTableDeleteLink($val->getId(), 'act=dbmodelgenerate'), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listgenerate');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'dbmodelgenerate') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();
*/

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('generatemodel', wgLang::get('generatemodel'), true, $tpl->getBlock($block));
// ----------- generate end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>