<!DOCTYPE HTML>
<html>
<head>
<title>CLINIC LOGIN PAGE</title>
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
<body class="back">
	 <!---<img class="img-rounded"src="images/UPSA.png" height="100" width="100"alt="upsa image" style="margin-top:20px;">--->
     <div class="col-sm-8 col-sm-offset-2" style="margin-top:245px;margin-bottom:240px;">
	 <h2 class="text-center hdoctor" style="color:white;">FIDEN MEDICAL CLINIC</h2>
	   <h3 style="padding:20px;font-size:60px;color:white;text-align:center;border-top:4px solid #42327a;border-bottom:4px solid #42327a;font-family:Tahoma;">Login</h3>
		<form method="post" action="" id="loginform">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="username" id="username" placeholder="USERNAME" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="pass"  id="pass" placeholder="PASSWRORD" required />
			</div>
			  <ul class="list-inline">
				<li><label><a href="password.php" style="text-decoration:none;color:white;">Forget Password ?</a></label><br></li>
				<li><label><a href="Signup.php" style="text-decoration:none;color:white;">Register?</a></label></li>
			  </ul>
			  <div class="clearfix"></div>
			                 <div style="color:#42327a;" class="form-group">
                                   <select name="roles" id="roles" class="form-control" required>
									  <option value="">Choose Login</option>
									   <option value="Doctor">Doctor</option>
									  <option value="Patient">Patient</option>                                
                                             <option value="Admin">Admin</option>									
									</select>								
								</div>
			<input type="submit" name="send" id="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Login" />
		</form>
		<?php
	if(isset($_POST['send'])){
	   include('db.php');
	   $roll = $_POST['roles'];   
	  $sql = "SELECT * FROM `login` WHERE `username` = '".$_POST['username']."' and `password` = '".$_POST['pass']."' and `Role` =  '".$_POST['roles']."' ";
	  $query = mysqli_query($conn,$sql);
	  $result = mysqli_num_rows($query);
	  $row = mysqli_fetch_array($query);
      if($result == 1){
		  session_start();		
		  $_SESSION['name'] = $_POST['username'];
		  $_SESSION['userid'] = $row['userid'];
		  $_SESSION['id'] = $row['id'];
		if($roll == 'Doctor'){
			header("location: doctor.php");
		}if($roll == 'Patient'){
			header("location: patient.php");
		}if($roll == 'Admin'){
			header("location: admin.php");
		}if($roll == 'Cashier'){
			header("location: Cashier.php");
		}
	}else{
		echo'
			<script>
				alert("Failed to Login Check Username and Passwordl!");
			</script>
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