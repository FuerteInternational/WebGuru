<?php
/**
 * Generate class for module Twitter
 * 
 * @package      WebGuru3
 * @subpackage   modules/twitter/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        9. June 2009
 */

		
class generateTwitter {
		
	public function __construct() {
		
	}
	
	public function generateList($params) {
		$temp = TwitterTemplatesModel::getTemplateByIdentifierType($params[3], 0);
		//$temp = new TwitterTemplatesModel();
		$revert = NULL;
		if (!(bool) $temp) return false;
		//$item = str_ireplace('{%Date}', '', $temp->getTempitem());
		$begin = wgParse::parseFrontendTemplate($temp->getTempbegin(), new wgTwitterObject());
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new wgTwitterObject());
		$end = wgParse::parseFrontendTemplate($temp->getTempend(), new wgTwitterObject());
		if ((bool) $temp->getDatasource()) $revert = NL.'//sort($arr);';
		$login = TwitterAccountsModel::doSelectPKey($temp->getTwitterAccountsId());
		$limit = (int) $temp->getLimit();
		if (!(bool) $limit) $limit = 100;
		$pg = '[\'data\']';
		$data['modules'][] = 'twitter';
		$data['content'] = '<?php
$arr = moduleTwitter::getLatestPosts(\''.$login->getName().'\', \''.$login->getPassword().'\', \''.$temp->getDateformat().'\');'.$revert.'
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	$x = 0;
	foreach ($arr'.$pg.' as $v) {
		$x++;
		if ($x <= '.$limit.') { ?>'.$item.'<?php }
	}
	?>'.$end.'<?php
}
$arr = NULL;
$v = NULL;
?>';
		return $data;
	}
		
	public function generateLast($params) {
		$temp = TwitterTemplatesModel::getTemplateByIdentifierType($params[3], 1);
		//$temp = new TwitterTemplatesModel();
		if (!(bool) $temp) return false;
		$item = wgParse::parseFrontendTemplate($temp->getTempitem(), new wgTwitterObject());
		$none = wgParse::parseFrontendTemplate($temp->getTempend(), new wgTwitterObject());
		if ((bool) $temp->getDatasource()) $revert = NL.'//sort($arr);';
		$login = TwitterAccountsModel::doSelectPKey($temp->getTwitterAccountsId());
		$data['modules'][] = 'twitter';
		$data['content'] = '<?php
$v = moduleTwitter::getLatestPost(\''.$login->getName().'\', \''.$login->getPassword().'\', \''.$temp->getDateformat().'\');
if ((bool) $v->getId()) {
	?>'.$item.'<?php
}
else ?>'.$none.'<?php
$v = NULL;
?>';
		return $data;
	}
}
?>