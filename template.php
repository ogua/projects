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
              <img src="dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome <?php echo "Ogua";?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                  <a href="#" class="btn btn-success">Logout</a>
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
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
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
        <img src= "dist/img/KSJI.jpg" class "centre" alt="KSJI LOGO" align "left" width="40" height="40" >
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
	    <form id="formcont" role="form" method="Post" action="" enctype="multipart/form-data">

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
				
				
			<div class="box-body">
          
         
		</div>
				
				
		
			 
			 <div class="box-body">
          
				</div>
				
				  
				  <div class="box-footer" >
				  <a href="formrefrees.php"><button type="button" id = "next_btn" name = "next_btn"class="btn btn-primary" style = "float:right; margin: 3px">Next</button></a>
				  <button type="submit" id = "save_btn" name = "save_btn" class="btn btn-success" style = "float:right; margin: 3px">Save</button>
<a href="fbiodata.php"><button type="button" id ="cancel_btn" name = "cancel_btn"class="btn btn-danger" style = "float:right; margin: 3px">Cancel</button></a>
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
		function getmemid(){
			$.ajax({
			url: 'getmemid.php',
			method: 'POST',
			//data: {},
			success: function(data){
				$("#EMPLOYID").val(data);
				
				$("input[value=Married]").click(function(){
					
					$("input[value=Unmarried]").prop("checked",false);
					$("input[value=Widower]").prop("checked",false);
				});
				$("input[value=Unmarried]").click(function(){
					
					$("input[value=Married]").prop("checked",false);
					$("input[value=Widower]").prop("checked",false);
				});
				$("input[value=Widower]").click(function(){
					
					$("input[value=Married]").prop("checked",false);
					$("input[value=Unmarried]").prop("checked",false);
				});
			}
		});
		}
		getmemid();
		
		$("#employeesearch").keyup(function(){
			var employeeids = $(this).val();
			$.ajax({
			url: 'serachemployee.php',
			method: 'POST',
			data: {employeeids:employeeids},
			success: function(data){
				$("#listemployeeHere").html(data);			
			}
		});
		});
		
		
		$("#showfileds").click(function(e){
			e.preventDefault();
			$(".form-control").prop("disabled",false);
		});
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
					
		$("input[name='findlist']").on("input", function(){
					var seletd = $(this).val();
					var kkk = seletd.length;
					if(kkk == 11 || kkk > 11){	
						$.ajax({
						url: 'insertintoFormFbio.php',
						method: 'post',
						dataType: 'json',
						data: {seletd:seletd},
						success: function(data){
							$("#title").val(data.title);							
							$("#sname").val(data.sname);
							$("#fname").val(data.fname);
							$("#d_birth").val(data.d_birth);		
							$("#cell_group").val(data.cell_group);
							$("#contact_1").val(data.contact_1);
							$("#showImg").attr("src","images/"+data.p_pic);
							
							if(data.m_status.match("Married")){
								$("input[value=Married]").prop("checked",true);
								if($("input[value=Married]").is(":checked")){
									$("input[value=Unmarried]").prop("checked",false);
									$("input[value=Widower]").prop("checked",false);
								}
							}if(data.m_status.match("Unmarried")){
								$("input[value=Unmarried]").prop("checked",true);
								if($("input[value=Unmarried]").is(":checked")){
									$("input[value=Married]").prop("checked",false);
									$("input[value=Widower]").prop("checked",false);
								}
							}if(data.m_status.match("Widower")){
								$("input[value=Widower]").prop("checked",true);
								if($("input[value=Widower]").is(":checked")){
									$("input[value=Unmarried]").prop("checked",false);
									$("input[value=Married]").prop("checked",false);
								}
							}
							
							if(data.p_catholic.match("Yes")){
								$("input[value=Yes]").prop("checked",true);
								if($("input[value=Yes]").is(":checked")){
									$("input[value=No]").prop("checked",false);
								}
							}if(data.p_catholic.match("No")){
								$("input[value=No]").prop("checked",true);
								if($("input[value=No]").is(":checked")){
									$("input[value=Yes]").prop("checked",false);
								}
							}
							
							//$("#InputFile").val(data.p_pic);								
							$("#EMPLOYID").val(data.Mem_Id);
							$("#othernames").val(data.oname);
							$("#placebirth").val(data.p_birth);
							$("#region").val(data.region);
							$("#region2").val(data.region_1);
							$("#Church").val(data.parish);
							$("#occupation").val(data.occupation);
							var addvalus = data.address;
							var addvaluesplit = addvalus.split("/");
							$("#Address1").val(addvaluesplit[0]);
							$("#Address2").val(addvaluesplit[1]);
							$("#Address3").val(addvaluesplit[2]);
							$("#hseno").val(data.hse_no);
							$("#strtno").val(data.street_name);
							$("#cittwn").val(data.city);
							$("#contact_2").val(data.contact_2);
							$("#tEmail1").val(data.email_add);
						}
						});
						
					}
				});
				
		$("#formcont").submit(function(e){
			e.preventDefault();	
			var title = $("#title").val();
			var sname = $("#sname").val();
			var fname = $("#fname").val();
			var d_birth = $("#d_birth").val();		
			var cell_group = $("#cell_group").val();
			var contact_1 = $("#contact_1").val();
			var pimage = $("#InputFile").val();
			
			if(pimage ==""){
				$("#picerrors").text("You must Upload your Picture");				
			}else{
				$("#picerrors").text("");
			}
			
			if(title ==""){
				$("#titleError").text("You must Select Title");
			}else{
				$("#titleError").text("");
			}
			
			if(sname ==""){
				$("#snameError").text("You must enter Surname");
			}else{
				$("#snameError").text("");
			}
			
			if(fname ==""){
				$("#fnameError").text("You must enter First Name");
			}else{
				$("#fnameError").text("");
			}
			
			if(d_birth ==""){
				$("#d_birthError").text("You must select Date of Birth");
			}else{
				$("#d_birthError").text("");
			}
			
			if(cell_group ==""){
				$("#cell_groupError").text("You must select Cell Group");
			}else{
				$("#cell_groupError").text("");
			}
			
			if(contact_1 ==""){
				$("#contactError").text("You must enter Contact Number");
			}else{
				$("#contactError").text("");
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
						if(data.match("successfully")){
							alert("Member Registered Successfully");
							$(".form-control").prop("disabled",true);
							$("#displayinfo").html('<div class="alert alert-danger" <h2><i class="icon fa fa-check"></i> <strong>Member Registerd / Updated Successfully!</strong></div>');
							$("#displayinfo").fadeOut(8000);
						}if(data.match("failed")){
							$("#displayinfo").html('<div class="alert alert-danger" <h2><i class="icon fa fa-check"></i> <strong>Failed to Add Mmber</strong></div>');
							$("#displayinfo").fadeOut(8000);
						}if(data.match("failed1")){
							$("#displayinfo").html('<div class="alert alert-danger" <h2><i class="icon fa fa-check"></i> <strong>Error on upload: Invalid file definition</strong></div>');
						}if(data.match("imageError")){
							alert("Please select an Image and Continue");
							$("#picerrors").text("You must Upload A Picture");
						}if(data.match("emptyimageerror")){
							$("#picerrors").text("");
						}if(data.match("errorcont")){
							$("#contactError").text("You must enter Contact Number");
						}if(data.match("errortitl")){
							$("#titleError").text("You must Select Title");
						}if(data.match("errorsnam")){
							$("#snameError").text("You must enter Surname");
						}if(data.match("errorfnam")){
							$("#fnameError").text("You must enter First Name");
						}if(data.match("errordbrth")){
							$("#d_birthError").text("You must select Date of Birth");
						}if(data.match("errorcellgrp")){
							$("#cell_groupError").text("You must select Cell Group");
						}
					   
					}
					});
			
		});
	});
</script>
</body>
</html>
