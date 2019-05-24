<?php
	session_start();
	if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Super Market</title>
	<link rel="stylesheet" type="text/css" href="../CSS/myhomepage.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body onload="startTime()">
	<div class="container-fluid">	
		<div class="row" style="height: 70px; margin-bottom: 1px; font-size: 15px;">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md" style="height: 70px;">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="#" class="nav-link" style="margin-left: 40px;">Hi! <?php echo $_SESSION['username'];?></a>
						</li>
						<li class="nav-item" style="padding-top: 10px; margin-left: 60px;">
							<div class="nav-link" id="time" style="color: white;">
							</div>
						</li>
						<li class="nav-item" style="margin-left: 150px; padding-top: 5px;">
							<form class="nav-link" action="timkiem.php" method="POST">
								<input type="text" name="search" autocomplete="off" id="timkiem" placeholder="Tìm mặt hàng" style="width: 240px; font-size: 18px; border-right: 2px solid #999c9e; border-bottom: 2px solid #999c9e; border-radius: 4px;">
								<button style="margin-top: -5px; margin-left: -3px; height: 32.5px;width: 35px; border-radius: 5px;" class="btn btn-secondary" type="submit" name="btnsearch"><span class="glyphicon glyphicon-search"></span></button>
							</form>
						</li>
						<li class="nav-item" style="margin-left: 140px;">
							<a href="trangchu.php" class="nav-link">Trang chủ <span class="glyphicon glyphicon-home"></span></a>
						</li>
						<li class="nav-item" style="margin-left: 17px;">
							<a href="#" data-toggle="tooltip" title="Liên hệ 0982284416 để biết thêm chi tiết - Hoàng Min đẹp trai" class="nav-link">Hỗ trợ <span class="glyphicon glyphicon-earphone"></span></a>
						</li>
						<li class="nav-item" style="margin-left: 15px;">
							<a href="logout.php" class="nav-link">Đăng xuất <span class="glyphicon glyphicon-off"></span></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="row" style="height: 370px; margin-top: 40px; padding-left: 90px;">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Tổng quan" class="text-dark">
					 		<span class="glyphicon glyphicon-align-justify"></span>
					 		<p>Tổng quan</p>
						</a>
					</div>
					<div class="card-body">	
						<a href="../PHP/caidat.php" class="btn" style="height: 160px; margin-top: 20px; padding-top: 40px;"><p>Nhân Viên</p></a>	
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Hàng hóa" class="text-dark">
					 			<span class="fas fa-cart-arrow-down" style="font-size: 26px;"></span>
								<p>Hàng hóa</p>
						</a>
					</div>
					<div class="card-body">
						<a href="../PHP/hangbanchay.php" class="btn"><p>Hàng bán chạy</p></a>
						<a href="../PHP/hangton.php" class="btn" style="margin-top: 20px;"><p>Hàng tồn nhiều</p></a>	
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Giao dịch" class="text-dark">
					 			<span class="fas fa-tasks" style="font-size: 24px;"></span>
								<p>Giao dịch</p>	
						</a>
					</div>
					<div class="card-body">
						<a href="../PHP/donhang	.php" class="btn"><p>Đơn hàng</p></a>
						<a href="../PHP/tongquan.php" class="btn" style="margin-top: 20px;"><p>Tổng hợp</p></a>			
					</div>
				</div>	
			</div>
		</div>
		<div class="row" style="height: 370px; margin-top: -30px; padding-left: 90px;">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Kho hàng" class="text-dark">
					 			<span class="fas fa-landmark" style="font-size: 25px;"></span>
					 			<p>Kho hàng</p>
						</a>
					</div>
					<div class="card-body">
						<a href="../PHP/nhapkho.php" class="btn"><p>Nhập kho</p></a>
						<a href="../PHP/hientrangkho.php" class="btn" style="margin-top: 20px;"><p>Hiện trạng kho</p></a>	
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Doanh thu" class="text-dark">
					 		<span class="fa fa-dollar" style="font-size: 26px;"></span>
								<p>Doanh thu</p>
						</a>
					</div>
					<div id="boba" class="card-body">
						<a href="../PHP/sochi.php" class="btn"><p style="margin-top: 5px;">Số chi</p></a>
						<a href="../PHP/sothu.php" class="btn" style="margin-top: 20px;"><p style="margin-top: 5px;">Số thu</p></a>
						<a href="../PHP/loinhuan.php" class="btn" style="margin-top: 20px;><p style="margin-top: 5px;">Lợi nhuận</p></a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header">
						<a href="#" title="Thiết lập" class="text-dark">
					 			<span class="fa fa-cog" style="font-size: 24px;"></span>
								<p>Thiết lập</p>	
						</a>
					</div>
					<div class="card-body">		
						<a href="#" class="btn"><p>Cài đặt</p></a>
						<a href="#" class="btn" style="margin-top: 20px;"><p>Nâng cấp</p></a>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<style>
		.autocomplete {
  		position: relative;
  		display: inline-block;
		}
		.autocomplete-items {
		 position: absolute;
		 border: 1px solid #d4d4d4;
		 z-index: 99;
		}

		.autocomplete-items div {
		width: 236px;
		padding: 10px;
		cursor: pointer;
		background-color: #fff; 
		border: 1px solid #d4d4d4; 
		}

		/*when hovering an item:*/
		.autocomplete-items div:hover {
		  background-color: #e1c5e8; 
		}

		/*when navigating through the items using the arrow keys:*/
		.autocomplete-active {
		  background-color: #e1c5e8 !important; 
		  color: black; 
		}
	</style>
	<script>
		function startTime() {
		  var today = new Date();
		  var h = today.getHours();
		  var m = today.getMinutes();
		  var s = today.getSeconds();
		  h = checkTime(h);
		  m = checkTime(m);
		  s = checkTime(s);
		  document.getElementById('time').innerHTML =
		  h + ":" + m + ":" + s;
		  var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
		  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		  return i;
		}
	</script>
	<script>
		$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();
		});
		function autocomplete(inp, arr) {
	  	/*the autocomplete function takes two arguments,
	  	the text field element and an array of possible autocompleted values:*/
	  		var currentFocus;
	  		/*execute a function when someone writes in the text field:*/
	  		inp.addEventListener("input", function(e) {
      		var a, b, i, val = this.value;
      		/*close any already open lists of autocompleted values*/
      		closeAllLists();
      		if (!val) { return false;}
      			currentFocus = -1;
      			/*create a DIV element that will contain the items (values):*/
      			a = document.createElement("DIV");
      			a.setAttribute("id", this.id + "autocomplete-list");
      			a.setAttribute("class", "autocomplete-items");
      			/*append the DIV element as a child of the autocomplete container:*/
      			this.parentNode.appendChild(a);
      		/*for each item in the array...*/
      		for (i = 0; i < arr.length; i++) {
        	/*check if the item starts with the same letters as the text field value:*/
        		if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          		/*create a DIV element for each matching element:*/
          			b = document.createElement("DIV");
          			/*make the matching letters bold:*/
          			b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          			b.innerHTML += arr[i].substr(val.length);
          			/*insert a input field that will hold the current array item's value:*/
          			b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          			/*execute a function when someone clicks on the item value (DIV element):*/
          			b.addEventListener("click", function(e) {
              		/*insert the value for the autocomplete text field:*/
              			inp.value = this.getElementsByTagName("input")[0].value;
              			/*close the list of autocompleted values,
              			(or any other open lists of autocompleted values:*/
              			closeAllLists();
          			});
          	a.appendChild(b);
        		}
      		}
  		});
  			/*execute a function presses a key on the keyboard:*/
  			inp.addEventListener("keydown", function(e) {
      		var x = document.getElementById(this.id + "autocomplete-list");
      		if (x) x = x.getElementsByTagName("div");
      		if (e.keyCode == 40) {
        		/*If the arrow DOWN key is pressed,
        		increase the currentFocus variable:*/
        		currentFocus++;
        		/*and and make the current item more visible:*/
        		addActive(x);
      		} else if (e.keyCode == 38) { //up
        		/*If the arrow UP key is pressed,
        		decrease the currentFocus variable:*/
        		currentFocus--;
        		/*and and make the current item more visible:*/
       			 addActive(x);
      		} else if (e.keyCode == 13) {
        		/*If the ENTER key is pressed, prevent the form from being submitted,*/
       			 e.preventDefault();
        		if (currentFocus > -1) {
          			/*and simulate a click on the "active" item:*/
          			if (x) x[currentFocus].click();
        		}
      		}
  		});
  		function addActive(x) {
    		/*a function to classify an item as "active":*/
    		if (!x) return false;
    			/*start by removing the "active" class on all items:*/
    			removeActive(x);
    		if (currentFocus >= x.length) currentFocus = 0;
    		if (currentFocus < 0) currentFocus = (x.length - 1);
    			/*add class "autocomplete-active":*/
    		x[currentFocus].classList.add("autocomplete-active");
  		}
  		function removeActive(x) {
    		/*a function to remove the "active" class from all autocomplete items:*/
    		for (var i = 0; i < x.length; i++) {
      			x[i].classList.remove("autocomplete-active");
   			}
  		}
  		function closeAllLists(elmnt) {
    		/*close all autocomplete lists in the document,
    		except the one passed as an argument:*/
    		var x = document.getElementsByClassName("autocomplete-items");
    		for (var i = 0; i < x.length; i++) {
      			if (elmnt != x[i] && elmnt != inp) {
        			x[i].parentNode.removeChild(x[i]);
      			}
    		}
  		}
  		/*execute a function when someone clicks in the document:*/
  		document.addEventListener("click", function (e) {
      	closeAllLists(e.target); });
		}
		var data = ["Aquafina", "Bánh quy", "Gạo thơm", "Bàn chải đánh răng", "Gia vị nướng", "Kem", "Sữa tươi", "PEPSI"];
		autocomplete(document.getElementById("timkiem"), data);
	</script>
</body>
</html>
<?php
	}
	else {
		header('location:signin.php');
	}
?>