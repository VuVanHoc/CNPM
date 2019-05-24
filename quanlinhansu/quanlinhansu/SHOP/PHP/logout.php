<?php
  session_start();
  if(isset($_SESSION['username'])) {
			$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
			$id = $_SESSION['id'];
			$now = getdate();
			$now["hours"] = $now["hours"] + 5;
			if($now["hours"]>=24)
			{
				$now["hours"] = $now["hours"] - 24;
			}
			if($now["minutes"]<10)
			{
				$now["minutes"] = "0" . $now["minutes"];
			}
			if($now["seconds"]<10)
			{
				$now["seconds"] = "0" . $now["seconds"];
			}
			if($now["hours"]<10)
			{
				$now["hours"] = "0" . $now["hours"];
			}
			$currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];
			$currentDate = $now["mday"] . "." . $now["mon"] . "." . $now["year"];
			$gbd = $now["hours"] - $_SESSION['giobd'] ;
			$pbd = ($now["minutes"] - $_SESSION['phutbd'])/60;
			$gibd = ($now["seconds"] + 60 - $_SESSION['giaybd'])/3600;
			$tong = $gbd + $pbd + $gibd;
			$tong = round($tong, 2);
			$sql = "UPDATE giolam SET gionghi = '$currentTime', tonggiolam = '$tong' WHERE ngaylam = '$currentDate' AND id ='$id'";
			$query = mysqli_query($con,$sql);

  	unset($_SESSION['username']);
  	header('location:http://localhost:8080/quanlinhansu/shop/php/market.php');
  }
  else {
  	header('location:http://localhost:8080/quanlinhansu/shop/php/market.php');
  }
?>