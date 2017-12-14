			  <?php	
			  function listEvents() {
				  
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "cpe-timetables";
					
						
						
					//$result = mysqli_query($con,"SELECT * FROM `subjectlist`");
					echo "<div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
									<form method=\"post\">
										<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
											<input class=\"mdl-textfield__input search\" type=\"text\" id=\"filter-table\">
											<label class=\"mdl-textfield__label\" for=\"filter-table\">Filter Year or Section</label>
										</div>
									</form>
								<div class=\"mdl-layout-spacer\"></div>
							   </div>
								<div class=\"mdl-layout-spacer\"></div>
								<table id=\"events\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
								  <thead>
									<tr>
									  <th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"eventname\">Event Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"startdate\">Start Date</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"enddate\">End Date</th>
									  <th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"eventinformation\">Event Information</th>
									  <th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
									</tr>
								  </thead>
								  <tbody class=\"list\">";
								  
								  try {
										$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
										$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$stmt = $conn->prepare("SELECT * from events");
										$stmt->execute();
										
										// set the resulting array to associative
											$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

										foreach(($stmt->fetchAll()) as $row) { 
											echo "<tr>
								      <td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric eventname\">" . $row['eventname'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric startdate\">" . $row['startdate'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric enddate\" >" . $row['enddate'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric eventinformation\" >" . $row['eventinfo'] . "</td>
								    <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
										}
									}
									catch(PDOException $e) {
										echo "Error: " . $e->getMessage();
									}
									
									$conn = null;
								
									echo "<tr class=\"hide\" style=\"display:none;\">
									<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric year\" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
								     <td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
									 <td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
									echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div>";

					echo "<style>
								.table-remove:hover {
								  color: #f00;
								  cursor: pointer;
								}
								.table-add:hover {
								  cursor: pointer;
								  color: #0b0;
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