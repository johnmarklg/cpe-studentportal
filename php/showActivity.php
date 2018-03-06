<?php	
	function showActivity() {			

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//get search result if it's clicked
		if(isset($_POST["studnum"])) {
			$studnum = $_POST["studnum"];
		} else if(isset($_REQUEST["search-table"]))
		{
			$studnum = ($_REQUEST["refid"]);
		} else {
			$studnum = '0';
		}
		
		$conn = getDB('cpe-studentportal');
							
		
		if($studnum <> '0') {
			echo '<div class="row"><div class="col-lg-12"><div class="panel panel-primary"><div class="panel-heading">Student Info</div><div class="panel-body">
				<div class="table-responsive"><table id="studentinfo" class="table"><thead><tr><th>Surname</th><th>First Name</th>
				<th>Middle Name</th><th>Student Number</th><th>Year Level</th></tr></thead><tbody><tr>';

			$stmt = $conn->prepare("SELECT * FROM students WHERE `studnum` = :studnum");
			$stmt -> bindParam(':studnum', $studnum);
			$stmt->execute();

			//if first semester
			if (date('m') > 7) {
				$fifthyear = date('y') - 4; 
			} else { //if second semester
				$fifthyear = date('y') - 5;
			}

			foreach(($stmt->fetchAll()) as $row) { 
					$yearlevel = $fifthyear - $row['yearstarted'] + 5;
					$printstudnum = $row['studnum'];
				
					echo '<td id="surname">' . $row['surname'] . '</td>
						  <td id="firstname">' . $row['firstname'] . '</td>
						  <td id="middlename">' . $row['middlename'] . '</td>
						  <td id="studnum">' . $studnum . '</td>
						  <td>' . $yearlevel . '</td>';
						  
					echo '</tr></tbody></table></div></div></div>';	
			}
			
			$stmt = $conn->prepare("SELECT activitylog.*, administrators.name FROM activitylog 
			LEFT JOIN administrators
			ON activitylog.userid = administrators.id
			WHERE userid = :studnum ORDER BY timestamp DESC LIMIT 25");
			$stmt -> bindParam(':studnum', $studnum);
			$stmt->execute();
			
			foreach(($stmt->fetchAll()) as $row) { 
					echo '<div class="panel panel-info"><div class="panel-body">';
					if($row['action'] == 1) {
						echo 'Logged in to Student Portal at ' . $row['timestamp'];
					} else if($row['action'] == 3) {
						echo 'Requested a <a href="/admin/profilereq.php">Personal Profile Update</a> at ' . $row['timestamp'];
					} else if($row['action'] == 23) {
						echo 'Commented at a <a href="/admin/post.php?postID=' . $row['target'] . '">post</a> at ' . $row['timestamp'];
					}
					echo '</div>
					</div>';
			}
		}
		
		$conn = null;
	}
	
	function showAdminActivity() {			

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//get search result if it's clicked
		if(isset($_POST["refid"])) {
			$adminid = $_POST["refid"];
		} else if(isset($_REQUEST["search-table"]))
		{
			$adminid = ($_REQUEST["refid"]);
		} else {
			$adminid = '0';
		}
		
		$conn = getDB('cpe-studentportal');
							
		
		if($adminid <> '0') {
			$stmt = $conn->prepare("SELECT * FROM administrators WHERE `id` = :adminid");
			$stmt -> bindParam(':adminid', $adminid);
			$stmt->execute();

			echo '<div class="row"><div class="col-lg-12"><div class="panel panel-primary"><div class="panel-heading">User Information</div>
			<div class="panel-body">
			<div class="col-lg-2"></div>
			<div class="col-lg-10"></div>';

			
			foreach(($stmt->fetchAll()) as $row) { 
				echo '<div class="row">
						<div class="col-lg-3">
							<div class="panel panel-primary">
								<div class="panel-body">
									<img src="/uploads/faculty/' . $row['photolink'] . '" style="height: 100%; width: 100%;"/>
								</div>
							</div>
						</div>
						<div class="col-lg-9">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1">Username</span>
									  <input id="username" type="text" style="background-color: #ddd;" disabled  class="form-control" value="' . $row['username'] . '" aria-describedby="basic-addon1" autocomplete>
									</div>
									<br/>
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon4">Name</span>
									  <input id="fullname" type="text" style="background-color: #ddd;" disabled  class="form-control" value="' . $row['name'] . '" aria-describedby="basic-addon4" autocomplete>
									</div>
									<br/>
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon5">Permission Level</span>
									  <input style="background-color: #ddd;" disabled type="text" class="form-control" value="' . $row['position'] . '" aria-describedby="basic-addon5">
									</div>
								</div>
							</div>
						</div>
					</div>';
			}
			
			$stmt = $conn->prepare("SELECT activitylog.*, students.surname, students.firstname, students.middlename, administrators.name
			FROM activitylog 
			LEFT JOIN administrators
			ON activitylog.target = administrators.id
            LEFT JOIN students
        	ON students.studnum = activitylog.target
            WHERE userid = :adminid ORDER BY timestamp DESC LIMIT 50");
			$stmt -> bindParam(':adminid', $adminid);
			$stmt->execute();
			
			foreach(($stmt->fetchAll()) as $row) { 
					echo '<div class="panel panel-info"><div class="panel-body">';
					if($row['action'] == 2) {
						echo 'Logged in to Student Portal at ' . $row['timestamp'];
					} else if($row['action'] == 4) {
						echo 'Approved a <a href="/admin/profilereq.php">Personal Profile Update</a> by <a href="/admin/records.php?studnum=' . $row['target'] . '">' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ['. $row['target']. ']</a> at ' . $row['timestamp'];
					} else if($row['action'] == 5) {
						echo 'Modified the records of <a href="/admin/records.php?studnum=' . $row['target']. '">' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' [' . $row['target']. ']</a> at ' . $row['timestamp'];
					} else if($row['action'] == 6) {
						echo 'Posted an <a href="/admin/announcements.php">Announcement</a> at ' . $row['timestamp'];
					} else if($row['action'] == 7) {
						echo 'Approved an <a href="/admin/post.php?postID=' . $row['target'] . '">announcement</a> at ' . $row['timestamp'];
					} else if($row['action'] == 8) {
						if($row['userid'] == $row['target']) {
							echo 'Deleted <a href="/admin/announcements.php">Announcement</a> at ' . $row['timestamp'];
						} else {
							echo 'Deleted an <a href="/admin/announcements.php">Announcement</a> by ' . $row['name'] . ' at ' . $row['timestamp'];
						}
					} else if($row['action'] == 9) {
						echo 'Added a new <a href="/admin/calendar.php">event/holiday</a> entry titled <i>' . $row['target']. '</i> in the calendar at ' . $row['timestamp'];
					} else if($row['action'] == 10) {
						echo 'Deleted an <a href="/admin/calendar.php">event/holiday</a> entry   titled <i>' . $row['target']. '</i> in the calendar at ' . $row['timestamp'];
					} else if($row['action'] == 11) {
						echo 'Added a new <a href="/admin/records.php?studnum=' . $row['target'] . '">student entry</a> with [' . $row['target']. '] at ' . $row['timestamp'];
					} else if($row['action'] == 12) {
						echo 'Removed <a href="/admin/records.php?studnum=' . $row['target'] . '">student entry</a> with [' . $row['target']. '] at ' . $row['timestamp'];
					} else if($row['action'] == 17) {
						echo 'Added a new payment/transaction named <i>' . $row['target'] . '</i> at ' . $row['timestamp'];
					} else if($row['action'] == 18) {
						echo 'Removed a payment/transaction named <i>' . $row['target'] . '</i> at ' . $row['timestamp'];
					} else if($row['action'] == 19) {
						echo 'Updated <a href="/org/statement.php?studnum=' . $row['target'] . '">financial accountabilities</a> of <a href="/admin/records.php?studnum=' . $row['target']. '">' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' [' . $row['target']. ']</a> at ' . $row['timestamp'];
					} else if($row['action'] == 23) {
						echo 'Commented at a <a href="/admin/post.php?postID=' . $row['target'] . '">post</a> at ' . $row['timestamp'];
					} else if($row['action'] == 24) {
						echo 'Set a <a href="/admin/post.php?postID=' . $row['target'] . '">post</a> to <i>show</i> in the bulletin at ' . $row['timestamp'];
					} else if($row['action'] == 25) {
						echo 'Set a <a href="/admin/post.php?postID=' . $row['target'] . '">post</a> to <i>not show</i> in the bulletin at ' . $row['timestamp'];
					} else if($row['action'] == 26) {
						echo 'Dismissed a <a href="/admin/post.php?postID=' . $row['target'] . '">post</a> from the selection of posts/announcements to show or hide at ' . $row['timestamp'];
					} else if($row['action'] == 27) {
						echo 'Added a <a href="/admin/records.php?studnum=' . $row['target'] . '">student</a> on the list of organizational officers at ' . $row['timestamp'];
					} else if($row['action'] == 28) {
						echo 'Removed a <a href="/admin/records.php?studnum=' . $row['target'] . '">student</a> on the list of organizational officers at ' . $row['timestamp'];
					}
					echo '</div>
					</div>';
			}
		}
		
		$conn = null;
	}
?>