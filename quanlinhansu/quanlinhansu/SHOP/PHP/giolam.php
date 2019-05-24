<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giờ làm</title>
	<link rel="stylesheet" type="text/css" href="../CSS/hientrangkho.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row text-center" style="border-bottom: 1px solid #ccc; height: 95px;">
			<div class="col-md-2" style="padding-top: 26px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 21px;">
					<i class="fa fa-home"></i>
				</a>				
			</div>
			<div class="col-md-10">
				<button class="btn btn-secondary" style="font-size: 20px; font-family: cursive; margin-top: 25px; margin-left: -210px;">GIỜ LÀM</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-9 col-md-offset-7">
				<form action="" method="POST" style=" padding-left: 400px;">
					<div class="form-group">
						<label>Tên nhân viên</label>
						<input type="text" name="ten" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ngày làm</label>
						<input type="date" name="ngay" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Giờ bắt đầu</label>
						<input type="time" name="giobatdau" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Giờ nghỉ</label>
						<input type="time" name="gionghi" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<input type="text" name="ghichu" class="form-control" required>
					</div>
					<input type="submit" name="submit" value="Nhập" class="btn btn-secondary">
				</form>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<?php
				$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
					if(isset($_POST['submit']))
					{
						$ten = $_POST['ten'];
						$ngay = $_POST['ngay'];
						$giobatdau = $_POST['giobatdau'];
						$gionghi = $_POST['gionghi'];
						$ghichu = $_POST['ghichu'];
						$sql = "INSERT INTO giolam (tennv, ngaylam, giobatdau, gionghi, ghichu) VALUES (N'$ten', '$ngay', '$giobatdau', '$gionghi', N'$ghichu')";
						if(mysqli_query($con, $sql))
						{
							echo '<p class="text-success">Nhập xong<p>';
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>