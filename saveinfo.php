<?php
	session_start();
	include_once("db.php");
	$email = $_SESSION['email'];
	$biograph = $_POST['biographh'];
	$genre = $_POST['genres'];
	$label = $_POST['label'];
	$allbums = $_POST['album'];
	$awards = $_POST['awards'];
	$country = $_POST['country'];
	
	$sql = "UPDATE `airtest` SET `biograph` = '$biograph', `genre`  = '$genre', `label`  = '$label', `albums`  =  '$allbums', `awards`  =  '$awards', `country`  =  '$country' WHERE `email` = '$email' ";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo "Successfully";
	}else{
		echo $sql;
		exit;
		echo "Failed please Try agin Later";
	}
?>