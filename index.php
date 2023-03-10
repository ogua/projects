   <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: UPSA VOTING APP</title>
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
 .loadbox{
  top:0;
  right:0;
  left:0;
  bottom:0;
  position:absolute;
  text-align:center;
  margin-top:540px;
  z-index: 1;
  display: none;
 }
 .back{
	 background-image: url('./images/up1.png');
	 background-size:cover;
	 background-repeat: no-repeat;
 }
 </style>
</head>
<body class="back" style="height:100%";>
		      <h1 class="text-center" style="color:black;">UPSA Voting System</h1> 
			  						<img src="images/upsa.png" class="img-circle" height="100" width="100">
			  <div class="col-sm-8 col-sm-offset-2" style="margin-top:160px;margin-bottom:80px;">
			          <h1 style="color:;border-top:5px solid white; border-bottom:5px solid white;text-align:center;font-family:Roboto;padding:10px;color:white;">login</h1>
						<form method="post" action="" id="loginuser">
								<div class="form-group">
									<input type="text" class="form-control" name="Cuser" placeholder="Enter Student id or Email for Admin" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control"  name="Cpass" placeholder="Enter User Password" required>
								</div>
								<div class="form-group">
								</div>
								<div class="form-group" style="width:300px;">
                                     <select name="roles"class="form-control" required>
									 <option value="">Choose User Role</option>
											<option value="volter">Student</option>
											<option value="admin">Admin</option>											
										</select>								
								</div>
								<div class="form-group">
									<input type="submit" id="send" name="send" class="btn btn-success pull-right" value="Login"/>
								</div>
						</form>
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
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyARcZ9N4KlDvthA5_mp6pRBBzHCzicbpKQ",
    authDomain: "upsaalert-54ecd.firebaseapp.com",
    databaseURL: "https://upsaalert-54ecd.firebaseio.com",
    projectId: "upsaalert-54ecd",
    storageBucket: "upsaalert-54ecd.appspot.com",
    messagingSenderId: "392618114428"
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
			$("#loginuser").on("submit", function(e){
				e.preventDefault();
				$.ajax({
					url: 'login.php',
					type: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					data: new FormData(this),
					success: function(data){
						if(data.match("success")){
							alert("User Login Successfully!");
							window.location.href="admin.php"
						}else if(data.match("Failed")){
							alert("Failed! Try again Later");
						}else if(data.match("volter")){
							alert("User Login Successfully!");
							window.location.href="vcandidates.php"
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