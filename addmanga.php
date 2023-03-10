<?php
	include('db.php');
	if(strlen($_POST['mcont']) < 10 || strlen($_POST['mcont']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}
	$hash = password_hash($_POST['passw'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['passw2'],$hash)){
		echo"Password Does not Match";
		exit;
	}
	
	$sql = "INSERT INTO `manager`(`name`, `age`, `sex`, `branch`, `contact`, `email`, `password`, `dates`) VALUES
	('".$_POST['mname']."','".$_POST['mage']."','".$_POST['mngender']."','".$_POST['branch']."','".$_POST['mcont']."','".$_POST['maddrs']."','$hash',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}

?>