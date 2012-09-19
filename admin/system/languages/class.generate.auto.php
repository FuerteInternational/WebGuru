<?php
/**
 * Auto generate class for module Languages
 * 
 * @package      WebGuru3
 * @subpackage   modules/languages/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        19. May 2009
 */


class autoGenerateLanguages {
	
	private static $_langs = array();
	
	public function __construct() {
		self::_generateLangFiles();
	}
	
	private static function _generateLangFiles() {
		$pages = PagesModel::getPublishedPages();
		foreach ($pages as $pg) {
			$arr = self::_assembleCode($pg);
			foreach ($arr as $k=>$code) if (!empty($code)) {
				$data = '<?php
$system[\'languages\'][\'frontend\'][\'definitions\'] = array();
'.$code.'?>';			
				$path = wgPaths::getWebdataPath().'cache.front.lang.'.$k.'.'.$pg->getId().'.php';
				wgIo::writeFile($path, $data, 'w');
				if (file_exists($path)) {
					include($path);
					$xml = self::_doXmlDefinition($system['languages']['frontend']['definitions'], $k);
					$path = wgPaths::getWebdataPath().'cache.front.lang.'.$k.'.'.$pg->getId().'.xml';
					wgIo::writeFile($path, $xml, 'w');
				}
			}
		}
	}
	
	private static function _doXmlDefinition($arr, $lngcode) {
		$out = '<?xml version="1.0" encoding="utf-8"?>'.NL.'<langfile>
	<info>
		<lngcode>'.$lngcode.'</lngcode>
	</info>
	<definitions>
';
		foreach ($arr as $k=>$v) {
			$out .= TAB.TAB.'<definition key="'.$k.'">'.htmlspecialchars($v).'</definition>'.NL;
		}
		$out .= TAB.'</definitions>'.NL.'</langfile>';
		return $out;
	}
	
	
	private static function _assembleCode($page) {
		$data = array();
		self::$_langs = SystemLanguageModel::getLanguagesIdArrayForWeb();
		$arr = LanguagesDefinitionsModel::getGlobalDefinitions();
		foreach ($arr as $def) {
			$t = self::_getCode($def);
			foreach ($t as $k=>$v) {
				if (!isset($data[$k])) $data[$k] = NULL;
				$data[$k] .= $v;
			}
		}
		$data['definitions'] = NULL;
		foreach ($arr as $def) $data['definitions'] .= '$system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($def->getName()).'\'] = \''.strtoupper($def->getName()).' (GLOBAL)\';'.NL;
		$arr = LanguagesDefinitionsModel::getPageDefinitions($page->getId());
		foreach ($arr as $def) {
			$t = self::_getCode($def);
			foreach ($t as $k=>$v) {
				if (!isset($data[$k])) $data[$k] = NULL;
				$data[$k] .= $v;
			}
		}
		foreach ($arr as $def) $data['definitions'] .= '$system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($def->getName()).'\'] = \''.strtoupper($def->getName()).'\';'.NL;
		return $data;
	}
	
	private static function _getCode($def) {
		$out = array();
		$arr = LanguagesTranslationsModel::getAllTranslationsForDef($def->getId());
		$tlangs = self::$_langs;
		foreach ($arr as $tr) {
			$lcode = self::$_langs[$tr->getSystemLanguagesId()]->getCode();
			if (!isset($out[$lcode])) $out[$lcode] = NULL;
			$out[$lcode] .= '$system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($def->getName()).'\'] = \''.str_ireplace("'", "\\'", $tr->getDefinition()).'\';'.NL;
			if (isset($tlangs[$tr->getSystemLanguagesId()])) unset($tlangs[$tr->getSystemLanguagesId()]);
		}
		if (!empty($tlangs)) foreach ($tlangs as $lang) {
			$lcode = $lang->getCode();
			if (!isset($out[$lcode])) $out[$lcode] = NULL;
			$out[$lcode] .= '$system[\'languages\'][\'frontend\'][\'definitions\'][\''.strtoupper($def->getName()).'\'] = \''.str_ireplace("'", "\\'", $def->getDefaultText()).'\';'.NL;
		}
		return $out;
	}
	
	
}
?>