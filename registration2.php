<?php
error_reporting(0);
	session_start();
	if(!empty($_SESSION['guest'])){
		header("location:paymentmode.php");
	}
	
?><!DOCTYPE html>
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
<script src="js/jquery.easydropdown.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
<style>
		.reg form input[type="email"],.reg form input[type="number"]{
			width: 100%;
			padding: 8px;
			font-size: 1em;
			font-weight: 400;
			border:0;
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
				 <a href="cart.php"><h3><span class="glyphicon glyphicon-shopping-cart insercart"></span>Cart:<span class="badge" id="bage">0</span></h3></a>
			 
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
		 <h2>Guest Registration</h2>
		 <a href="cart.php">&larr;Back</a>
		 <div class="col-md-6 reg-form">
			 <div class="reg">
				  <form id="guestreges" class="form-material" method="post" action="">
					 <ul>
						 <li style="width:100%;" class="text-info">First Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" name="fname" required style="border:0;outline:none;border-bottom:1px solid #D6D6D6;"></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Last Name: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" name="lname" required style="border:0;outline:none;border-bottom:1px solid #D6D6D6;"></li>
					 </ul>				 
					<ul>
						 <li style="width:100%;" class="text-info">Email: </li>
						 <li style="width:100%;"><input type="email" class="form-control" value="" name="email" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Postal Address/Pickup Point: </li>
						 <li style="width:100%;"><input type="text" class="form-control" value="" name="addres" required></li>
					 </ul>
					 <ul>
						 <li style="width:100%;" class="text-info">Mobile Number:</li>
						 <li style="width:100%;"><input type="number" class="form-control" value="" name="mobil" required></li>
					 </ul>						
					 <input type="submit" value="Save & Continue" >
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
	<script>
		$('document').ready(function(){
			$("#guestreges").on("submit",function(e){
				e.preventDefault();
				//alert("go");
				$.ajax({
					url: 'guestreg.php',
					method: 'post',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("go")){
							alert("Guest Registered Successfully");
							window.location.href="paymentmode.php";
						}if(data.match("failed")){
							alert("Failed! Please try again");
						}
					}
					
				});
			});
		});
	</script>
</body>
</html>
		