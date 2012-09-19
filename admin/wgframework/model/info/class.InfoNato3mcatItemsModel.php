<?php
/**
 * Database class for table nato3mcat_items
 * 
 * @warning !!! this file is automaticaly generated, please do not change anything in this file if you don't want to loose your work !!!
 * 
 * @package      WebGuru3
 * @subpackage   wgframework/info/nato3mcat_items
 * @author       Ondrej Rafaj ()
 * @author       WebGuruCMS3 Framework CMS dbModel generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @since        29. September 2009 11:28:50
 */

class InfoNato3mcatItemsModel {
	
	const ENGINE = 'MyISAM';
	
	const TABLE = 'nato3mcat_items';
		
	const COL_ID_COLATION = NULL;

	const COL_ID_PRIMARY = true;
		
	const COL_BIGB_COLATION = NULL;
		
	const COL_SMALLB_COLATION = NULL;
		
	const COL_NIIN_COLATION = NULL;

	const COL_NIIN_REF_TABLE = '';
	
	const COL_NIIN_REF_COL = '';
		
	const COL_MARKET_COLATION = NULL;
		
	const COL_CLASIFICATION_COLATION = NULL;
		
	const COL_ITEM_TYPE_COLATION = NULL;
		
	const COL_DESCRIPTION_COLATION = NULL;
		
	const COL_COMMON_REF_NAME_COLATION = NULL;
		
	const COL_COMMON_DESCRIPTION_COLATION = NULL;
		
	const COL_NATO_ITEM_NAME_COLATION = NULL;
		
	const COL_NATO_DESCRIPTION_COLATION = NULL;
		
	const COL_LENGTH_COLATION = NULL;
		
	const COL_LENGTH_UNIT_COLATION = NULL;
		
	const COL_WIDTH_COLATION = NULL;
		
	const COL_WIDTH_UNIT_COLATION = NULL;
		
	const COL_HEIGHT_COLATION = NULL;
		
	const COL_HEIGHT_UNIT_COLATION = NULL;
		
	const COL_VOLUME_WEIGHT_COLATION = NULL;
		
	const COL_VOLUME_WEIGHT_UNIT_COLATION = NULL;
		
	const COL_DIAMETER_COLATION = NULL;
		
	const COL_DIAMETER_UNIT_COLATION = NULL;
	
	public static function getForeignKeys() { 
		return array(
			array(array('nato3mcat_items', 'niin'), array('', ''))
		);
	}	
	

}
?>
