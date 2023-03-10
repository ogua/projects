<?php
	include_once('db.php');
	session_start();
	if(!isset($_SESSION['id'])){
	   header("location: index.php");
	}
	$id = $_GET['id'];
	$flor = $_GET['floor'];
	if($id ==""){
		header("location:parkspace.php?floor=$flor");
	}
	$sql = "SELECT * FROM `parkslot` WHERE `slodid` = '$id' and slotname = '$flor'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	$flor = $row['slotname'];
	if($result > 0){
		header("location:parkspace.php?error=error&floor=$flor");
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
	<div class="col-sm-8 col-sm-offset-2" style="margin-top:20px;">
		<div class="well">
			<ul class="list-inline">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li class=""><a href="contact.php">Contact Us</a></li>
				<li class="pull-right"><a href="logout.php">Logout</a></li>
				<li class="pull-right"><a href="changepass.php">Change Password</a></li>
				<li class="pull-right"><a href="account.php">My account</a></li>						
			</ul>
		</div>
	             
	 </div>
     <div class="container-fluid well back2" style="">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-7">
				<h2 class="text-success">Online Car Booking</h2>
				<h3 class="text-capitalize text-primary">All Parking Space slots for <?php $flor = $_GET['floor']; echo $flor; ?></h3>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	 </div>
	 <div class="clearfix"></div>
	  <div class="container-fluid" style="margin-top:-20px;">
		<div class="row">
			
			<div class="col-md-3 well">
				<div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['image']; ?>" class="img-circle" alt="User Image" id="imgclick">
        </div>
        <div class="pull-left info">
          <p>Welcome : <?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
	  <div id="dislalogout" style="display:none;">
	  <hr style="border:2px solid #ccc;">
	  <a href="logout.php" class="btn btn-success" style="margin-left:10px;">Logout</a>
	  </div>
			</div>
			<div class="col-md-8 well">
				<ul class="list-inline" style="width:400px;height:70px;border:1px solid #ccc;border-radius:20px;padding:10px;">
					<li style="">
					<img src="images/park.jpg"/><span style="margin-left:5px;"><b>Occupied</b></span></li>
					<li>
					<img src="images/empty.jpg"/><span style="margin-left:5px;"><b>Available <span class="fa fa-check-circle" style="color: #fff;background-color: #5cb85c;"></span></b></span>
					</li>
				</ul>
				<a href="parkspace.php?floor=<?php echo $flor; ?>" class="btn btn-success">&larr; Back</a>
				<h3 class="text-capitalize text-success">Book a Slot</h3>
					<?php
						if(isset($_POST['send'])){
							if(!filter_var($_POST['emadder'],FILTER_VALIDATE_EMAIL)){
								echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Email Address is invalid.
								</strong></div>';
								exit;
							}
							if(strlen($_POST['phnum']) > 10){
								echo'<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
									Phone Number is Invalid
								</strong></div>';
								exit;
							}
							$query = "INSERT INTO `parkslot`(username,`phonenumber`,`slotname`, `slodid`, `status`,`vehicle`, `platenumber`, `email`, `startdate`, `endstart`,`image`) 
							VALUES ('".$_SESSION['name']."','".$_POST['phnum']."','".$_POST['flor']."','".$_POST['slonum']."','Occupied','".$_POST['venam']."',
							'".$_POST['planum']."','".$_POST['emadder']."','".$_POST['endate']."','".$_POST['exdate']."','".$_POST['img']."')";
							$squery = mysqli_query($conn,$query);
							if($squery){
								$lastid = mysqli_insert_id($conn);
								$_SESSION['lastid'] = $lastid;
								echo'
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>Booking</strong>
				<script type="text/javascript">
					var count = 10;
					var redirect = "Bookreport.php?&floor='.$flor.'";
						function countDown(){
  							 var timer =document.getElementById("timer");
   						 if(count > 0){
     				   count--;
        				timer.innerHTML = "<B>Successfully. Saving Info Please Wait </b>"+count+" <b>seconds.</b><br>";
       			 setTimeout("countDown()", 1000);
   				 }
			else{
        window.location.href = redirect;
   				 }
					}
				</script>
				<span id="timer">
		<script type="text/javascript">countDown();</script>
					</span>
					</div>'
			;
							}else{
								echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arialabel="close">&times;</a><strong>
			       Failed to book slot, Please try again Later
					</strong></div>';
							}
						}
					?>
					<form method="post" action="" id="formsend">
					<input type="hidden" class="form-control" name="img" id="img" value="<?php echo $_SESSION['image']; ?>" >
						<div class="row">
							<div class="col-md-2">
								<label>Selected Space</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="flor" id="flor" value="<?php echo $flor; ?>" required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Slot Number</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="slonum" id="slonum" value="<?php echo $id; ?>" required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Vehicle Name</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="venam" id="venam"  required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Plate Number</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="planum" id="planum"  required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Entry Date</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="date" class="form-control" name="endate" id="endate"  required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Exit Date</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="date" class="form-control" name="exdate" id="exdate"  required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Phone Number</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="phnum" id="phnum" value="<?php echo $_SESSION['phone']; ?>" required>
								</div>
								<a href="#" id="fuuena" class="btn btn-success"style="display:none;">Retype Number</a>
								
							</div>
							<div id="fnnumerrors"class="col-md-4" style="color:red;">
								
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label>Email Address</label>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" name="emadder" id="emadder" value="<?php echo $_SESSION['email']; ?>" required>
								</div>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2">
								
							</div>
							<div class="col-md-5">
								<input type="submit" name="send" class="pull-right btn btn-success" value="Book Now">
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-1"></div>
						</div>
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
		$("#frmsend").on("submit", function(e){
			e.preventDefault();
			var img = $("#").val();
			$.ajax({
				url: "book.php",
				type: "POST",
				data: {},
				success: function(data){
				   alert(data);
				}
			});
		});
		
		$("#phnum").keyup(function(e){
			e.preventDefault();
			var pnumbe = $(this).val();
			var pumbercount = pnumbe.length;
			if(pumbercount === 10){
				$("#phnum").prop("disabled",true);
				$("#fuuena").show();
			}if(pumbercount > 10){
				$("#phnum").prop("disabled",true);
				$("#fnnumerrors").text('Phone Number is Invalid');
				$("#fuuena").show();
			}
		});
		
		$("#fuuena").click(function(e){
			e.preventDefault();
			$("#phnum").prop("disabled",false);
			$("#phnum").val("");
			$("#fnnumerrors").val("");
		});
		
		$("#imgclick").click(function(e){
			e.preventDefault();
			$("#dislalogout").toggle(700);
		});
	});
</script>	 
</body>
</html>
