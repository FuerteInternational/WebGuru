<?php
/**
 * Main class for module Forms
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

class moduleForms extends dbModelForms {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Forms';
		$this->code    = 'forms';
		$this->version = '4.0.1.0';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function sendEmails($id, $data, $idmessage) {
		$id = (int) $id;
		if (!(bool) $id) return false;
		$form = FormsItemsModel::doSelectPKey($id);
		$recipients = FormsRecipientsModel::getRecipientsForForm($id);
		
		if ((bool) $form->getMailfield()) $from = $data[$form->getMailfield()];
		else $from = $form->getAdminmail();
		
		if (isset($data['subject'])) $subject = $form->getName().' - '.$data['subject'];
		else $subject = $form->getName();
		
		if ((bool) $form->getUsehtml()) $html = self::parseMessage($form->getMailhtml(), $data);
		else $html = self::doAutoHtmlMessage($form, $data);
		
		if ((bool) $form->getUsetxt()) $text = self::parseMessage($form->getMailtxt(), $data);
		else $text = self::doAutoTxtMessage($form, $data);
		
		$files = self::saveFiles($idmessage);
		
		include(wgPaths::getAdminPath().'config/config.php');
		$smtp = array();
		$smtp['host'] = (isset($conf['smtp']['host'])) ? $conf['smtp']['host'] : NULL;
		$smtp['auth'] = (isset($conf['smtp']['auth'])) ? (bool) $conf['smtp']['auth'] : false;
		if ((bool) $smtp['auth']) {
			$smtp['username'] = (isset($conf['smtp']['name'])) ? $conf['smtp']['name'] : NULL;
			$smtp['password'] = (isset($conf['smtp']['pass'])) ? $conf['smtp']['pass'] : NULL;
		}
		
		$errors = array();
		
		if (!empty($recipients)) foreach ($recipients as $rec) {
			require_once('Mail.php');
			require_once('Mail/mime.php');
			
			$message = new Mail_mime();
			$message->setHTMLBody($html);
			$message->setTXTBody($text);
			if (!empty($files)) foreach ($files as $file) $message->addAttachment($file);
			
			$body = $message->get();
			$extraheaders = array('From'=>$from, 'Subject'=>$subject);
			$headers = $message->headers($extraheaders);
			
			if ((bool) $smtp['host']) $mail = Mail::factory('smtp', $smtp);
			else $mail = Mail::factory('mail');
			
			$res = $mail->send($rec->getMail(), $headers, $body);
			
			if (PEAR::isError($res)) $errors[$res->getMessage()] = $res->getMessage();
		}
		if (!empty($errors)) {
			foreach ($errors as $message) wgError::add($message);
			return false;
		}
		else return true;
	}
	
	public static function saveFiles($idmessage) {
		return array();
	}
	
	public static function parseMessage($temp, $data) {
		$arr = array();
		foreach ($data as $k=>$v) $arr[strtoupper($k)] = $v;
		return wgParse::parseVarTemplate($temp, $arr);
	}
	
	public static function doAutoHtmlMessage($form, $data) {
		$out = '<h1>'.$form->getName().'</h1>';
		$fields = FormsFieldsModel::getFieldsForForm($form->getId());
		foreach ($fields as $f) if (isset($data[$f->getName()])) $out .= '<p>'.$f->getLabel().': <strong>'.$data[$f->getName()].'</strong></p>';
		return $out;
	}
	
	public static function doAutoTxtMessage($form, $data) {
		$out = $form->getName()."\r\n\r\n";
		$fields = FormsFieldsModel::getFieldsForForm($form->getId());
		foreach ($fields as $f) if (isset($data[$f->getName()])) $out .= $f->getLabel().': '.$data[$f->getName()]."\r\n";
		return $out;
	}
	
	
	
}
		
?>