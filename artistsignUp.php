<!DOCTYPE HTML>
<html>

<head>
	<title>:: Artist SignUp</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
</head>

<body>
	<div class="header">
		<div class="header_top">
			<div class="wrap">
				<div class="logo">
					<a href="index.php">
						<img src="images/logo2.png" alt="" />
					</a>
				</div>
				<div class="menu">
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li class="active">
							<a href="artistsignUp.php">Artist SignUp</a>
						</li>
						<li>
							<a href="book.php">Book Artist</a>
						</li>
						<li>
							<a href="gallery.php">Gallery</a>
						</li>
						<li>
							<a href="contact.php">Contact Us</a>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="wrap">
					<h2>Artist Signup</h2>
					<div class="row">
						<div class="col-md-2">
							<img src="images/" id="showImg" width="180" height="200">
						</div>
						<div class="col-md-6">
							<form method="post" action="" id="artistsignup" enctype="multipart/form-data">
								<div class="form-group">
									<label style="color:white;">Passport Pic Size (500/280)</label>
									<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Your Fullname</label>
									<input type="text" name="fname" id="fname" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Select Gender</label>
									<select name="gender" id="" class="form-control">
										<option value=""></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="form-group">
									<label style="color:white;">Date of Birth</label>
									<input type="date" name="dateofbirth" id="dateofbirth" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Email Address</label>
									<input type="email" name="email" id="email" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Telephone Number</label>
									<input type="number" name="telep" id="telep" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Enter Your Password</label>
									<input type="password" name="passw1" id="passw1" class="form-control">
								</div>
								<div class="form-group">
									<label style="color:white;">Retype Password</label>
									<input type="password" name="passw2" id="passw2" class="form-control">
									<p id="passError" style="color:red"></p>
								</div>
								<div class="form-group">
									<input type="submit" name="send" id="send" value="Save and Continue" class="pull-right btn btn-info btn-sm">
								</div>
							</form>
						</div>
						<div class="col-md-3">
							
						</div>
					</div>
					
		</div>
	</div>
	<?php
		include('footer.php');
	?>
	<script>
		$("document").ready(function(){
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
									$("#showImg").attr("src",e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
							
						}	
					}
			//alert("goooooooooooooooooooo");
			$("#artistsignup").on("submit", function(e){
				e.preventDefault();
					$.ajax({
					url: "upload.php",
					type: "POST",
					mimeTypes: "multipart/form-data",
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("Successfully")){
							 alert("Saved successfully!");
							 window.location.href="artistsignup2.php";
						}else if(data.match("password")){
							alert("Password Does not Match");
							$("#passError").html("Password Does not Match");
						}else if(data.match("phoneerror")){
							alert("Phone Number is Invalid");
						}else{
							alert(data);
						}
					}
				});
			});
			
			
		});
	</script>
</body>

</html> 