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
	
	if($_POST['cuspass'] !==""){
		$pass = password_hash($_POST['cuspass'], PASSWORD_DEFAULT);	
	}else{
		$pass = $_POST['cuspass'];
	}
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "UPDATE `customers` SET `name` = '".$_POST['mname']."', `age` = '".$_POST['mage']."', `gender` = '".$_POST['mngender']."', `voltersid` = '".$_POST['agvtid']."', `contact` = '".$_POST['mcont']."', `email` = '".$_POST['maddrs']."', `registerdBy` = '".$_POST['regby']."', `username` = '".$_POST['cusename']."', `password` = '$pass', `images` = '$filename'  WHERE `id` = '".$_POST['custoid']."' ";
		
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
	}else{
		$sql = "UPDATE `customers` SET `name` = '".$_POST['mname']."', `age` = '".$_POST['mage']."', `gender` = '".$_POST['mngender']."', `voltersid` = '".$_POST['agvtid']."', `contact` = '".$_POST['mcont']."', `email` = '".$_POST['maddrs']."', `registerdBy` = '".$_POST['regby']."', `username` = '".$_POST['cusename']."', `password` = '$pass'  WHERE `id` = '".$_POST['custoid']."' ";
		
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo $sql;
			
			"Failed";
		}
	}
?>