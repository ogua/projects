<?php
	include_once('db.php');
	$email = $_POST['Email'];
	$password = $_POST['password'];
	$repass = $_POST['password2'];
	$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `role` = 'Hostel' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		$passhash = PASSWORD_HASH($password, PASSWORD_DEFAULT);
		if(!PASSWORD_VERIFY($repass,$passhash)){
			echo'password does not match';
		}else{
			$supdate = "UPDATE `users` SET `password` = '$passhash' WHERE `email` = '$email' AND `role` = 'Hostel' ";
			$upquery = mysqli_query($conn,$supdate);
			if($upquery){
				echo'Password Updated Successfully';
			}
		}
	}else{
		echo $sql;
		exit;
		echo'Unknown User Email';
	}
?>