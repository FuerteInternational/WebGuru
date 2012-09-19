<?php
/**
 * Page userjobs for module Wgcron
 * 
 * @package      WebGuru3
 * @subpackage   modules/wgcron/pages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        14. April 2009
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- userjobs (Block: userjobs) start -----------
$block = 'userjobs';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'userjobsuserjobs';


wgSystem::defPostValue(CronUserjobsModel::COL_DATEFROM, time());
wgSystem::defPostValue(CronUserjobsModel::COL_DATETO, time());
wgSystem::defPostValue(CronUserjobsModel::COL_PERIOD, '86400');
wgSystem::defPostValue(CronUserjobsModel::COL_LASTRUN, time());
wgSystem::defPostValue(CronUserjobsModel::COL_COUNTER, '0');
wgSystem::defPostValue(CronUserjobsModel::COL_USER_ID, '');
wgSystem::defPostValue(CronUserjobsModel::COL_URL, 'http://');
wgSystem::defPostValue(CronUserjobsModel::COL_REPORTMAIL, 'info@example.com');
$lv = array();
$item = new CronUserjobsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CronUserjobsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listuserjobs');
	$lv['LNAME'] = $val->getName();
	$lv['LLASTRUN'] = $val->getLastrun();
	$lv['LCOUNTER'] = $val->getCounter();
	$active = 'green';
	if ($val->getDateto() < time() || $val->getDatefrom() > time()) $active = 'red';
	$lv['ACTIVE'] = $active;
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listuserjobs');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'userjobsuserjobs') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['FULLCOLDATEFROM'] = formsHelper::getDateTimeBox('datefrom', $item->getDatefrom());
$var['FULLCOLDATETO'] = formsHelper::getDateTimeBox('dateto', $item->getDateto());
$var['COLPERIOD'] = $item->getPeriod();
$var['FULLCOLLASTRUN'] = formsHelper::getDateTimeBox('lastrun', $item->getLastrun());
$var['COLCOUNTER'] = $item->getCounter();
$var['COLUSERID'] = $item->getUserId();
$var['FULLUSER'] = formsHelper::getSelectBox('user_id', $item->getUserId(), UsersModel::getUsersByLastname());
$var['COLURL'] = $item->getUrl();
$var['COLREPORTMAIL'] = $item->getReportmail();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('userjobs', wgLang::get('userjobs'), true, $tpl->getBlock($block));
// ----------- userjobs end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>