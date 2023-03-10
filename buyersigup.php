<?php
	include_once('db.php');
	$sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['emails']."'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if($result > 0){
		echo'EmailError';
		exit;
	}
	$pass = password_hash($_POST['passw'],PASSWORD_DEFAULT);
	if(!password_verify($_POST['retypepass'],$pass)){
		echo'passnotmatch';
		exit;
	}if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST['fname']) === 0){
			echo'ferror';	
			exit;
	}
	if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST['lsname']) === 0){
			echo'lasterr';	
			exit;
	}
	$insql = "INSERT INTO `users`(`firstname`, `Lastname`, `password`, `mobile`, `Email`, `addressline1`) VALUES 
	('".$_POST['fname']."','".$_POST['lsname']."','".$_POST['passw']."','".$_POST['mobilenumb']."',
	'".$_POST['emails']."','".$_POST['addres']."')";
	$inquery = mysqli_query($conn,$insql);
	if($inquery){
		session_start();
		$_SESSION['staus'] = "buyer";
		$_SESSION['name'] = $_POST['fname'];
		echo'Registered';
	}else{
		echo'Error';
	}
?>