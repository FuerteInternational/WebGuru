<?php
/**
 * Generate class for module TinyUrl
 * 
 * @package      WebGuru3
 * @subpackage   modules/tinyurl/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        25. June 2009
 */

		
class generateTinyurl {
		
	public function __construct() {
		
	}
	
public function generateCode($p) {
		//print ':-)';
		if (isset($p[3]) && !empty($p[3])) $var = $p[3];
		else $var = 'u';
		$data = array();
		$data['modules'][] = 'tinyurl';
		$data['pretext'] = 'if (isset($_GET[\''.$var.'\'])) {
	$url = TinyurlsUrlsModel::getUrlById($_GET[\''.$var.'\']);
	if ((bool) $url) {
		if (moduleTinyurl::previewEnabled()) {
			TinyurlsUrlsModel::addPreview($_GET[\''.$var.'\']);
			moduleTinyurl::goToPreviewPage($_GET[\''.$var.'\']);
		}
		else {
			TinyurlsUrlsModel::addClick($_GET[\''.$var.'\']);
			moduleTinyurl::doRedirect($url);
		}
	}
}';
		$data['content'] = '';
		return $data;
	}
	
	public function generateApi($p) {
		if (isset($p[3]) && !empty($p[3])) $var = $p[3];
		else $var = 'url';
		$data = array();
		//$data['modules'][] = '';
		$data['pretext'] = '$url = wgSystem::getRequestValue(\''.$var.'\');
echo (int) TinyurlsUrlsModel::createUrl($url);
exit();';
		$data['content'] = '';
		return $data;
	}
	
	public function generateForm($p) {
		$data = array();
		$data['content'] = '<div id="messages"></div>
<form action="" method="post" id="formConvert">
    <p>
        <label for="curl">Your long url</label>
        <textarea cols="50" rows="9" name="curl" id="curl"><?php if (isset($_POST[\'curl\'])) echo $_POST[\'curl\']; ?></textarea>
    </p>
    <p id="tinyurlWrap">Your new URL is:<br /><strong>{#WEBROOT}u<span id="tinyurl"></span>/</strong><br /><input type="text" name="turl" id="turl" value="" ?></p>
    <p>
        <button type="submit" onclick="return generateUrl($(\'#curl\').val());"><span>Create a short URL</span></button>
    </p>
    <!--<p>
        <button type="button" onclick="return togglePreview();"><span id="tinyurlPrev">Toggle preview</span></button>
    </p>-->
</form>';
		return $data;
		
	}
	
	
}
?>