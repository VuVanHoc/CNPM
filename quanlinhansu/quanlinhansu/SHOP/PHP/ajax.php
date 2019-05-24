<?php 
	if(isset($_POST['term']))
	{
		$key = $_POST['term'];
		$con = mysqli_connect('127.0.0.1', 'root', '', '_user');
		mysqli_set_charset($con, 'UTF8');
		$sql = "SELECT tensp FROM nhapkho WHERE tensp LIKE '%$key%'";
		$query = mysqli_query($con, $sql); 
		while($row = mysqli_fetch_array($query))
		$data[] = array('label' =>, $row['tensp'] );
	}
	echo json_encode($data);
?>
