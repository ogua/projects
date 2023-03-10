<?php
	session_start();
	error_reporting(0);
	if(isset($_SESSION['profile1'])){
	   header("location: profile.php");
	}if(isset($_SESSION['profile2'])){
	   header("location: profile2.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/npm.js"></script>
<script type="text/javascript" src="js/action.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<style>
.back{
	background-image: url("images/freddie-marriage-92621.jpg");
	bacground-size: cover;
	image-repeat: no-repeat;
}
getHov:hover{
	border:1px solid #ccc;
}
  //images zoomin and out
   
/*-- content --*/
.content-lgrid,.content-img-left,.content-rgrid{
	padding:0;
}
.content-lgrid{
	width:33.33333333%;
}
.content-rgrid {
    width: 33.334%;
}
/* CSS3 Hover Effects */
.img-box, .info-box {
  display: block;
  width: 100%;
  height: 100%;
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden;
}
.img-box img, .info-box img {
  display: block;
  position: relative;
  max-width: 100%;
  max-height: 100%;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  -ms-transition: all 0.4s ease-in-out;
  -o-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

.img-box {
  position: relative;
}

.content-grid-effect {
  display: block;
  position: relative;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  -ms-transition: all 0.6s ease-in-out;
  -o-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
  overflow: hidden;
}
.content-grid-effect .info-content {
  z-index: 2 !important;
  filter: alpha(opacity=0);
  -wekbit-opacity: 0;
  -moz-opacity: 0;
  opacity: 0;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.content-grid-effect .img-box:after, .content-grid-effect .img-box:before, .content-grid-effect .info-box:after, .content-grid-effect .info-box:before {
  content: "";
  display: block;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
  -webkit-transition: 0.8s ease-in-out;
  -moz-transition: 0.8s ease-in-out;
  -ms-transition: 0.8s ease-in-out;
  -o-transition: 0.8s ease-in-out;
  transition: 0.8s ease-in-out;
  filter: alpha(opacity=0);
  -wekbit-opacity: 0;
  -moz-opacity: 0;
  opacity: 0;
}
.content-grid-effect.horizontal .img-box:before {
  top: 0;
  left: 0;
  width: 100%;
  height: 25%;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  -ms-transform: rotateX(90deg);
  -o-transform: rotateX(90deg);
  transform: rotateX(90deg);
}
.content-grid-effect.horizontal .img-box:after {
  top: 25%;
  left: 0;
  width: 100%;
  height: 25%;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  -ms-transform: rotateX(90deg);
  -o-transform: rotateX(90deg);
  transform: rotateX(90deg);
}
.content-grid-effect.horizontal .info-box:after {
  top: 50%;
  left: 0;
  width: 100%;
  height: 25%;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  -ms-transform: rotateX(90deg);
  -o-transform: rotateX(90deg);
  transform: rotateX(90deg);
}
.content-grid-effect.horizontal .info-box:before {
  top: 75%;
  left: 0;
  width: 100%;
  height: calc(25% + 1px);
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  -ms-transform: rotateX(90deg);
  -o-transform: rotateX(90deg);
  transform: rotateX(90deg);
}
.content-grid-effect.vertical .img-box:before {
  top: 0;
  left: 0;
  width: 25%;
  height: 100%;
  -webkit-transform: rotateY(90deg);
  -moz-transform: rotateY(90deg);
  -ms-transform: rotateY(90deg);
  -o-transform: rotateY(90deg);
  transform: rotateY(90deg);
}
.content-grid-effect.vertical .img-box:after {
  top: 0;
  left: 25%;
  width: 25%;
  height: 100%;
  -webkit-transform: rotateY(90deg);
  -moz-transform: rotateY(90deg);
  -ms-transform: rotateY(90deg);
  -o-transform: rotateY(90deg);
  transform: rotateY(90deg);
}
.content-grid-effect.vertical .info-box:after {
  top: 0;
  left: 50%;
  width: 25%;
  height: 100%;
  -webkit-transform: rotateY(90deg);
  -moz-transform: rotateY(90deg);
  -ms-transform: rotateY(90deg);
  -o-transform: rotateY(90deg);
  transform: rotateY(90deg);
}
.content-grid-effect.vertical .info-box:before {
  top: 0;
  left: 75%;
  width: calc(25% + 1px);
  height: 100%;
  -webkit-transform: rotateY(90deg);
  -moz-transform: rotateY(90deg);
  -ms-transform: rotateY(90deg);
  -o-transform: rotateY(90deg);
  transform: rotateY(90deg);
}
.content-grid-effect:hover .img-box:after, .content-grid-effect:hover .img-box:before, .content-grid-effect:hover .info-box:after, .content-grid-effect:hover .info-box:before {
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  -ms-transform: rotateX(0deg);
  -o-transform: rotateX(0deg);
  transform: rotateX(0deg);
  filter: alpha(opacity=100);
  -wekbit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
}
.content-grid-effect:hover .info-content {
  filter: alpha(opacity=100);
  -wekbit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
}
.slow-zoom .img-box {
  z-index: 0;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 2.2s ease-in-out;
  -moz-transition: all 2.2s ease-in-out;
  -ms-transition: all 2.2s ease-in-out;
  -o-transition: all 2.2s ease-in-out;
  transition: all 2.2s ease-in-out;
}
.slow-zoom:hover .img-box {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.slow-zoom {
  display: block;
  overflow: hidden;
  position: relative;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
</style>
</head>
 <body class="back">
		 <div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
						<a href="index.php" class="navbar-brand">BookStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="AdminLogin.php"><span class="glyphicon glyphicon-model-home"></span>Admin</a></li>
						<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search_text"></li>
						<li style="left:20px;top:10px;"><input type="submit" class="form-control btn btn-success" id="search_btn" value="Search"></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
						<li>
						<a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge" id="bage">0</span></a>
						<!------<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge" id="bage">0</span></a>
								<ul class="dropdown-menu">
										<div style="width:500px;">
												<div class="panel-success">
														<div class="panel-heading">Cart</div>
														<div class="panel-body">
																<div class="row">
																		<div class="col-md-3">S.NO</div>
																		<div class="col-md-3">P.Image</div>
																		<div class="col-md-3">P.Name</div>
																		<div class="col-md-3">P.Px</div>
																</div>
																<div id="getCart" style="height:300px; overflow-x: hidden;">
																
																</div>
															
														</div>
														<div class="panel-footer" style="height:50px;">
															<a href="cart.php" class="btn btn-danger pull-right btn-sm">Checkout</a>
														</div>
												</div>
										</div>
								</ul>---->
						</li>
						<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Signin</a>
							 <ul class="dropdown-menu">
									<div style="width:300px;">
											<div class="panel-success">
													<div class="panel-heading">Login</div>
													<div class="panel-body bg-default">
														<label>Email</label>
														<input type="email" id="email" class="form-control" />
														<label>Password</label>
														<input type="password" id="pass"class="form-control" />
													</div>
													<div class="panel-footer" style="height:50px;"><b style="color:red;" id="loginErr"></b><input type="submit"id="login" name="login" value="login" class="btb btn-success pull-right"></div>
											</div>
									</div>
							 </ul>
						</li>
						<li><a href="signup.php" style="margin-right:13px;" ><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
				</ul>
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
						<div class="col-md-1">
							
						</div>
						<div class="col-md-2">
								<div id="getCate">
								
								</div>
								<!--<div class="nav nav-pills nav-stacked">
										<li class="active"><a href="#">Categories</a></li>
										<li><a href="#">Mens Wear</a></li>
										<li><a href="#">Ladies Wear</a></li>
										<li><a href="#">Kits Wear</a></li>
										<li><a href="#">Electronics</a></li>
										<li><a href="#">Furniture</a></li>
								</div>-->
	
								<!--<div class="nav nav-pills nav-stacked">
										<li class="active"><a href="#">Brand</a></li>
										<li><a href="#">HP</a></li>
										<li><a href="#">SUMSUND</a></li>
										<li><a href="#">PHILIPS</a></li>
										<li><a href="#">Brand</a></li>
										<li><a href="#">Brand</a></li>
								</div>-->
								<input type="hidden" id="genNum" name="genNum">
						</div>
						<div class="col-md-8">
	                                  <div id="displayCartMessage"></div>
								<div class="panel panel-info">
										<div class="panel-heading"><h4 id="dispcatName">Books</h4></div>
										<div class="panel-body">
										  <div id="getProct">
										  
										  </div>
												<!--<div class="col-sm-4">
														<div class="panel-success">
																<div class="panel-heading">Mens Wear</div>
																<div class="panel-body">
																</div>
																<div class="panel-footer">$1000.00
																<button type="button" class="btn btn-info btn-xs pull-right">AddToCart</button>
																</div>
														</div>
												  </div>----->
										</div>
										<div class="panel-footer">&copy; 2017</div>
								</div>
						</div>
						<div class="col-md-1"></div>						
				</div>
				<center>
								<div class="pagination" id="pageno">
										<!-----<li><a href="#">1</a></li>---->
								</div>
						</center>
	<div style="right:0;bottom:0;position:fixed;">
	<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '0hp4nQRsfz';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
	</div>		 
 </body>
</html>