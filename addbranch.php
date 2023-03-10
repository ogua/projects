<?php
	include('db.php');
	if(strlen($_POST['bcoNum']) < 10 || strlen($_POST['bcoNum']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}
	
	$sql = "INSERT INTO `Branch`(`name`, `location`, `phone`, `state`, `dates`) VALUES ('".$_POST['bname']."','".$_POST['bloc']."','".$_POST['bcoNum']."','".$_POST['bstate']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>