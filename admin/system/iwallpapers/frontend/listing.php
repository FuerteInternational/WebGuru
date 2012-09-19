<?php
$arr = IwallpapersImagesModel::getSelfPagerData(wgGet::getValue('from'), 8);
//print_r($arr);
?>
<div class="screens">
	<?php
	$o = true;
	foreach ($arr['data'] as $k=>$v) {
		$side = $o ? 'left' : 'right';
		$o = !$o;
		$img = $v->getId().'-'.$v->getFile();
		if (file_exists(wgPaths::getUserfilesPath('ftp', $v->getAdded()).$img)) {
			$path = wgPaths::getUserfilesPath('url', $v->getAdded()).$img;
			$size = wgIo::getSize(wgPaths::getUserfilesPath('ftp', $v->getAdded()).$img, true);
		}
		else {
			$path = wgPaths::getModulePath('url', 'iwallpapers').'data/default-wpaper.jpg';
			$size = '0b';
		}
	?>
    <div class="screen <?php echo $side; ?>">
        <h3><a href="/wallpaper-<?php echo $v->getId().'-'.$v->getSafeName(); ?>/"><?php echo $v->getName(); ?></a></h3>
        <p><img src="<?php echo $path; ?>" alt="<?php echo $v->getName(); ?>" /></p>
        <!--<p><small>Author <strong>Ondrej Rafaj</strong></small></p>-->
        <p><small>Size: <strong><?php echo $size; ?></strong></small></p>
        <!--<ul class="rating sv<?php echo $v->getRating(); ?>">
        	<li class="one"><a href="javascript: void(0)" title="1 Star">1</a></li>
            <li class="two"><a href="javascript: void(0)" title="2 Stars">2</a></li>
            <li class="three"><a href="javascript: void(0)" title="3 Stars">3</a></li>
            <li class="four"><a href="javascript: void(0)" title="4 Stars">4</a></li>
            <li class="five"><a href="javascript: void(0)" title="5 Stars">5</a></li>
    	</ul>-->
    </div>
    <?php } ?>
    <div class="cleaner"></div>
</div>


      
<div class="pager">
	<?php
	print $arr['pager'];
	?>
</div>
