<?php	
	function showTimetables() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
	
		//1ST YEAR
		echo '<div class="active tab-pane" id="1">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">First Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefirst\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th style=\"font-size: 0px\">Year</th>
		<th>Section</th>
		<th>Code</th>
		<th>Units</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th hidden></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from `schedules` WHERE year=1");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td style=\"font-size: 0px\" class=\"year\">" . $row['year'] . "</td>
			<td contentEditable\" class=\"section\">" . $row['section'] . "</td>
			<td contentEditable class=\"code\">" . $row['code'] . "</td>
			<td contentEditable class=\"units\">" . $row['units'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//2ND YEAR
		echo '<div class="tab-pane" id="2">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablesecond\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th style=\"font-size: 0px\">Year</th>
		<th>Section</th>
		<th>Code</th>
		<th>Units</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th hidden></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$stmt = $conn->prepare("SELECT * from `schedules` WHERE year=2");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td style=\"font-size: 0px\" class=\"year\">" . $row['year'] . "</td>
			<td contentEditable\" class=\"section\">" . $row['section'] . "</td>
			<td contentEditable class=\"code\">" . $row['code'] . "</td>
			<td contentEditable class=\"units\">" . $row['units'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td></tr>";
		}
	
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//THIRD YEAR
		echo '<div class="tab-pane" id="3">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablethird\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th style=\"font-size: 0px\">Year</th>
		<th>Section</th>
		<th>Code</th>
		<th>Units</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th hidden></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$stmt = $conn->prepare("SELECT * from `schedules` WHERE year=3");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td style=\"font-size: 0px\" class=\"year\">" . $row['year'] . "</td>
			<td contentEditable\" class=\"section\">" . $row['section'] . "</td>
			<td contentEditable class=\"code\">" . $row['code'] . "</td>
			<td contentEditable class=\"units\">" . $row['units'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//FOURTH YEAR
		echo '<div class="tab-pane" id="4">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefourth\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th style=\"font-size: 0px\">Year</th>
		<th>Section</th>
		<th>Code</th>
		<th>Units</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th hidden></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$stmt = $conn->prepare("SELECT * from `schedules` WHERE year=4");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td style=\"font-size: 0px\" class=\"year\">" . $row['year'] . "</td>
			<td contentEditable\" class=\"section\">" . $row['section'] . "</td>
			<td contentEditable class=\"code\">" . $row['code'] . "</td>
			<td contentEditable class=\"units\">" . $row['units'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td></tr>";
		}
		
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//FIFTH YEAR
		echo '<div class="tab-pane" id="5">';
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th style=\"font-size: 0px\">Year</th>
		<th>Section</th>
		<th>Code</th>
		<th>Units</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th hidden></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$stmt = $conn->prepare("SELECT * from `schedules` WHERE year=5");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td style=\"font-size: 0px\" class=\"year\">" . $row['year'] . "</td>
			<td contentEditable\" class=\"section\">" . $row['section'] . "</td>
			<td contentEditable class=\"code\">" . $row['code'] . "</td>
			<td contentEditable class=\"units\">" . $row['units'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><span class=\"table-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Remove</span></td></tr>";
		}
		$conn = null;

		echo "</tbody></table></div></div></div></div></div></div></div>";
	}
?>