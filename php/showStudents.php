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
		echo '<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
		<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to insert a new student record to the list of enrolled students.</a></div>
		<div id="collapsePanel" class="panel-collapse collapse">
		<div class="panel-body">
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
		</div></div></div></div></div></div><hr/>';
		
		echo '<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  List of all students enrolled under BS Computer Engineering, categorized by year level.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-warning" role="alert">
						  Caution: Deleting records in the respective tables will permanently remove the entry in the database.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>';
				
		echo '<div class="panel panel-default">
					<div class="panel-heading" style="text-align: center;" id="myTabs">	
						<ul class="nav nav-pills nav-justified">
							<li class="active">
							<a  href="#1" data-toggle="tab">First Year</a>
							</li>
							<li><a href="#2" data-toggle="tab">Second Year</a>
							</li>
							<li><a href="#3" data-toggle="tab">Third Year</a>
							</li>
							<li><a href="#4" data-toggle="tab">Fourth Year</a>
							</li>
							<li><a href="#5" data-toggle="tab">Fifth Year</a>
							</li>
							<li><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
							</li>
						</ul>
					</div>
				</div>';
		
		echo '<div class="tab-content">';
		//5TH YEAR
		echo '<div class="tab-pane" id="5">';
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
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted <= :fifthyear AND studnum <> 00-0000");
		$stmt -> bindParam(':fifthyear', $fifthyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"studnum\">" . $row['studnum'] . "</td>
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
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//4TH YEAR
		echo '<div class="tab-pane" id="4">';
		$fourthyear = $fifthyear + 1;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Fourth Year (= ". $fourthyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
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
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :fourthyear");
		$stmt -> bindParam(':fourthyear', $fourthyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"studnum\">" . $row['studnum'] . "</td>
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
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//3RD YEAR
		echo '<div class="tab-pane" id="3">';
		$thirdyear = $fifthyear + 2;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Third Year (= ". $thirdyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
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
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :thirdyear");
		$stmt -> bindParam(':thirdyear', $thirdyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"studnum\">" . $row['studnum'] . "</td>
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
		echo "</tbody></table></div></div></div></div></div></div>";	
		
		//2ND YEAR
		echo '<div class="tab-pane" id="2">';
		$secondyear= $fifthyear + 3;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">Second Year (= ". $secondyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
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
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :secondyear");
		$stmt -> bindParam(':secondyear', $secondyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"studnum\">" . $row['studnum'] . "</td>
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
		echo "</tbody></table></div></div></div></div></div></div>";
		
		//1ST YEAR
		echo '<div class="active tab-pane" id="1">';
		$firstyear = $fifthyear + 4;
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">First Year (= ". $firstyear . ")</div><div class=\"panel-body\"><div class=\"table-responsive\">
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
		$stmt = $conn->prepare("SELECT * from students WHERE yearstarted = :firstyear");
		$stmt -> bindParam(':firstyear', $firstyear);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"studnum\">" . $row['studnum'] . "</td>
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
		echo "</tbody></table></div></div></div></div></div></div>";
		echo '</div>';
	}
?>