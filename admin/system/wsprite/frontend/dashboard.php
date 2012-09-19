<?php
$arr = WspriteWidgetsModel::getUserData(moduleUsers::getId());
if (!empty($arr)) {
	echo '<ul id="campaignList">';
	foreach ($arr as $v) {
		?>
		<li>
		    <div>
		        <a href="" class="highlight imgReplace">Rename</a>
		        <h2 id="<?php echo $v->getId(); ?>"><?php echo $v->getName(); ?></h2>
                <ul class="blackButtonList">
                    <li><a href="<?php echo wgPaths::getPagePath(76, 'url').'?edit='.$v->getId(); // wgPaths::getPagePath(76, 'url'). ?>"><span>Edit</span></a></li>
                    <!--<li><a href="<?php echo wgPaths::getPagePath(76, 'url').'?edit='.$v->getId(); ?>"><span>Set</span></a></li>-->
                    <li><a href="<?php echo '?delete='.$v->getId(); ?>" onclick="return confirm('Are you sure you want to delete?')"><span>Del</span></a></li>
				</ul>
		    </div>
		</li>
		<?php
	} 
	echo '</ul>';
}
else {
	?>
	
	<?php
}
?>