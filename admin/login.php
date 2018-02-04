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
        $id = $userClass->userLogin($username,$password);
        if($id){
                $url = 'index.php';
                header("Location: $url"); 
        }else{
            $errorMsgLogin = "<div class=\"alert alert-danger\" role=\"alert\">
						  <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Username/Password not found! Try again.
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
  <body style="background-image: url(/assets/images/login-background.png);">
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
				<div class="panel">
					<div class="panel-heading">
					<img src="/assets/images/login-header.png" style="background: white; max-width:100%;max-height:100%;" />
					</div>
					<div class="panel-body">
						<?php echo $errorMsgLogin; ?>
						<form action="" method="POST" name="login">
								<div class="input-group">
									<span class="input-group-addon" id="username-addon">Username</span>
									<input type="text" class="form-control"  aria-describedby="username-addon" name="username" id="username" required autocomplete="off"/>
								</div>
								<br/>
								<div class="input-group">
									<span class="input-group-addon" id="password-addon">Password</span>
									 <!--placeholder="Password"-->
									<input type="password" class="form-control" aria-describedby="password-addon" name="password" id="password" required autocomplete="off"/>
								</div>
								<br/>
								<input type="submit" value="Sign In" class="btn btn-block"/>
						</form>
					</div>
				</div>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>
	</div>
  </body>
</html>