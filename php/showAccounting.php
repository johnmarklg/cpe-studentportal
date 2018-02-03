<?php	
	function showAccounting() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//if first semester
		if (date('m') > 7) {
			$fifthyear = date('y') - 4; 
		} else { //if second semester
			$fifthyear = date('y') - 5;
		}
		
		echo '<div class="alert alert-info" role="alert">
		  <i class="fa fa-info-circle"></i> Click the <strong>Student Number</strong> of each student whose account you wish to update.
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>';
		
		$conn = getDB('cpe-studentportal');	
		
		echo '<div class="tab-content">';
		//5TH YEAR
		$stmt = $conn->prepare("SELECT * from `students` WHERE SUBSTRING(studnum,1,2) <= :fifthyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="5">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year (<= ". $fifthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\"><thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
		</tr>
		</thead>
		<tbody>";
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/php/showStatement.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";

		//4TH YEAR
		$fourthyear = $fifthyear + 1;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from `students`  WHERE SUBSTRING(studnum,1,2) = :fourthyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':fourthyear', $fourthyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="4">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year (= ". $fourthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefourth\" class=\"table\"><thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
		</tr>
		</thead>
		<tbody>";
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/php/showStatement.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";

		//3RD YEAR
		$thirdyear = $fifthyear + 2;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from `students` WHERE SUBSTRING(studnum,1,2) = :thirdyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':thirdyear', $thirdyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="3">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year (= ". $thirdyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablethird\" class=\"table\"><thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
		</tr>
		</thead>
		<tbody>";
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/php/showStatement.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";

		//2ND YEAR
		$secondyear = $fifthyear + 3;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from `students`  WHERE SUBSTRING(studnum,1,2) = :secondyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':secondyear', $secondyear);
		$stmt->execute();

		echo '<div class="tab-pane" id="2">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year (= ". $secondyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablesecond\" class=\"table\"><thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
		</tr>
		</thead>
		<tbody>";
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/php/showStatement.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";

		//1ST YEAR
		$firstyear = $fifthyear + 4;
		$tableheader = false;
		$stmt = $conn->prepare("SELECT * from `students`  WHERE SUBSTRING(studnum,1,2) = :firstyear AND studnum <> 00-0000 ORDER BY surname");
		$stmt -> bindParam(':firstyear', $firstyear);
		$stmt->execute();

		echo '<div class="tab-pane active" id="1">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">First Year (= ". $firstyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefirst\" class=\"table\"><thead>
		<tr>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
		</tr>
		</thead>
		<tbody>";
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td><a href=\"/php/showStatement.php?studnum=" . $row['studnum'] . "\">" . $row['studnum'] . "</a></td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";
		
		$conn = null;
		echo '</div>';
	}
?>