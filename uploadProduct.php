<?php
	include('db.php');
	$sql = "INSERT INTO `Products`(`ManufacDate`,`ExpirinDate`,`name`, `dosage`, `unitpx`, `price`, `Quantity`, `dates`) VALUES 
	('".$_POST['pmdate']."','".$_POST['pexdate']."','".$_POST['pname']."','".$_POST['pdosage']."','".$_POST['punit']."','".$_POST['Ppx']."','".$_POST['pqty']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo"sucess";
	}else{
		echo"Failed";
	}
?>