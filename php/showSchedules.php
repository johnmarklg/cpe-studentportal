<?php	
	function showSchedules() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		$conn = getDB('cpe-studentportal');
			echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
			<div class="panel-body"><div class="table-responsive">
			<table id="tablesched" class="table">
			<thead>
			<tr>
			<th style="font-size: 0px">ID</th>
			<th>Section</th>
			<th>Course Code</th>
			<th>Units</th>
			<th>Subject Section</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Days</th>
			<th>Building</th>
			<th>Room Number</th>
			<th>Instructor</th>
			</tr>
			</thead>
			<tbody class="list">';

			
			/*if (date('m') > 7) {
				$fifthyear = date('y') - 4; 
			} else { //if second semester
				$fifthyear = date('y') - 5;
			}*/
			$myyear = mb_substr($_SESSION["name"][4], 0, 2);
			$actualyear = date('y') - $myyear;
			$stmt = $conn->prepare("SELECT schedules.*, subjects.units, subjects.coursecode, subjects.defaultyear, subjects.defaultsemester FROM`schedules` 
			LEFT JOIN `subjects`
			ON schedules.subjectid = subjects.subjectid
			WHERE subjects.defaultyear=:year");
			//$stmt -> bindParam(':year', $x);
			$stmt->bindParam(':year', $actualyear);
			$stmt->execute();

			foreach(($stmt->fetchAll()) as $row) { 
				echo '<tr>
				<td style="font-size: 0px" class="id">' . $row['id'] . '</td>
				<td class="section">' . $row['section'] . '</td>
				<td  class="code">' . $row['coursecode'] . '</td>
				<td  class="units">' . $row['units'] . '</td>
				<td >' . $row['subjectsection'] . '</td>
				<td >' . $row['starttime'] . '</td>
				<td >' . $row['endtime'] . '</td><td>';
				//input days here
				if($row['mon']==1) {echo 'M';}
				if($row['tue']==1) {echo 'T';}
				if($row['wed']==1) {echo 'W';}
				if($row['thu']==1) {echo 'Th';}
				if($row['fri']==1) {echo 'F';}
				if($row['sat']==1) {echo 'S';}
				echo '</td><td >' . $row['building'] . '</td>
				<td >' . $row['roomnumber'] . '</td>
				<td >' . $row['instructor'] . '</td></tr>';
			}
			echo '</tbody></table></div></div></div></div></div>';	
		 
		$conn = null;

		
	}
?>