<?php
	
	//$filenamekey = md5(uniqid($_FILES["vidToUpload"]["name"], true)); 
	$filenamekey = 'movie';
	$extension = pathinfo($_FILES["vidToUpload"]["name"], PATHINFO_EXTENSION);
	$filenamekey .= "." . $extension;
	
	$target_dir = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/video/";
	$target_file = $target_dir . basename($_FILES["vidToUpload"]["name"]);
	$uploadOk = 1;
	$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if (!isset($_FILES['vidToUpload']) || $_FILES['vidToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
		$uploadOk = 0;
	} else {		
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			unlink($target_file) or die("Couldn't delete file.");
			//$uploadOk = 0;
		}
		
		if ($_FILES["vidToUpload"]["size"] > 50000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		if($videoFileType != "mp4" && $videoFileType != "ogg" && $videoFileType != "webm") {
			echo "Sorry, this file format is not supported by HTML5.";
			$uploadOk = 0;
		}
	}
	if ($uploadOk == 0) {
		//no image to be uploaded
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["vidToUpload"]["tmp_name"], $target_dir . $filenamekey)) {
			//no problem
			echo "The file ". basename( $_FILES["vidToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	//close connection
	
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>