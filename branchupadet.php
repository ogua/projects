<?php
	include('db.php');
	if(strlen($_POST['bcoNum']) < 10 || strlen($_POST['bcoNum']) > 10){
		echo"Contact Number is Invalid";
		exit;
	}	
	$sql = "UPDATE `Branch` SET `name` = '".$_POST['bname']."', `location` = '".$_POST['bloc']."', `phone` = '".$_POST['bcoNum']."', `state` = '".$_POST['bstate']."' WHERE id = '".$_POST['bancid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>