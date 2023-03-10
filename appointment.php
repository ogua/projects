<?php
	include_once('db.php');
	$name = $_POST['Name'];
	$email = $_POST['Email'];
	$phone = $_POST['phone'];
	$dates = $_POST['dates'];
	$msg = $_POST['msgs'];
		if(strlen($phone) < 10 || strlen($phone) > 10){
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Phone Number is Invalid</strong></div>';
		exit;
	}
	$sql = "INSERT INTO `Apponitments`(`name`, `email`, `phone`, `msg`, `dates`) VALUES 
			('$name','$email','$phone','$msg','$dates')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo'success';
	}else{
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Failed to Sub,it Appointment</strong></div>';
	}

?>