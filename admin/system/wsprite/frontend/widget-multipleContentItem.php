<?php 
$id = NULL;
$title = NULL;
$content = NULL;
$fileName = NULL;
$ok = false;
//print_r($data);
if (isset($data['multipleItemsTitle'])) {
	$title = $data['multipleItemsTitle'];
	$ok = true;
}
if (isset($data['content'])) {
	$content = $data['content'];
	$ok = true;
}
if (isset($data['fileName'])) {
	$fileName = $data['fileName'];
	$ok = true;
}
if (isset($data['multipleItemsIcon'])) {
	$multipleItemsIcon = $data['multipleItemsIcon'];
	//$ok = true;
}
else $multipleItemsIcon = 'http://widgetsprite.com/assets/sprite/img/lifeCoach.jpg';
$realId = NULL;
if ($ok) {
	$id = 'wi'.(int) $v->getId();
	$realId = (int) $v->getId();
}
else $id = 'multipleContentItem';
if ((bool) $realId || $id == 'multipleContentItem') {
?><li id="<?php echo $id; ?>" class="widgetItem">
<a href="" class="imgReplace upDownArrows">move</a>
<div>
    <a href="" class="closeWidget imgReplace">close</a>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="widgetID" value="<?php echo (int) $realId; ?>" />
        <fieldset>
            <legend>multipleContentItem</legend>
            <ul>
                <li>
                    <label for="multipleItemsTitle">Multiple Items Content Title</label>
                    <input type="text" name="multipleItemsTitle" id="multipleItemsTitle" class="required" value="<?php echo $title; ?>" />
                </li>
                <li>
                    <label for="multipleItemsIcon">Multiple Items Content Icon (Max icon size 40px * 40px)</label>
                    <input type="file" name="multipleItemsIcon" id="multipleItemsIcon" />
                    <img src="<?php echo $multipleItemsIcon; ?>" alt="" />
                </li>
                <li>
                    <label for="multipleItems">Multiple Items Content Excel (.xls) spreadsheet</label>
                    <input type="file" name="multipleItems" id="multipleItems" />
                </li>
                <li>Uploaded file: <strong class="fileUpdate"><?php echo $fileName; ?></strong></li>
                <li class="last">
                    <ul class="uploadDownload">
                        <li class="download">
                            <div class="blackButton">
                                <a href="<?php echo wgPaths::getUserfilesPath('url').'example-multicontent-widget-spreadsheet.xls'; ?>">
                                    <span>Download example XLS file</span>
                                </a>
                            </div>
                        </li>
                        <li class="upload">
                            <div class="blackButton regLoginButton">
                                <span><input type="submit" value="Update" /></span>
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
</li>
<?php } ?>