<?php
 include('db.php');
 if($_POST['role'] == "Manager"){
	 $sql = "SELECT * FROM `manager` WHERE `email` = '".$_POST['uemail']."' ";
	 $query = mysqli_query($conn,$sql);
	 $result  = mysqli_num_rows($query);
	 if($result > 0){
		 $row = mysqli_fetch_array($query);
		 $password  =  $row['password'];
		 if(!password_verify($_POST['Password'],$password)){
			 echo"uemailfail";
		 }else{
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 $_SESSION['name'] = $row['name'];
			 echo"mangersu";
		 }
	 }
 }else if($_POST['role'] == "Agent"){
	  $sql = "SELECT * FROM `agent` WHERE `email` = '".$_POST['uemail']."' ";
	 $query = mysqli_query($conn,$sql);
	 $result  = mysqli_num_rows($query);
	 if($result > 0){
		 $row = mysqli_fetch_array($query);
		 $password  =  $row['password'];
		 if(!password_verify($_POST['Password'],$password)){
			 echo"uemailfail";
		 }else{
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 $_SESSION['name'] = $row['name'];
			 echo"agentsu";
		 }
	 }
 }else if($_POST['role'] == "Customer"){
	  $sql = "SELECT * FROM `customers` WHERE `email` = '".$_POST['uemail']."' ";
	 $query = mysqli_query($conn,$sql);
	 $result  = mysqli_num_rows($query);
	 if($result > 0){
		 $row = mysqli_fetch_array($query);
		 $password  =  $row['password'];
		 if(!password_verify($_POST['Password'],$password)){
			 echo"uemailfail";
		 }else{
			 session_start();
			 $_SESSION['id'] = $row['id'];
			 $_SESSION['name'] = $row['name'];
			 echo"customersu";
		 }
	 }
 }
?>