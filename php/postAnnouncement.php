<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
	$nowFormat = date('Y-m-d H:i:s');
		
	foreach ($jsonpostdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO posts (posterid, poster, post, fileurl, datetime)
		VALUES (:posterid, :poster, :post, :fileurl, :datetime)");
		$stmt -> bindParam(':posterid', $value['PosterID']);
		$stmt -> bindParam(':poster', $value['Poster']);
		$stmt -> bindParam(':post', $value['Post']);
		$stmt -> bindParam(':fileurl', $value['FileURL']);
		$stmt -> bindParam(':datetime', $nowFormat);
		$stmt->execute();	
		
		$last_id = $conn->lastInsertId();
		print $last_id;
    
		$conn = null;
		
	}
?>