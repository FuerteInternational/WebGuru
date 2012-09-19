<?php
/**
 * Adding HTML/WYSIWYG editor to the page
 *
 * @package    WebGuru3
 * @subpackage init
 * @author     Ondrej Rafaj
 * @version    1.0.0.0
 * @since      17. October 2008
 */
if ($conf['admin']['editor'] != 'none') {
	$var['EDITOR'] = '
<script type="text/javascript" src="./thirdparty/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="./thirdparty/markitup/sets/html/set.js"></script>
<link rel="stylesheet" type="text/css" href="./thirdparty/markitup/skins/simple/style.css" />
<link rel="stylesheet" type="text/css" href="./thirdparty/markitup/sets/html/style.css" />
';
	
	if ($conf['admin']['editor'] == 'tiny_mce') $var['EDITOR'] .= '<script type="text/javascript" src="./thirdparty/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="./thirdparty/tiny_mce/full.js"></script>
';
	
	if ($conf['admin']['editor'] == 'markitup') $var['EDITOR'] .= '<script type="text/javascript" >
   $(document).ready(function() {
      $(".editor").markItUp(mySettings);
      $(".html").markItUp(mySettings);
   	});
</script>
';
	else $var['EDITOR'] .= '<script type="text/javascript" >
   $(document).ready(function() {
      $(".html").markItUp(mySettings);
	});
</script>
';
}
?>