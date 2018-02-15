<?php	
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");	
		
			$conn = getDB('cpe-studentportal');
			//GETS latest id
			$stmt = $conn->prepare("SELECT subjectid from subjects ORDER BY subjectid DESC LIMIT 1");
			$stmt->execute();
			
			foreach(($stmt->fetchAll()) as $row) { 
				$subjid = $row['subjectid'] + 1;
			}
			$conn = null;
			
		echo $subjid;
?>