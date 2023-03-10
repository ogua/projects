<?php
error_reporting(0);
session_start();
	 include("db.php");
	 $fname = $_POST['fname'];
	 $email = $_POST['email'];
	  if($_POST['fname'] ==""){
		 		echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>FIRSTNAME CANT BE EMPTY</strong>';
		 exit();
	 }else if($_POST['lname'] ==""){
		 		echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>LASTNAME CANT BE EMPTY</strong>';
		 exit();
	 }else if($_POST['mobil']==""){
		 		echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>MOBILE NUMBER CANT BE EMPTY</strong>';
		 exit();
	 }else if($_POST['email'] ==""){
		 		echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>EMAIL CANT BE EMPTY</strong>';
		 exit();
	 }
	 if(filter_var($_POST['fname'],FILTER_VALIDATE_INT)){
		 echo'
		 <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			Firstname cant contain numbers
</strong></div>
		 ';
			exit;
		}if(filter_var($_POST['lname'],FILTER_VALIDATE_INT)){
					 echo'
		 <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			Lastname cant contain numbers
</strong></div>
		 ';
			exit;
		}if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
						 echo'
		 <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			Email Address is invalid
</strong></div>
		 ';
				exit;
		}	
	$sql2 = "INSERT INTO `users`(`firstname`, `Lastname`, `mobile`, `Email`, `Gid`) VALUES 
	 ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['mobil']."','".$_POST['email']."', '".$_SESSION['genrateid']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){
			$_SESSION['firstname'] = $_POST['fname'];
			$_SESSION['lastname'] = $_POST['lname'];
			$_SESSION['num'] = $_POST['mobil'];
			$_SESSION['emailAdd'] = $_POST['email'];
			echo"go";
		}else{
			echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>FAILED TO SAVE GUEST</strong>';

		}
	 
	 
?>