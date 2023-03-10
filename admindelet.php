<?php
	include_once('db.php');
	$id = $_POST['id'];
	$sql = "DELETE FROM `hostels` WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
	if($query){
			echo'Hostel Delected Successfully';
	}else{
		echo'Hostel Delected Successfully, Refresh Page to Take Effect';
	}
?>