<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");	
		
			$subjectid = $_POST['subjectid'];
			
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("DELETE FROM subjects WHERE subjectid = :subjectid");
			$stmt -> bindParam(':subjectid', $subjectid);
			$stmt->execute();
			$conn = null;
			
		//echo $subjid;
?>