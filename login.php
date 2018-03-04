<?php

session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/loginfxn.php");
$userClass = new userClass();

$errorMsgLogin = '';

if($_POST){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(strlen(trim($username))>1 && strlen(trim($password))>1){
        $id = $userClass->studentLogin($username,$password);
        if($id){
                $url = 'index.php';
                header("Location: $url"); 
        }else{
            $errorMsgLogin = "<div class=\"alert alert-danger\" role=\"alert\">
						  <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Username/Password incorrect! Try again.
						</div>";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
	announcement_extra();
?>	
</head>

  <body style="background-color: #222222;
  background: repeating-linear-gradient(45deg, #2b2b2b 0%, #2b2b2b 10%, #222222 0%, #222222 50%) 0 / 15px 15px;">
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
				<div class="panel" style="background-color: #343434;">
					<div class="panel-heading">
					<img id="login-header" src="/assets/images/login-header.png" style="max-width:100%;max-height:100%;" />
					<div id="login-note" style="display: none;">
						<ul>
                            <li>
                                If you don't have a password yet, you may claim it at the Computer Engineering Department Office.
                            </li>
                            <li>
                                To protect your privacy, logout and quit your web browser when you finish accessing the services that require authentication.
                                <div style="height: 20px;">&nbsp;</div>
                            </li>
                        </ul>
					</div>
					</div>
					<div class="panel-body">
						<!--<ol class="breadcrumb">
						  <li class="active">Student Portal</li>
						  <li class="active">Log-In</li>
						  <li><a href="#"><a href="#" onclick="showhidenote();">User Guidelines</a></a></li>
						</ol>-->
						<?php echo $errorMsgLogin; ?>
						<form action="" method="POST" name="login">
								<div class="input-group">
									<span class="input-group-addon" id="username-addon">Student Number</span>
									<input type="text" class="form-control"  aria-describedby="username-addon" name="username" id="username" required autocomplete="off"/>
								</div>
								<br/>
								<div class="input-group">
									<span class="input-group-addon" id="password-addon">Password</span>
									 <!--placeholder="Password"-->
									<input type="password" class="form-control" aria-describedby="password-addon" name="password" id="password" required autocomplete="off"/>
								</div>
								<br/>
								<input type="submit" value="Sign In" class="btn btn-success btn-block"/>
						</form>
					</div>
				</div>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>
	</div>
	<script>
        function showhidenote(){
            var dNote = document.getElementById("login-note");
            var dHeader = document.getElementById("login-header");
            if (dNote.style.display == "none") {
                dNote.style.display = "block";
				dHeader.style.display = "none";
            } else {
                dNote.style.display = "none";
				dHeader.style.display = "block";
            }
        }
        if (window.frameElement) {
            window.top.location.reload();
        }
    </script>
  </body>
</html>