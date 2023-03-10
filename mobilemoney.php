<?php
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
			border: 1px solid #D6D6D6;
			outline: none;
			color:#5d5959;
		}
	</style>
</head>
<body>
<!--header-->
<div class="header2 text-center">
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
				 <form action="https://community.ipaygh.com/gateway" id="ipay_checkout" method="post" name="ipay_checkout">
					 <input name="merchant_key" type="hidden" value="5c841bf2-d29b-11e7-aebc-f23c9170642f">
		                    <input id="merchant_code" name="merchant_code" type="hidden" value="TST000000000950">
		                    <input id="invoice_id" name="invoice_id" type="hidden" value="">
							<input name="success_url" type="hidden" value="http://www.ocmaonline.epizy.com/pickup2.php">
							<input name="cancelled_url" type="hidden" value="http://www.ocmaonline.epizy.com/cancelled.php">
					 <ul>
						 <li class="text-info">First Name: </li>
						 <li><input type="text" value="<?php echo $_SESSION['firstname']."".$_SESSION['lastname']?>" name="extra_name" id="extra_name"></li>
					 </ul>
					 <ul>
						 <li>
							<select class="form-control" style="width:100%;">
							<option>Select ID Type:</option>
							<option>Volters ID</option>
							<option>NHIS ID</option>
							<option>GHANA CARD ID</option>
							<option>DRIVERS LICENSE ID</option>
						 </select>
						 </li>
						  <li><input type="text"></li>
					 </ul>				 
					<ul>
						 <li class="text-info">Email: </li>
						 <li><input type="email" name="extra_email" value="<?php echo $_SESSION['emailAdd'];?>" style="outline:none;border:0;border-bottom:1px solid #d6d6d6;"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Payment Description</li>
						 <li><input type="text" name="description" value="Product Payment"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Payment Amount</li>
						 <li><input type="text" name="total" value="<?php echo $_SESSION['totals'];?>"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Mobile Number:</li>
						 <li><input type="text" name="extra_mobile" id="extra_mobile" value="<?php echo $_SESSION['num'];?>"></li>
					 </ul>						
					 <input type="submit" id="submit" name="submit" value="Pay Now">
				 </form>
			 </div>
			 <script>
								$(document).ready(function(){
									$("#submit").click(function(){
									$.ajax({
									url : "action.php",
									 method : "post",
									 data: {subOrdermobil: 1},
									 success: function(data){
										alert(data);
									 }
									});
								});
								});
							</script>
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
<script type="text/javascript">
		(function(){
			Date.prototype.today = function () { return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();};
			Date.prototype.timeNow = function () { return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();};
			document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();
		})();
	    </script>	
</body>
</html>
		