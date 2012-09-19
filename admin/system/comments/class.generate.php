<?php
/**
 * Generate class for module Comments
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

		
class generateComments {
		
	public function __construct() {
		
	}
	
	public function generateList($params) {
		$temp = CommentsTemplatesModel::getTemplateByIdentifierType($params[3], 0);
		if (!(bool) $temp) return false;
		$begin = self::parseVars($temp->getTempbegin(), new CommentsMessagesModel());
		$item = self::parseVars($temp->getTempitem(), new CommentsMessagesModel());
		$end = self::parseVars($temp->getTempend(), new CommentsMessagesModel());
		if ((bool) $temp->getPager()) {
			$pg = "['data']";
			$ds = 'CommentsMessagesModel::getPager('.$temp->getCommentsGroupsId().', $_REQUEST[\''.$temp->getVariable().'\'], '.$temp->getPerpage().', pager::getPage(\''.$params[3].'com1\'), '.$temp->getDatasource().')';
		}
		else {
			$pg = NULL;
			$ds = 'CommentsMessagesModel::getData('.$temp->getCommentsGroupsId().', $_REQUEST[\''.$temp->getVariable().'\'], '.$temp->getDatasource().')';
		}
		$data = '<?php
if (isset($_REQUEST[\''.$temp->getVariable().'\'])) {
	$arr = '.$ds.';
	if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
		?>'.$begin.'<?php
		foreach ($arr'.$pg.' as $v) {
			?>'.$item.'<?php
		}
		?>'.$end.'<?php
	}
	$arr = NULL;
	$v = NULL;
}
?>';
		return $data;
	}
		
	public function generateForm($params) {
		$temp = CommentsTemplatesModel::getTemplateByIdentifierType($params[3], 1);
		//$temp = new CommentsTemplatesModel();
		if (!(bool) $temp) return false;
		$pars = array();
		$pars['var'] = $temp->getVariable();
		$begin = self::parseVars($temp->getTempbegin(), new CommentsMessagesModel(), $pars);
		$item = self::parseVars($temp->getTempitem(), new CommentsMessagesModel(), $pars);
		//$end = self::parseVars($temp->getTempend(), new CommentsMessagesModel());
		$v = new CommentsMessagesModel();
		$v->setNullResults();
		
		if (!(bool) $temp->getPager()) {
			$pg = "['data']";
			$ds = 'CommentsMessagesModel::getPager('.$temp->getCommentsGroupsId().', $_REQUEST[\''.$temp->getVariable().'\'], '.$temp->getPerpage().', pager::getPage(\''.$params[3].'com1\'), '.$temp->getDatasource().')';
		}
		else {
			$pg = NULL;
			$ds = 'CommentsMessagesModel::getData('.$temp->getCommentsGroupsId().', $_REQUEST[\''.$temp->getVariable().'\'], '.$temp->getDatasource().')';
		}
		$data['modules'][] = 'comments';
		$data['modules'][] = 'users';
		$data['pretext'] = 'if (isset($_POST[\'for_id\']) && !empty($_POST[\'for_id\'])) {
	$ok = true;
	if (!(bool) wgPost::getValue(\'for_id\')) {
		wgError::add(\''.$temp->getNoidsyserror().'\');
		$ok = false;
	}
	if (empty($_POST[\'author\'])) {
		wgError::add(\''.$temp->getEmptyauthor().'\');
		$ok = false;
	}
	if (empty($_POST[\'email\'])) {
		wgError::add(\''.$temp->getEmptyemail().'\');
		$ok = false;
	}
	if (empty($_POST[\'comment\'])) {
		wgError::add(\''.$temp->getEmptycomment().'\');
		$ok = false;
	}
	if (!moduleUsers::isLogged() && !(bool) wgCaptcha::checkCaptcha(wgPost::getValue(\'captcha\'))) { 
		wgError::add(\'Please fill the CAPTCHA code field properly\', 0);
		$ok = false;
	}
	if ($ok) {
		$save = array();
		$save[\'comments_groups_id\'] = '.(int) $temp->getCommentsGroupsId().';
		$save[\'for_id\'] = (int) $_POST[\'for_id\'];
		$save[\'author\'] = $_POST[\'author\'];
		$save[\'author_email\'] = $_POST[\'email\'];
		$save[\'author_url\'] = $_POST[\'url\'];
		$save[\'author_ip\'] = wgIpTools::getUserIp();
		$save[\'added\'] = \'NOW()\';
		$save[\'added_gmt\'] = \'NOW()\';
		$save[\'content\'] = nl2br(strip_tags($_POST[\'comment\']));
		$save[\'approved\'] = 0;
		$save[\'agent\'] = $_SERVER[\'HTTP_USER_AGENT\'];
		$save[\'parent\'] = 0;
		$save[\'users_id\'] = (int) moduleUsers::getId();
		$cid = (int) CommentsMessagesModel::doInsert($save);
		moduleComments::sendEmails($save[\'for_id\'], $save, \''.$params[3].'\');
		$ok = (bool) $cid;
	}
	if (!$ok) {
		//wgError::add(\'Something is really wrong\');
	}
}
';
		$data['content'] = '<?php
if (isset($_REQUEST[\''.$temp->getVariable().'\'])) {
	$v = new CommentsMessagesModel();
	$v->setNullResults();
	if (moduleUsers::isLogged()) { ?>'.$begin.'<?php }
	else { ?>'.$item.'<?php }
} ?>';
		return $data;
	}
		
	private static function parseVars($temp, $class, $params=array()) {
		if (isset($params['var'])) $temp = str_ireplace('{%For}', '<?php echo (int) $_GET[\''.$params['var'].'\']; ?>', $temp);
		return wgParse::parseFrontendTemplate($temp, $class);
	}
	
	
}
?>