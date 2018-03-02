<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Administrator') && ($_SESSION['name'][0]<>'Administrator (Elevated)')) {
		header("location: logout.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
	calendar_extra();
?>		
	<style>
			#saveTimetables {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
			}
			  .table-remove:hover {
			  color: #f00;
			  cursor: pointer;
			}
			.table-add:hover {
			  cursor: pointer;
			  color: #0b0;
			}
	</style>

</head>

<body>

    <div id="wrapper">

        <?php admin_nav(); ?>

        <div id="page-wrapper">

            <div class="container-fluid">
				<br/>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					   <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-terminal"></i>  <a href="index.php">Student Portal</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-book"></i> Timetables
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						   <i class="fa fa-fw fa-info-circle"></i> Update available course subjects per year level on every semester.
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-lg-12">
					<div class="row"><div class="col-lg-12"><div class="panel-group"><div class="panel panel-info">
						<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to insert a new class schedule to the list of open subjects.</a></div>
						<div id="collapsePanel" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Course Code</span>
								<select class="form-control" id="code">
							<?php
							require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");		
							
							$conn = getDB('cpe-studentportal');	
		
							$stmt = $conn->prepare("SELECT * FROM `subjects` ORDER BY subjectid ASC");
							$stmt->execute();
									
							foreach(($stmt->fetchAll()) as $row) { 
								echo '<option value="' . $row['subjectid']. '">' . $row['coursecode'] . ' - ' . $row['coursetitle'] . '</option>';
							}
							?>
								</select>
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Section</span>
								<input id="section" type="text" class="form-control formTextbox"  placeholder="ex. A" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Subject Section</span>
								<input id="subjectsection" type="text" class="form-control formTextbox" placeholder="ex. 1A" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Start Time</span>
								<input id="starttime" type="text" class="form-control formTextbox timepicker"  placeholder="ex. 9:00" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">End Time</span>
								<input id="endtime" type="text" class="form-control formTextbox timepicker"  placeholder="ex. 10:00" value="" aria-describedby="basic-addon1">
							</div>
							<hr/>
								<div class="checkbox">
								  <label class="checkbox-inline"><input type="checkbox" class="mon" value="">Monday</label>
								  <label class="checkbox-inline"><input type="checkbox" class="tue" value="">Tuesday</label>
								  <label class="checkbox-inline"><input type="checkbox" class="wed" value="">Wednesday</label>
								</div>
								<div class="checkbox">
								  <label class="checkbox-inline"><input type="checkbox" class="thu" value="">Thursday</label>
								  <label class="checkbox-inline"><input type="checkbox" class="fri" value="">Friday</label>
								  <label class="checkbox-inline"><input type="checkbox" class="sat" value="">Saturday</label>
								</div>								
							<hr/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Building</span>
								<input id="building" type="text" class="form-control formTextbox"  placeholder="ex. COE" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Room Number</span>
								<input id="roomnumber" type="text" class="form-control formTextbox"  placeholder="ex. 220" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Instructor</span>
								<input id="instructor" type="text" class="form-control formTextbox"  placeholder="ex. Engr. Tim McCay" value="" aria-describedby="basic-addon1">
							</div>
							<br/>
							<button type="button" id="buttonAdd" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-calendar"></i>Insert New Schedule</button>
							<script>
							$(document).ready(function(){
								$('.formTextbox').keypress(function(e){
								  if(e.keyCode==13)
								  $('#buttonAdd').click();
								});
							});
							</script>
						</div></div></div></div></div></div><hr/>
						
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-warning" role="alert">
								  <i class="fa fa-fw fa-warning"></i> Caution: Deleting records in the respective tables will permanently remove the entry in the database.
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								</div>
							</div>
						</div>
								
						<div class="panel panel-default">
									<div class="panel-heading" style="text-align: center;" id="myTabs">	
										<ul class="nav nav-pills nav-justified">
											<li class="active">
											<a  href="#1" data-toggle="tab">First Year</a>
											</li>
											<li><a href="#2" data-toggle="tab">Second Year</a>
											</li>
											<li><a href="#3" data-toggle="tab">Third Year</a>
											</li>
											<li><a href="#4" data-toggle="tab">Fourth Year</a>
											</li>
											<li><a href="#5" data-toggle="tab">Fifth Year</a>
											</li>
											<li><a  id="tabAll" href="#0" data-toggle="tab">Show All</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-content">
								<?php	
								require($_SERVER["DOCUMENT_ROOT"] . '/php/showTimetables.php');
								echo showTimetables();
								?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		<!--<form>
				<button type="button" id="saveTimetables" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
		</form>	
-->
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script src="/functions/js/timetables.js"></script>
	<script type="text/javascript">
            $(function () {
                $('#starttime').datetimepicker({
                    format: 'LT'
                });
				$('#endtime').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
		
</body>

</html>