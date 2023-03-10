<?php
	include('db.php');
		$sql = "INSERT INTO `land`(`location`, `size`, `purpose`, `datebought`, `price`, `dates`) 
		VALUES ('".$_POST['fname']."','".$_POST['suppl']."','".$_POST['purpose']."','".$_POST['datebou']."','".$_POST['price']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>