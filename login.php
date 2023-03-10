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
?>
<!DOCTYPE html>
<html>
<head>
<title>Craft</title>
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
	select,.log form input[type="number"],textarea,.log form input[type="file"]{
		width: 100%;
		padding: 8px;
		font-size: 1em;
		font-weight: 400;
		border: 1px solid #D6D6D6;
		outline: none;
		color: #5d5959;
		margin-bottom:2em;
	}
</style>
</head>
<body>
<!--header-->
<div class="text-center">
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
			<li class="active grid"><a class="color1" href="login.php">Login</a></li>
			<li class="grid"><a class="color1" href="registration.php">Signup</a></li>							
				<li class="grid"><a href="about.php">ABOUT US</a></li>
				</ul> 	
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="login">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <div class="col-md-6 log">			 
					 <form class="form-material">
					 <input type="text" placeholder="Enter Your Email Address" class="form-control" value="" id="email" style="outline:none;border:0;width:100%;">
					 <input type="password" placeholder="Enter Your Password" class="form-control" value="" id="pass" style="outline:none;border:0;width:100%;">
					 <select id="status" class="form-control" style="width:100%;border-bottom:1px solid #fff;">
						<option value="">Select Role</option>
						<option value="seller">Seller (Craft Personnel)</option>
						<option value="buyer">Buyer</option>
						<!---<option value="admin">Admin</option>---->
					 </select>
					 <input class="btn btn-xs" type="submit" id="login" name="login" value="Login">
					 <div class="clearfix"></div>
					  <a href="#">Forgot Password ?</a>
					</form>				 
		 </div>
		  <div class="col-md-6 login-right">
			  	<h3>NEW REGISTRATION</h3>
				<a class="acount-btn" href="registration.php">Create an Account</a>
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
		