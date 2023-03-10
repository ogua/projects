<?php
	include('db.php');
		$sql = "INSERT INTO `spray`(`name`, `purpose`, `price`, `dates`, `tag`) VALUES 
		('".$_POST['fname']."','".$_POST['suppl']."','".$_POST['price']."',CURRENT_DATE,'insecticide')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>