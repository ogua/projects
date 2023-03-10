<?php
	include('db.php');
		$hash = password_hash($_POST['pass'],PASSWORD_DEFAULT);
		if(!password_verify($_POST['pass2'],$hash)){
			echo"PassFailed";
			exit;
		}
		$sql = "INSERT INTO `Admin`(`name`, `email`, `password`) VALUES 
		('".$_POST['maunfactname']."','".$_POST['emailadd']."','$hash')";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"success";
		}else{
			echo"User Registeration Failed !";
		}
?>