<?php
	include('db.php');
	
	$sql = "INSERT INTO `policy`(`name`, `term`, `amouint`, `premium`, `interest`, `bonus`, `dates`) VALUES 
	('".$_POST['pname']."','".$_POST['pterm']."','".$_POST['pamnt']."','".$_POST['famnt']."','".$_POST['pinterest']."','".$_POST['pbonus']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>