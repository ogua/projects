<?php
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>Craftwork</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
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
				 <a href="cart.php"><h3><span class="glyphicon glyphicon-shopping-cart"></span>Cart:<span class="badge" id="bage">0</span></h3></a>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>		 
				<!-- start header menu -->
		 <ul class="megamenu skyblue">
			<li class="grid"><a class="color1" href="index.php">Home</a></li>
			<li class="active grid"><a class="color1" href="#">Profile</a></li>
			<li class="grid"><a class="color1" href="cart.php">Cart</a></li>
			<li class="grid"><a class="color1" href="history.php">History</a></li>
			<li class="grid"><a class="color1" href="chnagpass.php">Change Password</a></li>
			<li class="grid"><a class="color1" href="logout.php">Logout</a></li>						
		</ul> 	
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li>			<b class="text-danger" style="padding:10px;width:auto;">Welcome: <?php $name = $_SESSION['name']; $lwer = strtolower($name); echo ucfirst($lwer); ?></b>
</li>
		 </ol>
		
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active" id="dispcatName"></li>
		 </ol>
			<h2>OUR PRODUCTS</h2>			
		 <div class="col-md-9 product-model-sec">
			<div id="getProct"></div>
			
			<input type="hidden" id="genNum" name="genNum">
			
			<div class="rsidebar span_1_of_left">
			<div class="pagination" id="pageno"></div>
				 <section  class="sky-form">
					 <div class="product_right">
						 <h3 class="m_2">Categories</h3>					  	
							<div id="getCate2"></div>	
						  <!--script-->
						<script>
							$(document).ready(function(){
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
							});
						</script>
						<!-- script -->					  
				 </section>	       
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