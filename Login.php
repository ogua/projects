<?php
	include_once('db.php');
	$sql = "SELECT * FROM `users` WHERE `email` = '".$_POST['Email']."' AND `role` = '".$_POST['role']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		$row = mysqli_fetch_array($query);
		$password = $row['password'];
		if(!password_verify($_POST['password'],$password)){
			echo'User Email or Password Incorrect';
		}else{
			if($_POST['role'] == "Admin"){
				session_start();
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				echo"admin";
			}if($_POST['role'] == "Customer"){
				session_start();
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				echo"customer";
			}if($_POST['role'] == "Hostel"){
				session_start();
				$_SESSION['name'] = $row['name'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				echo"hostelm";
			}
		}
		
	}else{
		echo'User Email or Password Incorrect';
	}
?>