<?php
	include('db.php');
	$sql = "INSERT INTO `training`(`place`, `reason`, `datefrm`, `dateto`, `dates`) VALUES 
	('".$_POST['place']."','".$_POST['puroftr']."','".$_POST['trstart']."','".$_POST['trend']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
	
?>