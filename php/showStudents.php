<?php	
	function showStudents() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//if first semester
		if (date('m') > 7) {
			$fifthyear = date('y') - 4; 
		} else { //if second semester
			$fifthyear = date('y') - 5;
		}
		
		
		//ADD ENTRY
		echo '<div class="tab-content">';
		//5TH YEAR
		echo '<div class="tab-pane" id="5">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year (<= ". $fifthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\">Year Started</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted <= :fifthyear AND studnum <> '00-0000' ORDER BY surname");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/admin/records.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><span ><a href=\"/functions/generateprospectus.php?studnum=" . $row['studnum'] . "\"><i class=\"fa fa-fw fa-print\"></i> Prospectus (PDF)</a></span></td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//4TH YEAR
		echo '<div class="tab-pane" id="4">';
		$fourthyear = $fifthyear + 1;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year (= ". $fourthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\">Year Started</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :fourthyear  ORDER BY surname");
		$stmt -> bindParam(':fourthyear', $fourthyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/admin/records.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><span ><a href=\"/functions/generateprospectus.php?studnum=" . $row['studnum'] . "\"><i class=\"fa fa-fw fa-print\"></i> Prospectus (PDF)</a></span></td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//3RD YEAR
		echo '<div class="tab-pane" id="3">';
		$thirdyear = $fifthyear + 2;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year (= ". $thirdyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\">Year Started</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :thirdyear  ORDER BY surname");
		$stmt -> bindParam(':thirdyear', $thirdyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/admin/records.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><span ><a href=\"/functions/generateprospectus.php?studnum=" . $row['studnum'] . "\"><i class=\"fa fa-fw fa-print\"></i> Prospectus (PDF)</a></span></td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//2ND YEAR
		echo '<div class="tab-pane" id="2">';
		$secondyear= $fifthyear + 3;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year (= ". $secondyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\">Year Started</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :secondyear  ORDER BY surname");
		$stmt -> bindParam(':secondyear', $secondyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/admin/records.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><span ><a href=\"/functions/generateprospectus.php?studnum=" . $row['studnum'] . "\"><i class=\"fa fa-fw fa-print\"></i> Prospectus (PDF)</a></span></td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//1ST YEAR
		echo '<div class="active tab-pane" id="1">';
		$firstyear = $fifthyear + 4;
		
		echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
		<div class="panel-heading">First Year (= '. $firstyear . ')</div><div class="panel-body"><div class="table-responsive">
		<table id="tablefifth" class="table">
		<thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Passcode</th>
			<th style="font-size: 0px"></th>
			<th style="font-size: 0px"></th>
			<th style="font-size: 0px">Year Started</th>
		</tr>
		</thead>
		<tbody class="list">';

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted >= :firstyear  ORDER BY surname");
		$stmt -> bindParam(':firstyear', $firstyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/admin/records.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><span ><a href=\"/functions/generateprospectus.php?studnum=" . $row['studnum'] . "\"><i class=\"fa fa-fw fa-print\"></i> Prospectus (PDF)</a></span></td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div></div>";
		echo '</div>';
	}
?>