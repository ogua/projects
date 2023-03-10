<?php
	 include("db.php"); 
	 $status = $_POST['text3'];
	 if($status == "seller"){
		$sql = "SELECT * FROM `craftusers` WHERE `Email` = '".$_POST['text1']."' and `password` = '".$_POST['text2']."' ";
		 $result = mysqli_query($conn,$sql);
		 $results = mysqli_num_rows($result);
		 $row = mysqli_fetch_array($result);
		 if($results == 1){
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 $_SESSION['name'] = $row['firstname'];
			 $_SESSION['staus'] = $status;
			 $_SESSION['sellid'] = $row['mobile'];
			 $_SESSION['pro'] = "profile1";
			 echo"sell";		
		 }else{
			echo'
				Email or Password Incorrect
			';
		 } 
	 }if($status == "buyer"){
		$sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['text1']."' and `password` = '".$_POST['text2']."' ";
		 $result = mysqli_query($conn,$sql);
		 $results = mysqli_num_rows($result);
		 $row = mysqli_fetch_array($result);
		 if($results == 1){
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 $_SESSION['name'] = $row['firstname'];
			 $_SESSION['staus'] = $status;
			 $_SESSION['pro'] = "profile2";
			 echo"buy";		
		 }else{
			echo'
				Email or Password Incorrect
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