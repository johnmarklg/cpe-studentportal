<?php	
	function showAccounting() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//if first semester
		if (date('m') > 7) {
			$fifthyear = date('y') - 4; 
		} else { //if second semester
			$fifthyear = date('y') - 5;
		}
		
		$tableheader = false;
		$conn = getDB('cpe-studentportal');	
		$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable5 AS (SELECT * FROM students)");
		$stmt->execute();
		$stmt = $conn->prepare("ALTER TABLE temptable5
			DROP COLUMN passcode,
			DROP COLUMN yearstarted,
			DROP COLUMN cfatscore,
			DROP COLUMN gender,
			DROP COLUMN status,
			DROP COLUMN citizenship,
			DROP COLUMN dateofbirth,
			DROP COLUMN placeofbirth,
			DROP COLUMN contactnum,
			DROP COLUMN address,
			DROP COLUMN fatheroccupation,
			DROP COLUMN father,
			DROP COLUMN mother,
			DROP COLUMN motheroccupation,
			DROP COLUMN spouse,
			DROP COLUMN spouseoccupation,
			DROP COLUMN houseaddress,
			DROP COLUMN employer,
			DROP COLUMN businessaddress,
			DROP COLUMN telnum,
			DROP COLUMN elementary,
			DROP COLUMN elemaddress,
			DROP COLUMN elemgraduate,
			DROP COLUMN secgraduate,
			DROP COLUMN secondary,
			DROP COLUMN secaddress,
			DROP COLUMN college,
			DROP COLUMN coladdress,
			DROP COLUMN colgraduate;");
		$stmt->execute();				
		$stmt = $conn->prepare("SELECT * from temptable5 WHERE SUBSTRING(studnum,1,2) <= :fifthyear AND studnum <> 00-0000");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		
		echo '<div class="tab-content">';
		//5TH YEAR
		echo '<div class="tab-pane" id="5">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year (<= ". $fifthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">";
		

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $value) {
				echo "<td contentEditable>{$value}</td>";
			}
			echo "</tr>";
		}
		$conn = null;
		echo "</table></div></div></div></div></div></div>";

		//4TH YEAR
		$fourthyear = $fifthyear + 1;
		$tableheader = false;
		$conn = getDB('cpe-studentportal');	
		$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable4 AS (SELECT * FROM students)");
		$stmt->execute();
		$stmt = $conn->prepare("ALTER TABLE temptable4
			DROP COLUMN passcode,
			DROP COLUMN yearstarted,
			DROP COLUMN cfatscore,
			DROP COLUMN gender,
			DROP COLUMN status,
			DROP COLUMN citizenship,
			DROP COLUMN dateofbirth,
			DROP COLUMN placeofbirth,
			DROP COLUMN contactnum,
			DROP COLUMN address,
			DROP COLUMN fatheroccupation,
			DROP COLUMN father,
			DROP COLUMN mother,
			DROP COLUMN motheroccupation,
			DROP COLUMN spouse,
			DROP COLUMN spouseoccupation,
			DROP COLUMN houseaddress,
			DROP COLUMN employer,
			DROP COLUMN businessaddress,
			DROP COLUMN telnum,
			DROP COLUMN elementary,
			DROP COLUMN elemaddress,
			DROP COLUMN elemgraduate,
			DROP COLUMN secgraduate,
			DROP COLUMN secondary,
			DROP COLUMN secaddress,
			DROP COLUMN college,
			DROP COLUMN coladdress,
			DROP COLUMN colgraduate;");
		$stmt->execute();				
		$stmt = $conn->prepare("SELECT * from temptable4 WHERE SUBSTRING(studnum,1,2) = :fourthyear AND studnum <> 00-0000");
		$stmt -> bindParam(':fourthyear', $fourthyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="4">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year (= ". $fourthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">";
		

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if($tableheader == false) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					echo "<th>{$key}</th>";
				}
				echo '</tr>';
				$tableheader = true;
			}
			echo "<tr>";
			foreach($row as $value) {
				echo "<td contentEditable>{$value}</td>";
			}
			echo "</tr>";
		}
		$conn = null;
		echo "</table></div></div></div></div></div></div>";

		echo '</div>';
	}
?>