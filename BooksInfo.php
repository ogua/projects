<?php
		session_start();
		error_reporting(0);
	    Include_once('db.php');
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
				$id = $_GET['id'];
		}
		$sql = "SELECT * FROM `products` WHERE `id` = $id";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
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
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/action2.js"></script>
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
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Books</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
						<li>
												<a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge" id="bage">0</span></a>

								
						</li>
						<li><a href="#"  class="dropdown-toggle" data-toggle="dropdown" style="margin-right:15px;"><span class="glyphicon glyphicon-user"></span><?php  if($_SESSION['name'] ==""){echo 'Hi: Guest';}else{echo 'Hi: ' .$_SESSION['name'];} ?></a>
							 <ul class="dropdown-menu">
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
				<div class="col-md-10" id="displayError"></div>
				<div class="col-md-1"></div>
				</div>
				<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div id="displayCartMessage"></div>
								<div class="panel panel-info">
										<div class="panel-heading"><h2>Book Information</h2></div>
										<div class="panel-body">
											 <div class="row">
													<div class="col-md-9">
														<p><?php echo substr($row['prod_desc'],0,10000); ?></p>
														<p><br></p>
														<p><br></p>
														<ul class="list-inline">
															<li><label>Price: <i class="text-success"><?php echo 'GH&cent;'.$row['prod_px'].' ';?></i></label></li>
															<li><?php echo '<button type="button" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs">Add To Cart</button> ';?></li>
															<li class="pull-right"><b>ISBN:<i class="text-success"><?php echo $row['prod_isbn']; ?></i></b></li>
															<li class="pull-right"><b>Author: <i class="text-success"><?php echo $row['author']; ?></i></b></li>
														</ul>
														
													</div>
													<div class="col-md-3">
														 <img class="thumbnail" src="images/<?php echo $row['prod_img'];?>" height="200" width="150"/>
													<!--<h4 class="pull-riEght"></h4>
													<h4 style="text-decoration:none;">Author: <?php echo $row['author']; ?></h4>
													---></div>
											 </div>
										</div>
										<div class="panel-footer">
								         </div>
						         </div>
						<div class="col-md-1"></div>
				</div>
		 </div>
		 <footer>
				<div class="panel-success">
						<div class="panel-heading"></div>
						<div class="panel-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-3">
										<div class="panel-info">
											<div class="panel-heading">Get Connected</div>
											<div class="panel-body">
												<ul>
													<li>Home</li>
													<li>Products</li>
													<li>SignUp</li>
													<li>Login</li>
												</ul>
											</div>
											<div class="panel-footer">&copy; Home</div>
										</div>
									</div>
									<div class="col-md-3">
											<div class="panel-info">
											<div class="panel-heading">Social</div>
											<div class="panel-body">
												<ul>
													<li>Facebook</li>
													<li>Twitter</li>
													<li>Youtube</li>
													<li>LinkedIn</li>
												</ul>
											</div>
											<div class="panel-footer">&copy; social</div>
										</div>
									</div>
									<div class="col-md-3">
											<div class="panel-info">
											<div class="panel-heading">About</div>
											<div class="panel-body">
												<ul>
													<li>About</li>
													<li>Mission</li>
													<li>Vision</li>
													<li>Services</li>
												</ul>
											</div>
											<div class="panel-footer">&copy; About</div>
										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
						</div>
						<div class="panel-footer">All rights Reserved</div>
				</div>
		 </footer>
 </body>
</html>