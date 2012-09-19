<?php
/**
 * Page cronjobs for module Wgcron
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

// ----------- cronjobs (Block: cronjobs) start -----------
$block = 'cronjobs';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'cronjobscronjobs';


wgSystem::defPostValue(CronJobsModel::COL_DATEFROM, wgSystem::formatDate(time()));
wgSystem::defPostValue(CronJobsModel::COL_DATETO, wgSystem::formatDate(strtotime('+ 10 year')));
wgSystem::defPostValue(CronJobsModel::COL_PERIOD, '3600');
wgSystem::defPostValue(CronJobsModel::COL_PHPCODE, '');
wgSystem::defPostValue(CronJobsModel::COL_TIMELIMIT, '120');
$lv = array();
$item = new CronJobsModel();
$item->setDefaultResults(wgSystem::getPost());

$params = array();
$arr = CronJobsModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcronjobs');
	$lv['LNAME'] = $val->getName();
	$lv['LPERIOD'] = $val->getPeriod();
	$active = 'green';
	if ($val->getDateto() < time() || $val->getDatefrom() > time()) $active = 'red';
	$lv['ACTIVE'] = $active;
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcronjobs');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'cronjobscronjobs') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLIDENTIFIER'] = $item->getIdentifier();
$var['FULLCOLDATEFROM'] = formsHelper::getDateTimeBox('datefrom', $item->getDatefrom());
$var['FULLCOLDATETO'] = formsHelper::getDateTimeBox('dateto', $item->getDateto());
$var['COLPERIOD'] = $item->getPeriod();
$var['COLPHPCODE'] = $item->getPhpcode();
$var['COLTIMELIMIT'] = $item->getTimelimit();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('cronjobs', wgLang::get('cronjobs'), true, $tpl->getBlock($block));
// ----------- cronjobs end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>