<?php
	session_start();
	$id = $_SESSION['id'];
	include('db.php');
	$sql = "SELECT * FROM `admin` WHERE `email` = '".$_POST['email']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		$hash = password_hash($_POST['pwrd'],PASSWORD_DEFAULT);
		if(!password_verify($_POST['cpwrd'],$hash)){
			echo"Failed";
		}else{
		$usql = "UPDATE `admin` SET `password` = '$hash' WHERE `id` = '$id' ";
		$uquery = mysqli_query($conn,$usql);
			if($uquery){
				echo'sucess';
			}else{
				echo'Failed';
			}
		}
	}else{
		echo'Email Dont Exist!';
	}
	
?>