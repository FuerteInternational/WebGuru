<?php

if ($mobileAppId) {
	$arr = MobileappsModel::getSelfDataForIdentifier($mobileAppId);
?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $app->getName(); ?></h3>
        <p class="appBundleId"><?php echo $app->getIdentifier(); ?></p>
        <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps" class="button rightButton">Delete</a>
    </div>
    <?php
    foreach ($arr as $app) {
		if ($app->getDevtype() == 0) $devVersion = 'Development version';
		elseif ($app->getDevtype() == 1) $devVersion = 'Beta version';
		if ($app->getDevtype() == 2) $devVersion = 'Production version';
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
            <?php
            if ((strstr($_SERVER['HTTP_USER_AGENT'],"iPad") || strstr($_SERVER['HTTP_USER_AGENT'],"iPhone"))) {
            ?>
            <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps&show=appsmobileapps&edit=<?php echo $app->getId(); ?>" title="Edit <?php echo $app->getName(); ?>" class="button edit">Edit</a>
            <a href="itms-services://?action=download-manifest&url=itms-services://?action=download-manifest&url=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <?php
            }
            elseif (strstr($_SERVER['HTTP_USER_AGENT'],"Android")) {
            ?>
            <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps&show=appsmobileapps&edit=<?php echo $app->getId(); ?>" title="Edit <?php echo $app->getName(); ?>" class="button edit">Edit</a>
            <a href="?app=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <a href="<?php echo $app->getAppIpaUrl(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download">Download</a>
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
        <p class="peopleInfo">
            All
            <?php
            $companies = CompaniesModel::getSelfData();
            foreach ($companies as $company) {
				//echo ', '.$company->getName();
			}
            ?>
        </p>
    </div>
    <?php
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