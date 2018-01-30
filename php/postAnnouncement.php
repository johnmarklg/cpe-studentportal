<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
	$nowFormat = date('Y-m-d H:i:s');
		
	foreach ($jsonpostdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO posts (status, posterid, poster, post, file, filetype, filesize, datetime)
		VALUES ('Pending', :posterid, :poster, :post, :file, , :filetype, :filesize, :datetime)");
		$stmt -> bindParam(':posterid', $value['PosterID']);
		$stmt -> bindParam(':poster', $value['Poster']);
		$stmt -> bindParam(':post', $value['Post']);
		$stmt -> bindParam(':file', $value['File']);
		$stmt -> bindParam(':file', $value['File Type']);
		$stmt -> bindParam(':file', $value['File Size']);
		$stmt -> bindParam(':datetime', $nowFormat);
		$stmt->execute();	
		
		$last_id = $conn->lastInsertId();
		print $last_id;
    
		$conn = null;
		
	}
?>