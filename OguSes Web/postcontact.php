<?php
	include_once('db.php');
	function insertdata($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$name = insertdata($_POST['w3lName']);
	$email = insertdata($_POST['w3lSender']);
	$subject = insertdata($_POST['w3lSubject']);
	$message = insertdata($_POST['w3lMessage']);
	
	if(!FILTER_VAR($email,FILTER_VALIDATE_EMAIL)){
		echo'emailerror';
		exit;
	}
	
	$sql = "INSERT INTO `Contact`(`fullname`, `email`, `subject`, `message`) 
	VALUES ('$name','$email','$subject','$message')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo'success';
	}else{
		echo'failed';
	}
?>