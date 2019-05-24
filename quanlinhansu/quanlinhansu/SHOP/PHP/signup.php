<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="../CSS/signup.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div id="top">
			<div class="row text-center">
				<div class="col-sm-12">
					<p id="tren">WELCOME TO OUR APPLICATION</p>
					<img src="../IMAGE/logoch.png">
					<p id="duoi">Let's create your account!!!</p>
				</div>
			</div>
		</div>
		<div id="body">
			<div class="row text-center">
				<div class="col-sm-12">
					<form method="POST" class="was-validated">
						<div action="" class="form-group">
							<label for="">User name</label>
							<input class="rounded-sm" type="text" name="txtname" id="txtname" placeholder="Your name" required>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input class="rounded-sm" type="email" name="txtemail" id="txtemail" placeholder="Your email" required>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input class="rounded-sm" type="password" name="txtpw" id="txtpw" minlength="6" placeholder="Your password" required>
						</div>
						<div class="form-group">
							<label for="">Re-password</label>
							<input class="rounded-sm" type="password" name="txtrepw" id="txtrepw" minlength="6" placeholder="Your password" required>
						</div>
						<input  class="btn btn-secondary" type="submit" value="Create" name="btnsubmit">
					</form>
				</div>
			</div>
		</div>
		<div id="chuthich">
			<div class="row text-center">
				<div class="col-sm-12">
					<?php
						 $con = mysqli_connect('127.0.0.1', 'root', '', '_user');
						 if(isset($_POST['btnsubmit']))
						 {
						 	$name = $_POST['txtname'];
						 	$email = $_POST['txtemail'];
						 	$pw = $_POST['txtpw'];
						 	$re_pw = $_POST['txtrepw'];
						 	if($pw!=$re_pw)
						 	{
						 		echo '<p style="color: red">Can not Create this account, the re-password entered is not correct</p>';
						 		header("refresh:10 url=http://localhost:8080/quanlinhansu/SHOP/PHP/Signup.php");
						 	}
						 	else
						 	{
							// 	$pw = md5($_POST['txtpw']);
							//	$re_pw = md5($_POST['txtrepw']);
							 	$sql = "INSERT INTO person (username,email,pass,Re_pass) VALUES (N'$name','$email','$pw','$re_pw')";
							 	if(!mysqli_query($con,$sql))
							 	{
							 		echo '<p style="color: red">Registration failed!</p>';
							 		header("refresh:10 url=http://localhost:8080/quanlinhansu/SHOP/PHP/signup.php");
							 	}
							 	else {
							 		echo '<p class="text-success">Sign up success! Let\'s login</p>';
							 		header("refresh:4 url=http://localhost:8080/quanlinhansu/SHOP/PHP/signin.php");
							 	}
						 	}
						 }
					?>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>
