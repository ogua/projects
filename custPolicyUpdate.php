<?php
	include('db.php');
	$sql = "UPDATE `customerpolicy` SET `Customername` = '".$_POST['bname']."', `policy` = '".$_POST['plolicy']."', `policyAmount` = '".$_POST['bcoNum']."', `premium` = '".$_POST['bstate']."', `premiumType` = '".$_POST['premitype']."' WHERE id = '".$_POST['custmerid']."' ";
	
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>