<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
	$postTitle = $_POST['postTitle'];
	$postText = $_POST['postText'];
	$poster = $_POST['poster'];
	$posterID= $_POST['posterID'];
	
	if(($postTitle=='')&&($postText=='')) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
	
	$conn=getdb('cpe-studentportal');	
	
	$filenamekey = md5(uniqid($_FILES["fileToUpload"]["name"], true)); 
	$extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
	$filenamekey .= "." . $extension;
	
	$target_dir = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if (!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
		//echo "Error no file selected"; 
		$uploadOk = 0;
	} else {
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//no image uploaded
		//echo "Sorry, your file was not uploaded.";
		$stmt = $conn->prepare("INSERT INTO `posts` (status, posterid, posttitle, post, file, filetype, filesize, datetime) VALUES ('Pending', :posterid, :posttitle, :post, '', '', '', now())");
		$stmt -> bindParam(':posterid', $posterID);
		//$stmt -> bindParam(':poster', $poster);
		$stmt -> bindParam(':posttitle', $postTitle);
		$stmt -> bindParam(':post', $postText);
		$stmt->execute();
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $filenamekey)) {
			//no problem
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$stmt = $conn->prepare("INSERT INTO `posts` (status, posterid, posttitle, post, file, filetype, filesize, datetime) VALUES ('Pending', :posterid, :posttitle, :post, :file, :filetype, :filesize, now())");
			$stmt -> bindParam(':posterid', $posterID);
			$stmt -> bindParam(':poster', $poster);
			$stmt -> bindParam(':posttitle', $postTitle);
			$stmt -> bindParam(':post', $postText);
			$stmt -> bindParam(':file', $filenamekey);
			$stmt -> bindParam(':filetype', $imageFileType);
			$stmt -> bindParam(':filesize', $_FILES["fileToUpload"]["size"]);
			$stmt->execute();
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
		
	$stmt = $conn->prepare("INSERT INTO `activitylog` 
	(userid, action, timestamp) 
	VALUES (:userid, 6, now())");
	$stmt -> bindParam(':userid', $posterID);
	$stmt->execute(); 		
			
	//close connection
	$conn = null;
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>