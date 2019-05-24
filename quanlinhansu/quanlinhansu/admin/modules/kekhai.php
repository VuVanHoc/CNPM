<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tính lương theo tháng</title>
	<link rel="stylesheet" type="text/css" href="../../../SHOP/CSS/hientrangkho.css">
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
			<div class="col-md-12">
				<button class="btn btn-secondary" style="font-size: 24px; font-family: cursive; margin-top: 28px;">Tính lương nhân viên hàng tháng</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px; padding-left: 180px;">
			<div class="col-md-8 col-md-offset-3">
				<table class="table table-hover text-center" style="background: #a5babd; width: 1000px;">
					<thead>
						<tr>
							<th>Tên nhân viên</th>
							<th>Email</th>
							<th>SĐT</th>
							<th>Địa chỉ</th>
							<th>Giới tính</th>
							<th>Ngày sinh</th>
							<th>Công việc</th>
							<th>Lương trong tháng <?php echo " "; echo $_POST['thang']; echo " ";?> năm <?php echo " "; echo $_POST['nam'];?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
							mysqli_set_charset($con, 'UTF8');
							$thang = $_POST['thang'];
							$nam = $_POST['nam'];
							$tn = $thang . "." . $nam;
							$sql = "SELECT nhanvien.*, SUM(giolam.tonggiolam*giolam.luong) AS tien FROM nhanvien INNER JOIN giolam  ON nhanvien.id = giolam.id WHERE ngaylam LIKE '%$tn%' GROUP BY nhanvien.id";
							$query = mysqli_query($con, $sql);
							$num = mysqli_num_rows($query);
							if($num > 0)
							{
								while ($row = mysqli_fetch_array($query)) 
								{
						?>
						<tr>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><?php echo $row['gioitinh'];?></td>
							<td><?php echo $row['birthday'];?></td>
							<td><?php echo $row['congviec'];?></td>
							<td><?php echo $row['tien']; echo "đ";?></td>
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