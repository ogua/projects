<?php
	include('db.php');
	$sql = "INSERT INTO `customerpolicy`(`customerid`, `Customername`, `policy`, `policyAmount`, `premium`, premiumType	,`dates`) VALUES ('".$_POST['custmerid']."','".$_POST['bname']."','".$_POST['plolicy']."','".$_POST['bcoNum']."','".$_POST['bstate']."','".$_POST['premitype']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>