<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE `administrators` SET password = :passcode WHERE id = :id");
		$stmt -> bindParam(':passcode', $value['newpass']);
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
		//update name in session
		$_SESSION['name'][0] = $value['Name'];
	}
	
?>