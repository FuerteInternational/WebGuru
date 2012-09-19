<?php
/**
 * Generate class for module Youtube
 * 
 * @package      WebGuru3
 * @subpackage   modules/youtube/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        3. March 2009
 */

		
class generateYoutube {
		
	public function __construct() {
		
	}
	
	public function generateCat($p) {
		$temp = SystemTemplatesModel::getOneTemplate(0, $p[3], 'youtube');
		if (!(bool) $temp) return false;
		$begin = self::parseT($temp->getBegin1(), new YoutubeCategoriesModel());
		$item = self::parseT($temp->getItem1(), new YoutubeCategoriesModel());
		$end = self::parseT($temp->getEnd1(), new YoutubeCategoriesModel());
		$noitem = self::parseT($temp->getNotemp1(), new YoutubeCategoriesModel());
		$regonly = self::parseT($temp->getNotemp2(), new YoutubeCategoriesModel());
		if ((bool) $temp->getPager()) {
			$ds = 'YoutubeCategoriesModel::getSubcatsPager(wgSystem::getRequestValue(\''.$temp->getVar1().'\'), pager::getPage(\'ytc'.$temp->getIdentifier().'\'), '.$temp->getLimit().')';
			$pg = '[\'data\']';
		}
		else {
			$ds = 'YoutubeCategoriesModel::getSubcats(wgSystem::getRequestValue(\''.$temp->getVar1().'\'), '.$temp->getLimit().')';
			$pg = NULL;
		}
		$data['modules'][] = 'youtube';
		$data['modules'][] = 'users';
		$data['pretext'] = '';
		$data['content'] = '<?php
$arr = '.$ds.';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$noitem.'<?php }
?>';
		$data['content'] = self::wrapNotReg($temp->getTint1(), $data['content'], $regonly);
		return $data;
	}
	
	public function generateList($p) {
		$temp = SystemTemplatesModel::getOneTemplate(1, $p[3], 'youtube');
		if (!(bool) $temp) return false;
		$begin = self::parseT($temp->getBegin1(), new YoutubeCategoriesModel());
		$item = self::parseT($temp->getItem1(), new YoutubeCategoriesModel());
		$end = self::parseT($temp->getEnd1(), new YoutubeCategoriesModel());
		$noitem = self::parseT($temp->getNotemp1(), new YoutubeCategoriesModel());
		$regonly = self::parseT($temp->getNotemp2(), new YoutubeCategoriesModel());
		if ((bool) $temp->getPager()) {
			$ds = 'YoutubeVideosModel::getItemsInCatPager(wgSystem::getRequestValue(\''.$temp->getVar1().'\'), pager::getPage(\'yti'.$temp->getIdentifier().'\'), '.$temp->getLimit().', false)';
			$pg = '[\'data\']';
		}
		else {
			$ds = 'YoutubeVideosModel::getItemsInCat(wgSystem::getRequestValue(\''.$temp->getVar1().'\'), '.$temp->getLimit().', false)';
			$pg = NULL;
		}
		$data['modules'][] = 'youtube';
		$data['modules'][] = 'users';
		$data['pretext'] = '';
		$data['content'] = '<?php
$arr = '.$ds.';
if (!empty($arr'.$pg.') && is_array($arr'.$pg.')) {
	?>'.$begin.'<?php
	foreach ($arr'.$pg.' as $v) {
		?>'.$item.'<?php
	}
	?>'.$end.'<?php
}
else { ?>'.$noitem.'<?php }
?>';
		$data['content'] = self::wrapNotReg($temp->getTint1(), $data['content'], $regonly);
		return $data;
	}
	
	public function generateDetail($p) {
		$temp = SystemTemplatesModel::getOneTemplate(2, $p[3], 'youtube');
		if (!(bool) $temp) return false;
		$begin = self::parseT($temp->getBegin1(), new YoutubeCategoriesModel());
		$noitem = self::parseT($temp->getItem1(), new YoutubeCategoriesModel());
		$regonly = self::parseT($temp->getEnd1(), new YoutubeCategoriesModel());
		$ds = 'YoutubeVideosModel::doSelectPKey((int) wgSystem::getRequestValue(\''.$temp->getVar1().'\'))';
		$pg = NULL;
		$data['modules'][] = 'youtube';
		$data['modules'][] = 'users';
		$data['pretext'] = '';
		$data['content'] = '<?php
$v = '.$ds.';
if ((bool) $v->getId()) { ?>'.$begin.'<?php }
else { ?>'.$noitem.'<?php }
?>';
		$data['content'] = self::wrapNotReg($temp->getTint1(), $data['content'], $regonly);
		return $data;
	}
	
	private static function wrapNotReg($reg, $all, $notreg) {
		if ((bool) $reg) {
			return '<?php if (!moduleUsers::isLogged()) { ?>'.$notreg.'<?php } else { ?>'.$all.'<?php } ?>';
		}
		else return $all;
	}
	
	
	private static function parseT($temp, $class) {
		
		return wgParse::parseFrontendTemplate($temp, $class);
	}
	
	
}
?>