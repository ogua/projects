<?php
	include('db.php');
	
	$hash =  password_hash($_POST['pwrd'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['cpwrd'],$hash)){
		echo'Password Does not match !';
		exit;
	}
	$sql = "INSERT INTO `volters`(`firstname`, `lastname`, `email`, `password`) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','$hash')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>