<?php
/**
Tiny Upload

upload.php

This file does the uploading
*/
chdir('../../../');
require_once('./init/basic.php');
$absPthToSlf = basic::getPath('url').'admin/thirdparty/tiny_mce/upload/tinyupload.php'; //The Absolute path (from the clients POV) to this file.
$absPthToDst = basic::getPath('url').'userfiles/upload/'; //The Absolute path (from the clients POV) to the destination folder.
$absPthToDstSvr = basic::getPath().'userfiles/upload/'; //The Absolute path (from the servers POV) to the destination folder. You will need to set permissions for this dir 0777 worked ok for me.
require_once('fileupload.class.php');
if (!is_dir($absPthToDstSvr)) upload::mkdir_p($absPthToDstSvr);


function hasAccess(){
	/**
	If you need to do a securty check on your user here is where you should put the code.
	*/
	return true;
}

//###### You should not need to edit past this point ######
if($_GET["poll"]){
	$dh  = opendir($absPthToDstSvr);
	while (false !== ($filename = readdir($dh))) {
	  $files[] = $filename;
	}
	sort($files);
	
	//Filter out html files and directories.
	function filterHTML($var){
		if(is_dir($absPthToDstSvr . $var) or substr_count($var, '.html') > 0){
			return false;
		}
		else{
			return true;
		}
	}
	$files = array_filter($files, 'filterHTML');
	$str = '[';
	foreach ($files as $file){
		$str .= '{';
		$str .= '"url":"'. $absPthToDst . $file .'",';
		$str .= '"file":"'. $file .'"';
		$str .= '}, ';
	}
	$str .= ']';
	echo $str;
}
elseif (hasAccess()){

	if($_FILES['tuUploadFile']['tmp_name']){
		$target_path = $absPthToDstSvr. basename( $_FILES['tuUploadFile']['name']); 
		move_uploaded_file($_FILES['tuUploadFile']['tmp_name'], $target_path);
	}
?>
<html>
<head>
	<title>tinyupload</title>
<style type="text/css">
	body{
		font-size:10px;
		margin:0px;
		padding:0px;
		height:20px;
		overflow:hidden;
	}
</style>
<script type="text/javascript">
	window.onload = function(){
		parent.tuIframeLoaded();
	}
	function tuSmt(){
		var pathArray = document.getElementById('tuUploadFile').value.split('\\');
		filePath = '<?php echo $absPthToDst; ?>' + pathArray[pathArray.length -1];
		if(parent.tuFileUploadStarted(filePath, pathArray[pathArray.length -1])){
			window.document.body.style.cssText = 'border:none;padding-top:100px';
			document.getElementById('tuUploadFrm').submit();
		}
	}
	function changeFile(){
		document.getElementById('dummpFileInput').setAttribute('value', document.getElementById('tuUploadFile').value);
	}
</script>
</head>
<body style="border:none;">
	<form enctype="multipart/form-data" method="post" action="<?php echo $absPthToSlf; ?>" id="tuUploadFrm">
		<div style="height:22px;vertical-align:top;">
			<div style="position:relative;float:left;width:">
				<input type="file" size="20" style="height:22px;border:2px inset #000;opacity:0;position:relative;z-index:2;" id="tuUploadFile" name="tuUploadFile" onchange="javascript:changeFile();" />
				<input type="text" id="dummpFileInput" style="margin:0px 0px 20px 2px;border:1px solid #808080;background:#fff;height:20px;position:absolute;left:0px;top:0px;width:150px;z-index:1;" "/>
				<input type="button" value="Browse" id="dummpFileButton" style="margin:0px 0px 20px 2px;border:1px solid #808080;background:#fff;height:20px;position:absolute;left:152px;top:0px;z-index:1;" />
			</div>
			<input type="button" value="Go" onclick="javascript:tuSmt();" style="margin:0px 0px 20px 2px;border:1px solid #808080;background:#fff;height:20px;"/>
		</div>
	</form>
</body>
</html>
<?php
}
?>