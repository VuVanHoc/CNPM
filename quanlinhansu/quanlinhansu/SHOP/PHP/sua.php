<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa thông tin</title>
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
	<?php
		$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
		mysqli_set_charset($con, 'UTF8');
		$id = $_GET['id']; 
		$sql = "SELECT * FROM nhanvien WHERE id = '$id'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
	?>
	<div class="container-fluid">
		<div class="row text-center" style="border-bottom: 1px solid #ccc; height: 95px;">
			<div class="col-md-2" style="padding-top: 26px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 21px;">
					<i class="fa fa-home"></i>
				</a>				
			</div>
			<div class="col-md-10">
				<button class="btn btn-secondary" style="font-size: 20px; font-family: cursive; margin-top: 25px; margin-left: -210px;">CHỈNH SỬA THÔNG TIN</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-9 col-md-offset-7">
				<form action="" method="POST" style=" padding-left: 400px;">
					<div class="form-group">
						<label>Tên nhân viên</label>
						<input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" required>
					</div>
					<div class="form-group">
						<label>Số ĐT</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];?>" required>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required>
					</div>
					<div class="form-group">
						<label>Ngày sinh</label>
						<input type="date" name="birthday" class="form-control" value="<?php echo $row['birthday'];?>" required>
					</div>
					<div class="form-group">
						<label>Công việc</label>
						<input type="text" name="congviec" class="form-control" value="<?php echo $row['congviec'];?>" required>
					</div>
					<input type="submit" name="submit" value="Sửa" class="btn btn-secondary">
				</form>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<?php
					if(isset($_POST['submit']))
					{
						$ten = $_POST['name'];
						$em = $_POST['email'];
						$dt = $_POST['phone'];
						$dc = $_POST['address'];
						$ns = $_POST['birthday'];
						$cv = $_POST['congviec'];
						$sql1 = "UPDATE nhanvien SET name = '$ten', email = '$em', phone = '$dt', address = '$dc', birthday = '$ns', congviec = '$cv' WHERE id = '$id'";
						mysqli_query($con, $sql1);
						header('location: caidat.php');
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>