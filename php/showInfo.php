<?php	
	function showInfo() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from administrators WHERE id = :id");
		$stmt -> bindParam(':id', $_SESSION['name'][2]);
		$stmt->execute();
		foreach(($stmt->fetchAll()) as $row) { 
		echo '<div class="row">
					<div class="col-lg-3">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Profile Picture
							</div>
							<div class="panel-body">
								<a href="/uploads/faculty/' . $row['photolink'] . '" class="swipebox"><img src="/uploads/faculty/' . $row['photolink'] . '" style="height: 100%; width: 100%;"/></a>
							</div>
							<form action="/php/changeAdminPhoto.php" method="post" enctype="multipart/form-data">
							<div class="panel-footer">
								<input type="hidden" value="' . $row['id'] . '" name="refid" id="refid" ></button>
								<input type="file" class="btn btn-block btn-info" name="fileToUpload" id="fileToUpload" ></button>
								<button class="btn btn-block btn-success"><i class="fa fa-fw fa-upload"></i> Change Picture</button>
							</div>
							</form>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Account Information
							</div>
							<div class="panel-body">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Username</span>
								  <input id="username" type="text" class="form-control" value="' . $row['username'] . '" aria-describedby="basic-addon1" autocomplete>
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">Password</span>
								  <input id="password" type="password" class="form-control" value="' . $row['password'] . '" aria-describedby="basic-addon2" autocomplete>
								  <span id="toggle-pass" class="btn input-group-addon" id="basic-addon2">Show</span>
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon3">Email Address</span>
								  <input id="email" type="text" class="form-control" value="' . $row['email'] . '" aria-describedby="basic-addon3" autocomplete>
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon4">Name</span>
								  <input id="fullname" type="text" class="form-control" value="' . $row['name'] . '" aria-describedby="basic-addon4" autocomplete>
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon5">Permission Level</span>
								  <input style="background-color: #ddd;" disabled type="text" class="form-control" value="' . $row['position'] . '" aria-describedby="basic-addon5">
								</div>
								<br/>
								<form method="post">
									<button type="button" id="buttonSaveInfo" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Update Account Info</button>
								</form>
							</div>
						</div>
					</div>
				</div>';
		}
		$conn = null;
	}
?>