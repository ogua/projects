<?php
	include('db.php');
	
	$sql = "INSERT INTO `fertilizer`(`name`,`company`, `purpose`, `Description`, `dates`) VALUES 
	('".$_POST['fname']."','".$_POST['sname']."','".$_POST['purpose']."','".$_POST['decsrp']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
	
?>