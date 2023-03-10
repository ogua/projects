<?php
	include_once('db.php');
	$email = $_POST['email'];
	$ssql = "SELECT * FROM `Emails` WHERE `email` = '$email'";
	$squery = mysqli_query($conn,$ssql);
	$result = mysqli_num_rows($squery);
	if($result > 0){
		echo'emailerror';
	}else{
		$sql = "INSERT INTO `Emails`(`email`) VALUES ('$email')";
			$query = mysqli_query($conn,$sql);
			if($query){
				echo'success';
			}else{
				echo'failed';
			}
	}
	
	
?>