<?php
/**
 * System and modules configuration class
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      29. July 2009
 */

class wgConfig  {
	
	/**
	 * Object constructor
	 *
	 */
	function __construct() {

	}
	
	/**
	 * Returns system configuration from config/config.php
	 *
	 * @return array Configuration
	 */
	public static function getSystemConfiguration() {
		include(wgPaths::getAdminPath().'config/config.php');
		return $conf;
	}
	
	/**
	 * Returns config file as a reusable php code
	 *
	 * @return string Php code
	 */
	public function getConfigAsPhpCode() {
		global $conf;
		$out = '$conf = array();
$conf[\'db\'] = array();
';
		foreach ($conf as $gk=>$gv) if ($gk != 'inclusion') foreach ($gv as $k=>$v) {
			if (!is_numeric($v)) $v = "'$v'";
			$out .= '$conf[\''.$gk.'\'][\''.$k.'\'] = '.$v.';
';
		}
		return $out;
	}
	
	/**
	 * Returns selected value from the config file or NULL if any problem
	 *
	 * @param string $name Name of the property
	 * @param string $part Main part in the array (define as default)
	 * @return string
	 */
	public static function getConfValue($name, $part='define') {
		include(wgPaths::getAdminPath().'config/config.php');
		if (isset($conf[$part][$name])) return $conf[$part][$name];
		else return NULL;
	}
	
	/**
	 * Returns configuration for module
	 *
	 * @param string $name Module name
	 * @return array Configuration
	 */
	public static function getConfiguration($name) {
		$path = wgPaths::getAdminPath().'config/';
		$file = $name.'.xml';
		if (file_exists($path.$file)) {
			$data = wgIo::readFile($path.$file);
			$xml = new xml();
			$arr = $xml->xmlToArray($data);
			if (is_array($arr)) return $arr;
			else return array();
		}
		else return array();
	}
	
	/**
	 * Returns true is module configuration exists or false if not
	 *
	 * @param string $name Module name
	 * @return bool
	 */
	public static function isConfiguration($name) {
		$path = wgPaths::getAdminPath().'config/';
		$file = $name.'.xml';
		return (bool) file_exists($path.$file);
	}
	
	/**
	 * Saves configuration in array in to the config XML file in admin/config/
	 *
	 * @param string $name Module name
	 * @param array $data Array with configuration
	 * @return bool Success
	 */
	public static function saveConfiguration($name, $data) {
		$path = wgPaths::getAdminPath().'config/';
		$file = $name.'.xml';
		$xml = new xml();
		$data = $xml->arrayToXml($data);
		return (bool) wgIo::writeFile($path.$file, $data);
	}
	
	/**
	 * Generates backed html for selected module configuration for WebGuru
	 *
	 * @param array $arr Configuration array
	 * @return string Output HTML
	 */
	public static function generateConfigAdmin($arr) {
		if (!is_array($arr) || empty($arr)) return NULL;
		$data = NULL;
		foreach ($arr as $g=>$group) {
			$data .= '<table>
	<colgroup>
		<col style="width: 60%;" />
		<col style="width: 40%;" />
	</colgroup>
	<thead>
		<tr>
			<th>'.wgLang::get('name').' ('.wgLang::get($g).')</th>
			<th>'.wgLang::get('value').'</th>
		</tr>
	</thead>
	<tbody>
		';
			if (is_array($group)) {
				foreach ($group as $k=>$v) {
					$data .= '
		<tr>
			<td>'.wgLang::get($k).'</td>
			';
					$fields = NULL;
					if (is_array($v)) foreach ($v as $fk=>$fv) {
						$fields .= '<input type="text" name="conf['.$g.']['.$k.']['.$fk.']" value="'.$fv.'" />';
					}
					else $fields = '<input type="text" name="conf['.$g.']['.$k.']" value="'.$v.'" />';
					$data .= '
			<td>'.$fields.'</td>';
					$data .= '
		</tr>';
				}
			}
			else {
				$data .= '';
			}
			$data .= '
	</tbody>
</table>';
		}
		return $data;
	}

	/**
	 * Object destructor
	 *
	 */
	function __destruct() {

	}
}


?>