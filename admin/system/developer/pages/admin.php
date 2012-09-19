<?php
/**
 * Creating an administration pages
 *
 * @package    WebGuru3
 * @subpackage modules
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      27. October 2008
 * 
 * @todo You must finish tabs
 */

$system['parse']['head'] = '
<script type="text/javascript" src="'.wgPaths::getModulePath('url').'js/admin-ajax.js"></script>
';
$system['parse']['editor'] = true;
$tab = new myTabs('myTabs');
// --------------------------------- start content ---------------------------------
$block = 'pagesadmin';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::defPostValue('filename', 'new-page');
wgSystem::defPostValue('htmlcontent',   '');
wgSystem::defPostValue('phpcontent',  '<?php ?>');

$modules = $module->getAllModules();
foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('papartlist');
	$tpl->setVariable('LMODGROUP', $pname);
	foreach ($part as $mymod) {
		$tpl->setCurrentBlock('pamodulelist');
		$tpl->setVariable('LMODFULLNAME', wgLang::get($mymod));
		$tpl->setVariable('LMODNAME', $mymod);
		//if ($mymod == wgSystem::getRequestValue('modonepage')) $tpl->setVariable('LSELECTED', ' selected="selected"');
		$tpl->parseBlock('pamodulelist');
	}
	$tpl->parseBlock('papartlist');
	$tpl->setCurrentBlock('papartlistb');
	$tpl->setVariable('LMODGROUP', $pname);
	foreach ($part as $mymod) {
		$tpl->setCurrentBlock('pamodulelistb');
		$tpl->setVariable('LMODFULLNAME', wgLang::get($mymod));
		$tpl->setVariable('LMODNAME', $mymod);
		//if ($mymod == wgSystem::getRequestValue('modonepage')) $tpl->setVariable('LSELECTED', ' selected="selected"');
		$tpl->parseBlock('pamodulelistb');
	}
	$tpl->parseBlock('papartlistb');
}
if (wgSystem::isParam('submit')) $var['HIDEFORM'] = 'false';
else $var['HIDEFORM'] = 'true';
$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab('pagesadmin', wgLang::get('pagesadmin'), true, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'admin';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::defPostValue('modname', 'New module');
wgSystem::defPostValue('modid', 'new-module');
wgSystem::defPostValue('modpages', 'index');
wgSystem::defPostValue('modauthor', wgUsers::getDetail('firstname').' '.wgUsers::getDetail('lastname'));

foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('partlist');
	$tpl->setVariable('LMODGROUP', $pname);
	foreach ($part as $mymod) {
		$tpl->setCurrentBlock('modulelist');
		$tpl->setVariable('LMODFULLNAME', wgLang::get($mymod));
		$tpl->setVariable('LMODNAME', $mymod);
		$tpl->parseBlock('modulelist');
	}
	$tpl->parseBlock('partlist');
}

//*
$tables = getDb::getTables();
$tpl->setCurrentBlock('grouplist');
$tpl->setVariable('LGROUPNAME', wgLang::get('dbmodel'));
foreach ($tables as $table) {
	$tpl->setCurrentBlock('valuelist');
	$tpl->setVariable('LVALUE', $table[0]);
	$tpl->setVariable('LVALUENAME', $table[0]);
	$tpl->parseBlock('valuelist');
}
$tpl->parseBlock('grouplist');

//*/

$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab('adminpages', wgLang::get('adminpages'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$block = 'adminonetable';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

wgSystem::defPostValue('modname', 'New module');

foreach ($modules as $pname=>$part) if (!empty($part) && is_array($part)) {
	$tpl->setCurrentBlock('aotpartlist');
	$tpl->setVariable('LMODGROUP', $pname);
	foreach ($part as $mymod) {
		$tpl->setCurrentBlock('aotmodulelist');
		$tpl->setVariable('LMODFULLNAME', wgLang::get($mymod));
		$tpl->setVariable('LMODNAME', $mymod);
		$tpl->parseBlock('aotmodulelist');
	}
	$tpl->parseBlock('aotpartlist');
}

//*
$tables = getDb::getTables();
$tpl->setCurrentBlock('aotgrouplist');
$tpl->setVariable('LGROUPNAME', wgLang::get('dbmodel'));
foreach ($tables as $table) {
	$tpl->setCurrentBlock('aotvaluelist');
	$tpl->setVariable('LVALUE', $table[0]);
	$tpl->setVariable('LVALUENAME', $table[0]);
	$tpl->parseBlock('aotvaluelist');
}
$tpl->parseBlock('aotgrouplist');


//*/

$var['MODULE'] = wgPaths::getModulePath();


$var = wgSystem::getFormCallback($var);

$tpl->setVariable($var);
$tpl->parseBlock($block);

$tab->addTab('adminonetable', wgLang::get('adminonetable'), false, $tpl->getBlock($block));

// --------------------------------- end content -----------------------------------
$var = array();
$system['parse']['content'] = $tab->getAll();







?>