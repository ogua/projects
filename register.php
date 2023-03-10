<?php
	session_start();
	if(isset($_SESSION['id'])){
	   header("location: account.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Car Parking || Register </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.require{
			color:red;
		}
		.back{
  background-image: url("dist/img/joey-banks-391210-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
.setfont{
	font-size:15px;
}
label{
	font-size:20px;
}
	</style>

  </head>
  <body class="back">
	<div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;">
		<div class="" style="background-color:#fff;padding:10px;border-radius:20px;">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li style="background-color:#ccc;padding:20px;"><a href="register.php">Register</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
			<h2 class="text-success">Online Car Park Booking</h2>
		</div>
	             
	 </div>
	 <div class="container-fluid" style="background-color:#ccc;" >
		
	 </div>
	 <div class="clearfix"></div>
	 <div class="container">
		<h2 class="text-info" style="margin-left:10px;">User Signup<h2>
		<div id="displMsg">
					
				</div>
		<div class="row" style="margin-top:10px;background-color:#ccc;padding:20px;">
			<div style="margin-top:30px;margin-bottom:50px;">
				<form method="" action="" id="formsubmit">
				<div class="col-md-3">
						<div class="form-group">
						  <label for="InputFle" class="text-center" >Passport picture <span class="require"></span></label>
						  <!---<img src= "userimage.png" class "centre" alt="MEMBER" align "center" width="200" height="200" id="avatar">---->
						  <img src="dist/img/co.png" class="img-circle img-responsive"width="100" height="100" id="showImg" name="showImg" align "center" class "centre"/>
						  <input type="file" id="InputFile" name="InputFile" class="form-control">
						  <div id="picerrors" style="color:red;"></div>			 		  
						</div>
				</div>
				<div class="col-md-9">
					
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
								<label>Fullname</label>
							  <input type="text" id="fname" name="fname" class="form-control" required>
							  <div id="fnameerrors" style="color:red;"></div>			 		  
						</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label>Username</label>
							  <input type="text" id="uname" name="uname" class="form-control" required>
							  <div id="unameerrors" style="color:red;"></div>			 		  
						</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
								<label>Password</label>
							  <input type="password" id="pass1" name="pass1" class="form-control" required>
							  <div id="pass1errors" style="color:red;"></div>			 		  
						</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label>Retype Password</label>
							  <input type="password" id="pass2" name="pass2" class="form-control" required>
							  <div class="setfont" id="pass2errors" style="color:red;"></div>			 		  
						</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
								<label>Email</label>
							  <input type="email" id="email" name="email" class="form-control" required>
							  <div id="emailerrors" style="color:red;"></div>
							  <div id="emailerror" style="color:blue;"></div>	
						</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label>Phone Number</label>
							  <input type="number" id="fnnum" name="fnnum" class="form-control" required>
							  <a href="#" id="fuuena" class="btn btn-success"style="display:none;">Retype Number</a>
							  <div class="setfont" id="fnnumerrors" style="color:red;"></div>			 		  
						</div>
							</div>
						</div>
						<input type="submit" class="btn btn-success pull-right" value="Register" style="margin-right:27px;">
						
					</form>
					
				</div>
			</div>
		
		</div>
	 </div>
 
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
	$("document").ready(function(){
					$("#InputFile").change(function(){
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
		$("#fnnum").keyup(function(e){
			e.preventDefault();
			var pnumbe = $(this).val();
			var pumbercount = pnumbe.length;
			if(pumbercount === 10){
				$("#fnnum").prop("disabled",true);
				$("#fuuena").show();
			}if(pumbercount > 10){
				$("#fnnum").prop("disabled",true);
				$("#fnnumerrors").text('Phone Number is Invalid');
				$("#fuuena").show();
			}
		});
		
		$("#fuuena").click(function(e){
			e.preventDefault();
			$("#fnnum").prop("disabled",false);
			$("#fnnum").val("");
		});
		
		
		$("#formsubmit").submit(function(e){
			e.preventDefault();	
			var phonenumber = $("#fnnum").val();
			var countnum = phonenumber.length;
			if(countnum > 10){
				alert('Phone Number is Invalid');
				return false;
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
						if(data.match("passErr")){
							$("#pass2errors").text('PASSWORD DOES NOT MATCH. TRY AGAIN');
						}if(data.match("Successfully")){
							alert("User Registeration Successfully");
							window.location.href ="login.php";
						}if(data.match("failed")){
							$("#").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>User Registeration Unsuccessful ! Please Try again Later</strong></div>');
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
