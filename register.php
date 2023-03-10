<html>
	<head>
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
         <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
	</head>
</html>
<?php
	 include("db.php");
	 $fname = $_POST['fname'];
	 $pwd = $_POST['pwd'];
	 $pwd2 = $_POST['pwd2'];
	 $email = $_POST['email'];
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
		}if(strlen($_POST['pwd']) < 8){
			echo'
		<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			Password must be more than or equal to eight characters
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
		$hash = password_hash($pwd, PASSWORD_DEFAULT);
		if(!PASSWORD_VERIFY($pwd2,$hash)){
		 		 	echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong>
		 Password Does not Match</div>';
		   exit();
	   }
	 $sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['email']."' ";
	 $result = mysqli_query($conn,$sql);
	 $results = mysqli_num_rows($result);
	 if($results > 1){
		 echo"Email ALready Exist, try a different Email";
		 exit();
	 }else{
			$sql2 = "INSERT INTO `users`(`firstname`, `Lastname`, `password`, `mobile`, `Email`, `addressline1`, `addressline2`) 
	 VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['pwd']."','".$_POST['mobil']."','".$_POST['email']."','".$_POST['aln1']."','".$_POST['aln1']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){		
			echo"Details Submitted successfully <br> <a href='index.php' class='btn btn-success'>BACK TO HOMEPAGE</a>";
		}else{
			echo"failed to Submit Details";
		}
	 }
	 
?>