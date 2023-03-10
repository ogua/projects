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
			<li class="grid"><a class="color1" href="view_delect.php">View / Delect Products</a></li>
			<li class="active grid"><a class="color1" href="vieworder.php">View Customer Order</a></li>
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
		  <li class="active">View Customer Order</li>
		 </ol>
		 <div class="col-md-9 cart-items">
		<?php
				include_once('db.php');
	    $sql = "SELECT * FROM `customerorder` WHERE `Sellerid` = '".$_SESSION['sellid']."' group by ReFid";
		$query = mysqli_query($conn,$sql);
		 $sql2 = "SELECT * FROM `customerorder` order by `id` desc";
		$query2 = mysqli_query($conn,$sql2);
		$results = mysqli_num_rows($query);
		if($results > 0){
			$x = 1;
			while($row = mysqli_fetch_array($query)){
				$prod_id = $row['ReFid']; 
				    echo'
					<div class="cart-header'.$x.'">
				 <div class="removecart close'.$x.' glyphicon glyphicon-remove btn-danger pull-right" pid = "'.$x .'" cid="'.$prod_id.'" title="CANCEL CUSTOMER ORDER"></div>
				 <div class="cart-sec">
					   <div class="cart-item-info">
							 <p style="width:240px;">Fullname :: <b class="pull-right">'.$row['Fullname'].'</b></p>
							 <p style="width:240px;">Number :: <b class="pull-right">'.$row['Number'].'</b></p>
							 <p style="width:240px;">Refid :: <b class="pull-right">'.$row['ReFid'].'</b></p>
							 <p class="qty currentsta'.$row['ReFid'].'"  style="width:240px;">Current Status ::
							 ';
								
								if($row['Status'] == 0){
								echo '<a href="#" id="curntstst" class="btn btn-info btn-sm pull-right" >Processing</a>';
							}elseif($row['Status'] == 1){
								echo '<a href="#"  id="curntstst"class="btn btn-success btn-sm pull-right" >Completed</a>';
							}elseif($row['Status'] == 2){
								echo '<a href="#" id="curntstst" class="btn btn-default btn-sm pull-right" >Ready For Pickup</a>';
							}elseif($row['Status'] == 3){
								echo '<a href="#" id="curntstst" class="btn btn-danger btn-sm pull-right" >Cancelled</a>';
							}elseif($row['Status'] == 4){
								echo '<a href="#" id="curntstst" class="btn btn-success btn-sm pull-right" >Deliveried</a>';
							}
							echo' </p>
							<p class="qty" style="width:240px;">Update Status ::
							<select class="form-control pull-right form-control-sm UpSta" cid='.$row['ReFid'].' id="UpSta" name="UpSta">
							  <option value="0">Processing</option>
							  <option value="1">Completed</option>
							  <option value="2">Ready For Pickup</option>
							  <option value="3">Cancelled</option>
							  <option value="4">Deliveried</option>
							 </select>
							</p>
						<p><a href="customerview.php?id='.$row['ReFid'].'" class="btn btn-success btn-sm">View Order</a></p>
					   </div>
					   <div class="clearfix"></div>
						<div class="delivery">
							 <div class="clearfix"></div>
				        </div>						
				  </div>
			 </div>	
				<div class="clearfix"></div>';
				$x++;
			}
			
		}else{
			echo '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>No Ordered Items Yet</strong>';
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
	<script>
		$('document').ready(function(){
			$(".UpSta").on("change",function(){
				var text = $(this).val();
				var cid = $(this).attr("cid");
				//alert(text+""+cid);
				$.ajax({
					 url : "gemrep.php",
					 method : "post",
					 data: {upcustom: 1, text: text, cid: cid},
					 success: function(data){
						alert(data);
						if(text.match("0")){
							$(".currentsta"+cid).html('<a href="#" class="btn btn-info btn-sm pull-right" >Processing</a>');
						}if(text.match("1")){
							$(".currentsta"+cid).html('<a href="#" class="btn btn-success btn-sm pull-right" >Completed</a>');
						}if(text.match("2")){
							$(".currentsta"+cid).html('<a href="#" class="btn btn-default btn-sm pull-right" >Ready For Pickup</a>');
						}if(text.match("3")){
							$(".currentsta"+cid).html('<a href="#" class="btn btn-danger btn-sm pull-right" >Cancelled</a>');
						}
					 }
				});
			});
			
			$(".removecart").on("click", function(){
				var cid = $(this).attr("cid");
				$.ajax({
					url: 'action.php',
					method: 'post',
					data: {delectcart: 1, cid: cid},
					success: function(data){
						alert(data);
					window.location.href='vieworder.php';	
					}
				});
			});
			
		});
	</script>
</body>
</html>

