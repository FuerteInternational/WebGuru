<?php
/**
 * Validation
 *
 * @package    WebGuru3
 * @subpackage libs
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      16. October 2008
 */

class valid {
	
   /**
    * Converts all special characters including spaces to - (dash/high fan) 
    * output is lowecased
    * 
    * @name safeText
    * @param string text Text to convert
    * @param string par Type of input
    * @return string Converted text
    */
	function safeText($text, $par=NULL) {
		$text = trim($text);
		$badtext  = 'ěščřžýáíéúůüňöäĺĚŠČŘŽÝÁÍÉÚÙŮŇĹABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$goodtext = 'escrzyaieuuunoalescrzyaieuuunlabcdefghijklmnopqrstuvwxyz';
		$badtext  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$goodtext = 'abcdefghijklmnopqrstuvwxyz';
		$altext   = 'abcdefghijklmnopqrstuvwxyz1234567890_'; 
		if ($par == 'file') {
			$goodtext .= '.';
			$badtext .= '.';
		}
		if ($par=='dir') {
			$goodtext .= '/.';
			$badtext .= '/.';
		}
		if ($par=='email') {
			$goodtext .= '.@0';
			$badtext .= '.@0';
		}
		$text = strtr($text, $badtext, $goodtext);
		$ltext = strlen($text);
		for ($i=0; $i < $ltext; $i++) if (!strstr($altext, $text[$i])) {
			if(isset($goodtext[strpos($badtext, $text[$i])]) && strstr($badtext, $text[$i])) $text[$i] = $goodtext[strpos($badtext, $text[$i])];
			else $text[$i]="-";
		}
		return preg_replace("/[-]+/", "-", trim($text, "-"));
	}
	
	public static function validateExtension($filename, $extensions=array()) {
		if (empty($filename)) return false;
		$info = pathinfo($filename);
		if (!in_array(strtolower($info['extension']), $extensions)) return false;
		else return true;
	}
	
   /**
    * Get IP of the actual user
    * 
    * @name getUserIp
    * @return string User IP
    */
	public function getUserIp() {
		return wgIpTools::getUserIp();
	}
	
   /**
    * Check if the Email address is valid
    * 
    * @name validMail
    * @param string email Email address
    * @return bool If email is valit than true, othervive false 
    */
	public function validMail($email) {
		$mailparts=explode("@",$email);
		$hostname = $mailparts[1];
		$exp = "^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$";
		$valid_syntax=eregi($exp, $email);
		if (eregi($exp, $email) == 1) return true;
		else return false;
	}
	
   /**
    * Decode sharp brackets from HTML ( < / > ) to entities
    * 
    * @name decodeHTML
    * @param string text Text to convert
    * @return string Converted text
    */
	public function decodeHTML($text) {
		if (empty($text)) return NULL;
		$text = str_replace("<", "&lt;", $text);
		$text = str_replace(">", "&gt;", $text);
		$text = str_replace('"', "&quot;", $text);
		return $text;
	}
	
   /**
    * Encode entities to sharp brackets from HTML ( < / > )
    * 
    * @name encodeHTML
    * @param string text Text to convert
    * @return string Converted text
    */
	public function encodeHTML($text) {
		if (empty($text)) return NULL;
		$text = str_replace("&lt;", "<",$text);
		$text = str_replace("&gt;", ">",$text);
		$text = str_replace("&quot;", '"',$text);
		return $text;
	}
	
   /**
    * Decode curly brackets ( { / } ) to entities
    * 
    * @name decodeTemp
    * @param string text Text to convert
    * @return string Converted text
    */
	public function decodeTemp($text) {
		if (empty($text)) return NULL;
		$text = str_replace("}", "&#125;", $text);
		$text = str_replace("{", "&#123;", $text);
		return $text;
	}
	
   /**
    * Encode entities to curly brackets ( { / } )
    * 
    * @name encodeTemp
    * @param string text Text to convert
    * @return string Converted text
    */
	public function encodeTemp($text) {
		if (empty($text)) return NULL;
		$text = str_replace("&#125;", "}", $text);
		$text = str_replace("&#123;", "{", $text);
		return $text;
	}
	
   /**
    * Checks maximal lenght of all words in the string
    * 
    * @name checkLenght
    * @param string text Text to check
    * @param int max_size Maximal lenght of the one word in the string
    * @return string Checked text
    */
	public function checkLenght($text, $maxsize=25) {
		if (empty($text)) return false;
		for ($c = 0, $a = 0, $g = 0; $c < strlen($text); $c++) {
			$d[$c+$g] = $text[$c];
			if ($text[$c] != ' ') $a++;
			elseif ($text[$c] == ' ') $a = 0;
			if ($a == $maxsize) {
				$g++;
				$d[$c+$g] = ' ';
				$a = 0;
			}
		}
		return implode('', $d);
	}
	
   /**
    * If the text longer than $limit, cuts the rest after the last word and puts '...' (three dots) 
    * on the end of the string 
    * 
    * @name cutText
    * @param string text Text to cut
    * @param int limit Maximal number of letters in the output string
    * @return string Checked text
    */
	public static function cutText($text, $limit) {
		if (strlen($text) <= $limit) $text = $text; 
		else { 
			$text = substr($text, 0, $limit+1); 
			$pos = strrpos($text, ' ');
			$text = substr($text, 0, ($pos ? $pos : -1)) . ' ...'; 
		}
		return $text;
	}

}

?>