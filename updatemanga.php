<?php
	include('db.php');
	if(strlen($_POST['mcont']) < 10 || strlen($_POST['mcont']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}
	
	
	$sql = "UPDATE `manager` SET `name` = '".$_POST['mname']."', `age` = '".$_POST['mage']."', `sex` = '".$_POST['mngender']."', `branch` = '".$_POST['branch']."',`contact` = '".$_POST['mcont']."' , `email` = '".$_POST['maddrs']."' WHERE `id` = '".$_POST['manaid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}

?>