<?php
	include_once('db.php');
	$name = $_POST['funame'];
	$email = $_POST['Email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$phone = $_POST['phone'];
	$role = $_POST['role'];
	
	$passHash = password_hash($password,PASSWORD_DEFAULT);
	if(!PASSWORD_VERIFY($password2,$passHash)){
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Password Does Not Match</strong></div>';
		exit;
	}
	
	if(strlen($phone) < 10 || strlen($phone) > 10){
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Phone Number is Invalid</strong></div>';
		exit;
	}
	$sql = "INSERT INTO `users`(`name`, `email`, `password`, `phone`, `role`) 
			VALUES 
			('$name','$email','$passHash','$phone','$role')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>User Registered Successfully!</strong></div>';
	}else{
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Failed to Register User</strong></div>';
	}

?>