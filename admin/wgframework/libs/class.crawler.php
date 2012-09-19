<?php
require_once('HTTP/Request.php');

class crawler {
	
	private $data = array();
	private $url = NULL;
	
	// class constructor
	public function __construct() {
		$this->data = array();
	}
	
	// gets all results from website
	public function getResult($url) {
		$html = $this->getPage($url);
		$this->url = $url;
		$html['data'] = $this->prepareHtml($html['data']);
		$this->stripTags($html['data']);
		$this->getHeaders($html['data']);
		$this->getLinks($html['data']);
		$this->getImages($html['data']);
		$this->getCss($html['data']);
		return $this->data;
	}
	
	// clear data variable
	public function clear() {
		$this->data = array();
	}
	
	// strip tags & return plain text
	public function stripTags($html) {
		$this->data['plain'] = $html;
		$this->data['plain'] = str_ireplace('><', '> <', $html);
		$this->data['plain'] = preg_replace("/<br.*?>/si", ' ', $this->data['plain']);
		$this->data['plain'] = preg_replace("/<script.*?>.*?<\/script>/si", ' ', $this->data['plain']);
		$this->data['plain'] = strip_tags($this->data['plain']);
		$this->data['plain'] = str_ireplace('&nbsp;', ' ', $this->data['plain']);
		$this->data['plain'] = preg_replace("/[[:space:]]+/", ' ', $this->data['plain']);
		return $this->data['plain'];
	}
	
	// prepare url for use
	public function prepareUrl($url) {
//		if (eregi('..', $url)) {
//			$purl = parse_url($url);
//			$sl = explode('/', $purl['path']);
//			$dt = explode('..', $purl['path']);
//			print_r($purl);
//			print '<br />';
//			print_r($sl);
//			print '<br />';
//			print_r($dt);
//			print '<br />';
//			$c = (count($dt)-1);
//			print $c.'<br />';
//			print '<br /><br /><br />';
//		}
		return $url;
	}
	
	// returns content of the page, url & response code
	public function getPage($url, $post=array(), $red=0) {
		$this->url = NULL;
		$url = $this->prepareUrl($url);
		$req = &new HTTP_Request($url);
		if (!empty($post) && is_array($post)) {
			$req->setMethod(HTTP_REQUEST_METHOD_POST);
			$req->addPostData('Foo', 'bar');
		}
		else $req->setMethod(HTTP_REQUEST_METHOD_GET);
		$req->sendRequest();
//		if (PEAR::isError($req)) if ((bool) DEBUGGER) wgError::add($req->getMessage());	
//		else {
			$this->data = $req->getResponseHeader();
			$this->data['url'] = $req->getUrl(1);
			$this->data['code'] = (int) $req->getResponseCode();
			if ($this->data['code'] == 301 && $red < 15 && !empty($this->data['location'])) return $this->getPage($this->data['location'], $post, ($red+1));
			elseif ($this->data['code'] == 200) $this->data['url'] = $this->getLinkInfo($this->data['url']);
			else $this->data['url']['main'] = $this->data['url'];
			$this->data['cookies'] = $req->getResponseCookies();
			$this->data['data'] = $req->getResponseBody();
			return $this->data;
//		}
	}
	
	// strips new lines from html
	public function prepareHtml($html) {
		$html = str_ireplace("\n", '', $html);
		$html = str_ireplace("\r", '', $html);
		$this->data['data'] = $html;
		return $html;
	}
	
	// returns info about link
	public function getLinkInfo($link) {
		$info = parse_url($link);
		$info['main'] = $link;
		$this->data['url'] = $info;
		return $info;
	}
	
	// returns title, h1, meta keywords & meta description
	public function getHeaders($html) {
		$arr = array();
		preg_match('/<title>(.*)<\/title>/si', $html, $arr);
		if (isset($arr[1])) $this->data['title'] = strip_tags($arr[1]);
		preg_match('/<h1.*?>(.*)<\/h1>/si', $html, $arr);
		if (isset($arr[1])) $this->data['h1'] = strip_tags($arr[1]);
		preg_match('/<meta.*?name=[\"|\']description[\"|\'].*?content=[\"|\'](.*?)[\"|\'].*?>/si', $html, $arr);
		if (isset($arr[1])) $this->data['description'] = strip_tags($arr[1]);
		preg_match('/<meta.*?name=[\"|\']keywords[\"|\'].*?content=[\"|\'](.*?)[\"|\'].*?>/si', $html, $arr);
		if (isset($arr[1])) $this->data['keywords'] = strip_tags($arr[1]);
		return $this->data;
	}
	
	// return css url
	public function getCss($html) {
		preg_match_all('/<link.*?rel=[\"|\']stylesheet[\"|\'].*?href=[\"|\'](.*?)[\"|\'].*?>/si', $html, $arr);
		$this->data['css'] = $arr[1];
		return $this->data;
	}
	
	private function mergeUrls($url1, $url2) {
		//return $url2;
		if (eregi('./', $url1)) return $url1.$url2;
		else {
			$parts = explode('/', $url1);
			$count = (int) count($parts);
			if ($count > 1) {
				if (empty($parts[$count-1])) unset($parts[$count-1]);
			}
			$parts[] = $url2;
			return implode('/', $parts);
		}
	}
	
	// return all links from website with content & title
	public function getLinks($html) {
		$arr = array();
		$new = array();
		preg_match_all("/<a.*?href=[\"|\'](.*?)[\"|\'](.*?)>(.*?)\<\/a\>/si", $html , $arr);
		foreach($arr[1] as $key=>$href) {
			$href = trim($href);
			if($href != "#" && !eregi('javascript|;', $href)) {
				if (eregi('mailto', $href)) $this->data['mails'][] = array(trim(str_ireplace('mailto:', '', $href)), $href);
				else {
					$ta = array();
					preg_match('/.*title=[\"|\'](.*?)[\"|\']/si', $arr[2][$key], $ta);
					if ((bool) $this->url) if (!preg_match('/http.*?/i', $href) && !preg_match('/ftp.*?/i', $href)) {
						$href = $this->mergeUrls($this->url, $href);
					}
					$this->data['links'][] = array($href, strip_tags($arr[3][$key]), (isset($ta[1]) ? $ta[1] : NULL));
				}
			}
		}
		return $new;
	}
	
	// return all images from website with alt
	public function getImages($html) {
		$arr = array();
		$new = array();
		preg_match_all("/<img.*?src=[\"|\'](.*?)[\"|\'](.*?)>/si", $html , $arr);
		foreach($arr[1] as $key=>$src) {
			$src = trim($src);
			if($src != "#" && !empty($src)) {
				$ta = array();
				preg_match('/.*alt=[\"|\'](.*?)[\"|\']/si', $arr[2][$key], $ta);
				$this->data['images'][] = array($src, $ta[1]);
			}
		}
		return $new;
	}
	
}
?>