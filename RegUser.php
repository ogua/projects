<?php
	include('db.php');
	if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10){
		echo"PhoneError";
		exit;
	}
	
	$hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['password2'],$hash)){
		echo"passwordError";
		exit;
	}
	
	$sql = "INSERT INTO `users`(`name`, `email`, `password`, `contact`, `role`, `dates`) VALUES 
	('".$_POST['funame']."','".$_POST['Email']."','$hash','".$_POST['phone']."','".$_POST['role']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>