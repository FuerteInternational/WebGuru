<?php
/**
 * Generate class for module Users
 * 
 * @package      WebGuru3
 * @subpackage   modules/users/
 * @author       Ondra Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

		
class generateUsers {
		
	public function __construct() {
		
	}
	
	public function generateLogin($p) {
		$identifier = $p[3];
		$temp = UsersTemplatesModel::getTemplateForType($identifier, 6);
		if (!(bool) $temp->getId()) return false;
		$form = wgParse::parseFrontendTemplate($temp->getTemp(), new UsersModel());
		$info = wgParse::parseFrontendTemplate($temp->getNoitem(), new UsersModel());
		$logintype = $temp->getVariable();
		
		if ((bool) $temp->getMess2()) $ok = 'if ($ok) wgError::add(\''.$temp->getMess2().'\', 2);
	';
		else $ok = NULL;
		if ((bool) $temp->getMess1()) $wrong = 'if (!$ok) wgError::add(\''.$temp->getMess1().'\');
	';
		if ((bool) $temp->getMess5()) $outms = NL.TAB.'wgError::add(\''.$temp->getMess5().'\', 2);';
		if ((bool) $temp->getRedirect1()) {
			$link = $temp->getRedirect1();
			if (is_numeric($link)) $link = wgPaths::getPagePath($link, 'url');
			$red1 = '
		if ($ok) wgPaths::redirect(\''.$link.'\');';
		}
		else $red1 = NULL;
		if ((bool) $temp->getRedirect2()) {
			$link = $temp->getRedirect2();
			if (is_numeric($link)) $link = wgPaths::getPagePath($link, 'url');
			$red2 = '
	wgPaths::redirect(\''.$link.'\');';
		}
		else $red2 = NULL;
		
		$data['modules'][] = 'users';
		if ($logintype != 'info') $data['once'][] = 'if (!moduleUsers::isLogged()) {
	$ok = false;
	//if (wgCookies::is(\'login\')) $ok = moduleUsers::checkCookieLogin();
	if (!$ok && wgPost::isValue(\'login\')) {
		$ok = (bool) moduleUsers::login(wgPost::getValue(\'login\'), wgPost::getValue(\'password\'), \''.$logintype.'\');
		'.$ok.$wrong.'if ((bool) wgPost::getValue(\'remember\')) moduleUsers::saveLogin(wgPost::getValue(\'login\'), wgPost::getValue(\'password\'), \'login\', \''.$logintype.'\');'.$red1.'
	}
}
';
		$data['once'][] = 'if (isset($_GET[\'logout\'])) {
	moduleUsers::logout();'.$outms.$red2.'
}'.NL;
		$data['content'] = '<?php
if (moduleUsers::isLogged()) {
	$v = moduleUsers::getUserObject();
	?>'.$info.'<?php
}
else {
	$v = new UsersModel();
	$v->setNullResults();
	?>'.$form.'<?php
}
$v = NULL;
?>';	
		return $data;
	}
	
	public function generateLogout($p) {
		$identifier = $p[3];
		$temp = UsersTemplatesModel::getTemplateForType($identifier, 6);
		if (!(bool) $temp->getId()) return false;
		$form = wgParse::parseFrontendTemplate($temp->getTemp(), new UsersModel());
		$info = wgParse::parseFrontendTemplate($temp->getNoitem(), new UsersModel());
		$logintype = $temp->getVariable();
		
		if ((bool) $temp->getMess2()) $ok = 'if ($ok) wgError::add(\''.$temp->getMess2().'\', 2);
	';
		else $ok = NULL;
		if ((bool) $temp->getMess1()) $wrong = 'if (!$ok) wgError::add(\''.$temp->getMess1().'\');
	';
		if ((bool) $temp->getMess5()) $outms = NL.TAB.'wgError::add(\''.$temp->getMess5().'\', 2);';
		if ((bool) $temp->getRedirect1()) {
			$link = $temp->getRedirect1();
			if (is_numeric($link)) $link = wgPaths::getPagePath($link, 'url');
			$red1 = '
		if ($ok) wgPaths::redirect(\''.$link.'\');';
		}
		else $red1 = NULL;
		if ((bool) $temp->getRedirect2()) {
			$link = $temp->getRedirect2();
			if (is_numeric($link)) $link = wgPaths::getPagePath($link, 'url');
			$red2 = '
	wgPaths::redirect(\''.$link.'\');';
		}
		else $red2 = NULL;
		
		$data['modules'][] = 'users';
		$data['once'][] = 'if (isset($_GET[\'logout\'])) {
	moduleUsers::logout();'.$outms.$red2.'
}'.NL;
		return $data;
	}
	
	public function generateDetail($p) {
		$identifier = $p[3];
		$temp = UsersTemplatesModel::getTemplateForType($identifier, 0);
		if (!(bool) $temp->getId()) return false;
		$item = wgParse::parseFrontendTemplate($temp->getTemp(), new UsersModel());
		$noitem = wgParse::parseFrontendTemplate($temp->getNoitem(), new UsersModel());
		
		$data['modules'][] = 'users';
		moduleUsers::getUserObject();
		$data['content'] = '<?php
if (moduleUsers::isLogged()) {
	$v = moduleUsers::getUserObject();
	?>'.$item.'<?php
}
else {
	$v = new UsersModel();
	?>'.$noitem.'<?php
}
$v = NULL;
?>';	
		return $data;
	}
	
	public function generateVar($p) {
		$identifier = $p[3];
		$data['modules'][] = 'users';
		$data['content'] = '<?php echo moduleUsers::getVar(\''.$identifier.'\'); ?>';	
		return $data;
	}
	
	
	public function generateRegistration($p) {
		$identifier = $p[3];
		$temp = UsersTemplatesModel::getTemplateForType($identifier, 7);
		if (!(bool) $temp->getId()) return false;
		//$temp = new UsersTemplatesModel();
		$form = wgParse::parseFrontendTemplate($temp->getTemp(), new UsersModel());

		
		
		if ((bool) $temp->getRedirect1()) {
			$link = $temp->getRedirect1();
			if (is_numeric($link)) $link = wgPaths::getPagePath($link, 'url');
			$red1 = '
			wgPaths::redirect(\''.$link.'\');';
		}
		else $red1 = NULL;
		
		$data['modules'][] = 'users';
		$data['pretext'] = 'if (wgPost::isValue(\'register\')) {
	$ok = true;
	if (!wgValidation::name(wgPost::getValue(\'firstname\')) || !wgValidation::name(wgPost::getValue(\'lastname\'))) {
		$ok = false;
		wgError::add(\''.$temp->getMess2().'\');
	}
	if (!wgValidation::name(wgPost::getValue(\'nickname\'))) {
		$ok = false;
		wgError::add(\''.$temp->getMess5().'\');
	}
	else if (UsersModel::nicknameExists(wgPost::getValue(\'nickname\'))) {
		$ok = false;
		wgError::add(\''.$temp->getVariable().'\');
	}
	if (!wgValidation::minChars(wgPost::getValue(\'pass\'), 6)) {
		$ok = false;
		wgError::add(\''.$temp->getMess3().'\');
	}
	else if (wgPost::getValue(\'pass\') != wgPost::getValue(\'passver\')) {
		$ok = false;
		wgError::add(\''.$temp->getTempstart().'\');
	}
	if (!wgValidation::email(wgPost::getValue(\'mail\'))) {
		$ok = false;
		wgError::add(\''.$temp->getMess4().'\');
	}
	if ($ok) {
		$ok = (bool) UsersModel::doRegistrationFromPost('.$temp->getDatasource2().');
		if ($ok) {
			wgError::add(\''.$temp->getMess1().'\', 2);
			moduleUsers::login(wgPost::getValue(\'nickname\'), wgPost::getValue(\'pass\'), \'nickname\');'.$red1.'
		}
		else wgError::add(\''.$temp->getTempend().'\');
	}
}'.NL;
		$data['content'] = '<?php
$v = new UsersModel();
$v->setDefaultResults(wgSystem::getPost());
?>'.$form.'<?php
?>';	
		return $data;
	}
	
	public function generateUserslist($p) {
		$data = array();
		$user = wgParse::parseFrontendTemplate('{%Lastname}, {%Firstname}', new UsersModel());
		$data['content'] = '<?php if (moduleUsers::isAdmin()) { ?><script type="text/javascript">
function changeUser() {
	window.location = "{#LINK_'.(int)$p[4].'}?showUserApps=" + $("#userList").val();			
}
</script><?php $tempV = $v; ?>';
		$data['content'] .= '<select name="userList" id="userList" onchange="changeUser();"><option value="<?php echo $v->getId(); ?>">'.$user.' (You)</option>';
		$data['content'] .= '<?php $arr = UsersModel::getGroupUsers('.(int)$p[3].');';
		$data['content'] .= '$selected = " selected=\"selected\"";';
		$data['content'] .= 'foreach ($arr as $v) { $s = ($v->getId() == $_GET["showUserApps"]) ? $selected : ""; ?><option value="<?php echo $v->getId(); ?>"<?php echo $s; ?>>'.$user.'</option><?php } ?>';
		$data['content'] .= '</select><?php $v = $tempV; } ?>';
		return $data;
	}
	
}
?>