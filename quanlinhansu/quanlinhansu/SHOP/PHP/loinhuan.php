<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lợi nhuận</title>
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
		<div class="row text-center" style="border-bottom: 1px solid #ccc; background: #d6e4e6; height: 100px;">
			<div class="col-md-2" style="padding-top: 32px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 20px;">
					<i class="fa fa-home"></i>
				</a>
			</div>
			<div class="col-md-10">
				<button class="btn btn-secondary" style="font-size: 18px; font-family: cursive; margin-top: 32px; margin-left: -220px;">LỢI NHUẬN</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px; padding-left: 230px;">
			<div class="col-md-8 col-md-offset-3">
				<table class="table table-hover text-center" style="background: #a5babd; width: 900px;">
					<thead>
						<tr>
							<th>Ngày bán</th>
							<th>Mã đơn</th>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá mua</th>
							<th>Giá bán</th>
							<th>Tiền lãi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
							mysqli_set_charset($con, 'UTF8');
							$sql = "SELECT *, tongnhap.gianhap AS giamua FROM donhang INNER JOIN tongnhap ON donhang.masp = tongnhap.masp";
							$query = mysqli_query($con, $sql);
							$num = mysqli_num_rows($query);
							if($num > 0) {
								while($row = mysqli_fetch_array($query)) {
						?>
						<tr>
							<?php $lai = $row['soluongban']*($row['dongia']-$row['giamua']);?>
							<td><?php echo $row['ngayban'];?></td>
							<td><?php echo $row['madon'];?></td>
							<td><?php echo $row['masp'];?></td>
							<td><?php echo $row['tensp'];?></td>
							<td><?php echo $row['soluongban'];?></td>
							<td><?php echo $row['giamua'];?></td>
							<td><?php echo $row['dongia'];?></td>
							<td><?php echo $lai ?></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row" style="margin-top: 40px; margin-left: 850px;">
			<div class="col-md-8">
				<form method="POST">
					<input type="submit" name="submit" value="Tổng Lãi" class="btn btn-secondary">
				</form>
			</div>
			<div class="col-md-4" style="margin-left: -215px; margin-top: 7px;">
				<?php 
					if(isset($_POST['submit']))
					{
						$sql1 = "SELECT SUM(soluongban*(donhang.dongia-nhapkho.gia)) AS total FROM donhang INNER JOIN nhapkho ON donhang.masp=nhapkho.masp";
						$query1 = mysqli_query($con, $sql1);
						$num1 = mysqli_num_rows($query1);
						if($num1 > 0) {
							while($row1 = mysqli_fetch_array($query1)) {
				?>
				<p><?php echo $row1['total']; echo ' đ'; ?></p>
				<?php
							}
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>