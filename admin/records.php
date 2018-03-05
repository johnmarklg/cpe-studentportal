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

if(isset($_GET['studnum'])){ $studnum = $_GET['studnum']; } else { $studnum='';}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
?>	
	<style>
			#saveStudentRecords {
			  position: fixed;
			  display: block;
			  right: 0;
			  bottom: 0;
			  margin-right: 40px;
			  margin-bottom: 40px;
			  z-index: 900;
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
                                <i class="fa fa-table"></i> Student Records
                            </li>
                        </ol> 
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-info-circle"></i> To add a new student entry, you can fill up the empty fields below then press [Enter] or click the <i class="fa fa-fw fa-save"></i> to create.
						  <br/>Make sure that no record is currently loaded or it will be overwritten.
						</div>
					</div>
				</div>

				
				<!-- Search -->
				<div class="row">
					<div class="col-lg-12">
					<form method="post">
						<div class="input-group">
								<input type="text" id="stud-num" name="stud-num" value="<?php echo $studnum ?>" class="form-control" placeholder="Search by Student Number...">
								<span class="input-group-btn">
									<button id="search-table" name="search-table" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<!-- /.row -->
				<hr/>
				<div class="row">
					<div class="col-lg-12">
						<?php
						require($_SERVER["DOCUMENT_ROOT"] . '/php/showStudentRecords.php');
						echo showStudentRecords($studnum);
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			  <small hidden id="adminid"><?php echo ($_SESSION['name'][2]); ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
    </div>
    <!-- /#wrapper -->
	
	<script src="/assets/js/jquery.tabletojson.min.js"></script>
	<script src="/assets/js/arrow-table.min.js"></script>
	<script src="/functions/js/records.js"></script>
</body>

</html>