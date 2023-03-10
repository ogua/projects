<?php
	 include("db.php"); 
	 $status = $_POST['text3'];
	 if($status == "seller"){
		 $sql = "SELECT * FROM `craftusers` WHERE `Email` = '".$_POST['text1']."'";
		 $result = mysqli_query($conn,$sql);
		 $results = mysqli_num_rows($result);
		 if($results == 1){
			 if(strlen($_POST['text2']) < 6){
				 echo"Password must be more than or Equal to six characters";
				 exit;
			 }
			 
			 $hash = password_hash($_POST['text2'],PASSWORD_DEFAULT);
			 if(!password_verify($_POST['text4'],$hash)){
				 echo'Email or Password Does not Match';
				 exit;
			 }
			 $sqlupdate = "UPDATE `craftusers` SET `password` = '".$_POST['text2']."' WHERE `Email` = '".$_POST['text1']."' ";
			 $query = mysqli_query($conn,$sqlupdate);
			 if($query){
				 echo"buy";		
			 }else{
				 echo"Something went wrong, please try again later";
			 }
		 }else{
			echo'
				Email or Password is Incorrect
			';
		 } 
	 }if($status == "buyer"){
		$sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['text1']."'";
		 $result = mysqli_query($conn,$sql);
		 $results = mysqli_num_rows($result);
		 if($results == 1){
			 if(strlen($_POST['text2']) < 6){
				 echo"Password must be more than or Equal to six characters";
				 exit;
			 }
			 
			 $hash = password_hash($_POST['text2'],PASSWORD_DEFAULT);
			 if(!password_verify($_POST['text4'],$hash)){
				 echo'Email or Password Does not Match';
				 exit;
			 }
			 $sqlupdate = "UPDATE `users` SET `password` = '".$_POST['text2']."' WHERE `Email` = '".$_POST['text1']."' ";
			 $query = mysqli_query($conn,$sqlupdate);
			 if($query){
				 echo"buy";		
			 }else{
				 echo"Something went wrong, please try again later";
			 }
		 }else{
			echo'
				Email or Password is Incorrect
			';
		 } 
	 }if($status == "admin"){
		$sql = "SELECT * FROM `admin` WHERE `username` = '".$_POST['text1']."' and `password` = '".$_POST['text2']."' ";
		 $result = mysqli_query($conn,$sql);
		 $results = mysqli_num_rows($result);
		 $row = mysqli_fetch_array($result);
		 if($results == 1){
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 //$_SESSION['name'] = $row['firstname'];
			 $_SESSION['staus'] = $status;
			 echo"admin";		
		 }else{
			echo'
				Email or Password Incorrect
			';
		 } 
	 }
	 
	 
?>