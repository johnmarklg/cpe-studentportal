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
                                <i class="fa fa-music"></i> MMSU Hymn and March
                            </li>
                        </ol>
						<!--<div class="alert alert-success" role="alert">
						  You are currently signed in as <a href=""><?php echo $_SESSION["name"][1]?></a>
						</div>-->
                    </div>
                </div>
                <!-- /.row -->
				
				<?php				
					require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");		
					
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("SELECT * FROM `infotext` WHERE referenceid > 7 and referenceid < 10");
					$stmt->execute();
					$title = array();
					$text = array();
					foreach(($stmt->fetchAll()) as $row) { 
						$title[$row['referenceid']] = $row['title'];
						$text[$row['referenceid']] = $row['text'];
					}
				?>
				<!--EDIT-->
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<textarea id="title1" class="form-control"><?php echo $title[8]; ?></textarea>
							</div>
							<div style="text-align: center;color:#555555;" class="panel-body">
								<textarea id="text1" rows="10" class="form-control"><?php echo $text[8]; ?></textarea>
							</div>
							<div class="panel-footer">
								<button id="btnSave1" class="btn btn-success btn-block">Save Changes</button>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<textarea id="title2" class="form-control"><?php echo $title[9]; ?></textarea>
							</div>
							<div style="text-align: center;color:#555555;" class="panel-body">
								<textarea id="text2" rows="10" class="form-control"><?php echo $text[9]; ?></textarea>
							</div>
							<div class="panel-footer">
								<button id="btnSave2" class="btn btn-success btn-block">Save Changes</button>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<!--PREVIEW-->
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div id="title1a" class="panel-heading" style="text-align: center;">
								<?php echo $title[8]; ?>
							</div>
							<div style="text-align: center;color:#555555;" class="panel-body">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/march.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
								<hr/>
								<div id="text1a">
									<?php echo $text[8]; ?>
								</div>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div id="title2a" class="panel-heading" style="text-align: center;">
								<?php echo $title[9]; ?>
							</div>
							<div style="text-align: center;color:#555555;" class="panel-body">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/hymn.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
								<hr/>
								<div id="text2a">
									<?php echo $text[9]; ?>
								</div>
							</div>
						</div>
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
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script>
		
			$('#title1').keyup(function() {
				var content = $('#title1').val();
				$('#title1a').html(content);
			});
			$('#title2').keyup(function() {
				var content = $('#title2').val();
				$('#title2a').html(content);
			});
			$('#text1').keyup(function() {
				var content = $('#text1').val();
				$('#text1a').html(content);
			});
			$('#text2').keyup(function() {
				var content = $('#text2').val();
				$('#text2a').html(content);
			});
			
			$('#btnSave1').click(function() {
				var $ref8a = $('#title1').val();
				var $ref8b = $('#text1').val();
				var $sel = '1';
				$.ajax({
					type: "POST",
						url: "/php/updateHM.php",
						data: {title: $ref8a, text: $ref8b, sel: $sel},
						cache: false,
						success: function(result){
							//alert(result);
							alert('Successfully updated this section!');
							location.reload();
						}
				});
			});
			$('#btnSave2').click(function() {
				var $ref9a = $('#title2').val();
				var $ref9b = $('#text2').val();
				var $sel = '2';
				$.ajax({
					type: "POST",
						url: "/php/updateHM.php",
						data: {title: $ref9a, text: $ref9b, sel: $sel},
						cache: false,
						success: function(result){
							//alert(result);
							alert('Successfully updated this section!');
							location.reload();
						}
				});
			});
			
			
			$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="hymnmarch.php"]').length;
					  })
					  .addClass('active');
			});
		</script>
	
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
