<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonuserinfo = json_decode($_POST['studinfo'], true);
	$studnum = $jsonuserinfo[0]['studnum'];
			
	foreach ($jsonuserinfo as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
		
		$conn = getDB('cpe-studentrecords');
		$stmt = $conn->prepare("DROP TABLE `$studnum`");
		$stmt->execute();	
		
		$conn = null;	
	}
	
?>