<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{$lang_emotions_title}</title>
	<script language="javascript" type="text/javascript" src="../../tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="jscripts/functions.js"></script>
	<base target="_self" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body style="display: none">
	<div align="center">
		<div class="title">{$lang_emotions_title}:<br /><br /></div>
<?php 
print("<tr><td><form name='form' method='post' action='emotions.php'>Catgorie&nbsp;:&nbsp;&nbsp;<select name='catego' id='catego' onChange=\"javascript:form.gogo.click()\">");
chdir('images');
$i=0;
//La liste box a t dj utilise
if( isset($_POST['catego']) )
{
	//listbox
	$doss=$_POST['catego'];
	$rep=opendir('.');
	print("<option value=''>Hlavní</option>");
	while ($file = readdir($rep)){
		if($file != '..' && $file !='.' && $file !=''){ 
			if (is_dir($file)){
				if ($file==$doss) {
					print("<option value='$file' selected='selected'>$file</option>");
				}else{
					print("<option value='$file'>$file</option>");
				}
			}
		}
	}
	closedir($rep);
	//chargement des images
	if ($doss!='')
	{
		chdir("images/" . $doss);
		$rep=opendir($doss);
	}
	else
	{
		chdir("images");
		$rep=opendir('.');
	}
	for ($x=0;$x<=$i-1;$x++)
	{
		$emoti[$x]="";
	}
	while ($file = readdir($rep))
	{
		if($file != '..' && $file !='.' && $file !='')
		{ 
			if (is_dir($file))
			{
				// heu rien :p				
			}
			else
			{
				if (strtoupper(substr($file,-3))=="GIF" || strtoupper(substr($file,-3))=="JPG" || strtoupper(substr($file,-3))=="PNG")
				{
					$emoti[$i]=$file;
					$nomemo[$i]=substr_replace ($file,'',-4);
					$i++;
				}
				
			}
		}
	}
	closedir($rep);
}
//Premier chargement
else
{
	$rep=opendir('.');
	print("<option value='' selected='selected'>Hlavní</option>");
	while ($file = readdir($rep))
	{
		if($file != '..' && $file !='.' && $file !='')
		{ 
			if (is_dir($file))
			{
				print("<option value='$file'>$file</option>");
			}
			else
			{
				if (strtoupper(substr($file,-3))=="GIF" || strtoupper(substr($file,-3))=="JPG" || strtoupper(substr($file,-4))=="JPEG" || strtoupper(substr($file,-3))=="PNG")
				{
					$emoti[$i]=$file;
					$nomemo[$i]=substr_replace ($file,'',-4);
					$i++;
				}
				
			}
		}
	}
	closedir($rep);
}
print("</select><input type='submit' name='gogo' id='gogo' value='Go!' style='visibility:hidden' /></forme></td></tr><table><tr>");
clearstatcache();
//affichage
$y=0;
for ($x=0;$x<=$i-1;$x++)
   {
   $lien = urlencode($doss);
   if ($lien!='')
{
	$lien=$lien . "/";
}

   $lien = $lien . urlencode($emoti[$x]);
   $lien = str_replace ("+","%20",$lien);
		print("<td><a href=\"javascript:insertEmotion('" . rawurlencode($lien) . "&quot; alt=&quot;" . $nomemo[$x] . " &quot; title=&quot;" . $nomemo[$x] . " &quot; ','');\"><img src='images/" . $lien . "' border='0' alt='" . $nomemo[$x] . "' title='" . $nomemo[$x] . "' /></td><td width='25'>&nbsp;&nbsp;</a></td>");
		$y++;
		if ($y==4)
		{
			 print("</tr><tr><td height='20'>&nbsp;&nbsp;</td></tr><tr>");
			 $y=0;
		}
   }
print("</tr></table>");
?>
	</div>
</body>
</html>
