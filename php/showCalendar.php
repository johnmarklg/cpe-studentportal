			  <?php	
			  function showCalendar() {
				  
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
					
					echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
					<div class="panel-heading">Add New Event/Holiday</div><div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group date"><span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
							<input id="startDate" type="text" class="form-control" value="" aria-describedby="basic-addon1" placeholder="Start Date"></div>
						</div>
						<div class="col-lg-6">
							<div class="input-group date"><span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span>
							<input id="endDate" type="text" class="form-control" value="" aria-describedby="basic-addon2" placeholder="End Date"></div>
						</div>
					</div>
					<br/>
					<div class="input-group"><span class="input-group-addon" id="basic-addon3">Event Name</span>
					<input id="eventName" type="text" class="form-control" value="" aria-describedby="basic-addon3"></div>
					<br/>
					<div class="input-group"><span class="input-group-addon" id="basic-addon4">Event Info</span>
					<textarea id="eventInfo" type="text" class="form-control" value="" aria-describedby="basic-addon4"></textarea></div>
					<br/>';
					echo '</div><div class="panel-footer"><div class="btn-group btn-group-justified" role="group" aria-label="...">
							  <div class="btn-group" role="group">
								<button type="button" id="saveEvent" class="btn btn-default btn-info"><i class="fa fa-fw fa-bullhorn"></i> General Event</button>
							  </div>
							  <div class="btn-group" role="group">
								<button type="button" id="saveHoliday" class="btn btn-default btn-success"><i class="fa fa-fw fa-calendar"></i>Holiday</button>
							  </div>
							</div></div></div></div></div><hr/>';
					
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
						<td contentEditable\">" . $row['title'] . "</td>
						<td contentEditable>" . $row['description'] . "</td>
						<td class=\"startdatePicker\" contentEditable>" . $row['start'] . "</td>
						<td class=\"enddatePicker\" contentEditable>" . $row['end'] . "</td>
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
						<td contentEditable\">" . $row['title'] . "</td>
						<td contentEditable>" . $row['description'] . "</td>
						<td class=\"startdatePicker\" contentEditable>" . $row['start'] . "</td>
						<td class=\"enddatePicker\" contentEditable>" . $row['end'] . "</td>
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
					echo "<script>
								function updateFilter() {
									var options = {
											valueNames: ['eventname', 'startdate', 'enddate', 'eventinformation']
									};
								 var documentTable = new List('events', options);
								}
								
								updateFilter();
								</script>";
	  }
?>