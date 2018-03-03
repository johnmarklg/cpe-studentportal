			  <?php	
			  function showCalendar() {
				  
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
					
					echo '<div class="panel panel-default">
								<div class="panel-heading" style="text-align: center;" id="myTabs">	
									<ul class="nav nav-pills nav-justified">
										<li class="active">
										<a  href="#1" data-toggle="tab">General Events</a>
										</li>
										<li><a href="#2" data-toggle="tab">Holidays</a>
										</li>
										<li><a  id="tabAll" href="#3" data-toggle="tab">Show All</a>
										</li>
									</ul>
								</div>
							</div>';
					
					echo '<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> When saving, only the changes in the active tab/s will be saved to database.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>';
					echo '<div class="tab-content">';
					//General Events
					echo '<div class="active tab-pane" id="1">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-info\">
					<div class=\"panel-heading\">Manage General Events</div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"eventstable\" class=\"table\">
					<thead>
					<tr>
					<th style=\"font-size: 0px\">ID</th>
					<th>Event Name</th>
					<th>Event Location</th>
					<th>Event Info</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th><i style=\"vertical-align: bottom;\" class=\"material-icons hidden\">add_circle_outline</i></th>
					</tr>
					</thead>
					<tbody class=\"list\">";

					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * from `events`");
					$stmt->execute();

					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>
						<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
						<td \">" . $row['title'] . "</td>
						<td >" . $row['location'] . "</td>
						<td >" . $row['description'] . "</td>
						<td class=\"startdatePicker\" >" . $row['start'] . "</td>
						<td class=\"enddatePicker\" >" . $row['end'] . "</td>
						<td><span class=\"event-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Delete</span></td></tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div></div>";
					
					//Official Holidays
					echo '<div class="tab-pane" id="2">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\">
					<div class=\"panel-heading\">Manage Holidays (Working and Non-working) </div><div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"eventstable\" class=\"table\">
					<thead>
					<tr>
					<th style=\"font-size: 0px\">ID</th>
					<th>Event Name</th>
					<th>Event Location</th>
					<th>Event Info</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th><i style=\"vertical-align: bottom;\" class=\"material-icons hidden\">add_circle_outline</i></th>
					</tr>
					</thead>
					<tbody class=\"list\">";

					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * from `holidays`");
					$stmt->execute();

					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>
						<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
						<td \">" . $row['title'] . "</td>
						<td >" . $row['location'] . "</td>
						<td >" . $row['description'] . "</td>
						<td class=\"startdatePicker\" >" . $row['start'] . "</td>
						<td class=\"enddatePicker\" >" . $row['end'] . "</td>
						<td><span class=\"holiday-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Delete</span></td></tr>";
					}
					$conn = null;

					echo "</tbody></table></div></div></div></div></div></div></div>";
					
					echo "<style>
								.event-remove:hover {
								  color: #f00;
								  cursor: pointer;
								}
								.holiday-remove:hover {
								  color: #f00;
								  cursor: pointer;
								}
							</style>";
	  }
	  function showUserCalendar() {
				  
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
					
					echo '<div class="panel panel-default">
								<div class="panel-heading" style="text-align: center;" id="myTabs">	
									<ul class="nav nav-pills nav-justified">
										<li class="active">
										<a  href="#1" data-toggle="tab">General Events</a>
										</li>
										<li><a href="#2" data-toggle="tab">Holidays</a>
										</li>
										<li><a  id="tabAll" href="#3" data-toggle="tab">Show All</a>
										</li>
									</ul>
								</div>
							</div>';
					
					echo '<div class="tab-content">';
					//General Events
					echo '<div class="active tab-pane" id="1">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-info\">
					<div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"eventstable\" class=\"table\">
					<thead>
					<tr>
					<th style=\"font-size: 0px\">ID</th>
					<th>Event Name</th>
					<th>Event Location</th>
					<th>Event Info</th>
					<th>Start Date</th>
					<th>End Date</th>
					</tr>
					</thead>
					<tbody class=\"list\">";

					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * from `events`");
					$stmt->execute();

					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>
						<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
						<td \">" . $row['title'] . "</td>
						<td >" . $row['location'] . "</td>
						<td >" . $row['description'] . "</td>
						<td class=\"startdatePicker\" >" . $row['start'] . "</td>
						<td class=\"enddatePicker\" >" . $row['end'] . "</td>
						</tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div></div>";
					
					//Official Holidays
					echo '<div class="tab-pane" id="2">';
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-success\">
					<div class=\"panel-body\"><div class=\"table-responsive\">
					<table id=\"eventstable\" class=\"table\">
					<thead>
					<tr>
					<th style=\"font-size: 0px\">ID</th>
					<th>Event Name</th>
					<th>Event Location</th>
					<th>Event Info</th>
					<th>Start Date</th>
					<th>End Date</th>
					</tr>
					</thead>
					<tbody class=\"list\">";

					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * from `holidays`");
					$stmt->execute();

					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

					foreach(($stmt->fetchAll()) as $row) { 
						echo "<tr>
						<td style=\"font-size: 0px\" class=\"id\">" . $row['id'] . "</td>
						<td \">" . $row['title'] . "</td>
						<td >" . $row['location'] . "</td>
						<td >" . $row['description'] . "</td>
						<td class=\"startdatePicker\" >" . $row['start'] . "</td>
						<td class=\"enddatePicker\" >" . $row['end'] . "</td>
						</tr>";
					}
					$conn = null;

					echo "</tbody></table></div></div></div></div></div></div></div>";
	  }
?>