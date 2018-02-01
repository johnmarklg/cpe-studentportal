<?php	
	function showInfo() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from administrators WHERE id = :id");
		$stmt -> bindParam(':id', $_SESSION['name'][2]);
		$stmt->execute();
		foreach(($stmt->fetchAll()) as $row) { 
		echo '<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Account Information
							</div>
							<div class="panel-body">
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Username</span>
								  <input id="username" type="text" class="form-control" value="' . $row['username'] . '" aria-describedby="basic-addon1">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon2">Password</span>
								  <input id="password" type="password" class="form-control" value="' . $row['password'] . '" aria-describedby="basic-addon2">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon3">Email Address</span>
								  <input id="email" type="text" class="form-control" value="' . $row['email'] . '" aria-describedby="basic-addon3">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon4">Name</span>
								  <input id="fullname" type="text" class="form-control" value="' . $row['name'] . '" aria-describedby="basic-addon4">
								</div>
								<br/>
								<form method="post">
									<button type="button" id="buttonSave" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-user"></i>Update Account Info</button>
								</form>
							</div>
						</div>
					</div>
				</div>';
		}
		$conn = null;
	}
?>