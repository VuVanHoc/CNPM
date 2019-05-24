<?php
	session_start();
	if(isset($_SESSION['username']))
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhập đơn hàng</title>
	<link rel="stylesheet" type="text/css" href="../CSS/donhang.css">
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
		<div class="row" style="border-bottom: 1px solid #ccc; height: 90px;">
			<div class="col-md-4" style="padding-top: 14px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 22px; margin-left: 50px;">
					<i class="fa fa-home"></i>
				</a>
			</div>
			<div class="col-md-8">
				<button class="btn btn-secondary" style="font-size: 20px; font-family: cursive; margin-top: 15px; margin-left: 120px;">NHẬP ĐƠN HÀNG</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-9 col-md-offset-7">
				<form action="" method="POST" style=" padding-left: 400px;">
					<div class="form-group">
						<label>Mã Đơn</label>
						<input type="text" name="madon" class="form-control" placeholder=". . ." required>
					</div>
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input type="text" name="masp" class="form-control" placeholder=". . ." required>
					</div>
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="tensp" class="form-control" placeholder=". . ." required>
					</div>
					<div class="form-group">
						<label>Số lượng</label>
						<input type="number" id="soluong" name="soluong" class="form-control"  required>
					</div>
					<div class="form-group">
						<label>Đơn giá</label>
						<input type="number" id="dongia" name="dongia" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ngày bán</label>
						<input type="date" name="ngayban" class="form-control" required>
					</div>
					<input type="submit" name="submit" value="Nhập" class="btn btn-secondary" style="margin-top: 100px; margin-left: 2px;">
				</form>
				<button style="margin-left: 402px; margin-top: -215px;" onclick="tongtien()" class="btn btn-secondary" style="margin-top: 10px;">Thành tiền</button>
				<p style="margin-left: 520px; margin-top: -128px;"id="tinhtien"></p>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<?php
					$con = mysqli_connect('127.0.0.1', 'root', '', '_user');

					if(isset($_POST['submit']))
					{
						$madon = $_POST['madon'];
						$masp = $_POST['masp'];
						$tensp = $_POST['tensp'];
						$soluong = $_POST['soluong'];
						$gia = $_POST['dongia'];
						$tongtien = $soluong*$gia;
						$ngayban = $_POST['ngayban'];
						$sql = "INSERT INTO donhang (madon, masp, tensp, soluongban, dongia, tongtien, ngayban) VALUES ('$madon', '$masp', N'$tensp', '$soluong', '$gia','$tongtien', '$ngayban')";
						if(mysqli_query($con, $sql))
						{
							echo '<p class="text-success">Nhập hoàn thành<p>';
							header("refresh:5 url=http://localhost:8080/SHOP/PHP/donhang.php");
						}
					}
				?>
			</div>
		</div>
	</div>
	<script>
		function tongtien() {
		var soluong = parseInt(document.getElementById("soluong").value);
		var dongia = parseInt(document.getElementById("dongia").value);
		var total = soluong*dongia;
		document.getElementById("tinhtien").innerHTML = total + ' đ';
	}
	</script>
</body>
</html>
<?php
	}
	else
	header('location:signin.php');
?>