<?php
	include('db.php');
	$sql = "UPDATE `policy` SET `name` = '".$_POST['pname']."',`term` = '".$_POST['pterm']."',`amount` = '".$_POST['pamnt']."', `premium` = '".$_POST['famnt']."', `interest` = '".$_POST['pinterest']."', `bonus` = '".$_POST['pbonus']."' WHERE `id` = '".$_POST['policyid']."'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>