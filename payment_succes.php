<?php
	session_start();
	 $sql = "SELECT MAX(`Refta`) as maximum_num FROM refTable ";
	 $query = mysqli_query($conn,$sql);
	 if($query){
	 $row = mysqli_fetch_array($query);
	 $num = $row['maximum_num'];
	 $num3 = $num + rand(0,488);
	 $num4 = 'REF'.$num3.'AF'.$num3;
	 $_SESSION['Refids'] = $num4;
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
<script type="text/javascript" src="js/action2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/npm.js"></script>
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
 table tr td {
	 padding: 10px;  
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
						<li><a href="index.php"><span class="glyphicon glyphicon-model-home"></span>Products</a></li>
				</ul>
			</div>
		<p><br></p>
		<p><br></p>
		<p><br></p>
		<div class="container-fluid">
			<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading"></div>
							<div class="panel-body">
								<h1>Thank You ! </h1>
								<br>
								<p>Hello <?php 
						include_once("db.php");
						if($_SESSION['id'] =="")
						{
							echo 'Welcome: Guest';
						}else
						{
							$sql = "SELECT * FROM `users` WHERE `id` = '".$_SESSION['id']."' ";
							$query = mysqli_query($conn,$sql);
							if($query){
								$row = mysqli_fetch_array($query);
								echo 'Welcome: ' .$row['firstname'];
							}
							
						} 
						?>Your payment Process is
								successfully done, <br>Your Reference Id is <b><?php echo $_SESSION['Refids'];?></b><br>
								You can continue Shopping <br><a href="index.php"><button class="btn-success btn">Continue Shopping</button></a>
								</p>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
					<div class="col-md-2"></div>
			</div>
		</div>
 </body>
</html>