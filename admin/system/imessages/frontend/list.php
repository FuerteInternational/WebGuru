<?php
$arr = ImessagesFormsModel::getSelfPagerData(0, 20, true);
if (!empty($arr['data'])) {
?>
<table class="admin">
	<colgroup>
		<col style="width: 60%;" />
		<col style="width: 10%;" />
		<col style="width: 20%;" />
		<col style="width: 10%;" />
	</colgroup>
    <thead>
        <tr>
            <th colspan="4"><span>Your iMessage forms</span></th>
        </tr>
    </thead>
    <tbody>
	    <?php
		foreach ($arr['data'] as $v) {
		?>
		<tr>
		    <td><a href="{#LINK_52}?api=<?php echo $v->getCode(); ?>"><img src="{#WEBROOT}data/api.png" alt="API for <?php echo $v->getName(); ?>" /> <?php echo $v->getName(); ?></a></td>
		    <td class="center"><a href="{#LINK_50}?edit=<?php echo $v->getId(); ?>#editForm"><span>Edit</span></a></td>
		    <td class="center"><a href="{#LINK_51}?fields=<?php echo $v->getId(); ?>"><span>Manage fields</span></a></td>
		    <td class="center"><a href="{#LINK_50}?delete=<?php echo $v->getId(); ?>"><span>Delete</span></a></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php
	echo '<div class="pager">'.$arr['pager'].'</div>';
	?>
	<form action="{#LINK_50}" method="get">
		<p>
			<button type="submit" name="create"><span>Create new form</span></button>
		</p>
	</form>
	<?php
}
?>

