<?php
$arr = CompaniesModel::getSelfData();
$companyId = (int)$_GET['companyId'];
if (!$companyId) $companyId = (!empty($arr)) ? $arr[0]->getId() : 0;
$completeNumberOfUsers = UsersModel::doCount(array());
?>
<ul class="menu">
	<?php
	foreach ($arr as $company) {
		$active = ($company->getId() == $companyId) ? ' class="active"' : '';
	?>
    <li<?php echo $active; ?>>
        <a href="?companyId=<?php echo $company->getId(); ?>" title="<?php echo $company->getName(); ?>">
        	<img src="<?php echo $company->getIconUrl(); ?>" alt="<?php echo $company->getName(); ?>" />
            <strong><?php echo $company->getName(); ?></strong>
            <small>Number of users: <span><?php echo MobileappsUsersModel::getUsersCountForCompany($company->getId()).'/'.$completeNumberOfUsers; ?></span></small>
        </a>
    </li>
    <?php
	}
    ?>
</ul>
