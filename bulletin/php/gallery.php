<?php
	$dir_path = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/gallery/files/";
	$bool = 0;
	$items = ''; //initalize blank string
	if (is_dir($dir_path)) {
		$files = scandir($dir_path);

		for($i = 0; $i < count ($files); $i++) {
			if($files[$i] !='.' && $files[$i] != '..') {
				$file = pathinfo($files[$i]);
				$ext = pathinfo($files[$i], PATHINFO_EXTENSION);
				if(($files[$i] != '.gitignore')&&($files[$i] != '.htaccess')&&($files[$i] != 'thumbnail')) {
					if($bool == 0) {
					$items .= "<div class=\"item active\"><img src=\"/uploads/gallery/files/$files[$i]\" style='width:320px;height:300px;'></div>";	
					$bool = 1;
					} else {
					$items .=  "<div class=\"item\"><img src=\"/uploads/gallery/files/$files[$i]\" style='width:320px;height:300px;'></div>";	
					}
				}
			}
		}
	}
	
	echo $items;
?>