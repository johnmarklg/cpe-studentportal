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
                                <i class="fa fa-university"></i> General Information
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php				
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");		
					
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * FROM `infotext` WHERE referenceid > 1 and referenceid < 8");
					$stmt->execute();
					$title = array();
					$text = array();
					foreach(($stmt->fetchAll()) as $row) { 
						$title[$row['referenceid']] = $row['title'];
						$text[$row['referenceid']] = $row['text'];
					}
				?>
						
				<!--EDIT1-->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab1">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#1" data-toggle="tab"><textarea id="title1" class="form-control"><?php echo $title[2]; ?></textarea></a>
									</li>
									<li><a href="#2" data-toggle="tab"><textarea id="title2" class="form-control"><?php echo $title[3]; ?></textarea></a>
									</li>
									<li><a href="#3" data-toggle="tab"><textarea id="title3" class="form-control"><?php echo $title[4]; ?></textarea></a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="1">
									<textarea id="text1" cols="40" rows="5" class="form-control"><?php echo $text[2]; ?></textarea>
								</div>
								<div class="tab-pane" id="2">
									<textarea id="text2" cols="40" rows="5" class="form-control"><?php echo $text[3]; ?></textarea>
								</div>
								<div class="tab-pane" id="3">
									<textarea id="text3" cols="40" rows="5" class="form-control"><?php echo $text[4]; ?></textarea>
								</div>
							</div>
							<div class="panel-footer">
								<button id="btnSave1" class="btn btn-success btn-block">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
				<!--PREVIEW 1-->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab2">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  id="1a" href="#1b" data-toggle="tab"><?php echo $title[2]; ?></a>
									</li>
									<li><a id="2a" href="#2b" data-toggle="tab"><?php echo $title[3]; ?></a>
									</li>
									<li><a id="3a" href="#3b" data-toggle="tab"><?php echo $title[4]; ?></a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="1b">
									<?php echo $text[2]; ?>
								</div>
								<div class="tab-pane" id="2b">
									<?php echo $text[3]; ?>
								</div>
								<div class="tab-pane" id="3b">
									<?php echo $text[4]; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr/>
				
				<!--EDIT 2-->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab3">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#4" data-toggle="tab"><textarea id="title4" class="form-control"><?php echo $title[5]; ?></textarea></a>
									</li>
									<li><a href="#5" data-toggle="tab"><textarea id="title5" class="form-control"><?php echo $title[6]; ?></textarea></a>
									</li>
									<li><a href="#6" data-toggle="tab"><textarea id="title6" class="form-control"><?php echo $title[7]; ?></textarea></a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="4">
									<textarea cols="40" rows="5" id="text4" class="form-control"><?php echo $text[5]; ?></textarea>
								</div>
								<div class="tab-pane" id="5">
									<textarea cols="40" rows="5" id="text5" class="form-control"><?php echo $text[6]; ?></textarea>
								</div>
								<div class="tab-pane" id="6">
									<textarea cols="40" rows="5" id="text6" class="form-control"><?php echo $text[7]; ?></textarea>
								</div>
							</div>
							<div class="panel-footer">
								<button id="btnSave2" class="btn btn-success btn-block">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
				<!--PREVIEW 2-->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab4">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  id="4a" href="#4b" data-toggle="tab"><?php echo $title[5]; ?></a>
									</li>
									<li><a id="5a" href="#5b" data-toggle="tab"><?php echo $title[6]; ?></a>
									</li>
									<li><a id="6a" href="#6b" data-toggle="tab"><?php echo $title[7]; ?></a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="4b">
									<?php echo $text[5]; ?>
								</div>
								<div class="tab-pane" id="5b">
									<?php echo $text[6]; ?>
								</div>
								<div class="tab-pane" id="6b">
									<?php echo $text[7]; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		<script src="/functions/js/geninfo.js"></script>
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
