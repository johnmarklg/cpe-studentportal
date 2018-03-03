<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
	$officename = $_POST['officename'];
	$officer = $_POST['officer'];
	
	if(($officename=='')&&($officer=='')) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		$conn=getdb('cpe-studentportal');	
		
		//$filenamekey = md5(uniqid($_FILES["fileToUpload"]["name"], true));
		$filenamekey = $officer;
		$extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
		$filenamekey .= "." . $extension;
		
		$target_dir = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/officers/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if (!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
			$uploadOk = 0;
		} else {
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
			
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			
			if ($_FILES["fileToUpload"]["size"] > 500000) {
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
			$stmt = $conn->prepare("INSERT INTO `officers` (studnum, office) VALUES (:studnum, :office)");
			$stmt -> bindParam(':studnum', $officer);
			$stmt -> bindParam(':office', $officename);
			$stmt->execute();
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $filenamekey)) {
				//no problem
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$stmt = $conn->prepare("INSERT INTO `officers` (studnum, office, photolink) VALUES (:studnum, :office, :photolink)");
				$stmt -> bindParam(':studnum', $officer);
				$stmt -> bindParam(':office', $officename);
				$stmt -> bindParam(':photolink', $filenamekey);
				$stmt->execute();
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		//close connection
		$conn = null;
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>