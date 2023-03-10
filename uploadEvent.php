<?php
	include('db.php');
	$image = $_FILES['InputFile']['name'];
	$tmpimage = $_FILES['InputFile']['tmp_name'];
	$source ="images/";
	$target_file = $source.basename($image);	
	$ext = strtolower(substr($image, strripos($image, '.')+1));
	$filename = round(microtime(true)).mt_rand().'.'.$ext;
	
	$hash =  password_hash($_POST['pwrd'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['cpwrd'],$hash)){
		echo'Password Does not match !';
		exit;
	}
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "INSERT INTO `Admin`(`firstname`, `lastname`, `email`, `images`, `password`) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','$filename','$hash')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
	}else{
		echo"Failed";
	}
?>