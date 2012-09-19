<?php
/**
 * Database class for table campaigns_languages
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/model/campaigns_languages
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        22. July 2009 16:01:44
 */

class CampaignsLanguagesModel extends BaseCampaignsLanguagesModel {
	
	public static function getLanguagesForCampaign($idCampaign) {
		$conn = new wgConnector();
		$conn->where(parent::COL_CAMPAIGN_ID, (int) $idCampaign);
		$conn->order(parent::COL_NAME);
		return parent::doSelect($conn);
	}
	
	public static function createLangForCampaign($name, $langCode, $cId, $default=0) {
		$save = array();
		$save['name'] = $name;
		$save['code'] = wgText::safeText($langCode);
		$save['default'] = (int) $default;
		$save['campaign_id'] = (int) $cId;
		$save['added'] = 'NOW()';
		$save['changed'] = 'NOW()';
		return (int) parent::doInsert($save);
	}
	
	
}
?>