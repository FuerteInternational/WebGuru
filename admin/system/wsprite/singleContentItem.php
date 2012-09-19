<li id="singleContentItem" class="widgetItem">
    <a href="" class="imgReplace upDownArrows">move</a>
    <div>
        <a href="" class="closeWidget imgReplace">close</a>
        <form action="{#ROOT}ajax/update.php" method="post">
            <input type="hidden" name="widgetID" value="<?php print $jqWidgetId; ?>" />
            <fieldset>
                <legend>SingleContentItem</legend>
                <ul>
                    <li>
                        <label for="contentTitle">Content Title</label>
                        <input type="text" name="contentTitle" id="contentTitle" class="required" />
                    </li>
                    <li>
                        <label for="contentBody">Content Body</label>
                        <textarea name="contentBody" id="contentBody" cols="55" rows="2" class="required"></textarea>
                    </li>
                    <li>
                        <label for="linkText">Link Text</label>
                        <input type="text" name="linkText" id="linkText" class="required" />
                    </li>
                    <li class="last">
                        <label for="linkURL">Link URL</label>
                        <input type="text" name="linkURL" id="linkURL" class="required" />
                    </li>
                    <li class="blackButton regLoginButton">
                        <span><input type="submit" value="update" /></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</li>