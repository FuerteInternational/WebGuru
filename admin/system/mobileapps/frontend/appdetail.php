<?php

if ($mobileAppId) {
	$arr = MobileappsModel::getSelfDataForIdentifier($mobileAppId);
	$app = MobileappsModel::getItemGeneralItemInfo($mobileAppId);
	
	$space = (69 + 24) * $selectedItem;
	$space -= (250 * count($arr));
	if ($space < 0) $space = 0;
	
?>
<script type="text/javascript">

function toggleEdit(element) {
	$('#' + element).toggle("fast", function() {
		
	});
	return false;
}

function clickUploadButton() {
	$('#ipaFile').click();
	return false;
}

function startUploadingApp() {
	$('#uploadIpaFileButton').hide();
	$('#infoText').show("slow");
	$('#submitIpaButton').click();
}

function togglePopupWindow() {
	$('.popupWindowShadow').toggle("slow", function() {
		if ($('.popupWindowShadow').is(':visible') == true) {
			$('.popupWindow').show("slow", function() {
			
			});
		}
		else {
			$('.popupWindow').hide("slow", function() {
			
			});
		}
	});
	return false;
}

</script>
<div class="popupWindowShadow" onclick="togglePopupWindow()"></div>
<div class="popupWindow">
	<div class="content">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="ipaFile" style="display:none;" onchange="startUploadingApp()" />
			<a href="#" class="button" id="uploadIpaFileButton"  onclick="return clickUploadButton()">Pick an app</a>
			<button type="submit" style="display:none;" id="submitIpaButton" name="submitIpaButton">Submit</button>
			<p id="infoText" style="display:none;">Your application is being uploaded now! Please wait for a page refresh.</p>
		</form>
	</div>
</div>
<div class="appDetail" style="margin-top: <?php echo $space; ?>px;">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $app->getName(); ?></h3>
        <p class="appBundleId"><?php echo $app->getIdentifier(); ?></p>
        <!--<a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps" class="button rightButton">Delete</a>-->
    </div>
    <?php
    $x = 0;
    foreach ($arr as $app) {
		$x++;
		if ($app->getDevtype() == 0) $devVersion = 'Development version';
		elseif ($app->getDevtype() == 1) $devVersion = 'Beta version';
		if ($app->getDevtype() == 2) $devVersion = 'Production version';
		if (moduleMobileapps::canUserAccessApp(moduleUsers::getId(), $app->getId()) || moduleUsers::isAdmin()) {
		//if (true) {
	?>
    <div class="box">
    	<img src="<?php echo $app->getLargeIconUrl(); ?>" alt="<?php echo $app->getName(); ?>" style="float: right" class="bigAppDetailIcon" />
        <h3><?php echo $devVersion; ?></h3>
        <ul class="values">
            <li>Version: <span><?php echo $app->getVersion(); ?></span></li>
            <li>Build date: <span><?php echo $app->getFormattedDateChanged(); ?></span></li>
        	<li>Size: <span><?php echo wgIo::getSize((int)$app->getSize(), true); ?></span></li>
        </ul>
        <div class="controls">
            <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps&show=appsmobileapps&edit=<?php echo $app->getId(); ?>" title="Edit <?php echo $app->getName(); ?>" class="button edit" onclick="return toggleEdit('boxNo<?php echo $x; ?>')">Edit</a>
            <?php
            $wb = new wgBrowser();
            if ($wb->isiOS()) {
            ?>
            <a href="itms-services://?action=download-manifest&url=itms-services://?action=download-manifest&url=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <?php
            }
            elseif ($wb->isAndroidOS()) {
            ?>
            <a href="?app=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <a href="<?php echo $app->getAppIpaUrl(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download">Download</a>
            <?php
            }
            else {
            ?>
            <a href="<?php echo $app->getAppIpaUrl(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download">Download</a>
            <!--<a href="#" title="Replace #########" class="button replace">Replace</a>-->
            <?php
            }
            ?>
        </div>
        <p class="peopleInfo">
        	Admin
            <?php
            $companies = MobileappsCompaniesModel::getCompaniesForApp($app->getId());
            foreach ($companies as $company) {
				echo ', '.$company->getCompanyNameWhenRightJoin();
			}
            ?>
        </p>
        <?php
        // For futre reference. Uncomment if you want to keep the menu open after save
        //$isHidden = (isset($_GET['editBoxId']) && (int)$_GET['editBoxId'] == $x && false) ? '' :  'style="display: none;"';
        $isHidden = 'style="display: none;"';
        ?>
        <form class="editForm" action="?mobileAppId=<?php echo $app->getIdentifier(); ?>" method="post" id="boxNo<?php echo $x; ?>"<?php echo $isHidden; ?>>
        	<h3>Number of companies: <?php echo MobileappsCompaniesModel::numberOfCompaniesForApp($app->getId()).' / '.CompaniesModel::doCount(); ?></h3>
	        <ul class="checkboxList">
	        <?php
	        $companies = CompaniesModel::getSelfData();
	        foreach ($companies as $company) {
				$checked = MobileappsCompaniesModel::isAppInCompany($app->getId(), $company->getId());
				$checked = ($checked) ? ' checked="checked"' : '';
	        ?>
		        <li>
		        	<?php echo $company->getName(); ?>
		        	<span><input type="checkbox" value="<?php echo $company->getId(); ?>" name="company[]"<?php echo $checked; ?> /></span>
		        </li>
	        <?php
			}
	        ?>
	        </ul>
	        <div class="controls">
	            <button type="submit" name="doSaveCompaniesForApp">Save</button>
	            <button type="submit" name="deleteCurrentBuild" onclick="return confirmAction('Are you sure you want to delete this app?')">Delete</button>
	        </div>
	        <input type="hidden" name="mobileAppId" value="<?php echo $app->getIdentifier(); ?>" />
	        <input type="hidden" name="appId" value="<?php echo $app->getId(); ?>" />
	        <input type="hidden" name="editBoxId" value="<?php echo $x; ?>" />
		</form>
    </div>
    <?php
    	}
    }
    ?>
    <!--<div class="box">
        <h3>Development version</h3>
        <div class="controls">
            <a href="#" title="Upload new development version of #########" class="button upload">Upload</a>
        </div>
    </div>-->
</div>
<?php
}
else {
?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName">No app has been selected</h3>
    </div>
</div>
<?php
}
?>