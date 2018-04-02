<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
	$refid = $_POST['refid'];
	
	$conn=getdb('cpe-studentportal');	
	
	$filenamekey = $refid;
	$extension = pathinfo($_FILES["fileToUpload2"]["name"], PATHINFO_EXTENSION);
	$filenamekey .= "." . $extension;
	
	$target_dir = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/officers/";
	$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if (!isset($_FILES['fileToUpload2']) || $_FILES['fileToUpload2']['error'] == UPLOAD_ERR_NO_FILE) {
		$uploadOk = 0;
	} else {
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		
		$stmt = $conn->prepare("SELECT photolink FROM officers WHERE studnum=:id");
		$stmt -> bindParam(':id', $refid);
		$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $row) { 
			if (file_exists($row['photolink'])) {
				unlink($row['photolink']) or die("Couldn't delete file.");
			}
		}
			
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			unlink($target_file) or die("Couldn't delete file.");
			//$uploadOk = 0;
		}
		
		if ($_FILES["fileToUpload2"]["size"] > 5000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
	}
	if ($uploadOk == 0) {
		//no image to be uploaded
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_dir . $filenamekey)) {
			echo $filenamekey;
			//no problem
			$stmt = $conn->prepare("UPDATE officers SET photolink = :photolink WHERE studnum = :id");
			$stmt -> bindParam(':photolink', $filenamekey);
			$stmt -> bindParam(':id', $refid);
			$stmt->execute();
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	//close connection
	$conn = null;
	
	$url = $_SERVER['HTTP_REFERER'];
	
	preg_match('/\/[a-z0-9]+.php/', $url, $match); 
	
	//$url = 'http://www.mydomain.co.uk/blist.php?prodCodes=NC023-NC022-NC024-NCB33&customerID=NHFGR'; preg_match('/\/[a-z0-9]+.php/', $url, $match); 
	$page = array_shift($match); 
	//echo $page;
	
	header('Location: /admin' . $page . '?t=' . date('timestamp'));
	
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>