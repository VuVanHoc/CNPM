<?php
	session_start();
	if(isset($_SESSION['username']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhập kho</title>
	<link rel="stylesheet" type="text/css" href="../CSS/nhapkho.css">
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
		<div class="row text-center" style="border-bottom: 1px solid #ccc;  height: 80px;">
			<div class="col-md-2" style="padding-top: 12px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 20px;">
					<i class="fa fa-home"></i>
				</a>
			</div>
			<div class="col-md-10">
				<button class="btn btn-secondary" style="font-size: 21px; font-family: cursive; margin-top: 8px; margin-left: -240px;">NHẬP KHO</button>
			</div>
		</div>        
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-9">
				<form method="POST" style="padding-left: 340px;">
					<div class="form-group">
						<label>Mã nhập</label>
						<input type="text" name="manhap" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input type="text" name="ma" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="ten" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Giá sản phẩm</label>
						<input type="number" name="gia" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Số lượng</label>
						<input type="number" name="soluong" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ngày nhập</label>
						<input type="date" name="ngay" class="form-control" required>
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
						$manhap = $_POST['manhap'];
						$ma = $_POST['ma'];
						$ten = $_POST['ten'];
						$gia = $_POST['gia'];
						$soluong = $_POST['soluong'];
						$ngay = $_POST['ngay'];
						$sql = "INSERT INTO nhapkho (manhap, masp, tensp, gia, soluong, ngaynhap) VALUES ('$manhap', '$ma', N'$ten', '$gia', '$soluong', '$ngay')";
						if(mysqli_query($con, $sql))
						{
							echo '<p class="text-success">Nhập hoàn thành<p>';
							header("refresh:4 url=http://localhost:8080/quanlinhansu/SHOP/PHP/nhapkho.php");
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
	else
	header('location:signin.php');
?>