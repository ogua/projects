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
		<div class="col-md-2">
		<div class="box box-primary">
		<div class="box-header with-border">
		<div class="form-group">
				  <img src= "dist/img/joey-banks-391210-unsplash.jpg" class "centre" alt="MEMBER" align "center" width="200" height="200" id="avatar">
		</div>
		</div>
		</div>
		</div>
		
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="glyphicon glyphicon-user"></i>
              <h3 class="box-title">Manage Slot<span><small> &nbsp; > View / Edit Slots</small></span></h3>
			  

			
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
	<div id="displayerrormsghere">
			<?php
				if(@isset($_GET['suc'])){
					$msg = $_GET['suc'];
					echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			        '.$msg.'
					</strong></div>';
				}if(@isset($_GET['err'])){
					$msgs = $_GET['err'];
					echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			        '.$msgs.'
					</strong></div>';
				}
			?>
	</div>
			<div class="box-body">
				 <?php
				  include('db.php');
				 if(@isset($_GET['id'])){
			$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `packingspace`");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `packingspace`");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive" style="background-color:#abc;">
				<a href="admin.php" class="btn btn-default" style="margin-top:10px;margin-left:20px;margin-bottom:10px;">&larr; Back</a>
				<button class="btn btn-default">Total Slot &nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Capacity</th>
						<th>Edit</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['capacity'].'</td>
				<td><a href="admindelet.php?edit='.$row['id'].'" class="btn btn-info"><span class="fa fa-edit"></span></a></td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
			</div>
					';
			}
				 }
            
            ?>
			</div>				  	  
					<div class="box-body">
					<div id="showupdates"></div>
					<?php
						if(@isset($_GET['edit'])){
							$upid = $_GET['edit'];
							$supade = "SELECT * FROM `packingspace` WHERE `id` = $upid";
							$squery = mysqli_query($conn,$supade);
							$rows = mysqli_fetch_array($squery);
							echo '
							<a href="slotedit.php?id=0" class="btn btn-default" style="margin-bottom:10px;">&larr; Back</a>
							<form method="Post" action="">
								<div class="form-group">
									<label>Slot Name</label>
									<input type="text" class="form-control" value="'.$rows['name'].'" name="fuuname" id="fuuname" required>									
								</div>
								<div class="form-group">
									<label>Capacity</label>
									<textarea class="form-control"cols="4" ROWS="4" style="resize:none" name="feedbk" id="feedbk" required>'.$rows['capacity'].'</textarea>
								</div>
								<input type="submit" name="update" id="update" class="btn btn-default pull-right" value="Update Slot">
							</form>
							
							';
						}
					?>
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
		
		
		$("#update").click(function(e){
			e.preventDefault();	
			var id = '<?php echo $upid; ?>';
			var slote = $("#fuuname").val();
			var capacity = $("#feedbk").val();
			$.ajax({
				url: 'admindelet.php',
				method: 'POST',
				data: {updates: 1, slote: slote, capacity: capacity, id: id},
				success: function(data){
					$("#showupdates").html(data);
				}
			});
			
		});
	});
</script>    
</body>
</html>
