<?php
/**
 * Page configfiles for module Configuration
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

// ----------- file (Block: file) start -----------
$block = 'file';
$tpl = new wgParse($temp, $path);
$tpl->setCurrentBlock($block);

$var['ACTIONNAME'] = 'configfilesfile';

$params = array();
$conf = array();
include('./config/config.php');
$arr = $conf;
$x = 0;
if (!empty($arr) && is_array($arr)) foreach ($arr as $groupid=>$group) {
	$tpl->setCurrentBlock('listgroups');
	$lv['LGROUP'] = wgLang::get('cnf'.$groupid);
	$tpl->setVariable($lv);
	foreach ($group as $k=>$v) {
		$tpl->setCurrentBlock('listfile');
		$lv['ID'] = $x;
		$lv['LNAME'] = wgLang::get('cnf'.$groupid.$k);
		$lv['INFO'] = wgIcons::getButton('info', wgLang::get('infofor').': '.$k, 'javascript: getInfo(\''.wgLang::get('inf'.$groupid.$k).'\');');
		$lv['INFO'] .= formsHelper::getHiddenField('info['.$groupid.']['.$k.']', wgLang::get('inf'.$groupid.$k));
		if ($groupid != 'db') {
			$lv['LVALUE'] = formsHelper::getTextField('conf['.$groupid.']['.$k.']', $v, array('id'=>'confField-'.$groupid.'-'.$k, 'class'=>'long'));
			$lv['DELETEROW'] = wgIcons::getButton('delete', $k, 'javascript: deleteRow(\'confRowId'.$x.'\');', true);
		}
		else {
			if ($k == 'pass') $lv['LVALUE'] = '**********';
			else $lv['LVALUE'] = $v;
			$lv['DELETEROW'] = wgIcons::getIcon('status_busy', wgLang::get('cantdelete'));
		}
		$tpl->setVariable($lv);
		$tpl->parseBlock('listfile');
		$x++;
	}
	$tpl->parseBlock('listgroups');
}

$tpl->setVariable($var);
$tpl->parseBlock($block);
//$tab->addTab('file', wgLang::get('file'), true, $tpl->getBlock($block));
// ----------- file end -----------


$var = array();
//$system['parse']['content'] = $tab->getAll();
$system['parse']['content'] = $tpl->getBlock($block);
?>