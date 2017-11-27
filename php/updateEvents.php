<?php	
	//require('databaseConnectionTimetable.php');
	
	$jsontimetable = json_decode($_POST['events'], true);
	
	
	//$studnum = $jsonstudinfo[0]['Student Number'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cpe-timetables";

	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//delete all table data first
	$stmt = $conn->prepare("TRUNCATE events");
	$stmt->execute();				
	$conn = null;
	
	//then insert current table data in order to overwrite all changes
	foreach ($jsontimetable as $key => $value) {	
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("INSERT INTO events (eventname, startdate, enddate, eventinfo)
				VALUES (:eventname, :startdate, :enddate, :eventinfo)");
				$stmt -> bindParam(':eventname', $value['Event Name']);
				$stmt -> bindParam(':startdate', $value['Start Date']);
				$stmt -> bindParam(':enddate', $value['End Date']);
				$stmt -> bindParam(':eventinfo', $value['Event Information']);
				$stmt->execute();	
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;	
	}

?>