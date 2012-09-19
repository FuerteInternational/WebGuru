<?php
/**
 * Generate class for module iPromote
 * 
 * @package      WebGuru3
 * @subpackage   modules/ipromote/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        23. August 2009
 */

		
class generateIpromote {
		
	public function __construct() {
		
	}
	
	public function generateList($p) {
		$temp = IpromoteTemplatesModel::getTemplateByIdentifierAndType($p[3], 0);
		//$temp = new IpromoteTemplatesModel();
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new IpromoteCampaignsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new IpromoteCampaignsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new IpromoteCampaignsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new IpromoteCampaignsModel());
		
		$redirect = NULL;
		if ((bool) $temp->getRed1()) $redirect = NL.'wgPaths::redirect(\'{#LINK_'.$temp->getRed1().'}\');';
		
		$data = array();
		$data['modules'][] = 'ipromote';
		$data['modules'][] = 'users';
		$data['pretext'] = '$idu = moduleUsers::getId();
if (wgGet::isValue(\'deletepromo\')) {
	$idp = (int) wgGet::getValue(\'deletepromo\');
	if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) {
		$ok = IpromoteCampaignsModel::deletePromo($idp);
		if ((bool) $ok) {
			wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);'.$redirect.'
		}
		else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess2()).'\');
	}
	else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess3()).'\');
}'.NL;
		$data['content'] = '<?php
$idu = moduleUsers::getId();
$arr = IpromoteCampaignsModel::getUserData($idu);
if (!empty($arr) && is_array($arr)) {
	?>'.$begin.'<?php
	foreach ($arr as $v) { ?>'.$item.'<?php }
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
?>';
		return $data;
	}
	
	public function generateApplist($p) {
		$temp = IpromoteTemplatesModel::getTemplateByIdentifierAndType($p[3], 2);
		//$temp = new IpromoteTemplatesModel();
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new IpromoteAppsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new IpromoteAppsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new IpromoteAppsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new IpromoteAppsModel());
		
		$redirect = NULL;
		if ((bool) $temp->getRed1()) $redirect = NL.'wgPaths::redirect(\'{#LINK_'.$temp->getRed1().'}\');';
		
		$data = array();
		$data['modules'][] = 'ipromote';
		$data['modules'][] = 'users';
		$data['pretext'] = '$idu = moduleUsers::getId();
