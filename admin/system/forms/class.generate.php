<?php
/**
 * Generate class for module Forms
 * 
 * @package      WebGuru3
 * @subpackage   modules/forms/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2008
 */

class generateForms {
		
	public function __construct() {
		
	}
	
	public static function generateMain($p) {
		$f = FormsItemsModel::getFormByIdentifier($p[3]);
		if (!(bool) $f) return false;
		$template = $f->getTemplate();
		$fields = FormsFieldsModel::getFieldsForForm($f->getId());
		$pretext = self::generateFieldsPretext($fields);
		
		$captcha = array();
		$captcha['CAPTCHAIMG'] = '<?php echo \'<img src="\'.wgPaths::getAdminPath(\'url\').\'data/captcha/captcha.php" alt="" />\';?>';
		$captcha['IDFORM'] = $f->getId();
		$template = wgParse::parseBlockVarsInVars($template, '<?php if (isset($_POST[\'%1$s\'])) echo $_POST[\'%1$s\']; ?>', $captcha);
		
		if ((bool) $f->getErrormessage()) $finalerrmessage = '
	else wgError::add(\''.$f->getErrormessage().'\');';
		else $finalerrmessage = NULL;
		
		if ((bool) $f->getWarningmessage()) $finalalertmessage = '
	if ((bool) $alert) wgError::add(\''.$f->getWarningmessage().'\', 1);';
		else $finalalertmessage = NULL;
		
		if ((bool) $f->getOkmessage()) $finalokmessage = ' wgError::add(\''.$f->getOkmessage().'\', 2);';
		else $finalokmessage = NULL;
		
		$data['modules'][] = 'forms';
		$data['unique'][] = '';
		$data['pretext'] = '
if (isset($_POST[\'submitqform\']) && $_POST[\'submitqform\'] == '.$f->getId().') {
	$ok = true;
	$alert = false;
	'.$pretext['validation'].'
	if ((bool) $ok) {	
		$save = array();
		'.$pretext['save'].'
		$id = (int) FormsMessagesModel::addMessage('.$f->getId().', $save);
		moduleForms::sendEmails('.$f->getId().', $save, $id);'.$finalokmessage.'
		//$_POST = array();
	}'.$finalerrmessage.$finalalertmessage.'
}
';
		$data['content'] = '<?php
?>'.$template;
		return $data;
	}
	
	private static function generateFieldsPretext($fields) {
		$validation = NULL;
		$save = NULL;
		foreach ($fields as $f) {
			if ((bool) $f->getErrorgroup() && (bool) $f->getSystemValidationId()) $ch = true;
			else $ch = false;
			if ($f->getType() == 'text') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_POST[\''.$f->getName().'\'])) $save[\''.$f->getName().'\'] = $_POST[\''.$f->getName().'\'];
		';
			}
			elseif ($f->getType() == 'password') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_POST[\''.$f->getName().'\']) && isset($_POST[\''.$f->getName().'-ver\']) && ($_POST[\''.$f->getName().'\'] == $_POST[\''.$f->getName().'-ver\'])) $save[\''.$f->getName().'\'] = $_POST[\''.$f->getName().'\'];
		';
			}
			elseif ($f->getType() == 'number') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_POST[\''.$f->getName().'\'])) $save[\''.$f->getName().'\'] = (int) $_POST[\''.$f->getName().'\'];
		';
			}
			elseif ($f->getType() == 'checkbox') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_POST[\''.$f->getName().'\'])) $save[\''.$f->getName().'\'] = $_POST[\''.$f->getName().'\'];
		';
			}
			elseif ($f->getType() == 'radio') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_POST[\''.$f->getName().'\'])) $save[\''.$f->getName().'\'] = $_POST[\''.$f->getName().'\'];
		';
			}
			elseif ($f->getType() == 'file') {
				if ($ch) $val = SystemValidationsModel::getFullValidation($f->getSystemValidationId(), '$_POST[\''.$f->getName().'\']');
				$save .= 'if (isset($_FILES[\''.$f->getName().'\'][\'name\']) && !empty($_FILES[\''.$f->getName().'\'][\'name\'])) {
			//$save[\''.$f->getName().'\'] = array(\''.$f->getLabel().'\', $_FILES[\''.$f->getName().'\'][\'name\']); wgError::add("saving file!", 2);
		}
		';
			}
			elseif ($f->getType() == 'captcha') {
				if ($ch) $val = '!(bool) wgCaptcha::checkCaptcha($_POST[\''.$f->getName().'\'])';
				//$save .= 'if (isset($_POST[\''.$f->getName().'\'])) $save[\''.$f->getName().'\'] = array(\''.$f->getLabel().'\', $_POST[\''.$f->getName().'\']);
		//';
			}
			if ($ch) $validation .= 'if ('.$val.') { wgError::add(\''.$f->getErrmessage().'\', '.($f->getErrorgroup() - 1).');
		$ok = false;
	}
	';
			$save .= '';
		}
		return array('save'=>$save, 'validation'=>$validation);
	}
	
}	
?>