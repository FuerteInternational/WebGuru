<?php
	$id = 58;
	$home = 1;
	if (is_dir('./wgwebdata/')) {
		if (!file_exists('./wgwebdata/'.$id.'.php')) {
			if ($id == $home) die('<strong>WebGuru Error:</strong> Website was not generated!!!');
			else $id = $home;
		}
		include('./wgwebdata/'.$id.'.php');
	}
	else die('<strong>WebGuru Error:</strong> No ./wgwebdata/ folder!!!');
	?>
	