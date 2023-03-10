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
		$prductcat = $row['prod_cat'];
?>
<!DOCTYPE html>
<html>
<head>
<title>:: Craftwork</title>
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
<script src="js/jquery.emojiRatings.min.js"></script>
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
				 <a href="cart.php"><h3><span class="glyphicon glyphicon-shopping-cart insercart"></span>Cart:<span class="badge" id="bage">0</span></h3></a>
			 
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
<!--Single Page starts Here-->
<div class="product-main">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Product Info</li>
		 </ol>
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">					 
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="css/etalage.css">
						<script src="js/jquery.etalage.min.js"></script>
					 <!-- Include the Etalage files -->
					 <script>
							jQuery(document).ready(function($){
					
								$('#etalage').etalage({
									thumb_image_width: 300,
									thumb_image_height: 400,
									source_image_width: 700,
									source_image_height: 800,
									show_hint: true,
									click_callback: function(image_anchor, instance_id){
										alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
									}
								});
								// This is for the dropdown list example:
								$('.dropdownlist').change(function(){
									etalage_show( $(this).find('option:selected').attr('class') );
								});
					
							});
						</script>
						<!--//details-product-slider-->
					 <div class="details-left-slider">
						  <ul id="etalage">
						  <?php
							$fsql = "SELECT * FROM `products` WHERE `id` = $id";
							$fquery = mysqli_query($conn,$fsql);
							if($fquery){
								
							}
						  ?>
							 <li>
								<a href="optionallink.html">
								<img class="etalage_thumb_image" src="images/<?php echo $row['prod_img']; ?>" />
								<img class="etalage_source_image" src="images/<?php echo $row['prod_img']; ?>" />
								</a>
							 </li>
								<?php
									for($x=1;$x<=2;$x++){
										echo'
										<li>
											<img class="etalage_thumb_image" src="images/'.$row['prod_img'].'" />
											<img class="etalage_source_image" src="images/'.$row['prod_img'].'"/>
										 </li>
										';
									}
								?>
							 <div class="clearfix"></div>
						 </ul>
					 </div>
					 <div class="details-left-info">
							<h3><?php $prod_id = $row['id']; echo $row['prod_title'];?></h3>
								<h4></h4>							
							<p><?php echo 'GH&cent;<b id="showtot-'.$prod_id.'">'.$row['prod_px'].' </b>';?></p>
							<div class="btn_form">
								<?php echo ' <a href="#" cid="'.$row['id'].'" class="insercart btn btn-info btn-xs">Add to cart</a>';?>
							</div>
							<div class="flower-type">
							<div class="form-group" id="rating">
								<label  for="rating">Rating</label>
							 </div>
							 <label>Review</label>
							 <div class="clearfix"></div>
							 <input type="hidden" id="prdid" value="<?php echo $row['id']; ?>">
							 <textarea style="width:100%;" class="form-control" name="review" rows="4" col="4" id="review"placeholder="Enter Your Review"></textarea>
							<a href="#" id="postreview" class="btn btn-info">Post Review </a>
							<div class="clearfix"></div>
							</div>
							<h5>Description  ::</h5>
							<p class="desc"><?php echo substr($row['prod_desc'],0,10000); ?></p>
							 
							<h5>Reviews  ::</h5>
							<p class="desc">
								<?php
									$rsql = "SELECT * FROM `review` WHERE `productid` = {$row['id']}";
									$rquery = mysqli_query($conn,$rsql);
									if($rquery){
										echo'<ul class="list-unstyled" id="reviesd">';
										
										while($rows = mysqli_fetch_array($rquery)){
											?>
												<li>Name: <?php echo $rows['name']; ?>
												<br>
												Review:  <?php echo $rows['review']; ?></li>
												<li><hr style="border:1px solid #fff;"></li>
											
											<?php
										}
										echo'</ul>';
									}else{
										echo $rsql;
									}
								?>
							</p>
							
					 </div>
					 <div class="clearfix"></div>				 	
				 </div>
			 </div>
		 </div>		 
		 <div class="clearfix"></div>
		 <div class="single-bottom2">
			 <h6>Related Products</h6>
				<div class="rltd-posts">
				<?php
					$resql = "SELECT * FROM `products` WHERE `prod_cat` = '$prductcat' order by rand() limit 0,4";
					$requery = mysqli_query($conn,$resql);
					if($requery){
						while($rerow = mysqli_fetch_array($requery)){
							echo'<div class="col-md-3 pst1">
						 <img src="images/'.$rerow['prod_img'].'" alt=""/>
						 <h4><a href="single.php?id='.$rerow['id'].'">'.$rerow['prod_title'].'</a></h4>
						 <a href="#" cid="'.$rerow['id'].'" class="insercart btn btn-info btn-xs">Add to cart</a>
					 </div>';
						}
						
					}
				?>				 
					 <div class="clearfix"></div>
				</div>
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
		$("input[name='rating']").val(3);
			$("#rating").emojiRating({
				fontSize: 32,
				emoji: 'U+2B50',
				count: 5,
				onUpdate: function(count) {
					$(".review-text").show();
					$("#starCount").html(count + " Star");
				}
			});
			$("#rating").click( function(e) {
				e.preventDefault();				 
				var	rating = $(this).find('.emoji-rating').val();
				var id = '<?php echo $_SESSION['id']; ?>';
				if(id ==""){
					alert('Please Login To Post Rating');
					return;
				}
				alert(rating+" Rating Added Successfully");
			});
			
			$("body").delegate("#postreview","click", function(event){
				event.preventDefault();
				var text1 = $("#review").val();
				var prid = $("#prdid").val();
				if(text1 == ""){
					alert("Review Message Cant Be Empty");
					return;
				}
				$.ajax({
				 url : "postreview.php",
				 method : "post",
				 data: {text1: text1, prid: prid},
				 success: function(data){
					alert(data);	
				 }
				});
		
	        });
	
		</script>
</body>
</html>