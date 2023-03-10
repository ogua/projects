<?php
	include('db.php');
	$image = $_FILES['InputFile']['name'];
	$tmpimage = $_FILES['InputFile']['tmp_name'];
	$source ="images/";
	$target_file = $source.basename($image);	
	$ext = strtolower(substr($image, strripos($image, '.')+1));
	$filename = round(microtime(true)).mt_rand().'.'.$ext;
	
	if(strlen($_POST['econt']) < 10 || strlen($_POST['econt']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		$sql = "INSERT INTO `event`(`Title`, `datefrm`, `timefrm`, `Location`, `Contact`, `cohost`, `Description`, `dates`, `image`, `Eventid`) 
		VALUES ('".$_POST['ename']."','".$_POST['edate']."','".$_POST['etime']."','".$_POST['eloca']."','".$_POST['econt']."','".$_POST['ehost']."','".$_POST['edsc']."',CURRENT_DATE,'$filename','".$_POST['Eventid']."')";
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