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
<div class="registration-form">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Order Reference</li>
		 </ol>
		 <h2>Thank you !</h2>
		 <div class="col-md-6 reg-form">
			 <div class="reg">
				<p>Your Order Has been Submitted Successfully</p>
				<p>Your Reference id is <b><?php echo $_SESSION['Refids'];?></b> </p>
				<p>Please Take note of your Reference Id</p>
				<a href="index.php" id="refids" class="btn btn-info">Continue Shopping</a>
				 
			 </div>
		 </div>
		 <div class="col-md-6 reg-right">
			<div id="disply"></div>
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
		$("#refids").on("click", function(e){
			e.preventDefault();
			$.ajax({
				url: 'action.php',
				type: 'post',
				data: {unsetrefid: 1},
				success: function(data){
					window.location.href = "index.php";
				}
			});
		});
	</script>	
</body>
</html>
		