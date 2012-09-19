<?php

class wgMail {
	
	public static function sendEmails($from, $to, $subject, $body, $files=array()) {
		include(wgPaths::getAdminPath().'config/config.php');
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
		if (!is_array($to)) $to = array($to);
		if (!empty($files) && !is_array($files)) $files = array($files);
		if (!empty($to)) foreach ($to as $rec) {
			if (is_array($body)) {
				$message = new Mail_mime();
				$message->setHTMLBody($body['html']);
				$message->setTXTBody($body['text']);
			}
			if (!empty($files)) {
				if (!isset($message)) {
					$message = new Mail_mime();
					$message->setHTMLBody(nl2br($body));
					$message->setTXTBody(strip_tags($body));
				}
				foreach ($files as $file) if (file_exists($file)) $message->addAttachment($file);
			}
			if (isset($message)) $body = $message->get();
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
	
}

?>