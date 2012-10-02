<?php
$company = CompaniesModel::getOneSelfData($companyId);
$numberOfUsers = MobileappsUsersModel::getUsersCountForCompany($company->getId());
?>
<div class="appDetail">
    <div class="box noBorder">
        <h3 class="appName"><?php echo $company->getName(); ?></h3>
        <p class="appBundleId">Number of users:  <?php echo $numberOfUsers.'/'.$completeNumberOfUsers; ?></p>
    </div>
    
    <form class="box" method="post" action="?companyId=<?php echo $company->getId(); ?>">
        <h3>Number of apps: <?php echo '0/'.MobileappsModel::doCount(); ?></h3>
        <ul class="checkboxList">
        <?php
        $users = UsersModel::getUsersByLastname();
        foreach ($users as $user) {
			$checked = MobileappsUsersModel::isUserInCompany($user->getId(), $company->getId());
			$checked = ($checked) ? ' checked="checked"' : '';
        ?>
	        <li>
	        	<?php echo $user->getLastname().', '.$user->getFirstname(); ?>
	        	<span><input type="checkbox" value="<?php echo $user->getId(); ?>" name="user[]"<?php echo $checked; ?> /></span>
	        </li>
        <?php
		}
        ?>
        </ul>
        <div class="controls">
            <button type="submit" name=doSaveUsersForCompany>Save</button>
        </div>
        <input type="hidden" name="companyId" value="<?php echo $company->getId(); ?>" />
    </form>
</div>
