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
<div class="cart">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Customer Order</li>
		 </ol>
		 <ol class="breadcrumb">
		  <li><a href="vieworder.php">&larr;Back</a></li>
		 </ol>
		 <div class="col-md-9 cart-items">
				<?php
				include_once('db.php');
				$refid = $_GET['id'];
				$sql = "SELECT * FROM `customerorder` WHERE `ReFid` = '$refid' ";
			   $query = mysqli_query($conn,$sql);
			   $result = mysqli_num_rows($query);
			if($result > 0){
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
							 data: {delekey:1, cid: cid},
							 success: function(data){
								$(".cart-header'.$x.'").fadeOut("slow", function(c){
								$(".cart-header'.$x.'").remove();
						});
							 }
							});	 
						});	  
					});
			   </script>
			 <div class="cart-header'.$x.'">
				 <div class="close'.$x.' glyphicon btn-danger pull-right" cid="'.$prod_id.'"></div>
				 <div class="cart-sec">
						<div class="cart-item cyc">
							 <img src="images/'.$row['prod_image'].'" class="img-responsive" width="276" height="380" alt=""/>
						</div>
					   <div class="cart-item-info">
							 <h3>'.$row['prod_title'].'</h3>
							 <h4><span>GH&cent;</span><b>'.$row['price'].'</b></h4>
							 <p class="qty">Qty ::</p>
							 <input type="number" name="quantity" value="'.$row['qty'].'" class="updatetot form-control input-small">
					   </div>
					   <div class="clearfix"></div>
						<div class="delivery">
							 <p>Sub Total:: GH&cent;<b id="showtot-'.$prod_id.'">'.$row['totalpx'].'.00</b></p>
							 <span>To be Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>						
				  </div>
			 </div>	
				<div class="clearfix"></div>
				';
				$x++;
			}
			
		}else{
			echo' <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>No Product Added to Cart Yet</strong>
			';
		}
				?>		 
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

