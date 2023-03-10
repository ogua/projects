<?php
	include('db.php');
	$sql = "INSERT INTO `claims`(`customerid`, `name`, `policy`, `entitled`, `descrbclaim`, `dates`,`bankname`, `accountname`, `accountnumber`) 
	VALUES 
	('".$_POST['custoid']."','".$_POST['mname']."','".$_POST['plolicy']."','".$_POST['clentitle']."','".$_POST['dscclaim']."',CURRENT_DATE,'".$_POST['backna']."','".$_POST['accntname']."','".$_POST['accntnum']."')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>