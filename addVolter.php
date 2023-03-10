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
	
	if(strlen($_POST['cont']) < 10 || strlen($_POST['cont']) > 10){
		echo"Phone Number is Incorrect";
		exit;
	}
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "INSERT INTO `farmers`(password,email,`fisrtname`, `lastname`, `image`, `Contact`, `Gender`,`dates`) 
		VALUES ('$hash','".$_POST['email']."','".$_POST['fname']."','".$_POST['lname']."','$filename','".$_POST['cont']."',
		'".$_POST['gender']."',CURRENT_DATE)";
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