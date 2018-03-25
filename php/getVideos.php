<?php
	$dir_path = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/videos/files/";
	if (is_dir($dir_path))
	{
		$files = scandir($dir_path);
		for($i = 0; $i < count ($files); $i++)
		{
			if($files[$i] !='.' && $files[$i] != '..')
			{
				$file = pathinfo($files[$i]);
				$ext = pathinfo($files[$i], PATHINFO_EXTENSION);
				//echo '<p style="color: white;">' . $files[$i] . '</p>';
				if(($files[$i] != '.gitignore')&&($files[$i] != '.htaccess')&&($files[$i] != 'thumbnail')) {
					//echo '<p>' . $files[$i] . '</p>';
					$arr[$i] = $files[$i];
				}
			}
		} 
		
		$myJSON = json_encode($arr);
		
		//echo '<script>console.log(JSON.stringify(' . $myJSON . '))</script>';
		echo $myJSON;
	}
?>