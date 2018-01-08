<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonevents = json_decode($_POST['events'], true);
	
	foreach ($jsonevents as $key => $value) {	
			try {
				$conn = getDB('cpe-studentportal');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("INSERT INTO holidays (eventname, startdate, enddate, eventinfo)
				VALUES (:eventname, :startdate, :enddate, :eventinfo)");
				$stmt -> bindParam(':eventname', $value['Event Name']);
				$stmt -> bindParam(':startdate', $value['Start Date']);
				$stmt -> bindParam(':enddate', $value['End Date']);
				$stmt -> bindParam(':eventinfo', $value['Event Info']);
				$stmt->execute();	
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;	
	}

?>