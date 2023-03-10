<?php
	include('db.php');
		$sql = "INSERT INTO `crop`(`type`, `qauntity`, `location`, `Fetilizer`, `dates`) VALUES 
		('".$_POST['fname']."','".$_POST['suppl']."','".$_POST['location']."','".$_POST['fertil']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>