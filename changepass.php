<?php
	session_start();
	if(!isset($_SESSION['id'])){
	   header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Car Parking System</title>
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
		.back2{
  background-image: url("dist/img/joey-banks-391210-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
.back{
  background-image: url("images/raban-haaijk-118657-unsplash.jpg");
background-size:cover;
background-image: no-repeat;
}
	</style>

  </head>
  <body class="back">  
	 <div class="col-sm-8 col-sm-offset-2" style="">
		<div class="" style="background-color:#fff;padding:10px;border-radius:20px;">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li class=""><a href="contact.php">Contact Us</a></li>
				<li class="pull-right"><a href="logout.php">Logout</a></li>
				<li class="pull-right"><a href="changepass.php">Change Password</a></li>
				<li class="pull-right"><a href="account.php">My account</a></li>						
			</ul>
			<h2 class="text-success">Online Car Booking</h2>
		    <h3 class="text-capitalize text-primary">All Parking Space, click on parking to view slots</h3>
		</div>
	             
	 </div>
	 <div class="container-fluid" style="background-color:#ccc;" >
		
	 </div>
	 <div class="clearfix"></div>
	  <div class="container-fluid well back" style="margin-top:;">
		<div class="row">
			
			<div class="col-md-2 well">
				<div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image" id="imgclick">
        </div>
        <div class="pull-left info">
          <p class="text-success" style="font-size:15px;">Welcome : <?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  <div id="dislalogout" style="display:none;">
	  <hr style="border:2px solid #ccc;">
	  <a href="logout.php" class="btn btn-success" style="margin-left:10px;">Logout</a>
	  </div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-8">
			<?php
				if(isset($_POST['send'])){
					include_once('db.php');
					$sql = "SELECT `id` FROM `users` WHERE `email` = '".$_POST['EAdd']."'";
					$query = mysqli_query($conn,$sql);
					$result = mysqli_num_rows($query);
					if($result > 0){
						$row = mysqli_fetch_array($query);
						$id = $row['id'];
						$passv = password_hash($_POST['psw'], PASSWORD_DEFAULT);
						if(!PASSWORD_VERIFY($_POST['psw2'], $passv)){
							echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
							Password does not match !
					</strong></div>';	
						}else{
							$sql2 = "UPDATE `users` SET `password` = '$passv' WHERE id = '$id' ";
							$query2 = mysqli_query($conn,$sql);
							if($query2){
								echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
							Password Changed Successfully !
					</strong></div>';
							}
						}
					}else{
						echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
							Email address does not exit
					</strong></div>';
					}
				}
			?>
	             <h3 style="padding:20px;font-size:60px;color:white;text-align:center;font-family:Tahoma;">Reset Password</h3>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" style="color:#42327a;"type="text" name="EAdd" id="EAdd" placeholder="ENTER YOUR EMAIL ADDRESS" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw"  id="psw" placeholder="CURRENT PASSWRORD" required />
			</div>
			<div class="form-group">
				<input class="form-control" style="color:#42327a;" type="password" name="psw2"  id="psw2" placeholder="CONFIRM PASSWORD" required />
			</div>			       
			<input type="submit" name="send" style="margin-right:20px;background-color: #d8bc35;border-color: #d8bc35;" id="send" class="btn btn-success pull-right"value="Change" />
		</form>
		
			</div>
			<div class="col-md-1"></div>
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
		$("#payit").click(function(e){
			e.preventDefault();
			$("#payitshow").toggle(700);
		});
		$("#imgclick").click(function(e){
			e.preventDefault();
			$("#dislalogout").toggle(700);
		});
	});
</script>	  
</body>
</html>