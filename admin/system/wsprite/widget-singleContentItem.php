<?php 
$id = NULL;
$title = NULL;
$text = NULL;
$link = NULL;
$url = NULL;
$ok = false;
//print_r($data);
if (isset($data['contentTitle'])) {
	$title = $data['contentTitle'];
	$ok = true;
}
if (isset($data['contentBody'])) {
	$text = $data['contentBody'];
	$ok = true;
}
if (isset($data['linkText'])) {
	$link = $data['linkText'];
	$ok = true;
}
if (isset($data['linkURL'])) {
	$url = $data['linkURL'];
	$ok = true;
}
$realId = NULL;
if ($ok) {
	$id = 'wi'.(int) $v->getId();
	$realId = (int) $v->getId();
}
else $id = 'singleContentItem';
?><li id="<?php echo $id; ?>" class="widgetItem">
    <a href="" class="imgReplace upDownArrows">move</a>
    <div>
        <a href="" class="closeWidget imgReplace">close</a>
        <form action="{#ROOT}ajax/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="widgetID" value="<?php echo (int) $realId; ?>" />
            <fieldset>
                <legend>singleContentItem</legend>
                <ul>
                    <li>
                        <label for="contentTitle">Content Title</label>
                        <input type="text" name="contentTitle" id="contentTitle" class="required" value="<?php echo $title;?>" />
                    </li>
                    <li>
                        <label for="contentBody">Content Body</label>
                        <textarea name="contentBody" id="contentBody" cols="55" rows="2" class="required"><?php echo $text;?></textarea>
                    </li>
                    <li>
                        <label for="linkText">Link Text</label>
                        <input type="text" name="linkText" id="linkText" class="required" value="<?php echo $link;?>" />
                    </li>
                    <li class="last">
                        <label for="linkURL">Link URL</label>
                        <input type="text" name="linkURL" id="linkURL" class="required" value="<?php echo $url;?>" />
                    </li>
                    <li class="blackButton regLoginButton">
                        <span><input type="submit" value="update" /></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</li>