<?php
    session_start();
	include('db.php');
	$id = $_SESSION['id'];
	$sql = "UPDATE `volters` SET `firstname` = '".$_POST['fname']."', `lastname` = '".$_POST['lname']."', `email` = '".$_POST['email']."' WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
?>