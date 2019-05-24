<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tồn kho</title>
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
				<button class="btn btn-secondary" style="font-size: 20px; font-family: cursive; margin-top: 30px; margin-left: -230px;">Tồn kho</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px; padding-left: 280px;">
			<div class="col-md-8 col-md-offset-3">
				<table class="table table-hover text-center" style="background: #a5babd; width: 800px;">
					<thead>
						<tr>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng tồn kho</th>
						</tr>
					</thead>
					<tbody>
						<?php 		
							$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
							$sql = "SELECT masp, tensp, SUM(soluongban) AS soluong FROM donhang GROUP BY masp";
								$query = mysqli_query($con, $sql);
								$num = mysqli_num_rows($query);
								$sql1 = "DELETE FROM xuatkho";
								mysqli_query($con, $sql1);
								if($num > 0) {
									while($row = mysqli_fetch_array($query)) {
									$ma = $row['masp'];
									$ten = $row['tensp'];
									$soluong = $row['soluong'];
									$sql2= "INSERT INTO xuatkho (masp, tensp, soluongxuat) VALUES ('$ma', '$ten', '$soluong')";
									mysqli_query($con, $sql2);
									}
								}
								mysqli_set_charset($con, 'UTF8');
								$sql3 = "SELECT nhapkho.masp AS masp, nhapkho.tensp AS tensp, nhapkho.soluong-IF(xuatkho.soluongxuat!=0,xuatkho.soluongxuat,0) AS soluongconlai FROM nhapkho LEFT JOIN xuatkho ON nhapkho.masp=xuatkho.masp ORDER BY soluongconlai DESC";
								$query1 = mysqli_query($con, $sql3);
								$num1 = mysqli_num_rows($query1);
								if($num1 > 0) {
									while($row1 = mysqli_fetch_array($query1)) {
						?>
						<tr>
								<td><?php echo $row1['masp'];?></td>
								<td><?php echo $row1['tensp'];?></td>
								<td><?php echo $row1['soluongconlai'];?></td>
							</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>