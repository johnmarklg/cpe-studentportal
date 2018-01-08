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
		echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
		<div class="panel-heading">Insert New Student Entry</div><div class="panel-body">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Student Number</span>
				<input id="studnum" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Surname</span>
				<input id="surname" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">First Name</span>
				<input id="firstname" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Middle Name</span>
				<input id="middlename" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">CFAT Score</span>
				<input id="cfatscore" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			<br/>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Passcode</span>
				<input id="passcode" type="text" class="form-control" value="" aria-describedby="basic-addon1">
			</div>
			</br>
			<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Insert Student Entry</button>
		</div></div></div></div></div><hr/>';
		
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
		<div class=\"panel-heading\">Fifth Year (<= ". $fifthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
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
			<td>" . $row['studnum'] . "</td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['middlename'] . "</td>
			<td>" . $row['cfatscore'] . "</td>
			<td>" . $row['passcode'] . "</td>
			<td><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td>
			<td style=\"font-size: 0px\" class=\"yearstarted\">" . $row['yearstarted'] . "</td></tr>";
		}
		$conn = null;
		echo "</tbody></table></div></div></div></div></div>";	
	}
?>