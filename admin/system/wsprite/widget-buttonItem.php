<?php 
$id = NULL;
$text = NULL;
$url = NULL;
$ok = false;
//print_r($data);
if (isset($data['linkButtonText'])) {
	$text = $data['linkButtonText'];
	$ok = true;
}
if (isset($data['linkButtonURL'])) {
	$url = $data['linkButtonURL'];
	$ok = true;
}
$realId = NULL;
if ($ok) {
	$id = 'wi'.(int) $v->getId();
	$realId = (int) $v->getId();
}
else $id = 'buttonItem';
?><li id="<?php echo $id; ?>" class="widgetItem">
    <a href="" class="imgReplace upDownArrows">move</a>
    <div>
        <a href="" class="closeWidget imgReplace">close</a>
        <form action="{#ROOT}ajax/update.php" method="post">
            <input type="hidden" name="widgetID" value="<?php echo (int) $realId; ?>" />
            <fieldset>
                <legend>buttonItem</legend>
                <ul>
                    <li>
                        <label for="linkButtonText">Link Button Text</label>
                        <input type="text" name="linkButtonText" id="linkButtonText" class="required" value="<?php echo $text;?>" />
                    </li>
                    <li class="last">
                        <label for="linkButtonURL">Link Button URL</label>
                        <input type="text" name="linkButtonURL" id="linkButtonURL" class="required" value="<?php echo $url;?>" />
                    </li>
                    <li class="blackButton regLoginButton">
                        <span><input type="submit" value="update" /></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</li>