<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$adminid = $_POST['adminid'];
	$requestid = $_POST['requestid'];
	$studnum = $_POST['studnum'];
		
		$conn = getDB('cpe-studentportal');
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 29, :target, now())");
		$stmt -> bindParam(':userid', $adminid);
		$stmt -> bindParam(':target', $studnum);
		$stmt->execute(); 
		
		//delete from request table
		$stmt = $conn->prepare("DELETE FROM `profilerequest` WHERE requestid = :requestid");
		$stmt -> bindParam(':requestid', $requestid);
		$stmt->execute();
	
		$conn = null;
		
		echo 'Profile request successfully denied';
?>