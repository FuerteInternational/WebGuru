<?php
/**
 * Database class for table languages_translations
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/languages_translations
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        19. May 2009 11:14:46
 */

class LanguagesTranslationsModel extends BaseLanguagesTranslationsModel {
	
	public static function getTranslationById($definition_id, $lang=false) {
		$id = (int) $definition_id;
		$lang = (int) $lang;
		if (!(bool) $lang) $lang = wgLang::getLanguageId();
		$conn = new wgConnector();
		$conn->where(parent::COL_LANGUAGES_DEFINITIONS_ID, $id);
		$conn->where(parent::COL_SYSTEM_LANGUAGES_ID, $lang);
		$conn->limit(1);
		$arr = parent::doSelect($conn);
		if (isset($arr[0])) return $arr[0];
		else return new LanguagesTranslationsModel();
	}
	
	public static function deleteTranslationsForPage($id_page) {
		$id = (int) $id_page;
		if (!(bool) $id) return false;
		$defs = LanguagesDefinitionsModel::getPageDefinitions($id);
		foreach ($defs as $def) {
			$conn = new wgConnector();
			$conn->where(parent::COL_LANGUAGES_DEFINITIONS_ID, $def->getId());
			parent::doDelete($conn);
		}
		return true;
	}
	
	public static function deleteTranslationsForDefinition($definition_id) {
		$id = (int) $definition_id;
		if (!(bool) $id) return false;
		$conn = new wgConnector();
		$conn->where(parent::COL_LANGUAGES_DEFINITIONS_ID, $id);
		parent::doDelete($conn);
		return true;
	}
	
	public static function deleteGlobalTranslation() {
		$defs = LanguagesDefinitionsModel::getGlobalDefinitions();
		foreach ($defs as $def) {
			$conn = new wgConnector();
			$conn->where(parent::COL_LANGUAGES_DEFINITIONS_ID, $def->getId());
			parent::doDelete($conn);
		}
		return true;
	}
	
	
	public static function getAllTranslationsForDef($definition_id) {
		$id = (int) $definition_id;
		$conn = new wgConnector();
		$conn->where(parent::COL_LANGUAGES_DEFINITIONS_ID, $id);
		return parent::doSelect($conn);
	}
	
	public static function exportData($file=NULL) {
		$pid = (int) wgPost::getValue('mypage');
		$page = PagesModel::getOnePage($pid);
		$p = false;
		if (is_a($page, 'PagesModel')) {
			$filename = 'translations-'.$page->getIdentifier().'.xls';
			$p = true;
		}
		else $filename = 'translations-global.xls';
		require_once('Spreadsheet/Excel/Writer.php'); 
		$xls =& new Spreadsheet_Excel_Writer();
		$xls->_codepage = 65001; 
		$xls->send($filename);
		$langs = SystemLanguageModel::getLanguagesIdArrayForWeb(wgSystem::getCurrentWebsite());
		if (!$p) $definitions = LanguagesDefinitionsModel::getGlobalDefinitions();
		else $definitions = LanguagesDefinitionsModel::getPageDefinitions($pid);
		foreach ($langs as $lng) {
			$sheet =& $xls->addWorksheet($lng->getName());
			$arr = parent::doSelect();
			$fr =& $xls->addFormat();
			$fr->setBold();
			$fr->setBottom(1);
			$sheet->write(0, 0, 'Definition', $fr);
			$sheet->write(0, 1, 'Translation', $fr);
			$sheet->write(0, 2, 'Default text', $fr);
			$sheet->write(0, 3, 'Language code', $fr);
			foreach ($definitions as $k=>$v) {
				$translation = LanguagesTranslationsModel::getTranslationById($v->getId(), $lng->getId())->getDefinition();
				$sheet->write(($k+1), 0, $v->getName());
				$sheet->write(($k+1), 1, $translation);
				$sheet->write(($k+1), 2, $v->getDefaultText());
				$sheet->write(($k+1), 3, $lng->getCode());
			} 
		}		
		$xls->close();
		exit();
	}
	
	public static function importXLS($file) {
		$id = (int) wgPost::getValue('mypage');
		if (!(bool) $id) LanguagesTranslationsModel::deleteGlobalTranslation();
		else LanguagesTranslationsModel::deleteTranslationsForPage($id);
		require_once('Excel/reader.php');
		$data = new Spreadsheet_Excel_Reader();
		$file = wgIo::saveTemp($file);
		if ((bool) $file) {
			$data->read($file);
			$langs = SystemLanguageModel::getLanguagesCodeArrayForWeb(wgSystem::getCurrentWebsite());
			foreach ($data->sheets as $k=>$sheet) {
				$sheet['numCols'] = count($sheet['cells']);
				for ($j = 1; $j <= $sheet['numCols']; $j++) {
					$save = array();
					$r = &$sheet['cells'][$j+1];
					$def = LanguagesDefinitionsModel::getDefinitionByKey($r[1], $id);
					$langid = 0;
					if (isset($langs[$r[4]])) $langid = (int) $langs[$r[4]]->getId();
					if ((bool) $def->getId() && (bool) $langid) {
						$save['languages_definitions_id'] = $def->getId();
						$save['system_languages_id'] = $langid;
						$save['definition'] = isset($r[2]) ? $r[2] : '';
						$save['key'] = $r[1];
						parent::doInsert($save);
					}
				}
			}
			wgIo::delTemp();
			return (int) $sheet['numCols'];
		}
		else return false;
			
	}
	
}
?>