<?php 
$id = NULL;
$title = NULL;
$name = NULL;
$pass = NULL;
$ok = false;
if (isset($data['twitterTitle'])) {
	$title = $data['twitterTitle'];
	$ok = true;
}
if (isset($data['twitterName'])) {
	$name = $data['twitterName'];
	$ok = true;
}
if (isset($data['twitterPassword'])) {
	$pass = $data['twitterPassword'];
	$ok = true;
}
$realId = NULL;
if ($ok) {
	$id = 'wi'.(int) $v->getId();
	$realId = (int) $v->getId();
}
else $id = 'twitterItem';
?>
<li id="<?php echo $id; ?>" class="widgetItem">
    <a href="#" class="imgReplace upDownArrows">move</a>
    <div>
        <a href="" class="closeWidget imgReplace">close</a>
        <form action="{#ROOT}ajax/update.php" method="post">
            <input type="hidden" name="widgetID" value="<?php echo (int) $realId; ?>" />
            <fieldset>
                <legend>twitterItem</legend>
                <ul>
                    <li>
                        <label for="twitterTitle">Twitter Title</label>
                        <input type="text" name="twitterTitle" id="twitterTitle" class="required" value="<?php echo $title;?>" />
                    </li>
                    <li>
                        <label for="twitterName">Twitter Name</label>
                        <input type="text" name="twitterName" id="twitterName" class="required" value="<?php echo $name;?>" />
                    </li>
                    <li>
                        <label for="twitterIcon">Twitter Icon (Max icon size 48px * 48px)</label>
                        <input type="file" name="twitterIcon" id="twitterIcon" />
                        <img src="<?php echo $twitterIcon; ?>" alt="" />
                    </li>
                    <!--<li class="last">
                        <label for="twitterPassword">Twitter Password</label>
                        <input type="text" name="twitterPassword" id="twitterPassword" class="required" value="<?php echo $pass;?>" />
                    </li>-->
                    <li class="blackButton regLoginButton">
                        <span><input type="submit" value="update" /></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</li>

