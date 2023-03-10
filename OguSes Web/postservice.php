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
	
	
	$sql = "INSERT INTO `ServiceRequest`(`fullname`, `contact`, `subject`, `message`) 
	VALUES ('$name','$email','$subject','$message')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo'success';
	}else{
		echo'failed';
	}
?>