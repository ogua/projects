<html>
	<head>
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
         <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
	</head>
</html>
<?php
	session_start();
	 include("db.php");
	 $fname = $_POST['lname'];
	 $pwd = $_POST['pwd'];
	 $pwd2 = $_POST['pwd2'];
	 $email = $_POST['email'];
	 $alfulnam = $_POST['alNmae'];
	 $alNum = $_POST['alNumb'];
	 $hash = password_hash($pwd,PASSWORD_DEFAULT);
	if(!PASSWORD_VERIFY($pwd2,$hash)){
		 echo "Password Does Not Match.";
		 exit();
	}
	 if($fname == ""){
		 echo "FIRSTNAME CANT BE EMPTY";
		 exit();
	 }
	 $sql = "SELECT * FROM `users` WHERE `Email` = '".$_POST['email']."' ";
	 $result = mysqli_query($conn,$sql);
	 $results = mysqli_num_rows($result);
	 if($results > 1){
		 echo"Email ALready Exist, try a different Email";
		 exit();
	 }else{
			$sql2 = "INSERT INTO `users`(`firstname`, `Lastname`, `password`, `mobile`, `Email`, `addressline1`, `addressline2`,`AlName`,`AlNumber`) 
	 VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['pwd']."','".$_POST['mobil']."','".$_POST['email']."','".$_POST['aln1']."','".$_POST['aln2']."','".$_POST['alNmae']."','".$_POST['alNumb']."')";
		$query2 = mysqli_query($conn,$sql2);
		if($query2){	
			$sql3 = "SELECT * FROM `users` where `Email` = '".$_POST['mobil']."' ";
			$query3 = mysqli_query($conn,$sql3);
			if($query3){
				$row = mysqli_fetch_array($query3);
				$id = $row['id'];
				$sql4 = "UPDATE `cart` SET `user_id` = '$id' WHERE `generateid` = '".$_SESSION['genrateid']."' ";
				$query4 = mysqli_query($conn,$sql4);
				if($query4){
					header("location:seletpaymode.php");
					'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Account Created Successful!</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "seletpaymode.php";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>redirecting in </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
				}else{
					echo "failed";
				}
			}
			
		}else{
			echo"failed to Create Account";
		}
	 }
	 
?>