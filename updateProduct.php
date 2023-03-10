<?php
	include('db.php');
	$sql = "UPDATE `products` SET `Quantity` = '".$_POST['tqty']."' WHERE `id` = '".$_POST['drugid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>