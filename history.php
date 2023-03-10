<?php
error_reporting(0);
	session_start();
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
		 <div class="col-md-9">
			<?php
				include_once('db.php');
				$user = $_SESSION['id'];
				$sql = "SELECT `ReFid`, `date`,sum(`totalpx`), `Status` FROM `customerorder` WHERE `user_id` = '$user' group by ReFid";
				$query = mysqli_query($conn,$sql);
				$result = mysqli_num_rows($query);
		if($result > 0){
			echo'
				<div class="table-responsive">
				<table class="table table-striped">
				<thead>
				<tr>
					<th>Reference number</th>
					<th>Date</th>
					<th>Total</th>
					<th>Order Status</th>
					<th>View Order</th>
				</tr>
				</thead>
			';
			while($row = mysqli_fetch_array($query)){
				echo'
					<tr>
						<td>'.$row['ReFid'].'</td>
						<td>'.$row['date'].'</td>
						<td>GH&cent;'.$row['sum(`totalpx`)'].'</td>
						<td>';
							if($row['Status'] == 0){
								echo '<a href="#" class="btn btn-info">Processing</a>';
							}elseif($row['Status'] == 1){
								echo '<a href="#" class="btn btn-success">Completed</a>';
							}elseif($row['Status'] == 2){
								echo '<a href="#" class="btn btn-default">Ready For Pickup</a>';
							}elseif($row['Status'] == 3){
								echo '<a href="#" class="btn btn-danger">Cancelled</a>';
							}
						echo'</td>
						<td><a href="customerview2.php?id='.$row['ReFid'].'" class="btn btn-success">View Order</a></td>
					</tr>
				';
			
			}
			echo'</table>
				</div>';
		}	else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Failed!</strong> No Transactions</div>';
		}		
	?>

</div>	
</div>
</div>

</body>
</html>