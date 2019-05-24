<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../../SHOP/CSS/hientrangkho.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title>Tính lương theo tháng</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="border-bottom: 1px solid #ccc; height: 100px;">
			<div class="col-md-12">
				<button class="btn btn-secondary" style="font-size: 20px; font-family: cursive; margin-top: 20px; margin-left: 510px;">Tính lương nhân viên hàng tháng</button>
			</div>
		</div>
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-9 col-md-offset-7">
				<form action="../kekhai.php" method="POST" style=" padding-left: 400px;">
					<div class="form-group">
						<label>Nhập tháng</label>
						<input type="number" name="thang" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nhập năm</label>
						<input type="number" name="nam" class="form-control" required>
					</div>
					<input type="submit" name="submit" value="Tính" class="btn btn-secondary" style="margin-left: 250px; margin-top: 20px;">
				</form>
			</div>
		</div>
	</div>
</body>
</html>