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
<script type="text/javascript" src="js/action2.js"></script>
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
						<a href="index.php" class="navbar-brand">BookStore</a>
				</div>
				<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Products</a></li>
				</ul>
		 </div>
		 <p><br></p>
		 <p><br></p>
		 <p><br></p>
		 <div class="contaner-fluid">
				<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" id="displayError"></div>
				<div class="col-md-1"></div>
				</div>
				<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
								<div class="panel panel-info">
										<div class="panel-heading"><h2>Guest Registration</h2></div>
										<div class="panel-body">
											<form action="" method="post">
													<div class="row">
															<div class="col-md-6">
																	<label>FirstName</label>
																	<input type="text" class="form-control" id="fname" name="fname" placeholder="FIRST NAME" required>
															</div>
															<div class="col-md-6">
																	<label>LastName</label>
																	<input type="text" class="form-control" id="lname" name="lname" placeholder="LAST NAME" required>
															</div>
													</div><P><BR></P>																								
													<div class="row">
															<div class="col-md-6">
																	<label>Mobile</label>
																	<input type="number" class="form-control" id="mobil" name="mobil" placeholder="MOBILE" required>
															</div>
															<div class="col-md-6">
																	<label>Email</label>
																	<input type="email" class="form-control" id="email" name="email" placeholder="EMAIL ADDRESS" required>
															</div>
													</div>
										</div>
										<div class="panel-footer" style="height:50px;">
										<input type="submit" name="gsend" id="gsend" value="Save And Continue" class="btn btn-success btn-sm pull-right"/></div>
								</form></div>
						</div>
						<div class="col-md-1"></div>
				</div>
		 </div>
 </body>
</html>