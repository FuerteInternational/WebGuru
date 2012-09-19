<?php
/**
 * Page logs for module Wgcron
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

wgSessions::setPageValueDefault('job_id', 0);
wgSessions::setPageValueDefault('joberr', 1);
if (wgPost::isValue('job_id')) {
	wgSessions::setPageValue('job_id', (int) wgPost::getValue('job_id'));
	wgSessions::setPageValue('joberr', (int) wgPost::getValue('joberr'));
}




$var['ACTIONNAME'] = 'logscronjobs';
$var['FULLCOLCRONJOBSID'] = formsHelper::getSelectBox('job_id', wgSessions::getPageValue('job_id'), CronJobsModel::doSelect(), array(), wgLang::get('alljobs'));
$var['FULLJOBISERR'] = formsHelper::getCheckBox('joberr', wgSessions::getPageValue('joberr'));

wgSystem::defPostValue(CronJobsLogModel::COL_MESSAGE, wgLang::get('nomessageselected'));
wgSystem::defPostValue(CronJobsLogModel::COL_ADDED, time());
wgSystem::defPostValue(CronJobsLogModel::COL_ISERROR, 0);
$lv = array();
$item = new CronJobsLogModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CronJobsLogModel::getLogForJobPager(wgSessions::getPageValue('job_id'), wgSessions::getPageValue('joberr'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listcronjobs');
	$lv['LMESSAGE'] = $val->getMessage();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LISERROR'] = ((bool) $val->getIserror() ? 'red' : 'green');
	$lv['IMAGE'] = wgIcons::getIcon(((bool) $val->getIserror() ? 'error' : 'ok'), $val->getMessage());
	$lv['VIEWROW'] = wgIcons::getButton('eye', $val->getMessage(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getMessage(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listcronjobs');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'logscronjobs') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$params = array();
$params['baseclass'] = 'CronJobsModel';
$var['LISERROR'] = ((bool) $val->getIserror() ? 'red' : 'green');
$var['COLMESSAGE'] = $item->getMessage();
$var['ADDEDDET'] = wgSystem::formatDate($item->getAdded());
$var['IMAGE'] = wgIcons::getIcon(((bool) $item->getIserror() ? 'error' : 'ok'), $item->getMessage());
if ((bool) $item->getId()) $var['JOBNAME'] = '('.CronJobsModel::getJobName($item->getCronJobsId()).')';

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('cronjobs', wgLang::get('cronjobs'), true, $tpl->getBlock($block));
// ----------- cronjobs end -----------

// ----------- userjobs (Block: userjobs) start -----------
$block = 'userjobs';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'logsuserjobs';

wgSessions::setPageValueDefault('job_id', 0);
wgSessions::setPageValueDefault('joberruj', 1);
if (wgPost::isValue('submituj')) {
	wgSessions::setPageValue('job_id', (int) wgPost::getValue('job_id'));
	wgSessions::setPageValue('joberruj', (int) wgPost::getValue('joberruj'));
}

$var['FULLCOLCRONJOBSID'] = formsHelper::getSelectBox('job_id', wgSessions::getPageValue('job_id'), CronJobsModel::doSelect(), array(), wgLang::get('alljobs'));
$var['FULLJOBISERR'] = formsHelper::getCheckBox('joberruj', wgSessions::getPageValue('joberruj'));

wgSystem::defPostValue(CronJobsLogModel::COL_MESSAGE, wgLang::get('nomessageselected'));
wgSystem::defPostValue(CronUserjobsLogModel::COL_ADDED, time());
wgSystem::defPostValue(CronUserjobsLogModel::COL_ISERROR, '');
$lv = array();
$item = new CronUserjobsLogModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = CronUserjobsLogModel::getLogForJobPager(wgSessions::getPageValue('job_id'), wgSessions::getPageValue('joberruj'), pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listuserjobs');
	$lv['LMESSAGE'] = $val->getMessage();
	$lv['LADDED'] = wgSystem::formatDate($val->getAdded());
	$lv['LISERROR'] = ((bool) $val->getIserror() ? 'red' : 'green');
	$lv['IMAGE'] = wgIcons::getIcon(((bool) $val->getIserror() ? 'error' : 'ok'), $val->getMessage());
	$lv['VIEWROW'] = wgIcons::getButton('eye', $val->getMessage(), wgPaths::makeTableEditLink($val->getId(), 'show='.$var['ACTIONNAME']));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getMessage(), wgPaths::makeTableDeleteLink($val->getId(), 'act='.$var['ACTIONNAME']), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listuserjobs');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'logsuserjobs') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['LISERROR'] = ((bool) $val->getIserror() ? 'red' : 'green');
$var['COLMESSAGE'] = $item->getMessage();
$var['ADDEDDET'] = wgSystem::formatDate($item->getAdded());
$var['IMAGE'] = wgIcons::getIcon(((bool) $item->getIserror() ? 'error' : 'ok'), $item->getMessage());
if ((bool) $item->getId()) $var['JOBNAME'] = '('.CronUserjobsModel::getJobName($item->getCronUserjobsId()).')';

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('userjobs', wgLang::get('userjobs'), false, $tpl->getBlock($block));
// ----------- userjobs end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>