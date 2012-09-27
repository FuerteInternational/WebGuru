<?php

if ($mobileAppId) {
	$app = MobileappsModel::getOneSelfData($mobileAppId);
?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $app->getName(); ?></h3>
        <p class="appBundleId"><?php echo $app->getIdentifier(); ?></p>
        <a href="<?php echo wgPaths::getAdminPath('url') ?>?part=system&mod=mobileapps&page=apps" class="button rightButton">Delete</a>
    </div>
    <!--<div class="box">
        <h3>Production version</h3>
        <ul class="values">
            <li>Version: <span>v1.1</span></li>
            <li>Build date: <span>24. Aug 1991 12:15 PM</span></li>
        </ul>
        <div class="controls">
            <a href="#" title="Edit #########" class="button edit">Edit</a>
            <a href="#" title="Download #########" class="button download">Download</a>
            <a href="#" title="Replace #########" class="button replace">Replace</a>
        </div>
    </div>-->
    <div class="box">
        <h3>Development version</h3>
        <ul class="values">
            <li>Version: <span>v<?php echo $app->getVersion(); ?></span></li>
            <li>Build date: <span><?php echo $app->getFormattedDateChanged(); ?></span></li>
        </ul>
        <div class="controls">
            <?php
            if (strstr($_SERVER['HTTP_USER_AGENT'],"iPad") || strstr($_SERVER['HTTP_USER_AGENT'],"iPhone")) {
            ?>
            <a href="itms-services://?action=download-manifest&url=itms-services://?action=download-manifest&url=<?php echo wgPaths::getPath('url').'app-plist/?mobileAppId='.$mobileAppId;?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <?php
            }
            else {
            ?>
            <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps&show=appsmobileapps&edit=<?php echo $app->getId(); ?>" title="Edit <?php echo $app->getName(); ?>" class="button edit">Edit</a>
            <a href="<?php echo $app->getAppIpaUrl(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download">Download</a>
            <!--<a href="#" title="Replace #########" class="button replace">Replace</a>-->
            <?php
            }
            ?>
            
        </div>
        <!--<p class="peopleInfo">
            All, Developers, Management, SOMO
        </p>-->
    </div>
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