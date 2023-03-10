<?php
	session_start();
	if(!isset($_SESSION['role'])){
	   header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin || Area </title>
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
.form-control2 {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control2:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}
.form-control2::-moz-placeholder {
  color: #999;
  opacity: 1;
}
.form-control2:-ms-input-placeholder {
  color: #999;
}
.form-control2::-webkit-input-placeholder {
  color: #999;
}
.form-control2::-ms-expand {
  background-color: transparent;
  border: 0;
}
.form-control2[disabled],
.form-control2[readonly],
fieldset[disabled] .form-control2 {
  background-color: #eee;
  opacity: 1;
}
.form-control2[disabled],
fieldset[disabled] .form-control2 {
  cursor: not-allowed;
}
textarea.form-control2 {
  height: auto;
}
input[type="search"] {
  -webkit-appearance: none;
}
	</style>

  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Car</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Accra </b> Airport</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  <!-- end message -->
                  <li>
                    
                  </li>
                  
                  
                </ul>
              </li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/<?php echo $_SESSION['image'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome <?php echo "Ogua";?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/<?php echo $_SESSION['image'];?>" class="img-circle" alt="User Image">
                <p>
                  <a href="logout.php" class="btn btn-success">Logout</a>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['image'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
     <?php include("include/side.php"); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        <img src= "dist/img/joey-banks-391210-unsplash.jpg" class "centre" alt="LOGO" align "left" width="40" height="40" >
		Kotoka International Airport
        <small> <b>Online Parking System</b> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
   
    <!-- Main content -->
	    <form id="formsubmit" role="form" method="Post" action="" enctype="multipart/form-data">

    <section class="content">
      <div class="row">
        <!-- left column -->
		<div class="col-md-3">
		<div class="box box-primary">
		<div class="box-header with-border">
		<div class="form-group">
                  <label for="InputFle" class="text-center" >Passport picture <span class="require">*</span></label>
				  <!---<img src= "userimage.png" class "centre" alt="MEMBER" align "center" width="200" height="200" id="avatar">---->
				  <img src="userimage.png" width="200" height="200" id="showImg" name="showImg" align "center" class "centre"/>
                  <input type="file" id="InputFile" name="InputFile" accept="image/*" capture="Camera">
				  <div id="picerrors" style="color:red;"></div>			 		  
		</div>
		</div>
		</div>
		</div>
		
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="glyphicon glyphicon-user"></i>
              <h3 class="box-title">User Registration <span><small>> Add User</small></span></h3>
			  

			
			  <div class="box-tools pull-right">
            <div class="has-feedback">
              <!----<input type="text" class="form-control input-sm" placeholder="Search...">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>---->
			  <label>
			  <input list="employeeid" name="findlist" class="form-control2" id="employeesearch" placeholder="Search Here....">
			  <span class="glyphicon glyphicon-search form-control-feedback"></span></label>
            </div>
			
			
			
			<div id="listemployeeHere"></div>
			</div>
			</div>
			  
			
	  
		   <div id="displayinfo">
		   
		   </div>
		   
		   
		   
		   
			
	<section class="content">

        <!-- left column -->
	<div id="displayerrormsghere"></div>
			<div class="box-body">
				 
			</div>
				  
				
				  
		  
            <div id="displayerrormsghere"></div>
			<div class="box-body">
					
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
							  <input type="text" id="phonnum" name="phonnum" class="form-control" required>
							  <a href="#" id="fuuena" class="btn btn-success"style="display:none;">Retype Number</a>
							  <div class="setfont" id="fnnumerrors" style="color:red;"></div>			 		  
						</div>
							</div>
						</div>
						<input type="submit" class="btn btn-success pull-right" value="Register User" style="margin-right:27px;">
						
					</form>
			</div>
				
		
		
				
			 <div class="box-body">
          
			</div>
				  
				 
				  
	
					
         
					
                 <div class="box-body">
         
				  </div>
				  
				  <div class="box-body">
				  </div>
				  
				  
				
				<div class="box-body">
         
				</div>
				
				
				<div class="box-body">
          
				</div>
				
			
			  </div>
				
				
	</section>	
</section>	
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
		$("#phonnum").keyup(function(e){
			e.preventDefault();
			var pnumbe = $(this).val();
			var pumbercount = pnumbe.length;
			if(pumbercount === 10){
				$("#phonnum").prop("disabled",true);
				$("#fuuena").show();
			}if(pumbercount > 10){
				$("#phonnum").prop("disabled",true);
				$("#fnnumerrors").text('Phone Number is Invalid');
				$("#fuuena").show();
			}
		});
		
		$("#fuuena").click(function(e){
			e.preventDefault();
			$("#phonnum").prop("disabled",false);
			$("#phonnum").val("");
		});
		
		
		$("#formsubmit").submit(function(e){
			e.preventDefault();	
			var phonenumber = $("#phonnum").val();
			var countnum = phonenumber.length;
			if(countnum > 10){
				alert('Phone Number is Invalid');
				return false;
			}
			$.ajax({
					url: "adminupload.php",
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
						}if(data.match("failed")){
							$("#").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>User Registeration Unsuccessful ! Please Try again Later</strong></div>');
						}
						
					   
					}
					});
			
		});
	});
</script>    
</body>
</html>
