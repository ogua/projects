<?php
	//error_reporting(0);
	if(is_array($_FILES)){
		include_once("db.php");

			function insertdata($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
			
			$fname = insertdata($_POST['fname']);
			$uname = insertdata($_POST['uname']);
			$pass = insertdata($_POST['pass1']);
			$pass2 = insertdata($_POST['pass2']);
			$email = insertdata($_POST['email']);
			$phone = $_POST['phonnum'];
			$image = $_FILES['InputFile']['name'];
			
			$passv = password_hash($pass, PASSWORD_DEFAULT);
			if(!PASSWORD_VERIFY($pass2, $passv)){
				echo"passErr";	
				exit;
			}
			
			$tmpimage = $_FILES['InputFile']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
				if($image ==""){
					$sql3 = "INSERT INTO `users`(`fullname`, `username`, `role`, `password`, `email`, `phone`, `image`) 
					VALUES ('$fname','$uname','Admin','$passv','$email','$phone','co.png')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"Successfully";
					}else{
						echo "failed";
					}
				}else{
					if(move_uploaded_file($tmpimage,$source.$filename)){
					$sql3 = "INSERT INTO `users`(`fullname`, `username`, `role`, `password`, `email`, `phone`, `image`) 
					VALUES ('$fname','$uname','Admin','$passv','$email','$phone','$filename')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo"Successfully";
					}else{
						echo "failed";
					}
				}	
				}			
	}
?>