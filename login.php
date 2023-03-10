<?php
	include('db.php');
		if($_POST['role'] == "Admin" ){
			$sql = "SELECT * FROM `admin` WHERE `email`  = '".$_POST['uemail']."' ";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if($result > 0){
			   $row = mysqli_fetch_array($query);
			   $pawrd = $row['password'];
			   if(!password_verify($_POST['upawrd'],$pawrd)){
				echo"loginfailed";
			   }else{
				    session_start();
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					echo"adminsucces";
			   }
			}else{
				echo"loginfailed";
			}
		}else{
			$sql = "SELECT * FROM `users` WHERE `email`  = '".$_POST['uemail']."' ";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if($result > 0){
			   $row = mysqli_fetch_array($query);
			   $pawrd = $row['password'];
			   if(!password_verify($_POST['upawrd'],$pawrd)){
				echo"loginfailed";
			   }else{
				    session_start();
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					echo"success";
			   }
			}
		}
?>