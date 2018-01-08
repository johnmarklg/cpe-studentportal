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
							</div></div></div></div></div>';
					
					
					//General Events
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
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
						<td contentEditable\">" . $row['eventname'] . "</td>
						<td contentEditable>" . $row['eventinfo'] . "</td>
						<td class=\"startdatePicker\" contentEditable>" . $row['startdate'] . "</td>
						<td class=\"enddatePicker\" contentEditable>" . $row['enddate'] . "</td>
						<td><i style=\"vertical-align: bottom;\" class=\"event-remove material-icons\">remove_circle_outline</i></td></tr>";
					}
					$conn = null;
					echo "</tbody></table></div></div></div></div></div>";
					
					//Official Holidays
					echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
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
						<td contentEditable\">" . $row['eventname'] . "</td>
						<td contentEditable>" . $row['eventinfo'] . "</td>
						<td class=\"startdatePicker\" contentEditable>" . $row['startdate'] . "</td>
						<td class=\"enddatePicker\" contentEditable>" . $row['enddate'] . "</td>
						<td><i style=\"vertical-align: bottom;\" class=\"holiday-remove material-icons\">remove_circle_outline</i></td></tr>";
					}
					$conn = null;

					echo "</tbody></table></div></div></div></div></div>";
					
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