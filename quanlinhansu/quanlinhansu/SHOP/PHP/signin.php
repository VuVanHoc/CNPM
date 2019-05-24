<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		header('location: Trangchu.php');
	}
	else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="../CSS/signin.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  	<script>
		function startTime() {
		  var today = new Date();
		  var h = today.getHours();
		  var m = today.getMinutes();
		  var s = today.getSeconds();
		  m = checkTime(m);
		  s = checkTime(s);
		  document.getElementById('time').innerHTML =
		  h + ":" + m + ":" + s;
		  var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
		  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		  return i;
		}
	</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row text-center" style="height: 300px; padding-top: 40px;">
			<div class="col-md-12" style="font-family: cursive;">
				<p style="font-size: 24px; margin-left: 10px;">CHÀO MỪNG BẠN ĐẾN VỚI ỨNG DỤNG CỦA CHÚNG TÔI</p>
				<img src="../IMAGE/logoch.png">
				<p style="font-size: 20px; margin-top: 10px;">Hãy đăng nhập tài khoản của bạn</p>
			</div>
		</div>
		<div class="row text-center" style="height: 300px; padding-top: 20px;">
			<div class="col-md-12" style="font-family: cursive;">
				<form method="POST" class="was-validated">
					<div class="form-group">
						<label for="">Họ và tên</label>
						<input class="rounded-sm" type="text" name="username" placeholder="Họ tên của bạn" required>
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input class="rounded-sm" id="pw" type="password" name="txtpassword" minlength="6" placeholder="Mật khẩu" required style="margin-left: 4px;">
					</div>
					<div class="form-group form-check">
						<label class="form-check-label">
						<input class="form-check-input rounded-sm" type="checkbox"> Nhớ tôi
						</label>
					</div>
					<input  class="btn btn-secondary" type="submit" name="btnsubmit" value="Đăng nhập">
				</form>
			</div>
		</div>
		<div class="row text-center" style="height: 200px;">
			<div class="col-md-12" style="font-family: cursive;">
				<?php
					$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
					$now = getdate();
					$now["hours"] = $now["hours"] + 5;
					if($now["minutes"]<10)
					{
						$now["minutes"] = "0" . $now["minutes"];
					}
					if($now["seconds"]<10)
					{
						$now["seconds"] = "0" . $now["seconds"];
					}
					if($now["hours"]>=24)
					{
						$now["hours"] = $now["hours"] - 24;
					}
					if($now["hours"]<10)
					{
						$now["hours"] = "0" . $now["hours"];
					}
					$currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
					$currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
					$_SESSION['giobd'] = $now["hours"];
					$_SESSION['phutbd'] = $now["minutes"];
					$_SESSION['giaybd'] = $now["seconds"];
					if(isset($_POST['btnsubmit']))
					{
						$username = $_POST['username'];
						$password = $_POST['txtpassword'];
						$sql = "SELECT * FROM nhanvien WHERE name = N'$username'  AND password = '$password'";
						$query = mysqli_query($con, $sql);
						$num = mysqli_num_rows($query);
						if($num > 0)
						{ 	
							$_SESSION['username'] = $username;
							while($row = mysqli_fetch_array($query))
							{
								$id = $row['id'];
								$_SESSION['id'] = $id;
								$luong = 15000;
								$sql1 = "INSERT INTO giolam (id, ngaylam, giolam, gionghi, luong) VALUES ('$id', '$currentDate','$currentTime','$a', '$luong')";
								$query1 = mysqli_query($con, $sql1);
							}
							
							header('location:trangchu.php');
						}
						else {
							echo '<p class="text-danger">Username or password is incorrect</p>';
							header("refresh:5 url=http://localhost:8080/quanlinhansu/SHOP/PHP/signin.php");
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	};
?>