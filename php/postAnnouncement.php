<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
		
	foreach ($jsonpostdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO posts (posterid, poster, date, time, post, fileurl)
		VALUES (:posterid, :poster, :date, :time, :post, :fileurl)");
		$stmt -> bindParam(':posterid', $value['PosterID']);
		$stmt -> bindParam(':poster', $value['Poster']);
		$stmt -> bindParam(':date', $value['Date']);
		$stmt -> bindParam(':time', $value['Time']);
		$stmt -> bindParam(':post', $value['Post']);
		$stmt -> bindParam(':fileurl', $value['FileURL']);
		$stmt->execute();	
		
		$last_id = $conn->lastInsertId();
		print $last_id;
    
		$conn = null;
		
	}
?>