<?php	
	function showStudents() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		$conn = getDB('cpe-studentportal');
		
		//if first semester
		if (date('m') > 7) {
			$fifthyear = date('y') - 4; 
		} else { //if second semester
			$fifthyear = date('y') - 5;
		}
		
		//ADD ENTRY
		echo '<div class="tab-content">';
		
		//loop 5 times for every year
		for($x=5; $x>0; $x--) {
			echo '<div class="';
			if ($x==1) { echo 'active'; }
			echo	' tab-pane" id="' . $x . '"><input class="search form-control" placeholder="Filter by Name/Student Number"/><br/>';
			echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
			<div class="panel-body"><div class="table-responsive">
			<table id="table' . $x . '" class="table">
			<thead>
			<tr>
				<th>Student Number</th>
				<th>Surname</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Passcode</th>
				<th>Curriculum</th>
				<th style="font-size: 0px"></th>
				<th style="font-size: 0px"></th>
				<th style="font-size: 0px"></th>
				<th style="font-size: 0px">Year Started</th>
			</tr>
			</thead>
			<tbody class="list">';
			$year = $fifthyear + (5 - $x);
			if($x==5) {
				$stmt = $conn->prepare("SELECT students.*, curriculum.name AS currname FROM `students` LEFT JOIN `curriculum` ON students.CurriculumID=curriculum.id WHERE yearstarted <= :year AND studnum <> '00-0000' ORDER BY surname");
			} else if ($x==1) {
				$stmt = $conn->prepare("SELECT students.*, curriculum.name AS currname FROM `students` LEFT JOIN `curriculum` ON students.CurriculumID=curriculum.id WHERE yearstarted >= :year ORDER BY surname");
			} else {
				$stmt = $conn->prepare("SELECT students.*, curriculum.name AS currname FROM `students` LEFT JOIN `curriculum` ON students.CurriculumID=curriculum.id WHERE yearstarted = :year  ORDER BY surname");
		
			}
			$stmt -> bindParam(':year', $year);
			$stmt->execute();

			foreach(($stmt->fetchAll()) as $row) { 
				echo '<tr>
				<td ><a class="studnum" href="/admin/records.php?studnum=' . $row['studnum'] . '">' . $row['studnum'] . '</a></td>
				<td class="surname">' . $row['surname'] . '</td>
				<td class="firstname">' . $row['firstname'] . '</td>
				<td class="middlename">' . $row['middlename'] . '</td>
				<td class="passcode">' . $row['passcode'] . '</td>
				<td>' . $row['currname'] . '</td>
				<td><span>
				<form action="/functions/generateprospectus.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="studnum" id="studnum" value="'. $row['studnum'] . '"></input>
				<input type="hidden" name="currid" id="currid" value="'. $row['CurriculumID'] . '"></input>
				<input type="hidden" name="surname" id="surname" value="'. $row['surname'] . '"></input>
				<input type="hidden" name="firstname" id="firstname" value="'. $row['firstname'] . '"></input>
				<input type="hidden" name="middlename" id="middlename" value="'. $row['middlename'] . '"></input>
				<input type="submit" value="Prospectus" class="btn btn-primary"></input>
				</form>
				</span></td>
				<td><form action="/admin/activity.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="studnum" id="studnum" value="'. $row['studnum'] . '"></input>
				<input type="submit" value="Activity Log" class="btn btn-primary"></input>
				</form></td>
				<td><span class="table-remove btn btn-danger"><i class="fa fa-fw fa-times"></i> Remove</span></td>
				<td style="font-size: 0px" class="yearstarted">' . $row['yearstarted'] . '</td></tr>';
			}
			echo '</tbody></table></div></div></div></div></div></div>';	
		}
		
		echo '</div>'; //closing tab-content
		
		echo "<script>
		var options = {
		  valueNames: [ 'studnum', 'surname', 'firstname', 'middlename' ]
		};
		var listfifth = new List('5', options);
		var listfourth = new List('4', options);
		var listthird = new List('3', options);
		var listsecond = new List('2', options);
		var listfirst = new List('1', options);
		</script>";
		
		$conn = null;
	}
?>