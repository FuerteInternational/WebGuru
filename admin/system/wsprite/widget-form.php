<?php
$v = WspriteWidgetsModel::getOneSelfData((int) wgGet::getValue('edit'));
//$v = new WspriteWidgetsModel();
?><h1 class="leftHeader">Settings for <?php echo $v->getName(); ?></h1>

<?php 
$jqWidgetId = (int) $v->getId();
print "<span id=\"jqWidgetId\">".$jqWidgetId."</span>";
//print serialize(array('twitterName'=>'xprogresscom', 'twitterPassword'=>'aaaaaa'));
?>
<div id="leftWidgetItemHolder">
	<ul id="widgetHolder">
	   	<?php
		$arr = WspriteItemsModel::getSelfData($jqWidgetId);
		//print_r($arr);
		//$v = new WspriteItemsModel();
		foreach ($arr as $v) {
			$data = unserialize($v->getW2());
			if ($v->getW1() == 1) include('widget-twitterItem.php');
			if ($v->getW1() == 2) include('widget-singleContentItem.php');
			if ($v->getW1() == 3) include('widget-multipleContentItem.php');
			if ($v->getW1() == 4) include('widget-buttonItem.php');
			if ($v->getW1() == 5) include('widget-imageLogoItem.php');
			
		}
		$data = NULL;
		$arr = NULL;
		$v = NULL;
		?>
	</ul>
	
	<!-- Hidden for cloning -->
	
	<ul id="widgetHolderHidden">
		<?php
	    	include('widget-singleContentItem.php');
	        include('widget-multipleContentItem.php');
	        include('widget-twitterItem.php');
	        include('widget-buttonItem.php');
	        include('widget-imageLogoItem.php');
	    ?>
	</ul>
                
                <!-- Hidden for cloning -->
        <ul id="bottomWidgetButtons">
            <li id="manageBtn">
                <a href="" class="whiteGradButton"><span><em>+</em> Add a new content item</span></a>
                <ul>
                    <li><a href="#twitterItem">+ Add a Twitter item</a></li>
                    <li><a href="#multipleContentItem">+ Add a multiple content item</a></li>
                    <li><a href="#singleContentItem">+ Add a single content item</a></li>
                    <li><a href="#buttonItem">+ Add a button item</a></li>
                    <li><a href="#imageLogoItem">+ Add an image or Logo item</a></li>
                </ul>
            </li>
            <!--<li class="greenButton">
                <a href=""><span>Publish Widget</span></a>
            </li>-->
        </ul>
    </div>
    <div id="actualWidgetHolder">
        <label for="embedCode">Embed Code</label>
        <input type="text" name="embedCode" id="embedCode" onclick="this.select();" value="&lt;script type='text/javascript' src='http://widgetsprite.com/ajax/front-end-sprite.php?id=<?php echo (int) $_GET['edit']; ?>'&gt;&lt/script&gt;" />
        <!--<input type="text" name="embedCode" id="embedCode" value="http://widgetsprite.com/ajax/preview-sprite.php?id=<?php echo (int) $_GET['edit']; ?>" />-->
        
        
        <div id="jsWidgetSprite">
			<script id="widgetSpriteScript" type="text/javascript">
			$('#jsWidgetSprite').load('http://widgetsprite.com/ajax/preview-sprite.php?id=<?php print $jqWidgetId; ?>');
			</script>
        </div>
    </div>
    <div class="clear"></div>
</div>
