<?php
$tpl->setCurrentBlock('develop');
$x=0;
$dvar = array();
$dvar['DSELECTS'] = 0;
$dvar['DINSERTS'] = 0;
$dvar['DUPDATES'] = 0;
$dvar['DDELETES'] = 0;
$dvar['DSPECIAL'] = 0;
$dvar['DTOTAL']   = 0;
$dvar['DQUERIES'] = NULL;
$dvar['DERRORS']  = NULL;
$dvar['DTRANSLATIONS'] = NULL;


$dvar['DMODNAME']  = wgModules::getModuleName();
$dvar['DMODVER']  = wgModules::getModuleVersion();
$dvar['DMODSIZE']  = wgIo::getSize(wgPaths::getModulePath(), true);
$dvar['DMODPATH']  = wgPaths::getModulePath();

$tr = &$system['lang']['page']['nodefinitions'];
$pr = wgLang::getPageFile();
$arr = array_merge($tr, $pr);
if (!empty($arr) && is_array($arr)) foreach ($arr as $k=>$def) {
	$dvar['DTRANSLATIONS'] .= '<p><label>'.$k.':</label> '.formsHelper::getTextField('tran['.$k.']', wgLang::get($k, false), array('id'=>'tran-'.$k)).'</p>';
}
if (!empty($dvar['DTRANSLATIONS'])) {
	$dvar['DTRANSLATIONS'] = '<form action="" method="post">'.$dvar['DTRANSLATIONS'].'<p><input type="submit" name="submitTranslations" value="'.wgLang::get('save').'" ></p></form>';
}


$arr = wgConnector::getQueries();
foreach ($arr as $k=>$v) {
	$k++;
	if (isset($v['errno'])) {
		$dvar['DQUERIES'] .= '<p><strong>Query No.: '.$k.'; Query: '.wgParse::decode($v['query']).'</strong></p>';
		$dvar['DERRORS'] .= '<p>Query No.:'.$k.'; MySQL error No.:'.$v['errno'].'; Error message: '.wgParse::decode($v['error']).'</p>';
	}
	else $dvar['DQUERIES'] .= '<p><strong>Query No.: '.$k.';</strong> Query: '.wgParse::decode($v['query']).'</p>';
	$dvar['DTOTAL']++;
	if ((bool) preg_match('/SELECT (.*)/si', $v['query'])) $dvar['DSELECTS']++;
	elseif ((bool) preg_match('/INSERT (.*)/si', $v['query'])) $dvar['DINSERTS']++;
	elseif ((bool) preg_match('/UPDATE (.*)/si', $v['query'])) $dvar['DUPDATES']++;
	elseif ((bool) preg_match('/DELETE (.*)/si', $v['query'])) $dvar['DDELETES']++;
	elseif ((bool) preg_match('/TRUNCATE (.*)/si', $v['query'])) $dvar['DSPECIAL']++;
	elseif ((bool) preg_match('/DROP (.*)/si', $v['query'])) $dvar['DSPECIAL']++;
	elseif ((bool) preg_match('/SET (.*)/si', $v['query'])) $dvar['DSPECIAL']++;
	elseif ((bool) preg_match('/ALTER (.*)/si', $v['query'])) $dvar['DSPECIAL']++;
}
$dvar['DTIME']    = round(timer::getTime($wgscriptstart), 3);
$tpl->setVariable($dvar);
unset($dvar);
$tpl->parseBlock('develop');
?>