<?php
$mod->runModule('mobileapps');
$mod->runModule('users');
$showUserApps = (isset($_GET['showUserApps'])) ? (int)$_GET['showUserApps'] : 0;
if (moduleUsers::isAdmin() && !$showUserApps) $arr = MobileappsModel::getGroupedSelfData();
else {
	$ids = MobileappsUsersModel::getCompaniesIdsForUser(($showUserApps ? $showUserApps : moduleUsers::getId()));
	$arr = MobileappsModel::getGroupedSelfDataForCompanyIds($ids);
}
$mobileAppId = (isset($_GET['mobileAppId'])) ? $_GET['mobileAppId'] : '';
if (!$mobileAppId || !MobileappsModel::isDataForIdentifier($mobileAppId)) $mobileAppId = (!empty($arr)) ? $arr[0]->getIdentifier() : '';
if (empty($arr)) $mobileAppId = 0;

?>
<ul class="menu">
	<?php
	$selectedItem = 0;
	$x = 0;
	foreach ($arr as $app) {
		$active = ($app->getIdentifier() == $mobileAppId) ? ' class="active"' : '';
		if (!empty($active)) $selectedItem = $x;
		$x++;
	?>
    <li<?php echo $active; ?>>
        <a href="?mobileAppId=<?php echo $app->getIdentifier(); ?>" title="<?php echo $app->getName(); ?>">
            <img src="<?php echo MobileappsModel::getIconUrlForAnyIdentifier($app->getIdentifier()); ?>" alt="<?php echo $app->getName(); ?>" />
            <strong><?php echo $app->getName(); ?></strong>
            <small>Version: <span><?php echo ((int)$app->getApptype() == 0) ? 'iOS' : 'Android'; ?></span></small>
            <small>Version: <span><?php echo $app->getFormattedVersion(); ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>
