<?php
	include('db.php');
	$image = $_FILES['InputFile']['name'];
	$tmpimage = $_FILES['InputFile']['tmp_name'];
	$source ="images/";
	$target_file = $source.basename($image);	
	$ext = strtolower(substr($image, strripos($image, '.')+1));
	$filename = round(microtime(true)).mt_rand().'.'.$ext;
	
	if(strlen($_POST['mcont']) < 10 || strlen($_POST['mcont']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}
	$hash = password_hash($_POST['passw'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['passw2'],$hash)){
		echo"Password Does not Match";
		exit;
	}
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "INSERT INTO `Agent`(`name`, `age`, `sex`, `voltersid`, `contact`, `email`, `password`, `regby`, `image`, `dates`) VALUES ('".$_POST['mname']."','".$_POST['mage']."','".$_POST['mngender']."','".$_POST['agvtid']."','".$_POST['mcont']."','".$_POST['maddrs']."','$hash','".$_POST['regby']."','$filename',CURRENT_DATE)";
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