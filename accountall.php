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
	  	  <hr style="border:2px solid #ccc;">
				<ul class="list-unstyled">
					<li><a href="Bookprg.php" class="btn btn-success">New Booking</a></li>
						  	  <hr style="border:2px solid #ccc;">
					<li><a href="account.php" class="btn btn-success">view Recent Booking</a></li>
				</ul>
			</div>
			<div class="col-md-10" id="printRec">
	        <h3 style="padding:20px;font-size:60px;color:white;text-align:center;font-family:Tahoma;">All Booking</h3>
				<?php
            include('db.php');
			$sqlAll = mysqli_query($conn,"SELECT count(*) as numofrows FROM `payments` WHERE `username` = '".$_SESSION['name']."'");
			$row = mysqli_fetch_assoc($sqlAll);
			$allrow = $row['numofrows'];
			//get rows query
			$query = mysqli_query($conn, "SELECT * FROM `payments` WHERE `username` = '".$_SESSION['name']."'");
			//number of rows
			$rowCount = mysqli_num_rows($query);
			if($rowCount > 0){ 
			echo'
			<div class="table-responsive" style="background-color:#abc;overflow-x:hidden;">
				<button class="btn btn-default">Total Transactions &nbsp;<span style="font-size:1.0em;"class="badge">'.$allrow.'</span></button>	
				<table class="table table-striped"  border="1" cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Fullname</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>Slot</th>
						<th>Slot id</th>
						<th>Vehicle Model</th>
						<th>Plate</th>
						<th>Parking Days</th>
						<th>Amount to Pay</th>
						<th>Status</th>
						<th>Payment Info</th>
					</tr>
		';
				$x = 1;
				while($row = mysqli_fetch_assoc($query)){ 
					echo'
				<tr>
				<td>'.$x.'</td>
				<td><img src="images/'.$row['image'].'" width="50" height="50"></td>
				<td>'.$row['username'].'</td>
				<td>'.$row['phonenume'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['slotename'].'</td>
				<td>'.$row['assignslot'].'</td>
				<td>'.$row['vehicle'].'</td>
				<td>'.$row['platenumber'].'</td>
				<td>'.$row['parkdays'].'</td>
				<td>'.$row['amountpaid'].'</td>
				<td class="text-info">'.$row['status'].'</td>
				<td class="text-danger">'.$row['payupdate'].'</td>
				</tr>
						';
							$x++;
				}
				
			echo'
				</table>
				<a href="#" id="print_btn" class="btn btn-success pull-right" style="margin-right:10px;">Print</a>
			</div>
					';
			}else{
				echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
							No Booking Made Today
					</strong></div>';
			}
            ?>
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
<script src="js/jquery.PrintArea.js"></script>
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
		
		$("#print_btn").click(function(e){
			e.preventDefault();
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("#printRec").printArea(options);
        });
	});
</script>	  
</body>
</html>