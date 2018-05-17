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
			  background-color: #00bc8c;
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
				
				<!--<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-info-circle"></i> Input [Student Number] in the text field below then click [<i class="fa fa-search"></i>] to load student records.
						  <br/>Alternatively, open the student records via the links found in the [Student List] page.
						</div>
					</div>
				</div>-->

				
				<!-- Search -->
				<!--<div class="row">
					<div class="col-lg-12">
					<form method="get">
						<div class="input-group">-->
								<input type="hidden" id="refid" name="refid" value="<?php echo $studnum ?>" class="form-control" placeholder="Search by Student Number...">
								<!--<span class="input-group-btn">
									<button id="search-table" name="search-table" class="btn btn-default"><i class="fa fa-search"></i></button>
								</span>
						</div>
					</form>
					</div>
				</div>--><!-- /.row -->
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12" id="studentprofile">
						<div class="alert alert-info" role="alert">
						  <i class="fa fa-cog fa-spin"></i> Please wait while the data is being fetched from the database. This may take a while...
						</div>
						<?php
						//require($_SERVER["DOCUMENT_ROOT"] . '/php/showStudentRecords.php');
						//echo showStudentRecords($studnum);
						?>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				
				<form>
				<button type="button" id="saveStudentRecords" class="btn btn-lg btn-default btn-primary"><i class="fa fa-floppy-o"></i>  Save</button>
				</form>
					
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
	
	<script>
		$( document ).ready(function() {
			 var $studnum = $('#refid').val();
			 $.ajax({
				type: "POST",
					url: "/php/showStudentProfile.php",
					data: {studnum: $studnum},
					cache: false,
					success: function(result){
						//console.log(result);
						$('#studentprofile').html(result);
					}
				});
		});
		
			function isNumberKey(evt) {
					var charCode = (evt.which) ? evt.which : evt.keyCode;
					if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
						return false;
					
					return true;
			}
	</script>
</body>

</html>