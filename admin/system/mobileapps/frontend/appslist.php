<?php
$arr = MobileappsModel::getGroupedSelfData();
$mobileAppId = $_GET['mobileAppId'];
if (!$mobileAppId) $mobileAppId = (!empty($arr)) ? $arr[0]->getIdentifier() : 0;
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
            <small>Version: <span><?php echo $app->getVersion(); ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>
