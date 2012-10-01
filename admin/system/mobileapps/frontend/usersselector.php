<?php
$company = CompaniesModel::getOneSelfData($companyId);
?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $company->getName(); ?></h3>
        <p class="appBundleId">Number of users:  11</p>
    </div>
    
    <div class="box">
        <h3>Users: <?php echo '#####'; ?></h3>
        <ul class="values">
        <?php
        $users = UsersModel::getUsersByLastname();
        foreach ($users as $user) {
        ?>
        <li>
        	<?php echo $user->getLastname().', '.$user->getFirstname(); ?>
        	<span><input type="checkbox" value="1" name="user<?php echo $user->getId(); ?>" /></span>
        </li>
        <?php
		}
        ?>
        </ul>
        <ul class="values">
            <li>Version: <span><?php echo $app->getVersion(); ?></span></li>
            <li>Build date: <span><?php echo $app->getFormattedDateChanged(); ?></span></li>
        	<li>Size: <span><?php echo wgIo::getSize((int)$app->getSize(), true); ?></span></li>
        </ul>
        <div class="controls">
            <a href="itms-services://?action=download-manifest&url=itms-services://?action=download-manifest&url=<?php echo wgPaths::getUserfilesPath('url').'mobileapps/ipa/'.$app->getId().'.plist';?>" title="Install <?php echo $app->getName(); ?>" class="button install">Install app</a>
        </div>
    </div>
</div>
?>