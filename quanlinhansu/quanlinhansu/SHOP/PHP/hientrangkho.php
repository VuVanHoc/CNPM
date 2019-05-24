<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hiện trạng kho</title>
	<link rel="stylesheet" type="text/css" href="../CSS/hientrangkho.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<script type ="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row text-center" style="border-bottom: 1px solid #ccc; background: #d6e4e6; height: 100px;">
			<div class="col-md-2" style="padding-top: 30px;">
				<a href="trangchu.php" class="text-secondary" style="font-size: 20px;">
					<i class="fa fa-home"></i>
				</a>
			</div>
			<div class="col-md-10">
				<button class="btn btn-secondary" style="font-size: 24px; font-family: cursive; margin-top: 25px; margin-left: -220px;">Hiện trạng kho</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px; padding-left: 280px;">
			<div class="col-md-8 col-md-offset-3">
				<table class="table table-hover text-center" style="background: #a5babd; width: 800px;">
					<thead>
						<tr>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
							$sqlx = "SELECT masp, tensp, SUM(soluongban) AS soluong, dongia FROM donhang GROUP BY masp";
							$queryx = mysqli_query($con, $sqlx);
							$numx = mysqli_num_rows($queryx);
							$sql1 = "DELETE FROM xuatkho";
							mysqli_query($con, $sql1);
							if($numx > 0) {
								while($rowx = mysqli_fetch_array($queryx)) {
									$ma = $rowx['masp'];
									$ten = $rowx['tensp'];
									$soluong = $rowx['soluong'];
									$giaban = $rowx['dongia'];
									$sql2= "INSERT INTO xuatkho (masp, tensp, soluongxuat, giaban) VALUES ('$ma', '$ten', '$soluong','$giaban')";
									mysqli_query($con, $sql2);
								}
							}
							$sqln = "SELECT masp, tensp, SUM(soluong) AS soluong, gia FROM nhapkho GROUP BY masp";
							$queryn = mysqli_query($con, $sqln);
							$numn = mysqli_num_rows($queryn);
							$sqlnk = "DELETE FROM tongnhap";
							mysqli_query($con, $sqlnk);
							if($numn > 0) {
								while($rown = mysqli_fetch_array($queryn)) {
									$ma1 = $rown['masp'];
									$ten1 = $rown['tensp'];
									$soluong1 = $rown['soluong'];
									$gianhap = $rown['gia'];
									$sqlnvk = "INSERT INTO tongnhap (masp, tensp, soluongnhap, gianhap) VALUES ('$ma1', '$ten1', '$soluong1','$gianhap')";
									mysqli_query($con, $sqlnvk);
								}
							}
							mysqli_set_charset($con, 'UTF8');
							$sql3 = "SELECT tongnhap.masp AS masp, tongnhap.tensp AS tensp, tongnhap.soluongnhap-IF(xuatkho.soluongxuat!=0,xuatkho.soluongxuat,0) AS soluongconlai FROM tongnhap LEFT JOIN xuatkho ON tongnhap.masp=xuatkho.masp";
							$query1 = mysqli_query($con, $sql3);
							$num1 = mysqli_num_rows($query1);
							$sqlk = "DELETE FROM kho";
							mysqli_query($con, $sqlk);
							if($num1 > 0) {
								while($row1 = mysqli_fetch_array($query1)) {
									$ma2= $row1['masp'];
									$ten2 = $row1['tensp'];
									$soluong2 = $row1['soluongconlai'];
									$sql4 = "INSERT INTO kho (masp,tensp,soluong) VALUES ('$ma2','$ten2','$soluong2')";
									mysqli_query($con, $sql4);
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