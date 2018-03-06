<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonevents = json_decode($_POST['events'], true);
	$adminid = $_POST['adminid'];
	
	$conn = getDB('cpe-studentportal');
				
	foreach ($jsonevents as $key => $value) {	
			try {
				//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("INSERT INTO holidays (start, end, title, description, location)
				VALUES (:startdate, :enddate, :eventname, :eventinfo, :eventloc)");
				$stmt -> bindParam(':startdate', $value['Start Date']);
				$stmt -> bindParam(':enddate', $value['End Date']);
				$stmt -> bindParam(':eventname', $value['Event Name']);
				$stmt -> bindParam(':eventinfo', $value['Event Info']);
				$stmt -> bindParam(':eventloc', $value['Event Location']);
				$stmt->execute();	
				
				$stmt = $conn->prepare("INSERT INTO `activitylog` 
				(userid, action, target, timestamp) 
				VALUES (:userid, 9, :target, now())");
				$stmt -> bindParam(':userid', $adminid);
				$stmt -> bindParam(':target', $value['Event Name']);
				$stmt->execute(); 
				
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			
	}
	$conn = null;	

?>