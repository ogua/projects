<?php
	//error_reporting(0);
	if(is_array($_FILES)){
		include_once('db.php');
			function insertdata($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
			
			$fname = insertdata($_POST['fname']);
			$gender = insertdata($_POST['gender']);
			$dateofbirth = insertdata($_POST['dateofbirth']);
			$email = insertdata($_POST['email']);
			$teleph = insertdata($_POST['telep']);
			$image = $_FILES['fileToUpload']['name'];
			$passwrd = $_POST['passw1'];
			$passwrd2 = $_POST['passw2'];
			
			if(strlen($teleph) < 10 || strlen($teleph) > 10){
				echo"phoneerror";
				exit;
			}
			
			$hash = PASSWORD_HASH($passwrd,PASSWORD_DEFAULT);
			if(!password_verify($passwrd2,$hash)){
				echo"password";
				exit;
			}
			
			$tmpimage = $_FILES['fileToUpload']['tmp_name'];
			$source ="images/";
			$target_file = $source.basename($image);	
		
		
			$ext = strtolower(substr($image, strripos($image, '.')+1));
			$filename = round(microtime(true)).mt_rand().'.'.$ext;
		
				if(move_uploaded_file($tmpimage,$source.$filename)){
					$sql3 = "INSERT INTO `Airtest`(`fullname`, `gender`, `dateofbirth`, `email`, `telephone`, `password`, `dates`, `images`) VALUES ('$fname','$gender','$dateofbirth','$email','$teleph','$hash',CURRENT_DATE,'$filename')";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						session_start();
						$_SESSION['email'] = $_POST['email'];
						echo"Successfully";
					}else{
						echo "fail";
					}
				}
			
			
	}
?>