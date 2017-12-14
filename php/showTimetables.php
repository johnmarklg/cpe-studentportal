<?php	
	function showTimetables() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//1ST YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">First Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefirst\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Section</th>
		<th>Code</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject1`");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td contentEditable\">" . $row['section'] . "</td>
			<td contentEditable>" . $row['code'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td contentEditable></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table></div></div></div></div></div>";
		
		//2ND YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablesecond\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Section</th>
		<th>Code</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject2`");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td contentEditable\">" . $row['section'] . "</td>
			<td contentEditable>" . $row['code'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td contentEditable></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table></div></div></div></div></div>";
		
		//THIRD YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablethird\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Section</th>
		<th>Code</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject3`");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td contentEditable\">" . $row['section'] . "</td>
			<td contentEditable>" . $row['code'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td contentEditable></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table></div></div></div></div></div>";
		
		//FOURTH YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefourth\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Section</th>
		<th>Code</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject4`");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td contentEditable\">" . $row['section'] . "</td>
			<td contentEditable>" . $row['code'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td contentEditable></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table></div></div></div></div></div>";
		
		//FIFTH YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Section</th>
		<th>Code</th>
		<th>Subject Section</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Days</th>
		<th>Building</th>
		<th>Room Number</th>
		<th>Instructor</th>
		<th><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject5`");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td contentEditable\">" . $row['section'] . "</td>
			<td contentEditable>" . $row['code'] . "</td>
			<td contentEditable>" . $row['subjectsection'] . "</td>
			<td contentEditable>" . $row['starttime'] . "</td>
			<td contentEditable>" . $row['endtime'] . "</td>
			<td contentEditable>" . $row['days'] . "</td>
			<td contentEditable>" . $row['building'] . "</td>
			<td contentEditable>" . $row['roomnumber'] . "</td>
			<td contentEditable>" . $row['instructor'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td contentEditable></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table></div></div></div></div></div>";
	}
?>