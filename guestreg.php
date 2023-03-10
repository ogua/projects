<?php
error_reporting(0);
session_start();
	 include("db.php");
	$sql2 = "INSERT INTO `users`(`firstname`, `Lastname`, `mobile`, `Email`, `addressline1`, `Gid`)
	VALUES 
	 ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['mobil']."',
	 '".$_POST['email']."','".$_POST['addres']."','".$_SESSION['genrateid']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){
			$guest = "guest";
			$_SESSION['firstname'] = $_POST['fname'];
			$_SESSION['lastname'] = $_POST['lname'];
			$_SESSION['num'] = $_POST['mobil'];
			$_SESSION['emailAdd'] = $_POST['email'];
			$_SESSION['guest'] = $guest;
			echo"go";
		}else{
			echo'failed';

		}
	 
	 
?>