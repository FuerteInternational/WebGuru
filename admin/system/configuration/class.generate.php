<?php
/**
 * Generate class for module Configuration
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

class generateConfiguration {
		
	public function __construct() {
		
	}
	
	public function generateErrors($p) {
		$temp = SystemErrorsTemplatesModel::getTemplate($p[3]);
		if (empty($temp)) return false;
		if (!(bool) $temp->getId()) return false;
		$start = NULL;
		$end = NULL;
		if ((bool) $temp->getGroupmessages()) $foreach = 'if ($grid == 0) {
				?>'.self::_parseErrorTemp($temp->getGrouperrorbegin()).'<?php
				foreach ($err[$grid] as $message) { ?>'.self::_parseErrorTemp($temp->getItemerror()).'<?php }
				?>'.self::_parseErrorTemp($temp->getGrouperrorend()).'<?php
			}
			elseif ($grid == 1) {
				?>'.self::_parseErrorTemp($temp->getGroupalertbegin()).'<?php
				foreach ($err[$grid] as $message) { ?>'.self::_parseErrorTemp($temp->getItemerror()).'<?php }
				?>'.self::_parseErrorTemp($temp->getGroupalertend()).'<?php
			}
			elseif ($grid == 2) {
				?>'.self::_parseErrorTemp($temp->getGroupokbegin()).'<?php
				foreach ($err[$grid] as $message) { ?>'.self::_parseErrorTemp($temp->getItemok()).'<?php }
				?>'.self::_parseErrorTemp($temp->getGroupokend()).'<?php
			}';
		else {
			$start = '?>'.self::_parseErrorTemp($temp->getGroupokbegin()).'<?php'.NL;
			$foreach = 'foreach ($err[$grid] as $message) { ?>'.self::_parseErrorTemp($temp->getItemerror()).'<?php }
			';
			$end = '?>'.self::_parseErrorTemp($temp->getGrouperrorend()).'<?php'.NL;
		}
		
		
		$data = array();
		//$data['modules'][] = 'configuration';
		$data['pretext'] = '';
		$data['content'] = '<?php
$err = wgError::getErrors();
$grp = wgError::getErrorsGroups();
if (!empty($err) && !empty($grp) && is_array($grp)) {
	?>'.$temp->getErrorbegin().'<?php
	foreach ($grp as $grid=>$group) {
		'.$start.'if (!empty($err[$grid])) {
			'.$foreach.'
		}'.$end.'
	}
	?>'.$temp->getErrorend().'<?php
}
wgError::clearSession();
unset($err);
unset($grp);		
		
?>';

		
		return $data;
	}
	
	private static function _parseErrorTemp($temp) {
		$temp = str_ireplace('{%Message}', '<?php echo $message[0]; ?>', $temp);
		$temp = str_ireplace('{%Group}', '<?php echo $grp[$grid][1]; ?>', $temp);
		return $temp;
	}
	
	
}

?>