<?php
	include_once('db.php');
	$sql = "SELECT `password` FROM `users` WHERE `email` = '".$_POST['Email']."' AND `role` = '".$_POST['role']."' ";
	$query = mysqli_query($conn,$sql);
	if($query){
		$row = mysqli_fetch_array($query);
		$password = $row['password'];
			if(!password_verify($_POST['password'],$password)){
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Username Or Password Incorrect</strong></div>';
			}else{
				if($_POST['role'] == "Customer"){
					header("customer.php");
				}if($_POST['role'] == "Hostel"){
					header("hostel.php");
				}if($_POST['role'] == "Admin"){
					header("admin.php");
				}
			}
	}else{
		echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" 				arialabel="close">&times;</a><strong>Username Or Password Incorrect</strong></div>';
	}
?>