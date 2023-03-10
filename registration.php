<?php
error_reporting(0);
	session_start();
	
	if(!empty($_SESSION['id'])){
		$status = $_SESSION['staus'];
		if($status =="seller"){
			header("location:profile.php");
		}if($status =="buyer"){
			header("location:profile2.php");
		}/*if($status =="admin"){
			header("location:admin.php");	
		}*/
		
	}
	
	if(!empty($_SESSION['staus'])){
		$status = $_SESSION['staus'];
		if($status =="seller"){
			header("location:profile.php");
		}if($status =="buyer"){
			header("location:profile2.php");
		}/*if($status =="admin"){
			header("location:admin.php");	
		}*/
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>	
<script src="js/jquery.easydropdown.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
	<style>
		.reg form input[type="email"]{
			width: 100%;
			padding: 8px;
			font-size: 1em;
			font-weight: 400;
			border:0;
			box-shadow: none;
			border-bottom: 1px solid #D6D6D6;
			outline: none;
			color:#5d5959;
		}
.form-control:focus {
  color: #74708d;
  background-color: #fff;
  border-color: #03a9f3;
  outline: none;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 0 3px rgba(3, 169, 243, 0.2);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 0 3px rgba(3, 169, 243, 0.2); }
.
	</style>
</head>
<body>
<!--header-->
<div class=" text-center">
	 <div class="container">
		 <div class="main-header">
			  <div class="carting">
				 
				 </div>
			 <div class="logo">
			  </div>			  
			 <div class="box_1">				 
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>		 
				<!-- start header menu -->
		 <ul class="megamenu skyblue">
			<li class="grid"><a class="color1" href="index.php">Home</a></li>
			<li class="grid"><a class="color1" href="login.php">Login</a></li>
			<li class="active grid"><a class="color1" href="registration.php">Signup</a></li>							
				<li class="grid"><a href="about.php">ABOUT US</a></li>
				</ul> 			
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="registration-form">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Registration</li>
		 </ol>
		 <h2>Registration</h2>
		 <div class="col-md-6 reg-form">
			 <div class="reg">
				<ul class="list-unstyled">
					<li><a href="#" class="btn btn-success" id="buyer" style="width:100%;">Register As A buyer</a></li>
					<li><a href="#" class="btn btn-success" id="seller" style="width:100%;">Register As A Seller (Craft Personnel)</a></li>
				</ul>
				<div class="clearfix"></div>
				  <form id="duyerdisplay" class="form-material" style="display:none;">
					 <ul>
						 <li class="text-info" style="width:100%;">First Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="fname" name="fname" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Last Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="lsname" name="lsname" required></li>
					 </ul>				 
					<ul>
						 <li style="width:100%;" class="text-info">Email: </li>
						 <li style="width:100%;"><input type="email" class="form-control" value="" id="emails" name="emails" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Postal Address</li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" name="addres" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;"class="text-info">Password: </li>
						 <li style="width:100%;"><input type="password" class="form-control" value="" id="passw" name="passw" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Re-enter Password:</li>
						 <li style="width:100%;"><input type="password" class="form-control" value="" id="retypepass" name="retypepass" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Mobile Number:</li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="mobilenumb" name="mobilenumb" required></li>
					 </ul>						
					 <input type="submit" value="Register Now" id="savereg">
				 </form>
				 
				 <!---- Craftmen sellers registration form ---------->
				 <form id="sellerdisplay" class="form-material" style="display:none;">
					 <ul>
						 <li style="width:100%;" class="text-info">First Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="fname" name="fname" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Last Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="lsname" name="lsname" required></li>
					 </ul>				 
					<ul>
						 <li style="width:100%;" class="text-info">Email: </li>
						 <li style="width:100%;"><input type="email" class="form-control" value="" id="emails" name="emails" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Password: </li>
						 <li style="width:100%;"><input type="password" class="form-control" value="" id="passw" name="passw" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Re-enter Password:</li>
						 <li style="width:100%;"><input type="password" class="form-control" value="" id="retypepass" name="retypepass" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Mobile Number:</li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" id="mobilenumb" name="mobilenumb" required></li>
					 </ul>						
					 <input type="submit" value="Register Now" id="savereg">
				 </form>
			 </div>
		 </div>
		 <div class="col-md-6 reg-right">
			  </div>
		 <div class="clearfix"></div>		 
	 </div>
</div>
<!--fotter-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-info">
<p><a href="http://www.oits.epizy.com/index.html">Powered By Ogua IT Solutions</a></p>	
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->	
</body>
</html>
		