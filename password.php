<!DOCTYPE HTML>
<html>
<head>
<title>UPSA CLINIC LOGIN PAGE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
.back{
  background-image: url("images/lucas-vasques-453684.jpg");
background-size:cover;
background-repeat: no-repeat;
}
.hdoctor{
	font-family:Tahoma;
	text-shadow: rgb(255,254,234);
	color: #42327a;
}
</style>
</head> 
<body class="back" style="overflow-x:hidden;overflow-y:hidden;">
	 <!---<img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="margin-top:20px;">--->
     <div class="col-sm-8 col-sm-offset-2" style="margin-top:245px;margin-bottom:280px;">
	  <h3 style="color:white;text-align:center;font-family:Tahoma;">FIDEN MEDICAL CLINIC</h3>
	   <h3 style="padding:20px;color:white;text-align:center;border-top:4px solid #42327a;border-bottom:4px solid #42327a;font-family:Tahoma;">RESET PASSWORD</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="email" name="EAdd" id="EAdd" placeholder="ENTER YOUR EMAIL ADDRESS" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw"  id="psw" placeholder="PASSWRORD" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw2"  id="psw2" placeholder="CONFIRM PASSWORD" required />
			</div>
			<ul class="list-inline">
				<li><label><a href="index.php" style="text-decoration:none;color:white;">Login</a></label><br></li>
				<li><label><a href="Signup.php" style="text-decoration:none;color:white;">Register?</a></label></li>
			  </ul>	
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="resend" class="btn btn-success pull-right"value="Reset" />
		</form>
<?php
	if(isset($_POST['send'])){
	   include('db.php');
		$sql = "SELECT * FROM `patiencedetails` WHERE `email` = '".$_POST['EAdd']."'";
		$query = mysqli_query($conn,$sql);
		$reault = mysqli_num_rows($query);
		if($reault > 0){
			$row = mysqli_fetch_array($query);
			$userid = $row['userId'];
			$sql2 = "SELECT * FROM `login` WHERE `userid` = '$userid'";
			$query2 = mysqli_query($conn,$sql2);
			if($query2){
				$passhash = PASSWORD_HASH($_POST['psw'],PASSWORD_DEFAULT);
				if(!password_verify($_POST['psw2'],$passhash)){
					echo'
					<script>alert("Password Does Not Match");</script>
			';
				}else{
					$sql3 = "UPDATE `login` SET `password` =  '".$_POST['psw']."' WHERE `userid` = '$userid'";
					$query3 = mysqli_query($conn,$sql3);
					if($query3){
						echo'
			<script>alert("Password Reset Successfully");</script>
			';
					}
				}
			}else{
				echo'
			<script>alert("User Does Not Exit");</script>
			';
			}			
		}else{
			echo'
			<script>alert("Email Address Does Not Exit");</script>
			';
		}
	}
?>
<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-2.1.4.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
	
</body>
</html>