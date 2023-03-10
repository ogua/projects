<?php
	session_start();
	error_reporting(0);
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
			<li class="grid"><a class="color1" href="#">Profile</a></li>
			<li class="grid"><a class="color1" href="uploadprd.php">Publish Product</a></li>
			<li class="active grid"><a class="color1" href="view_delect.php">View / Delect Products</a></li>
			<li class="grid"><a class="color1" href="vieworder.php">View Customer Order</a></li>
			<li class="grid"><a class="color1" href="vieworders.php">Delivery Status</a></li>
			<li class="grid"><a class="color1" href="chnagpass.php">Change Password</a></li>
			<li class="grid"><a class="color1" href="logout.php">Logout</a></li>						
		</ul> 	
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="cart">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">View / Delect Products</li>
		 </ol>
		 <div class="col-md-9 cart-items">
				<?php
				include_once('db.php');
			$sql = "SELECT * FROM `products` WHERE `Sellerid` = '".$_SESSION['sellid']."'";
		   $query = mysqli_query($conn,$sql);
		   $result = mysqli_num_rows($query);
		if($result > 0){
			echo'<h2>Total Products Published <span class="badge" id="">'.$result.'</span></h2>';
			$x = 1;
			while($row = mysqli_fetch_array($query)){
				$prod_id = $row['id'];
				echo'
			   <script>$(document).ready(function(c) {
					$(".close'.$x.'").on("click", function(c){
							var cid = $(this).attr("cid");	
							$.ajax({
							 url : "action.php",
							 method : "post",
							 data: {delBok:1, cid: cid},
							 success: function(data){
								if(data.match("failed")){
									 alert("Error, Please try again Later");
								}else{
									$(".cart-header'.$x.'").fadeOut("slow", function(c){
										$(".cart-header'.$x.'").remove();
									});
								} 
								
							 }
							});	 
						});	  
					});
			   </script>
			 <div class="cart-header'.$x.'">
				 <div class="close'.$x.' glyphicon glyphicon-remove btn-danger pull-right" cid="'.$prod_id.'"></div>
				 <div class="cart-sec">
					<b class="badge text-info">#'.$x.'</b>
						<div class="cart-item cyc">
							 <img src="images/'.$row['prod_img'].'" class="img-responsive" width="276" height="380" alt=""/>
						</div>
					   <div class="cart-item-info">
							 <h3>'.$row['prod_title'].'</h3>
							 <h4><span>GH&cent;</span><b>'.$row['prod_px'].'</b></h4>
							 <p class="qty">Description :: <br>'.$row['prod_desc'].'</p>
					   </div>
					   <div class="clearfix"></div>
						<div class="delivery">
							 <p>Contact:: '.$row['Sellerid'].'</p>
							 <span><a href="editproduct.php?id='.$row['id'].'" class="glyphicon glyphicon-pencil"></a></span>
							 <div class="clearfix"></div>
				        </div>						
				  </div>
			 </div>	
				<div class="clearfix"></div>
				';
				$x++;
				echo '<hr style="border:1px solid #fff;">';
			}
			
			
		}else{
			echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>No Product Published Yet</strong>
			';
		}
		
				
				
				?>
				<!----<div id="customercheckedOut"></div>--->			 
		 </div>
		 
		 <div class="col-md-3 cart-total">
			 
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

