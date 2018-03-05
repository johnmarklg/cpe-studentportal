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
					<th>Contact Number</th>
					<th style="font-size: 0;"></th>
				</tr>
				</thead>
				<tbody class="list">';
				$year = $fifthyear + (5 - $x);
				if($x==5) {
					$stmt = $conn->prepare("SELECT * from `students` WHERE SUBSTRING(studnum,1,2) <= :year AND studnum <> 00-0000 ORDER BY surname");
				} else if ($x==1) {
					$stmt = $conn->prepare("SELECT * from `students`  WHERE SUBSTRING(studnum,1,2) >= :year AND studnum <> 00-0000 ORDER BY surname");
				} else {
					$stmt = $conn->prepare("SELECT * from `students`  WHERE SUBSTRING(studnum,1,2) = :year AND studnum <> 00-0000 ORDER BY surname");
			}
			$stmt -> bindParam(':year', $year);
			$stmt->execute();

			foreach(($stmt->fetchAll()) as $row) { 
				echo '<tr>
				<td class="studnum"><a href="statement.php?studnum=' . $row['studnum'] . '">' . $row['studnum'] . '</a></td>
				<td class="surname">' . $row['surname'] . '</td>
				<td class="firstname">' . $row['firstname'] . '</td>
				<td class="middlename">' . $row['middlename'] . '</td>
				<td>' . $row['ContactNo'] . '</td>
				<td><a class="showReceipt btn btn-info" href="/functions/generatereceipt.php?studnum=' . $row['studnum'] . '"><i class="fa fa-print"></i> E-Receipt</a></td></tr>';
			}
			echo '</tbody></table></div></div></div></div></div></div>';
		}
		
		
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
		echo '</div>';
	}
?>