<?php
	error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Craft</title>
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
			<li class="grid"><a class="color1" href="index.php">Products</a></li>
			<li class="grid"><a class="color1" href="login.php">Login</a></li>
			<li class="grid"><a class="color1" href="registration.php">Signup</a></li>						
				<li class="grid"><a href="about.php">ABOUT US</a></li>
				</ul> 		 
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="cart">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Cart</li>
		 </ol>
		 <h2>Delivery Terms</h2>
		 <p>We pride ourselves on our speedy delivery right to your doorstep through our dispatch riders. 
At  OCMA you can expect delivery within 2-3 business days, but if you prefer you can pick up your item from our warehouses in Sakumono. </p>
		 <h2> Here’s how delivery works</h2>
		 <p>fter placing your order, the seller will be in touch with you to confirm your order details and delivery preferences.
<br>
On the day of delivery, a representative will call you to confirm your availability at the provided address.
<br>
If you selected cash on delivery or mobile money payment, you will pay when your purchase is delivered.
<br>
Please note that your availability at your confirmed address may impact the delivery time.</p>
		 <div class="col-md-9 cart-items">
			 <h2>Total Number Purchased <span class="badge" id="bage">0</span></h2>
				<div id="customercheckedOut"></div>			 
		 </div>
		 <div class="col-md-3 cart-total">
			 <a class="continue btn btn-xs" href="index.php">Continue Shopping</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total getGrandtotal"></span>
				 <span>Discount</span>
				 <span class="total">---</span>
				 <span>Delivery Charges</span>
				 <span class="total">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTAL</h4>
			 <span class="total final getGrandtotal">450.00</span>
			 <div class="clearfix"></div>
			 <div class="total-item">
				<?php 
				error_reporting(0);
						include_once("db.php");
						if($_SESSION['id'] =="")
						{
							echo'<ul class="list-inline">
					<li><a href="registration3.php" class="btn btn-info" >Create Account &darr;</a></li>
					<li><a href="registration2.php" class="btn btn-info">Checkout As Guest &darr;</a></li>
				 </ul>';
						}else
						{
							echo'
							<ul class="list-unstyled">
								 <li><a href="paymentmode.php" class="btn btn-info">Cart CheckOut &darr;</a></li>
							</ul>
							';
							
						} 
						?>
			 </div>
			</div>
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
