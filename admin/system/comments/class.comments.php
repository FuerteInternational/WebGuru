<?php
/**
 * Main class for module Comments
 * 
 * @package      WebGuru3
 * @subpackage   modules/comments/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        27. February 2009
 */

class moduleComments extends dbModelComments {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Comments';
		$this->code    = 'comments';
		$this->version = '1.0.0.2';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function sendEmails($id, $data, $identifier) {
		$id = (int) $id;
		
		$from = $data['author_email'];
		
		$subject = 'New comment on XProgress.com ('.$identifier.')';
		
		$html = '<h1>New comment on XProgress.com ('.$identifier.')</h1>';
		$html .= '<p><strong>Link</strong>: <a href="http://www.xprogress.com/'.$identifier.'-'.$id.'-link/">http://www.xprogress.com/'.$identifier.'-'.$id.'-link/</a></p>';
		foreach ($data as $k=>$d) $html .= '<p><strong>'.ucfirst($k).'</strong>: '.$d.'</p>';
		
		//include(wgPaths::getAdminPath().'config/config.php');
		$conf = wgConfig::getSystemConfiguration();
		$smtp = array();
		$smtp['host'] = (isset($conf['smtp']['host'])) ? $conf['smtp']['host'] : NULL;
		$smtp['auth'] = (isset($conf['smtp']['auth'])) ? (bool) $conf['smtp']['auth'] : false;
		if ((bool) $smtp['auth']) {
			$smtp['username'] = (isset($conf['smtp']['name'])) ? $conf['smtp']['name'] : NULL;
			$smtp['password'] = (isset($conf['smtp']['pass'])) ? $conf['smtp']['pass'] : NULL;
		}
		
		$errors = array();
		
		require_once('Mail.php');
		require_once('Mail/mime.php');
		
		$message = new Mail_mime();
		$message->setHTMLBody($html);
		
		$body = $message->get();
		$extraheaders = array('From'=>$from, 'Subject'=>$subject);
		$headers = $message->headers($extraheaders);
		
		if ((bool) $smtp['host']) $mail = Mail::factory('smtp', $smtp);
		else $mail = Mail::factory('mail');
		
		$res = $mail->send('ondrej.rafaj@gmail.com', $headers, $body);
		
		if (PEAR::isError($res)) $errors[$res->getMessage()] = $res->getMessage();
	}
}
		
?>