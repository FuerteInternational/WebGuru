<?php
/**
 * Generate class for module Code Snippets
 * 
 * @package      WebGuru3
 * @subpackage   modules/codesnippets/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        6. August 2009
 */

		
class generateCodesnippets {
		
	public function __construct() {
		
	}
	
	public function generateList($p) {
		$temp = CsnippetsTemplatesModel::getTemplateByIdentifierAndType($p[3], 0);
		//$temp = new CsnippetsTemplatesModel();
		if (!(bool) $temp->getId()) return false;
		//$item = str_ireplace('{%Date}', '', $temp->getTempitem());
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new CsnippetsSnippetsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new CsnippetsSnippetsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new CsnippetsSnippetsModel());
		$noitem = wgParse::parseFrontendTemplate($temp->getNoitem(), new CsnippetsSnippetsModel());
		
		$pg = NULL;
		$pager = NULL;
		$pagerVars = NULL;
		if ((bool)$temp->getPager()) {
			$pg = '[\'data\']';
			$pager = 'Pager';
			$pagerVars = '(int) wgGet::getValue(\'from\'), '.(int) $temp->getPerpage().', ';
		}
		
		$ds = (int) $temp->getDatasource();
		$user = false;
		if ($temp->getIssearch()) {
			$datasource = 'getSearch'.$pager.'Data(wgGet::getValue(\''.$temp->getVariable().'\'), '.$pagerVars.(int) $temp->getCsnippetsCategoriesId().', true, true)';
		}
		else {
			if ($ds == 0) $datasource = 'getSelf'.$pager.'Data('.$pagerVars.(int) $temp->getCsnippetsCategoriesId().', true, true)';
			elseif ($ds == 1) $datasource = 'getSelf'.$pager.'Data('.$pagerVars.'(int) wgGet::getValue(\''.$temp->getVariable().'\'), true, true)';
			elseif ($ds == 2) $datasource = 'getSelf'.$pager.'Data('.$pagerVars.'0, true, false)';
			elseif ($ds == 3) $datasource = 'getUser'.$pager.'Data((int) wgGet::getValue(\''.$temp->getVariable().'\'), '.$pagerVars.'0, true, false)';
			elseif ($ds == 4) $datasource = 'getUser'.$pager.'Data((int) wgGet::getValue(\''.$temp->getVariable().'\'), '.$pagerVars.(int) $temp->getCsnippetsCategoriesId().', true, true)';
			elseif ($ds == 5) {
				$data['modules'][] = 'users';
				$user = true;
				$datasource = 'getUser'.$pager.'Data(moduleUsers::getId(), '.$pagerVars.'0, false, false)';
			}
			elseif ($ds == 6) {
				$data['modules'][] = 'users';
				$user = true;
				$datasource = 'getUser'.$pager.'Data(moduleUsers::getId(), '.$pagerVars.'0, true, false)';
			}
			
		}
		
		
		$data['modules'][] = 'codesnippets';
		
