<?php
/**
 * Auto generate class for module iPhone menu
 * 
 * @package      WebGuru3
 * @subpackage   modules/imenu/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        21. August 2009
 */


class autoGenerateImenu {
		
	public function __construct() {
		$menus = ImenuMenusModel::getSelfData();
		foreach ($menus as $menu) {
			$items = ImenuItemsModel::getSelfData();
			if (!empty($items) && is_array($items)) {
				$out = '<?xml version="1.0" encoding="utf-8"?><items>';
				foreach ($items as $item) {
					$out .= '<item>';
					$out .= '<name>'.trim($item->getName()).'</name>';
					$out .= '<type>'.trim($item->getType()).'</type>';
					$out .= '<image>'.trim($item->getImage()).'</image>';
					$out .= '<variable>'.trim($item->getVariable1()).'</variable>';
					$out .= '<variable2>'.trim($item->getVariable2()).'</variable2>';
					$out .= '<variable3>'.trim($item->getVariable3()).'</variable3>';
					$out .= '</item>';
				}
				$out .= '</items>';
				wgIo::writeFile(wgPaths::getWebdataPath().'imenu-'.trim($menu->getIdentifier()).'.xml', $out);
			}
		}
	}
	
}
?>