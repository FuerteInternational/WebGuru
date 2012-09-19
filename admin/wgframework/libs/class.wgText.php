<?php

class wgText {
	
	public static function doFilter($text) {
		$text = trim(strip_tags($text));
		$text = str_ireplace("\n", ' ', $text);
		$text = str_ireplace("\r", ' ', $text);
		$text = str_ireplace("\t", ' ', $text);
		return preg_replace("/[ ]+/", ' ', $text);
	}
	
	public static function safeText($text, $parameters=NULL) {
		return valid::safeText($text, $parameters);
	}
	
	public static function secureSql($text) {
		return self::secureSingleQuotes($text);
	}
	
	public static function secureSingleQuotes($text) {
		return preg_replace('/\'/', "\\'", $text);
	}
	
	public static function secureDoubleQuotes($text) {
		return preg_replace('/\"/', '\\"', $text);
	}
	
	public static function encodeJsonText($text) {
		//$text = utf8_decode($text);
		$text = self::secureDoubleQuotes($text);
		$text = str_ireplace("\r", '\\r', $text);
		$text = str_ireplace("\n", '\\n', $text);
		//$text = preg_replace("/[ ]+/si", " ", $text);
		return $text;
	}
	
	public static function eregi($find, $str) {
		return stristr($str, $find);
    }
	
	public static function ereg($find, $str) {
		return strstr($str, $find);
    }
	
	public static function noHtmlAndEncodeBasics($text) {
		$text = strip_tags($text);
		$text = nl2br($text);
		return $text;
	}
	
	public static function safeName($text) {
		$text = self::safeText($text);
		$parts = explode('-', $text);
		foreach ($parts as $k=>$v) $parts[$k] = ucfirst($v);
		return implode(' ', $parts);
	}
	
	public static function safeFile($text) {
		$text = self::safeText($text, 'file');
		//$parts = explode('-', $text);
		//foreach ($parts as $k=>$v) $parts[$k] = ucfirst($v);
		//return implode(' ', $parts);
		return $text;
	}
	
	public static function getKeywordsArray($text) {
		$text = strtolower(self::doFilter($text));
		$arr = explode(' ', $text);
		$new = array();
		foreach ($text as $word) if (strlen($word) > 2) {
			if (isset($new[$word])) $new[$word]++;
			else $new[$word] = 1;
		}
		return $new;
	}
	
	public static function getTopKeywords($keywordArray, $limit=100) {
		$limit = (int) $limit;
		if (!(bool) $limit) $limit = 100;
		arsort($keywordArray);
		$x = 0;
		$new = array();
		foreach ($keywordArray as $word=>$num) {
			$new[] = $word;
			$x++;
			if ($x >= $limit) continue;
		}
		return $new;
	}
	
	public static function safeXmlText($text) {
		return htmlspecialchars(trim($text));
	}
	
	public static function lowercase($text) {
		return strtolower(trim($text));
	}
	
	public static function uppercase($text) {
		return strtoupper(trim($text));
	}
	
	public static function ucfirst($text) {
		return ucfirst(trim($text));
	}
	
	public static function decodeTemplate($text) {
		$text = str_ireplace('&', '&amp;', $text);
		$text = valid::decodeTemp(valid::decodeHTML($text));
		$text = str_ireplace('</textarea>', '&lt;/textarea&gt;', $text);
		return $text;
	}
	
	public static function cutText($text, $lenght) {
		return valid::cutText($text, $lenght);
	}
	
	/**
	 * @name getTextKeywords
	 * 
	 * Extract the keywords from the content string and return the keywords string
	 * 
	 * @param string $content
	 * @param int $minLength
	 * @param int $headingWeight
	 * @param int $linksWeight
	 * @param int $numberOfKeywords
	 * 
	 * @return string Keywords (comma separated)
	 * 
	 * @copyright remco verton <info@seomagnifier.com> 
	 * @copyright Visit http://seomagnifier.com for more free php scripts
	 */
	public static function getTextKeywords($content, $minLenght, $headingWeight, $linksWeight, $numberOfKeywords){
	    // minimum lenght a keyword must have
	    $keywordArray = array();
	    
	    //Count the link keywords
	    $links = array();
	    preg_match_all('#<a.*?>(.*?)</a.*?>#s',$content,$links);        
	    foreach($links[1] as $key =>$value){
	        $keywords = explode(' ',strip_tags($value));
	        foreach($keywords as $id => $keyword){
	            // Get the alpha numeric value for the keyword
	            $keyword = preg_replace('/[^[:alpha:]]/', '', $keyword);
	            if(strlen($keyword) >= $minLenght){
	                if(!array_key_exists($keyword,$keywordArray)){
	                    $keywordArray[$keyword] = $linksWeight;
	                }
	                else{
	                    $keywordArray[$keyword] += $linksWeight;
	                }
	            }
	        }
	    }
	    //Count the heading keywords
	    $headings = array();
	    preg_match_all('#<h(.*?)>(.*?)</h.*?>#s',$content,$headings);
	    foreach($headings[2] as $key =>$value){
	        $keywords = explode(' ',strip_tags($value));
	        foreach($keywords as $id => $keyword){
	            // Get the alpha numeric value for the keyword
	            $keyword = preg_replace('/[^[:alpha:]]/', '', $keyword);            
	            if(strlen($keyword) >= $minLenght){
	                $divider = (int)$headings[1][$key];
	                if($headingNumber == 0)$headingNumber = 1;
	                if(!array_key_exists($keyword,$keywordArray)){
	                    $keywordArray[$keyword] = $headingWeight/$headingNumber;
	                }
	                else{
	                    $keywordArray[$keyword] += $headingWeight/$headingNumber;
	                }
	            }
	        }
	    }
	    // Count the text keywords including the heading and link texts!
	    // Meaning these are counted double once with a rating of 1 and once with the rating set for them!
	    $text = str_ireplace(array('/',"\n",'<br />','<br/>'),' ',$content);
	    $text = strip_tags($text);
	    $keywords = explode(' ',$text);
	    foreach($keywords as $key => $keyword){
	        // Get the alpha numeric value for the keyword
	        $keyword = preg_replace('/[^[:alpha:]]/', '', $keyword);
	        if(strlen($keyword) >= $minLenght){
	            if(!array_key_exists($keyword,$keywordArray)){
	                $keywordArray[$keyword] = 1;
	            }
	            else{
	                $keywordArray[$keyword] += 1;
	            }
	        }
	    }
	    // Sort the keywords
	    arsort($keywordArray);
	    // Take only the number of keywords set in the config
	    $keywordArray = array_slice($keywordArray,0,$numberOfKeywords);
	    return strtolower(implode(', ',array_keys($keywordArray)));
	} 
	
}

?>