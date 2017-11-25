			  <?php	
			  function listGrades() {
				  
					require('php/databaseConnection.php');
					
					
					if(isset($_REQUEST["search-table"]))
					{
						if($_REQUEST["stud-num"]=="") {
								$studnum = "00-0000";
						}
						else {
						$studnum = ($_REQUEST["stud-num"]);
						}
					}
					else {
						$studnum = "00-0000";
					}
					
					if ($result = mysqli_query($con, "SHOW TABLES LIKE '". $studnum . "'")) {
						//if it doesn't exist
						if($result->num_rows == 0) {
							$studnum = "00-0000";
						}
					}
					
					$result = mysqli_query($con,"SELECT * FROM students WHERE `studnum` = \"" . $studnum . "\"");
					echo "<div class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
								<table id=\"studentinfo\" class=\"mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp\">
								  <thead>
									<tr>
									<th style=\"font-size: 0px\"class=\"mdl-data-table__cell--non-numeric\">Old Student Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">Surname</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">First Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">Middle Name</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">Student Number</th>
									  <th class=\"mdl-data-table__cell--non-numeric\">CFAT Score</th>
									  <th style=\"font-size: 0px\"class=\"mdl-data-table__cell--non-numeric\">ID</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>";
									
									while($row = mysqli_fetch_array($result)) {
										echo "<td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"id\">" . $row['studnum'] . "</td>
								      <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"surname\">" . $row['surname'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"firstname\">" . $row['firstname'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"middlename\">" . $row['middlename'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"studnum\">" . $row['studnum'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"cfat\">" . $row['cfatscore'] . "</td>
									  <td contentEditable class=\"mdl-data-table__cell--non-numeric\" id=\"id\">" . $row['id'] . "</td>";
									}
									echo "</tr>
								  </tbody>
								</table>
								<div class=\"mdl-layout-spacer\"></div>
								</div>	
							<hr/>
							  <!--<span class=\"mdl-typography--title-color-contrast\">First Year</span>-->
							  <div id=\"grades-table\" class=\"android-screens mdl-grid centeritems\">
							  <div class=\"android-screens mdl-grid centeritems\">
								<div class=\"mdl-layout-spacer\"></div>
									<form method=\"post\">
										<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
											<input class=\"mdl-textfield__input search\" type=\"text\" id=\"filter-table\">
											<label class=\"mdl-textfield__label\" for=\"filter-table\">Filter Table</label>
										</div>
									</form>
								<div class=\"mdl-layout-spacer\"></div>
							   </div>
							  <div class=\"mdl-layout-spacer\"></div>						
								<table id=\"grades\" class=\"mdl-data-table mdl-js-data-tablemdl-shadow--2dp\">
								<thead>
									<tr>
										<th class=\"sort\" data-sort=\"First\" >1st</th>
										<th class=\"sort\" data-sort=\"Second\" >2nd</th>
										<th class=\"sort\" data-sort=\"Third\" >3rd</th>
										<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Code\" >Code</th>
										<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Course Title\" >Course Title</th>
										<th class=\"sort\" data-sort=\"Units\" >Units</th>
										<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Pre-Requisites\" >Pre-Requisites</th>
										<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Co-Requisites\" >Co-Requisites</th>
										<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"Year\" >Year</th>
										<th style=\"font-size: 0px\">id</th>
										</tr>
								  </thead>
								  <tbody class=\"list\">";
								  
					
								  
					//$result = mysqli_query($con,"SELECT * FROM `" . $studnum . "`");
					//SELECT `13-5393`.*, `subjects`.* FROM `13-5393`, `subjects` WHERE `13-5393`.`courseid` = `subjects`.`id
					//joined tables
					$result = mysqli_query($con, "SELECT `" . $studnum . "`.*, `subjects`.* FROM `" . $studnum . "`,`subjects` WHERE `" . $studnum . "`.`courseid` = `subjects`.`id`");
					
					while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td><div class=\"mdl-textfield__input First\" contentEditable style=\"width: 100%; height: 100%;\" id=\"first\">" . $row['1st'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input Second\" contentEditable style=\"width: 100%; height: 100%;\" id=\"second\">" . $row['2nd'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input Third\" contentEditable style=\"width: 100%; height: 100%;\" id=\"third\">" . $row['3rd'] . "</div></td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric Code\"><div  style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric Course Title\"><div  style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
					echo "<td><div class=\"Units\" style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric Pre-Requisites\"><div  style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric Co-Requisites\"><div  style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric Year\"><div  style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
					echo "<td><div class=\"mdl-textfield__input\" style=\"width: 100%; height: 100%; font-size: 0px;\" id=\"courseid\">" . $row['courseid'] . "</div></td>";
					echo "</tr>";
					//if($row['courseid']==4) {
					//	echo "</tr></table><hr/><";
					//}
					}
					echo "</tbody></table>";

					
					echo "<script>
							var options = {
										valueNames: ['First', 'Second', 'Third', 'Code', 'Course Title', 'Units', 'Pre-Requisites', 'Co-Requisites', 'Year']
								};
							var gradesTable = new List('grades-table', options);

							</script>";
					mysqli_close($con);
			  }
?>