		if ((bool) $user) $data['pretext'] = 'if (wgGet::isValue(\'deletesnippet\')) {
	$snippet = CsnippetsSnippetsModel::getOneSelfData(wgGet::getValue(\'deletesnippet\'));
	if (CsnippetsSnippetsModel::validateUserSnippet(wgGet::getValue(\'deletesnippet\'), moduleUsers::getId()) || !(bool) $snippet->getApproved()) {
		$ok = (bool) CsnippetsSnippetsModel::deleteSnippet(wgGet::getValue(\'deletesnippet\'));
		if ($ok) wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess1()).'\', 2);
		else wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess2()).'\');
	}
	else wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess3()).'\');
}'.NL;
		
		$data['content'] = '<?php
$arr = CsnippetsSnippetsModel::'.$datasource.';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$noitem.'<?php }
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateDetail($p) {
		$temp = CsnippetsTemplatesModel::getTemplateByIdentifierAndType($p[3], 1);
		//print_r($temp);
		//$temp = new CsnippetsTemplatesModel();
		if (!(bool) $temp->getId()) return false;
		//$item = str_ireplace('{%Date}', '', $temp->getTempitem());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new CsnippetsSnippetsModel());
		$noitem = wgParse::parseFrontendTemplate($temp->getNoitem(), new CsnippetsSnippetsModel());
		
		$ds = (int) $temp->getDatasource();
		if ($ds == 0) {
			$datasource = 'wgGet::getValue(\''.$temp->getVariable().'\')';
			$func = 'One';
		}
		elseif ($ds == 1) {
			$datasource = '0';
			$func = 'Latest';
		}
		elseif ($ds == 2) {
			$datasource = $temp->getCsnippetsCategoriesId();
			$func = 'Latest';
		}
		elseif ($ds == 3) {
			$datasource = '0';
			$func = 'Random';
		}
		elseif ($ds == 4) {
			$datasource = $temp->getCsnippetsCategoriesId();
			$func = 'Random';
		}
		
		$use404 = (bool) $temp->getFofred() ? 'true' : 'false';
		
		$seo = NULL;
		if ((bool) $temp->getUseseo()) $seo = '$system[\'seo\'][\'title\'] = $v->getName();
$system[\'seo\'][\'h1\'] = $v->getName();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getExcerpt());
$system[\'seo\'][\'keywords\'] = wgText::doFilter($v->getKeywords());'.NL;
		
		$data['modules'][] = 'codesnippets';
		$data['pretext'] = '$v = CsnippetsSnippetsModel::get'.$func.'SelfData((int) '.$datasource.', true);
if ('.$use404.' && !(bool) $v->getId()) wgRedirect::send404();
$system[\'data\'][\'codesnippets\'][\'detail\'][\''.$p[3].'\'] = $v;
'.$seo;
		$data['content'] = '<?php
$v = &$system[\'data\'][\'codesnippets\'][\'detail\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { ?>'.$noitem.'<?php }
$system[\'data\'][\'codesnippets\'][\'detail\'][\''.$p[3].'\'] = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateCats() {
		$temp = CsnippetsTemplatesModel::getTemplateByIdentifierAndType($p[3], 2);
		if (!(bool) $temp->getId()) return false;
		
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new CsnippetsCategoriesModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new CsnippetsCategoriesModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new CsnippetsCategoriesModel());
		$noitem = wgParse::parseFrontendTemplate($temp->getNoitem(), new CsnippetsCategoriesModel());
		
		$data['modules'][] = 'codesnippets';
		$data['content'] = '<?php
$arr = CsnippetsCategoriesModel::getCsnippetsCategoriesData();
if (!empty($arr) && is_array($arr)) {
	?>'.$begin.'<?php
	foreach ($arr as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$noitem.'<?php }
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
	
	public function generateForm($p) {
		$temp = CsnippetsTemplatesModel::getTemplateByIdentifierAndType($p[3], 3);
		//$temp = new CsnippetsTemplatesModel();
		if (!(bool) $temp->getId()) return false;
		$new = wgParse::parseFrontendTemplate($temp->getTbegin(), new CsnippetsSnippetsModel());
		$edit = wgParse::parseFrontendTemplate($temp->getTitem(), new CsnippetsSnippetsModel());
		$noitem = wgParse::parseFrontendTemplate($temp->getNoitem(), new CsnippetsSnippetsModel());
		
		$fof = (int) $temp->getFofred();
		$start = NULL;
		$end = NULL;
		if ((bool) $fof) {
			$data['modules'][] = 'users';
			$start = NL.'if ((bool) moduleUsers::isLogged()) { ';
			$end = NL.'}'.NL;
			if ($fof == 1) $end .='else { wgPaths::redirect(\''.$temp->getTend().'\') }'.NL;
			elseif ($fof == 2) $end .='else { ?>'.$noitem.'<?php }'.NL;
			elseif ($fof == 3) $data['pretext'] = 'if ((bool) moduleUsers::isLogged()) wgRedirect::send404();'.NL;
		}
		$ds = $temp->getDatasource();
		$datasource = NULL;
		$category = 0;
		if ($ds == 0) $datasource = 'CsnippetsSnippetsModel::getOneUserData(wgGet::getValue(\''.$temp->getVariable().'\'), moduleUsers::getId())';
		elseif ($ds == 1) $datasource = 'new CsnippetsSnippetsModel()';
		elseif ($ds == 2) {
			$category = $temp->getCsnippetsCategoriesId();
			$datasource = 'new CsnippetsSnippetsModel()';
		}
		
		$appr = (int) (!(bool) $temp->getIssearch());
		
		$data['modules'][] = 'codesnippets';
		$data['pretext'] = 'if (wgPost::isValue(\'sendsnippet\')) {
	$ok = true;
	if (!wgValidation::name(wgPost::getValue(\'cname\'))) {
		$ok = false;
		wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess1()).'\');
	}
	if (wgValidation::isEmpty(wgPost::getValue(\'csnippet\'))) {
		$ok = false;
		wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess2()).'\');
	}
	if (wgPost::isValue(\'cid\') && !(bool) CsnippetsSnippetsModel::validateUserSnippet(wgPost::getValue(\'cid\'), moduleUsers::getId())) {
		$ok = false;
		wgError::add(\''.wgText::secureSingleQuotes($temp->getErrmess3()).'\');
	}
	if ($ok) {
		$save = array();
		$save[\'name\'] = wgPost::getValue(\'cname\');
		$save[\'snippet\'] = wgPost::getValue(\'csnippet\');
		$save[\'excerpt\'] = wgPost::getValue(\'cexcerpt\');
		$save[\'description\'] = wgPost::getValue(\'cdescription\');
		$save[\'keywords\'] = wgPost::getValue(\'ckeywords\');
		$save[\'changed\'] = \'NOW()\';
		$save[\'users_id\'] = (int) moduleUsers::getId();
		if (!wgPost::isValue(\'cid\') || ((int) wgPost::getValue(\'cid\')) == 0) {
			$save[\'added\'] = \'NOW()\';
			$save[\'approved\'] = $appr;
			$id = (int) CsnippetsSnippetsModel::doInsert($save);
			$ok = (bool) $id;
		}
		else {
			$id = (int) wgPost::getValue(\'cid\');
			$save[\'where\'] = $id;
			$ok = (bool) CsnippetsSnippetsModel::doUpdate($save);
		}
	}
	if ($ok) wgError::add(\''.$temp->getErrmess4().'\', 2);
	
}'.NL;
		$data['content'] = '<?php'.$start.'
$v = '.$datasource.';
if ((bool) $v->getId()) { ?>'.$edit.'<?php }
else { ?>'.$new.'<?php }'.$end.'
$v = NULL;
?>';
		return $data;
	}
	
}
?>