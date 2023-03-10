<?php
	include('db.php');
	$role = $_POST['roles'];
	if($role == "admin"){
		$sql = "SELECT * FROM `admin` WHERE `email` = '".$_POST['Cuser']."'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			$row = mysqli_fetch_array($query);
			if(!password_verify($_POST['Cpass'],$row['password'])){
				echo"User email or Password Incorrect!";
			}else{
				session_start();
				$_SESSION['name'] = $row['firstname'];
				$_SESSION['id'] = $row['id'];
				echo"success";
			}
		}else{
			echo"User email or Password Incorrect!";
		}
	}else{
		$sql = "SELECT * FROM `farmers` WHERE `email` = '".$_POST['Cuser']."'";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_num_rows($query);
		if($result > 0){
			$row = mysqli_fetch_array($query);
			if(!password_verify($_POST['Cpass'],$row['password'])){
				echo"User email or Password Incorrect!";
			}else{
				session_start();
				$_SESSION['name'] = $row['fisrtname'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = "farmer";
				echo"volter";
			}
		}else{
			echo"User email or Password Incorrect!";
		}
	}
?>