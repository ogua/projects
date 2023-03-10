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
		$sql="UPDATE `agent` SET `name` = '".$_POST['mname']."', `age` = '".$_POST['mage']."', `sex` = '".$_POST['mngender']."', `voltersid` = '".$_POST['agvtid']."', `contact` = '".$_POST['mcont']."', `email` = '".$_POST['maddrs']."', `image` = '$filename' WHERE `id` = '".$_POST['agentid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
	}else{
		$sql="UPDATE `agent` SET `name` = '".$_POST['mname']."', `age` = '".$_POST['mage']."', `sex` = '".$_POST['mngender']."', `voltersid` = '".$_POST['agvtid']."', `contact` = '".$_POST['mcont']."', `email` = '".$_POST['maddrs']."' WHERE `id` = '".$_POST['agentid']."' ";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
	}
?>