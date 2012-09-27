<?php
$arr = MobileappsModel::getSelfData();
$mobileAppId = (int) $_GET['mobileAppId'];
if (!$mobileAppId) $mobileAppId = (!empty($arr)) ? $arr[0]->getId() : 0;
?>
<ul class="menu">
	<?php
	foreach ($arr as $app) {
		$active = ($app->getId() == $mobileAppId) ? ' class="active"' : '';
	?>
    <li<?php echo $active; ?>>
        <a href="?mobileAppId=<?php echo $app->getId(); ?>" title="<?php echo $app->getName(); ?>">
            <img src="<?php echo $app->getLargeIconUrl(); ?>" alt="<?php echo $app->getName(); ?>" />
            <strong><?php echo $app->getName(); ?></strong>
            <small>Version <span><?php echo $app->getVersion(); ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>