if (wgGet::isValue(\'promo\')) wgSessions::setSession(\'promo\', wgGet::getValue(\'promo\'), \'ipromote\');
$idp = (int) wgSessions::getSession(\'promo\', \'ipromote\');

if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) $v = IpromoteCampaignsModel::getOneSelfData($idp);
else $v = new IpromoteCampaignsModel();
$system[\'seo\'][\'title\'] = $v->getName();
$system[\'seo\'][\'h1\'] = $v->getName();

if (wgGet::isValue(\'deleteapp\')) {
	$ida = (int) wgGet::getValue(\'deleteapp\');
	$app = IpromoteAppsModel::getOneSelfData($ida);
	$idp = (int) $app->getIpromoteCampaignsId();
	if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) {
		$ok = IpromoteAppsModel::deleteApp($ida);
		if ((bool) $ok) {
			wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);'.$redirect.'
		}
		else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess2()).'\');
	}
	//else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\');
}'.NL;
		$data['content'] = '<?php
$idu = moduleUsers::getId();
$arr = IpromoteAppsModel::getUserData($idu, (int) wgSessions::getSession(\'promo\', \'ipromote\'));
if (!empty($arr) && is_array($arr)) {
	?>'.$begin.'<?php
	foreach ($arr as $v) { ?>'.$item.'<?php }
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
?>';
		return $data;
	}
	
	public function generateEditlist($p) {
		$temp = IpromoteTemplatesModel::getTemplateByIdentifierAndType($p[3], 1);
		if (!(bool) $temp->getId()) return false;
		$add = wgParse::parseFrontendTemplate($temp->getTitem(), new IpromoteCampaignsModel());
		$edit = wgParse::parseFrontendTemplate($temp->getTend(), new IpromoteCampaignsModel());
		
		$redirect = NULL;
		if ((bool) $temp->getRed1()) $redirect = NL.'wgPaths::redirect(\'{#LINK_'.$temp->getRed1().'}\');';
		
		$data = array();
		$data['modules'][] = 'ipromote';
		$data['modules'][] = 'users';
		$data['pretext'] = '$idu = moduleUsers::getId();
if (wgPost::isValue(\'csave\')) {
	if ((bool) wgPost::getValue(\'cname\')) {
		$idp = (int) wgPost::getValue(\'cedit\');
		$save = array();
		$save[\'name\'] = wgText::safeName(wgPost::getValue(\'cname\'));
		$save[\'users_id\'] = $idu;
		if ((bool) $idp) {
			if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) {
				$save[\'where\'] = $idp;
				$ok = (bool) IpromoteCampaignsModel::doUpdate($save);
				if ($ok) {
					wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);'.$redirect.'
				}
				else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess4()).'\');
			}
			else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess3()).'\'); // wrong permissions
		}
		else {
			$save[\'added\'] = \'NOW()\';
			$ok = (bool) IpromoteCampaignsModel::doInsert($save);
			if ($ok) {
				wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);'.$redirect.'
			}
			else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess4()).'\');
		}
	}
	else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess2()).'\');
}'.NL;
		$data['content'] = '<?php
$idu = moduleUsers::getId();
if (wgGet::isValue(\'editpromo\')) {
	$idp = (int) wgGet::getValue(\'editpromo\');
	if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) $v = IpromoteCampaignsModel::getOneSelfData($idp);
	else $v = new IpromoteCampaignsModel();
}
else $v = new IpromoteCampaignsModel();

if ((bool) $v->getId()) { ?>'.$edit.'<?php }
else { ?>'.$add.'<?php }
?>';
		return $data;
	}
	
	public function generateEditapplist($p) {
		$temp = IpromoteTemplatesModel::getTemplateByIdentifierAndType($p[3], 3);
		if (!(bool) $temp->getId()) return false;
		$add = wgParse::parseFrontendTemplate($temp->getTitem(), new IpromoteAppsModel());
		$edit = wgParse::parseFrontendTemplate($temp->getTend(), new IpromoteAppsModel());
		
		$redirect = NULL;
		if ((bool) $temp->getRed1()) $redirect = NL.'wgPaths::redirect(\'{#LINK_'.$temp->getRed1().'}\'.$apply);';
		
		$data = array();
		$data['modules'][] = 'ipromote';
		$data['modules'][] = 'users';
		$data['pretext'] = '$idu = moduleUsers::getId();
if (wgPost::isValue(\'asave\') || wgPost::isValue(\'aapply\')) {
	if ((bool) wgPost::getValue(\'aname\')) {
		$idp = (int) wgSessions::getSession(\'promo\', \'ipromote\');
		$ida = (int) wgPost::getValue(\'aedit\');
		if ((bool) $idp) {
			if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) {
				$save = array();
				$save[\'name\'] = wgText::safeName(wgPost::getValue(\'aname\'));
				$save[\'link\'] = wgText::secureSql(wgPost::getValue(\'alink\'));
				$save[\'head\'] = wgText::secureSql(wgPost::getValue(\'ahead\'));
				$save[\'description\'] = wgText::secureSql(wgPost::getValue(\'adescription\'));
				$save[\'sort\'] = (int) wgPost::getValue(\'asort\');
				$ok = false;
				$apply = NULL;
				if ((bool) $ida) {
					$save[\'where\'] = $ida;
					$ok = (bool) IpromoteAppsModel::doUpdate($save);
					if (wgPost::isValue(\'aapply\')) $apply = \'?editapp=\'.$ida;
					if ((bool) $ok) {
						wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);
					}
					else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess4()).'\');
				}
				else {
					$save[\'added\'] = \'NOW()\';
					$save[\'ipromote_campaigns_id\'] = $idp;
					$ok = (int) IpromoteAppsModel::doInsert($save);
					$ida = $ok;
					if (wgPost::isValue(\'aapply\')) $apply = \'?editapp=\'.$ok;
					if ((bool) $ok) {
						wgError::add(\''.str_ireplace("'", "\'", $temp->getMess1()).'\', 2);
					}
					else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess4()).'\');
				}
				if ((bool) $ok) {
					if (isset($_FILES[\'smallico\'][\'name\'])) {
						$filename = wgIo::getUserfilesFilename(\'ipromote\', \'app\', $ida, \'small\', \'empty.png\');
						wgIo::uploadFile($filename, $_FILES[\'smallico\'][\'tmp_name\'], wgPaths::getUserfilesPath());
					}
					if (isset($_FILES[\'bigico\'][\'name\'])) {
						$filename = wgIo::getUserfilesFilename(\'ipromote\', \'app\', $ida, \'big\', \'empty.png\');
						wgIo::uploadFile($filename, $_FILES[\'bigico\'][\'tmp_name\'], wgPaths::getUserfilesPath());
					}//'.$redirect.'
				}
			}
			else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess3()).'\'); // wrong permissions
		}
		else {
			wgError::add(\'Promo list is not selected\');
		}
	}
	else wgError::add(\''.str_ireplace("'", "\'", $temp->getMess2()).'\');
}'.NL;
		$data['content'] = '<?php
$idu = moduleUsers::getId();
if (wgGet::isValue(\'editapp\')) {
	$ida = (int) wgGet::getValue(\'editapp\');
	$app = IpromoteAppsModel::getOneSelfData($ida);
	$idp = (int) $app->getIpromoteCampaignsId();
	if (IpromoteCampaignsModel::verifyPromoForUser($idu, $idp)) $v = IpromoteAppsModel::getOneSelfData($ida);
	else $v = new IpromoteAppsModel();
}
else $v = new IpromoteAppsModel();

if ((bool) $v->getId()) { ?>'.$edit.'<?php }
else { ?>'.$add.'<?php }
?>';
		return $data;
	}
	
}

?>