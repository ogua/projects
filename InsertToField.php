<?php
	include_once("db.php");	
	$sql = "SELECT * FROM `products` WHERE `name` = '".$_POST['seletd']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}

?>