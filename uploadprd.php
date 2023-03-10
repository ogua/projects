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
	select,.log form input[type="number"],textarea,.log form input[type="file"]{
		width: 100%;
		padding: 8px;
		font-size: 1em;
		font-weight: 400;
		border: 1px solid #D6D6D6;
		outline: none;
		color: #5d5959;
		margin-bottom:2em;
	}
	.errors{
		color:red;
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
			<li class="grid"><a class="color1" href="#">Profile</a></li>
			<li class="active grid"><a class="color1" href="uploadprd.php">Publish Product</a></li>
			<li class="grid"><a class="color1" href="view_delect.php">View / Delect Products</a></li>
			<li class="grid"><a class="color1" href="vieworder.php">View Customer Order</a></li>
			<li class="grid"><a class="color1" href="vieworders.php">Delivery Status</a></li>
			<li class="grid"><a class="color1" href="chnagpass.php">Change Password</a></li>
			<li class="grid"><a class="color1" href="logout.php">Logout</a></li>						
		</ul> 	
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="login">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Publish Product</li>
		 </ol>
		 <div class="col-md-6 log">			 
					 <form id="uploadform" action="" method="post"  enctype="multipart/form-data">
					 <img style="border-radius:200px;" src="images/co.png" width="100" height="100" id="showImg" name="showImg" align "center" class "centre" alt="PRODUCT IMAGE"/>
						<hr>
					 <h5>Image Url:</h5>	
						<input type="file" value="" id="fileToUpload" name="fileToUpload" class="form-control" required>
					 <span class="errors" id="fileToUploadError"></span>
					 <input type="hidden" value="<?php echo $_SESSION['sellid']; ?>" id="sellid" name="sellid">
					 <h5>Product Title:</h5>
					 <input type="text" value="" id="lname"  name="lname" required style="width:100%;">
					 <div class="errors" id="lnameError"></div>
					<h5>Product Category</h5>
					<?php
						include_once("db.php");
							$sql = "SELECT * FROM `category` ";
							$query = mysqli_query($conn,$sql);
							if($query){
							echo'<div class="form-group">
									<select class="form-control" id="cat" name="cat" style="width:100%;" required>
										<option value="">Select Product Category</<option>';
									while($row = mysqli_fetch_array($query)){
										echo' <option value="'.$row['catID'].'">'.$row['CatTitle'].'</<option>';
									}
								echo' </select>
								</div>';
									}
					?> 
					<div class="errors" id="catError"></div>
					<h5>Price</h5>
					<input type="number" id="aln1" name="aln1" required>
					<div class="errors" id="aln1Error"></div>
					<h5>Product Description</h5>
					<textarea cols="3" rows="3" class="form-controls" id="drudpre" name="drudpre" required></textarea>
					<div class="errors" id="drudpreError"></div>
					<h5>Product Keywords</h5>
					<textarea cols="3" rows="3" class="form-controls" id="prdukeywrd" name="prdukeywrd" required></textarea>
					 <input type="submit" id="add" name="add" value="Upload">
					</form>				 
		 </div>
		  <div class="col-md-6 login-right">
			  	<h3>View Published Products</h3>
				<a class="acount-btn" href="view_delect.php">View Products</a>
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
<script>
	$("document").ready(function(){
		$("body").delegate(".insercart", "click", function(){
			$("#upSta").change(function(){
			var text = $(this).val();
			alert(text);
			});
		});	

		$(document).on("change","#fileToUpload",function(){
			showImages(this);
		});
					
					function showImages(input){
						if(input.files && input.files[0]){
							var imagetype = input.files[0].type;
							var imageExt = ["image/jpeg","image/png","image/gif"];
							if(!((imagetype==imageExt[0]) || (imagetype==imageExt[1]) || (imagetype==imageExt[2]) )){
								alert("File is not a valid Image");
							}else{
								var reader = new FileReader();
								reader.onload = function(e){
									$("#avatar").css("display","none");
									$("#showImg").attr("src",e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
							
						}
						
		
			}
		
		
		
		$(document).on("submit","#uploadform",function(e){
			e.preventDefault();		
			var prdimg = $("#fileToUpload").val();
			var prdtit = $("#lname").val();
			var prdcat = $("#cat").val();
			//var prdbrand = $("#brnd").val();
			var prdpx = $("#aln1").val();
			var prddesc = $("#drudpre").val();
			var prdkeywrd = $("#prdukeywrd").val();
			if(prdimg == ""){
				$("#fileToUploadError").text("Please Select A Product Images");
			}else{
				$("#fileToUploadError").text("");
			}
			
			if(prdtit == ""){
				$("#lnameError").text("Product Title or Name Cant Be Empty");
			}else{
				$("#lnameError").text("");
			}
			
			if(prdcat == ""){
				$("#catError").text("Product Category Cant Be Empty");
			}else{
				$("#catError").text("");
			}
			
			
			if(prdpx == ""){
				$("#aln1Error").text("Product Price Cant Be Empty");
			}else{
				$("#aln1Error").text("");
			}
			
			if(prddesc == ""){
				$("#drudpreError").text("PRODUCT Description Cant Be Empty");
			}else{
				$("#drudpreError").text("");
			}
			
			if(prdkeywrd == ""){
				$("#prdukeywrdError").text("Product Keywords Cant Be Empty");
			}else{
				$("#prdukeywrdError").text("");
			}
					
			$.ajax({
					url: "upload.php",
					type: "POST",
					mimeTypes: "multipart/form-data",
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
					   if(data.match("emageerror")){
						  $("#fileToUploadError").text("Please Select A Product Images"); 
					   }if(data.match("emageno")){
						   $("#fileToUploadError").text("");
					   }if(data.match("prducterror")){
						  $("#lnameError").text("Product Title or Name Cant Be Empty");
					   }if(data.match("productno")){
						   $("#lnameError").text("");
					   }if(data.match("caterror")){
						 $("#catError").text("Product Category Cant Be Empty");  
					   }if(data.match("catno")){
						 $("#catError").text("");  
					   }if(data.match("pxerror")){
						   $("#aln1Error").text("Product Price Cant Be Empty");
					   }if(data.match("pxno")){
						   $("#aln1Error").text("");
					   }if(data.match("prdxerror")){
						   $("#drudpreError").text("PRODUCT Description Cant Be Empty");
					   }if(data.match("pxdxno")){
						   $("#drudpreError").text("");
					   }if(data.match("kywrderror")){
						  $("#prdukeywrdError").text("Product Keywords Cant Be Empty"); 
					   }if(data.match("keywordno")){
						   $("#prdukeywrdError").text("");
					   }if(data.match("Successfully")){
						  alert("SuccessFully! Product Added SuccessFully");
							$("#fileToUpload").val();
							$("#lname").val("");
							$("#cat").val("");
							$("#aln1").val("");
							$("#drudpre").val("");
							$("#prdukeywrd").val("");
					   }if(data.match("failed")){
						  alert("Failed to Add Product");
					   }
					}
			});
		});
		
		
		$("#uploadorm").submit(function(e){
			e.preventDefault();	
			alert("go");
			return;
			$.ajax({
					url: "upload.php",
					type: "POST",
					mimeTypes: "multipart/form-data",
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
					  alert(data); 
					}
					});
			
		});
		
	});
</script>
</body>
</html>
		