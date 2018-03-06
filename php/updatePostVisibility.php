<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonadmininfo = json_decode($_POST['admininfo'], true);
	$adminid = $_POST['adminid'];
	
		foreach ($jsonadmininfo as $key => $value) {
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("UPDATE posts SET showbulletin = :showbulletin, datetime = :datetime WHERE id = :id");
			$stmt -> bindParam(':showbulletin', $value['showBool']);
			$stmt -> bindParam(':datetime', $value['timestamp']);
			$stmt -> bindParam(':id', $value['ID']);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, target, timestamp) 
			VALUES (:userid, :type, :target, now())");
			//24 show, 25 hide, 26 dismiss
			$stmt -> bindParam(':userid', $adminid);
			if($value['showBool']==1) {
				$type='24';
			} else if($value['showBool']==0) {
				$type='25';
			} else {
				$type='26';
			}
			$stmt -> bindParam(':type', $type, PDO::PARAM_INT);
			$stmt -> bindParam(':target', $value['ID']);
			$stmt->execute(); 
		
			
			$conn = null;
		}

?>