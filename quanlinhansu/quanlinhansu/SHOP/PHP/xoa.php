<?php
$con = mysqli_connect();
$id = $_GET['id'];
$sql = xóa hàng where id = $id;
mysqli_query($con, $sql);
?>
