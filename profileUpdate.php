<?php
	session_start();
	include('db.php');
	$id = $_SESSION['id'];
	if(strlen($_POST['telep']) < 10 || strlen($_POST['telep']) > 10){
		echo"Phone Number is Invalid";
		exit;
	}
	$sql = "UPDATE `airtest` SET `fullname` = '".$_POST['fname']."',`gender` = '".$_POST['gender']."',`dateofbirth` = '".$_POST['dateofbirth']."', `email` = '".$_POST['email']."', `telephone` = '".$_POST['telep']."', `biograph` = '".$_POST['biographh']."', `genre` = '".$_POST['genres']."', `label` = '".$_POST['label']."',`albums` = '".$_POST['album']."',`awards` = '".$_POST['awards']."', `country` = '".$_POST['country']."' WHERE `id` = '$id' ";
	$query =mysqli_query($conn,$sql);
	if($query){
		echo"Artist Details Updated Successfully!";
	}else{
		echo"Failed to update Artist Information";
	}
?>