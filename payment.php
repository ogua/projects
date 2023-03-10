<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/custom.css">
<!--//Custom Theme files-->
<!--//js-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/npm.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

</head>
 <body>
		 <div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
						<a href="index.php" class="navbar-brand">OguaStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Products</a></li>
						<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search_text"></li>
						<li style="left:20px;top:10px;"><input type="submit" class="form-control btn btn-success" id="search_btn" value="Search"></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
						<li><a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge" id="bage">0</span></a>
								<ul class="dropdown-menu">
										<!--<div style="width:500px;">
											<div class="panel-success">
														<div class="panel-heading">Cart</div>
														<div class="panel-body">
															<div class="row">
																		<div class="col-md-3">S.NO</div>
																		<div class="col-md-3">P.Image</div>
																		<div class="col-md-3">P.Name</div>
																		<div class="col-md-3">P.Px</div>
																</div>
																<div id="getcart" style="height:300px; overflow-x: hidden;">
																
																</div>
																<!--		<div class="row">
																		<div class="col-md-3">S.NO</div>
																		<div class="col-md-3">P.Image</div>
																		<div class="col-md-3">P.Name</div>
																		<div class="col-md-3">P.Px</div>
																</div>
														</div>
														<div class="panel-footer"></div>
												</div>
										</div>---->
								</ul>
						</li>
						<li><a href="#" onclick="myFunctions()" id="btn2"><span class="glyphicon glyphicon-user"></span><?php echo 'Welcome: ' .$_SESSION['name'] ?></a>
							 <ul class="dropdown-menu" id="myDropdown2">
									<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
									<li><a href="changepass.php"><span class="glyphicon glyphicon-king">Change Password</a></li>
									<li><a href="history.php"><span class="glyphicon glyphicon-time">History</a></li>
									<li><a href="Logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
							 </ul>
						</li>
							</ul>
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
						   <div id="deleupmsg"></div>
								<div class="panel-info">
										<div class="panel-heading"><h1>Payment Option</h1></div>
								          <div class="panel-body">
												<div class="col-sm-4"></div>
												<div class="col-sm-4">
													<a href="#"><button class="btn btn-success">Create Account</button></a>
													<a href="#"><button class="btn btn-success">Guest CheckOut</button></a>
												</div>
												<div class="col-sm-4"></div>
																							
										  </div>
										<!--- <div class="panel-footer" style="height:50px;"><a href="checkout.php"><button class="btn btn-success pull-right">ProceedToPayment</button></a></div>--->
								</div>								
						</div>
						<div class="col-md-1"></div>
				</div>
		 </div>
 </body>
</html>