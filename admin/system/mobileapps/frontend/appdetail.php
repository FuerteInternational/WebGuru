

<?php
$uploadNewAppForm = '<div class="popupWindowShadow" onclick="togglePopupWindow()"></div>
<div class="popupWindow">
	<div class="content">
		<ul id="popupUploadSelector">
			<li class="active" id="popupUploadSelectorLi0"><a href="#" onclick="return switchUploadTab(0)">iOS or Android binary</a></li>
			<li id="popupUploadSelectorLi1"><a href="#" onclick="return switchUploadTab(1)">Web App</a></li>
			<li id="popupUploadSelectorLi2"><a href="#" onclick="return switchUploadTab(2)">External Store App</a></li>
		</ul>
		<form id="fieldSet0" action="" method="post" enctype="multipart/form-data">
			<fieldset><legend>iOS or Android binary</legend>
                <h3>Create a new app by uploading a file or using one of the other options</h3>
                <p id="uploadIpaFileBuildSelectBox">
					<label>Select type of the build:</label>
					<select name="devtype" id="devtypeSelectBox">
						<option value="0">Development build</option>
						<option value="1">Beta build</option>
						<option value="2">Production build</option>
					</select>
				</p>
                <input type="file" name="file" id="ipaFile" style="display:none;" onchange="startUploadingApp()" />
                <a href="#" class="button" id="uploadIpaFileButton"  onclick="return clickUploadButton()">Pick an app</a>
                <button type="submit" style="display:none;" id="submitAppDataButton" name="submitAppDataButton">Submit</button>
                <p id="infoText">Your application is being uploaded now! Please wait for a page refresh.</p>
				<p id="infoTextProgressBar">&nbsp;</p>
				<p class="infoText">
					<strong>Hint:</strong><br />
					Please upload one of the following formats:<br />
					iOS (iPhone, iPad, iPod) devices ........ <strong>.ipa</strong> file<br />
					Android based devices ....................... <strong>.apk</strong> file
				</p>
        	</fieldset>
		</form>
		<form id="fieldSet1" action="" method="post" enctype="multipart/form-data">
			<fieldset><legend>Web App</legend>
                <h3>Link to any web app and have it appear as an icon on the end user\'s home screen</h3>
                <p>
					<label>Select type of the build:</label>
					<select name="devtype" id="devtypeSelectBox">
						<option value="0">Development build</option>
						<option value="1">Beta build</option>
						<option value="2">Production build</option>
					</select>
				</p>
                <p>
					<label>Select type of the build:</label>
					<input type="text" name="webapp" id="webappInput" onchange="verifyLink(\'webappInput\')" />
				</p>
                <button type="submit" name="submitWebAppButton">Submit</button>
				<p class="infoText">
					<strong>Hint:</strong><br />
					Link to any web app and have it appear as an icon on the end user\'s home screen.<br />
					The app will launch in the default browser on the device.
        	</fieldset>
		</form>
		<form id="fieldSet2" action="" method="post" enctype="multipart/form-data">
			<fieldset><legend>External Store App</legend>
                <h3>Link to apps that are in an external app store</h3>
                <p>
					<label>Select type of the build:</label>
					<select name="devtype" id="devtypeSelectBox">
						<option value="2">Production build</option>
					</select>
				</p>
                <p>
					<label>Select type of the build:</label>
					<input type="text" name="extstore" id="extStoreInput" onchange="verifyLink(\'extStoreInput\')" />
				</p>
                <button type="submit" name="submitExtStoreButton">Submit</button>
				<p class="infoText">
					<strong>Hint:</strong><br />
					Link to apps that are in an external app store.<br />
					Visit a store to copy and paste the app\'s URL.<br /><br />
					<a href="https://market.android.com/" target="_blank">Android Marketplace</a><br />
					<a href="http://itunes.apple.com/linkmaker/" target="_blank">iTunes App Store</a><br />
        	</fieldset>
		</form>
	</div>
</div>
';

if (!moduleUsers::isAdmin()) $uploadNewAppForm = '';

if ($mobileAppId) {
	$app = MobileappsModel::getItemGeneralItemInfo($mobileAppId);
	$arr = MobileappsModel::getSelfDataForIdentifier($mobileAppId);
	
	$space = (69 + 24) * $selectedItem;
	$space -= (250 * count($arr));
	if ($space < 0) $space = 0;
	
	echo $uploadNewAppForm;
?>
<div class="appDetail" style="margin-top: <?php echo $space; ?>px;">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $app->getName(); ?></h3>
        <p class="appBundleId"><?php echo $app->getIdentifier(); ?></p>
        <?php if (moduleUsers::isAdmin()) { ?>
        <a href="?deleteAllApps=<?php echo $app->getIdentifier(); ?>" class="button rightButton" onclick="return confirmAction('Are you sure you want to delete ALL versions of this app?')">Delete</a>
        <?php } ?>
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
    	<a name="topBoxAnchor"></a>
    	<img src="<?php echo $app->getLargeIconUrl(); ?>" alt="<?php echo $app->getName(); ?>" style="float: right" class="bigAppDetailIcon" />
        <h3><?php echo $devVersion; ?></h3>
        <ul class="values">
            <li>Version: <span><?php echo $app->getFormattedVersion(); ?></span></li>
            <li>Build date: <span><?php echo $app->getFormattedDateChanged(); ?></span></li>
        	<li>Size: <span><?php echo wgIo::getSize((int)$app->getSize(), true); ?></span></li>
            <li>Platform: <span><?php echo ((int)$app->getApptype() == 0) ? 'iOS' : 'Android'; ?></span></li>
        </ul>
        <div class="controls">
        	<?php if (moduleUsers::isAdmin()) { ?>
            <a href="<?php echo wgPaths::getAdminPath('url'); ?>?part=system&mod=mobileapps&page=apps&show=appsmobileapps&edit=<?php echo $app->getId(); ?>" title="Edit <?php echo $app->getName(); ?>" class="button edit" onclick="return toggleEdit('boxNo<?php echo $x; ?>')">Edit</a>
            <?php
			}
            if ($wb->isiOS()) {
				if (!(int)$app->getApptype() == 1) {
            ?>
            <a href="itms-services://?action=download-manifest&url=itms-services://?action=download-manifest&url=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
            <?php
            	}
            }
            elseif ($wb->isAndroidOS()) {
            ?>
            <!--<a href="?app=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>-->
            <a href="?downloadAppId=<?php echo $app->getId(); ?>&mobileAppId=<?php echo $app->getIdentifier(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download"><?php echo ((int)$app->getApptype() == 0) ? 'Download' : 'Install'; ?></a>
            <?php
            }
            else {
            ?>
            <a href="?downloadAppId=<?php echo $app->getId(); ?>&mobileAppId=<?php echo $app->getIdentifier(); ?>" title="Download <?php echo $app->getName(); ?>" class="button download">Download</a>
            <!--<a href="#" title="Replace #########" class="button replace">Replace</a>-->
            <?php
            }
            ?>
        </div>
        <?php if (moduleUsers::isAdmin()) { ?>
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
		<?php } ?>
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
	echo $uploadNewAppForm; ?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName">No app has been selected</h3>
    </div>
</div>
<?php
}
?>