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
?>
	<style>
			.curriculum-remove:hover {
				color: #f00;
				text-decoration: underline;
				cursor: pointer;
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
                                <i class="fa fa-list"></i> Curricula/Curriculums
                            </li>
                        </ol>
						 
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger" role="alert">
						  <i class="fa fa-fw fa-warning"></i> Warning: Deleting curriculums cannot be undone. All dependent records on this curriculum will not be loaded after. Do this at your own risk.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
							<div class="panel-group">
								<div class="panel panel-info">
									<div class="panel-heading"><a data-toggle="collapse" href="#collapsePanel"><i class="fa fa-plus-circle"></i> Click here to add a <strong>New Curriculum</strong>.</a>
									</div>
									<div id="collapsePanel" class="panel-collapse collapse">
										<div class="panel-body">
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">Curriculum Name</span>
												<input id="currname" type="text" class="form-control formTextbox"  placeholder="ex. BSCPE-2008" value="" aria-describedby="basic-addon1">
											</div>
											<br/>
											<button type="button" id="curriculum-add" class="btn btn-default btn-success btn-block"><i class="fa fa-fw fa-list"></i> Add New Curriculum</button>
											<input type="hidden" id="adminid" value="<?php echo $_SESSION['name'][2]?>"></input>
										</div>
									</div>
								</div>
							</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
							<div class="panel-group">
								<div class="panel panel-warning">
									<div class="panel-heading"><a style="color: #fff;" data-toggle="collapse" href="#collapsePanel2"><i class="fa fa-minus-circle"></i> Click here to remove a <strong>Curriculum</strong>.</a>
									</div>
									<div id="collapsePanel2" class="panel-collapse collapse">
										<div class="panel-body">
											<?php
											require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

											$conn = getDB('cpe-studentportal');
											$stmt = $conn->prepare("SELECT * from curriculum");
											$stmt->execute();
											
											echo '<div class="table-responsive"><table id="curricula" class="table table-bordered">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th style="font-size: 0;">Delete</th>
												</tr>
											</thead>
											<tbody>';
											
											foreach(($stmt->fetchAll()) as $row) { 
												echo '<tr>
												<td class="id">' . $row['id'] . '</td>
												<td class="name">' . $row['name'] . '</td>
												<td><span class="curriculum-remove"><i class="fa fa-fw fa-minus-circle"></i> Delete</span></td>
												</tr>';
											}
											
											echo '</tbody></table></div>';

											$conn = null;
											?>
										</div>
									</div>
								</div>
							</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<hr style="margin-top: 0;"/>
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-fw fa-info-circle"></i> You may only update or save one record at a time. The page will reload automatically every time.
						  <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<?php
						require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
				
						$conn = getDB('cpe-studentportal');
					
						echo '<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">Curriculum</span>
								<div class="form-group curriculum">
								  <select class="form-control" id="curriculum" onclick="curr_cache=this.value;">
								  <option selected value="0">Select Curriculum to Modify:</option>';
									
										require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
										$stmt = $conn->prepare("SELECT * FROM  curriculum");
										$stmt -> bindParam(':studnum', $studnum);
										$stmt->execute();
										
										foreach(($stmt->fetchAll()) as $row) { 
											echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
										}
										
								  echo '</select>
								</div>
							</div><br/>';		
						$conn=null;
						?>
					</div>
				</div>
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
	<script src="/functions/js/curriculum.js"></script>	
</body>

</html>
