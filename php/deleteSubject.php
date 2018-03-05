<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");	
		
			$subjectid = $_POST['subjectid'];
			$adminid = $_POST['adminid'];
	
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("DELETE FROM subjects WHERE subjectid = :subjectid");
			$stmt -> bindParam(':subjectid', $subjectid);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, timestamp) 
			VALUES (:userid, 16, now())");
			$stmt -> bindParam(':userid', $adminid);
			$stmt->execute(); 
			
			$conn = null;
			
		//echo $subjid;
?>