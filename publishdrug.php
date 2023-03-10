<?php
	session_start();
	error_reporting(0);
	include('db.php');
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Publish Drug Admin</title>
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
  .progres{
	  margin: 0 auto;
  }
  .msgDi{
	 top:0;
	 left:0;
	 bottom:0;
	 right:0;
	 text-align:center;
	 margin-top:260px;
	 position:absolute;
	 height:200px;
	 border:1px solid green;
	 background-color:#ccc;
 }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Hub</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b> </b> </span>
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
          
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">

            <ul class="dropdown-menu">
              
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.png" class="img-circle" alt="User Image">

                <p>
                 Welcome
                  <small><?php echo $_SESSION['name']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
         
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name']; ?></p>
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <?php
		include('adminMenu.php');
	 ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small> <b></b> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="container-fluid">
		<h3 style="color:whit">Publish Drug</h3>
		<div class="row">
			<div class="col-md-3" style="border:1px solid gren;">
				<img src="images/"  width="200" height="200" id="imgs">
			</div>
			<div class="col-md-8" style="border:1px solid gren;">
			<form method="post" action="" id="uploadDrug" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $row['id']; ?>" id="hostelid" name="hostelid" >
					<div class="form-group">
						<label>Upload Pic Art Of Drug</label>
						<input type="file" name="InputFile" id="InputFile" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Name Of Drug Manufacturer</label>
						<input type="text" id="nameofdrugMan" name="nameofdrugMan" class="form-control" required>
					</div>					
					<div class="form-group">
						<label>Name Of Drug</label>
						<input type="text" name="nameofdrug" id="nameofdrug" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Brand Of Drug</label>
						<input type="text" id="brandofdrug" name="brandofdrug" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Manufacturing Date</label>
						<input type="date" id="manuacdate" name="manuacdate" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Expiring Date</label>
						<input type="date" id="expiredate" name="expiredate" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Manufacturer Number</label>
						<input type="text" id="manfbum" name="manfbum" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Company Distributors</label>
						<input type="text" name="distrib" id="distrib" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Serial Number <i class="text-danger">Note: Serial is Generated by the System</i></label>
						<input type="text" name="serailnum" id="serailnum" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Upload Information" name="send" class="btn btn-success" >
					</div>
					<div class="form-group">
						 <progress value="0" max="100" id="progress" class="progress">0%</progress>
						 <label id="indi"></label>
					</div>
			</form>
			
			</div>
		</div>
	 </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAzor3BHnBCT9Q35Wm8B8TkRwfLxjMLbBA",
    authDomain: "drugsite-8b2fa.firebaseapp.com",
    databaseURL: "https://drugsite-8b2fa.firebaseio.com",
    projectId: "drugsite-8b2fa",
    storageBucket: "drugsite-8b2fa.appspot.com",
    messagingSenderId: "650575550524"
  };
  firebase.initializeApp(config);
</script>
<script>
		$('document').ready(function(){
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
									$("#imgs").attr("src",e.target.result);
								}
								reader.readAsDataURL(input.files[0]);
							}
							
						}
						
					}
			
			$("#uploadDrug").on("submit",function(e){
				e.preventDefault();
				var progrs = document.getElementById("progress");
				var indicat = document.getElementById("indi");
					$.ajax({
						url: 'upload.php',
						type: 'POST',
						contentType: false,
						processData: false,
						cache: false,
						data: new FormData(this),
						success: function(data){
							if(data.match("success")){
								var file = document.querySelector('#InputFile').files[0];
								var metadata = {
								  contentType: 'image/jpeg'
								};
								var  storageRef = firebase.storage().ref("images");
								var uploadTask = storageRef.child(file.name).put(file, metadata);
								uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED,
								  function(snapshot) {
									var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
									progrs.value = progress+'%';
									//console.log('Upload is ' + progress + '% done');
									switch (snapshot.state) {
									  case firebase.storage.TaskState.PAUSED:
										console.log('Upload is paused');
										break;
									  case firebase.storage.TaskState.RUNNING:
										indicat.innerHTML = 'Upload is running';
										break;
									}
								  },function(error) {
								  switch (error.code) {
									case 'storage/unauthorized':
									  console.log('User Dont Have Permission');
									  break;

									case 'storage/canceled':
									console.log('User canceled the upload');	
									  break;
									case 'storage/unknown':
									 console.log(' Unknown error occurred, inspect error.serverResponse');	
									  break;
								  }
								},function() {
						// Upload completed successfully, now we can get the download URL
							  uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
								indicat.innerHTML = 'File Uploaded Successfully';
								var userid = $("#hostelid").val();
								var images = downloadURL;
								var manufacturername = $("#nameofdrugMan").val();
								var drugname = $("#nameofdrug").val();
								var brand = $("#brandofdrug").val();
								var manufacdate = $("#manuacdate").val();
								var Expdate = $("#expiredate").val();
								var manNumber = $("#manfbum").val();
								var Distributor = $("#distrib").val();
								var serialNumber = $("#serailnum").val();
								var status = "0";
								var id = "";
				
							 var db = firebase.database().ref("Drugs");
							 var newPostRef = db.push({
								userid: userid,
								images: images,
								manufacturername: manufacturername,
								drugname: drugname,
								brand: brand,
								manufacdate: manufacdate,
								Expdate: Expdate,
								manNumber: manNumber,
								Distributor: Distributor,
								serialNumber:serialNumber,
								status: status,
								id: id
							},
							function(error){
								if(error){
									alert("Check Network Connectivity");
								}else{
									var refid = newPostRef.key;
									db.child(refid).update({"id": refid},
									function(error){
										if(error){
											
										}else{
								  alert("Drug Information Uploaded Successfully!");
									window.location.href="publishdrug.php";
	
										}
									});
								}
							}
							);
													
							  });
							});		
							}else{
								alert(data);
							}
							}
					   });	
		});
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$(".delecthostel").click(function(){
				///alert('go');
				var id = $(this).attr("cid");
				$.ajax({
					url: 'admindelet.php',
					type: 'POST',
					data: {id: id},
					success: function(data){
						alert(data);
						window.location.href="publishedHostels.php";
					}
				});
			});
			
			$("#searchartist").on("keyup",function(e){
				e.preventDefault();
				var text = $(this).val();
				if(text.length > 3){
					//alert(text);
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {SerchAirtest: 1, text: text},
						success: function(data){
							$("#showAirtest").html(data);
						}
					});
				}else{
					$.ajax({
						url: 'action.php',
						type: 'post',
						data: {AllArtists: 1},
						success: function(data){
							$("#showAirtest").html(data);
						}
					});
				}
			});
			
			$("#artistupadet").on("submit",function(e){
				e.preventDefault();
				//alert("gooooooooooooo");
				$.ajax({
					url: 'profileUpdate.php',
					type: 'Post',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						alert(data);
						//$("#viewError").html(data);
					}
				});
			});
			
			$("#serailnum").on("focus",function(e){
				e.preventDefault();
				$.ajax({
					url: 'action.php',
					type: 'Post',
					data: {generatesid: 1},
					success: function(data){
						$("#serailnum").val(data);
					}
				});
			});
		});
	</script>
	<script src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</body>
</html>