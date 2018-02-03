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
				
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/march.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
							</div>
							<div class="panel-body">
								<p style="text-align: center;"><span style="color:#0c4b05;"><span style="font-size: large;">MMSU March</span></span></p>
								<hr/>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Dear Mariano Marcos State University</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We now sing of thy real glory</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We adore thee and love thee truly</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Where&#39;er we shall chance to roam</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thy sons and daughters will ever love thee</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Are to thee loyal and true</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Always Alma Mater dear,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Where&#39;er we go, we&#39;ll think of thee.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thou hast been always longing</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For the welfare of thy children</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">And to them, thou hast devoted</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Thy attention and best care</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We soon shall be repaying</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For the cares and kindness true</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We will ever Alma Mater</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Give the best in us for thee.</span></span></p>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
					<div class="col-lg-6">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;">
								<audio controls preload="metadata" style=" width: 100%;">
									<source src="/assets/mp3/hymn.mp3" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
							</div>
							<div class="panel-body">
								<p style="text-align: center;"><span style="color:#0c4b05;"><span style="font-size: large;">MMSU Hymn</span></span></p>
								<hr/>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">MMSU dear</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Alma Mater beloved</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To you we promise our never ending love;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Though fate may bring us</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To other lands afar,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Our hearts and thoughts will always be</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">With you wherever we are.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Hold high the green and gold</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Waving with pride and hope;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">Inspiring us to rise</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reach the greatest heights.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">With your kind guiding hand,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">We know we&#39;ll never fail</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reap success and give the best</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For you and our Fatherland.</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">(Repeat)</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">&nbsp;</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">To reap success and give the best</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">For you and our Fatherland,</span></span></p>
								<p style="text-align: center;"><span style="color:#555555;"><span style="font-size: large;">MMSU...</span></span></p>
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
