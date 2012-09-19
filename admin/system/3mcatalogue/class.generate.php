<?php
/**
 * Generate class for module 3M Catalogue
 * 
 * @package      WebGuru3
 * @subpackage   modules/3mcatalogue/
 * @author       Ondrej Rafaj (FiftyFootSquid)
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        24. September 2009
 */

		
class generate3mcatalogue {
		
	public function __construct() {
		
	}
	
	public function generateList($p) {
		$temp = Nato3mcatTemplatesModel::getTemplateByIdentifierAndType($p[3], 0);
		//$temp = new Nato3mcatTemplatesModel();
		if (!(bool) $temp) return false;
		$begin = wgParse::parseFrontendTemplate($temp->getTbegin(), new Nato3mcatItemsModel());
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new Nato3mcatItemsModel());
		$end = wgParse::parseFrontendTemplate($temp->getTend(), new Nato3mcatItemsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new Nato3mcatItemsModel());
		
		if ((bool) $temp->getIssearch()) $ds = '$arr = Nato3mcatItemsModel::getSearchPagerData(wgGet::getValue(\'search\'), pager::getPage(\'\'), 10);';
		else $ds = '$arr = Nato3mcatItemsModel::getSelfPagerData(0, 20);';
		
		$data = array();
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '';
		$data['content'] = '<?php
'.$ds.'
if (!empty($arr[\'data\']) && is_array($arr[\'data\'])) {
	?>'.$begin.'<?php
	foreach ($arr[\'data\'] as $v) {
		?>'.$item.'<?php	
	}
	?>'.$end.'<?php
}
else { ?>'.$none.'<?php }
$cats = array();
$v = NULL;
if (isset($temp)) {
	$v = $temp;
	$temp = NULL;
}
?>';
		return $data;
	}
	
	public function generateDetail($p) {
		$temp = Nato3mcatTemplatesModel::getTemplateByIdentifierAndType($p[3], 1);
		//$temp = new Nato3mcatTemplatesModel();
		if (!(bool) $temp) return false;
		
		$item = wgParse::parseFrontendTemplate($temp->getTitem(), new Nato3mcatItemsModel());
		$none = wgParse::parseFrontendTemplate($temp->getTnoitem(), new Nato3mcatItemsModel());
		
		$data = array();
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '$v = Nato3mcatItemsModel::getOneSelfData(wgGet::getValue(\'item\'));

$system[\'data\'][\'3mcatalogue\'][\'detail\'][\''.$p[3].'\'] = $v;
$system[\'seo\'][\'title\'] = $v->getNatoItemName();
$system[\'seo\'][\'h1\'] = $v->getNatoItemName();
$system[\'seo\'][\'description\'] = wgText::doFilter($v->getNatoDescription());
';
		
		$data['content'] = '<?php
$v = &$system[\'data\'][\'3mcatalogue\'][\'detail\'][\''.$p[3].'\'];
if (!empty($v) && (bool) $v->getId()) {
	?>'.$item.'<?php
}
else { ?>'.$none.'<?php }
$v = array();		
?>';
		return $data;
	}
	
	public function generateMarket($p) {
		$data = array();
		
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
$arr2 = Nato3mcatItemsModel::getMarketData();
foreach ($arr2 as $v) {
	if (($v->getMarket()) == ($_SESSION[\'3m\'][$_GET[\'search\']]["marketFilter"])) $selected = \' selected="selected"\';
	else $selected = NULL;
	if (!wgValidation::isEmpty($v->getMarket())) echo \'<option value="\'.$v->getMarket().\'"\'.$selected.\'>\'.ucfirst(strtolower($v->getMarket())).\'</option>\';
}
unset($arr2);
?>';
		return $data;
	}
	
	public function generateClassification($p) {
		$data = array();
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
$arr2 = Nato3mcatItemsModel::getgetClasificationData();
foreach ($arr2 as $v) {
	$selected = NULL;
	if (($v->getClasification()) == ($_SESSION[\'3m\'][$_GET[\'search\']]["classificationFilter"])) $selected = \' selected="selected"\';
	if (!wgValidation::isEmpty($v->getClasification())) echo \'<option value="\'.$v->getClasification().\'"\'.$selected.\'>\'.ucfirst(strtolower($v->getClasification())).\'</option>\';
}
unset($arr2);
?>';
		return $data;
	}
	
	public function generateType($p) {
		$data = array();
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
$arr2 = Nato3mcatItemsModel::getItemTypeData();
foreach ($arr2 as $v) {
	$selected = NULL;
	if (($v->getItemType()) == ($_SESSION[\'3m\'][$_GET[\'search\']]["itemtypeFilter"])) $selected = \' selected="selected"\';
	if (!wgValidation::isEmpty($v->getItemType())) echo \'<option value="\'.$v->getItemType().\'"\'.$selected.\'>\'.ucfirst(strtolower($v->getItemType())).\'</option>\';
}
unset($arr2);
?>';
		return $data;
	}
	
	//Nato3mcatItemsModel::getgetClasificationData()
	
	public function generateDescription($p) {
		$data = array();
		$data['modules'][] = '3mcatalogue';
		$data['pretext'] = '';
		
		$data['content'] = '<?php
$arr2 = Nato3mcatItemsModel::getDescriptionData();
foreach ($arr2 as $v) {
	$selected = NULL;
	if (($v->getDescription()) == ($_SESSION[\'3m\'][$_GET[\'search\']]["descriptionFilter"])) $selected = \' selected="selected"\';
	if (!wgValidation::isEmpty($v->getDescription())) echo \'<option value="\'.$v->getDescription().\'"\'.$selected.\'>\'.ucfirst(strtolower($v->getDescription())).\'</option>\';
}
unset($arr2);
?>';
		return $data;
	}
	
	
	
}
?>