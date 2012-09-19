<li id="multipleContentItem" class="widgetItem">
<a href="" class="imgReplace upDownArrows">move</a>
<div>
    <a href="" class="closeWidget imgReplace">close</a>
    <form action="{#ROOT}ajax/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="widgetID" value="<?php print $jqWidgetId; ?>" />
        <fieldset>
            <legend>multipleContentItem</legend>
            <ul>
                <li>
                    <label for="multipleItems">Multiple Items Content Title</label>
                    <input type="file" name="multipleItems" id="multipleItems" class="required" />
                </li>
                <li class="last">
                    <ul class="uploadDownload">
                        <li class="download">
                            <div class="blackButton">
                                <a href="">
                                    <span>Download</span>
                                </a>
                            </div>
                        </li>
                        <li class="upload">
                            <div class="blackButton regLoginButton">
                                <span><input type="submit" value="Upload" /></span>
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
</li>