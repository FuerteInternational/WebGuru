<?php

/*

   Projectname:   CAPTCHA class
   Version:       2.0
   Author:        Pascal Rehfeldt <Pascal@Pascal-Rehfeldt.com>
   Last modified: 15. January 2006

 * GNU General Public License (Version 2, June 1991)
*/

require_once ('class.wgCaptcha.filter.php');
require_once ('class.wgCaptcha.error.php');

class wgCaptcha {
	
	var $Length;
	var $CaptchaString;
	var $fontpath;
	var $fonts;
	
	public function __construct($length = 6) {
		if (!isset($_SESSION['system']['captchastring'])) $_SESSION['system']['captchastring'] = NULL;
		header('Content-type: image/png');
		$this->Length = $length;
		$this->fontpath = wgPaths::getAdminPath().'data/captcha/fonts/';
		$this->fonts = $this->getFonts ();
		if ($this->fonts == FALSE) {
			$errormgr->addError('No fonts available!' );
			$errormgr->displayError ();
			die ();
		
		}
		if (function_exists('imagettftext') == FALSE) {
			$errormgr->addError('');
			$errormgr->displayError();
			die();
		}
		$this->stringGen();
		$this->makeCaptcha();
	}
	
	public static function checkCaptcha($input) {
		if (!isset($_SESSION['system']['captchastring'])) return false;
		if (strtolower($input) == strtolower($_SESSION['system']['captchastring'])) return true;
		else return false;
	}

	function getFonts() {
		$fonts = array ();
		if ($handle = @opendir($this->fontpath)) {
			while (($file = readdir($handle)) !== FALSE) {
				$extension = strtolower(substr($file, strlen($file) - 3, 3));
				if ($extension == 'ttf') $fonts [] = $file;
			}
			closedir ($handle);
		}
		else return FALSE;
		if (count($fonts) == 0) return FALSE;
		else return $fonts;
	}
	

	function getRandFont() {
		return $this->fontpath.$this->fonts[mt_rand(0, count($this->fonts) - 1)];
	}
	

	function stringGen() {
		$uppercase = range('A', 'Z');
		$lowercase  = range('a', 'z');
		//$numeric = range(0, 9);
		$numeric = array();
		$CharPool = array_merge($uppercase, $lowercase);
		$PoolLength = count($CharPool) - 1;
		for($i = 0; $i < $this->Length; $i ++) {
			$this->CaptchaString .= $CharPool[mt_rand(0, $PoolLength)];
		}
	}

	function makeCaptcha() {
		$imagelength = $this->Length * 25 + 36;
		$imageheight = 50;
		$image = imagecreate ( $imagelength, $imageheight );
		//$bgcolor     = imagecolorallocate($image, 222, 222, 222);
		$bgcolor = imagecolorallocate ( $image, 255, 255, 255 );
		$stringcolor = imagecolorallocate ( $image, 10, 10, 10 );
		$filter = new filters ( );
		$filter->signs ( $image, $this->getRandFont () );
		for($i = 0; $i < strlen ( $this->CaptchaString ); $i ++) {
			imagettftext ( $image, 17, mt_rand ( - 10, 10 ), $i * 25 + 30, mt_rand ( 30, 40 ), $stringcolor, $this->getRandFont (), $this->CaptchaString {$i} );
		}
		$_SESSION['system']['captchastring'] = $this->getCaptchaString();
		imagepng ($image);
		imagedestroy($image);
	}
	
	function getCaptchaString() {
		return $this->CaptchaString;
	}
}
?>
