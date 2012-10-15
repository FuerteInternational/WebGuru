<?php
$mod->runModule('mobileapps');
$mod->runModule('users');
if (moduleUsers::isAdmin()) $arr = MobileappsModel::getGroupedSelfData();
else {
	$ids = MobileappsUsersModel::getCompaniesIdsForUser(moduleUsers::getId());
	$arr = MobileappsModel::getGroupedSelfDataForCompanyIds($ids);
}
$mobileAppId = (isset($_GET['mobileAppId'])) ? $_GET['mobileAppId'] : '';
if (!$mobileAppId || !MobileappsModel::isDataForIdentifier($mobileAppId)) $mobileAppId = (!empty($arr)) ? $arr[0]->getIdentifier() : '';

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
            <img src="<?php echo $app->getIconUrl(); ?>" alt="<?php echo $app->getName(); ?>" />
            <strong><?php echo $app->getName(); ?></strong>
            <small>Version: <span><?php echo ((int)$app->getApptype() == 0) ? 'iOS' : 'Android'; ?></span></small>
            <small>Version: <span><?php echo $app->getFormattedVersion(); ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>
