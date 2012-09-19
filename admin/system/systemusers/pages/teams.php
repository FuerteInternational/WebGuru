<?php
/**
 * Page index for module Systemusers
 * 
 * @package      WebGuru3
 * @subpackage   modules/systemusers/pages/
 * @author       System Administrator
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

$system['parse']['head'] = '
<link href="./thirdparty/calendar/calendar-blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./thirdparty/calendar/calendar.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="./thirdparty/calendar/calendar-setup.js"></script>
<script type="text/javascript">
<!--
function suggestPassword(len) {
    var pwchars = "abcdefghjkmnpqrstuvwxyz123456789ABCDEFGHJKLMNPQRSTUVWX";
    var passwordlength = len;
    var pass = \'\';
    for ( i = 0; i < passwordlength; i++ ) {
        pass += pwchars.charAt( Math.floor( Math.random() * pwchars.length ) )
    }
    return pass;
}
function genPass() {
	pass = suggestPassword(8);
	$(\'#showpass\').html(\''.wgLang::get('passgen').': <span class="red">\'+pass+\'</span>\');
	$(\'#pass\').val(pass);
	$(\'#pass2\').val(pass);
}
-->
</script>
';
$system['parse']['editor'] = false;
$tab = new myTabs('myTabs');

// ----------- sysusers (Block: sysusers) start -----------
$block = 'sysusers';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexsysusers';
$var['GENBUTTON'] = wgIcons::getIcon('cog_go');


wgSystem::defPostValue(SystemUsersModel::COL_NICKNAME, '');
wgSystem::defPostValue(SystemUsersModel::COL_MAIL, '');
wgSystem::defPostValue(SystemUsersModel::COL_PASS, '');
wgSystem::defPostValue(SystemUsersModel::COL_FIRSTNAME, '');
wgSystem::defPostValue(SystemUsersModel::COL_LASTNAME, '');
wgSystem::defPostValue(SystemUsersModel::COL_ACTIVE, 1);
$lv = array();
$item = new SystemUsersModel();
$item->setDefaultResults(wgSystem::getPost());
// TODO: improve callback when you have same name of the field in more tabs (like email)
//if (wgSystem::getRequestValue('act') == 'indexsysusers') $item->setDefaultResults(wgSystem::getPost());
//else $item->setNullResults();
$params = array();
$arr = SystemUsersModel::doPager($params, pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$ok = true;
	if (!wgUsers::isSu()) {
		if (wgUsers::isTeamSu($val->getSystemTeamId())) $ok = false;
	}
	if ($ok) {
		$tpl->setCurrentBlock('listsysusers');
		$lv['LID'] = $val->getId();
		$lv['LNICKNAME'] = $val->getNickname();
		$lv['LMAIL'] = $val->getMail();
		$lv['LPASS'] = $val->getPass();
		$lv['LFIRSTNAME'] = $val->getFirstname();
		$lv['LLASTNAME'] = $val->getLastname();
		$lv['LLASTLOGIN'] = $val->getLastlogin();
		$lv['LSYSTEMTEAMID'] = $val->getSystemTeamId();
		$lv['LTIMEVER'] = $val->getTimever();
		$lv['LCODEVER'] = $val->getCodever();
		$lv['LACTIVE'] = $val->getActive();
		$lv['EDITROW'] = wgIcons::getButton('edit', '?name?', wgPaths::makeSelfLink('show=indexsysusers&amp;edit='.$val->getId()));
		$lv['DELETEROW'] = wgIcons::getButton('delete', '?name?', wgPaths::makeSelfLink('act=indexsysusers&amp;delete='.$val->getId()), true);
		$tpl->setVariable($lv);
		$tpl->parseBlock('listsysusers');
		if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexsysusers') $item = $val;
	}
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNICKNAME'] = $item->getNickname();
$var['COLMAIL'] = $item->getMail();
$var['COLPASS'] = $item->getPass();
$var['COLFIRSTNAME'] = $item->getFirstname();
$var['COLLASTNAME'] = $item->getLastname();
$var['FULLCOLLASTLOGIN'] = formsHelper::getDateTimeBox('lastlogin', $item->getLastlogin());
$params = array();
$params['baseclass'] = 'SystemTeamsModel';
$var['FULLCOLSYSTEMTEAMID'] = formsHelper::getSelectBox('system_team_id', $item->getSystemTeamId(), SystemTeamsModel::getTeamsForMyPermissions(), $params);
$var['COLTIMEVER'] = $item->getTimever();
$var['COLCODEVER'] = $item->getCodever();
$var['FULLCOLACTIVE'] = formsHelper::getCheckBox('active', $item->getActive(), 1);

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('sysusers', wgLang::get('sysusers'), true, $tpl->getBlock($block));
// ----------- sysusers end -----------

// ----------- systeams (Block: systeams) start -----------
$block = 'systeams';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'indexsysteams';


wgSystem::defPostValue(SystemTeamsModel::COL_NAME, '');
wgSystem::defPostValue(SystemTeamsModel::COL_NOTE, '');
wgSystem::defPostValue(SystemTeamsModel::COL_IPFILTER, '');
$lv = array();
$item = new SystemTeamsModel();
$item->setDefaultResults(wgSystem::getPost());

$arr = SystemTeamsModel::getTeamsForMyPermissionsPager(pager::getPage($block));
if (!empty($arr['data']) && is_array($arr['data'])) foreach ($arr['data'] as $val) {
	$tpl->setCurrentBlock('listsysteams');
	$lv['LID'] = $val->getId();
	$lv['LNAME'] = $val->getName();
	$lv['LNOTE'] = $val->getNote();
	$lv['LIPFILTER'] = $val->getIpfilter();
	$lv['EDITROW'] = wgIcons::getButton('edit', $val->getName(), wgPaths::makeSelfLink('show=indexsysteams&amp;edit='.$val->getId()));
	$lv['DELETEROW'] = wgIcons::getButton('delete', $val->getName(), wgPaths::makeSelfLink('act=indexsysteams&amp;delete='.$val->getId()), true);
	$tpl->setVariable($lv);
	$tpl->parseBlock('listsysteams');
	if (wgSystem::getRequestValue('edit') == $val->getId() && wgSystem::getRequestValue('show') == 'indexsysteams') $item = $val;
}
$var['DATAPAGER'] = pager::makeAdminPager($arr['pager']);
$lv = array();

$var['COLID'] = $item->getId();
$var['COLNAME'] = $item->getName();
$var['COLNOTE'] = $item->getNote();
$var['COLIPFILTER'] = $item->getIpfilter();
$var['MYIP'] = valid::getUserIp();

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);
$tab->addTab('systeams', wgLang::get('systeams'), false, $tpl->getBlock($block));
// ----------- systeams end -----------



$var = array();
$system['parse']['content'] = $tab->getAll();
?>