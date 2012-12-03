<?php
$mod->runModule('users');
$arr = UsersModel::getUsersByLastname();
$autoId = (!empty($arr) ? $arr[0]->getId() : 0);
$userId = (isset($_GET['userId']) ? (int)$_GET['userId'] : $autoId);
?>
<ul class="menu">
	<?php
	$selectedItem = 0;
	$x = 0;
	foreach ($arr as $user) {
		$email = md5(trim($user->getMail()));
		$gravatarUrl = 'http://www.gravatar.com/avatar/'.strtolower($email).'?s=57';
		$active = ($user->getId() == $userId) ? ' class="active"' : '';
		if (!empty($active)) $selectedItem = $x;
		$x++;
		
		
		if ($user->getUsersGroupsId() == 1) {
			$count = MobileappsModel::getAllAppsCount();
		}
		else {
			$ids = MobileappsUsersModel::getCompaniesIdsForUser($user->getId());
			$apps = MobileappsModel::getGroupedSelfDataForCompanyIds($ids);
			$count = count($apps);
		}
		
	?>
    <li<?php echo $active; ?>>
        <a href="?userId=<?php echo $user->getId(); ?>" title="<?php echo $user->getLastname().', '.$user->getFirstname(); ?>">
            <img src="<?php echo $gravatarUrl; ?>" alt="<?php echo $user->getLastname().', '.$user->getFirstname(); ?>" />
            <strong><?php echo $user->getLastname().', '.$user->getFirstname(); ?></strong>
            <small>Registered: <span><?php echo wgSystem::formatDate($user->getAdded()); ?></span></small>
            <small>Number of apps: <span><?php echo $count; ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>