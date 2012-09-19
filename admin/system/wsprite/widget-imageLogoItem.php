<?php 
$id = NULL;
$logo = NULL;
$alt = NULL;
$url = NULL;
$ok = false;
//print_r($data);
if (isset($data['imageLogo'])) {
	$logo = $data['imageLogo'];
	$ok = true;
}
if (isset($data['imageAltText'])) {
	$alt = $data['imageAltText'];
	$ok = true;
}
if (isset($data['url'])) {
	$url = $data['url'];
	$ok = true;
}
else $url = '#';
$realId = NULL;
if ($ok) {
	$id = 'wi'.(int) $v->getId();
	$realId = (int) $v->getId();
}
else $id = 'imageLogoItem';
//print_r($v);
?><li id="<?php echo $id; ?>" class="widgetItem">
    <a href="" class="imgReplace upDownArrows">move</a>
    <div>
        <a href="" class="closeWidget imgReplace">close</a>
        <form action="{#ROOT}ajax/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="widgetID" value="<?php echo (int) $realId; ?>" />
            <fieldset>
                <legend>imageLogoItem</legend>
                <ul>
                    <!--<li>
                        <label for="imageLogo">Image / Logo</label>
                        <input type="text" name="imageLogo" id="imageLogo" class="required" value="<?php echo $logo;?>" />
                    </li>-->
                    <li class="last">
                        <label for="imageFile">Image File</label>
                        <input type="file" name="imageFile" id="imageFile" />
                    </li>
                    <li>
                        <label for="imageAltText">Image Alt Text</label>
                        <input type="text" name="imageAltText" id="imageAltText" class="required" value="<?php echo $alt;?>" />
                    </li>
                    <!--<li>Give us a link to the picture</li>-->
                    <li>
                        <label for="imageLinkURL">URL link</label>
                        <!--<input type="text" name="imageLinkURL" id="imageLinkURL" value="<?php echo $url;?>" />-->
                        <input type="text" name="url" id="url" value="<?php echo $url;?>" />
                    </li>
                    <!--<li>Or upload a file</li>-->
                    <li class="blackButton regLoginButton">
                        <span><input type="submit" value="update" /></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</li>