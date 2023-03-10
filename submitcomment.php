<?php
	include('db.php');
	$sql = "INSERT INTO `comments`(`Eventid`, `Fullname`, `Cmsg`, `Commentdate`) 
	VALUES 
	('".$_POST['eventid']."','Admin','".$_POST['commants']."',CURRENT_DATE)";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo'success';
	}else{
		echo"Failed";
	}
?>