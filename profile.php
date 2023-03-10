<?php
	session_start();
	error_reporting(0);
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

<style>
        @-webkit-keyframes placeHolderShimmer {
          0% {
            background-position: -468px 0;
          }
          100% {
            background-position: 468px 0;
          }
        }

        @keyframes placeHolderShimmer {
          0% {
            background-position: -468px 0;
          }
          100% {
            background-position: 468px 0;
          }
        }

        .content-placeholder {
          display: inline-block;
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
          -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
          -webkit-animation-name: placeHolderShimmer;
          animation-name: placeHolderShimmer;
          -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
          background: #f6f7f8;
          background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
          background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          -webkit-background-size: 800px 104px;
          background-size: 800px 104px;
          height: inherit;
          position: relative;
        }

        .post_data
        {
          padding:24px;
          border:1px solid #f9f9f9;
          border-radius: 5px;
          margin-bottom: 24px;
          box-shadow: 10px 10px 5px #eeeeee;
        }
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
			<li class="active grid"><a class="color1" href="#">Profile</a></li>
			<li class="grid"><a class="color1" href="uploadprd.php">Publish Product</a></li>
			<li class="grid"><a class="color1" href="view_delect.php">View / Delect Products</a></li>
			<li class="grid"><a class="color1" href="vieworder.php">View Customer Order</a></li>
			<li class="grid"><a class="color1" href="chnagpass.php">Change Password</a></li>
			<li class="grid"><a class="color1" href="logout.php">Logout</a></li>						
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
			<h2>OUR PRODUCTS</h2>			
		 <div class="col-md-9 product-model-sec">
		 <div id="load_data_message"></div>
			<div id="getProct"></div>
			
			<input type="hidden" id="genNum" name="genNum">
			
			<div class="rsidebar span_1_of_left">
			<div class="pagination" id="pageno"></div>
				 <section  class="sky-form">
					 <div class="product_right">
						 <h3 class="m_2">Categories</h3>					  	
							<div id="getCate2"></div>	
							<div id="load_paga"></div>
						  <!--script-->
						
						<script>
							$(document).ready(function(){
								$("#getProct").hide();
								document.getElementById("getCate2").style.display = "none";
								$(".tab1 .single-bottom").hide();
								$(".tab2 .single-bottom").hide();
								$(".tab3 .single-bottom").hide();
								$(".tab4 .single-bottom").hide();
								$(".tab5 .single-bottom").hide();
								
								$(".tab1 ul").click(function(){
									$(".tab1 .single-bottom").slideToggle(300);
									$(".tab2 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 .single-bottom").slideToggle(300);
									$(".tab1 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab5 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 .single-bottom").slideToggle(300);
									$(".tab5 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 .single-bottom").slideToggle(300);
									$(".tab4 .single-bottom").hide();
									$(".tab3 .single-bottom").hide();
									$(".tab2 .single-bottom").hide();
									$(".tab1 .single-bottom").hide();
								})	
								
								    var limit = 16;
									var start = 0;
									var action = 'inactive';

									function lazzy_loader(limit)
									{
									  var output = '';
									  for(var count=0; count<limit; count++)
									  {
											output += ' <div class="content-placeholder product-grid love-grid">';	
											output += '	<div class="content-placeholder product-img thickbox">';
											output += '		<img src="images/" class="" width="276" height="380" alt=""/>';
											output += '		</div>	';
											output += '				<div class="b-wrapper">';
											output += '				</div>';
											output += ' <div class="product-info simpleCart_shelfItem">';
											output += '	<div class="product-info-cust prt_name">';
											output += '	<h4 class="content-placeholder"></h4>';
											output += '		<span class="item_price content-placeholder"></span>';
											output += '		<a href="#" class="content-placeholder glyphicon glyphicon-shopping-cart item_add items" style="text-decoration:none;"></a>';
											output += '	</div>		';											
											output += '<div class="clearfix"> </div>';
											output += ' </div>';
										    output += '</div>';
									  }
									  $('#load_data_message').html(output);
									}
									
									lazzy_loader(limit);
									
									function pagerloader()
									{
									  var output = '';
									  for(var count=0; count<5; count++)
									  {
										   output += '  <div class="tab">';
											output += ' <ul class="place content-placeholder">';								
											output += '	<li class="sort content-placeholder"></li>';
											output += '	 <li class="content-placeholder by glyphicon glyphicon-arrow-right"></li>';
											output += '		<div class="clearfix"> </div>';
											 output += ' </ul>';
										   output += ' </div>	';
									 }
									  $('#load_paga').html(output);
									}

									pagerloader();
									
									
									 $(window).load(function() {  
									  document.getElementById("load_data_message").style.display = "none";
									  document.getElementById("load_paga").style.display = "none";
									  $("#getProct").show();
									  $("#getCate2").show();
									  
									  });

							});
						</script>
						<!-- script -->					  
				 </section>	       
			 </div>			 
			 <div class="clearfix"></div>

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