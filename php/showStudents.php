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
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Insert New Entry</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tableadd\" class=\"table\">
		<thead>
		<tr>
			<th style=\"font-size: 0px\">ID</th>
			<th>Year Started</th>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>CFAT Score</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\">Add Entry</th>
		</tr></thead><tbody><tr>
		<td style=\"font-size: 0px\" class=\"id\"></td>
		<td contentEditable class=\"yearstarted\"></td>
		<td contentEditable class=\"studnum\"></td>
		<td contentEditable class=\"surname\"></td>
		<td contentEditable class=\"firstname\"></td>
		<td contentEditable class=\"middlename\"></td>
		<td contentEditable class=\"cfatscore\"></td>
		<td contentEditable class=\"passcode\"></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">save</i></td></tr>
		</tbody></table></div></div></div></div></div><hr/>";
		
		echo "<div class=\"row\">
					<div class=\"col-lg-12\">
						<div class=\"alert alert-info\" role=\"alert\">
						  List of all students enrolled under BS Computer Engineering, categorized by year level.
						</div>
					</div>
				</div>
				<div class=\"row\">
					<div class=\"col-lg-12\">
						<div class=\"alert alert-warning\" role=\"alert\">
						  Caution: Deleting records in the respective tables will permanently remove the entry in the database.
						</div>
					</div>
				</div>";
			
		//5TH YEAR
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fifth Year</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"tablefifth\" class=\"table\">
		<thead>
		<tr>
			<th style=\"font-size: 0px\">Old Student Number</th>
			<th style=\"font-size: 0px\">ID</th>
			<th>Student Number</th>
			<th>Surname</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>CFAT Score</th>
			<th>Passcode</th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\"></th>
			<th style=\"font-size: 0px\">Year Started</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :fifthyear");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\">" . $row['studnum'] . "</td>
			<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
			<td contentEditable\" class=\"studnum\">" . $row['studnum'] . "</td>
			<td contentEditable class=\"surname\">" . $row['surname'] . "</td>
			<td contentEditable class=\"firstname\">" . $row['firstname'] . "</td>
			<td contentEditable class=\"middlename\">" . $row['middlename'] . "</td>
			<td contentEditable class=\"cfatscore\">" . $row['cfatscore'] . "</td>
			<td contentEditable class=\"passcode\">" . $row['passcode'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-edit material-icons\">save</i></td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\"></td>
		<td class=\"id\" style=\"font-size: 0px\"></td>
		<td class=\"studnum\" contentEditable></td>
		<td class=\"surname\"contentEditable ></td>
		<td class=\"firstname\" contentEditable ></td>
		<td class=\"middlename\" contentEditable ></td>
		<td class=\"cfatscore\" contentEditable ></td>
		<td class=\"passcode\" contentEditable ></td>
		<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td>
		<td class=\"yearstarted\" style=\"font-size: 0px\">" . $fifthyear . "</td></tr>";
		echo "</tbody></table></div></div></div></div></div>";	
	}
?>