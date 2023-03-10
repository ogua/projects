<?php
    session_start();
	include('db.php');
	$id = $_SESSION['id'];
	$image = $_FILES['InputFile']['name'];
	$tmpimage = $_FILES['InputFile']['tmp_name'];
	$source ="images/";
	$target_file = $source.basename($image);	
	$ext = strtolower(substr($image, strripos($image, '.')+1));
	$filename = round(microtime(true)).mt_rand().'.'.$ext;
	
	$sql2 = "SELECT * FROM `admin` WHERE `id` = '$id' ";
	$query2 = mysqli_query($conn,$sql2);
	$rows = mysqli_fetch_array($query2);
	
	
	if(move_uploaded_file($tmpimage,$source.$filename)){
		unlink('images/'.$rows['images'].'');
		$sql = "UPDATE `admin` SET `firstname` = '".$_POST['fname']."', `lastname` = '".$_POST['lname']."', `email` = '".$_POST['email']."', `images` = '$filename' WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
	}else{
		$sql = "UPDATE `admin` SET `firstname` = '".$_POST['fname']."', `lastname` = '".$_POST['lname']."', `email` = '".$_POST['email']."' WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
		if($query){
			echo"sucess";
		}else{
			echo"Failed";
		}
	}
?>