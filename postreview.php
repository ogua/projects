<?php
	error_reporting(0);
	include_once('db.php');	
	session_start();
	$prdid = $_POST['prid'];
	$review = $_POST['text1'];
	$user = $_SESSION['id'];
	$name = $_SESSION['name'];
	if($user == ""){
		echo'Please Login to Post Your Review';
	}else{
		$sql = "INSERT INTO `review`(`name`, `productid`, `review`) VALUES ('$name','$prdid','$review')";
		$query = mysqli_query($conn,$sql);
		if($query){
			echo"Review Added Successfully";
		}else{
			echo"failed to Add Review";
		}
	}
	
	
	
		
?>